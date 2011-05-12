<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_best_sellers.php 2982 2006-02-07 07:56:41Z birdbrain $
 */
  $content = '';
  $content .= '<table>' . "\n";
  for ($i=1; $i<=sizeof($bestsellers_list); $i++) {
		$content .= '<tr><td width="10">';
		$content .= $i;
    $content .= '</td><td width="45"><a href="' . zen_href_link(zen_get_info_page($bestsellers_list[$i]['id']), 'products_id=' . $bestsellers_list[$i]['id']) . '">'.zen_image(DIR_WS_IMAGES . $bestsellers_list[$i]['products_image'], $bestsellers_list[$i]['name'], 42, 42 ,'align="absmiddle"') .'</a></td><td><span class="line_120"><a href="' . zen_href_link(zen_get_info_page($bestsellers_list[$i]['id']), 'products_id=' . $bestsellers_list[$i]['id']) .'">'. zen_trunc_string($bestsellers_list[$i]['name'], BEST_SELLERS_TRUNCATE, BEST_SELLERS_TRUNCATE_MORE) . '</a><strong class="red"><br/>'.$bestsellers_list[$i]['products_price'].'</strong></span></td></tr>' . "\n";
  }
  $content .= '</table>';
?>