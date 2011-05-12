<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_categories.php 4162 2006-08-17 03:55:02Z ajeh $
 */
  //print_r($box_categories_array);
  //print_r($cPath_array);
  //print_r($current_category_id);
  $content = "";
  $content .= '<div class="pad_1em">' . "\n";
  $rootcategories_query = "select categories_id
                           from " . TABLE_CATEGORIES . "
                           where parent_id = '0' order by sort_order";
  $rootcategoriesArray = $db->Execute($rootcategories_query);
	$content .= '<ul>';

	while (!$rootcategoriesArray->EOF) {
					$content .= '<li><a href="'.zen_href_link(FILENAME_DEFAULT, 'cPath='.$rootcategoriesArray->fields['categories_id']).'" >'.zen_get_category_name($rootcategoriesArray->fields['categories_id'],$_SESSION['languages_id']).'</a></li>';
					$rootcategoriesArray->MoveNext();
	}
	$content .= '</ul>';
  $content .= '</div>';
  
  
?>