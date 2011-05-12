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
//  $Id: attributes_controller.php 2830 2006-01-10 17:13:18Z birdbrain $
//

define('HEADING_TITLE', '类别: ');

define('HEADING_TITLE_OPT', '产品选项');
define('HEADING_TITLE_VAL', '选项值');
define('HEADING_TITLE_ATRIB', '属性控制');
define('HEADING_TITLE_ATRIB_SELECT','请选择类别以显示产品属性 ...');

define('TEXT_PRICES_AND_WEIGHTS', '价格和重量');
define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR', '价格要素: ');
define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR_OFFSET', '取消: ');
define('TABLE_HEADING_ATTRIBUTES_PRICE_ONETIME', '每次:');

define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR_ONETIME', '每次因素: ');
define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR_OFFSET_ONETIME', '取消: ');

define('TABLE_HEADING_ATTRIBUTES_QTY_PRICES', '属性数量的价格折扣:');
define('TABLE_HEADING_ATTRIBUTES_QTY_PRICES_ONETIME', '每次属性数量的价格折扣:');

define('TABLE_HEADING_ATTRIBUTES_PRICE_WORDS', '价格每字:');
define('TABLE_HEADING_ATTRIBUTES_PRICE_WORDS_FREE', '- 免费字数:');
define('TABLE_HEADING_ATTRIBUTES_PRICE_LETTERS', '价格每字母:');
define('TABLE_HEADING_ATTRIBUTES_PRICE_LETTERS_FREE', '- 免费字母数:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_PRODUCT', '商品名称');
define('TABLE_HEADING_OPT_NAME', '选项名');
define('TABLE_HEADING_OPT_VALUE', '选项值');
define('TABLE_HEADING_OPT_PRICE', '价格');
define('TABLE_HEADING_OPT_PRICE_PREFIX', '词头');
define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_DOWNLOAD', '可下载商品:');
define('TABLE_TEXT_FILENAME', '文件名:');
define('TABLE_TEXT_MAX_DAYS', '到期日: (0 = 不限)');
define('TABLE_TEXT_MAX_COUNT', '最大下载数量:');
define('TABLE_HEADING_OPT_DISCOUNTED','折扣');
define('TABLE_HEADING_PRICE_BASE_INCLUDED','基本');
define('TABLE_HEADING_PRICE_TOTAL','总数|片: 每次:');
define('TEXT_WARNING_OF_DELETE', '该选项与产品和属性值相链接- 删除它是不安全的.');
define('TEXT_OK_TO_DELETE', '该选项与产品和属性值没有链接- 删除它是安全的.');
define('TEXT_OPTION_ID', '选项ID');
define('TEXT_OPTION_NAME', '选项名称');

define('ATTRIBUTE_WARNING_DUPLICATE','重复的属性 - 属性不被添加'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_DUPLICATE_UPDATE','属性已存在 - 属性没有改变'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_INVALID_MATCH','属性选项和选项值不匹配 - 属性不被添加'); // miss matched option and options value
define('ATTRIBUTE_WARNING_INVALID_MATCH_UPDATE',' 属性选项和选项值不匹配 - 属性没有改变'); // miss matched option and options value
define('ATTRIBUTE_POSSIBLE_OPTIONS_NAME_WARNING_DUPLICATE','选项名称可能重复添加'); // Options Name Duplicate warning
define('ATTRIBUTE_POSSIBLE_OPTIONS_VALUE_WARNING_DUPLICATE','选项值可能重复添加'); // Options Value Duplicate warning

define('PRODUCTS_ATTRIBUTES_EDITING','编辑'); // title
define('PRODUCTS_ATTRIBUTES_DELETE','删除'); // title
define('PRODUCTS_ATTRIBUTES_ADDING','添加新属性'); // title
define('TEXT_DOWNLOADS_DISABLED','注意: 不能下载');

