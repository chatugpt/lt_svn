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
//  $Id: FAQ categories.php 671 2004-11-28 19:52:17Z toolcrazy $
//

define('HEADING_TITLE', 'Help Categories / Help');
define('HEADING_TITLE_GOTO', 'Go To:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_FAQ_CATEGORIES_FAQS', 'Help Categories / Help');
define('TABLE_HEADING_FAQ_CATEGORIES_SORT_ORDER', 'Sort');

define('TEXT_LEGEND_FAQ_LINKED','Linked FAQs');

define('TABLE_HEADING_QUANTITY','FAQ Count');

define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', 'Status');

define('TEXT_FAQ_CATEGORIES', 'FAQ Categories:');
define('TEXT_SUBFAQ_CATEGORIES', 'FAQ Subcategories:');
define('TEXT_FAQS', 'FAQs:');
define('TEXT_FAQS_AVERAGE_RATING', 'Average Rating:');

define('TEXT_DATE_ADDED', 'Date Added:');

define('TEXT_LAST_MODIFIED', 'Last Modified:');
define('TEXT_IMAGE_NONEXISTENT', 'IMAGE DOES NOT EXIST');
define('TEXT_NO_CHILD_FAQ_CATEGORIES_OR_FAQS', 'Please insert a new FAQ category or faq in this level.');
define('TEXT_FAQ_MORE_INFORMATION', 'For more information, please visit this faqs <a href="http://%s" target="blank">webpage</a>.');
define('TEXT_FAQ_DATE_ADDED', 'This faq was added to our site on %s.');


define('TEXT_EDIT_INTRO', 'Please make any necessary changes');
define('TEXT_EDIT_FAQ_CATEGORIES_ID', 'FAQ Category ID:');
define('TEXT_EDIT_FAQ_CATEGORIES_NAME', 'FAQ Category Name:');
define('TEXT_EDIT_FAQ_CATEGORIES_IMAGE', 'FAQ Category Image:');
define('TEXT_EDIT_SORT_ORDER', 'Sort Order:');

define('TEXT_INFO_COPY_TO_INTRO', 'Please choose a new FAQ category you wish to copy this faq to');
define('TEXT_INFO_CURRENT_FAQ_CATEGORIES', 'Current FAQ Categories: ');

define('TEXT_INFO_HEADING_NEW_FAQ_CATEGORY', 'New FAQ Category');
define('TEXT_INFO_HEADING_EDIT_FAQ_CATEGORY', 'Edit FAQ Category');
define('TEXT_INFO_HEADING_DELETE_FAQ_CATEGORY', 'Delete FAQ Category');
define('TEXT_INFO_HEADING_MOVE_FAQ_CATEGORY', 'Move FAQ Category');

define('BUTTON_ADD_FAQ_TYPES_SUBFAQ_CATEGORIES_ON', 'Add include FAQ SubCategories');
define('BUTTON_ADD_FAQ_TYPES_SUBFAQ_CATEGORIES_OFF', 'Add without FAQ SubCategories');
define('IMAGE_NEW_FAQ_CATEGORY', 'New FAQ Category');
define('IMAGE_NEW_FAQ', 'New FAQ');

define('TEXT_INFO_HEADING_DELETE_FAQ', 'Delete FAQ');
define('TEXT_INFO_HEADING_MOVE_FAQ', 'Move FAQ');
define('TEXT_INFO_HEADING_COPY_TO', 'Copy To');

define('TEXT_DELETE_FAQ_CATEGORY_INTRO', 'Are you sure you want to delete this FAQ category?');
define('TEXT_DELETE_FAQ_INTRO', 'Are you sure you want to permanently delete this faq?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNING:</b> There are %s (child-)FAQ categories still linked to this FAQ category!');
define('TEXT_DELETE_WARNING_FAQS', '<b>WARNING:</b> There are %s faqs still linked to this FAQ category!');

define('TEXT_MOVE_FAQS_INTRO', 'Please select which FAQ category you wish <b>%s</b> to reside in');
define('TEXT_MOVE_FAQ_CATEGORIES_INTRO', 'Please select which FAQ category you wish <b>%s</b> to reside in');
define('TEXT_MOVE', 'Move <b>%s</b> to:');

define('TEXT_NEW_FAQ_CATEGORY_INTRO', 'Please fill out the following information for the new FAQ category');
define('TEXT_FAQ_CATEGORIES_NAME', 'FAQ Category Name:');
define('TEXT_FAQ_CATEGORIES_IMAGE', 'FAQ Category Image:');
define('TEXT_SORT_ORDER', 'Sort Order:');

define('TEXT_FAQS_STATUS', 'Questions Status:');
define('TEXT_FAQS_VIRTUAL', 'FAQ is Virtual:');
define('TEXT_FAQS_IS_ALWAYS_FREE_SHIPPING', 'Always Free Shipping:');
define('TEXT_FAQS_QTY_BOX_STATUS', 'FAQs Quantity Box Shows:');
define('TEXT_FAQS_DATE_AVAILABLE', 'Date Available:');
define('TEXT_FAQ_AVAILABLE', 'In Stock');
define('TEXT_FAQ_NOT_AVAILABLE', 'Out of Stock');
define('TEXT_FAQ_IS_VIRTUAL', 'Yes, Skip Shipping Address');
define('TEXT_FAQ_NOT_VIRTUAL', 'No, Shipping Address Required');
define('TEXT_FAQ_IS_ALWAYS_FREE_SHIPPING', 'Yes, Always Free Shipping');
define('TEXT_FAQ_NOT_ALWAYS_FREE_SHIPPING', 'No, Normal Shipping Rules');

