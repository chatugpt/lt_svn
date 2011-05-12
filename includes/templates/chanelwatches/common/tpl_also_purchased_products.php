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
<?php
  if ($title) {
  ?>
<?php echo $title; ?>
<?php
 }
 ?>
<?php
//var_dump($list_box_contents);

if (is_array($list_box_contents) > 0 ) {
  echo '<ul class="top_selling">';
  $list_box_contentsNum = count($list_box_contents);
  for($row=0;$row<$list_box_contentsNum;$row++) {
    $params = '';
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<?php
    $tempNum = count($list_box_contents[$row]);
    for($col=0;$col<$tempNum;$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
      if (isset($list_box_contents[$row][$col]['text'])) {
?>
    <?php echo $list_box_contents[$row][$col]['text']."\n"; ?>
<?php
      }
    }
    unset($tempNum);
?>
<br class="clear" />
<?php
  }
  echo '</ul>';
}
?> 
