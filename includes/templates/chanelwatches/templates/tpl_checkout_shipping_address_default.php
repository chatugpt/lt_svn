<?php
$address = zen_get_address($_SESSION['customer_id']);  //获取地址

$address_format = $db->Execute("select count(customers_id) as acount from address_book where customers_id =".$_SESSION['customer_id']."");

$acount = $address_format->fields['acount'];

//echo $address_format->fields['acount'];

//if($address_format->fields['acount']==1 && !empty($address)){
//	echo "<script language='javascript'>"; 
//	echo " location='?main_page=checkout_shipping';"; 
//	echo "/script>";
//}

/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_shipping_adresss.<br />
 * Allows customer to change the shipping address.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_shipping_address_default.php 4852 2006-10-28 06:47:45Z drbyte $
 */
?>
<ul id="projects">
  <li class="li1"><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART,'','SSL') ?>"><span>Your Shopping Cart</span></a></li>
  <li class="li2"><span>Account Login</span></li>
  <li class="current3"><span>Address Book</span></li>
  <li class="li4"><span>Billing, Shipping & Review</span></li> 
  <li class="li5"><span>Order Complete</span></li>
</ul>
<div class="ck_w center">
<?php if ($messageStack->size('checkout_address') > 0) echo $messageStack->output('checkout_address'); ?>
<?php if ($messageStack->size('addressbook') > 0) echo $messageStack->output('addressbook'); ?>
<div class="margin_t allborder">
<h3 class="check_box_tit black pad_1em"><?php echo HEADING_TITLE; ?></h3>
<div class="pad_10px big">
<?php
 
  if (defined('CHECKOUT_SHOPPPING_ADDRESS_DESCRIPTION')){
		echo '<ul>';
	  echo CHECKOUT_SHOPPPING_ADDRESS_DESCRIPTION;
	  if ($addresses_count < MAX_ADDRESS_BOOK_ENTRIES){
		  echo '<a class="red u" href="'.$_SERVER['REQUEST_URI'].'#createShip">'.ENTER_NEW_SHIPPING_TEXT.'</a>';
	  }
	  echo '</ul>';
  }
