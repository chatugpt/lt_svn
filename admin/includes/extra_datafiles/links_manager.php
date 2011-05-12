<?php
/**
*@Links Manager
*
* @package admin
* @copyright (c)2006-2008 Clyde Jones
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
*@version $Id: links_manager.php 3/27/2008 Clyde Jones
*/

  define('FILENAME_LINKS', 'links');
  define('FILENAME_LINK_CATEGORIES', 'link_categories');
  define('FILENAME_LINKS_CONTACT', 'links_contact');
  define('TABLE_LINK_CATEGORIES', DB_PREFIX . 'link_categories');
  define('TABLE_LINK_CATEGORIES_DESCRIPTION', DB_PREFIX . 'link_categories_description');
  define('TABLE_LINKS', DB_PREFIX . 'links');
  define('TABLE_LINKS_DESCRIPTION', DB_PREFIX . 'links_description');
  define('TABLE_LINKS_TO_LINK_CATEGORIES', DB_PREFIX . 'links_to_link_categories');
  define('TABLE_LINKS_STATUS', DB_PREFIX . 'links_status');
?>