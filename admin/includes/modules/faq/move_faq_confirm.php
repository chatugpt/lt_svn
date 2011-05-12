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
//  $Id: move_faq_confirm.php 290 2004-09-15 19:48:26Z wilt $
//

        $faqs_id = zen_db_prepare_input($_POST['faqs_id']);
        $new_parent_id = zen_db_prepare_input($_POST['move_to_faq_category_id']);

        $duplicate_check = $db->Execute("select count(*) as total
                                        from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                        where faqs_id = '" . (int)$faqs_id . "'
                                        and faq_categories_id = '" . (int)$new_parent_id . "'");

        if ($duplicate_check->fields['total'] < 1) {
          $db->Execute("update " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                        set faq_categories_id = '" . (int)$new_parent_id . "'
                        where faqs_id = '" . (int)$faqs_id . "'
                        and faq_categories_id = '" . (int)$current_faq_category_id . "'");

          // reset master_faq_categories_id if moved from original master faq_category
          $check_master = $db->Execute("select faqs_id, master_faq_categories_id from " . TABLE_FAQS . " where faqs_id='" .  (int)$faqs_id . "'");
          if ($check_master->fields['master_faq_categories_id'] == (int)$current_faq_category_id) {
            $db->Execute("update " . TABLE_FAQS . "
                          set master_faq_categories_id='" . (int)$new_parent_id . "'
                          where faqs_id = '" . (int)$faqs_id . "'");
          }
        } else {
          $messageStack->add_session(ERROR_CANNOT_MOVE_FAQ_TO_FAQ_CATEGORY_SELF, 'error');
        }

        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $new_parent_id . '&pID=' . $faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
?>