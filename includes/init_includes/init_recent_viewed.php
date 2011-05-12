<?php

  function update_recent_products($products_id) {
  	if ($_COOKIE['recent_viewed'] != ''){
	    $current_products = explode('_',$_COOKIE['recent_viewed']);
  	}else{
  		$current_products = '';
  	}
		$new_products = array();
		$new_products[] = $products_id;
		$product_count = 0;
		if (is_array($current_products)) {
		  foreach ($current_products as $product) {
	      if ($product != $products_id) {
		      if ((defined('RECENT_VIEWED_PRODUCTS_MAXIMUM') && ((RECENT_VIEWED_PRODUCTS_MAXIMUM - 1) > $product_count)) || !defined('RECENT_VIEWED_PRODUCTS_MAXIMUM') || !zen_not_null(RECENT_VIEWED_PRODUCTS_MAXIMUM)) {
		        $product_count++;
		        $new_products[] = $product;
		      } else {
		        break;
		      }
	      }
      }
		}else{
      //nothing
  	}
		return implode('_',$new_products);
  }

  if (!isset($_SESSION['recent_products'])) {
		$_SESSION['recent_products'] = array();
  }
  if (isset($_GET['products_id']) && zen_not_null($_GET['products_id'])) {
		$products_id = (int)$_GET['products_id'];
    zen_setcookie("recent_viewed",update_recent_products($products_id),time()+60*60*24*30);
  }
?>
