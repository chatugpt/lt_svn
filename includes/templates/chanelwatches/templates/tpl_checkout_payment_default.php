<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_payment.<br />
 * Displays the allowed payment modules, for selection by customer.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_payment_default.php 5414 2006-12-27 07:51:03Z drbyte $
 */
?>
<?php echo $payment_modules->javascript_validation(); ?>
  <ul id="projects">
    <li class="li1"><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART,'','SSL') ?>"><span>Your Shopping Cart</span></a></li>
    <li class="li2"><a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING,'','SSL') ?>"><span>Shipping Method</span></a></li>
    <li class="current3"><span>Payment Method</span></li>
    <li class="li4"><span>Review Order</span></li> 
    <li class="li5"><span>Order Complete</span></li>
  </ul>
<div class="ck_w center allborder">
<div class="show pad_10px big">
<?php echo zen_draw_form('checkout_payment', zen_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'), 'post', ($flagOnSubmit ? 'onsubmit="return check_form();"' : '')); ?>

<?php if ($messageStack->size('redemptions') > 0) echo $messageStack->output('redemptions'); ?>
<?php if ($messageStack->size('checkout') > 0) echo $messageStack->output('checkout'); ?>
<?php if ($messageStack->size('checkout_payment') > 0) echo $messageStack->output('checkout_payment'); ?>

<?php
  if (DISPLAY_CONDITIONS_ON_CHECKOUT == 'true') {
?>
<fieldset>
<legend><b><?php echo TABLE_HEADING_CONDITIONS; ?></b></legend>
<div><?php echo TEXT_CONDITIONS_DESCRIPTION;?></div>
<?php echo  zen_draw_checkbox_field('conditions', '1', false, 'id="conditions"');?>
<label class="checkboxLabel" for="conditions"><?php echo TEXT_CONDITIONS_CONFIRM; ?></label>
</fieldset>
<?php
  }
?>
<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      if (!$payment_modules->in_special_checkout()) {
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>
<h4 id="checkoutPaymentHeadingAddress" class="dark_bg margin_t bg_car"><?php echo TITLE_BILLING_ADDRESS; ?></h4>

<div id="checkoutBillto" class="pad_10px">
<?php if (MAX_ADDRESS_BOOK_ENTRIES >= 2) { ?>
<div class="pad_10px fr"><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_PAYMENT_ADDRESS, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_CHANGE_ADDRESS, BUTTON_CHANGE_ADDRESS_ALT) . '</a>'; ?></div>
<?php } ?>
<ul><?php echo zen_address_label($_SESSION['customer_id'], $_SESSION['billto'], true, ' ', '<br />'); ?></ul>
<div class="pad_10px blue_bg margin_t"><?php echo TEXT_SELECTED_BILLING_DESTINATION; ?></div>
</div>
<br class="clear" />
<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      }
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>
<h4 class="dark_bg margin_t bg_cart"><div class="check_order_w">Items Ordered</div></h4>
<div class="pad_10px">
      <table border="0" width="100%" cellspacing="0" cellpadding="0" id="table_info_l">
        <tr class="cartTableHeading">
        <th scope="col" id="ccQuantityHeading" width="60"><?php echo TABLE_HEADING_QUANTITY; ?></th>
        <th scope="col" id="ccProductsHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th>
<?php
  // If there are tax groups, display the tax columns for price breakdown
  if (sizeof($order->info['tax_groups']) > 1) {
?>
          <th scope="col" id="ccTaxHeading"><?php echo HEADING_TAX; ?></th>
<?php
  }
?>
          <th scope="col" id="ccTotalHeading"><?php echo TABLE_HEADING_TOTAL; ?></th>
        </tr>
