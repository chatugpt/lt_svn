<?php
/**
 * Common Template - tpl_columnar_display.php
 *
 * This file is used for generating tabular output where needed, based on the supplied array of table-cell contents.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_columnar_display.php 3157 2006-03-10 23:24:22Z drbyte $
 */

?>
<div id="f_product"><h3 class="in_1em line_30px"><?php if ($title) {echo $title;} ?></h3>
<?php echo zen_define_page_content('featured products模块简单页'); ?>

</div>
<div id="reco_product" class="fr"><ul>
<?php
if (is_array($list_box_contents) > 0 ) {
	$list_box_contentsNum = count($list_box_contents);
 for($row=0;$row<$list_box_contentsNum;$row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
    $tempNum = count($list_box_contents[$row]);
    for($col=0;$col< $tempNum;$col++) {
       echo '<li>' . $list_box_contents[$row][$col]['text'] .  '</li>' . "\n";
      }
    unset($tempNum);
   }
?>
<br class="clear" />
<?php
  }
?>
</ul></div>
