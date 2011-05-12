<?php
/**
 * Checkout Shipping Page
 *
 * @package page
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 6669 2007-08-16 10:05:49Z drbyte $
 */
// This should be first line of the script:

// caizhoquing coupon bof  
//include('includes/modules/order_total/ot_coupon.php');
//$k = new ot_coupon;
//$k->collect_posts();

if(isset($_POST['payment'])){
	$_SESSION['coupons']['payment_choose'] = $_POST['payment'];
}

if(isset($_POST['shipping'])){
	$_SESSION['coupons']['choose_shipping']=$_POST['shipping'];
}
  if ('paypalwpp' == $_REQUEST['payment'] && $_POST['in_special_checkout'] != '1') {
		zen_redirect('ipn_main_handler.php?type=ec');
		exit;
  }
  $zco_notifier->notify('NOTIFY_HEADER_START_CHECKOUT_SHIPPING');
  
  require_once(DIR_WS_CLASSES . 'http_client.php');
  require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));
  
// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($_SESSION['cart']->count_contents() <= 0) {
	  $messageStack->add_session('login','Your session has expired.','error');
	  zen_redirect(zen_href_link(FILENAME_CHECKOUT_LOGIN));
  }
 if (!empty($_POST['comments'])) {
     $_SESSION['comments']= $_POST['comments'];
  }
// if the customer is not logged on, redirect them to the login page
  if (!isset($_SESSION['customer_id']) || !$_SESSION['customer_id']) {
    $_SESSION['navigation']->set_snapshot();
    zen_redirect(zen_href_link(FILENAME_CHECKOUT_LOGIN, '', 'SSL'));
  } else {
    // validate customer
    if (zen_get_customer_validate_session($_SESSION['customer_id']) == false) {
      $_SESSION['navigation']->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_CHECKOUT_SHIPPING));
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_LOGIN, '', 'SSL'));
    }
  }

// Validate Cart for checkout
  $_SESSION['valid_to_checkout'] = true;
  $_SESSION['cart']->get_products(true);
  if ($_SESSION['valid_to_checkout'] == false) {
    $messageStack->add('header', ERROR_CART_UPDATE, 'error');
    zen_redirect(zen_href_link(FILENAME_SHOPPING_CART));
  }

// Stock Check
  if ( (STOCK_CHECK == 'true') && (STOCK_ALLOW_CHECKOUT != 'true') ) {
    $products = $_SESSION['cart']->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      if (zen_check_stock($products[$i]['id'], $products[$i]['quantity'])) {
        zen_redirect(zen_href_link(FILENAME_SHOPPING_CART));
        break;
      }
    }
  }

// if no shipping destination address was selected, use the customers own address as default
  if (!$_SESSION['sendto']) {
    $_SESSION['sendto'] = $_SESSION['customer_default_address_id'];
  } else {
// verify the selected shipping address
    $check_address_query = "SELECT count(*) AS total
                            FROM   " . TABLE_ADDRESS_BOOK . "
                            WHERE  customers_id = :customersID
                            AND    address_book_id = :addressBookID";

    $check_address_query = $db->bindVars($check_address_query, ':customersID', $_SESSION['customer_id'], 'integer');
    $check_address_query = $db->bindVars($check_address_query, ':addressBookID', $_SESSION['sendto'], 'integer');
    $check_address = $db->Execute($check_address_query);
    
    if ($check_address->fields['total'] != '1') {
      $_SESSION['sendto'] = $_SESSION['customer_default_address_id'];
      $_SESSION['shipping'] = '';
    }
  }

// if no billing destination address was selected, use the customers own address as default
if (!$_SESSION['billto']) {
  $_SESSION['billto'] = $_SESSION['customer_default_address_id'];
} else {
  // verify the selected billing address
  $check_address_query = "SELECT count(*) AS total FROM " . TABLE_ADDRESS_BOOK . "
                          WHERE customers_id = :customersID
                          AND address_book_id = :addressBookID";

  $check_address_query = $db->bindVars($check_address_query, ':customersID', $_SESSION['customer_id'], 'integer');
  $check_address_query = $db->bindVars($check_address_query, ':addressBookID', $_SESSION['billto'], 'integer');
  $check_address = $db->Execute($check_address_query);

  if ($check_address->fields['total'] != '1') {
    $_SESSION['billto'] = $_SESSION['customer_default_address_id'];
    $_SESSION['payment'] = '';
  }
}
// Stock Check
if ( (STOCK_CHECK == 'true') && (STOCK_ALLOW_CHECKOUT != 'true') ) {
  $products = $_SESSION['cart']->get_products();
  for ($i=0, $n=sizeof($products); $i<$n; $i++) {
    if (zen_check_stock($products[$i]['id'], $products[$i]['quantity'])) {
      zen_redirect(zen_href_link(FILENAME_SHOPPING_CART));
      break;
    }
  }
}

