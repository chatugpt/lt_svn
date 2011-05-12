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
// $Id: faq_manager.php 001 2005-03-27 dave@open-operations.com
//
    $main_faq_category_tree = new faq_category_tree;
    $row = 0;
    $box_faq_categories_array = array();
// don't build a tree when no faq_categories
    $check_faq_categories = $db->Execute("select fc.faq_categories_id, fcd.language_id from " . TABLE_FAQ_CATEGORIES . " fc, ".TABLE_FAQ_CATEGORIES_DESCRIPTION." fcd where fcd.language_id = {$_SESSION['languages_id']} AND fc.faq_categories_status=1 and fc.parent_id = 0 limit 1");
    if ($check_faq_categories->RecordCount() > 0) {
      $box_faq_categories_array = $main_faq_category_tree->zen_faq_category_css_tree();
    }
    require($template->get_template_dir('tpl_faq_categories_css.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_faq_categories_css.php');
    $title = BOX_HEADING_FAQ_CATEGORIES_CSS;
    $left_corner = false;
    $right_corner = false;
    $right_arrow = false;
    $title_link = FILENAME_FAQS_ALL;
    require($template->get_template_dir('tpl_box_faq_categories_css.php', DIR_WS_TEMPLATE, $current_page_base,'common') . '/tpl_box_faq_categories_css.php');
?>