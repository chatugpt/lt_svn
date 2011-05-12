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
//  $Id: featured.php 4533 2006-09-17 17:21:10Z ajeh $
//

define('HEADING_TITLE', '特色产品');

define('TABLE_HEADING_PRODUCTS', '产品');
define('TABLE_HEADING_PRODUCTS_MODEL','型号');
define('TABLE_HEADING_PRODUCTS_PRICE', '产品价格/特别的/在售');
define('TABLE_HEADING_PRODUCTS_PERCENTAGE','百分比');
define('TABLE_HEADING_AVAILABLE_DATE', '可用的');
define('TABLE_HEADING_EXPIRES_DATE','过期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '选项');

//FEATURED: These 2 defines added for featured table in admin section
define('TABLE_HEADING_SORT_ORDER','排序');
define('TEXT_FEATURED_SORT_ORDER', '排序:');


define('TEXT_FEATURED_PRODUCT', '产品:');
define('TEXT_FEATURED_EXPIRES_DATE', '到期日:');
define('TEXT_FEATURED_AVAILABLE_DATE', '可用日期:');

define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后修改:');
define('TEXT_INFO_NEW_PRICE', '新价格:');
define('TEXT_INFO_ORIGINAL_PRICE', '原价格:');
define('TEXT_INFO_PERCENTAGE', '百分比:');
define('TEXT_INFO_AVAILABLE_DATE', '可用中:');
define('TEXT_INFO_EXPIRES_DATE', '过期失效时间:');
define('TEXT_INFO_STATUS_CHANGE', '状态改变:');
define('TEXT_IMAGE_NONEXISTENT', '不存在图片');

define('TEXT_INFO_HEADING_DELETE_FEATURED', '删除精选');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除特色产品?');

define('SUCCESS_FEATURED_PRE_ADD', '成功：新增的特征...请更新日期 ...');
define('WARNING_FEATURED_PRE_ADD_EMPTY', '警告: 产品ID没有指定 ... 没有添加任何东西 ...');
define('WARNING_FEATURED_PRE_ADD_DUPLICATE', '警告: 产品ID已经是特价标识 ... 没有添加任何东西...');
define('WARNING_FEATURED_PRE_ADD_BAD_PRODUCTS_ID', '警告: 产品ID无效 ... 没有添加任何东西 ...');
define('TEXT_INFO_HEADING_PRE_ADD_FEATURED', ' 通过产品ID手动添加特色产品');
define('TEXT_INFO_PRE_ADD_INTRO', '在大型数据库,你可用通过产品ID手动的添加特色产品  <br /><br /> 这是最好用的，当页面显示时间过长和试图从下拉菜单中选择产品会变得困难，这主要是因为有太多的产品可供选择 。');
define('TEXT_PRE_ADD_PRODUCTS_ID', '增加前请先键入产品ID: ');
define('TEXT_INFO_MANUAL', '作为一个特征属性，产品ID是手动添加的');
?>