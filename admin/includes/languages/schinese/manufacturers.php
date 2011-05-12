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
//  $Id: manufacturers.php 4808 2006-10-22 18:48:53Z ajeh $
//

define('HEADING_TITLE', '生产厂商');

define('TABLE_HEADING_MANUFACTURERS', '生产厂商');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_HEADING_NEW_MANUFACTURER', '新生产厂商');
define('TEXT_HEADING_EDIT_MANUFACTURER', '编辑生产厂商');
define('TEXT_HEADING_DELETE_MANUFACTURER', '删除生产厂商');

define('TEXT_MANUFACTURERS', '生产厂商:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_LAST_MODIFIED', '最近更新:');
define('TEXT_PRODUCTS', '产品:');
define('TEXT_PRODUCTS_IMAGE_DIR', '上传目录:');
define('TEXT_IMAGE_NONEXISTENT', '不存在图片');
define('TEXT_MANUFACTURERS_IMAGE_MANUAL', '<strong>或, 选择一个服务器上现有的图像文件，文件名:</strong>');

define('TEXT_NEW_INTRO', '请填写新制造商的下列信息');
define('TEXT_EDIT_INTRO', '请进行任何必要的修改');

define('TEXT_MANUFACTURERS_NAME', '制造商名称:');
define('TEXT_MANUFACTURERS_IMAGE', '制造商图片:');
define('TEXT_MANUFACTURERS_URL', '制造商URL:');

define('TEXT_DELETE_INTRO', '你确定要删除这家制造商?');
define('TEXT_DELETE_IMAGE', '图像删除厂商?');
define('TEXT_DELETE_PRODUCTS', '产品从制造商删除? (包括产品评论，在特殊的，即将上市的产品产品)');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>警告:</b> 有  %s 产品关联这家制造商!');

define('ERROR_DIRECTORY_NOT_WRITEABLE', '错误：我无法写入这个目录。请设置正确的使用权限: %s');
define('ERROR_DIRECTORY_DOES_NOT_EXIST', '错误：目录不存在: %s');
?>