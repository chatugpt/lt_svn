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
//  $Id: options_name_manager.php 2181 2005-10-20 18:37:16Z ajeh $
//

define('HEADING_TITLE_OPT', '产品选项');
define('HEADING_TITLE_VAL', '选项值');
define('HEADING_TITLE_ATRIB', '产品属性');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_PRODUCT', '产品名称');
define('TABLE_HEADING_OPT_NAME', '属性名称');
define('TABLE_HEADING_OPT_VALUE', '属性值');
define('TABLE_HEADING_OPT_PRICE', '价格');
define('TABLE_HEADING_OPT_PRICE_PREFIX', '前缀');
define('TABLE_HEADING_ACTION', '选项');
define('TABLE_HEADING_DOWNLOAD', '可下载的产品:');
define('TABLE_TEXT_FILENAME', '文件名称:');
define('TABLE_TEXT_MAX_DAYS', '到期日:');
define('TABLE_TEXT_MAX_COUNT', '最大下载次数:');

define('TEXT_WARNING_OF_DELETE', '此选项有产品和值与之相关联 - 删除它是不安全的.');
define('TEXT_OK_TO_DELETE', '没有和此项相关联的产品 - 可安全的删除它.<br />注意：所有和该选项名称相关的值将被删除.');
define('TEXT_OPTION_ID', '选项 ID');
define('TEXT_OPTION_NAME', '选项名称');
define('TABLE_HEADING_OPT_DISCOUNTED','折扣的');

define('ATTRIBUTE_WARNING_DUPLICATE','重复的属性 - 属性未添加'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_DUPLICATE_UPDATE','重复的属性存在 - 属性没有改变'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_INVALID_MATCH','属性选项和属性值不匹配 - 属性添加失败'); // miss matched option and options value
define('ATTRIBUTE_WARNING_INVALID_MATCH_UPDATE','属性选项和属性值不匹配 - 属性值未发生改变'); // miss matched option and options value
define('ATTRIBUTE_POSSIBLE_OPTIONS_NAME_WARNING_DUPLICATE','选项名称可能重复添加'); // Options Name Duplicate warning
define('ATTRIBUTE_POSSIBLE_OPTIONS_VALUE_WARNING_DUPLICATE','可能重复添加选项'); // Options Value Duplicate warning

define('PRODUCTS_ATTRIBUTES_EDITING','编辑'); // title
define('PRODUCTS_ATTRIBUTES_DELETE','删除'); // title
define('PRODUCTS_ATTRIBUTES_ADDING','添加新属性'); // title
define('TEXT_DOWNLOADS_DISABLED','注意: 下载选项不可用');

define('TABLE_TEXT_MAX_DAYS_SHORT', '天:');
define('TABLE_TEXT_MAX_COUNT_SHORT', '最大值:');

  define('TABLE_HEADING_OPTION_SORT_ORDER','排序');
  define('TABLE_HEADING_OPTION_VALUE_SORT_ORDER','默认排序');
  define('TEXT_SORT',' 排序: ');

  define('TABLE_HEADING_OPT_WEIGHT_PREFIX','前缀');
  define('TABLE_HEADING_OPT_WEIGHT','重量');
  define('TABLE_HEADING_OPT_SORT_ORDER','排序');
  define('TABLE_HEADING_OPT_DEFAULT','默认');

  define('TABLE_HEADING_YES','是的');
  define('TABLE_HEADING_NO','不');

  define('TABLE_HEADING_OPT_TYPE', '选项类型'); //CLR 031203 add option type column
  define('TABLE_HEADING_OPTION_VALUE_SIZE','大小');
  define('TABLE_HEADING_OPTION_VALUE_MAX','最大值');
  define('TABLE_HEADING_OPTION_VALUE_ROWS','行');
  define('TABLE_HEADING_OPTION_VALUE_COMMENTS','评论');

  define('TEXT_OPTION_VALUE_COMMENTS','评论: ');
  define('TEXT_OPTION_VALUE_ROWS', '行: ');
  define('TEXT_OPTION_VALUE_SIZE','显示大小: ');
  define('TEXT_OPTION_VALUE_MAX','最大长度: ');

  define('TEXT_ATTRIBUTES_IMAGE','图像属性:');
  define('TEXT_ATTRIBUTES_IMAGE_DIR','属性图片目录:');

  define('TEXT_ATTRIBUTES_FLAGS','属性<br />标志:');
  define('TEXT_ATTRIBUTES_DISPLAY_ONLY', '只用于显示用途<br/>:');
  define('TEXT_ATTRIBUTES_IS_FREE', '当产品是免费的时候，属性标志免费<br/>:');
  define('TEXT_ATTRIBUTES_DEFAULT', '默认属性<br />标志为选中状态:');
  define('TEXT_ATTRIBUTE_IS_DISCOUNTED', '产品适用相同的折扣:');//Apply Same Discounts<br />Used by Product
  define('TEXT_ATTRIBUTE_PRICE_BASE_INCLUDED','按属性定价时，包含基本价格<br/>');

  define('TEXT_PRODUCT_OPTIONS_INFO','<strong>注意:编辑产品的附加设置选项名称</strong>');

