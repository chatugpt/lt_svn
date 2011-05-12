<?php
//echo $body_code; echo $current_page;
  if (in_array($current_page_base,explode(",",'list_pages_to_skip_all_right_sideboxes_on_here,separated_by_commas,and_no_spaces')) ) {
    $flag_disable_right = true;
  }
  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = ($this_is_home_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);
  if ($_GET['main_page']=='product_info'){$zv_onload = "oneload()";}
?>
<body id="<?php echo $body_id . 'Body'; ?>"<?php if($zv_onload !='') echo ' onload="'.$zv_onload.'"'; ?>>
<div id="wrapper"><!-- wrapper S-->
<div id="pop_window" style="display:none"></div>
<?php
if (isset($_GET['c']) and $_GET['c'] == 'only'){
  echo '<div class="comm1">';
}else{
  switch ($current_page){
    case 'faqs_submit':
      echo '<div class="new1">';
      break;
    case 'shipping_estimator':
      echo '<div>';
      break;
    case 'print_page':
      echo '<div class="chanelwatches" style="width: 760px;">';
      break;
    case 'checkout_shipping':
    case 'checkout_payment':
    case 'checkout_login':
    case 'checkout_shipping_address':
    case 'address_book_process':
    	echo '<div class="chanelwatches">';
    	break;
    default:
    	echo '<div class="chanelwatches">';
  }	
}

?>
<!-- content S-->
<?php

 /**
  * prepares and displays header output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_header = true;
  }
  require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');?>
 <?php
//addPage
if(!$this_is_home_page and ($current_page != 'login') and ($current_page != 'order_status') and ($current_page != 'print_page') and ($current_page != 'advanced_search') and ($current_page != 'shopping_cart') and ($current_page != 'checkout_shipping_address') and ($current_page != 'address_book_process') and ($current_page != 'checkout_payment_address') and ($current_page != 'checkout_shipping') and ($current_page != 'checkout_login') and ($current_page != 'checkout_payment') and ($current_page != 'checkout_confirmation') and ($current_page != 'checkout_success')and $current_page != 'faqs_submit' and $current_page != 'shipping_estimator' and (!isset($_GET['c']) and $_GET['c'] == '')){
?>
<div id="navblock" class="fl">
  <?php
		require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/dropdown_categories_css.php');
?>
  <div class="maxframe">
    <!--bof-header ezpage links-->
    <?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
    <?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
    <?php } ?>
    <!--eof-header ezpage links-->
    <div>
      <ul class="fr" id="nav_chat">
        <span id="nav_chat_sales">
        <?php if(LIVE_HELP_ADMIN_1_NAME != ''){?>
        <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_1_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_1_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_1_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_1_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_1_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_1_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
        <?php }?>
        <?php if(LIVE_HELP_ADMIN_2_NAME != ''){?>
        <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_2_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_2_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_2_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_2_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_2_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_2_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
        <?php }?>
        <?php if(LIVE_HELP_ADMIN_3_NAME != ''){?>
        <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_3_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_3_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_3_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_3_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_3_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_3_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
        <?php }?>
        <?php if(LIVE_HELP_ADMIN_4_NAME != ''){?>
        <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_4_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_4_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_4_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_4_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_4_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_2_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
        <?php }?>
        </span>
      </ul>
      <script>marquee(3000, 15 ,0 ,'nav_chat_sales');</script>
    </div>
    <!--bof-navigation display-->
    <?php require(DIR_WS_MODULES . 'sideboxes/search_header.php');?>
    <!--eof-navigation display-->
  </div>
  <?php
		if (isset($current_category_id) and $current_category_id != ''){
			if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
				if ($banner->RecordCount() > 0) {
		?>
			<div id="bannerThree" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
			<?php
				}
			}
		}
	?>
  <!-- bof  breadcrumb -->
  <?php
  if ($current_page == 'super_savings'){
  	//Do anything
  }else{
		 if (DEFINE_BREADCRUMB_STATUS == '1' || (DEFINE_BREADCRUMB_STATUS == '2' && !$this_is_home_page) ) { ?>
      <div class="fl product_title margin_t pad_1em"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></div>
  		<?php }
  }
	?>
  <!-- eof breadcrumb -->
</div>
<?php		
  }
?>
	<div id="bodyblock">
		<?php
    //addPage
    if($this_is_home_page || $current_page == 'login' || $current_page == 'order_status' || $current_page == 'shopping_cart' || $current_page == 'advanced_search' || $current_page == 'shopping_cart' || $current_page == 'checkout_payment_address' || $current_page == 'checkout_confirmation'|| $current_page == 'checkout_success'){
        if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
          // global disable of column_left
          $flag_disable_left = true;
        }
        if (!isset($flag_disable_left) || !$flag_disable_left) {
    ?>
    <div class="minframe fl">
      <?php
     /**
      * prepares and displays left column sideboxes
      *
      */
      switch($current_page){
        case 'login':
		case 'order_status':
          require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/categories_css.php');
          break;
        case 'shopping_cart':
        case 'checkout_payment_address':
        case 'checkout_confirmation':
        case 'checkout_success':
        case 'time_out':
        case 'faqs_all':
        case 'advanced_search':
          require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/categories_css.php');
		  if($current_page == 'shopping_cart'){
		  	require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/customers_say.php');
		  }else{
          	require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/subscribe.php');
		  }
          break;
        default:
          require(DIR_WS_MODULES . zen_get_module_directory('column_left.php'));
      }
    ?>
    </div>
    <?php
    }
    }
    ?>
		<?php
