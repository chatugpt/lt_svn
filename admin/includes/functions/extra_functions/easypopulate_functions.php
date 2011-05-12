<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
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
// $Id:easypopulate_functions.php,v1.2.5.4 2005/09/26 langer $
//

function ep_get_uploaded_file($filename) {
	if (isset($_FILES[$filename])) {
		//global $_FILES;
		$uploaded_file = array('name' => $_FILES[$filename]['name'],
		'type' => $_FILES[$filename]['type'],
		'size' => $_FILES[$filename]['size'],
		'tmp_name' => $_FILES[$filename]['tmp_name']);
	} elseif (isset($_POST[$filename])) {
		$uploaded_file = array('name' => $_POST[$filename],
		);
	} elseif (isset($GLOBALS['HTTP_POST_FILES'][$filename])) {
		global $HTTP_POST_FILES;
		$uploaded_file = array('name' => $HTTP_POST_FILES[$filename]['name'],
		'type' => $HTTP_POST_FILES[$filename]['type'],
		'size' => $HTTP_POST_FILES[$filename]['size'],
		'tmp_name' => $HTTP_POST_FILES[$filename]['tmp_name']);
	} elseif (isset($GLOBALS['HTTP_POST_VARS'][$filename])) {
		global $HTTP_POST_VARS;
		$uploaded_file = array('name' => $HTTP_POST_VARS[$filename],
		);
	} else {
		$uploaded_file = array('name' => $GLOBALS[$filename . '_name'],
		'type' => $GLOBALS[$filename . '_type'],
		'size' => $GLOBALS[$filename . '_size'],
		'tmp_name' => $GLOBALS[$filename]);
	}
return $uploaded_file;
}

// the $filename parameter is an array with the following elements:
// name, type, size, tmp_name
function ep_copy_uploaded_file($filename, $target) {
	if (substr($target, -1) != '/') $target .= '/';
	$target .= $filename['name'];
	move_uploaded_file($filename['tmp_name'], $target);
}

function ep_get_tax_class_rate($tax_class_id) {
	$tax_multiplier = 0;
	$tax_query = mysql_query("select SUM(tax_rate) as tax_rate from " . TABLE_TAX_RATES . " WHERE  tax_class_id = '" . zen_db_input($tax_class_id) . "' GROUP BY tax_priority");
	if (mysql_num_rows($tax_query)) {
		while ($tax = mysql_fetch_array($tax_query)) {
			$tax_multiplier += $tax['tax_rate'];
		}
	}
	return $tax_multiplier;
}

function ep_get_tax_title_class_id($tax_class_title) {
	$classes_query = mysql_query("select tax_class_id from " . TABLE_TAX_CLASS . " WHERE tax_class_title = '" . zen_db_input($tax_class_title) . "'" );
	$tax_class_array = mysql_fetch_array($classes_query);
	$tax_class_id = $tax_class_array['tax_class_id'];
	return $tax_class_id ;
}

function print_el($item2) {
	//$output_display = " | " . substr(strip_tags($item2), 0, 10);
	$output_display = substr(strip_tags($item2), 0, 10) . " | ";
	return $output_display;
}

function print_el1($item2) {
	$output_display = sprintf("| %'.4s ", substr(strip_tags($item2), 0, 80));
	return $output_display;
}

function smart_tags($string,$tags,$crsub,$doit) {
	if ($doit == true) {
		foreach ($tags as $tag => $new) {
			$tag = '/('.$tag.')/';
			$string = preg_replace($tag,$new,$string);
		}
	}
	// we remove problem characters here anyway as they are not wanted..
	$string = preg_replace("/(\r\n|\n|\r)/", "", $string);
	// $crsub is redundant - may add it again later though..
	return $string;
}

function ep_field_name_exists($tbl,$fld) {
  if (zen_not_null(zen_field_type($tbl,$fld))) {
  	return true;
  } else {
  	return false;
  }
}

