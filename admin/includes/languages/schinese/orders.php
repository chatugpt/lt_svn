<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: orders.php 6214 2007-04-17 02:24:25Z ajeh $
 */

define('HEADING_TITLE', '订单');
define('HEADING_TITLE_SEARCH', '订单 ID:');
define('HEADING_TITLE_STATUS', '状态:');
define('HEADING_TITLE_SEARCH_DETAIL_ORDERS_PRODUCTS', '按产品名称或 <strong>ID:XX</strong> 或是型号搜索 ');
define('TEXT_INFO_SEARCH_DETAIL_FILTER_ORDERS_PRODUCTS', '搜索文件: ');
define('TABLE_HEADING_PAYMENT_METHOD', '付款<br />航运');
define('TABLE_HEADING_ORDERS_ID','ID');

define('TEXT_BILLING_SHIPPING_MISMATCH','帐单和运输不匹配 ');

define('TABLE_HEADING_COMMENTS', '评论');
define('TABLE_HEADING_CUSTOMERS', '客户');
define('TABLE_HEADING_ORDER_TOTAL', '订单共计');
define('TABLE_HEADING_DATE_PURCHASED', '购买日期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_TYPE', '订单类型');
define('TABLE_HEADING_ACTION', '执行');
define('TABLE_HEADING_QUANTITY', '数量.');
define('TABLE_HEADING_PRODUCTS_MODEL', '型号');
define('TABLE_HEADING_PRODUCTS', '产品');
define('TABLE_HEADING_TAX', '税率');
define('TABLE_HEADING_TOTAL', '总计');
define('TABLE_HEADING_PRICE_EXCLUDING_TAX', '价格（不包含）');
define('TABLE_HEADING_PRICE_INCLUDING_TAX', '价格（包含）');
define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', '共有（不包含）');
define('TABLE_HEADING_TOTAL_INCLUDING_TAX', '总计（包含）');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', '客户通知');
define('TABLE_HEADING_DATE_ADDED', '添加日期');

define('ENTRY_CUSTOMER', '客户:');
define('ENTRY_SOLD_TO', '出售给:');
define('ENTRY_DELIVERY_TO', '交付:');
define('ENTRY_SHIP_TO', '运送到:');
define('ENTRY_SHIPPING_ADDRESS', '送货地址:');
define('ENTRY_BILLING_ADDRESS', '帐单地址:');
define('ENTRY_PAYMENT_METHOD', '付款方法:');
define('ENTRY_CREDIT_CARD_TYPE', '创建信用卡类型:');
define('ENTRY_CREDIT_CARD_OWNER', '创建信用卡所有者:');
define('ENTRY_CREDIT_CARD_NUMBER', '创建信用卡号:');
define('ENTRY_CREDIT_CARD_CVV', '信用卡号码CVV:');
define('ENTRY_CREDIT_CARD_EXPIRES', '信用卡到期:');
define('ENTRY_SUB_TOTAL', '小计:');
define('ENTRY_TAX', '税率:');
define('ENTRY_SHIPPING', '航运:');
define('ENTRY_TOTAL', '总计:');
define('ENTRY_DATE_PURCHASED', '购买日期:');
define('ENTRY_STATUS', '状态:');
define('ENTRY_DATE_LAST_UPDATED', '最后更新日期:');
define('ENTRY_NOTIFY_CUSTOMER', '通知客户:');
define('ENTRY_NOTIFY_COMMENTS', '附加说明:');
define('ENTRY_PRINTABLE', '打印发票');

define('TEXT_INFO_HEADING_DELETE_ORDER', '删除订单');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除此订单?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', '进货产品质量');
define('TEXT_DATE_ORDER_CREATED', '创建日期:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', '最后更新:');
define('TEXT_INFO_PAYMENT_METHOD', '付款方法:');
define('TEXT_PAID', '付费');
define('TEXT_UNPAID', '未付费');

define('TEXT_ALL_ORDERS', '所有订单');
define('TEXT_NO_ORDER_HISTORY', '没有可用的订单历史');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', '订单更新');
define('EMAIL_TEXT_ORDER_NUMBER', '订单号:');
define('EMAIL_TEXT_INVOICE_URL', '详细的发票:');
define('EMAIL_TEXT_DATE_ORDERED', '订单日期:');
define('EMAIL_TEXT_COMMENTS_UPDATE', '<em>您订购的意见: </em>');
define('EMAIL_TEXT_STATUS_UPDATED', '您的订单已更新到以下状态:' . "\n");
define('EMAIL_TEXT_STATUS_LABEL', '<strong>新状态:</strong> %s' . "\n\n");
define('EMAIL_TEXT_STATUS_PLEASE_REPLY', '如果您需要进一步了解我们的产品信息或有任何问题，请随时以电子邮件与我们 <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '"> . 您将享受我们的100％满意的服务. ' . "\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', '错误：不存在订单.');
define('SUCCESS_ORDER_UPDATED', '成功：订单已成功更新.');
define('WARNING_ORDER_NOT_UPDATED', '警告：没有什么改变。该命令没有更新.');

define('ENTRY_ORDER_ID','发票号码 ');
define('TEXT_INFO_ATTRIBUTE_FREE', '&nbsp;-&nbsp;<span class="alert">免费</span>');

define('TEXT_DOWNLOAD_TITLE', '订单下载状态');
define('TEXT_DOWNLOAD_STATUS', '状态');
define('TEXT_DOWNLOAD_FILENAME', '文件名');
define('TEXT_DOWNLOAD_MAX_DAYS', '天');
define('TEXT_DOWNLOAD_MAX_COUNT', '计数');

define('TEXT_DOWNLOAD_AVAILABLE', '可用');
define('TEXT_DOWNLOAD_EXPIRED', '过期');
define('TEXT_DOWNLOAD_MISSING', '没在服务器上');

define('IMAGE_ICON_STATUS_CURRENT', '状态 - 可用');
define('IMAGE_ICON_STATUS_EXPIRED', '状态 - 过期');
define('IMAGE_ICON_STATUS_MISSING', '状态 - 丢失');

define('SUCCESS_ORDER_UPDATED_DOWNLOAD_ON', '下载已成功启用');
define('SUCCESS_ORDER_UPDATED_DOWNLOAD_OFF', '下载已成功禁用');
define('TEXT_MORE', '... 更多');

define('TEXT_INFO_IP_ADDRESS', 'IP 地址: ');
define('TEXT_DELETE_CVV_FROM_DATABASE','删除 来自数据库中的CVV ');
define('TEXT_DELETE_CVV_REPLACEMENT','删除');
define('TEXT_MASK_CC_NUMBER','标记这个数字');

define('TEXT_INFO_EXPIRED_DATE', '过期日期:<br />');
define('TEXT_INFO_EXPIRED_COUNT', '过期计数:<br />');

define('TABLE_HEADING_CUSTOMER_COMMENTS', '客户<br />评论');
define('TEXT_COMMENTS_YES', '客户评论 - 是');
define('TEXT_COMMENTS_NO', '客户评论 - 否');
?>