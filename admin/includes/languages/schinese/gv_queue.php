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
//  $Id: gv_queue.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', TEXT_GV_NAME . ' 发行队列');

define('TABLE_HEADING_CUSTOMERS', '客户');
define('TABLE_HEADING_ORDERS_ID', '订单号.');
define('TABLE_HEADING_VOUCHER_VALUE', TEXT_GV_NAME . ' 价值');
define('TABLE_HEADING_DATE_PURCHASED', '消费日期');
define('TABLE_HEADING_ACTION', '选项');

define('TEXT_REDEEM_GV_MESSAGE_HEADER', '您最近购买了 ' . TEXT_GV_NAME . ' 从我们的网上商店.');
define('TEXT_REDEEM_GV_MESSAGE_RELEASED', '出于安全原因，这是没有作出立即向您提供. ' .
                                          '然而，这一数额已被释放. 现在您可以访问我们的存储和发送的值 ' . TEXT_GV_NAME . ' 通过电子邮件给别人，或者自己用它.' . "\n\n"
                                          );

define('TEXT_REDEEM_GV_MESSAGE_AMOUNT', ' ' . TEXT_GV_NAME . ' 您购买的值 %s');
define('TEXT_REDEEM_GV_MESSAGE_THANKS', '感谢您在我们这里购物！');

define('TEXT_REDEEM_GV_MESSAGE_BODY', '');
define('TEXT_REDEEM_GV_MESSAGE_FOOTER', '');
define('TEXT_REDEEM_GV_SUBJECT', TEXT_GV_NAME . ' 购买');
define('TEXT_REDEEM_GV_SUBJECT_ORDER',' 订购 #');

define('TEXT_EDIT_ORDER','编辑订单 ID# ');
define('TEXT_GV_NONE','没有 ' . TEXT_GV_NAME . ' 释放');
?>