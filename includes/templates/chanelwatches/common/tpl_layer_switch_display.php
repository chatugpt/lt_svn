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
<div id="boxswitch" class="">		    
      <div title="BestDeal" class="on"><a href="<?php echo zen_href_link(FILENAME_BEST_DEAL); ?>"><span><?php if ($specials_title) {echo $specials_title;} ?></span></a></div>
      <div title="FreeShipping" id="border_left" class="off"><a href="<?php echo zen_href_link(FILENAME_FREE_SHIPPING); ?>"><span><?php if ($free_title) {echo $free_title;} ?></span></a></div>
      <div title="NewArrivals" id="border_left" class="off"><a href="<?php echo zen_href_link(FILENAME_PRODUCTS_NEW); ?>"><span><?php if ($title) {echo $title;} ?></span></a></div>
</div>

<div id="BestDeal" class="show">
<ul>
<?php
if (is_array($specials_list_box_contents) > 0 ) {
	$specialsNum = count($specials_list_box_contents);
  for($row=0;$row<$specialsNum;$row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<?php
    $tempNum = count($specials_list_box_contents[$row]);
    for($col=0;$col<$tempNum;$col++) {
      $r_params = "";
      if (isset($specials_list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$specials_list_box_contents[$row][$col]['params'];
     if (isset($specials_list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<li' . $r_params . '>' . $specials_list_box_contents[$row][$col]['text'] .  '</li>' . "\n"; ?>
<?php
      }
    }
    unset($tempNum);
?>
<br class="clear" />
<?php
  }
}
?> 

</ul>
</div>

<div id="FreeShipping" class="hide">
<ul>
<?php
if (is_array($free_list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($free_list_box_contents);$row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<?php
    for($col=0;$col<sizeof($free_list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($free_list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$free_list_box_contents[$row][$col]['params'];
     if (isset($free_list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<li' . $r_params . '>' . $free_list_box_contents[$row][$col]['text'] .  '</li>' . "\n"; ?>
<?php
      }
    }
?>
<br class="clear" />
<?php
  }
}
?> 

</ul>
</div>


<div id="NewArrivals" class="hide">
<ul>
<?php
if (is_array($list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<?php
    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<li' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</li>' . "\n"; ?>
<?php
      }
    }
?>
<br class="clear" />
<?php
  }
}
?> 

</ul>
</div>


