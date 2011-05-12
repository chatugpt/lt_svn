<?php
/**
 * Google XML Sitemap Feed
 *
 * @package Google XML Sitemap Feed
 * @copyright Copyright 2005-2007, Andrew Berezin eCommerce-Service.com
 * @copyright Portions Copyright 2005, Bobby Easland
 * @copyright Portions Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @link http://www.google.com/webmasters/sitemaps/docs/en/about.html About Google Sitemap
 * @version $Id: googlesitemap.php, v 1.3.12 21.06.2007 12:37 Andrew Berezin $
 */

define('HEADING_TITLE', '谷歌 XML 网站地图管理');
define('TEXT_GOOGLESITEMAP_OVERVIEW_HEAD', '<p><strong>概述:</strong></p>');
define('TEXT_GOOGLESITEMAP_OVERVIEW_TEXT', '<p>这个模块给你的zen-cart商店自动生成几个XML兼容的网站谷歌地图：一个是主网站地图，一个是分类地图，一个是简易页面地图.</p>');
define('TEXT_GOOGLESITEMAP_INSTRUCTIONS_HEAD', '<p><strong>说明: </strong></p>');
define('TEXT_GOOGLESITEMAP_INSTRUCTIONS_STEP1', '<p><strong><font color="#FF0000">第一步:</font></strong> 点击<a href=%s><strong>[这里]</strong></a> 制造 / 更新您的网站地图. </p><p>注意:请确保你的网页已经注册了谷歌，雅虎！和Ask.com的站点地图 ，在进行第二步前请提交您的原始网站地图 </p>');
define('TEXT_GOOGLESITEMAP_INSTRUCTIONS_STEP2', '<p><strong><font color="#FF0000">第二步:</font></strong> 选择爬虫，再点击 "' . IMAGE_SEND . '" 去通知他们，你的XML网站地图已经更新</p>');
define('TEXT_GOOGLESITEMAP_CHOOSE_CRAWLER', '选择爬虫:');
define('TEXT_GOOGLESITEMAP_LOGIN_HEAD', '<strong>什么是网站地图?</strong>');
define('TEXT_GOOGLESITEMAP_LOGIN', '<p>网站地图允许你上传一个关于你的分类，产品，简易页面的XML网站地图以便搜索引擎更快速的索引.</p><p>所有关于网站地图的信息你可在 <strong><a href="http://sitemaps.org/" target="_blank" class="splitPageLink">[Sitemaps.org]</a>上查找到</strong>.</p><p>注册或者登陆, 点击 <strong><a href="https://www.google.com/webmasters/sitemaps/login" target="_blank" class="splitPageLink">[谷歌]</a></strong>, <strong><a href="https://siteexplorer.search.yahoo.com/submit" target="_blank" class="splitPageLink">[雅虎!]</a></strong>, <strong><a href="https://submissions.ask.com" target="_blank" class="splitPageLink">[Ask.com]</a></strong>. 查看更多.com (MSN) 你必须 <a href="http://sitemaps.org/protocol.php#submit_robots" target="_blank" class="splitPageLink">在您的robots.txt文件中 指定网站地图的位置</a>.</p>');
?>