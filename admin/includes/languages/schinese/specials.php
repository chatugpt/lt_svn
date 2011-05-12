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
//  $Id: specials.php 4533 2006-09-17 17:21:10Z ajeh $
//

define('HEADING_TITLE', '特价');

define('TABLE_HEADING_PRODUCTS', '产品');
define('TABLE_HEADING_PRODUCTS_MODEL','型号');
define('TABLE_HEADING_PRODUCTS_PRICE', '产中价格/特价/卖');
define('TABLE_HEADING_PRODUCTS_PERCENTAGE','百分比');
define('TABLE_HEADING_AVAILABLE_DATE', '可用');
define('TABLE_HEADING_EXPIRES_DATE','过期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_SPECIALS_PRODUCT', '产品:');
define('TEXT_SPECIALS_SPECIAL_PRICE', '特价价格:');
define('TEXT_SPECIALS_EXPIRES_DATE', '过期日期:');
define('TEXT_SPECIALS_AVAILABLE_DATE', '可能日期:');
define('TEXT_SPECIALS_PRICE_TIP', '<b>特价说明:</b><ul><li>您可以输入一个百分比扣除在特价商品价格，例如: <b>20%</b></li><li>如果你输入一个新的价格，小数分隔符必须是一个\'.\' (decimal-point), 例如: <b>49.99</b></li><li>给过期日期不能为空</li></ul>');

define('TEXT_INFO_DATE_ADDED', '上架日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后修改:');
define('TEXT_INFO_NEW_PRICE', '新价格:');
define('TEXT_INFO_ORIGINAL_PRICE', '原价格:');
define('TEXT_INFO_DISPLAY_PRICE', '显示价格:<br />');
define('TEXT_INFO_AVAILABLE_DATE', '可用日期:');
define('TEXT_INFO_EXPIRES_DATE', '过期失效时间:');
define('TEXT_INFO_STATUS_CHANGE', '状态改变:');
define('TEXT_IMAGE_NONEXISTENT', '没有图片存在');

define('TEXT_INFO_HEADING_DELETE_SPECIALS', '删除特价');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除特殊产品的价格?');

define('SUCCESS_SPECIALS_PRE_ADD', '成功：预加特价...请更新的价格和日期 ...');
define('WARNING_SPECIALS_PRE_ADD_EMPTY', '警告：没有产品ID指定...什么也没有添加 ...');
define('WARNING_SPECIALS_PRE_ADD_DUPLICATE', '警告：产品ID已经为特价产品...什么也没有添加...');
define('WARNING_SPECIALS_PRE_ADD_BAD_PRODUCTS_ID', '警告：产品ID无效 ... 什么也没有添加 ...');
define('TEXT_INFO_HEADING_PRE_ADD_SPECIALS', '手动添加新的特价产品ID');
define('TEXT_INFO_PRE_ADD_INTRO', '在大型数据库，你可以手动添加一个特别的产品ID<br /><br />这是最好用在页面渲染时间过长，并试图从下拉选择产品变得困难，因为太多的产品可供选择.');
define('TEXT_PRE_ADD_PRODUCTS_ID', '请输入预先新增的产品ID: ');
define('TEXT_INFO_MANUAL', '产品ID手动添加为特价');
?>