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
		    echo zen_draw_pull_down_menu('gender1',$genderArray,'','chkname="Gender" chkrule="isselect" class="s_select" id="gender1"'); ?>		  </td>
  </tr>
   <tr>
      <td class="g_t_r b"><?php echo ENTRY_FIRST_NAME; ?><span class="red">*</span></td>
      <td colspan="3">
      <div class="fl" style="width: 120px;">
      <?php echo zen_draw_input_field('firstname1', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' id="firstname1" class="s_input"  chkrule="nnull/min2" chkname="firstname1"'); ?>      </div>
      <div style="width: 100px;padding-right: 5px;" class="fl g_t_r b"><?php echo ENTRY_LAST_NAME; ?><span class="red">*</span></div>
      <div class="fl" style="width: 120px;">
      <?php echo zen_draw_input_field('lastname1', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . 'chkrule="nnull/min2" chkname="lastname" id="lastname1" class="s_input"'); ?>      </div>      </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_STREET_ADDRESS; ?><span class="red">*</span></td>
        <td colspan="3">
        <div><?php echo zen_draw_input_field('street_address1', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' chkrule="nnull/min5" chkname="Street Address" id="street-address1" class="l_input"') ; ?>        </div>
        Notice: P.O. boxes Addresses are not available for shipping right now,
        <br/>
        so please provide street address for your order. Thank you.        </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_SUBURB; ?></td>
        <td colspan="3">
        <?php echo zen_draw_input_field('suburb1', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' id="suburb1" class="l_input"'); ?>
        <div class="line_120">Apartment, suite, unite, building, floor, etc.</div>        </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_CITY; ?><span class="red">*</span></td>
        <td colspan="3"><?php echo zen_draw_input_field('city1', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' chkrule="nnull/min3" chkname="City1" id="city1" class="l_input"'); ?>        </td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_COUNTRY; ?></td>
        <td colspan="3"><?php echo zen_get_country_list('zone_country_id1', $selected_country, ' chkname="Country / Region" chkrule="isselect" id="country1"  class="l_select" onchange="update_zone2(this.form);"'); ?>        </td>
      </tr>
			<tr id="zone_id_tr2">
			  <td class="g_t_r b"><?php echo ENTRY_STATE.(zen_not_null(ENTRY_STATE_TEXT)?'&nbsp;<span class="red">' . ENTRY_STATE_TEXT . '</span>':''); ?></td>
		    <td colspan="3"><select id="stateZone1" class="l_select" chkname="State/Province/Region" chkrule="isselect"  name="zone_id1">
			<option value="">Please select ...</option>
			<?php 
			global $db;
			$states = $db->Execute("select zone_name, zone_id from " . TABLE_ZONES . " where zone_country_id = 223 order by zone_name");
				
				while (!$states->EOF){
				
				echo "<option value='".$states->fields['zone_id']."'>".$states->fields['zone_name']."</option>";
				$states->MoveNext();
			  }
			  ?>
            </select>			</td></tr>
			<tr id="zone_id_tr12" style="display:none;">
			  <td align="right"><strong><?php echo ENTRY_STATE.(zen_not_null(ENTRY_STATE_TEXT)?'&nbsp;<span class="red">' . ENTRY_STATE_TEXT . '</span>':''); ?></strong></td>
			  <td colspan="3"><input id="state1" type="text" class="l_input" maxlength="40" value="<?php echo ($entry->fields['entry_zone_id']==0)?$entry->fields['entry_state']:$entry->fields['entry_zone_id']; ?>" name="state1"/></td>
		  </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_POST_CODE; ?><span class="red">*</span></td>
        <td colspan="3"><?php echo zen_draw_input_field('postcode1', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' chkname="Post/ZIP Code" chkrule="nnull/min4" id="postcode1" class="s_input"') ; ?></td>
      </tr>
      <tr>
        <td class="g_t_r b"><?php echo ENTRY_PHONE_NUMBER; ?><span class="red">*</span></td>
        <td colspan="3"><?php echo zen_draw_input_field('phone1', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_phone', '40') . 'chkname="Phone" chkrule="nnull/min4/tel" class="s_input" id="phone1"') ; ?>        </td>
      </tr>
      <tr>
        <td class="g_t_r b"></td>
        <td colspan="3"><div style="width: 324px;">Please make sure that the telephone number you typed is correct, during the shipping process, the shipping company might contact you for the delivery. For your security, we may need to contact you at a verified phone number before your order ships. 
        <a target="_blank" href="<?php echo zen_href_link(FILENAME_PRIVACY); ?>">view our privacy policy.</a></div></td>
      </tr>
    </tbody>
  </table>
 