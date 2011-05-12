<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: copy_to_confirm.php 277 2004-09-10 23:03:52Z wilt $

        if (isset($_POST['faqs_id']) && isset($_POST['faq_categories_id'])) {
          $faqs_id = zen_db_prepare_input($_POST['faqs_id']);
          $faq_categories_id = zen_db_prepare_input($_POST['faq_categories_id']);

// Copy attributes to duplicate faq
          $faqs_id_from=$faqs_id;

          if ($_POST['copy_as'] == 'link') {
            if ($faq_categories_id != $current_faq_category_id) {
              $check = $db->Execute("select count(*) as total
                                     from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                     where faqs_id = '" . (int)$faqs_id . "'
                                     and faq_categories_id = '" . (int)$faq_categories_id . "'");
              if ($check->fields['total'] < '1') {
                $db->Execute("insert into " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                          (faqs_id, faq_categories_id)
                              values ('" . (int)$faqs_id . "', '" . (int)$faq_categories_id . "')");
              }
            } else {
              $messageStack->add_session(ERROR_CANNOT_LINK_TO_SAME_FAQ_CATEGORY, 'error');
            }
          } elseif ($_POST['copy_as'] == 'duplicate') {
            $old_faqs_id = (int)$faqs_id;
            $faq = $db->Execute("select *
                                     from " . TABLE_FAQS . "
                                     where faqs_id = '" . (int)$faqs_id . "'");

            $db->Execute("insert into " . TABLE_FAQS . "
                                      (faqs_type, faqs_image,
                                       faqs_date_added, faqs_status,
									   faqs_sort_order,
                                       master_faq_categories_id
                                       )
                          values ('" . zen_db_input($faq->fields['faqs_type']) . "',
                                  '" . zen_db_input($faq->fields['faqs_image']) . "',
                                  now(),
                                  '" . zen_db_input($faq->fields['faqs_qty_box_status']) . "',
                                  '" . zen_db_input($faq->fields['faqs_sort_order']) . "',
                                  '" . zen_db_input($faq_categories_id) .
                                  "')");

            $dup_faqs_id = $db->Insert_ID();

            $description = $db->Execute("select language_id, faqs_name, faqs_description,
                                                             faqs_url
                                         from " . TABLE_FAQS_DESCRIPTION . "
                                         where faqs_id = '" . (int)$faqs_id . "'");
            while (!$description->EOF) {
              $db->Execute("insert into " . TABLE_FAQS_DESCRIPTION . "
                                        (faqs_id, language_id, faqs_name, faqs_description,
                                         faqs_url, faqs_viewed)
                            values ('" . (int)$dup_faqs_id . "',
                                    '" . (int)$description->fields['language_id'] . "',
                                    '" . zen_db_input($description->fields['faqs_name']) . "',
                                    '" . zen_db_input($description->fields['faqs_description']) . "',
                                    '" . zen_db_input($description->fields['faqs_url']) . "', '0')");
              $description->MoveNext();
            }

            $db->Execute("insert into " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                      (faqs_id, faq_categories_id)
                          values ('" . (int)$dup_faqs_id . "', '" . (int)$faq_categories_id . "')");
            $faqs_id = $dup_faqs_id;
            $description->MoveNext();

          }



        }
        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $faq_categories_id . '&pID=' . $faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
?>