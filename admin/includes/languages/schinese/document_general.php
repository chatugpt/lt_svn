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
//  $Id: document_general.php 2830 2006-01-10 17:13:18Z birdbrain $
//

define('HEADING_TITLE', '分类/产品');
define('HEADING_TITLE_GOTO', '转到:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', '分类/产品');
define('TABLE_HEADING_CATEGORIES_SORT_ORDER', '排序');

define('TABLE_HEADING_PRICE','价格/特价/销售');
define('TABLE_HEADING_QUANTITY','数量');

define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', '状态');

define('TEXT_CATEGORIES', '分类:');
define('TEXT_SUBCATEGORIES', '小类:');
define('TEXT_PRODUCTS', '产品:');
define('TEXT_PRODUCTS_PRICE_INFO', '价格:');
define('TEXT_PRODUCTS_TAX_CLASS', '税种:');
define('TEXT_PRODUCTS_AVERAGE_RATING', '平均评分:');
define('TEXT_PRODUCTS_QUANTITY_INFO', '数量:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_DATE_AVAILABLE', '可用日期:');
define('TEXT_LAST_MODIFIED', '最后更新:');
define('TEXT_IMAGE_NONEXISTENT', '图片不存在');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', '请插入一个产品类别或者一个同级别的产品.');
define('TEXT_PRODUCT_MORE_INFORMATION', '欲了解更多消息，请点击该产品链接 <a href="http://%s" target="blank">网页</a>.');
define('TEXT_PRODUCT_DATE_ADDED', '该产品添加到我们的分类上 %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', '该产品马上会有货 %s.');

define('TEXT_EDIT_INTRO', '请做任意需要的修改');
define('TEXT_EDIT_CATEGORIES_ID', '分类 ID:');
define('TEXT_EDIT_CATEGORIES_NAME', '分类 Name:');
define('TEXT_EDIT_CATEGORIES_IMAGE', '分类 Image:');
define('TEXT_EDIT_SORT_ORDER', '排序:');

define('TEXT_INFO_COPY_TO_INTRO', '请选择一个你想要的分类覆盖该产品');
define('TEXT_INFO_CURRENT_CATEGORIES', '当前分类: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', '新分类');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', '编辑分类');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', '删除分类');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', '移动分类');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', '删除产品');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', '移动产品');
define('TEXT_INFO_HEADING_COPY_TO', '复制到');

define('TEXT_DELETE_CATEGORY_INTRO', '你确定要删除这个分类？');
define('TEXT_DELETE_PRODUCT_INTRO', '您确定要彻底删除此产品？<br /><br /><strong>警告:</strong> 相关产品<br />1 如果你要删除的主类别产品，确保主类别已被更改<br />2 在复选框中检查要删除的产品的类别');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNING:</b> 有 %s (子-)分类和该分类有关联!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>WARNING:</b> 有 %s 产品和该分类有关联!');

define('TEXT_MOVE_PRODUCTS_INTRO', '请选择你需要的分类 <b>%s</b> 更新');
define('TEXT_MOVE_CATEGORIES_INTRO', '请选择你需要的分类 <b>%s</b>更新');
define('TEXT_MOVE', 'Move <b>%s</b> to:');

define('TEXT_NEW_CATEGORY_INTRO', '请填写新分类下面的信息');
define('TEXT_CATEGORIES_NAME', '分类名称:');
define('TEXT_CATEGORIES_IMAGE', '分类图片:');
define('TEXT_SORT_ORDER', '排序:');

