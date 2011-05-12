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
//  $Id: document_product.php 2830 2006-01-10 17:13:18Z birdbrain $
//

define('HEADING_TITLE', '分类/产品');
define('HEADING_TITLE_GOTO', '转到:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', '分类 / 产品');
define('TABLE_HEADING_CATEGORIES_SORT_ORDER', '排序');

define('TABLE_HEADING_PRICE','价格/特别/出售');
define('TABLE_HEADING_QUANTITY','数量');

define('TABLE_HEADING_ACTION', '选项');
define('TABLE_HEADING_STATUS', '状态');

define('TEXT_CATEGORIES', '分类:');
define('TEXT_SUBCATEGORIES', '子分类:');
define('TEXT_PRODUCTS', '产品:');
define('TEXT_PRODUCTS_PRICE_INFO', '价格:');
define('TEXT_PRODUCTS_TAX_CLASS', '税种:');
define('TEXT_PRODUCTS_AVERAGE_RATING', '平均得分:');
define('TEXT_PRODUCTS_QUANTITY_INFO', '数量:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_DATE_AVAILABLE', '可用日期:');
define('TEXT_LAST_MODIFIED', '最后更新:');
define('TEXT_IMAGE_NONEXISTENT', '图片不存在');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', '请出入一个新类别或者一个同级别的产品.');
define('TEXT_PRODUCT_MORE_INFORMATION', '欲了解更多的消息, 请点击该产品的 <a href="http://%s" target="blank">网页</a>.');
define('TEXT_PRODUCT_DATE_ADDED', '此产品添加到我们的分类目录上 %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', '此产品会马上有货 %s.');

define('TEXT_EDIT_INTRO', '请做必要的修改');
define('TEXT_EDIT_CATEGORIES_ID', '分类 ID:');
define('TEXT_EDIT_CATEGORIES_NAME', '分类名称:');
define('TEXT_EDIT_CATEGORIES_IMAGE', '分类图片:');
define('TEXT_EDIT_SORT_ORDER', '排序:');

define('TEXT_INFO_COPY_TO_INTRO', '请选择一个新的产品分类覆盖该产品');
define('TEXT_INFO_CURRENT_CATEGORIES', '当前分类: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', '新分类');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', '编辑分类');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', '删除分类');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', '移动分类');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', '删除产品');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', '移动产品');
define('TEXT_INFO_HEADING_COPY_TO', '复制到');

define('TEXT_DELETE_CATEGORY_INTRO', '你确定要删除此分类么?');
define('TEXT_DELETE_PRODUCT_INTRO', '你确定要彻底删除此产品么?<br /><br /><strong>警告:</strong> 相关产品<br />1 如果你要删除主类别产品，确保主类别已被更改<br />2请查看复选框中要删除的产品的类别');

define('TEXT_DELETE_WARNING_CHILDS', '<b>警告:</b>有 %s (子-)分类和该分类关联!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>警告:</b> 有 %s产品和该分类有关联!');

define('TEXT_MOVE_PRODUCTS_INTRO', '请选择你需要的产品 <b>%s</b> 更新');
define('TEXT_MOVE_CATEGORIES_INTRO', '请选择你需要的类别 <b>%s</b> 更新');
define('TEXT_MOVE', '移动 <b>%s</b> 到:');

define('TEXT_NEW_CATEGORY_INTRO', '请填写新类别下面的信息');
define('TEXT_CATEGORIES_NAME', '分类名称:');
define('TEXT_CATEGORIES_IMAGE', '分类图片:');
define('TEXT_SORT_ORDER', '排序:');

