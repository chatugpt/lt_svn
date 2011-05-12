<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_main_product_image.php 3208 2006-03-19 16:48:57Z birdbrain $
 //caizhouqing update pro_show_left_pic
 */
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE)); ?>

<link rel="stylesheet" type="text/css" href="includes/templates/chanelwatches/css/pic_vImageBox.css">

<script type="text/javascript" src="includes/templates/chanelwatches/jscript/pic_vJquery.js"></script>
<script type="text/javascript" src="includes/templates/chanelwatches/jscript/pic_vJqueryImages.js"></script>
<div id="product_flash" style="width: 335px;" class="fl margin_t g_t_c">
	<ul>
		<li>
		<?php
		if(!is_array($products_image_medium)){
		$products_image_large = array($products_image_large);
		$products_image_medium = array($products_image_medium);
		$products_image_small = array($products_image_small);
		}
		
		//print_r($products_image_small);
		
		if(is_array($products_image_medium)){
		echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . $products_image_large[0]. '" class="ih" id="product_flash_show" target="_blank">' . zen_image_OLD($products_image_medium[0], addslashes($products_name), '280', '280','id="product_flash_show_i" class="relative"') . '</a>'; 
		}
		?>
		<?php
		//check whether jqzoom
		if(MEDIUM_IMAGE_JQZOOM == 'yes') {
		?>
		<link rel="stylesheet" type="text/css" href="includes/templates/chanelwatches/jscript/jqzoom_ev1.0.1/css/jqzoom.css" />
		<script type="text/javascript" src="includes/templates/chanelwatches/jscript/jqzoom_ev1.0.1/js/jqzoom.pack.1.0.1.js"></script>
		<script type="text/javascript">
		$('#product_flash_show').jqzoom();
		</script>
		<?php
		}
		?>
		</li>
	</ul>
	<ul>
<span class="p_f_en"> <a href="<?php echo zen_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $_GET['products_id']); ?>" id="product_flash_show_a" onclick="return popupwin(this.href,'popup_image',500,580,'resizable=0,scrollbars=0,toolbar=0,status=0')">View Larger Image</a> </span><br>
<br>

		</span>
	</ul>	
	<ul id="product_flash_btn2">	
		<li class="product_list_li">
			<div class="product_list_li_l" next="l" title="Back"></div>
			<div class="product_list_li_c">
				<ul class="product_list_li_ul">
<?php
$products_image_mediumNum = count($products_image_medium);
for($i = 0 ;$i <$products_image_mediumNum; $i++){
?>
<li>
<a href=""><img src="<?php echo HTTP_SERVER . DIR_WS_CATALOG . $products_image_small[$i]; ?>" title="<?php echo $products_name;?>" alt="<?php echo $products_image_large[$i];?>" num="<?php echo $i;?>" imgsize="280" class="<?php if($i==0){echo "li_img01";}?>" imgb="/<?php echo $products_image_medium[$i]; ?>" border="0" width="42" height="42"></a>
</li>  
<?php }?>
			 </ul>
			</div>
			<div class="product_list_li_r" next="r" title="next"></div>
		</li>
		<li><span class="g_t_c">Displaying <span class="product_list_text">1/2</span></span></li>
	</ul>	
	<script type="text/javascript">
		var obj1=new ls("#product_flash_show","#product_flash_btn2");  
		obj1.init();
	</script>
</div>