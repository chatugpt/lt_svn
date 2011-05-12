<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                                 |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: store_manager.php 4206 2006-08-22 10:00:01Z drbyte $
//
//
  define('HEADING_TITLE', '商店管理');
  define('TABLE_CONFIGURATION_TABLE', '查找常量定义');

  define('SUCCESS_PRODUCT_UPDATE_SORT_ALL', '<strong>成功</strong> 更新的属性排序');
  define('SUCCESS_PRODUCT_UPDATE_PRODUCTS_PRICE_SORTER', '<strong>成功</strong> 更新产品价格排序值');
  define('SUCCESS_PRODUCT_UPDATE_PRODUCTS_VIEWED', '<strong>成功</strong> 复位到产品到 0');
  define('SUCCESS_PRODUCT_UPDATE_PRODUCTS_ORDERED', '<strong>成功</strong> 复位订购产品到 0');
  define('SUCCESS_UPDATE_ALL_MASTER_CATEGORIES_ID', '<strong>成功</strong> 重置所有连结产品主分类');
  define('SUCCESS_UPDATE_COUNTER', '<strong>成功</strong> 计数器更新至: ');
  define('SUCCESS_CLEAN_ADMIN_ACTIVITY_LOG', '<strong>成功</strong> 更新的管理活动日志');

  define('ERROR_CONFIGURATION_KEY_NOT_FOUND', '<strong>错误:</strong> 没有匹配的配置项被发现 ...');
  define('ERROR_CONFIGURATION_KEY_NOT_ENTERED', '<strong>错误:</strong>没有配置键或文本输入搜索框...搜寻被终止');

  define('TEXT_INFO_COUNTER_UPDATE', '<strong>更新计数器</strong><br />到一个新的值: ');
  define('TEXT_INFO_PRODUCTS_PRICE_SORTER_UPDATE', '<strong>更新所有产品的价格排序</strong><br />能够显示价格排序: ');
  define('TEXT_INFO_PRODUCTS_VIEWED_UPDATE', '<strong>重置查看所有产品</strong><br />产品浏览量计数复位 0: ');
  define('TEXT_INFO_PRODUCTS_ORDERED_UPDATE', '<strong>重置查看所有产品排序</strong><br />复位产品订单数为 0: ');
  define('TEXT_INFO_MASTER_CATEGORIES_ID_UPDATE', '<strong>重置所有产品主分类ID</strong><br />要用于连结产品和定价: ');
  define('TEXT_INFO_ADMIN_ACTIVITY_LOG', '<strong>数据库管理活动日志表为空<br />警告：一定要备份您的数据库，然后运行此更新！</strong><br />在管理活动日志是一个跟踪方法，用于记录在管理活动！. 由于其性质，它可以变得非常大，非常快，确实需要由时间来清理.<br />给予警告50,000条或60天，也没发生过第一.');

  define('TEXT_ORDERS_ID_UPDATE', '<strong>重置当前排序 ID</strong>');
  define('TEXT_INFO_ORDERS_ID_UPDATE', '<strong>注：在更新当前订单ID ...</strong><br /><br />创建一个测试顺序的首位。然后，使用此测试订单编号填写以下信息。<br />新订单ID的下一个真正的秩序应该是一少进入订单ID比你想使用.<br /><strong>例如:</strong> 如果你希望你的下一个真正的秩序的ID是1225，输入数字1224<br /><br /><strong>警告:</strong> 您只能向前重置订单ID，而不能倒退.<br />因此，如果你设置了订单编号为25，然后再次变更至20日，在下订单ID将仍然是26.');
  define('TEXT_OLD_ORDERS_ID', '老订单 ID');
  define('TEXT_NEW_ORDERS_ID', '新订单 ID');

  define('TEXT_CONFIGURATION_CONSTANT', '<strong>查找文件定义的常数或语言</strong>');
  define('TEXT_CONFIGURATION_KEY', '关键字或名称:');
  define('TEXT_INFO_CONFIGURATION_UPDATE', '<strong>注:</strong> 常数是用大写的。<br />语言文件查找可能是其他的搜索没事的时候已经在数据库表中找到.');


  define('TEXT_CONFIGURATION_CONSTANT_FILES', '<strong>查找文件后定义语言</strong>');
  define('TEXT_CONFIGURATION_KEY_FILES', '查找文本:');
  define('TEXT_INFO_CONFIGURATION_UPDATE_FILES', '<strong>注:</strong> 语言文件查找可能大写或小写');

  define('TABLE_TITLE_KEY', '<strong>关键字:</strong>');
  define('TABLE_TITLE_TITLE', '<strong>标题:</strong>');
  define('TABLE_TITLE_DESCRIPTION', '<strong>描述:</strong>');
  define('TABLE_TITLE_GROUP', '<strong>组:</strong>');
  define('TABLE_TITLE_VALUE', '<strong>值:</strong>');

  define('TEXT_LANGUAGE_LOOKUPS', '语言文件查找窗口:');
  define('TEXT_LANGUAGE_LOOKUP_NONE', '无');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_LANGUAGE', '语言文件为 ' . strtoupper($_SESSION['language']) . ' - 目录/管理');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_CATALOG', '所有主要语言文件 - 目录 (' . DIR_WS_CATALOG . DIR_WS_LANGUAGES . 'english.php /espanol.php etc.)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_CATALOG_TEMPLATE', '目前所有选定的语言文件 - ' . DIR_WS_CATALOG . DIR_WS_LANGUAGES . $_SESSION['language'] . '/*.php');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ADMIN', '所有主要语言文件 - 管理 (' . DIR_WS_ADMIN . DIR_WS_LANGUAGES . 'english.php /espanol.php etc.)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ADMIN_LANGUAGE', '目前所有选定的语言文件 - 管理 (' . DIR_WS_ADMIN . DIR_WS_LANGUAGES . $_SESSION['language'] . '/*.php)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ALL', '目前所有选定的语言文件 - 目录/管理');

  define('TEXT_INFO_NO_EDIT_AVAILABLE','没有可用的编辑');
  define('TEXT_INFO_CONFIGURATION_HIDDEN', ' 或者，隐藏');

  define('TEXT_INFO_DATABASE_OPTIMIZE', '<strong>优化数据库</strong> 消除浪费，从已删除的记录空间。<br />可以选择性地运行在一个繁忙的数据库每月或每周.<br />(最佳运行在非繁忙时间.)');
  define('SUCCESS_DB_OPTIMIZE', '数据库优化 - 表加工: ');

?>