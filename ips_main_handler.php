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
// | Portions may be Copyright (c) 2004 DevosC.com                       |
// |                                                                      |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: ips_main_handler.php 001 2005-10-24 00:00:00 jack $
//
  if (!is_array($_GET)) {
   die();
  }

require('includes/modules/payment/ips/ipn_application_top.php');
$session_get = zen_db_input(zen_db_prepare_input($_GET['billno']));
$session_stuff = explode('=', $session_get);

$sql = "select * from " . TABLE_IPS_SESSION . " where unique_id = '" . $session_stuff[1] . "'";
$stored_session = $db->Execute($sql);
    if ($stored_session->recordCount() < 1) {
      die();
    }

$_SESSION = unserialize(base64_decode($stored_session->fields['saved_session']));
require('includes/languages/english/checkout_process.php');

//build post string
// foreach($_POST as $i=>$v) {
//   $postdata.= $i . "=" . urlencode(stripslashes($v)) . "&";
// }

  require(DIR_WS_CLASSES . 'shipping.php');
  require(DIR_WS_CLASSES . 'payment.php');
  $payment_modules = new payment($_SESSION['payment']);
  $shipping_modules = new shipping($_SESSION['shipping']);

/**
'适用对象:Window2000/NT用户

'验证方式：
'	交易返回接口采用Md5摘要验证(RetEncodeType=12)

'参考对象:交易返回接口采用Md5摘要验证(RetEncodeType=12)
'明文信息:Md5摘要原文=订单编号+订单金额+订单日期+成功标志+IPS订单编号+RMB+IPS证书
'验证结果:将下列函数的结果signature1转成小写字符与IPS返回的signature字段比较
'		 若相等，则表示验证成功
'		 若不等，则表示验证失败
**/
	//----------------------------------------------------
	//  接收数据
	//  Receive the data
	//----------------------------------------------------
	$billno = $_GET['billno'];    // 对应订单支付接口的【订单编号—Billno】参数
	$amount = $_GET['amount'];    // 对应订单支付接口的【订单金额—Amount】参数
	$ipsdate = $_GET['date'];      // 对应订单支付接口的【订单日期—Date】参数
	$succ = $_GET['succ'];        // Y:支付成功；N：支付失败
	$msg = $_GET['msg'];          // 银行交易结束后给予的支付结果提示
	$attach = $_GET['attach'];    // 对应订单支付接口的【商户数据包—Attach】参数
	$ipsbillno = $_GET['ipsbillno'];           // 商户订单在IPS的唯一编号
	$retEncodeType = $_GET['retencodetype'];   // 返回给商户其所选用的交易返回签名方式
	$currency_type = $_GET['Currency_type'];   // 支付币种
	$signature = $_GET['signature'];           // IPS返回的交易签名信息签名

	//----------------------------------------------------
	//   Md5摘要认证
	//   verify  md5
	//----------------------------------------------------
	$content = $billno . $amount . $ipsdate . $succ . $ipsbillno . $currency_type . MODULE_PAYMENT_IPS_MD5KEY;

	//----------------------------------------------------
	//  判断交易是否成功
	//  See the successful flag of this transaction
	//----------------------------------------------------
    if (!($succ=="Y")) {
  	   $messageStack->add_session('checkout_payment', 'transaction failed!', 'error');
       zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
    }

	//----------------------------------------------------
	//   Md5摘要认证
	//   verify  md5
	//----------------------------------------------------

   if (!($signature == md5($content))) {
       $messageStack->add_session('checkout_payment', 'signature error!', 'error');
       zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
   }

	//----------------------------------------------------
	//比较返回的订单号和金额与数据库中的金额是否相符
	//compare the billno and amount from ips with the data recorded in your datebase
	//----------------------------------------------------  
	$oamount = number_format(($order->info['total']) * $currencies->get_value('CNY'), 2, '.', '');	
	if (!($oamount == $amount)) {
		// $messageStack->add_session('checkout_payment', '返回的金额和本地记录的不符合，失败！', 'error');
		// zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
	}

  require(DIR_WS_CLASSES . 'order.php');
  $order = new order();
  if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '2.0 订单开始/订单总额 ' . $_SESSION['payment'] );

  require(DIR_WS_CLASSES . 'order_total.php');
  $order_total_modules = new order_total();
  $order_totals = $order_total_modules->process();

  if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '3.0 检测交易号 ' . '#'.$billno);