define('TEXT_FAQS_QTY_BOX_STATUS_ON', 'Yes, Show Quantity Box');
define('TEXT_FAQS_QTY_BOX_STATUS_OFF', 'No, Do not show Quantity Box');

define('TEXT_FAQS_MANUFACTURER', 'FAQs Manufacturer:');
define('TEXT_FAQS_NAME', 'FAQs Name:');
define('TEXT_FAQS_CONTACT_NAME', 'FAQs Contact Name:');
define('TEXT_FAQS_CONTACT_MAIL', 'FAQs Contact_mail:');
define('TEXT_FAQS_DESCRIPTION', 'FAQs Description:');
define('TEXT_FAQS_ANSWER', 'FAQs Answer:');
define('TEXT_FAQS_NOTIFY_CONTACT', 'Notify Question Owner:');
define('TEXT_FAQS_QUANTITY', 'FAQs Quantity:');
define('TEXT_FAQS_MODEL', 'FAQs Model:');
define('TEXT_FAQS_IMAGE', 'FAQs Image:');
define('TEXT_FAQS_IMAGE_DIR', 'Upload to directory:');
define('TEXT_FAQS_URL', 'FAQs URL:');
define('TEXT_FAQS_URL_WITHOUT_HTTP', '<small>(without http://)</small>');
define('EMPTY_FAQ_CATEGORY', 'Empty FAQ Category');

define('TEXT_HOW_TO_COPY', 'Copy Method:');
define('TEXT_COPY_AS_LINK', 'Link faq');
define('TEXT_COPY_AS_DUPLICATE', 'Duplicate faq');

define('TEXT_RESTRICT_FAQ_TYPE', 'Restrict to FAQ Type');
define('TEXT_FAQ_CATEGORY_HAS_RESTRICTIONS', 'This FAQ Category has been restricted to these FAQ Types');
define('ERROR_CANNOT_ADD_FAQ_TYPE','The specified faq type cannot be added to this FAQ category. Check your FAQ category restrictions.');

define('ERROR_CANNOT_LINK_TO_SAME_FAQ_CATEGORY', 'Error: Can not link faqs in the same FAQ category.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: Catalog images directory is not writeable: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: Catalog images directory does not exist: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_FAQ_CATEGORY_TO_PARENT', 'Error: FAQ Category cannot be moved into child FAQ category.');
define('ERROR_CANNOT_MOVE_FAQ_TO_FAQ_CATEGORY_SELF', 'Error: Cannot move faq to the same FAQ category or into a FAQ category where it already exists.');

// FAQs and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','Only used for Duplicate FAQs ...');
  define('TEXT_COPY_ATTRIBUTES','Copy FAQ Attributes to Duplicate?');
  define('TEXT_COPY_ATTRIBUTES_YES','Yes');
  define('TEXT_COPY_ATTRIBUTES_NO','No');

  define('TEXT_INFO_CURRENT_FAQ', 'Current FAQ: ');
  define('TABLE_HEADING_MODEL', 'Model');

  define('TEXT_FAQ_CATEGORIES_IMAGE_DIR','Upload to directory:');
  define('TEXT_FAQ_OPTIONS', '<strong>Please Choose:</strong>');
  define('TEXT_ANY_TYPE', 'Any Type');
  define('TABLE_HEADING_FAQ_TYPES', 'FAQ Type(s)');

// FAQ categories status
define('TEXT_INFO_HEADING_STATUS_FAQ_CATEGORY', 'Change FAQ Category Status for:');
define('TEXT_FAQ_CATEGORIES_STATUS_INTRO', 'Change the FAQ Category Status to: ');
define('TEXT_FAQ_CATEGORIES_STATUS_OFF', 'OFF');
define('TEXT_FAQ_CATEGORIES_STATUS_ON', 'ON');
define('TEXT_FAQS_STATUS_INFO', 'Change ALL FAQ Status to: ');
define('TEXT_FAQS_STATUS_OFF', 'OFF');
define('TEXT_FAQS_STATUS_ON', 'ON');
define('TEXT_FAQS_STATUS_NOCHANGE', 'Unchanged');
define('TEXT_FAQ_CATEGORIES_STATUS_WARNING', '<strong>WARNING ...</strong><br />Note: Disabling a FAQ category will disable all faqs in this FAQ category. Linked faqs located in this FAQ category that are shared with other FAQ categories will also be disabled.');
define('TEXT_DISPLAY_NUMBER_OF_FAQS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> FAQs)');
define('TEXT_FAQS_STATUS_ON_OF',' of ');
define('TEXT_FAQS_STATUS_ACTIVE',' active ');

define('TEXT_FAQ_CATEGORIES_DESCRIPTION', 'FAQ Categories Description:');
define('TABLE_HEADING_FAQ_MANAGER_CONFIGURATION', 'Help Center Configuration');
define('TABLE_HEADING_FAQ_MANAGER_SUPPORT', 'Help Center Support');
?>
