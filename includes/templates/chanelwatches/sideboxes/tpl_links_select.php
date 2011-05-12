<?php
/**
 * Links Select Sidebox Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_links_select.php 3.4.0 3/27/2008 Clyde Jones $
 */
  $content = "";
  $linkNum = sizeof($links_array);
  for ($i = 0; $i<$linkNum;$i++){
    $content .= '<a class="pad_1em" href="'.$links_array[$i]['link'].'">'.$links_array[$i]['text'].'</a>';
  }

?>