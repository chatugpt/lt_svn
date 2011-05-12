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
  $content .='<div class="pad_10px pad_t clear">';
  $content .= '<ul id="' . str_replace('_', '-', $box_id . 'Content') . '" class="red_arrow_list">' . "\n";
  
  for ($i=0;$i<sizeof($box_faq_categories_array);$i++) {
     if (zen_get_faq_types_to_faq_category($box_faq_categories_array[$i]['path']) == '3' or ($box_faq_categories_array[$i]['top'] != 'true' and SHOW_FAQ_CATEGORIES_SUBFAQ_CATEGORIES_ALWAYS != 1)) {
        // skip it this is for the document box
      } else {
      $content .= '<li><a class="b" href="javascript:void(0);" onclick="toggle(\'ul_'.($i+1).'\');">';

      $content .= ($i+1).'.'.$box_faq_categories_array[$i]['name'];
      $content .= '</a>';

      $content .= '<ul id="ul_'.($i+1).'" class="gray_trangle_list" ';
      if (zen_get_faq_id_in_category($box_faq_categories_array[$i]['id'])){
        $content .= ' style="display: display;">';
      }else{
      	$content .= ' style="display: none;">';
      }
      $content .= zen_get_faq_in_category($box_faq_categories_array[$i]['id']);
      $content .= '</ul>';
      $content .= '</li>';
      

//      if (SHOW_FAQ_COUNTS == 'true') {
//        if ((FAQ_CATEGORIES_COUNT_ZERO == '1' and $box_faq_categories_array[$i]['count'] == 0) or $box_faq_categories_array[$i]['count'] >= 1) {
//          $content .= FAQ_CATEGORIES_COUNT_PREFIX . $box_faq_categories_array[$i]['count'] . FAQ_CATEGORIES_COUNT_SUFFIX;
//        }
//      }

    }
  }
$content .= '</ul>' . "\n";
$content .= '</div>';
?>