?>
<?php
if(!empty($address)){

  if ($process == false || $error == true) {
	  if ($addresses_count > 0) {
	  ?>
	    <ul class="margin_t pad_10px tt" style="width:688px;float:none;">
	    <?php //echo TABLE_HEADING_ADDRESS_BOOK_ENTRIES; ?>
	  <?php
	    require($template->get_template_dir('tpl_modules_checkout_address_book.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_address_book.php');
	  ?>
			</ul>
			<style>
		  .tt li {width:300px;padding:0 40px 0 4px; border-bottom:1px dashed #ddd; height:170px;margin-top:8px;color:#000;}
	    </style>
	<?php
	  }
	  echo '<ul class="clear pad_top">';
	  echo '<div>';
	  echo '<h4>'.TITLE_PLEASE_SELECT.'</h4>';
	  echo FORM_SKIP_TO_ADDRESS_TEXT;
	  echo '</div>';
	  echo '<a name="createShip"></a>';
	  echo zen_draw_form('checkout_address', zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL'), 'post', 'onsubmit="return(fmChk(this))" id="checkout_address"');
		echo zen_draw_hidden_field('action', 'createShipping');
		echo zen_draw_hidden_field('address','0');
		echo zen_draw_hidden_field('save','0');
	  if($addresses_count < MAX_ADDRESS_BOOK_ENTRIES) {
		  require($template->get_template_dir('tpl_modules_checkout_new_address.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_new_address.php');
		}
  echo '</form>';
	echo '<script>initForm(\'checkout_address\');</script>';
	echo '<br class="clear"/>';
	echo '</ul>';
	}
  }?>


<!---------//caizhouqing update address---->
<?php
$address = zen_get_address($_SESSION['customer_id']);  //get address
if(empty($address)){?>
<form id="checkout_address" name="checkout_address" action="?main_page=checkout_shipping_address&action=add" method="post" onsubmit="return(fmChk(this))" >

<ul><?php  require($template->get_template_dir('tpl_modules_checkout_new_address_1.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_checkout_new_address_1.php');;?>
</ul>

<div class="pad_1em">
			<input id="isSame" name="isSame" type="checkbox" value="true" onclick="tosame();" /> <label class="b hand" for="isSame">My billing address is the same as my shipping address<br /></label>
			If you have different billing address or you are drop ship customer, <a href="javascript:tosame();">Please Enter your Billing Address</a>
</div>

<table width="500" cellspacing="0" cellpadding="0" border="0" class="margin_t address_tb" align="center">
   <tbody>
  <tr>
		  <td class="g_t_r b">Gender: <span class="red">*</span></td>
		  <td colspan="3">
		  <?php
		    $genderArray = array();
        $genderArray[] = array('id'=> '-1','text'=> 'please select ...');
        $genderArray[] = array('id'=> 'm','text'=> MALE);
        $genderArray[] = array('id'=> 'f','text'=> FEMALE);
		    echo zen_draw_pull_down_menu('gender',$genderArray,'','chkname="Gender" chkrule="isselect" class="s_select" id="gender"'); ?>
		  </td>

  </tr>
   <tr>
      <td class="g_t_r b"><?php echo ENTRY_FIRST_NAME; ?><span class="red">*</span></td>
      <td colspan="3">
      <div class="fl" style="width: 120px;">
      <?php echo zen_draw_input_field('firstname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' id="firstname" class="s_input"  chkrule="nnull/min2" chkname="firstname"'); ?>
      </div>
      <div style="width: 100px;" class="fl g_t_r b"><?php echo ENTRY_LAST_NAME; ?><span class="red">*</span></div>
      <div class="fl" style="width: 120px;">
      <?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . 'chkrule="nnull/min2" chkname="lastname" id="lastname" class="s_input"'); ?>
      </div>
      </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_STREET_ADDRESS; ?><span class="red">*</span></td>
        <td colspan="3">
        <div><?php echo zen_draw_input_field('street_address', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' chkrule="nnull/min5" chkname="Street Address" id="street-address" class="l_input"') ; ?>
        </div>
        Notice: P.O. boxes Addresses are not available for shipping right now,
        <br/>
        so please provide street address for your order. Thank you. 
        </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_SUBURB; ?></td>
        <td colspan="3">
        <?php echo zen_draw_input_field('suburb', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' id="suburb" class="l_input"'); ?>
        <div class="line_120">Apartment, suite, unite, building, floor, etc.</div>
        </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_CITY; ?><span class="red">*</span></td>
        <td colspan="3"><?php echo zen_draw_input_field('city', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' chkrule="nnull/min3" chkname="City" id="city" class="l_input"'); ?>
        </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_COUNTRY; ?></td>
        <td colspan="3"><?php echo zen_get_country_list('zone_country_id', $selected_country, ' chkname="Country / Region" chkrule="isselect" id="country"  class="l_select" onchange="update_zone(this.form);"'); ?>
        </td>
      </tr>
			<tr id="zone_id_tr" style="display:none;">
			  <td class="g_t_r b"><?php echo ENTRY_STATE.(zen_not_null(ENTRY_STATE_TEXT)?'&nbsp;<span class="red">' . ENTRY_STATE_TEXT . '</span>':''); ?></td>
			  <td colspan="3"><select id="stateZone" class="l_select" chkname="State/Province/Region" chkrule="isselect"  name="zone_id">  </select>
			</td></tr>
			<tr id="zone_id_tr1" style="display:none;">
			  <td align="right"><strong><?php echo ENTRY_STATE.(zen_not_null(ENTRY_STATE_TEXT)?'&nbsp;<span class="red">' . ENTRY_STATE_TEXT . '</span>':''); ?></strong></td>
			  <td colspan="3"><input id="state" type="text" class="l_input" maxlength="40" value="<?php echo ($entry->fields['entry_zone_id']==0)?$entry->fields['entry_state']:$entry->fields['entry_zone_id']; ?>" name="state"/></td>
		  </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_POST_CODE; ?><span class="red">*</span></td>
        <td colspan="3"><?php echo zen_draw_input_field('postcode', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' chkname="Post/ZIP Code" chkrule="nnull/min4" id="postcode" class="s_input"') ; ?></td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_PHONE_NUMBER; ?><span class="red">*</span></td>
        <td colspan="3"><?php echo zen_draw_input_field('phone', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_phone', '40') . 'chkname="Phone" chkrule="nnull/min4/tel" class="s_input" id="phone"') ; ?>
        </td>
      </tr>
      <tr>
        <td class="g_t_r b"></td>
        <td colspan="3"><div style="width: 324px;">Please make sure that the telephone number you typed is correct, during the shipping process, the shipping company might contact you for the delivery. For your security, we may need to contact you at a verified phone number before your order ships. 
        <a target="_blank" href="<?php echo zen_href_link(FILENAME_PRIVACY); ?>">view our privacy policy.</a></div></td>
      </tr>
      <tr>
        <td colspan="4" align="right">
         <input type="image" title=" ship to this address " alt="ship to this address" src="<?php echo $template->get_template_dir('/btn_cheakout.gif', DIR_WS_TEMPLATE, $current_page_base,'images'). '/btn_cheakout.gif';?>"/>
        </td>
      </tr>
    </tbody>
  </table>
  </form>
<script language="javascript">
function tosame(){

//alert(document.getElementById("zone_country_id").value);
	if(document.getElementById("isSame").value == 'true'){
	//alert(document.checkout_address.zone_id1.value);
		var state1 = document.getElementById("state1")
		var zone_id1 = document.checkout_address.zone_id1;
		var length_1 = zone_id1.length;
		
		var zone_id = document.checkout_address.zone_id;
		var length = zone_id.length;
		
		document.checkout_address.gender.value = document.checkout_address.gender1.value;
		document.getElementById("firstname").value = document.getElementById("firstname1").value;
		document.getElementById("lastname").value = document.getElementById("lastname1").value;
		document.getElementById("street-address").value = document.getElementById("street-address1").value;
		document.getElementById("suburb").value = document.getElementById("suburb1").value;
		document.getElementById("city").value = document.getElementById("city1").value;
		document.checkout_address.zone_country_id.value = document.checkout_address.zone_country_id1.value;
		
		for(var i=0; i<length; i++){
			zone_id.options[0] = null;
		}
		
		for(var i=0; i<length_1; i++){
			zone_id.options[i] = new Option(zone_id1.options[i].text,zone_id1.options[i].value);
		}
		document.checkout_address.zone_id.value = zone_id1.value;
		document.getElementById("state").value = state1.value;
		document.getElementById("postcode").value = document.getElementById("postcode1").value;
		document.getElementById("phone").value = document.getElementById("phone1").value;
		document.getElementById("isSame").value = 'false';		
		
		if(document.checkout_address.stateZone1.value != ""){
			state1.value = "";
		}
		
		if(state1.value != ""){
			document.getElementById("zone_id_tr").style.display = "none";
			document.getElementById("zone_id_tr1").style.display = "";
		}
		
		//alert(document.getElementById("stateZone1").value);
	}else{
	
		document.checkout_address.gender.value = "-1";
		document.getElementById("firstname").value = "";
		document.getElementById("lastname").value = "";
		document.getElementById("street-address").value = "";
		document.getElementById("suburb").value = "";
		document.getElementById("city").value = "";
		document.checkout_address.zone_country_id.value = "";
		document.checkout_address.zone_id.value = "";
		document.getElementById("state").value = "";
		document.getElementById("postcode").value = "";
		document.getElementById("phone").value = "";
		document.getElementById("isSame").value = 'true';
		document.getElementById("zone_id_tr").style.display = "";
		document.getElementById("zone_id_tr1").style.display = "none";
	}
}

initForm('checkout_address');
</script>
<?php }?>
<!-------填写地址------>
  
<?php  
  if ($process == true) {
?>
  <div class="pad_10px fl"><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING_ADDRESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  }
?>
</div>
</div>
<br class="clear"/>
</div>