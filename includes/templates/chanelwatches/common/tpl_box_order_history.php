<?php
/**
 * Common Template - tpl_box_default_right.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_right.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
//
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div class="allborder pad_1em">
<h3 class="line_30px"><?php echo $title; ?></h3>
<?php echo $content; ?>
</div>
<script>
 //marquee(3000,70,0,'recentlyorder');
 new srcMarquee("recentlyorder",0,2,180,210,30,3000,3000,70)
</script>
<!--// eof: <?php echo $box_id; ?> //-->

