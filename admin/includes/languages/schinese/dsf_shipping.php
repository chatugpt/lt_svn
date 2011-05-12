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

define('HEADING_TITLE', '4PX 运送');

define('TABLE_HEADING_DSF_SHIPPING', '4PX 运送');
define('TABLE_HEADING_ACTION', '作用');

define('TEXT_HEADING_NEW_MANUFACTURER', '新厂商');
define('TEXT_HEADING_EDIT_MANUFACTURER', '编辑制造商');
define('TEXT_HEADING_DELETE_MANUFACTURER', '删除制造商');

define('TEXT_DSF_SHIPPING', '4PX 运送:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_LAST_MODIFIED', '最后修改:');
define('TEXT_PRODUCTS', '产品:');
define('TEXT_PRODUCTS_IMAGE_DIR', '上传路径:');
define('TEXT_IMAGE_NONEXISTENT', '图像不存在');
define('TEXT_DSF_SHIPPING_IMAGE_MANUAL', '<strong>或, 从服务器的文件里选择一个存在的图像文件:</strong>');

define('TEXT_NEW_INTRO', '请为新的4PX运送填写下面的信息');
define('TEXT_EDIT_INTRO', '请做必要的更改');

define('TEXT_DSF_SHIPPING_NAME', '4PX 运送名称:');
define('TEXT_DSF_SHIPPING_IMAGE', '4PX 运送图像:');
define('TEXT_DSF_SHIPPING_URL', '4PX 运送URL:');

define('TEXT_DELETE_INTRO', '你确定要删除这个4PX运送吗?');
define('TEXT_DELETE_IMAGE', '删除4PX运送图像?');
define('TEXT_DELETE_PRODUCTS', '从这次4PX运送中删除产品？ (包括产品评论，特价产品，新近产品等)');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>警告:</b> 还有 %s 个产品和这次4PX运送相关!');

define('ERROR_DIRECTORY_NOT_WRITEABLE', '错误:该路径不可写。请设置合法的用户使用权限: %s');
define('ERROR_DIRECTORY_DOES_NOT_EXIST', '错误: 路径不存在: %s');


define('TABLE_HEADING_DSF_SHIPPING_CODE', '运送号码');
define('TABLE_HEADING_DSF_SHIPPING_NAME', '运送名称');
define('TABLE_HEADING_SHIPPING_DISPLAYS_NAME', '显示名称');
define('TABLE_HEADING_SHIPPING_DISPLAYS_IMAGE', '显示图像');
define('TABLE_HEADING_SHIPPING_DISPLAYS_NOTE', '显示注意事项');
define('TABLE_HEADING_PRICE_PERCENTAGE', '价格百分比');
define('TABLE_HEADING_PRICE_INCREASE', '价格增长');
define('TABLE_HEADING_SORT_INDEX', '排序');
define('TABLE_HEADING_MODIFIED', '修改日期');

define('TEXT_DISPLAY_NUMBER_OF_DSF_SHIPPING', '显示 <b>%d</b> 至<b>%d</b> (对于 <b>%d</b> 运送)');


?>