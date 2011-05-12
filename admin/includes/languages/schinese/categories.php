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
//  $Id: categories.php 4808 2006-10-22 18:48:53Z ajeh $
//

define('HEADING_TITLE', '类别 / 产品');
define('HEADING_TITLE_GOTO', '至:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', '类别 / 产品');
define('TABLE_HEADING_CATEGORIES_SORT_ORDER', '排序');

define('TABLE_HEADING_PRICE','价格/特价/出售');
define('TABLE_HEADING_QUANTITY','数量');

define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_STATUS', '状态');

define('TEXT_CATEGORIES', '类别:');
define('TEXT_SUBCATEGORIES', '子类别:');
define('TEXT_PRODUCTS', '产品:');
define('TEXT_PRODUCTS_PRICE_INFO', '价格:');
define('TEXT_PRODUCTS_TAX_CLASS', '税级:');
define('TEXT_PRODUCTS_AVERAGE_RATING', '平均率:');
define('TEXT_PRODUCTS_QUANTITY_INFO', '数量:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_DATE_AVAILABLE', '有效期:');
define('TEXT_LAST_MODIFIED', '最后修改:');
define('TEXT_IMAGE_NONEXISTENT', '图像不存在');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', '请在此级别添加一个新的类别或者产品.');
define('TEXT_PRODUCT_MORE_INFORMATION', '请访问<a href="http://%s" target="blank">该产品的网页 </a>以查看更多产品信息.');
define('TEXT_PRODUCT_DATE_ADDED', '该产品在 %s添加我们的类别下.');
define('TEXT_PRODUCT_DATE_AVAILABLE', '该产品的上架期为%s.');

define('TEXT_EDIT_INTRO', '请做必要的修改');
define('TEXT_EDIT_CATEGORIES_ID', '类别 ID:');
define('TEXT_EDIT_CATEGORIES_NAME', '类别名称:');
define('TEXT_EDIT_CATEGORIES_IMAGE', '类别图像:');
define('TEXT_EDIT_CATEGORIES_BANNER_IMAGE', '类别广告图e:');
define('TEXT_EDIT_SORT_ORDER', '排列顺序:');

define('TEXT_INFO_COPY_TO_INTRO', '请选择一个你想要把该产品复制到的类别');
define('TEXT_INFO_CURRENT_CATEGORIES', '当前类别: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', '新类别');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', '编辑类别');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', '删除类别');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', '移动类别');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', '删除产品');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', '移动产品');
define('TEXT_INFO_HEADING_COPY_TO', '复制到');

define('TEXT_DELETE_CATEGORY_INTRO', '你确定要删除这个类别吗?');
define('TEXT_DELETE_CATEGORY_INTRO_LINKED_PRODUCTS', '<strong>警告:</strong> 主类别ID被删除的链接产品将不能合理的定价. 首先你必须确保当删除一个已链接产品,该产品包含了在移除一个类别钱已被你重新设置了到其他类别的主类别ID');
define('TEXT_DELETE_PRODUCT_INTRO', '你确定永久删除该产品吗?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>警告:</b> 还有 %s 个子类别链接在该类别下!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>警告:</b> 还有 %s 个产品链接在该类别下!');

define('TEXT_MOVE_PRODUCTS_INTRO', '请选择你要把<b>%s</b>移入的类别');
define('TEXT_MOVE_CATEGORIES_INTRO', '请选择你要把<b>%s</b>移入的类别');
define('TEXT_MOVE', '把<b>%s</b> 移至:');

define('TEXT_NEW_CATEGORY_INTRO', '请为新类别填写新的描述');
define('TEXT_CATEGORIES_NAME', '类别名称:');
define('TEXT_CATEGORIES_IMAGE', '类别图像:');
define('TEXT_SORT_ORDER', '排列顺序:');

