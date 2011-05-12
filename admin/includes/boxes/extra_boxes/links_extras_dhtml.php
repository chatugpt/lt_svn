<?php
/**
*@Links Manager
*
* @package admin
* @copyright (c)2006-2008 Clyde Jones
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
*@version $Id: links_extras_dhtml.php 3/27/2008 Clyde Jones
*/
if (!defined('IS_ADMIN_FLAG')) {
die('Illegal Access');
}  
  $za_contents[] = array('text' => BOX_LINKS, 'link' => zen_href_link(FILENAME_LINKS, '', 'NONSSL'));
  $za_contents[] = array('text' => BOX_LINK_CATEGORIES, 'link' => zen_href_link(FILENAME_LINK_CATEGORIES, '', 'NONSSL'));
  $za_contents[] = array('text' => BOX_LINKS_CONTACT, 'link' => zen_href_link(FILENAME_LINKS_CONTACT, '', 'NONSSL'));
?>