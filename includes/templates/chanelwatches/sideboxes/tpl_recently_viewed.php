<style type="text/css">
<!--


-->
</style>
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

$content = '<ul>' . "\n";
foreach ($recent_viewed as $recent_product) {
	$link = zen_href_link(zen_get_info_page($recent_product), 'products_id=' . $recent_product);
	//bof by caizhouqing cart
	$rs = $db->Execute("select s.specials_new_products_price,p.products_price from (specials s,products p)  where s.products_id = p.products_id and p.products_id=".$recent_product);
	
	$products_price = $rs->fields['products_price'];      //caizhouqing update specials
	$specials_price = $rs->fields['specials_new_products_price'];
	//---------
	$rsp = $db->Execute("select products_quantity from products where products_id=".$recent_product);
	$products_quantity = $rsp->fields['products_quantity'];  //product
	
	if($products_price != ""){
		$discount = 100-($specials_price / $products_price * 100);
	}
	$content .= '<li style="text-align:center;">';
	if($products_quantity == 0){
		$content .= '<span class="sold_out_cart"></span>';
	}
	elseif(!empty($specials_price)){ 
		$content .= '<span class="sold_discount_sidebox"><span class="sold_discount_font_sidebox">'.round($discount).'</span></span>';
	}
	$content .= "\n" . 
		'<a class="ih" href="' .  $link . '">' . zen_get_products_image($recent_product, '85', '85') . '</a>' . "<br />" .
		'<div style="text-align:left;"><a href="' . $link . '">' . zen_get_products_name($recent_product, $_SESSION['languages_id']) . '</a></div>' . "\n" . 
		'</li>';
}
$content .= '</ul>';
//eof by caizhouqing cart
//caizhouqing update cart_up_pic
?>