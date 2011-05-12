<?php if(!SimpleCache::StartBlock('tplproductinfo', true, false)): ?>
<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_info.<br />
 * Displays details of a typical product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_info_display.php 5369 2006-12-23 10:55:52Z drbyte $
 caizhouqing update pro_show
 */

 require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>
<?php
// only display when more than 1
  if ($products_found_count > 1) {
?>
<div class="fr"><a href="<?php echo zen_href_link(FILENAME_DEFAULT, 'cPath='. zen_get_products_category_id($_GET['products_id']));?>" / class="b_" title="<?php echo zen_get_category_name(zen_get_products_category_id($_GET['products_id']),$_SESSION['languages_id']);?>">other item in the list</a>&nbsp;<span id="recent_flash_smallPage" class="product_title">
  <?php //echo (PREV_NEXT_PRODUCT); ?>
  <?php //echo ($position+1 . "/" . $counter); ?>
  </span></div>
<?php
  }
?>
<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>
<!--bof Prev/Next top position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 1 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
require($template->get_template_dir('tpl_product_flash_page.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_product_flash_page.php'); ?>
<?php } ?>
<!--eof Prev/Next top position-->

<br class="clear" />
<div class="margin_t allborder fl" style="padding: 2px 0px; width:950px;">
  <div class="fl for_gray_bg" style="width:950px;">
    <!--bof Main Product Image -->
    <?php
  if (zen_not_null($products_image)) {
  ?>
    <?php
/**
 * display the main product image
 */
   require($template->get_template_dir('tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
    <?php
  }
?>
    <!--eof Main Product Image-->
    <div id="product_info_con" class="fr">
          <!--bof Form start-->
      <?php echo zen_draw_form('cart_quantity_frm', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product'), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
      <!--eof Form start-->
      <?php echo zen_draw_hidden_field('products_id',$_GET['products_id']); ?>
      <div class="fl pad_product line_180">
        <!--bof Product Name-->
        <h1 style="font-size: 16px;"><?php echo $products_name; ?></h1>
        <!--eof Product Name-->
        <ul class="pad_10px">
          <li>item#:&nbsp;<?php echo $products_model; ?></li>
          <div class="hr_d"></div>
        <!--bof Product Price block -->
        <li class="big margin_t"> Retail price: <del>
          <?php
		// base price
		  if ($show_onetime_charges_description == 'true') {
			$one_time = '<span >' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span><br />';
		  } else {
			$one_time = '';
		  }
		  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . $currencies->display_price(zen_get_products_retail_price((int)$_GET['products_id']),zen_get_tax_rate($product_info->fields['products_tax_class_id']));
		?>
          </del> </li>
	  <?php
	  //caizhouqing by bof update price
		$rs = $db->Execute("select specials_new_products_price,products_id from specials where products_id=".(int)$_GET['products_id']." and status=1");
		$specials_price = $rs->fields['specials_new_products_price'];
		$sproducts_id = $rs->fields['products_id'];
		if($products_price != 0) {
			$products_price = $products_price * ($specials_price / $products_price);
		}
		?>
        <h3 class="relative">Price:
		 <?php
		  $sale_products_price = zen_get_products_display_price($_GET['products_id']);
		  htmlspecialchars($sale_products_price)."<br>";  
		  if(empty($specials_price)){?><div id="t_p" style="padding-left:45px;*padding-left:1px;"><ul><li><a class="one u b_" href="javascript:void(0)" rel="nofollow"><?php echo $currencies->display_symbol_left($_SESSION['currency']);?><!--[if IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]--><div>
				<?php
					reset($currencies->currencies);
				 while (list($key, $value) = each($currencies->currencies)) {
					if($key != $_SESSION['currency']){	?>
        	<a class="b_ big_" href="<?php echo $_SERVER['REQUEST_URI'].$question_mark;?>currency=<?php echo $key; ?>"  rel="nofollow"><?php echo $value['symbol_left']; ?></a>
				<?php }} ?>

        <!--[if lte IE 6.5]><IFRAME src="javascript:void(0)"></IFRAME><![endif]--></div><!--[if lte IE 6]></td></tr></table></a><![endif]--></li></ul></div>
		  <?php }?>
          <span id="products_price_unit" class="red" style="
		  <?php
		   if(empty($specials_price)){   //css
		   echo "padding-left:50px";
		   }else{
		   echo "text-decoration: line-through";
		   }?>;"><?php
		   $price = zen_get_products_base_price((int)$_GET['products_id']) == 0 ? zen_get_products_sample_price((int)$_GET['products_id']) : zen_get_products_base_price((int)$_GET['products_id']);
		   function wl_check_price($price, $currency) {
		   		global $db;
				$cs = $db->Execute("select `value` from " . TABLE_CURRENCIES . " where `code` = '{$currency}'");
				$c = $cs->fields['value'];
				$p = $price * $c;
				return number_format($p, 2, '.', '');
		   }
		  $price = wl_check_price($price, $_SESSION['currency']);
		  if(strip_tags($sale_products_price)!=number_format($price,2)){
		     echo '<s>'.$price.'</s>';
		  }else{
		  	 echo $price;
		  }
		  ?></span></h3>
		  <?php
		  if(strip_tags($sale_products_price)!=number_format($price,2) && wl_check_price(strip_tags($sale_products_price), $_SESSION['currency'])!='0.00'){
		  ?>
          <h3 class="br_none">
		  Sale Price:<span class="productSalePrice pad_c"><?php echo $currencies->display_symbol_left($_SESSION['currency']);?>&nbsp;<?php echo wl_check_price(strip_tags($sale_products_price), $_SESSION['currency']);?></span>
		  </h3>
		  <?php }?>
		  <?php if(!empty($specials_price)){?>
		  <h2 class="relative">Discount Price:<div id="t_p"><ul><li><a class="one u b_" href="javascript:void(0)" style="font-size:14px;" rel="nofollow"><?php echo $currencies->display_symbol_left($_SESSION['currency']);?><!--[if IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->
		  <div>
				<?php
					reset($currencies->currencies);
				 while (list($key, $value) = each($currencies->currencies)) {
					if($key != $_SESSION['currency']){	?>
        	<a class="b_ big_" href="<?php echo $_SERVER['REQUEST_URI'].$question_mark;?>currency=<?php echo $key; ?>" rel="nofollow"><?php echo $value['symbol_left']; ?></a>
				<?php }} ?>

        <!--[if lte IE 6.5]><IFRAME src="javascript:void(0)"></IFRAME><![endif]--></div><!--[if lte IE 6]></td></tr></table></a><![endif]--></li></ul></div>

          <span id="products_price_unit" class="red" style="padding-left:45px;">
		  <?php
		  $products_price = $currencies->display_price($products_price,zen_get_tax_rate($products_tax_class_id));   //update Discount Price

		  $currency = $currencies->display_symbol_left($_SESSION['currency']);

		  $products_price = str_replace($currency,"",$products_price);
		  echo $products_price;
		  ?></span></h2>
		  <?php }//caizhouqing by bof?>

        <!--eof Product Price block -->
        <li class="big"> Start from: <?php echo $products_quantity_order_min;?> Unit(s)</li>
        <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li>' . TEXT_PRODUCT_MANUFACTURER . $manufacturers_name . '</li>' : '') . "\n"; ?>
		<?php
		if(!empty($products_weight)) {
		?>
		<li class="big"> Weight: <?php echo $products_weight; ?> Kg(s)</li>
		<?php
		}
		?>
        <!--bof free ship icon  -->
        <?php if(zen_get_product_is_always_free_shipping((int)$_GET['products_id'])) { ?>
             <li>This item is: <img border="0" class="g_t_m" src="includes/templates/<?php echo $template_dir; ?>/images/free.gif"/></li>
        <?php }else{
            echo zen_get_freeshipping_same_products($products_name);
        }?>

		<?php if(zen_get_product_is_free((int)$_GET['products_id'])) { ?>
             <li>This item is: <img border="0" class="g_t_m" src="includes/templates/<?php echo $template_dir; ?>/images/is_free.gif"/></li>
        <?php }?>
        <!--eof free ship icon  -->
        </ul>

        <!--bof Quantity Discounts table -->
				<?php
				  if ($products_discount_type != 0 || $categories_discount_type != 0) { ?>
				<?php
				/**
				 * display the products quantity discount
				 */
				 require($template->get_template_dir('tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
				<?php
				  }
				?>
				<!--eof Quantity Discounts table -->
        <!--bof Attributes Module -->
				<?php
          if ($pr_attr->fields['total'] > 0) {
        ?>
        <?php
        /**
         * display the product atributes
         */
          require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
        <?php
          }
        ?>
        <!--eof Attributes Module  class="red b big"-->



<?php
if(!zen_get_product_is_always_free_shipping((int)$_GET['products_id'])) {
/**
 * display the products shipping
 */
  require(DIR_WS_MODULES . zen_get_module_directory('product_shipping_estimator.php'));
  require($template->get_template_dir('/tpl_modules_product_shipping_input.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_product_shipping_input.php');
}
?>

<?php if($products_quantity==0){?>
<div style="margin-top:5px; color:#A72D2C;font-weight:bold;">This product will be in stock on <?php echo date('l dS \of F Y',strtotime($products_date_available));?>.</div>
<?php }?>

<br class="clear" />

      </div>
      <div class="minframe fr pad_top">
        <ul class="white_bg allborder pad_10px" id="product_price">
          <li><span id="products_price_all" class="red b big">
		  <?php
		  if(!empty($specials_price)){
		  echo $products_price;
		  }else{
		  echo zen_get_products_display_final_price((int)$_GET['products_id']);
		  }
		  ?></span>&nbsp;<span id="shipping_rule">+
          Shipping Cost </span></li>
        </ul>
        <a name="show"></a>
        <ul class="g_t_c product_ul_h">
          <?php if ($products_quantity > 0){ ?>
          <strong>Quantity: </strong>
          <input type="text" name="cart_quantity" id="cart_quantity" value="<?php echo $products_quantity_order_min;?>" maxlength="6" style="width:30px"  onkeyup="value=value.replace(/[^\d]/g,'');changePrice();" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''));changePrice();"/>
          <strong>Unit(s)</strong>
          <?php }else{ ?>
          <img border="0" src="includes/templates/<?php echo $template_dir; ?>/images/soldout.gif"/><br/>
          <?php } ?>
        </ul>
        <?php if ($products_quantity > 0){ ?>
        <ul id="selectArea" class="g_t_c product_ul_h relative"><input type="image" src="includes/templates/chanelwatches/images/car.gif" alt="Add to Cart" title=" Add to Cart " /></ul>
        <ul class="g_t_c gray" id="tmp_tit"></ul>
		<script type="text/javascript">
function validateS(){
	this.ini = init;
	this.checking = checkS;
	this.outArr = new Array();
	this.inArr = new Array();
	this.errStr = '';
	this.buttonSrc=new Image();
	this.buttonSrc.src="includes/templates/chanelwatches/images/car.gif";
}
var tempPrice = new Array();
function init(){
	var formsEl = document.forms['cart_quantity_frm'].elements;

	for(i=0;i<formsEl.length;i++){
		var $el = $(formsEl[i])[0];
		if(formsEl[i].id.substr(0,7) == 'attrib-'){
			if(!(formsEl[i].tagName == "SELECT"&&formsEl[i].length==1)){/*$el.value = "";*/}//for refresh
			if(formsEl[i].tagName == "SELECT"){
				$el.onchange = function(){
					checkS();
				}
			}else{
				$el.onkeyup = function() {
					checkS();
				}
			}

			if(formsEl[i].parentNode.getAttribute("arrt_tmp")){
				this.inArr.push(formsEl[i].id);
			}else{
				//alert(formsEl[i].parentNode.previousSibling.innerHTML);
				var tmparr = [formsEl[i].id,formsEl[i].parentNode.previousSibling.innerHTML.replace(':','')];

				this.outArr.push(tmparr);
			}
		}
	}

	if(this.outArr.length>0)
		$('#tmp_tit').html('To Add to Shopping Cart,<br />choose from options to the left.');

}


	function checkS() {
		var err = '';
		for(i=0;i<vs.outArr.length;i++){

			if($("#"+vs.outArr[i][0])[0].tagName == "SELECT"){
				if($("#"+vs.outArr[i][0])[0].disabled == false && $("#"+vs.outArr[i][0])[0].value.replace(/\s/g,'')=="")
					err += vs.outArr[i][1] + ',';
			}else{

				if($("#"+vs.outArr[i][0])[0].getAttribute('rel')==1 && $("#"+vs.outArr[i][0])[0].value.replace(/\s/g,'')=="")
					err += vs.outArr[i][1] + ',';

			}
		}
		for(i=0;i<vs.inArr.length;i++){

			if($("#"+vs.inArr[i])[0].value.replace(/\s/g,'')==""&&$("#"+vs.inArr[i])[0].disabled==false && $("#"+vs.inArr[i])[0].getAttribute('rel')==1 && $("#chk_r_attr")[0].checked == true){
				err += $("#r_attr_div")[0].innerHTML + ',';
				break;
			}
		}
		//alert(err);
		//changePrice();
		vs.errStr = err;
		formatOutput();
	}


function showTit(key){
	(key==0)?$('#tit_t')[0].style.display = '':$('#tit_t')[0].style.display = 'none';
}

function change_attr(el){
if(!$('#r_attr')[0])
	return;

//$("#custom_price_show")[0].innerHTML = $("#custom_price")[0].innerHTML.replace("(","").replace(")","");
//var custom_price = 0;

//if(Number(stripPrice($("#custom_price")[0].innerHTML)))
//	custom_price = Number(stripPrice($("#custom_price")[0].innerHTML));

if($('#chk_r_attr')[0].checked){
	$('#r_attr')[0].style.display = "block";
	$("#"+el)[0].disabled = true;
	$("#"+el)[0].selectedIndex = 0;
	//if(tempPrice[el]){
	//	extraPrice -= Number(tempPrice[el]);
	//	tempPrice[el] = 0;
	//}
	//extraPrice += custom_price;
	for(i=0;i<vs.inArr.length;i++){
		$("#"+vs.inArr[i])[0].disabled = false;
	}

}else{
	$('#r_attr')[0].style.display = "none";
	$("#"+el)[0].disabled = false;
	//extraPrice -= custom_price;
	for(i=0;i<vs.inArr.length;i++){
		$("#"+vs.inArr[i])[0].disabled = true;

	}
}

vs.checking();
}

function formatOutput(){
	if(vs.errStr!=''){
		var tt = vs.errStr.substr(0,vs.errStr.length-1);
		tt = tt.replace(/,/g,' and ')
		str = '<img src="'+vs.buttonSrc.src+'" onmouseout="showTit(1)" onmouseover="showTit(0)">'+'<div id="tit_t" style="display:none">Please Select<br />'+tt+'<b></b></div>';
	}else{
		str = '<input type="image" src="includes/templates/chanelwatches/images/car.gif" alt="Add to Cart" title=" Add to Cart " />';
	}
	$('#selectArea')[0].innerHTML = str;
}

var vs = new validateS();
vs.ini();
vs.checking();
</script>
        <?php } ?>
        <div class="seal_m_en center"></div>
        <ul class="g_t_c">
          <li style="margin-top: 3px;"><a title="Payment methods" onclick="floatBox(this,'shipping_info');" href="<?php echo $_SERVER['REQUEST_URI'];?>#show"> <?php echo zen_image($template->get_template_dir('payment.gif', DIR_WS_TEMPLATE, $current_page_base,'images/button'). '/' . 'payment.gif','Payment Methods','','',' class="relative"');?></a></li>
          <li style="margin-top: 3px;"><?php echo '<a href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_ASK_A_QUESTION, 'products_id='.$_GET['products_id']) . '\')">'.zen_image($template->get_template_dir('ask.gif', DIR_WS_TEMPLATE, $current_page_base,'images/button'). '/' . 'ask.gif','Ask Questions About This Item','','',' class="relative"').'</a>';?></li>
          <li style="margin-top: 3px;"><?php echo '<a href="'.zen_href_link(FILENAME_TELL_A_FRIEND, 'products_id='.$_GET['products_id']). '">'.zen_image($template->get_template_dir('tell_a_friends.gif', DIR_WS_TEMPLATE, $current_page_base,'images/button'). '/' . 'tell_a_friends.gif','Tell A Friends','','',' class="relative"').'</a>';?></li>
        </ul>
      </div>
      </form>
<script>
var extraPrice = 0;
var symbolLeft='<?php echo $currencies->display_symbol_left($_SESSION['currency']);?>';
var min_quantity=1;
var discount = new Array();
<?php if(strip_tags($sale_products_price)!=number_format($price,2)){ ?>
discount[0] =["<?php echo $products_quantity_order_min;?>","<?php echo $products_price=='' ? wl_check_price(strip_tags($sale_products_price), $_SESSION['currency']) : $products_price;?>","11","<?php echo zen_get_product_is_always_free_shipping((int)$_GET['products_id']) ? 'true' : 'false'; ?>"];
<?php }else{?>
discount[0] =["<?php echo $products_quantity_order_min;?>","<?php echo $products_price=='' ? $price : $products_price;?>","11","<?php echo zen_get_product_is_always_free_shipping((int)$_GET['products_id']) ? 'true' : 'false'; ?>"];
<?php }?>
<?php if(isset($quantityDiscounts)) {
      $count_quantity=1;
      foreach($quantityDiscounts as $v){
            $qty=explode('-',$v['show_qty']); ?>
     discount[<?php echo $count_quantity;?>]  =["<?php echo str_replace(',','',$qty['0']);?>","<?php echo wl_check_price($v['discounted_price'],$_SESSION['currency'])?>","<?php echo  str_replace(',','',$qty['1']);?>",discount[0][3]];
<?php
$count_quantity++;
}
}
?>
var originPrice = discount[0][1];
function stripPrice(s) {
	s = s.replace(/[\D]+\s/,"").replace(")","");;
	return s;
}
function str2Number(s){
	var str = s.replace(/[,]*/g, "");
	return str;
}
function countPrice() {
	return Number(str2Number(originPrice)) + Number(extraPrice);
}
function number2Str(tempNum){
    var iniNum;
    var floatNum;
    tempNum = tempNum.toString();
    var decimalPosition = tempNum.indexOf(".");
    if(decimalPosition>0) {
        iniNum = tempNum.slice(0,decimalPosition)
        floatNum = tempNum.slice(decimalPosition)
    }else{
        iniNum = tempNum;
        floatNum = "";
    }
    var l = iniNum.length;
    var times = Math.ceil(l/3);
    for(i=1;i<times;i++) {
        iniNum = iniNum.slice(0,l-3*i) + ',' + iniNum.slice(l-3*i);
    }
    return(iniNum + floatNum);
}
function changePrice() {
    if(!$('#cart_quantity')[0]) return;
	var qty = $('#cart_quantity')[0].value;
	var tmp ;
	var priceTmp;
     
	for(var i=discount.length-1;i>=0;i--){
		if(qty >= parseInt(discount[i][0])){
			if(parseInt(discount[i][2]) > 0 && discount[i][3] === 'true'){
				$('#shipping_rule')[0].innerHTML = ("+ Free Shipping");
			}
			else{
				$('#shipping_rule')[0].innerHTML = ("+ Shipping Cost");
			}
			originPrice = discount[i][1];
			break;
		}

	}
    //one price

	//$('#products_price_unit')[0].innerHTML = number2Str(countPrice().toFixed(2));
	$('#products_price_all')[0].innerHTML = symbolLeft + "&nbsp;" + number2Str((countPrice()*$('#cart_quantity')[0].value).toFixed(2));
}

changePrice();</script>
      <!-- EOF ProductShipping Cart-->
    </div>

<!-- EOF Product Tools-->    </div>
</div>
<br class="clear" />
<div class="margin_t fl maxwidth">
<div id="product_main_con" class="fl black">
<div>
  <!--bof Product description -->
  <?php if ($products_description != '') { ?>
    <div><h2 class="blue">Description: </h2></div>
    <div id="Item_Description_Spc" class="pad_10px pad_l_28px big"><?php echo stripslashes($products_description); ?></div>
  <?php } ?>
  <!--eof Product description -->

</div>


<br class="clear" />


<!--bof Additional Product Images -->
<?php
/**
 * display the products additional images
 */
  require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php'); ?>
<!--eof Additional Product Images -->


<!--bof Prev/Next bottom position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */

 require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next bottom position -->

<div class="g_t_r pad_bottom">
<a target="_blank" title="Print Page" href="<?php echo 'print_page_p'.$_GET['products_id'];?>">Print Page</a>
</div>
<!--bof Product URL -->
<?php
  if (zen_not_null($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
    <p id="productInfoLink" class="productGeneral centeredContent" ><?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($products_url), 'NONSSL', true, false)); ?></p>
<?php
    } // $flag_show_product_info_url
  }
?>
<!--eof Product URL -->

<div id="p_review">
<div class="hr_d"></div>
<!-- BOF Product Reviews -->
<?php
  if ($flag_show_product_info_reviews == 1) {
    // if more than 0 reviews, then show reviews content; otherwise, don't show
    if ($reviews->RecordCount() > 0 ) { ?>

<h2 class="margin_t blue fl">Product Reviews:  <a href="<?php echo zen_href_link(zen_get_info_page($_GET['products_id']),'products_id=' . $_GET['products_id']).'#review' ?>"><?php echo zen_image($template->get_template_dir('btn_review.gif', DIR_WS_TEMPLATE, $current_page_base,'images/button'). '/btn_review.gif','','','',' class="g_t_m"'); ?></a></h2>
<div class="clear"></div>
<div class="pad_10px pad_l_28px big">
<!--bof Reviews button and count-->

	    <?php while (!$reviews->EOF){
	    				$customer_name = substr($reviews->fields['customers_name'],strpos($reviews->fields['customers_name'],' '));
	    				if(!isset($customer_name)){
	    					$customer_name = $reviews->fields['reviews_id'];
	    				}
	    	?>
				<ul class="border_b margin_t pad_bottom">
				<?php for( $i = 0;$i < $reviews->fields['reviews_rating'];$i++){?>
							<span class="star"></span>
				<?php } ?>
				<?php if ( $reviews->fields['reviews_rating']<5){
								for( $i = 0;$i < 5-$reviews->fields['reviews_rating'];$i++){
									echo '<span class="star_gray"></span>';
								}
							}?>
				&nbsp;<strong><?php echo $reviews->fields['reviews_title']; ?></strong>, <?php echo zen_date_short($reviews->fields['date_added']);?>  <?php if($reviews->fields['reviews_is_featured']){echo '<span style="font-size: 10px;"> ( <a href="'.zen_href_link(FILENAME_TESTIMONIALS).'" class="u">'.TEXT_PRODUCT_FEATURED_REVIEW.'</a> ) </span>';} ?><br/><?php echo $customer_name; ?><div style="" class="gray big"><?php echo $reviews->fields['reviews_text'] ?></div>
				</ul>
			<?php $reviews->MoveNext();
					} ?>
      </div>
    <?php } else {
    		//no display addBy showq@qq.com
    	}?>

<?php } ?>

<!--eof Reviews button and count -->
<a name="review"></a><h2 class="margin_t blue">Write a Review:</h2>
	<div class="pad_bottom pad_l_28px big">
	<p>Tell us what you think about this item, share your opinion with other people. Please make sure that your review focus on this item. All the reviews are moderated and will be reviewed within two business days. Inappropriate reviews will not be posted. </p>
	<p>Have any question or inquire for this item? Please contact <a target="_blank" class="red u" href="<?php echo zen_href_link(FILENAME_FAQS_ALL); ?>">Customer Service</a>. (Our customer representative will get back shortly.)</p>
	<ul class="inquiry">
	<form onsubmit="return(fmChk(this))" method="post" action="<?php echo zen_href_link(zen_get_info_page($_GET['products_id']),'products_id=' . $_GET['products_id']).'#review' ?>" name="post_review" id="post_review">
	<input type="hidden" value="4" id="product_score" name="product_score"/>
	<input type="hidden" value="review" id="action" name="action"/>
	<input type="hidden" value="" id="session_key" name="session_key"/>
	<table width="360" border="0" class="big">
	  <tbody><tr><td colspan="2">
	  <?php if ($messageStack->size('reviews') > 0) echo $messageStack->output('reviews'); ?>
	  <td></tr>
	  <tr><td colspan="2">Indicates required fields<span class="red">*</span></td></tr>
	  <tr><td colspan="2">
		  <table><tbody><tr>
		  <td class="big">Rating: </td>
		  <td>
		  <div onmousedown="rating.startSlide()" onmousemove="rating.doSlide(event)" onmouseout="rating.resetHover()" onclick="rating.setRating(event)" onmouseup="rating.stopSlide()" id="r_RatingBar" style="background: transparent url(includes/templates/chanelwatches/images/icon/unfilled.gif) repeat scroll 0%; width: 75px; cursor: pointer; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
			<div style="background: transparent url(includes/templates/chanelwatches/images/icon/hover.gif) repeat-x scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; height: 14px; width: 0px;" id="r_Hover">
			<div id="r_Filled" style="background: transparent url(includes/templates/chanelwatches/images/icon/sparkle.gif) repeat-x scroll 0%; overflow: hidden; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; height: 14px; width: 60px;"></div>
			</div>
		</div>		</td>
		<td><div id="score_title"></div></td>
		</tr></tbody></table>
		<script type="text/javascript">
		var rbi = new BvRatingBar('r_');
		window.rating = rbi;
		</script>
		</td></tr>
	  <tr>
		<td width="110" valign="top">Your Name: <span class="red">*</span></td>
		<td width="250" valign="top">
    <input type="text" chkrule="nnull" chkname="Your Name" class="input_5" value="<?php echo isset($_SESSION['customer_id'])? zen_get_customer_name($_SESSION['customer_id']): '';  ?>" name="customer_name"/>		<div class="big_">Enter your Reviewer Nickname </div></td>
	  </tr>
	     		<?if(isset($_SESSION['customer_id'])){
	     		  //nothing
	     		}else{
	     			?><tr>
						<td width="110" valign="top">Your Email: <span class="red">*</span></td>
						<td width="250" valign="top">
							<input type="text" chkrule="nnull/eml" chkname="Email" class="input_5" value="" name="customer_email"/>		</td>
					  </tr>
					  <?php } ?>
	  	  <tr>
		<td valign="top">Review Title: <span class="red">*</span></td>
		<td valign="top">
<input type="text" chkrule="nnull/max50" chkname="Review Title" class="input_5" value="" name="review_title"/></td>
	  </tr>

	      <tr>
		<td colspan="2">
<textarea chkrule="nnull/max10000" chkname="review" class="textarea1 txt_review" name="review_content" id="txt_review" onblur="if(this.value == '') this.className='textarea1 txt_review'" onfocus="this.className='textarea1'"></textarea></td>
	  </tr>
	  <tr>
		<td height="50" align="right" colspan="2"><button id="submint1_review" type="submit"><span id="submint2_review">Submit</span></button></td>
	  </tr>
	</tbody></table>
	</form>
	</ul>
</div>
<!-- EOF Product Reviews -->
</div>
<!-- BOF Related_categories Search_feedback -->
<?php
	require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/related_categories.php'));
	require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/search_feedback.php'));
?>
<!-- EOF Relate_categories Search_feedback -->
</div>
  <div class="mini_frame fr">
    <?php require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/recently_sold.php')); ?>
    <?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>
  	<?php require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/subscribe.php')); ?>
  </div>
</div>

<!--bof Form close-->
</form>
<!--bof Form close-->
<br class="clear"/>
<?php SimpleCache::End(); endif ?>