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

define('HEADING_TITLE', 'Google XML Sitemap Admin');
define('TEXT_GOOGLESITEMAP_OVERVIEW_HEAD', '<p><strong>OVERVIEW:</strong></p>');
define('TEXT_GOOGLESITEMAP_OVERVIEW_TEXT', '<p>This module automatically generates several XML Google compliant site maps for your Zen-Cart store: a main site map, one for categories, one for products, and one for EZ-pages.</p>');
define('TEXT_GOOGLESITEMAP_INSTRUCTIONS_HEAD', '<p><strong>INSTRUCTIONS: </strong></p>');
define('TEXT_GOOGLESITEMAP_INSTRUCTIONS_STEP1', '<p><strong><font color="#FF0000">STEP 1:</font></strong> Click <a href=%s><strong>[HERE]</strong></a> to create / update your site map. </p><p>NOTE: Please ensure that you or your web developer has registered with Google, Yahoo! and Ask.com SiteMaps, and submitted your initial site map before proceeding to step 2. </p>');
define('TEXT_GOOGLESITEMAP_INSTRUCTIONS_STEP2', '<p><strong><font color="#FF0000">STEP 2:</font></strong> Choose crawler and click "' . IMAGE_SEND . '" to notify them of the update to your XML sitemap</p>');
define('TEXT_GOOGLESITEMAP_CHOOSE_CRAWLER', 'Choose crawler:');
define('TEXT_GOOGLESITEMAP_LOGIN_HEAD', '<strong>What is SiteMaps?</strong>');
define('TEXT_GOOGLESITEMAP_LOGIN', '<p>SiteMaps allows you to upload an XML sitemap of all of your categories, products and EZ-pages directly to search engines for faster indexing.</p><p>All about Sitemap facilities you can read at <strong><a href="http://sitemaps.org/" target="_blank" class="splitPageLink">[Sitemaps.org]</a></strong>.</p><p>To register or login to your account, click <strong><a href="https://www.google.com/webmasters/sitemaps/login" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="https://siteexplorer.search.yahoo.com/submit" target="_blank" class="splitPageLink">[Yahoo!]</a></strong>, <strong><a href="https://submissions.ask.com" target="_blank" class="splitPageLink">[Ask.com]</a></strong>. For Moreover.com (MSN) you must <a href="http://sitemaps.org/protocol.php#submit_robots" target="_blank" class="splitPageLink">Specifying the Sitemap location in your robots.txt file</a>.</p>');
?>