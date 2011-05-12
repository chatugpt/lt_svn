<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_best_sellers.php 2982 2006-02-07 07:56:41Z birdbrain $
 */

  $content = '<ul class="recent_view pad_10px">' . "\n";
  foreach ($recommendationsArray as $product) {
  //caizhouqing by bof
$rs = $db->Execute("select s.specials_new_products_price,p.products_price from (specials s,products p)  where s.products_id = p.products_id and p.products_id=".$product);
$products_price = $rs->fields['products_price'];      
$specials_price = $rs->fields['specials_new_products_price'];//caizhouqing update specials

$rsp = $db->Execute("select products_quantity from products where products_id=".$product);
$products_quantity = $rsp->fields['products_quantity'];  //product
  
  	if($products_price != ""){
	  $discount = 100-($specials_price / $products_price * 100);
	}
	$link = zen_href_link(zen_get_info_page($product), 'products_id=' . $product);
	$content .= '<li>' . "\n";
	if($products_quantity == 0){
	$content .= '<span class="sold_out_cart"></span>';
	}
	elseif(!empty($specials_price)){ 
	$content .= '<span class="sold_discount_cart"><span class="sold_discount_cart_font">'.$discount.'</span></span>';
	}//caizhouqing update by eof my_order
	$content .= "\n" .			  
				'<a class="ih" href="' .  $link . '">' . zen_get_products_image($product, '85', '85') . '</a>' . "\n" . 
				  '<span><a href="' . $link . '">' . zen_get_products_name($product, $_SESSION['languages_id']) . '</a></span>' . "\n" . 
				 '</li>';
  }
  $content .= '</ul>';
?>