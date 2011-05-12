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
//  $Id: options_values_manager.php 1148 2005-04-07 19:24:10Z drbyte $
//

define('HEADING_TITLE_OPT', '产品选项');
define('HEADING_TITLE_VAL', '选项值');
define('HEADING_TITLE_ATRIB', '产品属性');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_PRODUCT', '产品名称');
define('TABLE_HEADING_OPT_NAME', '选项名称');
define('TABLE_HEADING_OPT_VALUE', '选项值');
define('TABLE_HEADING_OPT_PRICE', '价格');
define('TABLE_HEADING_OPT_PRICE_PREFIX', '前缀');
define('TABLE_HEADING_ACTION', '执行');
define('TABLE_HEADING_DOWNLOAD', '下载的产品s:');
define('TABLE_TEXT_FILENAME', '文件名:');
define('TABLE_TEXT_MAX_DAYS', '过期天数:');
define('TABLE_TEXT_MAX_COUNT', '最大下载次数:');

define('TEXT_WARNING_OF_DELETE', '<span class="alert">T他选择了产品和与之相关联的值 - 它是不安全的删除它<br />注意：任何相关的文件下载这个选项的值将不会从服务器中删除。.</span>');
define('TEXT_OK_TO_DELETE', '这个选项没有的产品和与之相关联的价值 - 它可以安全地删除它.');
define('TEXT_OPTION_ID', '选项 ID');
define('TEXT_OPTION_NAME', '选项名称');
define('TABLE_HEADING_OPT_DISCOUNTED','折扣');

define('ATTRIBUTE_WARNING_DUPLICATE','重复的属性 - 属性未添加'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_DUPLICATE_UPDATE','重复的属性存在 - 属性没有改变'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_INVALID_MATCH','选项的属性和值不匹配 - 属性未添加'); // miss matched option and options value
define('ATTRIBUTE_WARNING_INVALID_MATCH_UPDATE','选项的属性和值不匹配 - 属性没有改变'); // miss matched option and options value
define('ATTRIBUTE_POSSIBLE_OPTIONS_NAME_WARNING_DUPLICATE','选项名称可能重复添加'); // Options Name Duplicate warning
define('ATTRIBUTE_POSSIBLE_OPTIONS_VALUE_WARNING_DUPLICATE','可能重复选项增值'); // Options Value Duplicate warning

define('PRODUCTS_ATTRIBUTES_EDITING','编辑'); // title
define('PRODUCTS_ATTRIBUTES_DELETE','剔除'); // title
define('PRODUCTS_ATTRIBUTES_ADDING','添加新属性的'); // title
define('TEXT_DOWNLOADS_DISABLED','注：下载将被禁用');

define('TABLE_TEXT_MAX_DAYS_SHORT', '天:');
define('TABLE_TEXT_MAX_COUNT_SHORT', '最大:');

  define('TABLE_HEADING_OPTION_SORT_ORDER','排序');
  define('TABLE_HEADING_OPTION_VALUE_SORT_ORDER','默认排序');
  define('TEXT_SORT',' 排序: ');

  define('TABLE_HEADING_OPT_WEIGHT_PREFIX','前缀');
  define('TABLE_HEADING_OPT_WEIGHT','重量');
  define('TABLE_HEADING_OPT_SORT_ORDER','排序 ');
  define('TABLE_HEADING_OPT_DEFAULT','默认');

  define('TABLE_HEADING_YES','是');
  define('TABLE_HEADING_NO','否');

  define('TABLE_HEADING_OPT_TYPE', '选项类型'); //CLR 031203 add option type column
  define('TABLE_HEADING_OPTION_VALUE_SIZE','大小');
  define('TABLE_HEADING_OPTION_VALUE_MAX','最大');
  define('TABLE_HEADING_OPTION_VALUE_ROWS','行');
  define('TABLE_HEADING_OPTION_VALUE_COMMENTS','备注');

  define('TEXT_OPTION_VALUE_COMMENTS','客户: ');
  define('TEXT_OPTION_VALUE_SIZE','显示大小: ');
  define('TEXT_OPTION_VALUE_MAX','最大长度: ');

  define('TEXT_ATTRIBUTES_IMAGE','交换图片属性:');
  define('TEXT_ATTRIBUTES_IMAGE_DIR','属性图片目录:');

  define('TEXT_ATTRIBUTES_FLAGS','属性<br />1.旗:');
  define('TEXT_ATTRIBUTES_DISPLAY_ONLY', '用<br />显示用途:');
  define('TEXT_ATTRIBUTES_IS_FREE', '属性是免费的<br />当产品是免费的:');
  define('TEXT_ATTRIBUTES_DEFAULT', '默认属性<br />被选定的标记:');
  define('TEXT_ATTRIBUTE_IS_DISCOUNTED', '应用相同折扣<br />使用产品:');
  define('TEXT_ATTRIBUTE_PRICE_BASE_INCLUDED','包括在基价<br />按属性定价时');

  define('TEXT_PRODUCT_OPTIONS_INFO','编辑附加设置产品选项');

