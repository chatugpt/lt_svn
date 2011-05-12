<?php
/**
 * flash slideshow sidebox 
 *
 * @package templateSystem
 * @copyright 2008 warehousetoyou.net
  * @copyright Portions Copyright 2003-2007 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: flash_sidebox.php 2008-03-26 warehousetoyou $
  * @version $Id: blank_sidebox.php 2007-05-26 kuroi $
 * SWFObject 2.0 Is an open source project by Geoff Stearns, Michael Williams, and Bobby van der Sluis, http://code.google.com/p/swffix/
 */

  $content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
  $content .= '<div class="zenLightboxHideMe">';
  $content .= '<script type="text/javascript">';
  $content .= 'swfobject.embedSWF("flash/Slideshow.swf", "myContent", "535", "180", "8.0.0");';
  $content .= '</script>';
  //The following lines is where the flash file will end up, 'myContent'.  Replace 'Alternative content' with an alternate link or something else.
  // this way even if they don't have flash or javascript they will see something. Also good for the search engines!
  $content .= '<div id="myContent"><p>Alternative content</p></div></div></div>';

?>