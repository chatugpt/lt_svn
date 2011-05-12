<?php
/**
 * Common Template - tpl_box_default_left.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_left.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
//
?>
<!--// bof: recently viewed //-->

<div class="right_big_con allborder margin_t" id="<?php echo str_replace('_', '-', $box_id ); ?>">
<h4 class="gray_bg in_1em line_180"><?php echo $title; ?></h4>
<?php echo $content; ?>
</div>
<!--// eof: recently viewed //-->