function ep_remove_product($product_model) {
  global $db, $ep_debug_logging, $ep_debug_logging_all, $ep_stack_sql_error;
  
  $sql = "select products_id
                           from " . TABLE_PRODUCTS . "
                           where products_model = '" . zen_db_input($product_model) . "'";
  $products = $db->Execute($sql);
  
	if (mysql_errno()) {
		$ep_stack_sql_error = true;
		if ($ep_debug_logging == true) {
			// langer - will add time & date..
			$string = "MySQL error ".mysql_errno().": ".mysql_error()."\nWhen executing:\n$sql\n";
			write_debug_log($string);
		}
	} elseif ($ep_debug_logging_all == true) {
		$string = "MySQL PASSED\nWhen executing:\n$sql\n";
		write_debug_log($string);
	}
  
  while (!$products->EOF) {
    zen_remove_product($products->fields['products_id']);
    $products->MoveNext();
  }
  return;
}

function ep_purge_dross() {
	$dross = ep_get_dross();
	foreach ($dross as $products_id => $langer) {
		zen_remove_product($products_id);
	}
}

function ep_get_dross() {
	global $db;
	$target_tables = array(TABLE_PRODUCTS_DESCRIPTION,
												TABLE_SPECIALS,
												TABLE_PRODUCTS_TO_CATEGORIES,
												TABLE_PRODUCTS_ATTRIBUTES,
												TABLE_FEATURED,
												TABLE_CUSTOMERS_BASKET,
												TABLE_CUSTOMERS_BASKET_ATTRIBUTES,
												TABLE_PRODUCTS_DISCOUNT_QUANTITY);
												// can add others I guess, though this probably catches all possible data debris...
												// reviews uses reviews_id, but if it is in reviews, it is probably detected above anyway
												// This array needs to work with all versions - could break EP on older versions I think.. with each additional table, test on older versions
	
	$dross = array();
	foreach ($target_tables as $table) {
		//lets check the tables for deleted products
		$sql = "select distinct t.products_id from " . $table . " as t left join " . TABLE_PRODUCTS . " as p on t.products_id = p.products_id where p.products_id is NULL";
		$products = $db->Execute($sql);
		while (!$products->EOF) {
			$dross[$products->fields['products_id']] = 'dross';
			$products->MoveNext();
		}
	}
	// our array has product_id => "dross", so duplicate products simply over-write same in array
	//print_r($dross);
  return $dross;
}

function ep_update_cat_ids() {
  // reset products master categories ID
	global $db;
	
  $sql = "select products_id from " . TABLE_PRODUCTS;
  $check_products = $db->Execute($sql);
  while (!$check_products->EOF) {

    $sql = "select products_id, categories_id from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id='" . $check_products->fields['products_id'] . "'";
    $check_category = $db->Execute($sql);

    $sql = "update " . TABLE_PRODUCTS . " set master_categories_id='" . $check_category->fields['categories_id'] . "' where products_id='" . $check_products->fields['products_id'] . "'";
    $update_viewed = $db->Execute($sql);

    $check_products->MoveNext();
  }
}

function ep_update_prices() {
	global $db;
	
  // reset products_price_sorter for searches etc.
  $sql = "select products_id from " . TABLE_PRODUCTS;
  $update_prices = $db->Execute($sql);

  while (!$update_prices->EOF) {
    zen_update_products_price_sorter($update_prices->fields['products_id']);
    $update_prices->MoveNext();
  }
}

function ep_update_attributes_sort_order() {
	global $db;
	$all_products_attributes= $db->Execute("select p.products_id, pa.products_attributes_id from " .
	TABLE_PRODUCTS . " p, " .
	TABLE_PRODUCTS_ATTRIBUTES . " pa " . "
	where p.products_id= pa.products_id"
	);
	while (!$all_products_attributes->EOF) {
	  $count++;
	  //$product_id_updated .= ' - ' . $all_products_attributes->fields['products_id'] . ':' . $all_products_attributes->fields['products_attributes_id'];
	  zen_update_attributes_products_option_values_sort_order($all_products_attributes->fields['products_id']);
	  $all_products_attributes->MoveNext();
	}
}

