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
//  $Id: sidebox_move_faq.php 290 2004-09-15 19:48:26Z wilt $
//
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_FAQ . '</b>');

        $contents = array('form' => zen_draw_form('faqs', $type_faq_admin_handler, 'action=move_faq_confirm&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . zen_draw_hidden_field('faqs_id', $pInfo->faqs_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_FAQS_INTRO, $pInfo->faqs_name));
        $contents[] = array('text' => '<br />' . TEXT_INFO_CURRENT_FAQ_CATEGORIES . '<br /><b>' . zen_output_generated_faq_category_path($pInfo->faqs_id, 'faq') . '</b>');
        $contents[] = array('text' => '<br />' . sprintf(TEXT_MOVE, $pInfo->faqs_name) . '<br />' . zen_draw_pull_down_menu('move_to_faq_category_id', zen_get_faq_category_tree(), $current_faq_category_id));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_move.gif', IMAGE_MOVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
?>