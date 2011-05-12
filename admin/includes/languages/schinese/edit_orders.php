<?php
/*
  $Id: edit_orders.php,v 1.25 2003/08/07 00:28:44 jwh Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', '订单编辑');
define('HEADING_TITLE_SEARCH', '订单 ID:');
define('HEADING_TITLE_STATUS', '状态:');
define('ADDING_TITLE', '添加一个产品到订单上');

define('ENTRY_UPDATE_TO_CC', '(更新至 <b>信用卡</b> 以查看CC字段.)');
define('TABLE_HEADING_COMMENTS', '评论');
define('TABLE_HEADING_CUSTOMERS', '客户');
define('TABLE_HEADING_ORDER_TOTAL', '总订单数');
define('TABLE_HEADING_DATE_PURCHASED', '购买日期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_QUANTITY', '数量.');
define('TABLE_HEADING_PRODUCTS_MODEL', '型号');
define('TABLE_HEADING_PRODUCTS', '产品');
define('TABLE_HEADING_TAX', '税');
define('TABLE_HEADING_UNIT_PRICE', '价格单位');
define('TABLE_HEADING_TOTAL_PRICE', '总额');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', '客户通报');
define('TABLE_HEADING_DATE_ADDED', '添加日期');

define('ENTRY_CUSTOMER', '客户:');
define('ENTRY_CUSTOMER_NAME', '名称');
define('ENTRY_CUSTOMER_COMPANY', '公司');
define('ENTRY_CUSTOMER_ADDRESS', '地址');
define('ENTRY_CUSTOMER_SUBURB', '区');
define('ENTRY_CUSTOMER_CITY', '城市');
define('ENTRY_CUSTOMER_STATE', '洲');
define('ENTRY_CUSTOMER_POSTCODE', '邮编');
define('ENTRY_CUSTOMER_COUNTRY', '国家');

define('ENTRY_SOLD_TO', '卖至:');
define('ENTRY_DELIVERY_TO', '送至:');
define('ENTRY_SHIP_TO', '送至:');
define('ENTRY_SHIPPING_ADDRESS', '送货地址:');
define('ENTRY_BILLING_ADDRESS', '账单地址:');
define('ENTRY_PAYMENT_METHOD', '支付方式:');
define('ENTRY_CREDIT_CARD_TYPE', '信用卡类型:');
define('ENTRY_CREDIT_CARD_OWNER', '持卡人:');
define('ENTRY_CREDIT_CARD_NUMBER', '信用卡号:');
define('ENTRY_CREDIT_CARD_EXPIRES', '信用卡到期时间:');
define('ENTRY_SUB_TOTAL', '小计:');
define('ENTRY_TAX', '税:');
define('ENTRY_SHIPPING', '运送:');
define('ENTRY_TOTAL', '总数:');
define('ENTRY_DATE_PURCHASED', '购买日期:');
define('ENTRY_STATUS', '状态:');
define('ENTRY_DATE_LAST_UPDATED', '最后修改日期:');
define('ENTRY_NOTIFY_CUSTOMER', '客户通告:');
define('ENTRY_NOTIFY_COMMENTS', '附加说明');
define('ENTRY_PRINTABLE', '打印发票');

define('TEXT_INFO_HEADING_DELETE_ORDER', '删除订单');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除该订单吗?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', '进货产品数量');
define('TEXT_DATE_ORDER_CREATED', '创建日期:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', '最后修改:');
define('TEXT_DATE_ORDER_ADDNEW', '添加产品.');
define('TEXT_INFO_PAYMENT_METHOD', '支付方式:');

define('TEXT_ALL_ORDERS', '所有订单');
define('TEXT_NO_ORDER_HISTORY', '没有可用的订单历史');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', '更新订单');
define('EMAIL_TEXT_ORDER_NUMBER', '订单号:');
define('EMAIL_TEXT_INVOICE_URL', '详细发票:');
define('EMAIL_TEXT_DATE_ORDERED', '订货日期:');

define('EMAIL_DISCLAIMER', '如果您需要关于我们产品的更多的信息或者您有任何问题，请给我们发送有邮件,至 <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">'. STORE_OWNER_EMAIL_ADDRESS .' </a>.我们将全心全意为您服务.\n\n 我们将通过这个电子邮箱为您提供服务. 如果您没能正确的接收到该邮箱邮件，请发送邮件到 %s');

define('EMAIL_TEXT_STATUS_UPDATE', '您的订单已经更新一下状态.' . "\n\n" . '新状态: %s' . "\n\n" . '如果您需要产品的更多信息，或者您有任何问题，请给我们发送邮件，至 <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '"> . 我们将全心全意为您服务. ' . "\n\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', '您对于订单的评论是' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', '错误: 订单不存在.');
define('SUCCESS_ORDER_UPDATED', '成功: 订单已更新.');
define('WARNING_ORDER_NOT_UPDATED', '警告: 无更新.订单没有任何改变.');

define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', '选择产品');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', '选择选项');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', '没有选项: 忽略..');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', '数量.');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', '现在添加');


?>