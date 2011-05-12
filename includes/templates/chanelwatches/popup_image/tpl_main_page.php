<?php
/**
 * Override Template for common/tpl_main_page.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_main_page.php 2993 2006-02-08 07:14:52Z birdbrain $
 */

?>
<?php
if(is_array($products_image_medium)){
?>
<body id="popuplargerimageBody" style="margin:0;padding:0;">
<div style="display: none;" id="pop_window"> </div>
<div id="ZoomBox" class="fl">
<?php
    echo zen_image_OLD($products_image_large[0], addslashes($products_name), '500', '500','id="ZoomBox_i" class="relative" ') ; ?>

    <ul id="smallImgBtns" style=" background:#eeeeee;margin:0; padding:0; padding:0; padding-top:7px;">
  <?php
  $products_image_mediumNum = count($products_image_medium);
  for($i = 0 ;$i < $products_image_mediumNum;$i++){
  ?>
      <li class="border_r"><img src="<?php echo HTTP_SERVER . DIR_WS_CATALOG . $products_image_small[$i]; ?>" border="0"  title="<?php echo $products_image_large[$i];?>" alt="<?php echo $products_image_large[$i];?>" width="42" height="42" num="<?php echo $i;?>" imgSize="280" big="<?php echo HTTP_SERVER . DIR_WS_CATALOG . $products_image_large[$i]; ?>"/></li>
  <?php
  }
  ?>
    </ul>
	<script type="text/javascript" src="includes/modules/pages/product_info/jscript_productZoom.js"></script>

    <script type="text/javascript">
		initBtn('smallImgBtns','ZoomBox');
	</script>
</div>
 </body>   
<?php
  }else{
?>
  <body id="popupImage" class="centeredContent" onLoad="resize();">
   <a href="javascript:window.close()" target="_self"> <?php echo zen_image_OLD($products_image_large, addslashes($products_name) . ' ' . TEXT_CLOSE_WINDOW); ?> </a> 
  </body>
<?php
  }
?>


