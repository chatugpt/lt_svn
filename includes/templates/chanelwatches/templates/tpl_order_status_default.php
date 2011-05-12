<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_login_default.php 5926 2007-02-28 18:15:39Z drbyte $
 caizhouqing update login
 */
 
 //echo $_SESSION['navigation']."222222";
?>

<h2 class="line_60px pad_l_28px"><?php echo HEADING_TITLE; ?></h2>
<div class="ck_w center">
<?php
//if post is not empty
if(!empty($_POST)) {
	if(!empty($order->info)) {
		//match
?>
		<div id="OrderSummary">
		<h4 class="dark_bg margin_t bg_in"><?php echo 'Order Infomation'; ?></h4>
		<ul class="pad_l_28px margin_t">
		<strong><?php echo 'Order Date'?></strong> <?php echo zen_date_long($order->info['date_purchased']) ?><br/>
		<strong>Order #: </strong> <?php echo zen_get_order_no($order_id); ?><br/>
		<strong>Order Total: </strong> <?php echo $order->totals[sizeof($order->totals)-1]['text']; ?><br />
		<strong>Order Status: </strong> <?php echo $statuses->fields['orders_status_name']; ?> 
		<?php
		/**
		* Used to display any downloads associated with the cutomers account
		*/
		if (DOWNLOAD_ENABLED == 'true') require($template->get_template_dir('tpl_modules_downloads.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_downloads.php');
		?>  
		</ul>
		
		<h4 class="dark_bg margin_t bg_car">
		<div class="halfwidth fl"><?php echo 'Delivery Address'; ?> </div>
		<?php echo 'Billing Address'; ?>
		</h4>
		<ul class="pad_l_28px margin_t">
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
		<h4 class="dark_bg margin_t bg_doc"><?php echo 'Shipping Method'; ?></h4>
		<ul class="pad_l_28px margin_t"><?php echo $order->info['shipping_method']; ?></ul>
		<?php } else { // temporary just remove these 4 lines ?>
		<ul class="error_box"><?php echo TEXT_MISSING_SHIPPING_MISS; ?></ul>
		<?php
		}
		?>
		
		<h4 class="dark_bg margin_t bg_dollar"><?php echo 'Payment Method'; ?></h4>
		<ul class="pad_l_28px margin_t"><?php echo $order->info['payment_method']; ?></ul>
		
		
		<h4 class="dark_bg margin_t bg_cart"><div class="check_order_w">Items Ordered</div>Price</h4>
		<ul class="pad_l_28px margin_t">
		<?php
		$n= count($order->products);
		for($i=0; $i<$n; $i++) {
		?>
		<li class="check_order_w"><?php echo '<a href="'.zen_href_link(zen_get_info_page($order->products[$i]['id']),'products_id='.$order->products[$i]['id']).'">'.$order->products[$i]['qty'] . QUANTITY_SUFFIX .$order->products[$i]['name'] .'</a>';?>
		
		<?php // if there are attributes, loop thru them and display one per line
		if (isset($order->products[$i]['attributes']) && sizeof($order->products[$i]['attributes']) > 0 ) {
		echo '<ul class="pad_1em">';
		for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
		?>
		<li><?php echo $order->products[$i]['attributes'][$j]['option'] . ': ' . nl2br(zen_output_string_protected($order->products[$i]['attributes'][$j]['value'])); ?></li>
		<?php
		} // end loop
		echo '</ul>';
		} // endif attribute-info
		?>
		</li>
		<li><?php echo $currencies->format(zen_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . ($order->products[$i]['onetime_charges'] != 0 ? '<br />' . $currencies->format(zen_add_tax($order->products[$i]['onetime_charges'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']) : '') ?>    </li>
		<?php
		}
		unset($n);
		?>
		</ul>
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
		</div>
<?php
	} else {
		//no match
?>
		<p class="margin_t">
		<span><?php echo ENTRY_ORDER_NUMBER; ?><span class="red"><?php echo $order_no; ?></span></span><br />
		<span><?php echo ENTRY_EMAIL_ADDRESS; ?><span class="red"><?php echo $order_em; ?></span></span><br />
		<span><?php echo ORDERSTATUS_NOTFOUND; ?></span>
		</p>
<?php
	}
} else {
?>
	<?php if ($messageStack->size('login') > 0) echo $messageStack->output('login'); ?>
	
	<!--BOF normal login-->
	<?php
	  if ($_SESSION['cart']->count_contents() > 0) {
	?>
	<div class="advisory"><?php echo TEXT_VISITORS_CART; ?></div>
	<?php
	  }
	?>
	<?php echo zen_draw_form('login', zen_href_link(FILENAME_LOGIN, 'action=process', 'SSL'),'post','id="logins" onsubmit="return(fmChk(this))"'); ?>
	<div class="fl ck_w_m allborder">
	<div class="check_box_tit black pad_1em"><?php echo HEADING_RETURNING_CUSTOMER; ?></div>
	<div class="pad_10px">
	<p>
	<?php echo BASE_COMMON_TEXT_IFHAVEANACCOUNT; ?>
	</p>
	<ul>
	<li class="margin_t">
	<?php echo ENTRY_EMAIL_ADDRESS; ?>
	<br />
	<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' id="login-email-address" class="input_box" chkName="email address" chkRule="nnull/min6/eml" size = "41" maxlength= "96"'); ?>
	</li>
	<li class="margin_t">
	<?php echo ENTRY_PASSWORD; ?>
	<br />
	<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password') . ' chkrule="nnull/min5" chkname="password" id="login-password" class="input_box"'); ?>
	</li>
	<li class="line_60px">
	<?php echo '<a href="' . zen_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '"  class="red u">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?>
	</li>
	<li class="margin_t">
	<?php echo zen_draw_hidden_field('securityToken', $_SESSION['securityToken']); ?>
	<div><?php echo zen_image_submit(BUTTON_IMAGE_LOGIN, BUTTON_LOGIN_ALT); ?></div>
	</li>
	</ul>
	 <?php 
	  // ** GOOGLE CHECKOUT **
		include(DIR_WS_MODULES . 'show_google_components.php');  
	  // ** END GOOGLE CHECKOUT **
	 ?>
	</div>
	</div>
	</form>	
	<script>
	 initForm('logins');
	</script>
	
	<form name="order_status_form" method="post" action="" onsubmit="return check_order_form();">
	<div class="fr ck_w_m allborder">
	<div class="check_box_tit black pad_1em"><?php echo HEADING_NEW_CUSTOMER; ?></div>
	<div class="pad_10px">
	<ul>
	<?php echo TEXT_NEW_CUSTOMER_INTRODUCTION; ?>
	</ul>
	<p class="margin_t">
					<span><?php echo ENTRY_ORDER_NUMBER; ?>(e.g.# 0911020100375457)</span><br />
					<span><input class="input_box" type="text" name="order_number" /></span>
				</p>
				<p class="margin_t">
					<span><?php echo ENTRY_EMAIL_ADDRESS; ?></span><br />
					<span><input class="input_box" type="text" name="order_email" /></span>
				</p>
				<p class="margin_t">
					<input type="image" src="includes/templates/<?php echo $template_dir; ?>/images/btn_contioue.gif" />
				</p>
	</div>
	</div>
	</form>
	<!--EOF normal login-->
<?php
}
?>
</div>