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
// $Id: faq_manager.php 001 2005-05-05 dave@open-operations.com
//
  $content = "";
  $content .= '<ul id="' . str_replace('_', '-', $box_id . 'Content') . '" class="pad_1em gray_trangle_list">' . "\n";
  for ($i=0;$i<sizeof($box_faq_categories_array);$i++) {
    switch(true) {
// to make a specific faq_category stand out define a new class in the stylesheet example: A.faq_category-holiday
// uncomment the select below and set the fcPath=3 to the fcPath= your_faq_categories_id
// many variations of this can be done
//      case ($box_faq_categories_array[$i]['path'] == 'fcPath=3'):
//        $new_style = 'faq_category-holiday';
//        break;
      case ($box_faq_categories_array[$i]['top'] == 'true'):
        $new_style = 'category-top';
        break;
      case ($box_faq_categories_array[$i]['has_sub_cat']):
        $new_style = 'category-subs';
        break;
      default:
        $new_style = 'category-products';
      }
     if (zen_get_faq_types_to_faq_category($box_faq_categories_array[$i]['path']) == '3' or ($box_faq_categories_array[$i]['top'] != 'true' and SHOW_FAQ_CATEGORIES_SUBFAQ_CATEGORIES_ALWAYS != 1)) {
        // skip it this is for the document box
      } else {
      $content .= '<li><a class="' . $new_style . '" href="' . zen_href_link(FILENAME_FAQS_ALL, $box_faq_categories_array[$i]['path']) . '" rel="nofollow">';

      if ($box_faq_categories_array[$i]['current']) {
        if ($box_faq_categories_array[$i]['has_sub_cat']) {
          $content .= '<span class="category-subs-parent">' . $box_faq_categories_array[$i]['name'] . '</span>';
        } else {
          $content .= '<span class="category-subs-selected">' . $box_faq_categories_array[$i]['name'] . '</span>';
        }
      } else {
        $content .= $box_faq_categories_array[$i]['name'];
      }

      if ($box_faq_categories_array[$i]['has_sub_cat']) {
        $content .= FAQ_CATEGORIES_SEPARATOR;
      }
      $content .= '</a></li>';

//      if (SHOW_FAQ_COUNTS == 'true') {
//        if ((FAQ_CATEGORIES_COUNT_ZERO == '1' and $box_faq_categories_array[$i]['count'] == 0) or $box_faq_categories_array[$i]['count'] >= 1) {
//          $content .= FAQ_CATEGORIES_COUNT_PREFIX . $box_faq_categories_array[$i]['count'] . FAQ_CATEGORIES_COUNT_SUFFIX;
//        }
//      }

    }
  }

$content .= '</ul>' . "\n";
$content .= '<ul class="pad_1em black big b">' . BASE_COMMON_TEXT_ASK;
$content .= '</ul>';
$content .= '<a target="_blank" title="Write an inquiry" href="'.zen_href_link(FILENAME_FAQS).'" class="icon_inquiry center margin_t" rel="nofollow"> </a>'
?>