<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: faq_manager.php 001 2005-05-05 dave@open-operations.com
//
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="productListing-data">
<?php
  $list_box_contents = count($list_box_contents);
  for($row=0;$row<$list_box_contents;$row++) {
    $params = "";
    if ($list_box_contents[$row]['align']) $params = 'align = "' . $list_box_contents[$row]['align']. '"';
    if ($list_box_contents[$row]['params']) $params .= ' ' . $list_box_contents[$row]['params'];
?>
  <tr <?php echo $params; ?>>
<?php
    $tempNum = count($list_box_contents[$row]);
    for($col=0;$col< $tempNum;$col++) {
      $r_params = "";
      if ($list_box_contents[$row][$col]['align']) $r_params = 'align="' . $list_box_contents[$row][$col]['align']. '"';
      if ($list_box_contents[$row][$col]['params']) $r_params .= ' ' . $list_box_contents[$row][$col]['params'];
      if ($list_box_contents[$row][$col]['text']) {
?>
    <td <?php echo $r_params; ?>>
<?php
      echo $list_box_contents[$row][$col]['text']
?>
    </td>
<?php
      }
    }
    unset($tempNum);
?>
  </tr>
<?php
  }
?> 
</table>
