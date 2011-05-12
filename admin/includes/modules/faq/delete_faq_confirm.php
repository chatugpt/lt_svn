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
//  $Id: delete_faq_confirm.php 290 2004-09-15 19:48:26Z wilt $
//
//
        // demo active test
        if (zen_admin_demo()) {
          $_GET['action']= '';
          $messageStack->add_session(ERROR_ADMIN_DEMO, 'caution');
          zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $_GET['fcPath'] . '&pID=' . $_GET['pID'] . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
        }
        if (isset($_POST['faqs_id']) && isset($_POST['faq_faq_categories']) && is_array($_POST['faq_faq_categories'])) {
          $faq_id = zen_db_prepare_input($_POST['faqs_id']);
          $faq_faq_categories = $_POST['faq_faq_categories'];

          for ($i=0, $n=sizeof($faq_faq_categories); $i<$n; $i++) {
            $db->Execute("delete from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                          where faqs_id = '" . (int)$faq_id . "'
                          and faq_categories_id = '" . (int)$faq_faq_categories[$i] . "'");
          }

          $faq_faq_categories = $db->Execute("select count(*) as total
                                              from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                              where faqs_id = '" . (int)$faq_id . "'");

          if ($faq_faq_categories->fields['total'] == '0') {
            zen_remove_faq($faq_id);
          }
        }

        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath));
?>