define('TEXT_PRODUCTS_STATUS', '产品状态:');
define('TEXT_PRODUCTS_VIRTUAL', '虚拟产品:');
define('TEXT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '免费送货:');
define('TEXT_PRODUCTS_QTY_BOX_STATUS', '数量显示框:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', '可用日期:');
define('TEXT_PRODUCT_AVAILABLE', '有货');
define('TEXT_PRODUCT_NOT_AVAILABLE', '缺货');
define('TEXT_PRODUCT_IS_VIRTUAL', '是的, 跳过送货地址');
define('TEXT_PRODUCT_NOT_VIRTUAL', '不, 需要提供送货地址');
define('TEXT_PRODUCT_IS_ALWAYS_FREE_SHIPPING', '是的, 免费送货');
define('TEXT_PRODUCT_NOT_ALWAYS_FREE_SHIPPING', '不, 常规货运');
define('TEXT_PRODUCT_SPECIAL_ALWAYS_FREE_SHIPPING', '特别, 产品/下载组合需要一个送货地址');
define('TEXT_PRODUCTS_SORT_ORDER', '排序:');

define('TEXT_PRODUCTS_QTY_BOX_STATUS_ON', '是的,显示数量框');
define('TEXT_PRODUCTS_QTY_BOX_STATUS_OFF', '不, 不显示数量框');

define('TEXT_PRODUCTS_MANUFACTURER', '产品制造商:');
define('TEXT_PRODUCTS_NAME', '产品名称:');
define('TEXT_PRODUCTS_DESCRIPTION', '产品描述:');
define('TEXT_PRODUCTS_QUANTITY', '产品数量:');
define('TEXT_PRODUCTS_MODEL', '产品类型:');
define('TEXT_PRODUCTS_IMAGE', '产品图片:');
define('TEXT_PRODUCTS_IMAGE_DIR', '上传到目录:');
define('TEXT_PRODUCTS_URL', '产品 URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(没有 http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', '产品价格 (网):');
define('TEXT_PRODUCTS_PRICE_GROSS', '产品价格 (毛):');
define('TEXT_PRODUCTS_WEIGHT', '产品运输 重量:');

define('EMPTY_CATEGORY', '空类别');

define('TEXT_HOW_TO_COPY', '复制方法:');
define('TEXT_COPY_AS_LINK', '链接产品');
define('TEXT_COPY_AS_DUPLICATE', '重复产品');

// Products and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','仅适用于重复产品 ...');
  define('TEXT_COPY_ATTRIBUTES','重复复制产品属性？');
  define('TEXT_COPY_ATTRIBUTES_YES','是的');
  define('TEXT_COPY_ATTRIBUTES_NO','不');

  define('TEXT_INFO_CURRENT_PRODUCT', '当前产品: ');
  define('TABLE_HEADING_MODEL', '类型');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','属性发生变化的产品ID# ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','删除 <strong>所有</strong> 产品属性:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','复制产品属性到另外个产品或者整个分类:<br />');

  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','复制属性到另外个 <strong>产品</strong> <br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','复制属性到另外个 <strong>分类</strong> <br />');

  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>现有产品属性应该如何处理</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE','<strong>删除</strong> 首先, 复制新属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 设置新设置/价格，然后添加一个新的');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽视</strong> 只添加新属性');

  define('SUCCESS_ATTRIBUTES_DELETED','属性删除成功');
  define('SUCCESS_ATTRIBUTES_UPDATE','属性更新成功');

  define('ICON_ATTRIBUTES','属性特征');

  define('TEXT_CATEGORIES_IMAGE_DIR','上传到目录:');

  define('TEXT_PRODUCTS_QTY_BOX_STATUS_PREVIEW','警告:不显示数量框, 默认数量为 1');
  define('TEXT_PRODUCTS_QTY_BOX_STATUS_EDIT','警告: 不显示数量框, 默认数量为 1');

  define('TEXT_PRODUCT_OPTIONS', '<strong>请选择:</strong>');
  define('TEXT_PRODUCTS_ATTRIBUTES_INFO','属性特征:');
  define('TEXT_PRODUCT_ATTRIBUTES_DOWNLOADS','下载: ');

  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','由属性定价产品:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','是的');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','不');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_PREVIEW','*显示价格包含最低组合价格和基本价格');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','*显示价格包含最低组合价格和基本价格');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','最低产品数量:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','产品数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','最大产品数量:');

  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0 = 无限制, 1 = 无数量框');

  define('TEXT_PRODUCTS_MIXED','最低商品数量/单位组合:');

  define('PRODUCTS_PRICE_IS_FREE_TEXT', '免费产品');
  define('TEXT_PRODUCT_IS_FREE','免费产品:');
  define('TEXT_PRODUCTS_IS_FREE_PREVIEW','*标注产品免费');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','*标注产品免费');

  define('TEXT_PRODUCT_IS_CALL','价格面议产品:');
  define('TEXT_PRODUCTS_IS_CALL_PREVIEW','*标注产品价格面议');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','*标注产品价格面议');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>跳过新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>插入新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>更新新属性 </strong>');

// meta tags
  define('TEXT_META_TAG_TITLE_INCLUDES','<strong>标注文档标签所包含的内容:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRODUCTS_NAME_STATUS','<strong>产品名称:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_STATUS','<strong>标题:</strong>');
  define('TEXT_PRODUCTS_METATAGS_MODEL_STATUS','<strong>型号:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRICE_STATUS','<strong>价格:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_TAGLINE_STATUS','<strong>标题/标语:</strong>');
  define('TEXT_META_TAGS_TITLE','<strong>元标签:</strong>');
  define('TEXT_META_TAGS_KEYWORDS','<strong>元标签关键词:</strong>');
  define('TEXT_META_TAGS_DESCRIPTION','<strong>元标签描述:</strong>');
  define('TEXT_META_EXCLUDED', '<span class="alert">排除</span>');
?>