// updates
define('ERROR_PRODUCTS_OPTIONS_VALUES', '警告: 没有找到产品 ... 没有任何更新');

define('TEXT_SELECT_PRODUCT', ' 选择一个产品');
define('TEXT_SELECT_CATEGORY', ' 选择一个分类类');
define('TEXT_SELECT_OPTION', '选择一个属性名');

// add
define('TEXT_OPTION_VALUE_ADD_ALL', '<br /><strong>根据选项名称，将选项值添加到所有产品</strong>');//Add ALL Option Values to ALL products for Option Name
define('TEXT_INFO_OPTION_VALUE_ADD_ALL', '更新所有存在至少一个属性值的产品 以及添加一个选项名称的所有选址值');
define('SUCCESS_PRODUCTS_OPTIONS_VALUES', '选项更新成功');

define('TEXT_OPTION_VALUE_ADD_PRODUCT', '<br /><strong>根据选项名称，将选项值添加到一个产品</strong>');
define('TEXT_INFO_OPTION_VALUE_ADD_PRODUCT', '更新所有存在至少一个选项值的产品 以及添加一个选项名称的所有选址值');

define('TEXT_OPTION_VALUE_ADD_CATEGORY', '<br /><strong>更具选线名称，将所有选项值添加到一个产品分类上</strong>');
define('TEXT_INFO_OPTION_VALUE_ADD_CATEGORY', '更新一个产品类别,当产品存在至少一个选项值 ，将所有选项值添加到一个选型名称 ');

define('TEXT_COMMENT_OPTION_VALUE_ADD_ALL', '<strong>注意:</strong> 排序顺序将被设置为默认选项值的排序顺序对这些产品');

// delete
define('TEXT_OPTION_VALUE_DELETE_ALL', '<br /><strong>根据选项名称，从所有产品里删除所有选项值</strong>');
define('TEXT_INFO_OPTION_VALUE_DELETE_ALL', '更新所有至少存在一个选项值的产品 以及删除所有在一个选项名称里的所有选项值。');

define('TEXT_OPTION_VALUE_DELETE_PRODUCT', '<br /><strong>根据选项名称，删除产品里所有的选项值</strong>');
define('TEXT_INFO_OPTION_VALUE_DELETE_PRODUCT', '更新至少存在一个选项值的产品，删除所有选项名称下的所有选项值。');

define('TEXT_OPTION_VALUE_DELETE_CATEGORY', '<br /><strong>根据选项名称，从分类中删除所有选项的选项值。</strong>');
define('TEXT_INFO_OPTION_VALUE_DELETE_CATEGORY', ' 当产品至少存在一个选项值时，根据选项名称，删除所有的选项值更新所有的产品分类');

define('TEXT_COMMENT_OPTION_VALUE_DELETE_ALL', '<strong>注意:</strong>所有选项名称选项值将被删除，选择的产品. 这并不会删除该选项的值设置.');

define('TEXT_OPTION_VALUE_COPY_ALL', '<strong>全部复制到另一个选项值选项名称</strong>');
define('TEXT_INFO_OPTION_VALUE_COPY_ALL', '所有选项值将被复制到一个选择的名称，另一个选项名称');
define('TEXT_SELECT_OPTION_FROM', '从选项名称复制: ');
define('TEXT_SELECT_OPTION_TO', '全部复制到选项名称选项值: ');
define('SUCCESS_OPTION_VALUES_COPIED', '成功复制! ');
define('ERROR_OPTION_VALUES_COPIED', '错误，不能复制选项值到相同的选项名称! ');
define('ERROR_OPTION_VALUES_NONE', '错误 - 复制从选项名有0值定义。没有被复制! ');
define('TEXT_WARNING_BACKUP', '警告：务必使全部变化，然后才作出适当的备份您的数据库');

define('TEXT_OPTION_ATTRIBUTE_IMAGES_PER_ROW', '每行图像属性: ');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE', '属性样式为单选按钮/选项: ');
define('TEXT_OPTION_ATTIBUTE_MAX_LENGTH', '<strong>注意：行，显示大小和最大长度仅是用于文字属性:</strong><br />');
define('TEXT_OPTION_IMAGE_STYLE', '<strong>图片样式:</strong>');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE_0', '0= 以下图片的选项名称');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE_1', '1= 元，图像及选项的价值');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE_2', '2= 元，图像及选项姓名，下面');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE_3', '3= 选项名称和图像元以下');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE_4', '4= 下面的图片元素和选项名称');
define('TEXT_OPTION_ATTRIBUTE_IMAGES_STYLE_5', '5= 上面的图片元素和选项名称');
?>