<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                                 |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: sidebox_delete_faq.php 290 2004-09-15 19:48:26Z wilt $
//

        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_FAQ . '</b>');

        $contents = array('form' => zen_draw_form('faqs', $type_faq_admin_handler, 'action=delete_faq_confirm&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . zen_draw_hidden_field('faqs_id', $pInfo->faqs_id));
        $contents[] = array('text' => TEXT_DELETE_FAQ_INTRO);
        $contents[] = array('text' => '<br /><b>' . $pInfo->faqs_name . ' ID#' . $pInfo->faqs_id . '</b>');

        $faq_faq_categories_string = '';
        $faq_faq_categories = zen_generate_faq_category_path($pInfo->faqs_id, 'faq');
        for ($i = 0, $n = sizeof($faq_faq_categories); $i < $n; $i++) {
          $faq_category_path = '';
          for ($j = 0, $k = sizeof($faq_faq_categories[$i]); $j < $k; $j++) {
            $faq_category_path .= $faq_faq_categories[$i][$j]['text'] . '&nbsp;&gt;&nbsp;';
          }
          $faq_category_path = substr($faq_category_path, 0, -16);
          $faq_faq_categories_string .= zen_draw_checkbox_field('faq_faq_categories[]', $faq_faq_categories[$i][sizeof($faq_faq_categories[$i])-1]['id'], true) . '&nbsp;' . $faq_category_path . '<br />';
        }
        $faq_faq_categories_string = substr($faq_faq_categories_string, 0, -4);

        $contents[] = array('text' => '<br />' . $faq_faq_categories_string);
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
?>