<?php // now loop thru all products to display quantity and price ?>
<?php for ($i=0, $n=sizeof($order->products); $i<$n; $i++) { ?>
        <tr class="<?php echo $order->products[$i]['rowClass']; ?>">
          <td  class="cartQuantity"><?php echo $order->products[$i]['qty']; ?>&nbsp;x</td>
          <td class="cartProductDisplay"><?php echo $order->products[$i]['name']; ?>
          <?php  echo $stock_check[$i]; ?>

<?php // if there are attributes, loop thru them and display one per line
    if (isset($order->products[$i]['attributes']) && sizeof($order->products[$i]['attributes']) > 0 ) {
    echo '<ul class="cartAttribsList">';
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
?>
      <li><?php echo $order->products[$i]['attributes'][$j]['option'] . ': ' . nl2br(zen_output_string_protected($order->products[$i]['attributes'][$j]['value'])); ?></li>
<?php
      } // end loop
      echo '</ul>';
    } // endif attribute-info
?>
        </td>

<?php // display tax info if exists ?>
<?php if (sizeof($order->info['tax_groups']) > 1)  { ?>
        <td class="cartTotalDisplay">
          <?php echo zen_display_tax_value($order->products[$i]['tax']); ?>%</td>
<?php    }  // endif tax info display  ?>
        <td class="cartTotalDisplay">
          <?php echo $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']);
          if ($order->products[$i]['onetime_charges'] != 0 ) echo '<br /> ' . $currencies->display_price($order->products[$i]['onetime_charges'], $order->products[$i]['tax'], 1);
?>
        </td>
      </tr>
<?php  }  // end for loopthru all products ?>
      </table>
<fieldset id="checkoutOrderTotals" class="dark_border">
<legend id="checkoutPaymentHeadingTotal"><b><?php echo TEXT_YOUR_TOTAL; ?></b></legend>
<?php
  if (MODULE_ORDER_TOTAL_INSTALLED) {
    $order_totals = $order_total_modules->process();
    $order_total_modules->output();
  }
?>
</fieldset>

<?php
  $selection =  $order_total_modules->credit_selection();
  if (sizeof($selection)>0) {
    for ($i=0, $n=sizeof($selection); $i<$n; $i++) {
      if ($_GET['credit_class_error_code'] == $selection[$i]['id']) {
?>
<div class="messageStackError"><?php echo zen_output_string_protected($_GET['credit_class_error']); ?></div>

<?php
      }
      for ($j=0, $n2=sizeof($selection[$i]['fields']); $j<$n2; $j++) {
?>
<fieldset class="dark_border pad_10px">
<legend><b><?php echo $selection[$i]['module']; ?></b></legend>
<?php echo $selection[$i]['redeem_instructions']; ?>
<div class=""><?php echo $selection[$i]['checkbox']; ?></div>
<label class="inputLabel"<?php echo ($selection[$i]['fields'][$j]['tag']) ? ' for="'.$selection[$i]['fields'][$j]['tag'].'"': ''; ?>>
<?php echo $selection[$i]['fields'][$j]['title']; ?></label>
<?php echo $selection[$i]['fields'][$j]['field']; ?>
</fieldset>
<?php
      }
    }
?>

<?php
    }
?>

