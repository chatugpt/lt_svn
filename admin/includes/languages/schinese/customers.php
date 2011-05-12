<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: customers.php 6352 2007-05-20 21:05:01Z drbyte $
 */

define('HEADING_TITLE', '客户');

define('TABLE_HEADING_ID', 'ID#');
define('TABLE_HEADING_FIRSTNAME', '名');
define('TABLE_HEADING_LASTNAME', '姓');
define('TABLE_HEADING_ACCOUNT_CREATED', '创建账户');
define('TABLE_HEADING_LOGIN', '最后一次登录');
define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_PRICING_GROUP', '价格组');
define('TABLE_HEADING_AUTHORIZATION_APPROVAL', '认可');
define('TABLE_HEADING_GV_AMOUNT', 'GV Balance');

define('TEXT_DATE_ACCOUNT_CREATED', '创建账户:');
define('TEXT_DATE_ACCOUNT_LAST_MODIFIED', '最新修改:');
define('TEXT_INFO_DATE_LAST_LOGON', '最后登录:');
define('TEXT_INFO_NUMBER_OF_LOGONS', '登录次数:');
define('TEXT_INFO_COUNTRY', '国家:');
define('TEXT_INFO_NUMBER_OF_REVIEWS', '评论数:');
define('TEXT_DELETE_INTRO', '你确定要删除这个客户吗?');
define('TEXT_DELETE_REVIEWS', '删除 %s 评论');
define('TEXT_INFO_HEADING_DELETE_CUSTOMER', '删除客户');
define('TYPE_BELOW', '下列类型');
define('PLEASE_SELECT', '选择一个');
define('TEXT_INFO_NUMBER_OF_ORDERS', '订单数:');
define('TEXT_INFO_LAST_ORDER','最后订单:');
define('TEXT_INFO_ORDERS_TOTAL', '总额:');
define('CUSTOMERS_REFERRAL', '客户推荐<br />1st 折扣券');
define('TEXT_INFO_GV_AMOUNT', 'GV Balance');

define('ENTRY_NONE', '无');

define('TABLE_HEADING_COMPANY','公司');
define('TABLE_HEADING_CUSTOMERS_TYPES','客户类型');

define('CUSTOMERS_AUTHORIZATION', '客户认可状态');
define('CUSTOMERS_AUTHORIZATION_0', '允许');
define('CUSTOMERS_AUTHORIZATION_1', '等待审批 - 必须获得授权浏览');
define('CUSTOMERS_AUTHORIZATION_2', '等待审批 -可浏览任何价格');
define('CUSTOMERS_AUTHORIZATION_3', '等待审批 -可浏览任何价格但不可购买');
define('CUSTOMERS_AUTHORIZATION_4', '禁止 - 不允许登录或购物');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION1', '警告:您的商品是被批准设立的，但是不可以浏览. 客户已经设置为等候审批 - 不可浏览');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION2', '警告: 您的商店被批准设立但不能浏览价格。客户已经设置为等候审批 - 价格不可浏览');

define('EMAIL_CUSTOMER_STATUS_CHANGE_MESSAGE', '你的客户身份已经更新。谢谢惠顾，欢迎下次光临.');
define('EMAIL_CUSTOMER_STATUS_CHANGE_SUBJECT', '客户身份更新');

define('ADDRESS_BOOK_TITLE', '通讯薄条目');
define('PRIMARY_ADDRESS', '(最初地址)');
define('TEXT_MAXIMUM_ENTRIES', '<span class="coming"><strong>注意:</strong></span> 最大允许的 %s 通讯薄条目.');
define('TEXT_INFO_ADDRESS_BOOK_COUNT', ' | 1 of  ');
?>