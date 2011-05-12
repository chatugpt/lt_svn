<?php
/**
*@Links Manager
*
* @package admin
* @copyright (c)2006-2008 Clyde Jones
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
*@version $Id: links_extras_dhtml.php 3/27/2008 Clyde Jones
*/
define('HEADING_TITLE', 'Links');
define('HEADING_TITLE_SEARCH', 'Search:');
define('TABLE_HEADING_TITLE', 'Title');
define('TABLE_HEADING_URL', 'URL');
define('TABLE_HEADING_CLICKS', 'Clicks');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Action');
define('TEXT_INFO_HEADING_DELETE_LINK', 'Delete Link');
define('TEXT_INFO_HEADING_CHECK_LINK', 'Check Link');
define('TEXT_DELETE_INTRO', 'Are you sure you want to delete this link?');
define('TEXT_INFO_LINK_CHECK_RESULT', 'Link Check Result:');
define('TEXT_INFO_LINK_CHECK_FOUND', 'Found');
define('TEXT_INFO_LINK_CHECK_NOT_FOUND', 'Not Found');
define('TEXT_INFO_LINK_CHECK_ERROR', 'Error Reading URL');
define('TEXT_INFO_LINK_STATUS', 'Status:');
define('TEXT_INFO_LINK_CATEGORY', 'Category:');
define('TEXT_INFO_LINK_CONTACT_NAME', 'Contact Name:');
define('TEXT_INFO_LINK_CONTACT_EMAIL', 'Contact Email:');
define('TEXT_INFO_LINK_CLICK_COUNT', 'Clicks:');
define('TEXT_INFO_LINK_DESCRIPTION', 'Description:');
define('TEXT_DATE_LINK_CREATED', 'Link Submitted:');
define('TEXT_DATE_LINK_LAST_MODIFIED', 'Last Modified:');
define('TEXT_IMAGE_NONEXISTENT', 'IMAGE DOES NOT EXIST');
define('SUCCESS_PAGE_REMOVED', 'Success: The Link item has been removed.');
define('SUCCESS_PAGE_STATUS_UPDATED', 'Success: The status of this Link item has been updated.');
 

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Link Status Update');
define('EMAIL_GREET_NONE', 'Dear %s,' . "\n");
define('EMAIL_TEXT', 'The status of your link at ' . STORE_NAME . ' has been updated. ' . "\n");
define('EMAIL_TEXT_NEW_STATUS', 'The New Status is: %s. ' ."\n");
define('EMAIL_TEXT_REPLY', 'Please reply to this email if you have any questions.' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE', 'Dear %s,' . "\n" . 'The status of your link at ' . STORE_NAME . ' has been updated. ' . "\n" . 'The New Status is: %s. ' ."\n" . 'Please reply to this email if you have any questions.' . "\n\n");
define('CATEGORY_WEBSITE', 'Website Details');
define('CATEGORY_CONTACT', 'Contact Information');
define('CATEGORY_RECIPROCAL', 'Reciprocal Page Details');
define('CATEGORY_OPTIONS', 'Options');
define('ENTRY_LINKS_TITLE', 'Site Title:');
define('ENTRY_LINKS_TITLE_ERROR', 'Link title must contain a minimum of ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'URL must contain a minimum of ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_CATEGORY', 'Category:');
define('ENTRY_LINKS_DESCRIPTION', 'Description:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'Description must contain a minimum of ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_IMAGE', 'Image URL:');
define('ENTRY_LINKS_CONTACT_NAME', 'Full Name:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Your Full Name must contain a minimum of ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Reciprocal Page:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Reciprocal page must contain a minimum of ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_STATUS', 'Status:');
define('ENTRY_LINKS_NOTIFY_CONTACT', 'Notify Contact:');
define('ENTRY_LINKS_RATING', 'Rating:');
define('ENTRY_LINKS_RATING_ERROR', 'Rating should not be empty.');
define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> links)');
define('IMAGE_NEW_LINK', 'New Link');
define('IMAGE_CHECK_LINK', 'Check Link');
?>