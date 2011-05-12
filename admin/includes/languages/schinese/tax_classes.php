<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tax_classes.php 7167 2007-10-03 23:02:17Z drbyte $
 */

define('HEADING_TITLE', '税类');

define('TABLE_HEADING_TAX_CLASS_ID', 'ID');
define('TABLE_HEADING_TAX_CLASSES', '税类');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_INFO_EDIT_INTRO', '请进行任何必要的修改');
define('TEXT_INFO_CLASS_TITLE', '税类标题:');
define('TEXT_INFO_CLASS_DESCRIPTION', '描述:');
define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后修改:');
define('TEXT_INFO_INSERT_INTRO', '请输入相关数据的新税类');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除此税类?');
define('TEXT_INFO_HEADING_NEW_TAX_CLASS', '新税类');
define('TEXT_INFO_HEADING_EDIT_TAX_CLASS', '编辑税类');
define('TEXT_INFO_HEADING_DELETE_TAX_CLASS', '删除税类');
define('ERROR_TAX_RATE_EXISTS_FOR_CLASS', '错误：不能删除此税类 - 税率目前连结此税类.');
define('ERROR_TAX_RATE_EXISTS_FOR_PRODUCTS', '错误：不能删除此税类的 - 有 %s 链接到本类产品税.');
?>