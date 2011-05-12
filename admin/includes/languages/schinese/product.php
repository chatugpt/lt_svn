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
//  $Id: product.php 2830 2006-01-10 17:13:18Z birdbrain $
//

define('HEADING_TITLE', '类别/商品');
define('HEADING_TITLE_GOTO', '前往:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', '类别/商品');
define('TABLE_HEADING_CATEGORIES_SORT_ORDER', '排序');

define('TABLE_HEADING_PRICE','价格/特价/Sale');
define('TABLE_HEADING_QUANTITY','数量');

define('TABLE_HEADING_ACTION', '操作');
define('TABLE_HEADING_STATUS', '状态');

define('TEXT_CATEGORIES', '类别:');
define('TEXT_SUBCATEGORIES', '子类别:');
define('TEXT_PRODUCTS', '商品:');
define('TEXT_PRODUCTS_PRICE_INFO', '价格:');
define('TEXT_PRODUCTS_TAX_CLASS', '税收类别:');
define('TEXT_PRODUCTS_AVERAGE_RATING', '平均评分:');
define('TEXT_PRODUCTS_QUANTITY_INFO', '数量:');
define('TEXT_DATE_ADDED', '上架日期:');
define('TEXT_DATE_AVAILABLE', '开售日期:');
define('TEXT_LAST_MODIFIED', '最后更新:');
define('TEXT_IMAGE_NONEXISTENT', '图片不存在');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', '请添加类别或商品.');
define('TEXT_PRODUCT_MORE_INFORMATION', '了解更多关于该商品的信息，请访问它的<a href="http://%s" target="blank">相关页</a>.');
define('TEXT_PRODUCT_DATE_ADDED', '该商品添加于%s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', '该商品将于%s上架.');

define('TEXT_EDIT_INTRO', '请进行必要修改');
define('TEXT_EDIT_CATEGORIES_ID', '类别ID:');
define('TEXT_EDIT_CATEGORIES_NAME', '类别名:');
define('TEXT_EDIT_CATEGORIES_IMAGE', '类别图片:');
define('TEXT_EDIT_SORT_ORDER', '排序:');

define('TEXT_INFO_COPY_TO_INTRO', '请选择目标类别');
define('TEXT_INFO_CURRENT_CATEGORIES', '当前目录: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', '新类别');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', '编辑类别');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', '删除类别');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', '移动类别');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', '删除产品');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', '移动产品');
define('TEXT_INFO_HEADING_COPY_TO', '拷贝到');

define('TEXT_DELETE_CATEGORY_INTRO', '确认删除该类别?');
define('TEXT_DELETE_PRODUCT_INTRO', '您确定要永久删除此产品?<br /><br /><strong>警告:</strong> 在链接产品<br />1 确保主类别已被更改，如果你要删除的主类别<br /> 2检查产品的复选框删除的类别产品从');

define('TEXT_DELETE_WARNING_CHILDS', '<b>警告:</b> 有 %s 子分类仍然链接这个类别!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>警告:</b> 有 %s 产品仍然链接这个类别!');

define('TEXT_MOVE_PRODUCTS_INTRO', '请选择您想要哪一类 <b>%s</b> 在');
define('TEXT_MOVE_CATEGORIES_INTRO', '请选择您想要哪一类 <b>%s</b> 在');
define('TEXT_MOVE', '移动 <b>%s</b> to:');

define('TEXT_NEW_CATEGORY_INTRO', '请填写新类别下面的信息');
define('TEXT_CATEGORIES_NAME', '类别名:');
define('TEXT_CATEGORIES_IMAGE', '类别图片:');
define('TEXT_SORT_ORDER', '排序:');