<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      if (!$payment_modules->in_special_checkout()) {
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>
<fieldset class="dark_border pad_10px">
<legend><b><?php echo TABLE_HEADING_PAYMENT_METHOD; ?></b></legend>

<?php
  if (SHOW_ACCEPTED_CREDIT_CARDS != '0') {
?>

<?php
    if (SHOW_ACCEPTED_CREDIT_CARDS == '1') {
      echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled();
    }
    if (SHOW_ACCEPTED_CREDIT_CARDS == '2') {
      echo TEXT_ACCEPTED_CREDIT_CARDS . zen_get_cc_enabled('IMAGE_');
    }
?>

<?php } ?>

<?php
  foreach($payment_modules->modules as $pm_code => $pm) {
    if(substr($pm, 0, strrpos($pm, '.')) == 'googlecheckout') {
      unset($payment_modules->modules[$pm_code]);
    }
  }
  $selection = $payment_modules->selection();

  if (sizeof($selection) > 1) {
?>
<p class="important"><?php echo TEXT_SELECT_PAYMENT_METHOD; ?></p>
<?php
  } elseif (sizeof($selection) == 0) {
?>
<p class="important"><?php echo TEXT_NO_PAYMENT_OPTIONS_AVAILABLE; ?></p>

<?php
  }
?>

<?php
  $radio_buttons = 0;
  for ($i=0, $n=sizeof($selection); $i<$n; $i++) {
?>
<?php
    if (sizeof($selection) > 1) {
        if (empty($selection[$i]['noradio'])) {
 ?>
<?php echo zen_draw_radio_field('payment', $selection[$i]['id'], ($selection[$i]['id'] == $_SESSION['payment'] ? true : false), 'id="pmt-'.$selection[$i]['id'].'"'); ?>
<?php   } ?>
<?php
    } else {
    	
?>
<?php echo zen_draw_hidden_field('payment', $selection[$i]['id']); ?>
<?php
    }
?>
<label for="pmt-<?php echo $selection[$i]['id']; ?>" class="radioButtonLabel"><?php echo $selection[$i]['module']; ?></label>

<?php
    if (defined('MODULE_ORDER_TOTAL_COD_STATUS') && MODULE_ORDER_TOTAL_COD_STATUS == 'true' and $selection[$i]['id'] == 'cod') {
?>
<div class="alert"><?php echo TEXT_INFO_COD_FEES; ?></div>
<?php
    } else {
      // echo 'WRONG ' . $selection[$i]['id'];
?>
<?php
    }
?>
<br class="clearBoth" />

<?php
    if (isset($selection[$i]['error'])) {
?>
    <div><?php echo $selection[$i]['error']; ?></div>

<?php
    } elseif (isset($selection[$i]['fields']) && is_array($selection[$i]['fields'])) {
?>

<div class="ccinfo">
<?php
      for ($j=0, $n2=sizeof($selection[$i]['fields']); $j<$n2; $j++) {
?>
<ul class="margin_t">
<label <?php echo (isset($selection[$i]['fields'][$j]['tag']) ? 'for="'.$selection[$i]['fields'][$j]['tag'] . '" ' : ''); ?>><?php echo $selection[$i]['fields'][$j]['title']; ?></label><br/><?php echo $selection[$i]['fields'][$j]['field']; ?><br/>
</ul>
<?php
      }
?>
</div>

<?php
    }
    $radio_buttons++;
?>
<br class="clearBoth" />
<?php
  }
?>

</fieldset>
<?php // ** BEGIN PAYPAL EXPRESS CHECKOUT **
      } else {
        ?><input type="hidden" name="payment" value="<?php echo $_SESSION['payment']; ?>" /><?php
      }
      // ** END PAYPAL EXPRESS CHECKOUT ** ?>
<h4 class="dark_bg margin_t bg_pen red"><?php echo TABLE_HEADING_COMMENTS; ?></h4>
<div class="pad_l_28px margin_t big_">
<ul>
  If you have special instructions for your order such as dropshipping order, gift order etc, please let us know!<br/>

  </ul>
<ul class="shipping_textarea">
<?php echo zen_draw_textarea_field('comments', '45', '3',$_SESSION['comments'],'class="txt_review_cont" onblur=\'if(this.value == "") this.className="txt_review_cont"\' onfocus=\'this.className=""\' style="OVERFLOW:auto;border:1px #ccc solid;height:80px;width:540px;"'); ?>
  </ul>
</div>
</div>
<div class="pad_10px fr g_t_r"><?php echo TITLE_CONTINUE_CHECKOUT_PROCEDURE . TEXT_CONTINUE_CHECKOUT_PROCEDURE; ?><br/>
<?php echo zen_image_submit(BUTTON_IMAGE_CONTINUE_CHECKOUT, BUTTON_CONTINUE_ALT, 'onclick="submitFunction('.zen_user_has_gv_account($_SESSION['customer_id']).','.$order->info['total'].')"'); ?>
</div>
<div class="clear"></div>
</div>
</form>
</div>