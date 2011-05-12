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
//  $Id: products_price_manager.php 543 2004-11-13 19:19:29Z wilt $
//

define('HEADING_TITLE', '产品价格管理');
define('HEADING_TITLE_PRODUCT_SELECT','请选择一个产品类别以显示定价信息 ...');

define('TABLE_HEADING_PRODUCTS', '产品');
define('TABLE_HEADING_PRODUCTS_MODEL','型号');
define('TABLE_HEADING_PRODUCTS_PRICE', '产品价格/特别/销售');
define('TABLE_HEADING_PRODUCTS_PERCENTAGE','百分比');
define('TABLE_HEADING_AVAILABLE_DATE', '可用的');
define('TABLE_HEADING_EXPIRES_DATE','过期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_PRODUCT_INFO', '产品信息:');
define('TEXT_PRODUCTS_PRICE_INFO', '产品价格信息:');
define('TEXT_PRODUCTS_MODEL','型号:');
define('TEXT_PRICE', '价格');
define('TEXT_PRODUCT_AVAILABLE_DATE', '可用日期:');
define('TEXT_PRODUCTS_STATUS', '产品状态:');
define('TEXT_PRODUCT_AVAILABLE', '库存');
define('TEXT_PRODUCT_NOT_AVAILABLE', '缺货');

define('TEXT_PRODUCT_INFO_NONE', '请从以上选择一个产品 ...');
  define('TEXT_PRODUCT_IS_FREE','产品是免费的:');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','<br />*产品标记为免费');
  define('TEXT_PRODUCT_IS_CALL','价格面议:');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','<br />*产品标记为价格面议');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','按属性定价:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','是');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','否');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','<br />*显示价格将包括最低组属性价格另加价格');
  define('TEXT_PRODUCTS_MIXED','数量最少/单位组合:');
  define('TEXT_PRODUCTS_MIXED_DISCOUNT_QUANTITY', '批量优惠适用于混合属性');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','数量最少:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','数量最大:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0= 无限<br />1= 没有数量盒/最大值');

define('TEXT_FEATURED_PRODUCT_INFO', '推荐产品信息:');
define('TEXT_FEATURED_PRODUCT', '产品:');
define('TEXT_FEATURED_EXPIRES_DATE', '过期日期:');
define('TEXT_FEATURED_AVAILABLE_DATE', '可用日期:');
define('TEXT_FEATURED_PRODUCTS_STATUS', '推荐状态:');
define('TEXT_FEATURED_PRODUCT_AVAILABLE', '活动');
define('TEXT_FEATURED_PRODUCT_NOT_AVAILABLE', '非活动');
define('TEXT_FEATURED_DISABLED', '<strong>注：推荐产品信息当前被禁用，过期或尚未活跃</strong>');

define('TEXT_SPECIALS_PRODUCT', '产品:');
define('TEXT_SPECIALS_SPECIAL_PRICE', '特价:');
define('TEXT_SPECIALS_EXPIRES_DATE', '过期日期:');
define('TEXT_SPECIALS_AVAILABLE_DATE', '可能日期:');
define('TEXT_SPECIALS_PRICE_TIP', '<b>特价商品说明:</b><ul><li>您可以输入一个百分比扣除在特价商品价格领域，例如： <b>20%</b></li><li>如果你输入一个新的价格，小数分隔符必须是一个\'.\' (小数点), 例如: <b>49.99</b></li><li>离过满日期没有空</li></ul>');
define('TEXT_SPECIALS_PRODUCT_INFO', '特价信息:');
define('TEXT_SPECIALS_PRODUCTS_STATUS', '特价状态:');
define('TEXT_SPECIALS_PRODUCT_AVAILABLE', '活跃');
define('TEXT_SPECIALS_PRODUCT_NOT_AVAILABLE', '非活跃');
define('TEXT_SPECIALS_NO_GIFTS','无特价商品');
define('TEXT_SPECIAL_DISABLED', '<strong>注：特殊产品信息当前被禁用，过期或尚未活跃</strong>');

define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后更新:');
define('TEXT_INFO_NEW_PRICE', '新价格:');
define('TEXT_INFO_ORIGINAL_PRICE', '原始价格:');
define('TEXT_INFO_PERCENTAGE', '百分比:');
define('TEXT_INFO_AVAILABLE_DATE', '可在:');
define('TEXT_INFO_EXPIRES_DATE', '过期失效时间:');
define('TEXT_INFO_STATUS_CHANGE', '状态改变:');
define('TEXT_IMAGE_NONEXISTENT', '没有图片存在');

