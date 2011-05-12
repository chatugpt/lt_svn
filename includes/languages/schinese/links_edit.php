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
//  Original contrib by Vijay Immanuel for osCommerce, converted to zen by dave@open-operations.com - http://www.open-operations.com
//  $Id: links_manager.php 2004-11-19 dave@open-operations.com
//
define('NAVBAR_TITLE', 'Edit Your Link');
define('NAVBAR_TITLE_1', 'Links');
define('NAVBAR_TITLE_2', 'Edit Your Link');
define('HEADING_TITLE', 'Link Information');
define('CATEGORY_CONTACT', 'Contact Information');
define('TEXT_MAIN', 'Please fill out the following form to submit your website.');
define('EMAIL_SUBJECT', 'Welcome to ' . STORE_NAME . ' link exchange.');
define('EMAIL_GREET_NONE', 'Dear %s' . "\n\n");
define('EMAIL_WELCOME', 'We welcome you to the <b>' . STORE_NAME . '</b> link exchange program.' . "\n\n");
define('EMAIL_TEXT', 'Your link has been successfully submitted at ' . STORE_NAME . '. It will be added to our listing as soon as we approve it. You will receive an email about the status of your submittal. If you have not received it within the next 48 hours, please contact us before submitting your link again.' . "\n\n");
define('EMAIL_CONTACT', 'For help with our link exchange program, please email the store-owner: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> This email address was given to us during a link submittal. If you have a problem, please send an email to ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_OWNER_SUBJECT', 'Link submittal at ' . STORE_NAME);
define('EMAIL_OWNER_TEXT', 'A new link was submitted at ' . STORE_NAME . '. It is not yet approved. Please verify this link and activate.' . "\n\n");
define('TEXT_LINKS_HELP_LINK', '&nbsp;Help&nbsp;[?]');
define('HEADING_LINKS_HELP', 'Links Help');
define('TEXT_LINKS_HELP', '<b>Site Title:</b> A descriptive title for your website.<br><br><b>URL:</b> The absolute web address of your website, including the \'http://\'.<br><br><b>Category:</b> Most appropriate category under which your website falls.<br><br><b>Description:</b> A brief description of your website.<br><br><b>Image URL:</b> The absolute URL of the image you wish to submit, including the \'http://\'. This image will be displayed along with your website link.<br>Eg: http://your-domain.com/path/to/your/image.gif <br><br><b>Full Name:</b> Your full name.<br><br><b>Email:</b> Your email address. Please enter a valid email, as you will be notified via email.<br><br><b>Reciprocal Page:</b> The absolute URL of your links page, where a link to our website will be listed/displayed.<br>Eg: http://your-domain.com/path/to/your/links_page.php');
define('TEXT_CLOSE_WINDOW', '<u>Close Window</u> [x]');
define('CATEGORY_WEBSITE', 'Website Details');
define('CATEGORY_RECIPROCAL', 'Reciprocal Page Details');
define('ENTRY_LINKS_TITLE', 'Site Title:');
define('ENTRY_LINKS_TITLE_ERROR', 'Link title must contain a minimum of ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_TITLE_TEXT', '*');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'URL must contain a minimum of ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_URL_TEXT', '*');
define('ENTRY_LINKS_CATEGORY', 'Category:');
define('ENTRY_LINKS_CATEGORY_TEXT', '*');
define('ENTRY_LINKS_DESCRIPTION', 'Description:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'Description must contain a minimum of ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_DESCRIPTION_TEXT', '*');
define('ENTRY_LINKS_IMAGE', 'Image URL:');
define('ENTRY_LINKS_IMAGE_TEXT', '');
define('ENTRY_LINKS_CONTACT_NAME', 'Full Name:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Your Full Name must contain a minimum of ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_CONTACT_NAME_TEXT', '*');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Reciprocal Page:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Reciprocal page must contain a minimum of ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_RECIPROCAL_URL_TEXT', '*');
define('SUCCESS_LINK_UPDATED', 'Your Link Has Been Updated');
define('NO_EDIT_LINK_PERMISSIONS', 'You do not have permission to edit this link');
?>