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
//  $Id: gv_mail.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', '发送 ' . TEXT_GV_NAME . ' 给顾客');

define('TEXT_CUSTOMER', '顾客:');
define('TEXT_SUBJECT', '主题:');
define('TEXT_FROM', '从:');
define('TEXT_TO', '邮到:');
define('TEXT_AMOUNT', '金额');
define('TEXT_MESSAGE', '纯文字信息 <br />:');
define('TEXT_RICH_TEXT_MESSAGE', '富文本信息 <br />:');
define('TEXT_SINGLE_EMAIL', '<span class="smallText">使用电子邮件发送此单,否则使用下拉</span>');
define('TEXT_SELECT_CUSTOMER', '选择顾客');
define('TEXT_ALL_CUSTOMERS', '所有顾客');
define('TEXT_NEWSLETTER_CUSTOMERS', '所有的通讯订户');

define('NOTICE_EMAIL_SENT_TO', '注意: 电子邮件发送给: %s');
define('ERROR_NO_CUSTOMER_SELECTED', '错误: 没有选择任何顾客.');
define('ERROR_NO_AMOUNT_SELECTED', '错误: 没有选定金额.');
define('ERROR_NO_SUBJECT', '错误: 没有输入主题.');
define('ERROR_GV_AMOUNT', '请定义为一个无符号值的金额.例如: 25.00');

define('TEXT_GV_ANNOUNCE','<font color="#0000ff">我们很高兴为您提供服务 ' . TEXT_GV_NAME . '</font>');
define('TEXT_GV_WORTH', 'The ' . TEXT_GV_NAME . ' 值得 ');
define('TEXT_TO_REDEEM', 'To redeem this ' . TEXT_GV_NAME . ', 请点击下面的链接. 也请写下来 ' . TEXT_GV_REDEEM);
define('TEXT_WHICH_IS', ' 那一个');
define('TEXT_IN_CASE', ' 如果你有任何问题.');
define('TEXT_OR_VISIT', '或者访问 ');
define('TEXT_ENTER_CODE', ' 在结账的过程中输入代码');
define('TEXT_CLICK_TO_REDEEM','按此赎回');

define ('TEXT_REDEEM_COUPON_MESSAGE_HEADER', '您最近购买了  ' . TEXT_GV_NAME . ' 从我们的网站，出于安全原因，金额  ' . TEXT_GV_NAME . ' 没有立即计入您账户. 店主已公布的金额.');
define ('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', "\n\n" . '该值  ' . TEXT_GV_NAME . ' 是 %s');
define ('TEXT_REDEEM_COUPON_MESSAGE_BODY', "\n\n" . '现在，您可以访问我们的网站，登录并发送  ' . TEXT_GV_NAME . ' 金额给任何人看.');
define ('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', "\n\n");

?>