define('TEXT_DOCUMENT_STATUS', '文档状态:');
define('TEXT_PRODUCTS_VIRTUAL', '虚拟产品:');
define('TEXT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '免费送货:');
define('TEXT_PRODUCTS_QTY_BOX_STATUS', '产品数量框提示:');
define('TEXT_DOCUMENT_DATE_AVAILABLE', '可用日期:');
define('TEXT_DOCUMENT_AVAILABLE', '可用的');
define('TEXT_DOCUMENT_NOT_AVAILABLE', '不可用');
define('TEXT_PRODUCT_IS_VIRTUAL', '是的, 跳过送货地址');
define('TEXT_PRODUCT_NOT_VIRTUAL', '不, 需要送货地址');
define('TEXT_PRODUCT_IS_ALWAYS_FREE_SHIPPING', '是的, 免费送货');
define('TEXT_PRODUCT_NOT_ALWAYS_FREE_SHIPPING', '不, 常规货运');
define('TEXT_PRODUCT_SPECIAL_ALWAYS_FREE_SHIPPING', '特别, 产品/下载组合需要一个送货地址');
define('TEXT_PRODUCTS_SORT_ORDER', '排序:');

define('TEXT_PRODUCTS_QTY_BOX_STATUS_ON', '是的, 显示数量框');
define('TEXT_PRODUCTS_QTY_BOX_STATUS_OFF', '不, 不显示数量框');

define('TEXT_DOCUMENT_NAME', '文档名称:');
define('TEXT_DOCUMENT_DETAILS', '文档内容:');
define('TEXT_DOCUMENT_IMAGE', '文档图片:');
define('TEXT_DOCUMENT_IMAGE_DIR', '上传到目录:');
define('TEXT_DOCUMENT_URL', '文档 URL:');
define('TEXT_DOCUMENT_URL_WITHOUT_HTTP', '<small>(没有 http://)</small>');

define('EMPTY_CATEGORY', '空分类');

define('TEXT_HOW_TO_COPY', '复制方法:');
define('TEXT_COPY_AS_LINK', '产品链接');
define('TEXT_COPY_AS_DUPLICATE', '重复产品');

// Products and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','仅重复产品适用 ...');
  define('TEXT_COPY_ATTRIBUTES','重复复制产品属性?');
  define('TEXT_COPY_ATTRIBUTES_YES','是的');
  define('TEXT_COPY_ATTRIBUTES_NO','不');

  define('TEXT_INFO_CURRENT_PRODUCT', '当前产品: ');
  define('TABLE_HEADING_MODEL', '类型');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','属性发生变法的产品 ID# ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','删除 <strong>所有</strong> 产品属性:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','复制属性到其他产品或者整个产品类别:<br />');

  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','复制属性到另外个 <strong>产品</strong> :<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','复制属性到另外个 <strong>类别</strong> :<br />');

  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>现有产品属性如何管理？</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE','<strong>删除</strong> 首先, 复制新属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 设置新选项/价格，然后添加新的产品');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽视</strong> 只添加新的属性');

  define('SUCCESS_ATTRIBUTES_DELETED','属性删除成功');
  define('SUCCESS_ATTRIBUTES_UPDATE','属性更新成功');

  define('ICON_ATTRIBUTES','属性特征');

  define('TEXT_CATEGORIES_IMAGE_DIR','上传到目录:');

  define('TEXT_PRODUCTS_QTY_BOX_STATUS_PREVIEW','警告: 不显示数量方框，默认为数量1');
  define('TEXT_PRODUCTS_QTY_BOX_STATUS_EDIT','警告: 不显示数量方框，默认为数量1');

  define('TEXT_PRODUCT_OPTIONS', '<strong>请选择:</strong>');
  define('TEXT_PRODUCTS_ATTRIBUTES_INFO','产品特征:');
  define('TEXT_PRODUCT_ATTRIBUTES_DOWNLOADS','下载: ');

  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','由属性定价的产品:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','是的');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','不');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_PREVIEW','*显示价格由最低组属性价格和基本价格组成');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','*显示价格由最低组属性价格和基本价格组成');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','产品最低数量:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','产品数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','产品最大数量:');

  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0 = 无限制, 1 = 无数量框');

  define('TEXT_PRODUCTS_MIXED','产品最少数量/单位组合:');

  define('PRODUCTS_PRICE_IS_FREE_TEXT', '免费产品');
  define('TEXT_PRODUCT_IS_FREE','免费产品:');
  define('TEXT_PRODUCTS_IS_FREE_PREVIEW','*标注产品免费');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','*标注产品免费');

  define('TEXT_PRODUCT_IS_CALL','价格面议产品:');
  define('TEXT_PRODUCTS_IS_CALL_PREVIEW','*标注价格面议产品');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','*标注价格面议产品');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>跳过新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>插入新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>更新属性 </strong>');

// meta tags
  define('TEXT_META_TAG_TITLE_INCLUDES','<strong>标记文档的元标签所包含的内容:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRODUCTS_NAME_STATUS','<strong>文档名称:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_STATUS','<strong>标题:</strong>');
  define('TEXT_PRODUCTS_METATAGS_MODEL_STATUS','<strong>类型:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRICE_STATUS','<strong>价格:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_TAGLINE_STATUS','<strong>标题/标语:</strong>');
  define('TEXT_META_TAGS_TITLE','<strong>元标记名称:</strong>');
  define('TEXT_META_TAGS_KEYWORDS','<strong>元标记关键词:</strong>');
  define('TEXT_META_TAGS_DESCRIPTION','<strong>元标记描述:</strong>');
  define('TEXT_META_EXCLUDED', '<span class="alert">排除</span>');
?>