function write_debug_log($string) {
	global $ep_debug_log_path;
	$logFile = $ep_debug_log_path . 'ep_debug_log.txt';
  $fp = fopen($logFile,'ab');
  fwrite($fp, $string);
  fclose($fp);
  return;
}

function ep_query($query) {
	global $ep_debug_logging, $ep_debug_logging_all, $ep_stack_sql_error;
	$result = mysql_query($query);
	if (mysql_errno()) {
		$ep_stack_sql_error = true;
		if ($ep_debug_logging == true) {
			// langer - will add time & date..
			$string = "MySQL error ".mysql_errno().": ".mysql_error()."\nWhen executing:\n$query\n";
			write_debug_log($string);
		}
	} elseif ($ep_debug_logging_all == true) {
		$string = "MySQL PASSED\nWhen executing:\n$query\n";
		write_debug_log($string);
	}
	return $result;
}

function install_easypopulate() {
	global $db;
	$db->Execute("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " VALUES (NULL, '批量商品管理', '批量商品管理设置', '1', '1')");
	$group_id = mysql_insert_id();
	$db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = " . $group_id . " WHERE configuration_group_id = " . $group_id);
	$db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " VALUES 
		(NULL, '上传目录', 'EASYPOPULATE_CONFIG_TEMP_DIR', 'tempEP/', '上传目录名(默认: tempEP/).', " . $group_id . ", '0', NULL, now(), NULL, NULL),
		(NULL, '上传文件日期格式', 'EASYPOPULATE_CONFIG_FILE_DATE_FORMAT', 'm-d-y', 'Choose order of date values that corresponds to your uploads file, usually generated by MS Excel. Raw dates in your uploads file (Eg 2005-09-26 09:00:00) are not affected, and will upload as they are.', " . $group_id . ", '1', NULL, now(), NULL, 'zen_cfg_select_option(array(\"m-d-y\", \"d-m-y\", \"y-m-d\"),'),
		(NULL, '默认时间格式', 'EASYPOPULATE_CONFIG_DEFAULT_RAW_TIME', '09:00:00', 'If no time value stipulated in upload file, use this value. Useful for ensuring specials begin after a specific time of the day (默认: 09:00:00)', " . $group_id . ", '2', NULL, now(), NULL, NULL),
		(NULL, '分批导入的数据量', 'EASYPOPULATE_CONFIG_SPLIT_MAX', '300', 'Default number of records for split-file uploads. Used to avoid timeouts on large uploads (默认: 300).', " . $group_id . ", '3', NULL, now(), NULL, NULL),
		(NULL, '最大分类深度', 'EASYPOPULATE_CONFIG_MAX_CATEGORY_LEVELS', '7', '商店使用的最大分类深度，决定下载文件中分类的栏目数量 (默认: 7).', " . $group_id . ", '4', NULL, now(), NULL, NULL),
		(NULL, '上传/下载价格含税', 'EASYPOPULATE_CONFIG_PRICE_INC_TAX', 'false', '可以选择含税或不含税，取决于您管理价格的方式。', " . $group_id . ", '5', NULL, now(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, '数量为零的产品不激活', 'EASYPOPULATE_CONFIG_ZERO_QTY_INACTIVE', 'false', '批量上传时，如果产品数量为零，产品状态设置为未激活。(默认: false).', " . $group_id . ", '6', NULL, now(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, '换行的智能标签替换', 'EASYPOPULATE_CONFIG_SMART_TAGS', 'true', 'Allows your description fields in your uploads file to have carriage returns and/or new-lines converted to HTML line-breaks on uploading, thus preserving some rudimentary formatting (default: true).', " . $group_id . ", '7', NULL, now(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, '高级智能标签', 'EASYPOPULATE_CONFIG_ADV_SMART_TAGS', 'false', 'Allow the use of complex regular expressions to format descriptions, making headings bold, add bullets, etc. Configuration is in ADMIN/easypopulate.php (default: false).', " . $group_id . ", '8', NULL, now(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, '调试记录', 'EASYPOPULATE_CONFIG_DEBUG_LOGGING', 'true', '生成调试记录 (默认: true)', " . $group_id . ", '9', NULL, now(), NULL, 'zen_cfg_select_option(array(\"true\", \"false\"),'),
		(NULL, '自定义产品字段', 'EASYPOPULATE_CONFIG_CUSTOM_FIELDS', '', '输入用逗号分割的产品数据表里的字段名称，将自动增加到导入、导出文件(例如: products_length, products_width). 请确认这些字段存在 PRODUCTS 表中。', " . $group_id . ", '10', NULL, now(), NULL, NULL)
		");
}

function remove_easypopulate() {
	global $db, $ep_keys;
	
	$sql = "SELECT
			configuration_group_id
		FROM
			" . TABLE_CONFIGURATION_GROUP . "
		WHERE
		configuration_group_title = '批量商品管理'";
		
	$result = ep_query($sql);
	if (mysql_num_rows($result)) {
		// we have at least 1 EP group - let's delete it
		$ep_groups =  mysql_fetch_array($result);
		foreach ($ep_groups as $ep_group) {
			
	    $db->Execute("delete from " . TABLE_CONFIGURATION_GROUP . "
	             where configuration_group_id = '" . (int)$ep_group . "'");
	             
		}
	}
	// now delete any EP keys found in config
	foreach ($ep_keys as $ep_key) {
	  @$db->Execute("delete from " . TABLE_CONFIGURATION . "
	           where configuration_key = '" . $ep_key . "'");
	}
}

function ep_chmod_check($tempdir) {
	global $messageStack;
	
	if (!@file_exists(DIR_FS_CATALOG . $tempdir . ".")) {
		// directory does not exist, or may be unwritable
		@chmod(DIR_FS_CATALOG . $tempdir, 0700); // attempt to make writable - supress error as dir may not exist..
		if (!@file_exists(DIR_FS_CATALOG . $tempdir . ".")) {
			// still can't see it... let's try chmod 777
			@chmod(DIR_FS_CATALOG . $tempdir, 0777); // attempt to make chmod 777 - supress error as dir may not exist..
			if (!@file_exists(DIR_FS_CATALOG . $tempdir . ".")) {
				// still can't see it, so it is probably not there, or is windows server..
				$messageStack->add(sprintf(EASYPOPULATE_MSGSTACK_TEMP_FOLDER_MISSING, $tempdir, DIR_FS_CATALOG), 'warning');
				$chmod_check = false;
			} else {
				// succeeded only with chmod 777 - add msg to ensure index.html is included to prevent file browsing
				$messageStack->add(EASYPOPULATE_MSGSTACK_TEMP_FOLDER_PERMISSIONS_SUCCESS_777, 'success');
				$chmod_check = true;
			}
		} else {
			// we successfully changed to writable @ chmod 700
			$messageStack->add(EASYPOPULATE_MSGSTACK_TEMP_FOLDER_PERMISSIONS_SUCCESS, 'success');
			$chmod_check = true;
		}
	} else {
		$chmod_check = true;
	}
	return $chmod_check;
}

/**
* The following functions are for testing purposes only
*/
// available zen functions of use..
/*
function zen_get_category_name($category_id, $language_id)
function zen_get_category_description($category_id, $language_id)
function zen_get_products_name($product_id, $language_id = 0)
function zen_get_products_description($product_id, $language_id)
function zen_get_products_model($products_id)
*/

function register_globals_vars_check () {
	echo phpversion();
	echo '<br>register_globals = ', ini_get('register_globals'), '<br>';
	print "_GET: "; print_r($_GET); echo '<br />';
	print "_POST: "; print_r($_POST); echo '<br />';
	print "_FILES: "; print_r($_FILES); echo '<br />';
	print "_COOKIE: "; print_r($_COOKIE); echo '<br />';
	print "GLOBALS: "; print_r($GLOBALS); echo '<br />';
	print "_REQUEST: "; print_r($_REQUEST); echo '<br /><br />';
	
	global $HTTP_POST_FILES;
	print "HTTP_POST_FILES: "; print_r($HTTP_POST_FILES); echo '<br />';
}
?>
