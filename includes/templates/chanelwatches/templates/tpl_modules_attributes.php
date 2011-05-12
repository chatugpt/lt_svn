<?php
/**
 * Module Template
 *
 * Template used to render attribute display/input fields
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_attributes.php 3208 2006-03-19 16:48:57Z birdbrain $
 */
?>
<script>
function change_attr(){
	if (!$_('r_attr')) return ''; 
	if($_('chk_r_attr').checked == true){
		$_('r_attr').style.display = "block";
		$_('attrib-2').disabled = "disabled";
	}else if($_('chk_r_attr').checked == false){
		$_('r_attr').style.display = "none";
		$_('attrib-2').disabled = "";
	}
}
</script>
<style type="text/css">
#r_attr {
background:#F0F0F0 none repeat scroll 0 0;
padding:5px;
}
</style>
<ul id="attach" class="margin_t">
<?php if ($zv_display_select_option > 0) { ?>
<h4 class="pad_3 dark_bg g_t_c allborder font_normal"><?php echo TEXT_PRODUCT_OPTIONS; ?></h4>
<?php } // show please select unless all are readonly ?>

<?php
    $options_nameNum = count($options_name);
    for($i=0;$i < $options_nameNum;$i++) {
?>
		<?php
      if ($options_comment[$i] != '' && $options_comment_position[$i] == '0' && !strchr($options_name[$i],'Bust')) {
    ?>
      <br class="clear"/>
      <?php if ($options_name[$i] != 'Features'){ ?>
	    <h4 class="pad_5 dark_bg g_t_c allborder font_normal"><?php echo $options_comment[$i]; ?></h4>
	    <?php } ?>
    <?php
      }
    ?>
		<?php if(!strchr($options_name[$i],'Bust') && !strchr($options_name[$i],'Waist') && !strchr($options_name[$i],'Hips') && !strchr($options_name[$i],'Hollow to Hem')) {?>
		<div class="pad_3 big allborder no_border_t">
		<?php if ($options_name[$i] != 'Features'){ ?>
<div style="width: 80px;" class="fl"><?php echo $options_name[$i]; ?></div><?php } ?><div class="back">
	  <?php echo $options_menu[$i];?>
	  	  	<?php if(strchr($options_name[$i],'Size')){?>
			    <div id="r_attr_div" style="display:none"><?php echo $options_name[$i]; ?></div>
			 	<input id="chk_r_attr" type="checkbox" onclick="change_attr('attrib-<?php echo $options_index[$i]?>');" readonly="readonly"/>
				<label for="chk_r_attr">Custom size (Inch)</label>
		<?php }?>
		</div>
	  	<?php if(strchr($options_name[$i],'Size')){?>
				<table id="r_attr" style="display: none; width:352px;">
					<tr>
					<td class="line_120 b" colspan="2">
					Fill in your details to get your item specially tailor-made for you. Please note a
					<span id="xiaohong"> US$ <?php echo SIZE_SUBSIDIARY_PRICE;?> </span>
					fee applies.
					</td>
					</tr>
					<tr>
					<td width="50%" arrt_tmp="1">
					<span class="fl">Bust :</span>
					<input id="attrib-10-0" class="fl" type="text" value="" maxlength="3" size="3" name="id[TEXT_PREFIXBUST]" rel="1" price="0"/>
					</td>
					<td width="50%" arrt_tmp="1">
					<span class="fl">Waist :</span>
					<input id="attrib-9-0" class="fl" type="text" value="" maxlength="3" size="3" name="id[TEXT_PREFIXWAIST]" rel="1" price="0"/>
					</td>
					</tr>
					<tr>
					<td width="50%" arrt_tmp="1">
					<span class="fl">Hips :</span>
					<input id="attrib-11-0" class="fl" type="text" value="" maxlength="3" size="3" name="id[TEXT_PREFIXHIPS]" rel="1" price="0"/>
					</td>
					<td width="50%" arrt_tmp="1">
					<span class="fl">Hollow to Hem :</span>
					<input id="attrib-12-0" class="fl" type="text" value="" maxlength="3" size="3" name="id[TEXT_PREFIXHOLLOW_TO_HEM]" rel="1" price="0"/>
					</td>
					</tr>
				</table>
		<?php }?>
		</div>
		<?php if ($options_comment[$i] != '' and $options_comment_position[$i] == '1') { ?>
		    <div class="ProductInfoComments"><?php echo $options_comment[$i]; ?></div>
		<?php } ?>
		<?php
		/*if ($options_attributes_image[$i] != '') {
		    echo $options_attributes_image[$i]; 
		}*/
		}
		?>
		<?php
    }
?>



<?php
  if ($show_onetime_charges_description == 'true') {
?>
    <div class="wrapperAttribsOneTime"><?php echo TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION; ?></div>
<?php } ?>


<?php
  if ($show_attributes_qty_prices_description == 'true') {
?>
    <div><?php echo zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;' . '<a href="javascript:popupWindowPrice(\'' . zen_href_link(FILENAME_POPUP_ATTRIBUTES_QTY_PRICES, 'products_id=' . $_GET['products_id'] . '&products_tax_class_id=' . $products_tax_class_id) . '\')">' . TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK . '</a>'; ?></div>
<?php } ?>
</ul>