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
// $Id: database_tables.php 001 2009-05-02 00:00:00 Jack $
//

// define the database table names used in the project
  define('IPS', DB_PREFIX . 'ips');

  define('TABLE_IPS', DB_PREFIX . 'ips');
  define('TABLE_IPS_SESSION', DB_PREFIX . 'ips_session');
  define('TABLE_IPS_PAYMENT_STATUS', DB_PREFIX . 'ips_payment_status');
  define('TABLE_IPS_PAYMENT_STATUS_HISTORY', DB_PREFIX . 'ips_payment_status_history');
?>