// see if this is a existing order
  $zen_action = '';
  $sql = "select * from " . TABLE_IPS . " where billno = '" . $billno . "'";
  if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '4.0 开始test_ipn: ' . $sql);

  $test_ipn = $db->Execute($sql);
  if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '5.0 通过test_ipn: ');

  if ($test_ipn->RecordCount()>0) {
     $zen_action = 'update';
  } else {
     $zen_action = 'new';
  }
  $test_order = $db->Execute("select orders_status from " . TABLE_ORDERS . " where orders_id = '" . $test_ipn->fields['zen_order_id'] . "'");

  switch ($zen_action) {
    case 'new':
      if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '7.0 处理sendOff事件');
      $new_order_id = $order->create($order_totals);

      $ips_order = array(
                        'zen_order_id' => $new_order_id,
                        'billno' => $billno,
                        'amount' => $amount,
						'ipsdate' => $ipsdate,
                        'succ' => $succ,
                        'msg' => $msg,
                        'attach' => $attach,
                        'ipsbillno' => $ipsbillno,
                        'retEncodeType' => $retEncodeType,
                        'currency_type' => $currency_type,
                        'signature' => $signature
                        );

      zen_db_perform(TABLE_IPS, $ips_order);

      $insert_id = $db->Insert_ID();

      $ips_order_history = array (
                                     'ips_ipn_id' => $insert_id,
                                     'billno' => $billno,
                                     'amount' => $amount,
	             					 'ipsdate' => $ipsdate,
                                     'succ' => $succ,
                                     'msg' => $msg,
                                     'attach' => $attach,
                                     'ipsbillno' => $ipsbillno,
                                     'retEncodeType' => $retEncodeType,
                                     'currency_type' => $currency_type,
                                     'signature' => $signature
                                    );

      zen_db_perform(TABLE_IPS_PAYMENT_STATUS_HISTORY, $ips_order_history);

      $new_status = MODULE_PAYMENT_IPS_PROCESSING_STATUS_ID;
      $sql_data_array = array('orders_id' => $new_order_id,
                          'orders_status_id' => $new_status,
                          'date_added' => 'now()',
                          'comments' => 'IPS Order: ' . $ipsbillno . ' - Amount Paid: ' . $amount ,
                          'customer_notified' => false
                          );

      zen_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);

      $order->create_add_products($new_order_id, 2);
      if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '7.7 完成订单');
      $order->send_order_email($new_order_id, 2);
      $_SESSION['cart']->reset(true);

      break;
    case 'update':
          $ips_order_history = array (
                                     'ips_ipn_id' => $test_ipn->fields['ips_ipn_id'],
                                     'billno' => $billno,
                                     'amount' => $amount,
	             					 'ipsdate' => $ipsdate,
                                     'succ' => $succ,
                                     'msg' => $msg,
                                     'attach' => $attach,
                                     'ipsbillno' => $ipsbillno,
                                     'retEncodeType' => $retEncodeType,
                                     'currency_type' => $currency_type,
                                     'signature' => $signature
                                    );

          $sql_data_array = array ('orders_id' => $test_ipn->fields['zen_order_id'],
                          'orders_status_id' => $test_order->fields['orders_status'],
                          'date_added' => 'now()',
                          'comments' => 'IPS Order update: ' . $ipsbillno . ' - Amount Paid: ' . $amount . ' - IPS Date: ' . $ipsdate,
                          'customer_notified' => false
                          );

          zen_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);

          zen_db_perform(TABLE_IPS_PAYMENT_STATUS_HISTORY, $ips_order_history);

          if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes')  mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '8.0 已更新IPS订单历史记录' );
        break;

    default:
      if (MODULE_PAYMENT_IPS_IPN_DEBUG == 'Yes') mail(MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS,'IPS付款通知调试信息', '89. 非法操作 ' . '#'.$_GET['order_no'].'#'.$_GET['action'].'#');

  }

?>