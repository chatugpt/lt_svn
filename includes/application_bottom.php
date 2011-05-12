<?php
/**
 * application_bottom.php
 * Common actions carried out at the end of each page invocation.
 *
 * @package initSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: application_bottom.php 5658 2007-01-21 19:39:51Z wilt $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if ($_GET['keyword'] != '') {
	
	$search_count = $db->Execute("select freq from customers_searches where search = '". $_GET['keyword'] . "'");
	if (!$search_count->RecordCount()) {
		$db->Execute("insert into customers_searches (search,language_id, freq) values ('". $_GET['keyword'] ."','". $_SESSION['languages_id'] ."',1)");
	} else {
		$db->Execute("update customers_searches set freq = " . ($search_count->fields['freq']+1) . " where search = '". $_GET['keyword'] . "'");
	}
}

// close session (store variables)
session_write_close();

// breaks things
// pconnect disabled (safety switch)
// $db->close();

if ( (GZIP_LEVEL == '1') && ($ext_zlib_loaded == true) && ($ini_zlib_output_compression < 1) ) {
  if ( (PHP_VERSION < '4.0.4') && (PHP_VERSION >= '4') ) {
    zen_gzip_output(GZIP_LEVEL);
  }
}
?>