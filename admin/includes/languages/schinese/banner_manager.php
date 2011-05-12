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
//  $Id: banner_manager.php 3131 2006-03-07 22:53:04Z ajeh $
//

define('HEADING_TITLE', '广告管理');

define('TABLE_HEADING_BANNERS', '广告');
define('TABLE_HEADING_GROUPS', '广告组');
define('TABLE_HEADING_STATISTICS', '显示 / 点击');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_BANNER_OPEN_NEW_WINDOWS','新窗口');
define('TABLE_HEADING_BANNER_ON_SSL', '显示SSL');
define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_BANNER_SORT_ORDER', '排列<br />顺序');

define('TEXT_BANNERS_TITLE', '广告标题:');
define('TEXT_BANNERS_URL', '广告URL:');
define('TEXT_BANNERS_GROUP', '广告组:');
define('TEXT_BANNERS_NEW_GROUP', ', 或者在以下键入一个新的广告组');
define('TEXT_BANNERS_IMAGE', '图像:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', 或者在以下键入本地文件');
define('TEXT_BANNERS_IMAGE_TARGET', '图像路径(存为):');
define('TEXT_BANNER_IMAGE_TARGET_INFO', '<strong>建议服务器上的图像路径为:</strong> ' . DIR_FS_CATALOG_IMAGES . 'banners/');
define('TEXT_BANNERS_HTML_TEXT_INFO', '<strong>注意: HTML广告部记录广告的点击数</strong>');
define('TEXT_BANNERS_HTML_TEXT', 'HTML文本:');
define('TEXT_BANNERS_ALL_SORT_ORDER', '排列顺序 - banner_box_all');
define('TEXT_BANNERS_ALL_SORT_ORDER_INFO', '<strong>注意:banners_box_all 会在sidebox中显示他们的广告组所定义的排列顺序 </strong>');
define('TEXT_BANNERS_EXPIRES_ON', '失效日期:');
define('TEXT_BANNERS_OR_AT', ', 或');
define('TEXT_BANNERS_IMPRESSIONS', '看法/意见.');
define('TEXT_BANNERS_SCHEDULED_AT', '请选择日期:');
define('TEXT_BANNERS_BANNER_NOTE', '<b>广告注意事项:</b><ul><li>对广告使用图像或者HTML文本 - 不可两者同时使用.</li><li>HTML文本优先于图像</li><li>HTML文本不会通过点击注册，但会显示注册</li><li>有绝对路径的广告图不会再安全的页面显示</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE', '<b>图像注意事项:</b><ul><li>上传目录必须要有正确的用户权限设置!</li><li>不要填写“保存到”字段，如果你不上传图像到网络服务器(ie, 您正在使用本地图像).</li><li>“保存到”字段必须是存在的路径并且有一个结束符 (例如, banners/).</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE', '<b>期满注意事项:</b><ul><li>只有这两个字段之一会被提交</li><li>如果广告不是自动失效的，请把那些字段留空。</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE', '<b>附表说明:</b><ul><li>如果日期安排已经设定，广告将在那个日期内是激活的.</li><li>所有被定义了的广告都会标识为非活动状态，直到他们被规定的日期到来，他们才会被标记为活动状态.</li></ul>');
define('TEXT_BANNERS_STATUS', '广告状态:');
define('TEXT_BANNERS_ACTIVE', '激活的');
define('TEXT_BANNERS_NOT_ACTIVE', '非激活的');
define('TEXT_INFO_BANNER_STATUS', '<strong>注意:</strong> 广告状态基于定义的日期或者用户的设置更新');
define('TEXT_BANNERS_OPEN_NEW_WINDOWS', '广告是否打开新窗口');
define('TEXT_INFO_BANNER_OPEN_NEW_WINDOWS', '<strong>注意:</strong> 广告将会打开一个新的窗口');
define('TEXT_BANNERS_ON_SSL', '有SSL的广告');
define('TEXT_INFO_BANNER_ON_SSL', '<strong>注意:</strong> 广告可以在安全的页面没有错误的显示');

define('TEXT_BANNERS_DATE_ADDED', '添加日期:');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', '定义为: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', '期满: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', '期满: <b>%s</b> 另设置');
define('TEXT_BANNERS_STATUS_CHANGE', '状态改变: %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>A');
define('TEXT_BANNERS_LAST_3_DAYS', '最后三天');
define('TEXT_BANNERS_BANNER_VIEWS', '广告评论');
define('TEXT_BANNERS_BANNER_CLICKS', '广告点击数');

define('TEXT_INFO_DELETE_INTRO', '你确定要删除这个广告吗?');
define('TEXT_INFO_DELETE_IMAGE', '删除广告图');

define('SUCCESS_BANNER_INSERTED', '成功: 广告已插入.');
define('SUCCESS_BANNER_UPDATED', '成功: 广告已更新.');
define('SUCCESS_BANNER_REMOVED', '成功:广告已移除.');
define('SUCCESS_BANNER_STATUS_UPDATED', '成功: 广告状态已更新.');

define('ERROR_BANNER_TITLE_REQUIRED', '错误: 必须要有广告标题.');
define('ERROR_BANNER_GROUP_REQUIRED', '错误: 不许要有广告组.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', '错误: 目标路径不存在: %s');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', '错误: 目标路径不可存储: %s');
define('ERROR_IMAGE_DOES_NOT_EXIST', '错误: 图像不存在.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', '错误: 图像不可删除.');
define('ERROR_UNKNOWN_STATUS_FLAG', '错误: 位置状态标识.');
define('ERROR_BANNER_IMAGE_REQUIRED', '错误: 必须要有广告图像.');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', '错误: 图像路径不存在. 请创建一个图像路径，例如: <strong>' . DIR_WS_ADMIN . 'images/graphs</strong>');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', '错误: 图像路径不可写. 位于: <strong>' . DIR_WS_ADMIN . 'images/graphs</strong>');

define('TEXT_LEGEND_BANNER_ON_SSL', '显示SSL');
define('TEXT_LEGEND_BANNER_OPEN_NEW_WINDOWS', '新窗口');

// Tooltip Text for images in Banner Manager
define('IMAGE_ICON_BANNER_OPEN_NEW_WINDOWS_ON','打开新窗口 - 可用');
define('IMAGE_ICON_BANNER_OPEN_NEW_WINDOWS_OFF','打开新窗口 - 不可用');
define('IMAGE_ICON_BANNER_ON_SSL_ON','在安全页面显示 - 可用');
define('IMAGE_ICON_BANNER_ON_SSL_OFF','在安全页面显示 - 不可用');

define('SUCCESS_BANNER_OPEN_NEW_WINDOW_UPDATED', '成功: 在新窗口打开广告的状态已更新.');
define('SUCCESS_BANNER_ON_SSL_UPDATED', '成功: 显示SSL的广告的状态已更新.');
?>