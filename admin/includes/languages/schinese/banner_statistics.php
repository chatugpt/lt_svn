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
//  $Id: banner_statistics.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', '广告统计');

define('TABLE_HEADING_SOURCE', '源');
define('TABLE_HEADING_VIEWS', '评论');
define('TABLE_HEADING_CLICKS', '点击数');

define('TEXT_BANNERS_DATA', 'D<br>a<br>t<br>a');
define('TEXT_BANNERS_DAILY_STATISTICS', '%s 每日统计 %s %s');
define('TEXT_BANNERS_MONTHLY_STATISTICS', '%s 每月统计 %s');
define('TEXT_BANNERS_YEARLY_STATISTICS', '%s 每年统计');

define('STATISTICS_TYPE_DAILY', '每天');
define('STATISTICS_TYPE_MONTHLY', '每月');
define('STATISTICS_TYPE_YEARLY', '每年');

define('TITLE_TYPE', '类型:');
define('TITLE_YEAR', '年:');
define('TITLE_MONTH', '月:');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', '错误: 图像路径不存在。请创建一个图像路径，例如: <strong>' . DIR_WS_ADMIN . 'images/graphs</strong>');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', '错误: 图像路径不可写。位于: <strong>' . DIR_WS_ADMIN . 'images/graphs</strong>');
?>