define('TEXT_PRODUCTS_STATUS', '产品状态:');
define('TEXT_PRODUCTS_VIRTUAL', '虚拟产品:');
define('TEXT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '总是免运费:');
define('TEXT_PRODUCTS_QTY_BOX_STATUS', '产品数量框显示:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', '有效期:');
define('TEXT_PRODUCT_AVAILABLE', '上架');
define('TEXT_PRODUCT_NOT_AVAILABLE', '下架');
define('TEXT_PRODUCT_IS_VIRTUAL', '是的，忽略送货地址');
define('TEXT_PRODUCT_NOT_VIRTUAL', '否,需要送货地址');
define('TEXT_PRODUCT_IS_ALWAYS_FREE_SHIPPING', '是的, 总是免运费');
define('TEXT_PRODUCT_NOT_ALWAYS_FREE_SHIPPING', '否,正常的运送规则');

define('TEXT_PRODUCTS_QTY_BOX_STATUS_ON', '是的, 显示产品数量框');
define('TEXT_PRODUCTS_QTY_BOX_STATUS_OFF', '否, 不显示产品数量框');

define('TEXT_PRODUCTS_MANUFACTURER', '制造商:');
define('TEXT_PRODUCTS_NAME', '产品名称:');
define('TEXT_PRODUCTS_DESCRIPTION', '产品描述:');
define('TEXT_PRODUCTS_QUANTITY', '产品数量:');
define('TEXT_PRODUCTS_MODEL', '产品型号:');
define('TEXT_PRODUCTS_IMAGE', '产品图像:');
define('TEXT_PRODUCTS_IMAGE_DIR', '上传路径:');
define('TEXT_PRODUCTS_URL', '产品URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(without http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', '产品价格 (净重):');
define('TEXT_PRODUCTS_PRICE_GROSS', '产品价格 (毛重):');
define('TEXT_PRODUCTS_WEIGHT', '产品运送重量:');

define('EMPTY_CATEGORY', '空类别');

define('TEXT_HOW_TO_COPY', '拷贝方法:');
define('TEXT_COPY_AS_LINK', '链接产品');
define('TEXT_COPY_AS_DUPLICATE', '复制品');

define('TEXT_RESTRICT_PRODUCT_TYPE', '限定产品类型');
define('TEXT_CATEGORY_HAS_RESTRICTIONS', '该类别已被限定为这些类型');
define('ERROR_CANNOT_ADD_PRODUCT_TYPE','已限定产品类型不能被添加到该类别。请检查你的类别限制.');

// Products and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','仅用于复制品 ...');
  define('TEXT_COPY_ATTRIBUTES','拷贝产品属性至复制品?');
  define('TEXT_COPY_ATTRIBUTES_YES','是');
  define('TEXT_COPY_ATTRIBUTES_NO','否');

  define('TEXT_INFO_CURRENT_PRODUCT', '当前产品: ');
  define('TABLE_HEADING_MODEL', '型号');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','产品ID#属性更新 ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','删除 <strong>所有的</strong> 产品属性:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','从。。。拷贝属性至另一个产品或者一整个类别:<br />');

  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','从。。。拷贝属性到<strong>产品</strong> :<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','从。。。拷贝属性到另一个<strong>类别</strong> :<br />');

  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>要如何处理已存在的产品属性?</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE','首先<strong>删除</strong> , 然后拷贝新的属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 新的设置/价格, 然后添加');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽略</strong>并且仅添加新属性');

  define('SUCCESS_ATTRIBUTES_DELETED','成功删除属性');
  define('SUCCESS_ATTRIBUTES_UPDATE','成功更新属性');

  define('ICON_ATTRIBUTES','属性特征');

  define('TEXT_CATEGORIES_IMAGE_DIR','上传路径:');
  define('TEXT_CATEGORIES_IMAGE_MANUAL', '<strong>或者, 选择一个服务器上纯在的文件，文件名:</strong>');

  define('TEXT_CATEGORIES_TYPES', '<strong>选择类别类型:</strong>');
  define('TEXT_CATEGORIES_TYPES_1', '正常的');
  define('TEXT_CATEGORIES_TYPES_2', '推荐类别');
  define('TEXT_CATEGORIES_TYPES_3', '按类别购买');
	
  define('TEXT_CATEGORIES_DISPLAY_TYPES', '<strong>选择类别显示形式:</strong>');
  define('TEXT_CATEGORIES_DISPLAY_TYPES_1', '类别列表');
  define('TEXT_CATEGORIES_DISPLAY_TYPES_2', '产品列表');
  define('TEXT_CATEGORIES_DISPLAY_TYPES_3', '清除产品列表');

  define('TEXT_PRODUCT_LIST_TYPES', '<strong>选择产品列表显示形式:</strong>');
  define('TEXT_PRODUCT_LIST_TYPES_1', '列表');
  define('TEXT_PRODUCT_LIST_TYPES_2', '缩略图');
  define('TEXT_PRODUCT_LIST_TYPES_3', '画廊');
  
  define('TEXT_VIRTUAL_PREVIEW','警告: 该产品被标识为免运费并且忽略送货地址');
  define('TEXT_VIRTUAL_EDIT','警告: 该产品被标识为免运费并且忽略送货地址');
  define('TEXT_FREE_SHIPPING_PREVIEW','警告: 该产品被标识为免运费，但是需要送货地址');
  define('TEXT_FREE_SHIPPING_EDIT','警告:是的，该产品免运费，但需要送货地址');

  define('TEXT_PRODUCTS_QTY_BOX_STATUS_PREVIEW','警告: 不显示数量框，默认数量为1');
  define('TEXT_PRODUCTS_QTY_BOX_STATUS_EDIT','警告: 不显示数量框，默认数量为1');

  define('TEXT_PRODUCT_OPTIONS', '<strong>请选择:</strong>');
  define('TEXT_PRODUCTS_ATTRIBUTES_INFO','属性特征:');
  define('TEXT_PRODUCT_ATTRIBUTES_DOWNLOADS','下载: ');

  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES','产品按属性定价:');
  define('TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE','是');
  define('TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE','否');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_PREVIEW','*显示价格包括最低组属性价格加上价格');
  define('TEXT_PRODUCTS_PRICED_BY_ATTRIBUTES_EDIT','*显示价格包括最低组属性价格加上价格');

  define('TEXT_PRODUCTS_QUANTITY_MIN_RETAIL','产品最少数量:');
  define('TEXT_PRODUCTS_QUANTITY_UNITS_RETAIL','产品数量单位:');
  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL','产品最大数量:');

  define('TEXT_PRODUCTS_QUANTITY_MAX_RETAIL_EDIT','0 = 无限定, 1 =没有数量框或最大限制数 ##');

  define('TEXT_PRODUCTS_MIXED','产品数量 最小/单位 混合:');

  define('PRODUCTS_PRICE_IS_FREE_TEXT', '免费品');
  define('TEXT_PRODUCT_IS_FREE','免费品:');
  define('TEXT_PRODUCTS_IS_FREE_PREVIEW','*产品标识为免费');
  define('TEXT_PRODUCTS_IS_FREE_EDIT','*产品标识为免费');

  define('TEXT_PRODUCT_IS_CALL','产品价格面议:');
  define('TEXT_PRODUCTS_IS_CALL_PREVIEW','*产品标识为价格面议');
  define('TEXT_PRODUCTS_IS_CALL_EDIT','*产品标识为价格面议');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>忽略新属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>从。。。插入新属性</strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>从属性更新 </strong>');

  define('TEXT_SHIPPING_INFO',
  '<strong>虚拟产品</strong>为您提供免运费和免送货地址的服务, ' . TEXT_GV_NAMES . ', 等等.<br />' .
  '<strong>总是免运费</strong> 免运送费用，但是需要一个送货地址<br />' .
  '<strong>下载</strong>虚拟产品 - 无需标识任何选项<br />'
  );

  define('TEXT_ANY_TYPE', '任何类型');
  define('TABLE_HEADING_PRODUCT_TYPES', '产品类型');