define('TEXT_PRODUCTS_STATUS', '商品状态:');
define('TEXT_PRODUCTS_VIRTUAL', '虚拟商品？:');
define('TEXT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '永久免费送货:');
define('TEXT_PRODUCTS_QTY_BOX_STATUS', '产品数量框显示:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', '可用日期:');
define('TEXT_PRODUCT_AVAILABLE', '库存');
define('TEXT_PRODUCT_NOT_AVAILABLE', '缺货');
define('TEXT_PRODUCT_IS_VIRTUAL', '是的，跳过送货地址');
define('TEXT_PRODUCT_NOT_VIRTUAL', '不，送货地址要求');
define('TEXT_PRODUCT_IS_ALWAYS_FREE_SHIPPING', '是的，永久免费送货');
define('TEXT_PRODUCT_NOT_ALWAYS_FREE_SHIPPING', '不，正常的航运规则');
define('TEXT_PRODUCT_SPECIAL_ALWAYS_FREE_SHIPPING', '特别，产品/下载组合需要一个送货地址');
define('TEXT_PRODUCTS_SORT_ORDER', '排序:');

define('TEXT_PRODUCTS_QTY_BOX_STATUS_ON', '是的，显示数量方框');
define('TEXT_PRODUCTS_QTY_BOX_STATUS_OFF', '不，不显示数量方框');

define('TEXT_PRODUCTS_MANUFACTURER', '产品制造商:');
define('TEXT_PRODUCTS_NAME', '产品名:');
define('TEXT_PRODUCTS_DESCRIPTION', '产品描述:');
define('TEXT_PRODUCTS_QUANTITY', '产品数量:');
define('TEXT_PRODUCTS_MODEL', '产品型号:');
define('TEXT_PRODUCTS_IMAGE', '产品图片:');
define('TEXT_PRODUCTS_IMAGE_DIR', '上传目录:');
define('TEXT_PRODUCTS_URL', '产品网址URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(没有 http://)</small>');

define('TEXT_PRODUCTS_SAMPLE_PRICE_NET', '产品样品价格（净额）:');
define('TEXT_PRODUCTS_SAMPLE_PRICE_GROSS', '产品样品价格（总）:');

define('TEXT_PRODUCTS_PRICE_NET', '产品批发价格（净额）:');
define('TEXT_PRODUCTS_PRICE_GROSS', '产品批发价格（总额）:');
define('TEXT_PRODUCTS_WEIGHT', '产品重量:');

define('EMPTY_CATEGORY', '空类');

define('TEXT_HOW_TO_COPY', '拷贝方法:');
define('TEXT_COPY_AS_LINK', '链接产品');
define('TEXT_COPY_AS_DUPLICATE', '重复产品');

// Products and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','仅用于重复的产品 ...');
  define('TEXT_COPY_ATTRIBUTES','重复复制产品属性?');
  define('TEXT_COPY_ATTRIBUTES_YES','是');
  define('TEXT_COPY_ATTRIBUTES_NO','否');

// Products and Discount Copy Options
  define('TEXT_COPY_DISCOUNTS_ONLY','仅用于重复的折扣产品 ...');
  define('TEXT_COPY_DISCOUNTS','重复复制产品折扣?');
  define('TEXT_COPY_DISCOUNTS_YES','是');
  define('TEXT_COPY_DISCOUNTS_NO','否');

  define('TEXT_INFO_CURRENT_PRODUCT', '当前产品: ');
  define('TABLE_HEADING_MODEL', '型号');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','对于产品ID属性的变化# ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','删除  <strong>所有</strong> 产品的属性:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','属性复制到其他产品或整个类别从:<br />');

  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','属性复制到另一个 <strong>产品</strong> 从:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','属性复制到另一个 <strong>分类</strong> 从:<br />');

  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>现有的产品应如何处理属性应该是?</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE','<strong>删除</strong>第一，然后复制新属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 新设置/价格，然后添加新的');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽略</strong> 和仅仅添加新属性');

  define('SUCCESS_ATTRIBUTES_DELETED','属性已成功删除');
  define('SUCCESS_ATTRIBUTES_UPDATE','属性已成功更新');

  define('ICON_ATTRIBUTES','属性特征');

  define('TEXT_CATEGORIES_IMAGE_DIR','上传目录:');

  define('TEXT_PRODUCTS_QTY_BOX_STATUS_PREVIEW','警告：不显示数量方框，默认为数量1');
  define('TEXT_PRODUCTS_QTY_BOX_STATUS_EDIT','警告：不显示数量方框，默认为数量1');

  define('TEXT_PRODUCT_OPTIONS', '<strong>请选择:</strong>');
  define('TEXT_PRODUCTS_ATTRIBUTES_INFO','属性特征对于:');
  define('TEXT_PRODUCT_ATTRIBUTES_DOWNLOADS','下载: ');

  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','由属性定价产品:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','是');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','否');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_PREVIEW','*显示价格将包括最低组属性价格另加价格');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','*显示价格将包括最低组属性价格另加价格');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','产品数量最低:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','产品数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','产品数量最多:');

  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0 = 没限制, 1 = 没有数量盒');

  define('TEXT_PRODUCTS_MIXED','产品数量最少/单位组合:');

  define('PRODUCTS_PRICE_IS_FREE_TEXT', '产品是免费的');
  define('TEXT_PRODUCT_IS_FREE','产品是免费的:');
  define('TEXT_PRODUCTS_IS_FREE_PREVIEW','*产品标记为免费');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','*产品标记为免费');

  define('TEXT_PRODUCT_IS_CALL','产品价格面议:');
  define('TEXT_PRODUCTS_IS_CALL_PREVIEW','*产品标记为价格面议');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','*产品标记为价格面议');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>跳过新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>插入新属性从 </strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>从属性更新</strong>');

//wholesale
  define('TEXT_WHOLESALE_ONLY','只批发:');
  define('TEXT_PRICE_RETAIL_NET', '产品的零售价（净价）:');
  define('TEXT_PRICE_RETAIL_GROSS', '产品的零售价（总）:');
  
  
  
  
// meta tags
  define('TEXT_META_TAG_TITLE_INCLUDES','<strong>标记什么产品的Meta标签的标题应包括:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRODUCTS_NAME_STATUS','<strong>P产品名称:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_STATUS','<strong>标题:</strong>');
  define('TEXT_PRODUCTS_METATAGS_MODEL_STATUS','<strong>型号:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRICE_STATUS','<strong>价格:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_TAGLINE_STATUS','<strong>标题/标语:</strong>');
  define('TEXT_META_TAGS_TITLE','<strong>元标记名称:</strong>');
  define('TEXT_META_TAGS_KEYWORDS','<strong>元标记关键字:</strong>');
  define('TEXT_META_TAGS_DESCRIPTION','<strong>元标记描述:</strong>');
  define('TEXT_META_EXCLUDED', '<span class="alert">排除</span>');

?>