<?php
/**
 * Module Template
 *
 * Allows entry of new addresses during checkout stages
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_checkout_new_address.php 4683 2006-10-07 06:11:53Z drbyte $
 */
?>
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
			<tr id="zone_id_tr">
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
         <input type="image" title=" ship to this address " alt="ship to this address" src="<?php echo $template->get_template_dir('btn_ship.gif', DIR_WS_TEMPLATE, $current_page_base,'images/button'). '/btn_ship.gif';?>"/>
        </td>
      </tr>
    </tbody>
  </table>
 