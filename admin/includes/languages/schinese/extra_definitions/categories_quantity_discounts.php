<?php
/**
 * Cross Sell products
 *
 * Derived from:
 * Original Idea From Isaac Mualem im@imwebdesigning.com <mailto:im@imwebdesigning.com>
 * Portions Copyright (c) 2002 osCommerce
 * Complete Recoding From Stephen Walker admin@snjcomputers.com
 * Released under the GNU General Public License
 *
 * Adapted to Zen Cart by Merlin - Spring 2005
 * Reworked for Zen Cart v1.3.0  03-30-2006
 */

// this definition is used for admin-menu display
define('BOX_CATEGORIES_QUANTITY_DISCOUNTS','分类数量折扣');

define('HEADING_TITLE', '产品价格管理');
define('HEADING_TITLE_PRODUCT_SELECT','请选择一个产品类别以显示定价信息 ...');

define('TABLE_HEADING_PRODUCTS', '产品');
define('TABLE_HEADING_PRODUCTS_MODEL','型号');
define('TABLE_HEADING_PRODUCTS_PRICE', '产品价格/特别/销售');
define('TABLE_HEADING_PRODUCTS_PERCENTAGE','百分比');
define('TABLE_HEADING_AVAILABLE_DATE', '可用');
define('TABLE_HEADING_EXPIRES_DATE','过期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '动作');

define('TEXT_PRODUCT_INFO', '产品信息:');
define('TEXT_PRODUCTS_PRICE_INFO', '产品价格信息:');
define('TEXT_PRODUCTS_MODEL','型号:');
define('TEXT_PRICE', '价格');
define('TEXT_PRODUCT_AVAILABLE_DATE', '保质期:');
define('TEXT_PRODUCTS_STATUS', '产品状态:');
define('TEXT_PRODUCT_AVAILABLE', '有货');
define('TEXT_PRODUCT_NOT_AVAILABLE', '缺货');

define('TEXT_PRODUCT_INFO_NONE', '请从上面的选项中选择一个 ...');
  define('TEXT_PRODUCT_IS_FREE','免费产品:');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','<br />*标注免费产品');
  define('TEXT_PRODUCT_IS_CALL','价格面议:');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','<br />*标注价格面议产品');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','按属性定价:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','确定');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','取消');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','<br />*显示价格由基本价格和最低组价格组成');
  define('TEXT_PRODUCTS_MIXED','最少数量/单位组合:');
  define('TEXT_PRODUCTS_MIXED_DISCOUNT_QUANTITY', '批量优惠适用于混合属性');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','最少数量:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','最大数量:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0 =无限制<br /> 1 =没有数量盒/最大值');

define('TEXT_FEATURED_PRODUCT_INFO', '推荐产品信息:');
define('TEXT_FEATURED_PRODUCT', '产品:');
define('TEXT_FEATURED_EXPIRES_DATE', '到期日:');
define('TEXT_FEATURED_AVAILABLE_DATE', '可用日期:');
define('TEXT_FEATURED_PRODUCTS_STATUS', '推荐状态:');
define('TEXT_FEATURED_PRODUCT_AVAILABLE', '可用的');
define('TEXT_FEATURED_PRODUCT_NOT_AVAILABLE', '已停用');
define('TEXT_FEATURED_DISABLED', '<strong>注：推荐产品信息当前被禁用，过期或尚未活跃</strong>');

define('TEXT_SPECIALS_PRODUCT', '产品:');
define('TEXT_SPECIALS_SPECIAL_PRICE', '优惠价:');
define('TEXT_SPECIALS_EXPIRES_DATE', '到期日:');
define('TEXT_SPECIALS_AVAILABLE_DATE', '可用日期:');
define('TEXT_SPECIALS_PRICE_TIP', '<b>特别提示:</b><ul><li>在特价场，您可以输入一个百分比扣除价格, 例如: <b>20%</b></li><li>如果你输入一个新的价格，小数分隔符必须是一个 \'.\' （小数点）,例如: <b>49.99</b></li><li>无过期期限的过期的过期日留空</li></ul>');
define('TEXT_SPECIALS_PRODUCT_INFO', '特价产品信息:');
define('TEXT_SPECIALS_PRODUCTS_STATUS', '特价现状:');
define('TEXT_SPECIALS_PRODUCT_AVAILABLE', '可用');
define('TEXT_SPECIALS_PRODUCT_NOT_AVAILABLE', '已停用');
define('TEXT_SPECIALS_NO_GIFTS','在货车无特价商品');
define('TEXT_SPECIAL_DISABLED', '<strong>注：特殊产品信息当前被禁用，过期或尚未激活</strong>');