define('TEXT_INFO_HEADING_DELETE_FEATURED', '删除推荐');
define('TEXT_INFO_DELETE_INTRO', '您好真的想删除推荐产品?');

  define('TEXT_ATTRIBUTES_INSERT_INFO', '<strong>定义的属性设置，然后按插入申请</strong>');
  define('TEXT_PRICED_BY_ATTRIBUTES', '按属性定价');
  define('TEXT_PRODUCTS_PRICE', '产品价格: ');
  define('TEXT_SPECIAL_PRICE', '特价产品价格: ');
  define('TEXT_SALE_PRICE', '销售价格: ');
  define('TEXT_FREE', '免费');
  define('TEXT_CALL_FOR_PRICE', '价格面议');

define('TEXT_ADD_ADDITIONAL_DISCOUNT', '添加 ' . DISCOUNT_QTY_ADD . ' 空白批量优惠:');
define('TEXT_BLANKS_INFO','所有0数量折扣更新时将被删除');
define('TEXT_INFO_NO_DISCOUNTS', '没有数量折扣已经确定');
define('TEXT_PRODUCTS_DISCOUNT_QTY_TITLE', '折扣级别');
define('TEXT_PRODUCTS_DISCOUNT','折扣');
define('TEXT_PRODUCTS_DISCOUNT_QTY','最低数量');
define('TEXT_PRODUCTS_DISCOUNT_PRICE','折扣值');
define('TEXT_PRODUCTS_DISCOUNT_TYPE','类型');

define('TEXT_PRODUCTS_DISCOUNT_PRICE_EACH','计算价格:');
define('TEXT_PRODUCTS_DISCOUNT_PRICE_EXTENDED','总价:');
define('TEXT_PRODUCTS_DISCOUNT_PRICE_EACH_TAX','计算<br />价格: &nbsp; 征税:');
define('TEXT_PRODUCTS_DISCOUNT_PRICE_EXTENDED_TAX','扩展<br />价格: &nbsp; 征税:');

define('TEXT_EACH','每个.');
define('TEXT_EXTENDED','总计');

define('TEXT_DISCOUNT_TYPE_INFO', '产品折扣信息');
define('TEXT_DISCOUNT_TYPE','折扣类型:');
define('TEXT_DISCOUNT_TYPE_FROM', '折扣价格从:');

define('DISCOUNT_TYPE_DROPDOWN_0','没有');
define('DISCOUNT_TYPE_DROPDOWN_1','百分比');
define('DISCOUNT_TYPE_DROPDOWN_2','实际价格');
define('DISCOUNT_TYPE_DROPDOWN_3','额冲抵');

define('DISCOUNT_TYPE_FROM_DROPDOWN_0','价格');
define('DISCOUNT_TYPE_FROM_DROPDOWN_1','特价');

define('TEXT_UPDATE_COMMIT','更新和提交当前屏幕显示所有的变化');

define('TEXT_PRODUCTS_TAX_CLASS', '税类:');

define('TEXT_INFO_MASTER_CATEGORIES_ID_WARNING', '<strong>警告:</strong> 产品主类别ID# %s 不符合当前类别ID# %s 与产品没有链接!');
define('TEXT_INFO_MASTER_CATEGORIES_CURRENT', ' 当前类别ID# %s 匹配主分类产品类别ID# %s');
define('TEXT_INFO_MASTER_CATEGORIES_ID_UPDATE_TO_CURRENT', '更新主分类类别 ID# %s 匹配当前分类ID# %s');

define('PRODUCT_WARNING_UPDATE', '请进行任何更改，然后按更新保存');
define('PRODUCT_UPDATE_SUCCESS', '成功更新的产品变更!');
define('PRODUCT_WARNING_UPDATE_CANCEL', '变化是取消，而不是保存 ...');
define('TEXT_INFO_EDIT_CAUTION', '<strong>点击开始编辑 ...</strong>');
define('TEXT_INFO_PREVIEW_ONLY', '只是预览...当前价格状态...只是预览');
define('TEXT_INFO_UPDATE_REMINDER', '<strong>编辑产品信息，然后更新保存</strong>');
?>