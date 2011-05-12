<?php
/**
 * Links Submit Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_links_submit_default.php 3.4.0 3/27/2008 Clyde Jones $
 */

 /*  BOF Link page defines - Clyde Jones*/

define('BOX_HEADING_LINK_CATEGORIES', 'Links');
define('BOX_INFORMATION_LINKS_SUBMIT', 'Submit Link');
define('BOX_INFORMATION_VIEW_ALL_LINKS', 'View All Links');

define('BUTTON_IMAGE_SUBMIT_LINK', 'button_submit_link.gif');
define('BUTTON_SUBMIT_LINK_ALT', 'submit link');

define('BUTTON_IMAGE_LINK_HELP', 'button_link_help.gif');
define('BUTTON_LINK_HELP_ALT', 'Link Help');


 /*  EOF Link page defines - Clyde Jones*/

 /* BOF Links Submit Form definitions */
 
define('CATEGORY_CONTACT', 'Contact Information');
define('CATEGORY_WEBSITE', 'Website Details');
define('CATEGORY_RECIPROCAL', 'Reciprocal Page Details');
define('ENTRY_LINKS_TITLE', 'Site Title:');
define('ENTRY_LINKS_TITLE_ERROR', 'Link title must contain a minimum of ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_TITLE_TEXT', '*');
define('ENTRY_LINKS_URL', 'Site URL:');
define('ENTRY_LINKS_URL_ERROR', 'URL must contain a minimum of ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_URL_TEXT', '*');
define('ENTRY_LINKS_CATEGORY', 'Link Category:');
define('ENTRY_LINKS_CATEGORY_TEXT', '*');
define('ENTRY_LINKS_DESCRIPTION', 'Description:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'Description must contain a minimum of ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_DESCRIPTION_TEXT', '*');
define('ENTRY_LINKS_BANNER', 'Banner Image:');
define('ENTRY_LINKS_BANNER_TEXT', '(Optional)');
define('ENTRY_LINKS_CONTACT_NAME', 'Full Name:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Your Full Name must contain a minimum of ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_CONTACT_NAME_TEXT', '*');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Reciprocal Page:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Reciprocal page must contain a minimum of ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_RECIPROCAL_URL_TEXT', '*');
define('WARNING_DEFAULT_FILE_UPLOADED', 'The ' . STORE_NAME . ' default Links Banner will be used for this link.');

 /* EOF Links Submit Form definitions */ 
?>