define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后更新:');
define('TEXT_INFO_NEW_PRICE', '新价格:');
define('TEXT_INFO_ORIGINAL_PRICE', '原始价格:');
define('TEXT_INFO_PERCENTAGE', '百分比:');
define('TEXT_INFO_AVAILABLE_DATE', '可用期:');
define('TEXT_INFO_EXPIRES_DATE', '过期失效时间:');
define('TEXT_INFO_STATUS_CHANGE', '更改状态:');
define('TEXT_IMAGE_NONEXISTENT', '不存在图片');

define('TEXT_INFO_HEADING_DELETE_FEATURED', '删除推荐');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除推荐产品?');

  define('TEXT_ATTRIBUTES_INSERT_INFO', '<strong>定义的属性设置，然后按插入申请</strong>');
  define('TEXT_PRICED_BY_ATTRIBUTES', '按属性定价');
  define('TEXT_PRODUCTS_PRICE', '产品价格: ');
  define('TEXT_SPECIAL_PRICE', '特价: ');
  define('TEXT_SALE_PRICE', '销售价: ');
  define('TEXT_FREE', '免费');
  define('TEXT_CALL_FOR_PRICE', '价格面议');

define('TEXT_ADD_ADDITIONAL_DISCOUNT', '添加 ' . DISCOUNT_QTY_ADD . ' 空白批量优惠:');
define('TEXT_BLANKS_INFO','所有0数量折扣产品更新时将被删除');
define('TEXT_INFO_NO_DISCOUNTS', '没有指定的数量折扣');
define('TEXT_PRODUCTS_DISCOUNT_QTY_TITLE', '折扣级别');
define('TEXT_PRODUCTS_DISCOUNT','折扣');
define('TEXT_PRODUCTS_DISCOUNT_QTY','最低数量');
define('TEXT_PRODUCTS_DISCOUNT_PRICE','折扣价值');
define('TEXT_PRODUCTS_DISCOUNT_TYPE','类型');

define('TEXT_PRODUCTS_DISCOUNT_PRICE_EACH','计算价格:');
define('TEXT_PRODUCTS_DISCOUNT_PRICE_EXTENDED','总价:');
define('TEXT_PRODUCTS_DISCOUNT_PRICE_EACH_TAX','价格计算<br />: &nbsp;税费:');
define('TEXT_PRODUCTS_DISCOUNT_PRICE_EXTENDED_TAX','扩展<br />价格: &nbsp; 税费:');

define('TEXT_EACH','ea.');
define('TEXT_EXTENDED','总计');

define('TEXT_DISCOUNT_TYPE_INFO', '分类折扣信息');
define('TEXT_DISCOUNT_TYPE','折扣类型:');
define('TEXT_DISCOUNT_TYPE_FROM', '折扣价格从:');

define('DISCOUNT_TYPE_DROPDOWN_0','没有');
define('DISCOUNT_TYPE_DROPDOWN_1','百分比');
define('DISCOUNT_TYPE_DROPDOWN_2','实际价格');
define('DISCOUNT_TYPE_DROPDOWN_3','节省百分比');

define('DISCOUNT_TYPE_FROM_DROPDOWN_0','价格');
define('DISCOUNT_TYPE_FROM_DROPDOWN_1','特价');

define('TEXT_UPDATE_COMMIT','更新当前显示的所有的更新和提交变化');

define('TEXT_PRODUCTS_TAX_CLASS', '税类:');

define('TEXT_INFO_MASTER_CATEGORIES_ID_WARNING', '<strong>警告:</strong> 产品主类别ID# %s 不匹配当前类别 ID# %s 以及产品之间无关联');
define('TEXT_INFO_MASTER_CATEGORIES_CURRENT', ' 当前类别ID# %s匹配主类别 ID# %s');
define('TEXT_INFO_MASTER_CATEGORIES_ID_UPDATE_TO_CURRENT', '更新主类别ID# %s 以符合当前类别 ID# %s');

define('PRODUCT_WARNING_UPDATE', '进行任何更改 ，请按保存更新保存按钮');
define('PRODUCT_UPDATE_SUCCESS', '成功更新的产品变更!');
define('PRODUCT_WARNING_UPDATE_CANCEL', '更改取消和无保存...');
define('TEXT_INFO_EDIT_CAUTION', '<strong>点击开始编辑 ...</strong>');
define('TEXT_INFO_PREVIEW_ONLY', '只预览...当前价格状态...只预览');
define('TEXT_INFO_UPDATE_REMINDER', '<strong>编辑产品信息，然后更新保存</strong>');

?>