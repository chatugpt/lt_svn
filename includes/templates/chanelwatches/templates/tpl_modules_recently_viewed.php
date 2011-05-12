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

  $content = '<ul class="recent_view pad_10px">' . "\n";
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
	$content .= '<li>';
	if($products_quantity == 0){
	$content .= '<span class="sold_out_cart"></span>';
	}
	elseif(!empty($specials_price)){ 
	$content .= '<span class="sold_discount_cart"><span class="sold_discount_cart_font">'.number_format($discount).'</span></span>';
	}
	$content .= "\n" . 
				  '<a class="ih" href="' .  $link . '">' . zen_get_products_image($recent_product, '85', '85') . '</a>' . "\n" . 
				  '<span><a href="' . $link . '">' . zen_get_products_name($recent_product, $_SESSION['languages_id']) . '</a></span>' . "\n" . 
				 '</li>';
  }
  $content .= '</ul>';
  if ($flagHasCartContents){
  $content .= '<h4 class="dark_bg margin_t bg_car" style="width:730px; margin-top:140px;"><a onclick="toggle(\'shipping_estimator_frm\')"; class="red u" href="javascript:void(0);">'.CART_SHIPPING_OPTIONS .'</a></h4><iframe width="98%" scrolling="no" height="300" frameborder="0" src="'.zen_href_link(FILENAME_SHIPPING_ESTIMATOR).'"style="display:;" id="shipping_estimator_frm"></iframe>';  
  
  }
  //eof by caizhouqing cart
  //caizhouqing update cart_up_pic
?>