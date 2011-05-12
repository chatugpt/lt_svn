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
<!--// bof: box_categories //-->
<div class="allborder margin_t bg_box_gray pad_bottom big" id="category_menu">
  <h3 class="in_1em line_30px" id=""><?php echo $title; ?></h3>
  <h4 class="gray line_30px in_1em"><?php echo $subtitle; ?></h4>
			<?php echo $content; ?>
			
	<?php if ($categories_displayTypes == 2 || $current_products_list) {?>
  <h4 class="gray line_30px in_1em">Price</h4>
  	<ul class="pad_1em">
  	  <?php echo $priceListOutString; ?>
  	</ul>
	<?php
	$price_a=str_replace("0.00","",$currencies->display_price(0,0));
	?>
	<ul>
	<form action="" method="get">
	<li style="margin-left:4px;"><?php echo $price_a;?><input name="min_price" id="min_price" size="2" />To  <?php echo $price_a;?><input name="max_price" id="max_price" size="2" /> 
	<button onclick="javascript:submit()">Go</button>
	<input name="" type="submit" value="Go" style="display:none;" />
	</li>
	</form>
	</ul>
  <?php } ?>
  		<?php //print_r(zen_parse_category_path($cPath)); ?>
</div>
<!--// eof: box_categories //-->