//addPage
if($this_is_home_page || $current_page == 'login' || $current_page == 'order_status' || $current_page == 'shopping_cart' || $current_page == 'advanced_search' || $current_page == 'time_out'  || $current_page == 'checkout_payment_address' || $current_page == 'checkout_confirmation'|| $current_page == 'checkout_success'){ ?>
<div class="maxframe">
  <?php }elseif ($current_page =='faqs_all' || $current_page =='faqs_submit' ){ ?>
  <div class="fl" style="width:100%;">
    <?php }else { ?>
    <div>
      <?php }?>
      <?php
//addPage
if($this_is_home_page || $current_page == 'login' || $current_page == 'order_status' || $current_page == 'shopping_cart' || $current_page == 'advanced_search' || $current_page == 'checkout_payment_address' || $current_page == 'checkout_confirmation'|| $current_page == 'checkout_success' ){?>
      <div id="header_nav">
        <!--bof-header ezpage links-->
        <?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
        <?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
        <?php } ?>
        <!--eof-header ezpage links-->
        <ul class="fr" id="nav_chat">
          <span id="nav_chat_sales">
          <?php if(LIVE_HELP_ADMIN_1_NAME != ''){?>
          <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_1_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_1_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_1_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_1_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_1_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_1_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
          <?php }?>
          <?php if(LIVE_HELP_ADMIN_2_NAME != ''){?>
          <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_2_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_2_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_2_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_2_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_2_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_2_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
          <?php }?>
          <?php if(LIVE_HELP_ADMIN_3_NAME != ''){?>
          <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_3_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_3_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_3_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_3_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_3_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_3_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
          <?php }?>
          <?php if(LIVE_HELP_ADMIN_4_NAME != ''){?>
          <p style="margin-top: 0px;"> <a aim="" yahoo="<?php echo LIVE_HELP_ADMIN_4_YAHOO; ?>" email="<?php echo LIVE_HELP_ADMIN_4_EMAIL; ?>" skype="<?php echo LIVE_HELP_ADMIN_4_SKYPE; ?>" msn="<?php echo LIVE_HELP_ADMIN_4_MSN; ?>" onClick="show_chat_div(this);" title="<?php echo LIVE_HELP_ADMIN_4_NAME; ?>" class="red" href="javascript:void(0);"><strong><?php echo LIVE_HELP_ADMIN_2_NAME; ?></strong> </a> <em> is Online to help you.</em> </p>
          <?php }?>
          </span>
        </ul>
      </div>
      <script>marquee(3000, 15 ,0 ,'nav_chat_sales');</script>
      <?php
	  //bof-navigation display
	   require(DIR_WS_MODULES . 'sideboxes/search_header.php');
	   //eof-navigation display
	   ?>
      <?php } ?>
      <?php
	  //bof upload alerts
	   if ($messageStack->size('upload') > 0) echo $messageStack->output('upload'); 
	   //eof upload alerts
	   ?>
      <?php
			 /**
				* prepares and displays center column
				*
				*/
				require($body_code);
				?>
 
    </div>
    <?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2 and $this_is_home_page) { ?>
    <div class="blue_con fl maxwidth margin_t">
      <?php echo zen_define_page_content('WHY BUY * FROM US模块简单页'); ?>
    </div>
    <?php } ?>
    <?php if($this_is_home_page){
			require($template->get_template_dir('tpl_modules_bottom_featured.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_bottom_featured.php');
			}?>
		<?php
   /**
    * prepares and displays footer output
    *
    */
    if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
      $flag_disable_footer = true;
    }
    require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
    ?>

<br class="clear"/>
</div><!-- content E-->
</body>
