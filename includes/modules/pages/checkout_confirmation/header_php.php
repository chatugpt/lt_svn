<?php
/**
 * checkout_confirmation header_php.php
 *
 * @package page
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 6100 2007-04-01 10:24:05Z wilt $
 */

// This should be first line of the script:
$zco_notifier->notify('NOTIFY_HEADER_START_CHECKOUT_CONFIRMATION');

// if there is nothing in the customers cart, redirect them to the shopping cart page
if ($_SESSION['cart']->count_contents() <= 0) {
  $messageStack->add_session('login','Your session has expired.','error');
  zen_redirect(zen_href_link(FILENAME_CHECKOUT_LOGIN));
}

// if the customer is not logged on, redirect them to the login page
  if (!$_SESSION['customer_id']) {
    $_SESSION['navigation']->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_CHECKOUT_PAYMENT));
    zen_redirect(zen_href_link(FILENAME_CHECKOUT_LOGIN, '', 'SSL'));
  } else {
    // validate customer
    if (zen_get_customer_validate_session($_SESSION['customer_id']) == false) {
      $_SESSION['navigation']->set_snapshot();
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_LOGIN, '', 'SSL'));
    }
  }

// avoid hack attempts during the checkout procedure by checking the internal cartID
if (isset($_SESSION['cart']->cartID) && $_SESSION['cartID']) {
  if ($_SESSION['cart']->cartID != $_SESSION['cartID']) {
    zen_redirect(zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  }
}

// if no shipping method has been selected, redirect the customer to the shipping method selection page
if (!$_SESSION['shipping']) {
  zen_redirect(zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
}

if (isset($_REQUEST['payment'])) $_SESSION['payment'] = $_REQUEST['payment'];
if(empty($_SESSION['comments']) && !empty($_POST['comments'])){
   $_SESSION['comments']=$_POST['comments'];
}
//'checkout_payment_discounts'
//zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));


if (DISPLAY_CONDITIONS_ON_CHECKOUT == 'true') {
  if (!isset($_POST['conditions']) || ($_POST['conditions'] != '1')) {
    $messageStack->add_session('checkout_payment', ERROR_CONDITIONS_NOT_ACCEPTED, 'error');
  }
}
//echo $messageStack->size('checkout_payment');

require(DIR_WS_CLASSES . 'order.php');
$order = new order;
// load the selected shipping module



require(DIR_WS_CLASSES . 'order_total.php');
$order_total_modules = new order_total;
$order_total_modules->collect_posts();
$order_total_modules->pre_confirmation_check();

// load the selected payment module
require(DIR_WS_CLASSES . 'payment.php');
// BEGIN REWARDS POINTS

// if credit does not cover order total or isn't   selected
  if ($_SESSION['credit_covers'] != true) {
  // check that a gift   voucher isn't being used that is larger than the order
	if ($_SESSION['cot_gv'] < $order->info['total']) {
	  $credit_covers =   false;
	}
  }
// END REWARDS POINTS

if ($credit_covers) {
  unset($_SESSION['payment']);
  $_SESSION['payment'] = '';
}


require(DIR_WS_CLASSES . 'shipping.php');
$shipping_modules = new shipping($_SESSION['shipping']);

//@debug echo ($credit_covers == true) ? 'TRUE' : 'FALSE';

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

// if shipping-edit button should be overridden, do so
$editShippingButtonLink = zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL');	
if (method_exists($$_SESSION['payment'], 'alterShippingEditButton')) {
  $theLink = $$_SESSION['payment']->alterShippingEditButton();
  if ($theLink) $editShippingButtonLink = $theLink;
}
// deal with billing address edit button
$flagDisablePaymentAddressChange = false;
if (isset($$_SESSION['payment']->flagDisablePaymentAddressChange)) {
  $flagDisablePaymentAddressChange = $$_SESSION['payment']->flagDisablePaymentAddressChange;
}


/**获取当前订单�?**/
/*$orders_query = "SELECT * FROM " . TABLE_ORDERS . "
                 WHERE customers_id = :customersID
                 ORDER BY date_purchased DESC LIMIT 1";
$orders_query = $db->bindVars($orders_query, ':customersID', $_SESSION['customer_id'], 'integer');
$orders = $db->Execute($orders_query);
$orders_id = $orders->fields['orders_id'];*/


require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));
$breadcrumb->add(NAVBAR_TITLE_1, zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
$breadcrumb->add(NAVBAR_TITLE_2);

// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_CHECKOUT_CONFIRMATION');
?>

<?php
//paypal Jump is paypal
if(isset($_GET['main_page']) && $_GET['main_page'] == "checkout_confirmation"){?>
<style type="text/css">
h3 {
	margin:4em 0 0 0;
	line-height:normal;
	color: #1a3665;
}
p.note {margin:0 0 6em 0; color:#656565; font-size:1.0em;}
p.note a {color:#656565;}
.p_strong {color:#1a3665;}
h3 {font-size:1.5em;color: #1a3665;}
#main {text-align: center;width: 760px;
}
#main #main_top {
	text-align: left;
}
#line_bg {
	background-image: url(includes/templates/chanelwatches/images/nav_sprite.gif);
	height: 5px;
}
#main .c_img {
	background-image: url(includes/templates/chanelwatches/images/header_logginginAction.gif); width:186px; height:42px; margin:0 auto;
}
</style>
<center>
<div id="main">
<div id="main_top"><!--<img src="includes/templates/chanelwatches/images/paypal_logo.gif" width="200" height="50">-->
    <div id="line_bg"></div>
</div>
<h3>Jumping to payment page...</h3><br>
<div class="c_img"></div><br>
<br>
<p class="note">	
If this page shows more than 5 seconds, please <a onclick="javascript:document.checkout_confirmation.submit();" style="cursor:hand;"><font color="#FF0000"><u>Click here</u></font></a> Reload.</p>
<p><strong class="p_strong">Fast, secure and convenient payment.</strong></p>
</div>
</center>
<?php
	echo '<script src="includes/templates/chanelwatches/jscript/load.js"></script>';
	echo zen_draw_form('checkout_confirmation', $form_action_url, 'post', 'id="checkout_confirmation" onsubmit="submitonce();"');
	if (is_array($payment_modules->modules)) {
	echo $payment_modules->process_button();
	}
	echo "<div style='display:none'>".zen_image_submit(BUTTON_IMAGE_CONFIRM_ORDER, BUTTON_CONFIRM_ORDER_ALT, 'name="btn_submit" id="btn_submit"')."</div>";
	//print_r($GLOBALS[$class]);
	//print_r($ips);
	//echo $_SESSION['paypal_no'];
	//echo print_r($_SESSION['coupons']);
	//print_r($ot_insurance);
	//exit;
	echo "</form><script>document.checkout_confirmation.submit();</script>";
	exit;
	
} 
//paypay end?>