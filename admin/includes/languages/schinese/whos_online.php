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
//  $Id: whos_online.php 2663 2005-12-24 02:28:51Z ajeh $
//

define('HEADING_TITLE', '谁在线');

define('TABLE_HEADING_ONLINE', '在线');
define('TABLE_HEADING_CUSTOMER_ID','标识ID');
define('TABLE_HEADING_FULL_NAME', '全名');
define('TABLE_HEADING_IP_ADDRESS', 'IP 地址');
define('TABLE_HEADING_SESSION_ID', '会话');
define('TABLE_HEADING_ENTRY_TIME', '进入时间');
define('TABLE_HEADING_LAST_CLICK', '最后点击时间');
define('TIME_PASSED_LAST_CLICKED', '<strong>因为被点击的时间:</strong> ');
define('TABLE_HEADING_LAST_PAGE_URL', '最后浏览的网址');
define('TABLE_HEADING_ACTION', '执行');
define('TABLE_HEADING_SHOPPING_CART', '用户购物车');
define('TEXT_SHOPPING_CART_SUBTOTAL', '小计');
define('TEXT_NUMBER_OF_CUSTOMERS', '当前有 %s 用户在线');

// Additional Definitions for whos_online.php
  define('WHOS_ONLINE_REFRESH_LIST_TEXT', '刷新列表');
  define('WHOS_ONLINE_LEGEND_TEXT','传说:');
  define('WHOS_ONLINE_ACTIVE_TEXT','主动的购物车');
  define('WHOS_ONLINE_INACTIVE_TEXT','非活动购物车');
  define('WHOS_ONLINE_ACTIVE_NO_CART_TEXT','没有主动的购物车');
  define('WHOS_ONLINE_INACTIVE_NO_CART_TEXT','无购物车不活跃');
  define('WHOS_ONLINE_INACTIVE_LAST_CLICK_TEXT','非活动是最后点击');
  define('WHOS_ONLINE_INACTIVE_ARRIVAL_TEXT','非活动以来的到来 >');
  define('WHOS_ONLINE_REMOVED_TEXT','将被移除');

 // 
  define('WHOIS_TIMER_REMOVE',1200); // seconds when removed from whos_online table - 1200 default = 20 minutes
  define('WHOIS_TIMER_INACTIVE',180); // seconds when considered inactive - 180 default = 3 minutes
  define('WHOIS_TIMER_DEAD',540); // seconds when considered dead - 540 default = 9 minutes
  define('WHOIS_SHOW_HOST','1'); // show Last Clicked time and host name - 1 default
  define('WHOIS_REPEAT_LEGEND_BOTTOM','12'); // show legend on bottom when more than how many entries - 12 default
  define('OFFICE_IP_TO_HOST_ADDRESS','关');

  define('TEXT_SESSION_ID', '<strong>会话 ID:</strong> ');
  define('TEXT_HOST', '<strong>主机:</strong> ');
  define('TEXT_USER_AGENT', '<strong>用户代理 :</strong> ');
  define('TEXT_EMPTY_CART', '<strong>空购物车</strong>');
?>