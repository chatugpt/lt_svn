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
//  $Id: downloads_manager.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE','下载管理器');
define('TABLE_HEADING_ATTRIBUTES_ID', '属性 ID');
define('TABLE_HEADING_PRODUCTS_ID', '产品 ID');
define('TABLE_HEADING_PRODUCT', '产品名称');
define('TABLE_HEADING_MODEL', '型号');
define('TABLE_HEADING_OPT_NAME', '选项名称');
define('TABLE_HEADING_OPT_VALUE', '选项值名称');
define('TABLE_TEXT_FILENAME', '文件名称');
define('TABLE_TEXT_MAX_DAYS', '天数');
define('TABLE_TEXT_MAX_COUNT', '数量');
define('TABLE_HEADING_ACTION', '选项');

define('TABLE_HEADING_OPT_PRICE', '价格');
define('TABLE_HEADING_OPT_PRICE_PREFIX', '前缀');

define('TEXT_PRODUCTS_NAME', '产品: ');
define('TEXT_PRODUCTS_MODEL', '型号: ');

define('TEXT_INFO_HEADING_EDIT_PRODUCTS_DOWNLOAD', '编辑下载信息');
define('TEXT_INFO_HEADING_DELETE_PRODUCTS_DOWNLOAD', '确认删除下载');
define('TEXT_INFO_EDIT_INTRO', '编辑下载信息:');
define('TEXT_DELETE_INTRO', '下列文件将被从数据库中删除. 这不会删除服务器上的文件:');

define('TEXT_INFO_FILENAME', '文件名称: ');
define('TEXT_INFO_MAX_DAYS', '最大天数: ');
define('TEXT_INFO_MAX_COUNT', '最大下载: ');

define('TEXT_INFO_FILENAME_MISSING','&nbsp;遗失文件名');
define('TEXT_INFO_FILENAME_GOOD','&nbsp;有效的文件名');
?>