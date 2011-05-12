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
//  $Id: product_music.php 2830 2006-01-10 17:13:18Z birdbrain $
//

define('HEADING_TITLE', '分类  / 产品');
define('HEADING_TITLE_GOTO', '前往:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', '分类  / 产品');
define('TABLE_HEADING_CATEGORIES_SORT_ORDER', '排序');

define('TABLE_HEADING_PRICE','价格/特别/销售');
define('TABLE_HEADING_QUANTITY','数量');

define('TABLE_HEADING_ACTION', '执行');
define('TABLE_HEADING_STATUS', '状态');

define('TEXT_CATEGORIES', '分类:');
define('TEXT_SUBCATEGORIES', '子分类:');
define('TEXT_PRODUCTS', '产品:');
define('TEXT_PRODUCTS_RECORD_ARTIST', '录音艺术家:');
define('TEXT_PRODUCTS_RECORD_COMPANY', '录音公司:');
define('TEXT_PRODUCTS_MUSIC_GENRE', '音乐类型:');
define('TEXT_PRODUCTS_PRICE_INFO', '价格:');
define('TEXT_PRODUCTS_TAX_CLASS', '税类:');
define('TEXT_PRODUCTS_QUANTITY_INFO', '数量:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_DATE_AVAILABLE', '可用日期:');
define('TEXT_LAST_MODIFIED', '最后更新:');
define('TEXT_IMAGE_NONEXISTENT', '图片不存在');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', '请插入一个新的类别或本级产品.');
define('TEXT_PRODUCT_MORE_INFORMATION', '更多信息，请参观该商品 <a href="http://%s" target="blank">网页</a>.');
define('TEXT_PRODUCT_DATE_ADDED', '这产品加入我们的目录 on %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', '此产品将在库存里  %s.');

define('TEXT_EDIT_INTRO', '请进行任何必要的修改');
define('TEXT_EDIT_CATEGORIES_ID', '分类  ID:');
define('TEXT_EDIT_CATEGORIES_NAME', '分类名称:');
define('TEXT_EDIT_CATEGORIES_IMAGE', '分类图片:');
define('TEXT_EDIT_SORT_ORDER', '排序:');

define('TEXT_INFO_COPY_TO_INTRO', '请选择一个新的类别，你要复制本产品');
define('TEXT_INFO_CURRENT_CATEGORIES', '当前类别: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', '新分类');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', '编辑分类');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', '删除分类');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', '移动分类');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', '删除产品');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', '移动产品');
define('TEXT_INFO_HEADING_COPY_TO', '拷贝到');

define('TEXT_DELETE_CATEGORY_INTRO', '您确定要删除这个分类?');
define('TEXT_DELETE_PRODUCT_INTRO', '您确定要永久删除这个产品?<br /><br /><strong>警告 :</strong> 在相关联产品<br />1 确保主类别已被更改，如果你要删除的主类别<br /> 2检查产品的复选框删除的类别产品从');

define('TEXT_DELETE_WARNING_CHILDS', '<b>警告:</b> 有 %s 子分类仍然关联这个分类!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>警告:</b> 有 %s 产品仍然关联这个分类!');

define('TEXT_MOVE_PRODUCTS_INTRO', '请选择您想要哪一类 <b>%s</b> 在');
define('TEXT_MOVE_CATEGORIES_INTRO', '请选择您想要哪一类 <b>%s</b> 在');
define('TEXT_MOVE', '移动 <b>%s</b> 到:');

define('TEXT_NEW_CATEGORY_INTRO', '请填写新类别下面的信息');
define('TEXT_CATEGORIES_NAME', '分类名称:');
define('TEXT_CATEGORIES_IMAGE', '分类图片:');
define('TEXT_SORT_ORDER', '排序:');

