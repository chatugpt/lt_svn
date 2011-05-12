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
//  $Id: gv_sent.php 2388 2005-11-18 00:18:35Z ajeh $
//

define('HEADING_TITLE', '礼券发送');

define('TABLE_HEADING_SENDERS_NAME', '发送者名字');
define('TABLE_HEADING_VOUCHER_VALUE', TEXT_GV_NAME . ' 价值');
define('TABLE_HEADING_VOUCHER_CODE', TEXT_GV_REDEEM);
define('TABLE_HEADING_DATE_SENT', '发送日期');
define('TEXT_HEADING_DATE_REDEEMED', '兑现日期');
define('TABLE_HEADING_ACTION', '选项');

define('TEXT_INFO_SENDERS_ID', '发送者 ID:');
define('TEXT_INFO_AMOUNT_SENT', '发送金额:');
define('TEXT_INFO_DATE_SENT', '发送日期:');
define('TEXT_INFO_VOUCHER_CODE', TEXT_GV_REDEEM . ':');
define('TEXT_INFO_EMAIL_ADDRESS', '电子邮箱地址:');
define('TEXT_INFO_DATE_REDEEMED', '兑现日期:');
define('TEXT_INFO_IP_ADDRESS', 'IP地址:');
define('TEXT_INFO_CUSTOMERS_ID', '顾客 Id:');
define('TEXT_INFO_NOT_REDEEMED', '不兑现');
?>