// categories status
define('TEXT_INFO_HEADING_STATUS_CATEGORY', '更新类别状态：');
define('TEXT_CATEGORIES_STATUS_INTRO', '更新类别状态为: ');
define('TEXT_CATEGORIES_STATUS_OFF', '关');
define('TEXT_CATEGORIES_STATUS_ON', '开');
define('TEXT_PRODUCTS_STATUS_INFO', '更新所有产品状态为: ');
define('TEXT_PRODUCTS_STATUS_OFF', '关');
define('TEXT_PRODUCTS_STATUS_ON', '凯');
define('TEXT_PRODUCTS_STATUS_NOCHANGE', '没有改变');
define('TEXT_CATEGORIES_STATUS_WARNING', '<strong>警告 ...</strong><br />主意: 使一个类别失效同时也使该类别下的所有产品都失效.其他类别下与该类别下相连接的产品也将失效.');

define('TEXT_PRODUCTS_STATUS_ON_OF',' of ');
define('TEXT_PRODUCTS_STATUS_ACTIVE',' 激活的 ');

define('TEXT_CATEGORIES_DESCRIPTION', '类别描述:');
define('TEXT_CATEGORIES_BOTTOM_DESCRIPTION', '类别底部描述:');
define('PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT', '产品价格面议');

// Metatags
  define('TEXT_INFO_HEADING_EDIT_CATEGORY_META_TAGS', '分类标记定义');
  define('TEXT_EDIT_CATEGORIES_META_TAGS_INTRO', '定义客户标记');
  define('TEXT_EDIT_CATEGORIES_META_TAGS_TITLE', '标题:');
  define('TEXT_EDIT_CATEGORIES_META_TAGS_KEYWORDS', '关键字:');
  define('TEXT_EDIT_CATEGORIES_META_TAGS_DESCRIPTION', '描述:');

define('WARNING_PRODUCTS_IN_TOP_INFO', '警告: 您在最顶级类别下存在产品，这将导致在该类别下的价格失效。找到产品: ');


/*
 * for categories banner images languages
 * addBy showq@qq.com
 */
	define('TEXT_CATEGORIES_BANNER_FIRST','广告 1');
	define('TEXT_CATEGORIES_BANNER_SECOND','广告 2');
	define('TEXT_CATEGORIES_BANNER_LINK_FIRST','广告 1 链接 (包括 "http://")');
	define('TEXT_CATEGORIES_BANNER_LINK_SECOND','广告 2 链接 (包括 "http://")');
	define('TEXT_BANNER1_IMAGES_DELETE', '<strong>删除广告 1 图像?</strong> 注意: 从广告组1移除产品图片，但不移除服务器上的:');
	define('TEXT_BANNER2_IMAGES_DELETE', '<strong>删除广告 2 图像?</strong> 注意: 从广告组2移除产品图片，但不移除服务器上的:');


?>