define('TEXT_PRODUCTS_STATUS', '产品状态:');
define('TEXT_PRODUCTS_VIRTUAL', '产品是虚拟的:');
define('TEXT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '永久免费:');
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
define('TEXT_PRODUCTS_NAME', '产品名称:');
define('TEXT_PRODUCTS_DESCRIPTION', '产品描述:');
define('TEXT_PRODUCTS_QUANTITY', '产品数量:');
define('TEXT_PRODUCTS_MODEL', '产品型号:');
define('TEXT_PRODUCTS_IMAGE', '产品图片:');
define('TEXT_PRODUCTS_IMAGE_DIR', '上传目录 :');
define('TEXT_PRODUCTS_URL', '产品 URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(没有 http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', '产品价格（净额）:');
define('TEXT_PRODUCTS_PRICE_GROSS', '产品价格（总额）:');
define('TEXT_PRODUCTS_WEIGHT', '产品重量:');

define('EMPTY_CATEGORY', '空的分类');

define('TEXT_HOW_TO_COPY', '拷贝方法:');
define('TEXT_COPY_AS_LINK', '链接产品');
define('TEXT_COPY_AS_DUPLICATE', '重复产品');

// Products and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','仅用于重复的产品 ...');
  define('TEXT_COPY_ATTRIBUTES','重复复制产品属性?');
  define('TEXT_COPY_ATTRIBUTES_YES','是');
  define('TEXT_COPY_ATTRIBUTES_NO','否');
  define('TEXT_COPY_MEDIA_MANAGER','复制任何媒体管理器的集合与此相关的产品.');

  define('TEXT_INFO_CURRENT_PRODUCT', '当前产品: ');
  define('TABLE_HEADING_MODEL', '型号');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','对于产品属性ID的变化# ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','删除 <strong>所有</strong> 产品的属性：<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','属性复制到其他产品或整个类别从:<br />');

  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','属性复制到另一个 <strong>产品</strong> 从:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','属性复制到另一个<strong>类别</strong>从:<br />');

  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>现有的产品应如何处理属性应该是?</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE','<strong>删除</strong> 第一，然后复制新属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 新设置/价格，然后添加新的');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽略</strong> 和只添加新的属性');

  define('SUCCESS_ATTRIBUTES_DELETED','属性成功删除');
  define('SUCCESS_ATTRIBUTES_UPDATE','属性成功更新');

  define('ICON_ATTRIBUTES','属性特征');

  define('TEXT_CATEGORIES_IMAGE_DIR','上传目录:');

  define('TEXT_PRODUCTS_QTY_BOX_STATUS_PREVIEW','警告：不显示数量方框，默认为数量1');
  define('TEXT_PRODUCTS_QTY_BOX_STATUS_EDIT','警告：不显示数量方框，默认为数量1');

  define('TEXT_PRODUCT_OPTIONS', '<strong>请选择:</strong>');
  define('TEXT_PRODUCTS_ATTRIBUTES_INFO','属性特征为:');
  define('TEXT_PRODUCT_ATTRIBUTES_DOWNLOADS','下载: ');

  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','由属性定价产品:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','是');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','否');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_PREVIEW','*显示价格将包括最低组属性价格另加价格');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','*显示价格将包括最低组属性价格另加价格');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','产品数量最低:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','产品数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','产品数量最多:');

  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0 = 无限制, 1 = 没有数量盒');

  define('TEXT_PRODUCTS_MIXED','产品数量最少/单位组合:');

  define('PRODUCTS_PRICE_IS_FREE_TEXT', '产品是免费的');
  define('TEXT_PRODUCT_IS_FREE','产品是免费的:');
  define('TEXT_PRODUCTS_IS_FREE_PREVIEW','*产品标记为免费的');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','*产品标记为免费的');

  define('TEXT_PRODUCT_IS_CALL','产品的价格面议:');
  define('TEXT_PRODUCTS_IS_CALL_PREVIEW','*产品标示为价格面议');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','*产品标示为价格面议');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>跳过新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>插入新属性从 </strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>从属性更新 </strong>');

// meta tags
  define('TEXT_META_TAG_TITLE_INCLUDES','<strong>标记什么产品的Meta标签的标题应包括:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRODUCTS_NAME_STATUS','<strong>产品名称:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_STATUS','<strong>标题:</strong>');
  define('TEXT_PRODUCTS_METATAGS_MODEL_STATUS','<strong>型号:</strong>');
  define('TEXT_PRODUCTS_METATAGS_PRICE_STATUS','<strong>价格:</strong>');
  define('TEXT_PRODUCTS_METATAGS_TITLE_TAGLINE_STATUS','<strong>标题/标语:</strong>');
  define('TEXT_META_TAGS_TITLE','<strong>元标记名称:</strong>');
  define('TEXT_META_TAGS_KEYWORDS','<strong>元标记关键字:</strong>');
  define('TEXT_META_TAGS_DESCRIPTION','<strong>元标记描述:</strong>');
  define('TEXT_META_EXCLUDED', '<span class="alert">排除</span>');
?>