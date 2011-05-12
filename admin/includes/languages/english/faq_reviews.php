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
//  $Id: reviews.php 290 2004-09-15 19:48:26Z wilt $
//

define('HEADING_TITLE', 'Help Center Reviews');

define('TABLE_HEADING_FAQS', 'Help Center');
define('TABLE_HEADING_CUSTOMER_NAME','Customer Name');
define('TABLE_HEADING_RATING', 'Rating');
define('TABLE_HEADING_DATE_ADDED', 'Date Added');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Action');

define('ENTRY_FAQ', 'FAQ:');
define('ENTRY_FROM', 'From:');
define('ENTRY_DATE', 'Date:');
define('ENTRY_REVIEW', 'Review:');
define('ENTRY_REVIEW_TEXT', '<small><font color="#ff0000"><b>NOTE:</b></font></small>&nbsp;HTML is not translated!&nbsp;');
define('ENTRY_RATING', 'Rating:');

define('TEXT_INFO_DELETE_REVIEW_INTRO', 'Are you sure you want to delete this review?');

define('TEXT_INFO_DATE_ADDED', 'Date Added:');
define('TEXT_INFO_LAST_MODIFIED', 'Last Modified:');
define('TEXT_INFO_IMAGE_NONEXISTENT', 'IMAGE DOES NOT EXIST');
define('TEXT_INFO_REVIEW_AUTHOR', 'Author:');
define('TEXT_INFO_REVIEW_RATING', 'Rating:');
define('TEXT_INFO_REVIEW_READ', 'Read:');
define('TEXT_INFO_REVIEW_SIZE', 'Size:');
define('TEXT_INFO_FAQS_AVERAGE_RATING', 'Average Rating:');

define('TEXT_OF_5_STARS', '%s of 5 Stars!');
define('TEXT_GOOD', '<small><font color="#ff0000"><b>GOOD</b></font></small>');
define('TEXT_BAD', '<small><font color="#ff0000"><b>BAD</b></font></small>');
define('TEXT_INFO_HEADING_DELETE_REVIEW', 'Delete Review');
define('TEXT_DISPLAY_NUMBER_OF_FAQ_REVIEWS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> faq reviews)');
define('TABLE_HEADING_FAQ_MANAGER_CONFIGURATION', 'Help Center Configuration');
define('TABLE_HEADING_FAQ_MANAGER_SUPPORT', 'Help Center Support');
?>
