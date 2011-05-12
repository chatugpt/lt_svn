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
//  $Id: faq.php 980 2005-02-09 02:32:48Z ajeh $
//

define('HEADING_TITLE', 'FAQ Categories / FAQs');
define('HEADING_TITLE_GOTO', 'Go To:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_FAQ_CATEGORIES_FAQS', 'FAQ Categories / FAQs');
define('TABLE_HEADING_FAQ_CATEGORIES_SORT_ORDER', 'Sort');
define('TEXT_FAQ_CATEGORIES_STATUS_INFO_OFF', '<span class="alert">*FAQ Category is Disabled</span>');
define('TEXT_FAQS_STATUS_INFO_OFF', '<span class="alert">*FAQ is Disabled</span>');

define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', 'Status');
define('TEXT_FAQS_CONTACT_NAME', 'FAQs Contact Name:');
define('TEXT_FAQS_CONTACT_MAIL', 'FAQs Contact_mail:');
define('TEXT_FAQS_ANSWER', 'FAQs Answer:');
define('ENTRY_FAQS_NOTIFY_CONTACT', 'Notify Question Owner:');
define('TEXT_FAQ_CATEGORIES', 'FAQ Categories:');
define('TEXT_SUBCATEGORIES', 'FAQ Subcategories:');
define('TEXT_FAQS', 'FAQs:');
define('TEXT_FAQS_AVERAGE_RATING', 'Average Rating:');
define('TEXT_FAQS_QUANTITY_INFO', 'Quantity:');
define('TEXT_DATE_ADDED', 'Date Added:');
define('TEXT_DATE_AVAILABLE', 'Date Available:');
define('TEXT_LAST_MODIFIED', 'Last Modified:');
define('TEXT_IMAGE_NONEXISTENT', 'IMAGE DOES NOT EXIST');
define('TEXT_NO_CHILD_FAQ_CATEGORIES_OR_FAQS', 'Please insert a new category or faq in this level.');
define('TEXT_FAQ_MORE_INFORMATION', 'For more information, please visit this faqs <a href="http://%s" target="blank">webpage</a>.');
define('TEXT_FAQ_DATE_ADDED', 'This faq was added to our site on %s.');
define('TEXT_EDIT_INTRO', 'Please make any necessary changes');
define('TEXT_EDIT_FAQ_CATEGORIES_ID', 'FAQ Category ID:');
define('TEXT_EDIT_FAQ_CATEGORIES_NAME', 'FAQ Category Name:');
define('TEXT_EDIT_FAQ_CATEGORIES_IMAGE', 'FAQ Category Image:');
define('TEXT_EDIT_SORT_ORDER', 'Sort Order:');
define('FAQ_SUPPORT_SITE', 'http://zen-cart.com/forums');

define('TEXT_INFO_COPY_TO_INTRO', 'Please choose a new category you wish to copy this faq to');
define('TEXT_INFO_CURRENT_FAQ_CATEGORIES', 'Current FAQ Categories: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'New FAQ Category');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Edit FAQ Category');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Delete FAQ Category');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Move FAQ Category');
define('TEXT_INFO_HEADING_DELETE_FAQ', 'Delete FAQ');
define('TEXT_INFO_HEADING_MOVE_FAQ', 'Move FAQ');
define('TEXT_INFO_HEADING_COPY_TO', 'Copy To');

define('TEXT_DELETE_CATEGORY_INTRO', 'Are you sure you want to delete this category?');
define('TEXT_DELETE_FAQ_INTRO', 'Are you sure you want to permanently delete this faq?<br /><br /><strong>Warning:</strong> On Linked FAQs<br />1 Make sure the Master FAQ Category has been changed if you are deleting the FAQ from the Master FAQ Category<br />2 Check the checkbox for the FAQ Category to Delete the FAQ from');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNING:</b> There are %s (child-)categories still linked to this category!');
define('TEXT_DELETE_WARNING_FAQS', '<b>WARNING:</b> There are %s faqs still linked to this category!');

define('TEXT_MOVE_FAQS_INTRO', 'Please select which category you wish <b>%s</b> to reside in');
define('TEXT_MOVE_FAQ_CATEGORIES_INTRO', 'Please select which category you wish <b>%s</b> to reside in');
define('TEXT_MOVE', 'Move <b>%s</b> to:');

define('TEXT_NEW_CATEGORY_INTRO', 'Please fill out the following information for the new category');
define('TEXT_NEW_FAQ', 'FAQ in FAQ Category: &quot;%s&quot;');
define('TEXT_FAQ_CATEGORIES_NAME', 'FAQ Category Name:');
define('TEXT_FAQ_CATEGORIES_IMAGE', 'FAQ Category Image:');
define('TEXT_SORT_ORDER', 'Sort Order:');

define('TEXT_FAQS_STATUS', 'Question Status:');
define('TEXT_FAQS_DATE_AVAILABLE', 'Date Available:');
define('TEXT_FAQ_AVAILABLE', 'Active');
define('TEXT_FAQ_NOT_AVAILABLE', 'In Active');
define('TEXT_FAQS_SORT_ORDER', 'Sort Order:');
define('TEXT_DISPLAY_NUMBER_OF_FAQS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> FAQs)');


define('TEXT_FAQS_NAME', 'Question Title:');
define('TEXT_FAQS_DESCRIPTION', 'Question Answer:');
define('TEXT_FAQS_QUANTITY', 'FAQs Quantity:');
define('TEXT_FAQS_MODEL', 'FAQs Model:');
define('TEXT_FAQS_IMAGE', 'FAQs Image:');
define('TEXT_FAQS_IMAGE_DIR', 'Upload to directory:');
define('TEXT_FAQS_URL', 'FAQs URL:');
define('TEXT_FAQS_URL_WITHOUT_HTTP', '<small>(without http://)</small>');
define('EMPTY_CATEGORY', 'Empty FAQ Category');

define('TEXT_HOW_TO_COPY', 'Copy Method:');
define('TEXT_COPY_AS_LINK', 'Link faq');
define('TEXT_COPY_AS_DUPLICATE', 'Duplicate faq');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Error: Can not link faqs in the same category.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: Catalog images directory is not writeable: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: Catalog images directory does not exist: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Error: FAQ Category cannot be moved into child category.');
define('TEXT_INFO_CURRENT_FAQ', 'Current FAQ: ');
define('TABLE_HEADING_MODEL', 'Model');
define('TEXT_FAQ_CATEGORIES_IMAGE_DIR','Upload to directory:');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Question Status Update');
define('EMAIL_TEXT_STATUS_UPDATE', 'Dear %s,' . "\n\n" . 'The status of your question at ' . STORE_NAME . ' has been updated.' . "\n\n" . 'New status: %s' . "\n\n" . 'Please reply to this email if you have any questions.' . "\n");

define('TEXT_FAQS_OWNER', 'Question Owner:');
define('TEXT_FAQS_OWNER_EMAIL', 'Contact Email:');
?>