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
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: ips.php 001 2009-05-02 00:00:00 Jack $
//
 class ips {
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
   function ips($ips_ipn_id = '') {
     global $order;
       $this->code = 'ips';
    if ($_GET['main_page'] != '') {
       $this->title = MODULE_PAYMENT_IPS_TEXT_CATALOG_TITLE; // Payment Module title in Catalog
    } else {
       $this->title = MODULE_PAYMENT_IPS_TEXT_ADMIN_TITLE; // Payment Module title in Admin
    }
       $this->description = MODULE_PAYMENT_IPS_TEXT_DESCRIPTION;
       $this->sort_order = MODULE_PAYMENT_IPS_SORT_ORDER;
       $this->enabled = ((MODULE_PAYMENT_IPS_STATUS == 'True') ? true : false);
       if ((int)MODULE_PAYMENT_IPS_ORDER_STATUS_ID > 0) {
         $this->order_status = MODULE_PAYMENT_IPS_ORDER_STATUS_ID;
       }
       if (is_object($order)) $this->update_status();
       $this->form_action_url = (MODULE_PAYMENT_IPS_HANDLER == 'Live') ? "https://pay.ips.com.cn/ipayment.aspx" : "http://pay.ips.net.cn/ipayment.aspx";

   }

// class methods
   function update_status() {
     global $order, $db;

     if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_IPS_ZONE > 0) ) {
       $check_flag = false;
       $check_query = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_IPS_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
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
//    $gateway_type = array(array('id' => '01', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_1),
//                          array('id' => '02', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_2),
//						  array('id' => '04', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_3),
//						  array('id' => '08', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_4)
//						);

//    $onFocus = ' onfocus="methodSelect(\'pmt-' . $this->code . '\')"';

    $selection = array( 'id' => $this->code,
						'module' => MODULE_PAYMENT_IPS_TEXT_CATALOG_LOGO,
						'icon' => MODULE_PAYMENT_IPS_TEXT_CATALOG_LOGO,
//						'fields' => array(array('title' => MODULE_PAYMENT_IPS_TEXT_GATEWAY_TYPE,
//                                               'field' => zen_draw_pull_down_menu('ips_gateway_type', $gateway_type, '02', 'id="' . $this->code . '-gateway-type"' . $onFocus),
//                                               'tag' => $this->code . '-gateway-type'))
		               );

    return $selection;
  }

   function pre_confirmation_check() {
     return false;
   }

   function confirmation() {
//  global $_POST;
	
//  $gateway_type = array(array('id' => '01', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_1),
//                          array('id' => '02', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_2),
//						  array('id' => '04', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_3),
//						  array('id' => '08', 'text' => MODULE_PAYMENT_IPS_TEXT_SELECTION_4)
//						);

//	for ($i=0, $n=sizeof($gateway_type); $i<$n; $i++) {
//		if ($gateway_type[$i]['id'] == $_POST['ips_gateway_type']) {
//			$gateway_type_text = $gateway_type[$i]['text'];
//		}
//	}

    $confirmation = array('title' => MODULE_PAYMENT_IPS_TEXT_DESCRIPTION,
//                          'fields' => array(array('title' => MODULE_PAYMENT_IPS_TEXT_GATEWAY_TYPE . ': ',
//												  'field' => $gateway_type_text ) )
						 );

    return $confirmation;
  }

  function process_button() {
     global $db, $order, $currencies;

     // save the session stuff permanently in case ips loses the session
    // $db->Execute("delete from " . TABLE_IPS_SESSION . " where session_id = '" . zen_db_input(session_id()) . "'");

     $sql = "insert into " . TABLE_IPS_SESSION . " (session_id, saved_session, expiry) values (
            '" . zen_db_input(session_id()) . "',
            '" . base64_encode(serialize($_SESSION)) . "',
            '" . (time() + (1*60*60*24*2)) . "')";

     $db->Execute($sql);
     $last_unique_id = $db->Execute("select * from " . TABLE_IPS_SESSION . " order by unique_id desc limit 1");
     $ips_id = $last_unique_id->fields['unique_id'];

	// 订单交易日期
	$datestr = date('Ymd');
  
	// 订单号后6位，订单号为12位：6位商户号+6位随机号，一天内不能重复
	$billno = 'oid=' . $ips_id;
	//$billno = $_SESSION['paypal_no'];
	
	// 界面语言  GB---GB中文（缺省）、EN---英文、BIG5---BIG5中文、JP---日文、FR---法文
	switch ($_SESSION['language']) {
    	case 'english':
        	$strLang = 'EN';
        	break;
    	case 'schinese':
        	$strLang = 'GB';
        	break;
    	case 'tchinese':
        	$strLang = 'BIG5';
        	break;
    	case 'japanese':
        	$strLang = 'JP';
        	break;
    	case 'french':
        	$strLang = 'FR';
        	break;
    	default:
        	$strLang = 'GB';
   	}	

	// 反欺诈验证
	if ( MODULE_PAYMENT_IPS_ANTIFRAUD == 'True' ) {
		$strFraudGuard = '1';
	} else {
		$strFraudGuard = '0';		
	}

	// 产品名称、描述
	 $strProduct = STORE_NAME . MODULE_PAYMENT_IPS_TEXT_SELECTION_5;
	
     $strProductDescription = '';
     for ($i=0; $i<sizeof($order->products); $i++) {
        $strProductDescription = $order->products[$i]["name"] . "+" . $strProductDescription;
     }
     $strProductDescription = substr($strProductDescription,0,-1);
     if (strlen($strProductDescription) < 250) {
        $strProductDescription = substr($strProductDescription,0,strlen($strProductDescription));
     } else {
        $strProductDescription = substr($strProductDescription,250);
     }
     $strProductDescription = preg_replace('/\n/','',$strProductDescription); 

	$strShippingStreet = $order->customer['street_address'];
	$strShippingCity = $order->customer['city'];
	$strShippingStateorProvince = $order->customer['state'] ;
	$strShippingCountry = $order->customer['country']['iso_code_2'];
	$strShippingPostalCode = $order->customer['postcode'];
	
	$amount = number_format(($order->info['total']) * $currencies->get_value('CNY'), 2, '.', '');
	$dispamount = $currencies->format($order->info['total']);
	$strcontent = $billno . $amount . $datestr . 'RMB' . MODULE_PAYMENT_IPS_MD5KEY;		// 签名验证串
	$signmd5 = MD5($strcontent);

	$strRetUrl  = zen_href_link(FILENAME_CHECKOUT_PROCESS, 'referer=ips', 'SSL');
	$strRettype = 1;
	$strServerUrl = zen_href_link('ips_main_handler.php', '', 'SSL',false,false,true);

	$process_button_string = zen_draw_hidden_field('Mer_code', MODULE_PAYMENT_IPS_SELLER) .
	                         zen_draw_hidden_field('Billno', $billno) .
	                         zen_draw_hidden_field('Gateway_type', '02') .
	                         zen_draw_hidden_field('Currency_Type', 'RMB') .
	                         zen_draw_hidden_field('Amount', $amount) .
	                         zen_draw_hidden_field('Date', $datestr) .
	                         zen_draw_hidden_field('Lang', $strLang) .
	                         zen_draw_hidden_field('FraudGuard', $strFraudGuard) .
	                         zen_draw_hidden_field('Product', $strProduct) .
	                         zen_draw_hidden_field('ProductDescription', $strProductDescription) .
	                         zen_draw_hidden_field('ShippingStreet', $strShippingStreet) .
	                         zen_draw_hidden_field('ShippingCity', $strShippingCity) .
	                         zen_draw_hidden_field('ShippingStateorProvince', $strShippingStateorProvince) .
	                         zen_draw_hidden_field('ShippingCountry', $strShippingCountry) .
	                         zen_draw_hidden_field('ShippingPostalCode', $strShippingPostalCode) .
	                         zen_draw_hidden_field('Attach', 'zencartchina') .
	                         zen_draw_hidden_field('DispAmount', $dispamount) .   // 存放商户希望在IPS平台上选择银行界面上显示给持卡人的金额。
	                         zen_draw_hidden_field('OrderEncodeType', '2') .      // 订单支付采用Md5的摘要认证方式
							 zen_draw_hidden_field('RetEncodeType', '12') .       // 12：交易返回采用Md5的摘要认证方式
							 zen_draw_hidden_field('Merchanturl', $strRetUrl) .
							 zen_draw_hidden_field('Rettype', $strRettype) .      // Server to Server返回方式
							 zen_draw_hidden_field('ServerUrl', $strServerUrl) .  // 返回地址存于此字段
							 zen_draw_hidden_field('SignMD5', $signmd5)
                            ;

     return $process_button_string;
   }

   function before_process() {
    global $db, $_GET, $order_total_modules, $order, $messageStack;

    // now just need to check here whether we are here because of IPN or auto-return, we can use the referer variable for that
    // If we have come from auto return, check to see wether the order has been created by IPN and if not create it now.
    if (isset($_GET['referer']) && $_GET['referer'] == 'ips') {

	// auto-return
    $sql = "select * from " . TABLE_IPS . " where billno = '" . $_GET['billno'] . "'";
    $current_session = $db->Execute($sql);

    if ($current_session->recordCount() > 0) {
      $_SESSION['cart']->reset(true);
      unset($_SESSION['sendto']);
      unset($_SESSION['billto']);
      unset($_SESSION['shipping']);
      unset($_SESSION['payment']);
      unset($_SESSION['comments']);
      $order_total_modules->clear_posts();//ICW ADDED FOR CREDIT CLASS SYSTEM

      zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS, '', 'SSL', true, false));
    }

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
	$billno=$_GET['billno'];
	$amount=$_GET['amount'];
	$mydate=$_GET['date'];
	$succ=$_GET['succ'];
	$msg=$_GET['msg'];
	$attach=$_GET['attach'];
	$ipsbillno=$_GET['ipsbillno'];
	$retEncodeType=$_GET['retencodetype'];
	$currency_type=$_GET['Currency_type'];
	$signature=$_GET['signature'];

