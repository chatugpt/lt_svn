<?php
/*
//////////////////////////////////////////////////////////
//  EMAIL ARCHIVE SEARCH                                //
//  Version 1.0                                         //
//                                                      //
//  By Frank Koehl  (PM: BlindSide)                     //
//  Support by DrByte                                   //
//                                                      //
//  Powered by Zen-Cart (www.zen-cart.com)              //
//  Portions Copyright (c) 2005 The Zen-Cart Team       //
//                                                      //
//  Released under the GNU General Public License       //
//  available at www.zen-cart.com/license/2_0.txt       //
//  or see "license.txt" in the downloaded zip          //
//////////////////////////////////////////////////////////
*/

define('SUBJECT_SIZE_LIMIT', 25);
define('MESSAGE_SIZE_LIMIT', 550);
define('MESSAGE_LIMIT_BREAK', '...');

define('HEADING_TITLE', 'E-mail Archive Manager');
define('HEADING_SEARCH_INSTRUCT', 'You may search by any combination of the following criteria...');

define('HEADING_MODULE_SELECT', 'Filter by module');
define('HEADING_SEARCH_TEXT', 'Search for text');
define('HEADING_SEARCH_TEXT_FILTER', 'Current search filter: ');
define('HEADING_START_DATE', 'Start Date');
define('HEADING_END_DATE', 'End Date');
define('HEADING_PRINT_FORMAT', 'Display results in print format');
define('HEADING_TRIM_INSTRUCT', 'Delete e-mail older than...');

define('TABLE_HEADING_EMAIL_DATE', 'Date Sent');
define('TABLE_HEADING_CUSTOMERS_NAME', 'Customer\'s Name');
define('TABLE_HEADING_CUSTOMERS_EMAIL', 'Email Address');
define('TABLE_HEADING_EMAIL_FORMAT', 'Format');
define('TABLE_HEADING_EMAIL_SUBJECT', 'Subject');
define('TABLE_FORMAT_TEXT', 'TEXT');
define('TABLE_FORMAT_HTML', 'HTML');

define('TEXT_TRIM_ARCHIVE', 'Trim e-mail archive...');
define('TEXT_ARCHIVE_ID', 'Archive #');
define('TEXT_ALL_MODULES', 'All Modules');
define('TEXT_DISPLAY_NUMBER_OF_EMAILS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> emails)');
define('TEXT_EMAIL_MODULE', 'Module: ');
define('TEXT_EMAIL_TO', 'To: ');
define('TEXT_EMAIL_FROM', 'From: ');
define('TEXT_EMAIL_DATE_SENT', 'Sent: ');
define('TEXT_EMAIL_SUBJECT', 'Subject: ');
define('TEXT_EMAIL_EXCERPT', 'Message Excerpt:');
define('TEXT_EMAIL_NUMBER', 'Email #');

define('RADIO_1_MONTH', ' 1 month');
define('RADIO_6_MONTHS', ' 6 months');
define('RADIO_1_YEAR', ' 12 months');
define('TRIM_CONFIRM_WARNING', 'Warning: This will permanently remove e-mail from the archive.<br />Are you sure?');
define('POPUP_CONFIRM_RESEND', 'Are you sure you want to resend this message?');
define('POPUP_CONFIRM_DELETE', 'Are you sure you want to delete this message?');
define('SUCCESS_TRIM_ARCHIVE', 'Success: E-mail older than <strong>%s</strong> has been removed');
define('SUCCESS_EMAIL_RESENT', 'Success: E-mail #%s has been resent to %s');

define('IMAGE_ICON_HTML', ' View HTML Message ');
define('IMAGE_ICON_TEXT', ' View Text Message ');
define('IMAGE_ICON_RESEND', ' Resend Message ');
define('IMAGE_ICON_EMAIL', ' Email Recipient ');
define('IMAGE_ICON_DELETE', ' Delete Message ');

define('BUTTON_SEARCH', 'Search Archive');
define('BUTTON_TRIM_CONFIRM', 'Delete e-mail');
define('BUTTON_CANCEL', 'Cancel');
?>
