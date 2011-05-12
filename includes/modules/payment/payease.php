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
// |                                                                      |
// |   DevosC, Developing open source Code                                |
// |   Copyright (c) 2004 DevosC.com                                      |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: payease.php 001 2008-03-20 Jack $
//

 class payease {
   var $code, $title, $description, $enabled;
  /**
   * order status setting for pending orders
   *
   * @var int
   */
   var $order_pending_status = 1;
  /**
   * order status setting for completed orders
   *
   * @var int
   */
   var $order_status = DEFAULT_ORDERS_STATUS_ID;

// class constructor
   function payease() {
     global $order;
       $this->code = 'payease';
    if ($_GET['main_page'] != '') {
       $this->title = MODULE_PAYMENT_PAYEASE_TEXT_CATALOG_TITLE; // Payment Module title in Catalog
    } else {
       $this->title = MODULE_PAYMENT_PAYEASE_TEXT_ADMIN_TITLE; // Payment Module title in Admin
    }
       $this->description = MODULE_PAYMENT_PAYEASE_TEXT_DESCRIPTION;
       $this->sort_order = MODULE_PAYMENT_PAYEASE_SORT_ORDER;
       $this->enabled = ((MODULE_PAYMENT_PAYEASE_STATUS == 'True') ? true : false);
       if ((int)MODULE_PAYMENT_PAYEASE_ORDER_STATUS_ID > 0) {
         $this->order_status = MODULE_PAYMENT_PAYEASE_ORDER_STATUS_ID;
       }
       if (is_object($order)) $this->update_status();
       $this->form_action_url = MODULE_PAYMENT_PAYEASE_HANDLER;

   }

// class methods
   function update_status() {
     global $order, $db;

     if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_PAYEASE_ZONE > 0) ) {
       $check_flag = false;
       $check_query = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYEASE_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
       while (!$check_query->EOF) {
         if ($check_query->fields['zone_id'] < 1) {
           $check_flag = true;
           break;
         } elseif ($check_query->fields['zone_id'] == $order->billing['zone_id']) {
           $check_flag = true;
           break;
         }
                 $check_query->MoveNext();
       }

       if ($check_flag == false) {
         $this->enabled = false;
       }
     }
   }

   function javascript_validation() {
     return false;
   }

   function selection() {
     return array('id' => $this->code,
                   'module' => MODULE_PAYMENT_PAYEASE_TEXT_CATALOG_LOGO,
                   'icon' => MODULE_PAYMENT_PAYEASE_TEXT_CATALOG_LOGO
                   );
   }

   function pre_confirmation_check() {
     return false;
   }

   function confirmation() {
      return array('title' => MODULE_PAYMENT_PAYEASE_TEXT_DESCRIPTION);
   }

   function process_button() {
     global $db, $order, $currencies;

     $MD5key = MODULE_PAYMENT_PAYEASE_MD5KEY;				// MD5私钥
     $v_mid = MODULE_PAYMENT_PAYEASE_SELLER;				// 商户编号
	 $v_ymd =date("Ymd");									// 订单产生日期
	 $v_oid = $v_ymd . '-' . $v_mid . '-' . date("his");	// 订单编号
	 
	 $v_orderstatus = '1';		// 商户配货状态，0为未配齐，1为已配齐
	 
     if (MODULE_PAYMENT_PAYEASE_MONEYTYPE == 'CNY') {
      $v_moneytype = '0';
     } else {
      $v_moneytype = '1';
     }							// 支付币种，0为人民币，1为美元

	 if (MODULE_PAYMENT_PAYEASE_OSTYPE == 'Windows') {
      $v_ostype = 'MD5Win32';
     } else {
      $v_ostype = 'MD5Linux';
     }							// 网站的操作系统
	 
     $v_amount = number_format(($order->info['total']) * $currencies->get_value(MODULE_PAYMENT_PAYEASE_MONEYTYPE), 2, '.', '');	//金额

     $v_url = zen_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL'); 			//返回地址

	 if ($_SESSION['language'] == 'english') {
     	 $Language = '2';
     } else {
         $Language = '1';
     }		//语言

	$v_rcvname	 =	$v_mid;			// 收货人姓名，统一用商户编号的值代替
	$v_ordername =	$order->customer['lastname'] . $order->customer['firstname'];		// 订货人姓名
	$v_rcvaddr	 =	$order->customer['state'] . $order->customer['city'] . $order->customer['street_address'];	 // 收货人地址
	$v_rcvtel	 =	preg_replace('/\D/', '', $order->customer['telephone']);			// 收货人电话
	$v_rcvpost	 =	$order->customer['postcode'];										// 收货人邮政编码
	
    $md5src = $v_moneytype.$v_ymd.$v_amount.$v_rcvname.$v_oid.$v_mid.$v_url;	// 校验源字符串
    // $v_md5info = strtoupper(md5($md5src));												// MD5检验结果
	exec("./".$v_ostype." $md5src $MD5key",$v_md5info,$res);

    $process_button_string = zen_draw_hidden_field('v_mid', $v_mid) .
                              zen_draw_hidden_field('v_oid', $v_oid) .
                              zen_draw_hidden_field('v_rcvname', $v_rcvname) .
                              zen_draw_hidden_field('v_rcvaddr', $v_rcvaddr) .
                              zen_draw_hidden_field('v_rcvtel', $v_rcvtel) .
                              zen_draw_hidden_field('v_rcvpost', $v_rcvpost) .
                              zen_draw_hidden_field('v_amount', $v_amount) .
                              zen_draw_hidden_field('v_ymd', $v_ymd) .
							  zen_draw_hidden_field('v_orderstatus', $v_orderstatus) .
							  zen_draw_hidden_field('v_ordername', $v_ordername) .
                              zen_draw_hidden_field('v_moneytype', $v_moneytype) .
                              zen_draw_hidden_field('v_url', $v_url) .
							  zen_draw_hidden_field('v_md5info', $v_md5info) .                              zen_draw_hidden_field('Remark', $Remark)
                            ;

     return $process_button_string;
   }

   function before_process() {
      global $_POST, $order, $currencies, $messageStack;

	//定单编号
	$v_oid = $_POST["v_oid"];
	//支付方式
	$v_pstatus = $_POST["v_pstatus"];
	//支付结果：1－已提交，20－支付成功，30－支付失败
	$v_pstring = $_POST["v_pstring"];
	//支付结果信息
	$v_pmode = $_POST["v_pmode"];
	//MD5校验信息
	$v_md5info = $_POST["v_md5info"];
	//订单实际支付金额
	$v_amount = $_POST["v_amount"];
	//订单实际支付币种
	$v_moneytype = $_POST["v_moneytype"];
	//MD5校验信息
	$v_md5money = $_POST["v_md5money"]; 
	//商城数据签名
	$v_sign = $_POST["v_sign"];
	
	//MD5私钥
	$MD5key = MODULE_PAYMENT_PAYEASE_MD5KEY;
	//校验源字符串，v_md5money效验
	$md5src1 = $v_oid . $v_pstatus . $v_pstring . $v_pmode;
	//MD5检验结果，v_md5money效验
	// $md5sign1 = strtoupper(md5($md5src1));
	exec("./".$v_ostype." $md5src1 $MD5key",$md5sign1,$res1);

	//校验源字符串，v_md5money效验
	$md5src2 = $v_amount . $v_moneytype;
	//MD5检验结果，v_md5money效验
	// $md5sign2 = strtoupper(md5($md5src2));
	exec("./".$v_ostype." $md5src2 $MD5key",$md5sign2,$res2);

	 if (MODULE_PAYMENT_PAYEASE_MONEYTYPE == 'CNY') {
      $o_moneytype = '0';
     } else {
      $o_moneytype = '1';
     }							// 支付币种，0为人民币，1为美元
	 
//用于写入Zen Cart后台订单历史记录中的数据
    $this->v_oid = $v_oid;
    $this->v_amount = $v_amount;

    if ($v_md5info==$md5sign1) {
		if ($v_md5money==$md5sign2) {  
			$o_amount = number_format(($order->info['total']) * $currencies->get_value(MODULE_PAYMENT_PAYEASE_MONEYTYPE), 2, '.', '');	//金额
			if (($o_amount==$v_amount)&&($o_moneytype==$v_moneytype)) {
				return true ;  //订单成功
			}else{
				$messageStack->add_session('checkout_payment', '实付金额不符', 'error');
				zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
			}
		}else{
			$messageStack->add_session('checkout_payment', '效验二失败', 'error');
			zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
		}
    }else{
		$messageStack->add_session('checkout_payment', '效验一失败', 'error');
		zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
	}

   }

   function after_process() {
	global $insert_id,$db ;
	
    $db->Execute("insert into " . TABLE_ORDERS_STATUS_HISTORY . " (comments, orders_id, orders_status_id, date_added) values ('首信易支付 - 订单号: " . $this->v_oid . " - 实付金额: " . $this->v_amount . " ' , '". (int)$insert_id . "','" . $this->order_status . "', now() )");
	
	$_SESSION['order_created'] = '';
	return true;
   }

   function output_error() {
     return false;
   }

   function check() {
     global $db;
     if (!isset($this->_check)) {
       $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYEASE_STATUS'");
       $this->_check = $check_query->RecordCount();
     }
     return $this->_check;
   }

   function install() {
     global $db, $language, $module_type;
	 if (!defined('MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_1_1')) include(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/modules/' . $module_type . '/' . $this->code . '.php');

     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_1_1 . "', 'MODULE_PAYMENT_PAYEASE_STATUS', 'True', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_1_2 . "', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_2_1 . "', 'MODULE_PAYMENT_PAYEASE_SELLER', '888', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_2_2 . "', '6', '2', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_3_1 . "', 'MODULE_PAYMENT_PAYEASE_MD5KEY', 'test', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_3_2 . "', '6', '4', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_4_1 . "', 'MODULE_PAYMENT_PAYEASE_MONEYTYPE', 'CNY', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_4_2 . "', '6', '4', 'zen_cfg_select_option(array(\'CNY\', \'USD\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_5_1 . "', 'MODULE_PAYMENT_PAYEASE_OSTYPE', 'Windows', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_5_2 . "', '6', '4', 'zen_cfg_select_option(array(\'Windows\', \'Linux\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_6_1 . "', 'MODULE_PAYMENT_PAYEASE_ZONE', '0', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_6_2 . "', '6', '6', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_7_1 . "', 'MODULE_PAYMENT_PAYEASE_ORDER_STATUS_ID', '2', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_7_2 . "', '6', '10', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_8_1 . "', 'MODULE_PAYMENT_PAYEASE_SORT_ORDER', '0', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_8_2 . "', '6', '12', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_9_1 . "', 'MODULE_PAYMENT_PAYEASE_HANDLER', 'http://pay.beijing.com.cn/prs/user_payment.checkit', '" . MODULE_PAYMENT_PAYEASE_TEXT_CONFIG_9_2 . "', '6', '18', '', now())");
}

   function remove() {
     global $db;
     $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key LIKE  'MODULE_PAYMENT_PAYEASE%'");
   }

   function keys() {
     return array(
         'MODULE_PAYMENT_PAYEASE_STATUS',
         'MODULE_PAYMENT_PAYEASE_SELLER',
         'MODULE_PAYMENT_PAYEASE_MD5KEY',
         'MODULE_PAYMENT_PAYEASE_ZONE',
		 'MODULE_PAYMENT_PAYEASE_MONEYTYPE',
		 'MODULE_PAYMENT_PAYEASE_OSTYPE',
         'MODULE_PAYMENT_PAYEASE_ORDER_STATUS_ID',
         'MODULE_PAYMENT_PAYEASE_SORT_ORDER',
         'MODULE_PAYMENT_PAYEASE_HANDLER'
         );
   }
 }
?>