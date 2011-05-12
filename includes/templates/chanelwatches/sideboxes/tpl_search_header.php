<script src="includes/templates/chanelwatches/jscript/search.js"></script>
<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_search_header.php 4143 2007-11-15 17:40:59Z numinix $
 */
                           
  $categories_array[] = array('id' => '', 'text' =>BASE_COMMON_TEXT_ALL_CATEGORY); 
                                $categories_query = "select c.categories_id, cd.categories_name, c.categories_status from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd  where c.categories_status='1' and parent_id = '0' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$_SESSION['languages_id'] . "' order by sort_order, cd.categories_name"; 
                                $categories = $db->Execute($categories_query); 
                                while (!$categories->EOF) {
	                                $categories_array[] = array('id' => $categories->fields['categories_id'], 'text' =>$categories->fields['categories_name']); $categories->MoveNext();
	                              }
	                               
  $content = '<div class="search_bar fl">';
  $content .= zen_draw_form('quick_find_header', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get','id = "quick_find_header"');
  $content .= zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
  $content .= zen_draw_hidden_field('inc_subcat', '1', 'style="display: none"'); 
  $content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();
	$content .= '<ul id="search_con" class="use_nav_bg"><b></b><li>' . BOX_HEADING_SEARCH . '</li><li>';
  $content .= zen_draw_pull_down_menu('categories_id', $categories_array,'','class="select" id="light_select"').'</li><li>';
	$content .= zen_draw_input_field('keyword', '', 'class ="input" autocomplete="off" id="keyword" value="' . HEADER_SEARCH_DEFAULT_TEXT . '" onfocus="if (this.value == \'' . HEADER_SEARCH_DEFAULT_TEXT . '\') this.value = \'\';" onKeyUp="searchSuggest();" onblur="if (this.value == \'\') this.value = \'' . HEADER_SEARCH_DEFAULT_TEXT . '\';"') . '<br><div id="search_suggest" style="display:none; position:absolute;"></div></li><li><a class="btn_search" onclick="if($_(\'keyword\').value==\'Enter search keywords here\'){alert(\'Please submit the keyword!\');}else{$_(\'quick_find_header\').submit();}return false;" href="javascript:void(0);"></a></li></ul>'; 
	
	if($_SESSION['cart']->count_contents()>0){
  $content .='<ul id="shoping_con"><li><a href="'.zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL') .'" rel="nofollow"><span> Cart '. $_SESSION['cart']->count_contents() .' Item(s)</span></a></li></ul>';
	}else{
  $content .='<ul id="shoping_con"><li><a href="'.zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL') .'"  rel="nofollow"><span>'.HEADER_TITLE_SHOPPING_CART.'</span></a></li></ul>';
	}
  $content .= '</form></div>';
?>
<script language="javascript">
document.onclick = function(){document.getElementById("search_suggest").style.display = "none";}
</script>