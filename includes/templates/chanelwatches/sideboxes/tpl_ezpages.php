<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_ezpages.php 2982 2006-02-07 07:56:41Z birdbrain $
 */
  $content = "";
  $content .= '<div class="pad_10px pad_t"><ul class="red_arrow_list">';
  for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {
		if(is_int(strpos($var_linksList[$i]['link'],$current_page))){
    $content .= '<li><a href="' . $var_linksList[$i]['link'] . '" class="red b">' . $var_linksList[$i]['name'] . '</a></li>' . "\n" ;
		}else{
    $content .= '<li><a href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a></li>' . "\n" ;
		}
  } // end FOR loop
  $content  .= '</ul></div>' . "\n";
?>