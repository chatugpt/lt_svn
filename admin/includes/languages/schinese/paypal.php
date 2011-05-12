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
//  $Id: paypal.php 3016 2006-02-12 05:26:46Z ajeh $
//

  // sort orders
  define('TEXT_PAYPAL_IPN_SORT_ORDER_INFO', '显示订单: ');
  define('TEXT_SORT_PAYPAL_ID_DESC', 'PayPal 收到的订单（新 - 旧）');
  define('TEXT_SORT_PAYPAL_ID', 'PayPal 收到的订单（旧-新  ）');
  define('TEXT_SORT_ZEN_ORDER_ID_DESC', 'Order ID (高 - 低), PayPal 收到的订单');
  define('TEXT_SORT_ZEN_ORDER_ID', 'Order ID (低 - 高), PayPal 收到的订单');
  define('TEXT_PAYMENT_AMOUNT_DESC', '订单金额 (高 - 低)');
  define('TEXT_PAYMENT_AMOUNT', '订单金额 (低 - 高)');

  //begin ADMIN text
  define('HEADING_ADMIN_TITLE', 'PayPal 即时付款通知');
  define('HEADING_PAYMENT_STATUS', '付款状态');
  define('TEXT_ALL_IPNS', 'All');

  define('TABLE_HEADING_ORDER_NUMBER', '订单 #');
  define('TABLE_HEADING_PAYPAL_ID', 'PayPal #');
  define('TABLE_HEADING_TXN_TYPE', '交易类型');
  define('TABLE_HEADING_PAYMENT_STATUS', '付款状态');
  define('TABLE_HEADING_PAYMENT_AMOUNT', '金额');
  define('TABLE_HEADING_ACTION', '执行');
  define('TABLE_HEADING_DATE_ADDED', '添加日期');
  define('TABLE_HEADING_NUM_HISTORY_ENTRIES', '在数项历史状态');
  define('TABLE_HEADING_ENTRY_NUM', '报名人数');
  define('TABLE_HEADING_TRANS_ID', '移植. ID');



  define('TEXT_INFO_PAYPAL_IPN_HEADING', 'PayPal IPN');
  define('TEXT_DISPLAY_NUMBER_OF_TRANSACTIONS', '显示 <strong>%d</strong> 到 <strong>%d</strong> ( <strong>%d</strong> IPN\'s)');

  //Details section
  define('HEADING_DEATILS_CUSTOMER_REGISTRATION_TITLE', 'PayPal 客户登记详情');
  define('HEADING_DETAILS_REGISTRATION_TITLE', 'PayPal 即时付款通知');
  define('TEXT_INFO_ENTRY_ADDRESS', '地址');
  define('TEXT_INFO_ORDER_NUMBER', '订单数');
  define('TEXT_INFO_TXN_TYPE', '交易类型');
  define('TEXT_INFO_PAYMENT_STATUS', '付款状态');
  define('TEXT_INFO_PAYMENT_AMOUNT', '金额');
  define('ENTRY_FIRST_NAME', '姓');
  define('ENTRY_LAST_NAME', '名');
  define('ENTRY_BUSINESS_NAME', '公司名称');
  define('ENTRY_ADDRESS', '地址');
  //EMAIL ALREADY DEFINED IN ORDERS
  define('ENTRY_PAYER_ID', '付款人编号');
  define('ENTRY_PAYER_STATUS', '付款人状态');
  define('ENTRY_ADDRESS_STATUS', '地址状态');
  define('ENTRY_PAYMENT_TYPE', '付款类型');
  define('TABLE_HEADING_ENTRY_PAYMENT_STATUS', '付款状态');
  define('TABLE_HEADING_PENDING_REASON', '待原因');
  define('TABLE_HEADING_IPN_DATE', 'IPN 日期');
  define('ENTRY_INVOICE', '发票');
  define('ENTRY_PAYPAL_IPN_TXN', '交易ID');
  define('ENTRY_PAYMENT_DATE', '付款日期');
  define('ENTRY_PAYMENT_LAST_MODIFIED', '最后更新');
  define('ENTRY_MC_CURRENCY', 'MC 货币');
  define('ENTRY_MC_GROSS', 'MC 1.合计');
  define('ENTRY_MC_FEE', 'MC 费');
  define('ENTRY_PAYMENT_GROSS', '付款总额');
  define('ENTRY_PAYMENT_FEE', '缴纳的');
  define('ENTRY_SETTLE_AMOUNT', '解决金额');
  define('ENTRY_SETTLE_CURRENCY', '解决货币');
  define('ENTRY_EXCHANGE_RATE', '汇率');
  define('ENTRY_CART_ITEMS', '无车项目');
  define('ENTRY_CUSTOMER_COMMENTS', '客户评论');
  define('TEXT_NO_IPN_HISTORY', '历史上没有可用的IPN');
  define('TEXT_TXN_SIGNATURE', '交易签署');
  //end ADMIN text
?>
