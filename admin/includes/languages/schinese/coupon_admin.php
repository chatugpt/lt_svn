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
//  $Id: coupon_admin.php 5758 2007-02-08 01:39:34Z ajeh $
//

define('TOP_BAR_TITLE', '统计');
define('HEADING_TITLE', '优惠券');
define('HEADING_TITLE_STATUS', '状态 : ');
define('TEXT_CUSTOMER', '客户:');
define('TEXT_COUPON', '礼券名称:');
define('TEXT_COUPON_ALL', '所有礼券');
define('TEXT_COUPON_ACTIVE', '有效礼券');
define('TEXT_COUPON_INACTIVE', '无效礼券');
define('TEXT_SUBJECT', '主题:');
define('TEXT_UNLIMITED', '无限制的');
define('TEXT_FROM', '从:');
define('TEXT_FREE_SHIPPING', '免运费');
define('TEXT_MESSAGE', '信息:');
define('TEXT_RICH_TEXT_MESSAGE','富文本信息:');
define('TEXT_SELECT_CUSTOMER', '选择客户');
define('TEXT_ALL_CUSTOMERS', '所有客户');
define('TEXT_NEWSLETTER_CUSTOMERS', '所有通讯订阅');
define('TEXT_CONFIRM_DELETE', '你确定要删除该礼券吗?');
define('TEXT_SEE_RESTRICT', '限制申请');

define('TEXT_COUPON_ANNOUNCE','我们很乐意为您提供商店礼券');

define('TEXT_TO_REDEEM', '您可以在结帐时兑换此优惠券.只需键入框里提供的号码，并且点击兑换按钮.');
define('TEXT_IN_CASE', ' 如果您有任何问题. ');
define('TEXT_VOUCHER_IS', '礼券号码是 ');
define('TEXT_REMEMBER', '请保留礼券号码，确保号码安全，这样您就可以享受到我们为您提供的特殊服务.');
define('TEXT_VISIT', '请访问 %s');
define('TEXT_ENTER_CODE', ' 输入号码 ');
define('TEXT_COUPON_HELP_DATE', '<p><p>礼券的有效期是 %s 至 %s</p></p>');
define('HTML_COUPON_HELP_DATE', '<p><p>礼券的有效期是 %s 至 %s</p></p>');

define('TABLE_HEADING_ACTION', '作用');

define('CUSTOMER_ID', '客户 ID');
define('CUSTOMER_NAME', '客户名称');
define('REDEEM_DATE', '兑换日期');
define('IP_ADDRESS', 'IP 地址');

define('TEXT_REDEMPTIONS', '兑换');
define('TEXT_REDEMPTIONS_TOTAL', '总量');
define('TEXT_REDEMPTIONS_CUSTOMER', '对于该客户');
define('TEXT_NO_FREE_SHIPPING', '非免运费');

define('NOTICE_EMAIL_SENT_TO', '注意: 邮件发送到: %s');
define('ERROR_NO_CUSTOMER_SELECTED', '错误:没有选择任何客户.');
define('ERROR_NO_SUBJECT', '错误:没有键入任何主题.');

define('COUPON_NAME', '礼券名称');
//define('COUPON_VALUE', 'Coupon Value');
define('COUPON_AMOUNT', '礼券总数');
define('COUPON_CODE', '礼券号码');
define('COUPON_STARTDATE', '开始日期');
define('COUPON_FINISHDATE', '失效日期');
define('COUPON_FREE_SHIP', '免运费');
define('COUPON_DESC', '礼券描述 <br />(客户可见)');
define('COUPON_MIN_ORDER', '礼券最小顺序');
define('COUPON_USES_COUPON', '每张礼券使用次数');
define('COUPON_USES_USER', '每个客户使用次数');
define('COUPON_PRODUCTS', '有效产品列表');
define('COUPON_CATEGORIES', '有效类别列表');
define('VOUCHER_NUMBER_USED', '以用号码');
define('DATE_CREATED', '创建日期');
define('DATE_MODIFIED', '修改日期');
define('TEXT_HEADING_NEW_COUPON', '新建礼券');
define('TEXT_NEW_INTRO', '请为新礼券填写下面信息.<br />');
define('COUPON_ZONE_RESTRICTION', '礼券限定区域: ');
define('TEXT_COUPON_ZONE_RESTRICTION', '礼券限定可选区域.');

define('ERROR_NO_COUPON_AMOUNT', '没有输入礼券总量');
define('ERROR_NO_COUPON_NAME', '没有输入礼券名称 ');
define('ERROR_COUPON_EXISTS', '该号码的礼券已存在');


define('COUPON_NAME_HELP', '礼券名称缩写');
define('COUPON_AMOUNT_HELP', '礼券折扣值，固定的或者是在百分比折扣后面加上%.');
define('COUPON_CODE_HELP', '你可以输入你的号码，或留空自动生成一个新的.');
define('COUPON_STARTDATE_HELP', '礼券有效期');
define('COUPON_FINISHDATE_HELP', '礼券失效期');
define('COUPON_FREE_SHIP_HELP', '优惠券上提供免费送货的订单. 注意. T这将覆盖coupon_amount的值但保存最小订单值');
define('COUPON_DESC_HELP', '礼券描述');
define('COUPON_MIN_ORDER_HELP', '在礼券有效前最小订单值');
define('COUPON_USES_COUPON_HELP', '礼券最多使用次数，如果您希望无限使用次数，请留空.');
define('COUPON_USES_USER_HELP', '一个客户能使用礼券次数，如果您希望无限使用，请留空.');
define('COUPON_PRODUCTS_HELP', '礼券上的product_ids之间用逗号隔开，这样礼券方可使用，如果希望无限制，请留空.');
define('COUPON_CATEGORIES_HELP', '礼券上的cpaths之间用逗号隔开，这样礼券方可使用，如果希望无限制，请留空.');
define('COUPON_BUTTON_PREVIEW', '预览');
define('COUPON_BUTTON_CONFIRM', '确定');
define('COUPON_BUTTON_BACK', '返回');

define('COUPON_ACTIVE', '状态');
define('COUPON_START_DATE', '有效期始于');
define('COUPON_EXPIRE_DATE', '失效期');

define('ERROR_DISCOUNT_COUPON_WELCOME', '折扣券不能被停用。折扣券就是优惠券<br /><br />删除之前请更换优惠券. 查看 Admin->Configuration->GV Coupons');
define('SUCCESS_COUPON_DISABLED', '成功! 折扣券被设置为无效 ...');
define('TEXT_COUPON_NEW', '使用新的折扣券号码:');
define('ERROR_DISCOUNT_COUPON_DUPLICATE', '警告! 该礼券已经存在 ... 取消了优惠券代码复制: ');
define('TEXT_CONFIRM_COPY', '您确定要复制该折扣券到另外折扣券吗?');
define('SUCCESS_COUPON_DUPLICATE', '成功! 折扣券已经复制 ...<br /><br />请检查礼券名称和日期...');
?>