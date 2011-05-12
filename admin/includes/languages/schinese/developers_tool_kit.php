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
//  $Id: developers_tool_kit.php 6082 2007-03-31 04:26:08Z ajeh $
//
  define('HEADING_TITLE', '开发工具包');
  define('TABLE_CONFIGURATION_TABLE', '查找常量定义');

  define('SUCCESS_PRODUCT_UPDATE_PRODUCTS_PRICE_SORTER', '<strong>成功</strong> 更新产品价格类别值');

  define('ERROR_CONFIGURATION_KEY_NOT_FOUND', '<strong>错误:</strong> 没有找到相匹配的配置项 ...');
  define('ERROR_CONFIGURATION_KEY_NOT_ENTERED', '<strong>错误:</strong> 没有键入要查找的配置项或者文本 ... 搜索结束');

  define('TEXT_INFO_PRODUCTS_PRICE_SORTER_UPDATE', '<strong>更新所有产品价格排序</strong><br />使之可以使显示价格排序: ');

  define('TEXT_CONFIGURATION_CONSTANT', '<strong>查找定义的常量或者语言文件</strong>');
  define('TEXT_CONFIGURATION_KEY', '关键字或者名称:');
  define('TEXT_INFO_CONFIGURATION_UPDATE', '<strong>注意:</strong> 常量都是用大写形式书写的.<br />语言文件, 函数, 类, 等等. 若如果在下拉表单中选择，当在数据库的表中没有查找到，查找也会进行');

  define('TABLE_TITLE_KEY', '<strong>关键字:</strong>');
  define('TABLE_TITLE_TITLE', '<strong>标题:</strong>');
  define('TABLE_TITLE_DESCRIPTION', '<strong>描述:</strong>');
  define('TABLE_TITLE_GROUP', '<strong>组:</strong>');
  define('TABLE_TITLE_VALUE', '<strong>值:</strong>');

  define('TEXT_LOOKUP_NONE', '无');
  define('TEXT_INFO_SEARCHING', '正在查找 ');
  define('TEXT_INFO_FILES_FOR', ' 文件 ... 对于: ');
  define('TEXT_INFO_MATCHES_FOUND', '查到到匹配的文件: ');

  define('TEXT_LANGUAGE_LOOKUPS', '查找语言文件:');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_LANGUAGE', '所有的语言文件' . strtoupper($_SESSION['language']) . ' - Catalog/Admin');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_CATALOG', '所有主要的语言文件 - Catalog (' . DIR_WS_CATALOG . DIR_WS_LANGUAGES . 'english.php /espanol.php etc.)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_CATALOG_TEMPLATE', '所有当前选择的语言文件 - ' . DIR_WS_CATALOG . DIR_WS_LANGUAGES . $_SESSION['language'] . '/*.php');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ADMIN', '所有主要的语言文件 - Admin (' . DIR_WS_ADMIN . DIR_WS_LANGUAGES . 'english.php /espanol.php etc.)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ADMIN_LANGUAGE', '所有当前选择的语言文件 - Admin (' . DIR_WS_ADMIN . DIR_WS_LANGUAGES . $_SESSION['language'] . '/*.php)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ALL', '所有当前选择的语言文件 - Catalog/Admin');

  define('TEXT_FUNCTION_CONSTANT', '<strong>在函数文件里查找函数或者事件</strong>');
  define('TEXT_FUNCTION_LOOKUPS', '查找函数文件:');
  define('TEXT_FUNCTION_LOOKUP_CURRENT', '所有的函数文件 - Catalog/Admin');
  define('TEXT_FUNCTION_LOOKUP_CURRENT_CATALOG', '所有的函数文件 - Catalog');
  define('TEXT_FUNCTION_LOOKUP_CURRENT_ADMIN', '所有的函数文件 - Admin');

  define('TEXT_CLASS_CONSTANT', '<strong>在类文件里查找类或者事件</strong>');
  define('TEXT_CLASS_LOOKUPS', '查找类文件:');
  define('TEXT_CLASS_LOOKUP_CURRENT', '所有的类文件 - Catalog/Admin');
  define('TEXT_CLASS_LOOKUP_CURRENT_CATALOG', '所有的类文件 - Catalog');
  define('TEXT_CLASS_LOOKUP_CURRENT_ADMIN', '所有的类文件 - Admin');

  define('TEXT_TEMPLATE_CONSTANT', '<strong>查找模板事件</strong>');
  define('TEXT_TEMPLATE_LOOKUPS', '查找模板文件:');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT', '所有的模板文件所有的模板文件 - /templates sideboxes /pages etc.');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT_TEMPLATES', '所有的模板文件 - /templates');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT_SIDEBOXES', '所有的模板文件 - /sideboxes');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT_PAGES', '所有的模板文件 - /pages');

  define('TEXT_ALL_FILES_CONSTANT', '<strong>查找所有文件</strong>');
  define('TEXT_ALL_FILES_LOOKUPS', '查找所有文件:');
  define('TEXT_ALL_FILES_LOOKUP_CURRENT', '所有文件 - Catalog/Admin');
  define('TEXT_ALL_FILES_LOOKUP_CURRENT_CATALOG', '所有文件 - Catalog');
  define('TEXT_ALL_FILES_LOOKUP_CURRENT_ADMIN', '所有文件 - Admin');

  define('TEXT_INFO_NO_EDIT_AVAILABLE','编辑不可用');
  define('TEXT_INFO_CONFIGURATION_HIDDEN', ' 或, 隐藏');

  define('TEXT_SEARCH_ALL_FILES', '查找所有的文件: ');
  define('TEXT_SEARCH_DATABASE_TABLES', '查找数据库配置表: ');
?>