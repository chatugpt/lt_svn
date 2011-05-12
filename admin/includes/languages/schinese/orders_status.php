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
//  $Id: orders_status.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', '订单状态');

define('TABLE_HEADING_ORDERS_STATUS', '订单状态');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_INFO_EDIT_INTRO', '请进行任何必要的修改');
define('TEXT_INFO_ORDERS_STATUS_NAME', '订单状态:');
define('TEXT_INFO_INSERT_INTRO', '请输入相关数据，新订单的状态');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除此订单状态?');
define('TEXT_INFO_HEADING_NEW_ORDERS_STATUS', '新订单状态');
define('TEXT_INFO_HEADING_EDIT_ORDERS_STATUS', '编辑订单状态');
define('TEXT_INFO_HEADING_DELETE_ORDERS_STATUS', '删除订单状态');

define('ERROR_REMOVE_DEFAULT_ORDER_STATUS', '错误：默认的订单状态不能被删除。请设置为默认另一订单状态，并再试一次.');
define('ERROR_STATUS_USED_IN_ORDERS', '错误：此订单的状态是目前使用的订单.');
define('ERROR_STATUS_USED_IN_HISTORY', '错误：此订单的状态是目前使用的历史订单状态.');
?>