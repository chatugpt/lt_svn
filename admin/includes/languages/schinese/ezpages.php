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
//  $Id: ezpages.php 2827 2006-01-08 19:46:40Z ajeh $
//
define('HEADING_TITLE', '简易页面');
define('TABLE_HEADING_PAGES', '页面标题');
define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_VSORT_ORDER', '边框排序');
define('TABLE_HEADING_HSORT_ORDER', '底部排序');
define('TEXT_PAGES_TITLE', '页面标题:');
define('TEXT_PAGES_HTML_TEXT', 'HTML内容:');
define('TABLE_HEADING_DATE_ADDED', '添加日期:');
define('TEXT_PAGES_STATUS_CHANGE', '状态更新: %s');
define('TEXT_INFO_DELETE_INTRO', '您确定要删除该页面吗?');
define('SUCCESS_PAGE_INSERTED', '成功: 页面已插入.');
define('SUCCESS_PAGE_UPDATED', '成功: 页面已更新.');
define('SUCCESS_PAGE_REMOVED', '成功: 页面已删除.');
define('SUCCESS_PAGE_STATUS_UPDATED', '成功: 页面的状态已经改变.');
define('ERROR_PAGE_TITLE_REQUIRED', '错误: 需要页面标题.');
define('ERROR_UNKNOWN_STATUS_FLAG', '错误: 位置状态标识.');
define('ERROR_MULTIPLE_HTML_URL', '错误: 您定义了多种操作，但是每个连接只能定义一种 ...<br />只能定义以下内容之一: HTML 内容 -或- 内部链接 URL -or- 外部链接 URL');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_STATUS_HEADER', '头部:');
define('TABLE_HEADING_STATUS_SIDEBOX', '边框:');
define('TABLE_HEADING_STATUS_FOOTER', '底部:');
define('TABLE_HEADING_STATUS_TOC', '目录:');
define('TABLE_HEADING_CHAPTER', '章:');

define('TABLE_HEADING_PAGE_OPEN_NEW_WINDOW', '打开一个新窗口:');
define('TABLE_HEADING_PAGE_IS_SSL', '页面是 SSL:');

define('TEXT_DISPLAY_NUMBER_OF_PAGES', '显示 <b>%d</b> 至 <b>%d</b> (对于<b>%d</b> 页面)');
define('IMAGE_NEW_PAGE', '新页面');
define('TEXT_INFO_PAGE_IMAGE', '图像');
define('TEXT_INFO_CURRENT_IMAGE', '当前图像:');
define('TEXT_INFO_PAGES_ID', 'ID: ');
define('TEXT_INFO_PAGES_ID_SELECT', '选择一个页面 ...');

define('TEXT_HEADER_SORT_ORDER', '顺序:');
define('TEXT_SIDEBOX_SORT_ORDER', '顺序:');
define('TEXT_FOOTER_SORT_ORDER', '顺序:');
define('TEXT_TOC_SORT_ORDER', '顺序:');
define('TEXT_CHAPTER', '前/后 一章:');
define('TABLE_HEADING_CHAPTER_PREV_NEXT', '章:&nbsp;<br />');

define('TEXT_HEADER_SORT_ORDER_EXPLAIN', '当头部单列中产生新简单页时使用头部排序; 在头部单列列表排序中，有设置了排序号码的优先于属性值为0的项');
define('TEXT_SIDEBOX_ORDER_EXPLAIN', '当简单页放置在垂直列表时使用边框排序; 在垂直列表排序中，有设置了排序号的优先于属性值为0的项, 否认则这会当成用于特殊用途的HTML文本');
define('TEXT_FOOTER_ORDER_EXPLAIN', '当简单页放置在底部栏列表时使用底部排序，在底部列排序中，有设置了排序号的优先于属性值为0的项');
define('TEXT_TOC_SORT_ORDER_EXPLAIN', '当产生的简单页被定制成单列（头部，底部等等）或者垂直边框时使用目录排序，基于个人需求；在该页面列表中，有设置了排序号码的优先于属性值为0的项');
define('TEXT_CHAPTER_EXPLAIN', '章节被用在目录排序于显示先前/向后翻页。目录链接包含了和该章节号码向匹配的页面，并且会在目录排序中显示出来');

define('TEXT_ALT_URL', '内部链接 URL:');
define('TEXT_ALT_URL_EXPLAIN', '如有指定，这个页面内容会被忽略掉，而使用内部链接<br />例如评论页面的链接为: index.php?main_page=reviews<br />我的账户的页面的链接为: index.php?main_page=account and mark as SSL');

define('TEXT_ALT_URL_EXTERNAL', '外部链接URL:');
define('TEXT_ALT_URL_EXTERNAL_EXPLAIN', '如有指定，这个页面内容会被忽略掉，而使用外部链接<br />外部链接示例: http://www.sashbox.net');

define('TEXT_SORT_CHAPTER_TOC_TITLE_INFO', '显示顺序: ');
define('TEXT_SORT_CHAPTER_TOC_TITLE', '章节/目录');
define('TEXT_SORT_HEADER_TITLE', '头部');
define('TEXT_SORT_SIDEBOX_TITLE', '边框');
define('TEXT_SORT_FOOTER_TITLE', '底部');
define('TEXT_SORT_PAGE_TITLE', '页面标题');
define('TEXT_SORT_PAGE_ID_TITLE', '页面 ID, 标题');

define('TEXT_PAGE_TITLE', '标题:');
define('TEXT_WARNING_MULTIPLE_SETTINGS', '<strong>警告: 定义多链接</strong>');
?>