// Option Names/Values copier from one to another
  define('TEXT_OPTION_VALUE_COPY_ALL', '<strong>复制的所有产品在选项名称和值 ...</strong>');
  define('TEXT_INFO_OPTION_VALUE_COPY_ALL', '选择一个选项名称和价值，目前在产品或产品，你要复制，然后与现有的选项名称和有价值的其他选项名称和价值存在的所有产品');
  define('TEXT_SELECT_OPTION_FROM', '匹配选项名称:');
  define('TEXT_SELECT_OPTION_VALUES_FROM', '匹配选项值:');
  define('TEXT_SELECT_OPTION_TO', '添加选项名称:');
  define('TEXT_SELECT_OPTION_VALUES_TO', '添加选项值:');
  define('TEXT_SELECT_OPTION_VALUES_TO_CATEGORIES_ID', '离开所有的产品或<br />输入一个空白的产品类别ID更新');

// Option Name/Value to Option Name for Category with Product defaults
  define('TEXT_OPTION_VALUE_COPY_OPTIONS_TO', '<strong>复制选项名称/值对产品与现有的选项名称 ...</strong>');
  define('TEXT_INFO_OPTION_VALUE_COPY_OPTIONS_TO', '选择一个选项名称和价值，目前在产品或产品存在添加到所有产品，或只在选定的类别的产品已选定的选项名称.
                                                   <br /><strong>示例:</strong> 添加选项名称：彩色选项值：红的所有产品与选项名：大小
                                                   <br /><strong>示例:</strong> 新增选项名：使用默认值从绿色产品编号：：颜色选择值34的所有产品与选项名：大小
                                                   <br /><strong>示例:</strong> 新增选项名：使用默认值从绿色产品编号：：颜色选择价值34选项名称的所有产品：大小分类编号：65
        ');
  define('TEXT_SELECT_OPTION_TO_ADD_TO', '添加选项名称到:');
  define('TEXT_SELECT_OPTION_FROM_ADD', '添加选项名称:');
  define('TEXT_SELECT_OPTION_VALUES_FROM_ADD', '添加选项值:');
  define('TEXT_SELECT_OPTION_FROM_PRODUCTS_ID', '默认的新属性从产品ID＃值或留空为没有默认值:');
  define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>现有的产品应如何处理属性应该是?</strong>');
  define('TEXT_COPY_ATTRIBUTES_DELETE','<strong>删除</strong> 第一，然后复制新属性');
  define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>更新</strong> 新设置/价格现有属性');
  define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>忽略</strong> 现有的属性和只添加新的属性');

  define('TEXT_INFO_FROM', ' 来自: ');
  define('TEXT_INFO_TO', ' 到: ');
  define('ERROR_OPTION_VALUES_COPIED', '错误：重复的选项名称和选项值');
  define('ERROR_OPTION_VALUES_COPIED_MISMATCH', '错误：不匹配的选项名称和选项值选择');
  define('ERROR_OPTION_VALUES_NONE', '错误：没有找到复制');
  define('SUCCESS_OPTION_VALUES_COPIED', '拷贝成功! ');
  define('ERROR_OPTION_VALUES_COPIED_MISMATCH_PRODUCTS_ID', '错误：缺少选项名称/值产品 ID#');

  define('TEXT_OPTION_VALUE_DELETE_ALL', '<strong>删除匹配的属性从所有产品在选项名称和值 ...</strong>');
  define('TEXT_INFO_OPTION_VALUE_DELETE_ALL', '选择一个选项名称和价值，目前在产品或您要删除的一年内从所有产品或全部产品类别的产品存在');
  define('TEXT_SELECT_DELETE_OPTION_FROM', '选项名相匹配:');
  define('TEXT_SELECT_DELETE_OPTION_VALUES_FROM', '选项值相匹配:');

  define('ERROR_OPTION_VALUES_DELETE_MISMATCH', '错误：不匹配的选项名称和选项值选择');

  define('SUCCESS_OPTION_VALUES_DELETE', '成功：删除: ');
?>