//用于写入Zen Cart后台订单历史记录中的数据
	$this->billno = $billno;
	$this->amount = $amount;
	$this->mydate = $mydate;
	$this->succ = $succ;
	$this->msg = $msg;
	$this->attach = $attach;
	$this->ipsbillno = $ipsbillno;
	$this->retEncodeType = $retEncodeType;
	$this->currency_type = $currency_type;
	$this->signature = $signature;

	//----------------------------------------------------
	//  判断交易是否成功
	//  See the successful flag of this transaction
	//----------------------------------------------------
	if ($succ=="Y"){
		//'----------------------------------------------------
		//'   Md5摘要认证
		//'   verify  md5
		//'----------------------------------------------------
		$content=$billno . $amount . $mydate . $succ . $ipsbillno . $currency_type;
		$cert = MODULE_PAYMENT_IPS_MD5KEY;

		//Md5摘要认证
		if ($content == "" || $cert == "") {
			$signature1 = "";
		} else {
			$signature_1ocal = md5($content . $cert);	
		}
		
		if ($signature_1ocal==$signature){
				/**'----------------------------------------------------
				'比较返回的订单号和金额与数据库中的金额是否相符
				'compare the billno and amount from ips with the data recorded in your datebase
				'----------------------------------------------------  
				$oamount = number_format(($order->info['total']) * $currencies->get_value('CNY'), 2, '.', '');
				if (!($oamount == $amount)) {
					$messageStack->add_session('checkout_payment', '返回的金额和本地记录的不符合，失败！', 'error');
					zen_redirect(zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL', true, false));
				} else {
					return true;
				}
				**/
				return true;
		}
		else{
			$messageStack->add_session('checkout_payment', '签名不正确！', 'error');
			zen_redirect(zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL', true, false));
		}
	} else {
		$messageStack->add_session('checkout_payment', '交易失败！', 'error');
		zen_redirect(zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL', true, false));
	}


    } else {
      // $this->notify('NOTIFY_PAYMENT_IPS_CANCELLED_DURING_CHECKOUT');
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'));
    }

   }

   function check_referrer($zf_domain) {
     return true;
   }

   function admin_notification($zf_order_id) {
     global $db;

     $sql = "select * from " . TABLE_IPS . " where zen_order_id = '" . $zf_order_id . "'";
     $ipn = $db->Execute($sql);
     require(DIR_FS_CATALOG. DIR_WS_MODULES . 'payment/ips/ips_admin_notification.php');
     return $output;
   }

   function after_process() {
	 global $insert_id, $db;

     $ips_order = array(
                        'zen_order_id' => $insert_id,
                        'billno' => $this->billno,
                        'amount' => $this->amount,
						'ipsdate' => $this->mydate,
                        'succ' => $this->succ,
                        'msg' => $this->msg,
                        'attach' => $this->attach,
                        'ipsbillno' => $this->ipsbillno,
                        'retEncodeType' => $this->retEncodeType,
                        'currency_type' => $this->currency_type,
                        'signature' => $this->signature
                        );

     zen_db_perform(TABLE_IPS, $ips_order);
	
     $db->Execute("insert into " . TABLE_ORDERS_STATUS_HISTORY . " (comments, orders_id, orders_status_id, date_added) values ('IPS Order: " . $this->ipsbillno . " - Amount Paid: " . $this->amount . " ' , '". (int)$insert_id . "','" . $this->order_status . "', now() )");

	 $_SESSION['order_created'] = '';
	 return true;
   }

   function output_error() {
     return false;
   }

   function check() {
     global $db;
     if (!isset($this->_check)) {
       $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_IPS_STATUS'");
       $this->_check = $check_query->RecordCount();
     }
     return $this->_check;
   }

   function install() {
     global $db, $language, $module_type;

	 if (!defined('MODULE_PAYMENT_IPS_TEXT_CONFIG_1_1')) include(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/modules/' . $module_type . '/' . $this->code . '.php');

     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_1_1 . "', 'MODULE_PAYMENT_IPS_STATUS', 'True', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_1_2 . "', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_2_1 . "', 'MODULE_PAYMENT_IPS_SELLER', '000015', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_2_2 . "', '6', '2', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_3_1 . "', 'MODULE_PAYMENT_IPS_MD5KEY', 'GDgLwwdK270Qj1w4xho8lyTpRQZV9Jm5x4NwWOTThUa4fMhEBK9jOXFrKRT6xhlJuU2FEa89ov0ryyjfJuuPkcGzO5CeVx5ZIrkkt1aBlZV36ySvHOMcNv8rncRiy3DQ', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_3_2 . "', '6', '3', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_9_1 . "', 'MODULE_PAYMENT_IPS_ANTIFRAUD', 'False', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_9_2 . "', '6', '4', 'zen_cfg_select_option(array(\'False\', \'True\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_4_1 . "', 'MODULE_PAYMENT_IPS_ZONE', '0', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_4_2 . "', '6', '6', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_5_1 . "', 'MODULE_PAYMENT_IPS_PROCESSING_STATUS_ID', '2', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_5_2 . "', '6', '8', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_6_1 . "', 'MODULE_PAYMENT_IPS_ORDER_STATUS_ID', '1', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_6_2 . "', '6', '10', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_7_1 . "', 'MODULE_PAYMENT_IPS_SORT_ORDER', '0', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_7_2 . "', '6', '12', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_8_1 . "', 'MODULE_PAYMENT_IPS_HANDLER', 'Test', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_8_2 . "', '6', '18', 'zen_cfg_select_option(array(\'Live\', \'Test\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_10_1 . "', 'MODULE_PAYMENT_IPS_IPN_DEBUG', 'Off', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_10_2 . "', '6', '20', 'zen_cfg_select_option(array(\'Off\',\'Log File\',\'Log and Email\'), ', now())");
     $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('" . MODULE_PAYMENT_IPS_TEXT_CONFIG_11_1 . "', 'MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS','".STORE_OWNER_EMAIL_ADDRESS."', '" . MODULE_PAYMENT_IPS_TEXT_CONFIG_11_2 . "', '6', '22', now())");
        $db->Execute("
CREATE TABLE IF NOT EXISTS " . TABLE_IPS_SESSION . " (
  unique_id int(11) NOT NULL auto_increment,
  session_id text NOT NULL,
  saved_session blob NOT NULL,
  expiry int(17) NOT NULL default '0',
  PRIMARY KEY  (unique_id),
  KEY idx_session_id_zen ( session_id(36) )
) CHARACTER SET utf8 COLLATE utf8_general_ci;
");

        $db->Execute("
CREATE TABLE IF NOT EXISTS " . TABLE_IPS . " (
  ips_ipn_id int(11) unsigned NOT NULL auto_increment,
  zen_order_id int(11) unsigned NOT NULL,
  billno varchar(64) NOT NULL default '',
  amount decimal(7,2) NOT NULL default '0.00',
  ipsdate varchar(20) default NULL,
  succ varchar(1) default NULL,
  msg varchar(255) default NULL,
  attach varchar(255) NOT NULL default '',
  ipsbillno varchar(64) NOT NULL default '',
  retEncodeType varchar(64) NOT NULL default '',
  currency_type varchar(64) NOT NULL default '',
  signature varchar(255) default NULL,
  PRIMARY KEY (ips_ipn_id,billno),
  KEY idx_ips_ips_ipn_id_zen (ips_ipn_id),
  KEY idx_zen_order_id_zen (zen_order_id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
");

        $db->Execute("
CREATE TABLE IF NOT EXISTS " . TABLE_IPS_PAYMENT_STATUS . " (
  payment_status_id int(11) NOT NULL auto_increment,
  payment_status_name varchar(64) NOT NULL default '',
  PRIMARY KEY (payment_status_id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
");

$db->Execute("insert ignore into " . TABLE_IPS_PAYMENT_STATUS . " values (1, '等待付款')");
$db->Execute("insert ignore into " . TABLE_IPS_PAYMENT_STATUS . " values (2, '支付成功')");

        $db->Execute("
CREATE TABLE IF NOT EXISTS " . TABLE_IPS_PAYMENT_STATUS_HISTORY . " (
  payment_status_history_id int(11) NOT NULL auto_increment,
  ips_ipn_id varchar(64) NOT NULL default '',
  billno varchar(64) NOT NULL default '',
  amount decimal(7,2) NOT NULL default '0.00',
  ipsdate varchar(20) default NULL,
  succ varchar(1) default NULL,
  msg varchar(255) default NULL,
  attach varchar(255) NOT NULL default '',
  ipsbillno varchar(64) NOT NULL default '',
  retEncodeType varchar(64) NOT NULL default '',
  currency_type varchar(64) NOT NULL default '',
  signature varchar(255) default NULL,
  PRIMARY KEY (payment_status_history_id),
  KEY idx_ips_ipn_id_zen ( ips_ipn_id )
) CHARACTER SET utf8 COLLATE utf8_general_ci;
");

}

   function remove() {
     global $db;
     $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key LIKE  'MODULE_PAYMENT_IPS%'");
   }

   function keys() {
     return array(
         'MODULE_PAYMENT_IPS_STATUS',
         'MODULE_PAYMENT_IPS_SELLER',
         'MODULE_PAYMENT_IPS_MD5KEY',
         'MODULE_PAYMENT_IPS_ANTIFRAUD',
         'MODULE_PAYMENT_IPS_ZONE',
         'MODULE_PAYMENT_IPS_PROCESSING_STATUS_ID',
         'MODULE_PAYMENT_IPS_ORDER_STATUS_ID',
         'MODULE_PAYMENT_IPS_SORT_ORDER',
         'MODULE_PAYMENT_IPS_HANDLER',
         'MODULE_PAYMENT_IPS_IPN_DEBUG',
         'MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS'
         );
   }
 }
?>