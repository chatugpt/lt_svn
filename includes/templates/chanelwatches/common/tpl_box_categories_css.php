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
<!--// bof: <?php echo $box_id; ?> //-->
<div id="left_menu">
<ul id="menu_index_top"><li><a title="See All Categories" target="_top" id="<?php echo str_replace('_', '-', $box_id) . 'Heading'; ?>" href="<?php echo zen_href_link(FILENAME_SEE_ALL);?>"><span><?php echo $title;?></span></a></li></ul>
<?php echo $content; ?>
<div class="clear"></div>
</div>
<!--// eof: <?php echo $box_id; ?> //-->