define('TABLE_TEXT_MAX_DAYS_SHORT', '天数:');
define('TABLE_TEXT_MAX_COUNT_SHORT', '最大值:');

  define('TABLE_HEADING_OPTION_SORT_ORDER','排列顺序');
  define('TABLE_HEADING_OPTION_VALUE_SORT_ORDER','默认排序');
  define('TEXT_SORT',' Order: ');

  define('TABLE_HEADING_OPT_WEIGHT_PREFIX','字首');
  define('TABLE_HEADING_OPT_WEIGHT','重量');
  define('TABLE_HEADING_OPT_SORT_ORDER','顺序');
  define('TABLE_HEADING_OPT_DEFAULT','默认');

  define('TABLE_HEADING_OPT_TYPE', '选项类型'); //CLR 031203 add option type column
  define('TABLE_HEADING_OPTION_VALUE_SIZE','尺寸');
  define('TABLE_HEADING_OPTION_VALUE_MAX','最大值');
  define('TABLE_HEADING_OPTION_VALUE_ROWS','行数');
  define('TABLE_HEADING_OPTION_VALUE_COMMENTS','评论');

  define('TEXT_OPTION_VALUE_COMMENTS','评论: ');
  define('TEXT_OPTION_VALUE_SIZE','显示尺寸: ');
  define('TEXT_OPTION_VALUE_MAX','最大长度: ');

  define('TEXT_ATTRIBUTES_IMAGE','属性图像样本:');
  define('TEXT_ATTRIBUTES_IMAGE_DIR','属性图像位置:');

  define('TEXT_ATTRIBUTES_FLAGS','属性<br />标识:');
  define('TEXT_ATTRIBUTES_DISPLAY_ONLY', '用途<br />只显示用途:');
  define('TEXT_ATTRIBUTES_IS_FREE', '该属性是免费的<br />当产品是免费的:');
  define('TEXT_ATTRIBUTES_DEFAULT', '默认属性<br />被标识为可选择的:');
  define('TEXT_ATTRIBUTE_IS_DISCOUNTED', '申请使用折扣<br />按产品特价/出售:');
  define('TEXT_ATTRIBUTE_PRICE_BASE_INCLUDED','包含在基价<br />当按属性定价：');
  define('TEXT_ATTRIBUTES_REQUIRED','属性要求<br />文本形式:');

  define('LEGEND_BOX','说明/图例:');
  define('LEGEND_KEYS','关/开');
  define('LEGEND_ATTRIBUTES_DISPLAY_ONLY', '只显示');
  define('LEGEND_ATTRIBUTES_IS_FREE', '免费');
  define('LEGEND_ATTRIBUTES_DEFAULT', '默认');
  define('LEGEND_ATTRIBUTE_IS_DISCOUNTED', '有折扣的');
  define('LEGEND_ATTRIBUTE_PRICE_BASE_INCLUDED','基价');
  define('LEGEND_ATTRIBUTES_REQUIRED','要求');
  define('LEGEND_ATTRIBUTES_IMAGES','图像');
  define('LEGEND_ATTRIBUTES_DOWNLOAD','可用的/不可用的<br />文件名');

  define('TEXT_ATTRIBUTES_UPDATE_SORT_ORDER','默认排序');
  define('TEXT_PRODUCTS_LISTING','产品列表: ');
  define('TEXT_NO_PRODUCTS_SELECTED','没有选择产品');
  define('TEXT_NO_ATTRIBUTES_DEFINED','产品ID#没有定义属性');

  define('TEXT_PRODUCTS_ID','产品ID#');
  define('TEXT_ATTRIBUTES_DELETE','删除全部');
  define('TEXT_ATTRIBUTES_COPY_PRODUCTS','复制到产品');
  define('TEXT_ATTRIBUTES_COPY_CATEGORY','复制到类别');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','产品ID#属性的变化 ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','删除 <strong>所有的</strong>产品属性:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','从...复制属性到另一个产品或者一整个类别下:<br />');

  define('TEXT_ATTRIBUTES_COPY_TO_PRODUCTS','产品');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','复制属性到另一个 <strong>产品</strong> 从 ID#');
  define('TEXT_INFO_ATTRIBUTES_FEATURE_COPY_TO','选择产品的所有属性复制到:');

  define('TEXT_ATTRIBUTES_COPY_TO_CATEGORY','类别');
  define('TEXT_INFO_ATTRIBUTES_FEATURE_CATEGORIES_COPY_TO','选择类别的所有属性复制到:');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','从产品ID#复制属性刀一个<strong>类别</strong> 下的所有产品中');  

  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>现有的产品属性要如何处理？</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE',' 首先<strong>删除</strong>，接着复制新的属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 新的设置/价格, 然后添加新的');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽略</strong>并且只添加新的属性');

  define('SUCCESS_PRODUCT_UPDATE_SORT','成功更新ID#属性排列顺序 ');
  define('SUCCESS_PRODUCT_UPDATE_SORT_NONE','ID#不存在属性可以更新排序 ');
  define('SUCCESS_ATTRIBUTES_DELETED','成功删除属性');
  define('SUCCESS_ATTRIBUTES_UPDATE','成功更新属性');

  define('WARNING_PRODUCT_COPY_TO_CATEGORY_NONE','没有选择类别用以拷贝');
  define('TEXT_PRODUCT_IN_CATEGORY_NAME',' - 在类别中: ');

  define('TEXT_DELETE_ALL_ATTRIBUTES','你确定要删除ID#的所有属性吗 ');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>跳过新的属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>从...插入新的属性 </strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>从属性更新 </strong>');

// preview
  define('TEXT_ATTRIBUTES_PREVIEW','预览属性');
  define('TEXT_ATTRIBUTES_PREVIEW_DISPLAY','显示ID#的预览属性');
  define('TEXT_PRODUCT_OPTIONS', '<strong>请选择:</strong>');

  define('TEXT_ATTRIBUTES_INSERT_INFO', '<strong>定义属性设置，然后点击插入应用</strong>');
  define('TEXT_PRICED_BY_ATTRIBUTES', '按属性定价');
  define('TEXT_PRODUCTS_PRICE', '产品价格: ');
  define('TEXT_SPECIAL_PRICE', '特价: ');
  define('TEXT_SALE_PRICE', '售价: ');
  define('TEXT_FREE', '免费');
  define('TEXT_CALL_FOR_PRICE', '价格面议');
  define('TEXT_SAVE_CHANGES','更改保存设置:');

  define('TEXT_INFO_ID', 'ID#');
  define('TEXT_INFO_ALLOW_ADD_TO_CART_NO', '没有添加到购物车');

  define('TEXT_DELETE_ATTRIBUTES_OPTION_NAME_VALUES', '确认删除选项名称下所有的产品选项值...');
  define('TEXT_INFO_PRODUCT_NAME', '<strong>产品名称: </strong>');
  define('TEXT_INFO_PRODUCTS_OPTION_NAME', '<strong>选项名称: </strong>');
  define('TEXT_INFO_PRODUCTS_OPTION_ID', '<strong>ID#</strong>');
  define('SUCCESS_ATTRIBUTES_DELETED_OPTION_NAME_VALUES', '成功删除选项名称下所有的选项值: ');
?>