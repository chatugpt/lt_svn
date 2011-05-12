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
//  $Id: subscription_manager.php,v 1.1 2006/06/16 01:46:13 Owner Exp $
//

define('HEADING_TITLE', '订阅管理');
define('TABLE_HEADING_ID', 'ID#');
define('TABLE_HEADING_EMAIL', '邮箱地址');
define('TABLE_HEADING_PREFERENCE', '偏好');
define('TABLE_HEADING_SUBSCRIPTION_STATUS', '状态');
define('TABLE_HEADING_ACTION', '执行');
define('TEXT_INFO_DELETE_INTRO', '你真的想删除这封邮件?');
define('TEXT_INFO_HEADING_NEW_SUBSCRIPTION' , '新订阅');
define('TEXT_INFO_HEADING_EDIT_SUBSCRIPTION' , '编辑订阅');
define('TEXT_INFO_EDIT_INTRO' , '请进行任何必要的修改');
define('TEXT_INFO_INSERT_INTRO' , '订阅自动确认此处输入.');
define('TEXT_INFO_CLASS_TITLE' , '邮箱地址');
define('TEXT_INFO_CONFIRMED' , '确认:');
define('TEXT_INFO_HEADING_DELETE_EMAIL' , '删除邮件');
define('TEXT_PURGE_SUBSCRIPTIONS' , '清除超过90天未确认的订阅');

define('TEXT_INFO_HEADING_IMPORT_SUBSCRIPTION','导入订阅');
define('TEXT_INFO_IMPORT_INTRO','从计算机上的文件导入订阅。为了达到最佳效果，导入文件的第一个小测试.');
define('TEXT_INFO_IMPORT_FILE','要导入的文件:');
define('TEXT_INFO_IMPORT_ENCL','如果字段是用引号或其它封闭的，在此输入:');
define('TEXT_INFO_IMPORT_DELIM','分隔区域 (| , \s \t etc):');
define('TEXT_INFO_IMPORT_HEADER_ROW','检查的第一行是标题行.');
define('TEXT_INFO_IMPORT_FORMAT','默认邮箱格式化:');
define('TEXT_INFO_IMPORT_SAMPLE',
'输入一个范例记录，使用\'格式\'的电子邮件格式字段和\'电子邮件\'的电子邮件.<br />
使用空，表示字段不导入.<br />
用一个空格分隔栏位.');


define('TEXT_INFO_SUBSCRIPTIONS_IMPORTED', '成功导入 %s 订阅.');
define('TEXT_INFO_SUBSCRIPTIONS_PURGED', '订阅清除.');
define('TEXT_SUBSCRIPTION_STATUS_CUSTOMER' , '客户');
define('TEXT_SUBSCRIPTION_STATUS_CONFIRMED' , '通讯登记');
define('TEXT_SUBSCRIPTION_STATUS_UNCONFIRMED' , '待确认');

define('TEXT_SUBSCRIPTION_DATE', '订阅日期');
define('TEXT_INFO_SUBSCRIPTION_STATUS_UNCONFIRMED', 
'这个电子邮件地址尚未确认.<br />通讯不会被发送，直到用户确认.');

define('NEWSONLY_SUBSCRIPTION_NOT_INSTALLED', '警告：通讯只登记尚未安装.');
define('NEWSONLY_SUBSCRIPTION_NOT_ENABLED', '警告：通讯只订阅的贡献被禁用。并非所有的功能将起作用。要启用，去“配置 - >我的商店“，并启用.');
define('TEXT_INSTALL', '安装');
define('TEXT_REMOVE', '移除');
define('TEXT_NEWSONLY_REMOVE_CONFIRM','警告！这将删除所有通讯只有订阅！继续? <a href="%s">是</a>&nbsp;&nbsp;<a href="%s">否</a>');
?>