// get coupon code
if ($_SESSION['cc_id']) {
  $discount_coupon_query = "SELECT coupon_code
                            FROM " . TABLE_COUPONS . "
                            WHERE coupon_id = :couponID";

  $discount_coupon_query = $db->bindVars($discount_coupon_query, ':couponID', $_SESSION['cc_id'], 'integer');
  $discount_coupon = $db->Execute($discount_coupon_query);
}
  


  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;
  
// register a random ID in the session to check throughout the checkout procedure
// against alterations in the shopping cart contents
  $_SESSION['cartID'] = $_SESSION['cart']->cartID;

// if the order contains only virtual products, forward the customer to the billing page as
// a shipping address is not needed
  if ($order->content_type == 'virtual') {
    $_SESSION['shipping'] = 'free_free';
    $_SESSION['shipping']['title'] = 'free_free';
    $_SESSION['sendto'] = false;
    //zen_redirect(zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  }
  
  $showTotal = $_SESSION['cart']->show_total();
  $total_weight = $_SESSION['cart']->show_weight();
  $total_count = $_SESSION['cart']->count_contents();
  
// load all enabled shipping modules
  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping;

  require(DIR_WS_CLASSES . 'order_total.php');
	$order_total_modules = new order_total;
	if(empty($_POST['gv_redeem_code'])){//Morrowind update
	$order_total_modules->collect_posts();
	$order_total_modules->pre_confirmation_check();
	}
	
	$groupPricingTmp = array();
	$groupPricingTmp = $GLOBALS['ot_group_pricing']->calculate_deductions($showTotal);
  $groupPricing = $groupPricingTmp['total'];
  
  if ( defined('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING') && (MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING == 'true') ) {
    $pass = false;

    switch (MODULE_ORDER_TOTAL_SHIPPING_DESTINATION) {
      case 'national':
        if ($order->delivery['country_id'] == STORE_COUNTRY) {
          $pass = true;
        }
        break;
      case 'international':
        if ($order->delivery['country_id'] != STORE_COUNTRY) {
          $pass = true;
        }
        break;
      case 'both':
        $pass = true;
        break;
    }

    $free_shipping = false;
    if ( ($pass == true) && ($_SESSION['cart']->show_total() >= MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER) ) {
      $free_shipping = true;
    }
  } else {
    $free_shipping = false;
  }

  

  if (isset($_SESSION['comments'])) {
    $comments = $_SESSION['comments'];
  }

// get all available shipping quotes
  $quotes = $shipping_modules->quote();
  
  $country_info = zen_get_countries($order->delivery['country_id'], true);
  
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
  if(!empty($_POST['gv_redeem_code'])){   //Morrowind Add
	$gv_choose_shipping=!empty($_SESSION['coupons']['choose_shipping'])?explode('_',$_SESSION['coupons']['choose_shipping']):0;
		for($i=0;$i<sizeof($quotes);$i++){
			if($gv_choose_shipping[0]==$quotes[$i]['id']){
				$_SESSION['gv_methods_array']=$quotes[$i]['methods'][0];
			}
		}
	//print_r($_SESSION);echo '<hr />';print_r($dsf_shippings);echo '<hr />';print_r($quotes);echo '<hr />';print_r($_SESSION['coupons']['choose_shipping']);die($gv_choose_shipping[0]);
	$order_total_modules->collect_posts();
	$order_total_modules->pre_confirmation_check();
	}

// if no shipping method has been selected, automatically select the cheapest method.
// if the modules status was changed when none were available, to save on implementing
// a javascript force-selection method, also automatically select the cheapest shipping
// method if more than one module is now enabled
  if ( !$_SESSION['shipping'] || ( $_SESSION['shipping'] && ($_SESSION['shipping'] == false) && (zen_count_shipping_modules() > 1) ) ) $_SESSION['shipping'] = $shipping_modules->cheapest();
  // Should address-edit button be offered?
  $displayAddressEdit = (MAX_ADDRESS_BOOK_ENTRIES >= 2);

  // if shipping-edit button should be overridden, do so
  $editShippingButtonLink = zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL');	
  if (isset($_SESSION['payment']) && method_exists($$_SESSION['payment'], 'alterShippingEditButton')) {
    $theLink = $$_SESSION['payment']->alterShippingEditButton();
    if ($theLink) {
      $editShippingButtonLink = $theLink;
      $displayAddressEdit = true;
    }
  }
  
if ($_SESSION['cc_id']) {
  $discount_coupon_query = "SELECT coupon_code
                            FROM " . TABLE_COUPONS . "
                            WHERE coupon_id = :couponID";

  $discount_coupon_query = $db->bindVars($discount_coupon_query, ':couponID', $_SESSION['cc_id'], 'integer');
  $discount_coupon = $db->Execute($discount_coupon_query);

  $customers_referral_query = "SELECT customers_referral
                               FROM " . TABLE_CUSTOMERS . "
                               WHERE customers_id = :customersID";

  $customers_referral_query = $db->bindVars($customers_referral_query, ':customersID', $_SESSION['customer_id'], 'integer');
  $customers_referral = $db->Execute($customers_referral_query);

  // only use discount coupon if set by coupon
  if ($customers_referral->fields['customers_referral'] == '' and CUSTOMERS_REFERRAL_STATUS == 1) {
    $sql = "UPDATE " . TABLE_CUSTOMERS . "
            SET customers_referral = :customersReferral
            WHERE customers_id = :customersID";

    $sql = $db->bindVars($sql, ':customersID', $_SESSION['customer_id'], 'integer');
    $sql = $db->bindVars($sql, ':customersReferral', $discount_coupon->fields['coupon_code'], 'string');
    $db->Execute($sql);
  } else {
    // do not update referral was added before
  }
}

  //TODO merge shipping payment
  // load all enabled payment modules
	require(DIR_WS_CLASSES . 'payment.php');
	$payment_modules = new payment;
	$flagOnSubmit = sizeof($payment_modules->selection());
	$_SESSION['payment'] = 'westernunion';
	if (isset($_POST['place_order']) && $_POST['place_order'] == 'place_order'){
	  if ($_REQUEST['payment'] != '' ) {
      $_SESSION['payment'] = zen_db_prepare_input($_REQUEST['payment']);
    }
	    // process the selected payment method
    $payment_modules = new payment($_SESSION['payment']);
    $payment_modules->update_status();
    if (($_SESSION['payment'] == '' && !$credit_covers) || (is_array($payment_modules->modules)) && (sizeof($payment_modules->modules) > 1) && (!is_object($$_SESSION['payment'])) && (!$credit_covers) ) {
      $messageStack->add_session('checkout_payment', ERROR_NO_PAYMENT_MODULE_SELECTED, 'error');
    }
    
    if (is_array($payment_modules->modules)) {
      $payment_modules->pre_confirmation_check();
    }
    
    if ($messageStack->size('checkout_payment') > 0) {
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
    }
    //echo $messageStack->size('checkout_payment');
    //die('here');
    
    // Stock Check
    $flagAnyOutOfStock = false;
    $stock_check = array();
    if (STOCK_CHECK == 'true') {
      for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
        if ($stock_check[$i] = zen_check_stock($order->products[$i]['id'], $order->products[$i]['qty'])) {
          $flagAnyOutOfStock = true;
        }
      }
      // Out of Stock
      if ( (STOCK_ALLOW_CHECKOUT != 'true') && ($flagAnyOutOfStock == true) ) {
        zen_redirect(zen_href_link(FILENAME_SHOPPING_CART));
      }
    }
    
    // update customers_referral with $_SESSION['gv_id']
    if ($_SESSION['cc_id']) {
      $discount_coupon_query = "SELECT coupon_code
                                FROM " . TABLE_COUPONS . "
                                WHERE coupon_id = :couponID";
    
      $discount_coupon_query = $db->bindVars($discount_coupon_query, ':couponID', $_SESSION['cc_id'], 'integer');
      $discount_coupon = $db->Execute($discount_coupon_query);
    
      $customers_referral_query = "SELECT customers_referral
                                   FROM " . TABLE_CUSTOMERS . "
                                   WHERE customers_id = :customersID";
    
      $customers_referral_query = $db->bindVars($customers_referral_query, ':customersID', $_SESSION['customer_id'], 'integer');
      $customers_referral = $db->Execute($customers_referral_query);
    
      // only use discount coupon if set by coupon
      if ($customers_referral->fields['customers_referral'] == '' and CUSTOMERS_REFERRAL_STATUS == 1) {
        $sql = "UPDATE " . TABLE_CUSTOMERS . "
                SET customers_referral = :customersReferral
                WHERE customers_id = :customersID";
    
        $sql = $db->bindVars($sql, ':customersID', $_SESSION['customer_id'], 'integer');
        $sql = $db->bindVars($sql, ':customersReferral', $discount_coupon->fields['coupon_code'], 'string');
        $db->Execute($sql);
      } else {
        // do not update referral was added before
      }
		}

    if (isset($$_SESSION['payment']->form_action_url)) {
      $form_action_url = $$_SESSION['payment']->form_action_url;
    } else {
      $form_action_url = zen_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL');
    }
      // process the selected shipping method
    if (zen_not_null($_POST['comments'])) {
      $_SESSION['comments'] = zen_db_prepare_input($_POST['comments']);
    }
    $comments = $_SESSION['comments'];

    if ( (zen_count_shipping_modules() > 0) || ($free_shipping == true) ) {
		
      if ( (isset($_POST['insurance_checked'])) && $_POST['insurance_checked'] == "false" ) {
	  	$insurance_checked = $_SESSION['insurance']['price'];
		$_SESSION['coupons']['insurance_checked']="true";
	  }
	  if (isset($_POST['coupon_prices']) && $_POST['coupon_prices'] != "" ) {
	  	$_SESSION['coupons']['prices'] = $_POST['coupon_prices'];  
	  }
	  
	  if ( (isset($_POST['shipping'])) && (strpos($_POST['shipping'], '_')) ) {
        $_SESSION['shipping'] = $_POST['shipping'];
		
        list($module, $method) = explode('_', $_SESSION['shipping']);
        if ( is_object($$module) || ($_SESSION['shipping'] == 'free_free') ) {
          if ($_SESSION['shipping'] == 'free_free') {
            $quote[0]['methods'][0]['title'] = FREE_SHIPPING_TITLE;
            $quote[0]['methods'][0]['cost'] = '0';
          } else {
            $quote = $shipping_modules->quote($method, $module);
          }
          if (isset($quote['error'])) {
            $_SESSION['shipping'] = '';
          } else {
            if ( (isset($quote[0]['methods'][0]['title'])) && (isset($quote[0]['methods'][0]['cost'])) ) {
              $_SESSION['shipping'] = array('id' => $_SESSION['shipping'],
                                'title' => (($free_shipping == true) ?  $quote[0]['methods'][0]['title'] : $quote[0]['module'] . ' (' . $quote[0]['methods'][0]['title'] . ')'),
                                'cost' => ($quote[0]['methods'][0]['cost'] + $insurance_checked));    //caizhouqing update cost

              zen_redirect(zen_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL'));
            }
          }
        } else {
          $is_dsf_shipping = false;
          foreach ($dsf_shippings as $dsf_shipping) {
            if ($dsf_shipping['id'] == $module) {
              $dsf_shipping['methods'][0]['cost'] += $insurance_checked;
              $_SESSION['shipping'] = $dsf_shipping['methods'][0];
              
              $is_dsf_shipping = true;
              zen_redirect(zen_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL'));
              break;
            }
          }
          if (!$is_dsf_shipping) {
            $_SESSION['shipping'] = false;
          }
        }
      }
    } else {
      $_SESSION['shipping'] = false;

      zen_redirect(zen_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL'));
    }
    
  }
//order no	
$_SESSION['paypal_no'] = date('YmdHis').rand(10,20);

$_SESSION['insurance']['price_str'] = $currencies->display_price(1.99,0);
$_SESSION['insurance']['price'] = 1.99 * $currencies->get_value($_SESSION['currency']);

$breadcrumb->add(NAVBAR_TITLE_1, zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
$breadcrumb->add(NAVBAR_TITLE_2);

// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_CHECKOUT_SHIPPING');

?>