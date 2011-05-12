<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_products_next_previous.php 6912 2007-09-02 02:23:45Z drbyte $
 */

/*
 WebMakers.com Added: Previous/Next through categories products
 Thanks to Nirvana, Yoja and Joachim de Boer
 Modifications: Linda McGrath osCommerce@WebMakers.com
*/

?>
<div class="fl relative pad_1em" id="product_flash_page">
<span id="recent_flash_smallPrev" class="recent_flash_prev" title="Back"></span>
<span id="recent_flash_smallNext" class="recent_flash_next" title="Next"></span>

<ul class="margin_t max_flash_width" id="recent_flash_small">
<?php
	$flash_page_id_con = array();
	$flash_page_images_con = array();
	$flash_page_price_con = array();
	$flash_page_name_con = array();
	$flash_page_query = "select p.products_id,p.products_image,p.products_quantity,p.products_price,pd.products_name from " . TABLE_PRODUCTS ." p, ". TABLE_PRODUCTS_DESCRIPTION . " pd where p.`products_id`=pd.`products_id` AND master_categories_id = " . zen_get_products_category_id_flash($products_id) . " AND pd.`language_id` = {$_SESSION['languages_id']}";
	$flash_page = $db->Execute($flash_page_query);
	while(!$flash_page->EOF){

		$rs = $db->Execute("select specials_new_products_price from specials where products_id=".$flash_page->fields['products_id']." and status=1");
		$products_price = $flash_page->fields['products_price'];      //caizhouqing update discount
		$specials_price = $rs->fields['specials_new_products_price'];
		if($rs->RecordCount() > 0){
			$discount = 100-($specials_price / $products_price * 100);
		}else{
			$discount = 0;
		}
		$flash_discount[] = (int)$discount;
                $flash_page->fields['specials_price']=$specials_price;
            
		$flash_page_items[] = $flash_page->fields;
		$flash_page_id_con[]	= $flash_page->fields['products_id'];
		$flash_page_images_src = is_int(strpos($flash_page->fields['products_image'],','))? substr($flash_page->fields['products_image'],0,strpos($flash_page->fields['products_image'],',')):$flash_page->fields['products_image'];
		$flash_page_images_con[]	= '"'.(zen_not_null($flash_page->fields['products_image']) ? $flash_page_images_src : PRODUCTS_IMAGE_NO_IMAGE ).'"';
		$flash_page_price_con[]	= '"'.$currencies->display_price(zen_get_products_base_price($flash_page->fields['products_id']),zen_get_tax_rate($product_check->fields['products_tax_class_id'])).'"';
		$flash_page_name_con[]	= '"'.zen_output_string(zen_get_products_name($flash_page->fields['products_id'])).'"';
		$flash_page->MoveNext();
	}
	$flash_discount = implode(",", $flash_discount);
	$flash_page_id = implode(",", $flash_page_id_con);
	$flash_page_images = implode(",", $flash_page_images_con);
	$flash_page_price = implode(",", $flash_page_price_con);
	$flash_page_name = implode(",", $flash_page_name_con);
	
	$flash_page_display_num	= ($flash_page->RecordCount()< 8 )? $flash_page->RecordCount(): 8;
?>

<?php for($i = 0; $i< $flash_page_display_num ; $i++){?>
<li id="li<?php echo $i;?>" style="display:block;">
<span id="discount<?php echo $i;?>"></span>
<a class="ih" id="cell_link<?php echo $i;?>" href="<?php echo zen_href_link(zen_get_info_page($flash_page_items[$i]['products_id']), 'products_id=' . $flash_page_items[$i]['products_id']);?>"><?php echo zen_image_OLD(DIR_WS_IMAGES.$flash_page_items[$i]['products_image'],SEO_COMMON_KEYWORDS.' '.$flash_page_items[$i]['products_name'],79,79,'id="cell_img'.$i.'" class="'.(($flash_page_items[$i]['products_id'] == $_GET['products_id']) ? 'imgborder':'').'"');?></a><p><strong id="cell_price<?php echo $i?>" class="red"><?php 
if(!empty($flash_page_items[$i]['specials_price'])){
      //caizhouqing by bof
	  $products_price = $products_price * ($flash_page_items[$i]['specials_price'] / $products_price);

	  echo ($list_box_contents[$row]['products_price'] == 0 ? $currencies->display_price($products_price,zen_get_tax_rate($products_tax_class_id)): $currencies->display_price($products_price,zen_get_tax_rate($products_tax_class_id)));
	  }else{   //caizhouqing by eof
	  echo $currencies->display_price((zen_get_products_base_price($flash_page_items[$i]['products_id']) == 0 ? zen_get_products_sample_price($flash_page_items[$i]['products_id']): zen_get_products_base_price($flash_page_items[$i]['products_id'])),zen_get_tax_rate($product_check->fields['products_tax_class_id'])); 
}
?></strong></p>
</li>
<?php
//print_r($flash_page_items[$i]);
}
?>
</ul>
</div>

<?php if(intval($flash_page->RecordCount()) > 1){?>
<script type="text/javascript">
	var productTotal = <?php echo intval($flash_page->RecordCount());?>;
	var productCurrent = <?php echo intval(array_search($_GET['products_id'],$flash_page_id_con));?>;
	var productID = new Array();
	var productPrice  = new Array();
	var productIMG  = new Array();
	var productName  = new Array();
	var imgURL = baseURL+'images/';
	var linkURL = baseURL+"index.php?main_page=product_info&products_id=";
	var productSourcePrice = null;
	var productSubName = null;
	var productName = null;
	var productFlg = null;
	productDISCOUNT = [<?php echo $flash_discount;?>];
	productID = [<?php echo $flash_page_id;?>];
	productPrice = [<?php echo $flash_page_price;?>];
	productIMG = [<?php echo $flash_page_images;?>];
	productName = [<?php echo $flash_page_name;?>];
	page_go('recent_flash_small','8', productCurrent, productTotal, '<?php echo $_GET['products_id']?>');
</script>
<?php }?>