<?php
/**
 * Common Template - tpl_tabular_display.php
 *
 * This file is used for generating tabular output where needed, based on the supplied array of table-cell contents.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_tabular_display.php 3957 2006-07-13 07:27:06Z drbyte $
 */

//print_r($list_box_contents);

?>

<?php
if (!function_exists("stripos")) {
  function stripos($str,$needle) {
   return strpos(strtolower($str),strtolower($needle));
  }
}
?>

<?php
	$list_box_contents_num = count($list_box_contents);
  for($row=0; $row<$list_box_contents_num; $row++) {
  if(isset($_GET['keyword'])){
  	$list_box_contents_keywordPos[$row] = stripos($list_box_contents[$row]['products_name'],$_GET['keyword']);
  	if (is_int($list_box_contents_keywordPos[$row])) {
	    $list_box_contents_name[$row] = str_ireplace($_GET['keyword'],'<span class="red">'.$_GET['keyword'].'</span>',$list_box_contents[$row]['products_name']);
  	}else{
	    $list_box_contents_name[$row] = $list_box_contents[$row]['products_name'];
  	}
  	
  	$list_box_contents_description_Pos[$row] = stripos($list_box_contents[$row]['products_description'],$_GET['keyword']);
  	if (is_int($list_box_contents_description_Pos[$row])){ 		
	    $list_box_contents_description[$row] = str_ireplace($_GET['keyword'],'<span class="red">'.$_GET['keyword'].'</span>',$list_box_contents[$row]['products_name']);
  	}else{
	    $list_box_contents_description[$row] = $list_box_contents[$row]['products_description'];
  	}
  }else {
  	$list_box_contents_name[$row] = $list_box_contents[$row]['products_name'];
  	$list_box_contents_description[$row] = $list_box_contents[$row]['products_description'];
  }

if($row <= 2 && $_GET['page'] < 2){
	$li_list_bg = 'list_bg';
}else{
	$li_list_bg="";
}
	echo '<ul class="list_product clear '.$li_list_bg.'">';
?>
<li class="relative">
<?php 
//var_dump($list_box_contents[$row]);

$rs = $db->Execute("select specials_new_products_price from specials where products_id=".$list_box_contents[$row]['products_id']." and status=1");  //liuyi update specials price
$products_price = $list_box_contents[$row]['products_price'];      //caizhouqing update discount
$specials_price = $rs->fields['specials_new_products_price'];
if($products_price > 0){
	$discount=100-round($specials_price / $products_price * 100);
}else{
	$discount=0;
}

if($list_box_contents[$row]['products_quantity'] == 0) { ?>
			<span class="sold_out"></span>
<?php }elseif (!empty($specials_price)){ ?>
	<span class="sold_discount"><div class="sold_discount_font"><?php echo $discount;?></div></span>
<?php }else{ ?>
			<?php	if($list_box_contents[$row]['product_is_wholesale']){ ?>
				<span class="sale_item"></span>
			<?php } ?>
<?php } ?>
<?php echo '<a href="' . zen_href_link(zen_get_info_page($list_box_contents[$row]['products_id']), 'cPath=' .zen_get_generated_category_path_rev($_GET['cPath']). '&products_id=' . $list_box_contents[$row]['products_id']) . '" class="ih" >' . zen_image_OLD(DIR_WS_IMAGES .substr_replace($list_box_contents[$row]['products_image'],'l/',0,2), $list_box_contents[$row]['products_name'], 128, 128, 'class=""') . '</a>'?>
</li>
<li class="li_con">
<dl>
<dt><?php echo '<a href="' . zen_href_link(zen_get_info_page($list_box_contents[$row]['products_id']), 'cPath=' .zen_get_generated_category_path_rev($_GET['cPath']). '&products_id=' . $list_box_contents[$row]['products_id']) .'"><strong class="big">'.$list_box_contents_name[$row]. '</strong></a>';?></dt>
<dd class="product_detail">
<strong>Description: </strong><?php echo $list_box_contents_description[$row].' <a href="' . zen_href_link(zen_get_info_page($list_box_contents[$row]['products_id']), 'cPath=' .zen_get_generated_category_path_rev($_GET['cPath']). '&products_id=' . $list_box_contents[$row]['products_id']) . '">Product Detail &gt;&gt;</a>';?>

<?php 
 echo $list_box_contents[$row]['product_is_free'];
echo $list_box_contents[$row]['product_is_always_free_shipping'];?></dd>
<dd>
	            <strong>Start From: </strong><?php echo $list_box_contents[$row]['products_quantity_order_min'].' Unit(s)';?>
	        </dd>
	          <dd>
	            <strong><span class="fl">Review:&nbsp;&nbsp;</span></strong>
	            <?php echo zen_get_reviews($list_box_contents[$row]['products_id']); ?>			              

	        </dd>
	        
	    </dl>
	</li>	
	<li>
	   <dl>	   
	    <dd>List Price: <del class="red"><strong><?php echo $list_box_contents[$row]['products_price_retail']; ?></strong></del></dd>	    
	    <dd class="product_detail">
	    <?php if ($list_box_contents[$row]['products_price'] == 0) {?>
      <strong>Sample Price: </strong><strong class="red big"><?php echo $list_box_contents[$row]['products_price_sample'] ?></strong><br/>
	    <?php }else{ ?>
      <strong>Price: </strong><strong class="red big"><?php 
	  if(!empty($specials_price)){    //caizhouqing by bof
	  	$products_price = $products_price * ($specials_price / $products_price); //Discounted price
	  	echo $currencies->display_price($products_price,zen_get_tax_rate($products_tax_class_id)); 
	  }else{  //caizhouqing by eof
	  	echo $currencies->display_price($list_box_contents[$row]['products_price'],zen_get_tax_rate($products_tax_class_id)); 
	  }?></strong><br/>
          for (<?php echo $list_box_contents[$row]['products_quantity_order_min'];?>) Units:
	    <?php } ?>
      </dd>
	   </dl>
		 <?php if ($list_box_contents[$row]['products_quantity'] > 0) { ?>
		   <a href="<?php echo zen_href_link(zen_get_info_page($list_box_contents[$row]['products_id']),'cPath='.zen_get_generated_category_path_rev($_GET['cPath']).'&products_id='.$list_box_contents[$row]['products_id'].'&action=buy_now'); ?>" class="buttonAddCart">in Cart</a>	
		 <?php } ?>
	    	     
	    
<?php
		echo '</li></ul>';
  }
?> 
