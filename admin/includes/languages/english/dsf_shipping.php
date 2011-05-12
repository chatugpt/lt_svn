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
//  $Id: 4PX shippings.php 4808 2006-10-22 18:48:53Z ajeh $
//

define('HEADING_TITLE', '4PX Shipping');

define('TABLE_HEADING_DSF_SHIPPING', '4PX Shipping');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_HEADING_NEW_MANUFACTURER', 'New Manufacturer');
define('TEXT_HEADING_EDIT_MANUFACTURER', 'Edit Manufacturer');
define('TEXT_HEADING_DELETE_MANUFACTURER', 'Delete Manufacturer');

define('TEXT_DSF_SHIPPING', '4PX Shipping:');
define('TEXT_DATE_ADDED', 'Date Added:');
define('TEXT_LAST_MODIFIED', 'Last Modified:');
define('TEXT_PRODUCTS', 'Products:');
define('TEXT_PRODUCTS_IMAGE_DIR', 'Upload to directory:');
define('TEXT_IMAGE_NONEXISTENT', 'IMAGE DOES NOT EXIST');
define('TEXT_DSF_SHIPPING_IMAGE_MANUAL', '<strong>Or, select an existing image file from server, filename:</strong>');

define('TEXT_NEW_INTRO', 'Please fill out the following information for the new 4PX shipping');
define('TEXT_EDIT_INTRO', 'Please make any necessary changes');

define('TEXT_DSF_SHIPPING_NAME', '4PX Shipping Name:');
define('TEXT_DSF_SHIPPING_IMAGE', '4PX Shipping Image:');
define('TEXT_DSF_SHIPPING_URL', '4PX Shipping URL:');

define('TEXT_DELETE_INTRO', 'Are you sure you want to delete this 4PX shipping?');
define('TEXT_DELETE_IMAGE', 'Delete 4PX shippings image?');
define('TEXT_DELETE_PRODUCTS', 'Delete products from this 4PX shipping? (including product reviews, products on special, upcoming products)');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>WARNING:</b> There are %s products still linked to this 4PX shipping!');

define('ERROR_DIRECTORY_NOT_WRITEABLE', 'Error: I can not write to this directory. Please set the right user permissions on: %s');
define('ERROR_DIRECTORY_DOES_NOT_EXIST', 'Error: Directory does not exist: %s');


define('TABLE_HEADING_DSF_SHIPPING_CODE', 'Shipping Code');
define('TABLE_HEADING_DSF_SHIPPING_NAME', 'Shipping Name');
define('TABLE_HEADING_SHIPPING_DISPLAYS_NAME', 'Display Name');
define('TABLE_HEADING_SHIPPING_DISPLAYS_IMAGE', 'Display Image');
define('TABLE_HEADING_SHIPPING_DISPLAYS_NOTE', 'Display Note');
define('TABLE_HEADING_PRICE_PERCENTAGE', 'Price Percentage');
define('TABLE_HEADING_PRICE_INCREASE', 'Price Increase');
define('TABLE_HEADING_SORT_INDEX', 'Sort');
define('TABLE_HEADING_MODIFIED', 'Modified Date');
define('TABLE_HEADING_STATUS', 'Status');


define('TEXT_DSF_SHIPPING_STATUS', '物流状态');
define('TEXT_DSF_SHIPPING_CODE', '物流编码');
define('TEXT_SHIPPING_DISPLAYS_NAME', '前台显示名称');
define('TEXT_SHIPPING_DISPLAYS_IMAGE', '前台显示图片地址');
define('TEXT_SHIPPING_DISPLAYS_NOTE', '前台显示备注信息');
define('TEXT_PRICE_PERCENTAGE', '结果百分比');
define('TEXT_PRICE_INCREASE', '结果增减量');

define('TEXT_DSF_SHIPPING_STATUS_TITLE', '物流状态');
define('TEXT_DSF_SHIPPING_CODE_TITLE', '物流编码');
define('TEXT_DSF_SHIPPING_NAME_TITLE', '物流名称');
define('TEXT_SHIPPING_DISPLAYS_NAME_TITLE', '前台显示名称');
define('TEXT_SHIPPING_DISPLAYS_IMAGE_TITLE', '前台显示图片地址');
define('TEXT_SHIPPING_DISPLAYS_NOTE_TITLE', '前台显示备注信息');
define('TEXT_PRICE_PERCENTAGE_TITLE', '结果百分比');
define('TEXT_PRICE_INCREASE_TITLE', '结果增减量');
define('TEXT_SORT_INDEX_TITLE', '排序');


define('TEXT_DSF_SHIPPING_STATUS_DESC', '物流状态');
define('TEXT_DSF_SHIPPING_CODE_DESC', '物流编码');
define('TEXT_DSF_SHIPPING_NAME_DESC', '物流名称');
define('TEXT_SHIPPING_DISPLAYS_NAME_DESC', '前台显示名称');
define('TEXT_SHIPPING_DISPLAYS_IMAGE_DESC', '前台显示图片地址');
define('TEXT_SHIPPING_DISPLAYS_NOTE_DESC', '前台显示备注信息');
define('TEXT_PRICE_PERCENTAGE_DESC', '结果百分比');
define('TEXT_PRICE_INCREASE_DESC', '结果增减量');
define('TEXT_SORT_INDEX_DESC', '排序');


define('TEXT_HEADING_DSF_ACCOUNT_INSTALL', '递四方物流接口安装');
define('TEXT_DSF_STATUS_TITLE', '状态');
define('TEXT_DSF_STATUS_DESC', 'true表示开启，false表示关闭');
define('TEXT_DSF_USERNAME_TITLE', '递四方用户名');
define('TEXT_DSF_USERNAME_DESC', '如果没有请和4px联系拿折扣，递四方网址：http://www.4px.cc');
define('TEXT_DSF_PASSWORD_TITLE', '密码');
define('TEXT_DSF_PASSWORD_DESC', '密码');


define('TEXT_DISPLAY_NUMBER_OF_DSF_SHIPPING', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> shipping)');


?>