<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=account_edit.<br />
 * Displays information related to a single specific order
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_account_history_info_default.php 6247 2007-04-21 21:34:47Z wilt $
 */
?>
<div class="minframe fl">
<?php
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/box_contact_us.php'));
?>
<div class="bg_box_gray margin_t allborder clear">
<h3 class="in_1em line_30px">My Account</h3>
  <div class="pad_10px pad_t">
  <ul class="red_arrow_list">
  <li><a class="red b" href="<?php echo zen_href_link(FILENAME_ACCOUNT,'','SSL');?>">View Orders</a></li>
  <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT_EDIT,'','SSL');?>">Account Settings</a></li>
  <li><a href="<?php echo zen_href_link(FILENAME_MANAGER_ADDRESS,'','SSL');?>">Manage Address Book</a></li>
  </ul>
  </div>
</div>
<?
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/account_order_search.php'));
?>
<div class="bg_box_gray margin_t allborder clear">
  <h3 class="in_1em line_30px">Need help</h3>
    <span class="pad_10px pad_t block">If you have questions or need help with your account, you may <a class="u" href="<?php echo zen_href_link(FILENAME_FAQS,'','SSL') ?>">contact us</a> to assist you.  </span>
</div>
</div>
<div class="order_layer allborder right_big_con margin_t" id="layer_switch">
<?php if ($messageStack->size('views_order') > 0) echo $messageStack->output('views_order'); ?>
<?php if ($customer_info->RecordCount()>0) {?>
<div evt="click" id="boxswitch" class="">
      <div title="OrderSummary" class="on"><span>Order Summary</span></div>
      <div title="OrderStatus" id="border_left" class="off"><span><?php echo HEADING_ORDER_HISTORY; ?></span></div>
</div>
<div id="OrderSummary" class="show">
<h4 class="dark_bg margin_t bg_in"><?php echo TEXT_ORDER_INFORMATION; ?></h4>
<ul class="pad_l_28px margin_t">
        <strong><?php echo HEADING_ORDER_DATE?></strong> <?php echo zen_date_long($order->info['date_purchased']) ?><br/>
      <strong>Order #: </strong> <?php echo zen_get_order_no($order_id); ?><br/>
      <strong>Order Total: </strong> <?php echo $order->totals[sizeof($order->totals)-1]['text']; ?> 
<?php
/**
 * Used to display any downloads associated with the cutomers account
 */
  if (DOWNLOAD_ENABLED == 'true') require($template->get_template_dir('tpl_modules_downloads.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_downloads.php');
?>  
      </ul>
<br class="clear" />

<h4 class="dark_bg margin_t bg_car">
<div class="halfwidth fl"><?php echo HEADING_DELIVERY_ADDRESS; ?> </div>
<?php echo HEADING_BILLING_ADDRESS; ?>
</h4>
<ul class="pad_l_28px clear margin_t">
<?php
  if ($order->delivery != false) {
?>
<li class="fl halfwidth"><?php echo zen_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br />'); ?></li>
<?php
  }
?><li><?php echo zen_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br />'); ?></li></ul>
<?php
    if (zen_not_null($order->info['shipping_method'])) {
?>
<h4 class="dark_bg margin_t bg_doc clear"><?php echo HEADING_SHIPPING_METHOD; ?></h4>
<ul class="pad_l_28px margin_t"><?php echo $order->info['shipping_method']; ?></ul>
<?php } else { // temporary just remove these 4 lines ?>
<ul class="error_box"><?php echo TEXT_MISSING_SHIPPING_MISS; ?></ul>
<?php
    }
?>

<h4 class="dark_bg margin_t bg_dollar"><?php echo HEADING_PAYMENT_METHOD; ?></h4>
<ul class="pad_l_28px margin_t"><?php echo $order->info['payment_method']; ?></ul>


<h4 class="dark_bg margin_t bg_cart"><div class="check_order_w">Items Ordered</div>Price</h4>
<table class="pad_l_28px margin_t" width="100%" cellpadding="0" cellspacing="0">
<?php
  $n= count($order->products);
  for($i=0; $i<$n; $i++) {
  ?>
    <tr><td class="check_order_w" style="border-bottom:1px dashed #ddd;"><?php echo '<a href="'.zen_href_link(zen_get_info_page($order->products[$i]['id']),'products_id='.$order->products[$i]['id']).'">'.$order->products[$i]['qty'] . QUANTITY_SUFFIX .$order->products[$i]['name'] .'</a>';?>
    
<?php // if there are attributes, loop thru them and display one per line
    if (isset($order->products[$i]['attributes']) && sizeof($order->products[$i]['attributes']) > 0 ) {
    echo '<table class="pad_1em" cellpadding="0" cellspacing="0">';
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
?>
      <tr><td><?php echo $order->products[$i]['attributes'][$j]['option'] . ': ' . nl2br(zen_output_string_protected($order->products[$i]['attributes'][$j]['value'])); ?></td><tr>
<?php
      } // end loop
      echo '</table>';
    } // endif attribute-info
?>
    </td>
    <td style="with:100%;border-bottom:1px dashed #ddd;width:110px;"><?php echo $currencies->format(zen_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . ($order->products[$i]['onetime_charges'] != 0 ? '<br />' . $currencies->format(zen_add_tax($order->products[$i]['onetime_charges'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']) : '') ?>    </td></tr>
<?php
  }
  unset($n);
?>
</table>
<hr class="clear"/>
<div class="g_t_r">
<?php
  $n=sizeof($order->totals);
  for ($i=0; $i<$n; $i++) {
  	if($i+1 == $n){
    echo '<br/><strong>'.$order->totals[$i]['title'].' '.$order->totals[$i]['text'].'</strong>'; 
  	}else {
    echo $order->totals[$i]['title'].' '.$order->totals[$i]['text'].'<br/>'; 
  	}
  }
  unset($n);
  
  //echo "eeeeee".$order->query(47);
?>
</div>
<hr/>
<div class="g_t_r margin_t">
    <a title="Print an Invoice" href="javascript:window.print();">
    <img border="0" alt="wholesale Print an Invoice" title="wholesale Print an Invoice " src="includes/templates/<?php echo $template_dir; ?>/images/button/btn_order.gif"/>    </a>
        </div>

<?php
  $radio_buttons = 0;
  if($_SESSION['coupons']['payment_choose']!=""){$payment_a = $_SESSION['coupons']['payment_choose'];}else{$payment_a = "paypal";}
  $n=sizeof($selection);
  for ($i=0; $i<$n; $i++) {
  	echo '<li class="margin_t">';
    if (sizeof($selection) > 1) {
      if (empty($selection[$i]['noradio'])) {
        echo zen_draw_radio_field('payment', $selection[$i]['id'], ($selection[$i]['id'] == $payment_a ? true : false), 'id="'.$selection[$i]['id'].'"  onclick="showExplain(this)"');
			}
    } else {
      echo zen_draw_hidden_field('payment', $selection[$i]['id']);

    }
	$selection[$i]['id'];
?>
	<label for="<?php echo $selection[$i]['id']; ?>" ><?php echo $selection[$i]['module']; ?></label>
		<div class="pad_l_28px">
      <span style="display: <?php if($_SESSION['coupons']['payment_choose'] == $selection[$i]['id']){echo "block";}else{echo "none";}?>;" name="spBox" id="spBox" class="allborder pad_10px">
        <ul>
          <?php echo $selection[$i]['info']; ?>
        </ul>
      </span>
    </div>
<?php
    if (defined('MODULE_ORDER_TOTAL_COD_STATUS') && MODULE_ORDER_TOTAL_COD_STATUS == 'true' and $selection[$i]['id'] == 'cod') {
?>
      <div class="alert"><?php echo TEXT_INFO_COD_FEES; ?></div>
<?php
    } else {
       //echo 'WRONG ' . $selection[$i]['id'];
    }
?>

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
<label <?php echo (isset($selection[$i]['fields'][$j]['tag']) ? 'for="'.$selection[$i]['fields'][$j]['tag'] . '" ' : ''); ?>></label>
<?php //echo $selection[$i]['fields'][$j]['field']; ?>
</ul>
<?php
      }
?>
</div>
<?php
    }
    $radio_buttons++;
    echo '</li>';
  }
  unset($n);
?>


</div>
<div id="OrderStatus" class="hide">
<?php
/**
 * Used to loop thru and display order status information
 */
if (sizeof($statusArray)) {
?>
<table border="0" width="100%" class="table_orders margin_t" cellspacing="0" cellpadding="0">

    <tr class="tableHeading">
        <th width="140" height="33" class="gray_bg"><?php echo TABLE_HEADING_STATUS_DATE; ?></th>
        <th width="120" class="gray_bg"><?php echo TABLE_HEADING_STATUS_ORDER_STATUS; ?></th>
        <th class="gray_bg"><?php echo TABLE_HEADING_STATUS_COMMENTS; ?></th>
       </tr>
<?php
  foreach ($statusArray as $statuses) {
?>
    <tr>
        <td valign="top"><?php echo zen_date_short($statuses['date_added']); ?></td>
        <td valign="top"><?php echo $statuses['orders_status_name']; ?></td>
        <td valign="top"><?php echo (empty($statuses['comments']) ? '&nbsp;' : nl2br(zen_output_string_protected($statuses['comments']))); ?></td> 
     </tr>
<?php
  }
?>
</table>
<?php } ?>
    </div>
<script>layerswich();</script>
<?php } ?>
</div>