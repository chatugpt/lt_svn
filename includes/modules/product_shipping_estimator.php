<?php
// Only do when something is in the cart
if ($_SESSION['cart']->count_contents() > 0) {
   //$zip_code = (isset($_SESSION['cart_zip_code'])) ? $_SESSION['cart_zip_code'] : '';
   //$zip_code = (isset($_POST['zip_code'])) ? strip_tags(addslashes($_POST['zip_code'])) : $zip_code;
   $zip_code = '';
   //$state_zone_id = (isset($_SESSION['cart_zone'])) ? (int)$_SESSION['cart_zone'] : '';
   //$state_zone_id = (isset($_POST['zone_id'])) ? (int)$_POST['zone_id'] : $state_zone_id;
   $state_zone_id = '';
   //$selectedState = zen_db_input($_POST['state']);
   $selectedState = '';
  // Could be placed in english.php
  // shopping cart quotes
  // shipping cost
  require_once('includes/classes/http_client.php'); // shipping in basket

/*
// moved below and altered to include Tare
  // totals info
  $totalsDisplay = '';
  switch (true) {
    case (SHOW_TOTALS_IN_CART == '1'):
    $totalsDisplay = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . TEXT_TOTAL_WEIGHT . $_SESSION['cart']->show_weight() . TEXT_PRODUCT_WEIGHT_UNIT . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
    break;
    case (SHOW_TOTALS_IN_CART == '2'):
    $totalsDisplay = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . ($_SESSION['cart']->show_weight() > 0 ? TEXT_TOTAL_WEIGHT . $_SESSION['cart']->show_weight() . TEXT_PRODUCT_WEIGHT_UNIT : '') . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
    break;
    case (SHOW_TOTALS_IN_CART == '3'):
    $totalsDisplay = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
    break;
  }
*/

  $country_info = zen_get_countries($_POST['zone_country_id'],true);
  
  $order->delivery = array('postcode' => $zip_code,
                               'country' => array('id' => $_POST['zone_country_id'], 'title' => $country_info['countries_name'], 'iso_code_2' => $country_info['countries_iso_code_2'], 'iso_code_3' =>  $country_info['countries_iso_code_3']),
                               'country_id' => $_POST['zone_country_id'],
                               //add state zone_id
                               'zone_id' => $state_zone_id,
                               'format_id' => zen_get_address_format_id($_POST['zone_country_id']));
                               
  // weight and count needed for shipping !
  $total_weight = $_SESSION['cart']->show_weight();
  $shipping_estimator_display_weight = $total_weight;
  $total_count = $_SESSION['cart']->count_contents();
  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping;
  $quotes = $shipping_modules->quote();
  
  //4px shipping
  if(EXTRA_HOST_NOT_OURS) {
  	  //get services supply by 4px
      $dsf_shipping_query = "SELECT `dsf_shipping_id` FROM `dsf_shipping` WHERE `status`=1 order by `sort_index` desc,`dsf_shipping_code`";
      $dsf_shipping_opens = $db->Execute($dsf_shipping_query);
      $data = array('countries_iso_code_2'=>$country_info['countries_iso_code_2'], 'total_weight'=>$total_weight);
      if(!$dsf_shipping_opens->EOF) {
      	$dsf_shipping_open = '';
      	$dsf_shipping_i = 0;
      	while (!$dsf_shipping_opens->EOF) {
      		$dsf_shipping_open .= ($dsf_shipping_i == 0 ? '' : ',');
      		$dsf_shipping_open .= $dsf_shipping_opens->fields['dsf_shipping_id'];
      		++$dsf_shipping_i;
      		$dsf_shipping_opens->MoveNext();
      	}
      	if($dsf_shipping_open != '') {
      		$data['dsf_shipping_open'] = $dsf_shipping_open;
      	}
      }
      $shipping_account_info = $db->Execute('SELECT `company_id`, `packet_codes` FROM `dsf_account_info` WHERE `id`=1 limit 1');
      if(!$shipping_account_info->EOF) {
      	$data['company_id'] = $shipping_account_info->fields['company_id'];
      	$data['packet_codes'] = $shipping_account_info->fields['packet_codes'];
      }
      
  	  //get data from mazentop
  	  $dsf_shippings = mazentop_estimator_post(EXTRA_4PX_URL, $data);
  } else {
	  require(DIR_WS_CLASSES . 'DSFShipping.php');
	  $objDSFShipping = new DSFShipping();
	  
	  //var_dump($country_info, $total_weight);
	  $dsf_shippings = $objDSFShipping->calculate($country_info['countries_iso_code_2'], $total_weight);
  }
  $quotes = array_merge($dsf_shippings, $quotes);
  //end 4px shipping
  //print_r($quotes);
  //die('here');
  $order->info['subtotal'] = $_SESSION['cart']->show_total();

  // set selections for displaying
  $selected_country = $order->delivery['country']['id'];
  $selected_address = $sendto;
  //}
  // eo shipping cost
  // check free shipping based on order $total
  if ( defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && (MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true')) {
    switch (MODULE_ORDER_TOTAL_SHIPPING_DESTINATION) {
      case 'national':
      if ($order->delivery['country_id'] == STORE_COUNTRY) $pass = true; break;
      case 'international':
      if ($order->delivery['country_id'] != STORE_COUNTRY) $pass = true; break;
      case 'both':

      $pass = true; break;
      default:
      $pass = false; break;
    }
    $free_shipping = false;
    if ( ($pass == true) && ($_SESSION['cart']->show_total() >= MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER)) {
      $free_shipping = true;
      include(DIR_WS_LANGUAGES . $_SESSION['language'] . '/modules/order_total/ot_shipping.php');
    }
  } else {
    $free_shipping = false;
  }
  // begin shipping cost
  if(!$free_shipping && $_SESSION['cart']->get_content_type() !== 'virtual'){
    if (zen_not_null($_POST['scid'])){
      list($module, $method) = explode('_', $_POST['scid']);
      $_SESSION['cart_sid'] = $_POST['scid'];
    }elseif ($_SESSION['cart_sid']){
      list($module, $method) = explode('_', $_SESSION['cart_sid']);
    }else{
      $module="";
      $method="";
    }
    if (zen_not_null($module)){
      $selected_quote = $shipping_modules->quote($method, $module);
      if($selected_quote[0]['error'] || !zen_not_null($selected_quote[0]['methods'][0]['cost'])){
        $selected_shipping = $shipping_modules->cheapest();
        $order->info['shipping_method'] = $selected_shipping['title'];
        $order->info['shipping_cost'] = $selected_shipping['cost'];
        $order->info['total']+= $selected_shipping['cost'];
      }else{
        $order->info['shipping_method'] = $selected_quote[0]['module'].' ('.$selected_quote[0]['methods'][0]['title'].')';
        $order->info['shipping_cost'] = $selected_quote[0]['methods'][0]['cost'];
        $order->info['total']+= $selected_quote[0]['methods'][0]['cost'];
        $selected_shipping['title'] = $order->info['shipping_method'];
        $selected_shipping['cost'] = $order->info['shipping_cost'];
        $selected_shipping['id'] = $selected_quote[0]['id'].'_'.$selected_quote[0]['methods'][0]['id'];
      }
    }else{
      $selected_shipping = $shipping_modules->cheapest();
      $order->info['shipping_method'] = $selected_shipping['title'];
      $order->info['shipping_cost'] = $selected_shipping['cost'];
      $order->info['total']+= $selected_shipping['cost'];
    }
  }
  // virtual products need a free shipping
  if($_SESSION['cart']->get_content_type() == 'virtual') {
    $order->info['shipping_method'] = CART_SHIPPING_METHOD_FREE_TEXT . ' ' . CART_SHIPPING_METHOD_ALL_DOWNLOADS;
    $order->info['shipping_cost'] = 0;
  }
  if($free_shipping) {
    $order->info['shipping_method'] = MODULE_ORDER_TOTAL_SHIPPING_TITLE;
    $order->info['shipping_cost'] = 0;
  }
  $shipping=$selected_shipping;
  
  $show_in = FILENAME_SHIPPING_ESTIMATOR;

// This is done after quote-calcs in order to include Tare info accurately.  NOTE: tare values are *not* included in weights shown on-screen.
  $totalsDisplay = 'Total Weight: ' . $shipping_estimator_display_weight . TEXT_PRODUCT_WEIGHT_UNIT;

}
?>
