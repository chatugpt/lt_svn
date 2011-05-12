<div id="tabs">
  <ul>
    <li><a target="_top" class="one outer" rel="nofollow" href="<?php echo zen_href_link(FILENAME_ACCOUNT,'','SSL')?>"><?php echo BASE_HEAD_ACCOUNT_TITLE; ?>
      <!--[if IE 7]><!--></a><!--<![endif]-->
      <!--[if lte IE 6]><table><tr><td style="position:absolute;left:0;top:0;"><![endif]-->
      <div class="tab_left">
        <p><a target="_top" title="View Orders" rel="nofollow" href="<?php echo zen_href_link(FILENAME_ACCOUNT,'','SSL')?>"> <span><?php echo BASE_HEAD_ACCOUNT_VIEW_ORDERS; ?></span></a></p>
        <p><a target="_top" title="Account Settings" rel="nofollow" href="<?php echo zen_href_link(FILENAME_ACCOUNT_EDIT,'','SSL')?>"><?php echo BASE_HEAD_ACCOUNT_ACCOUNT_SETTING; ?></a></p>
        <p><a target="_top" title="Manage Address Book" rel="nofollow" href="<?php echo zen_href_link(FILENAME_MANAGER_ADDRESS,'','SSL')?>"><?php echo BASE_HEAD_ACCOUNT_MANAGE_ADDRESS; ?></a></p>
      </div>
      <!--[if lte IE 6]></td></tr></table></a><![endif]-->
    </li>
	<li>
		<a class="four outer" rel="nofollow" target="_top" href="<?php echo isset($_SESSION['customer_id'])? 'account.html' : 'order_status.html'; ?>"><?php echo BASE_HEAD_ORDER_STATUS_TITLE; ?></a>
	</li>
    <li><a class="two outer" rel="nofollow" target="_top" href="<?php echo zen_href_link(FILENAME_FAQS,'','SSL')?>"><?php echo BASE_HEAD_HELP_TITLE; ?>
      <!--[if IE 7]><!--></a><!--<![endif]-->
      <!--[if lte IE 6]><table><tr><td style="position:absolute;left:0;top:0;"><![endif]-->
      <div class="tab_center">
        <p><a target="_top" rel="nofollow" href="<?php echo zen_href_link(FILENAME_FAQS); ?>"><?php echo BASE_HEAD_HELP_SUBMIT; ?></a></p>
        <p><a target="_top" rel="nofollow" href="<?php echo zen_href_link(FILENAME_FAQS_ALL) ?>"><?php echo BASE_HEAD_HELP_KNOWLEDGE; ?></a></p>
      </div>
      <!--[if lte IE 6]></td></tr></table></a><![endif]-->
    </li>
    <li class="noborder"><a title="Currencies" rel="nofollow" class="three outer" href="<?php echo $_SERVER['REQUEST_URI'];?>#nogo"><?php echo BASE_HEAD_CURRENCIES_TITLE; ?>: <em><?php echo $currencies->display_symbol_left($_SESSION['currency']);?></em>
      <!--[if IE 7]><!--></a><!--<![endif]-->
      <!--[if lte IE 6]><table><tr><td style="position:absolute;left:0;top:0;"><![endif]-->
      <div class="tab_right">
          <?php
		  //caizhouqing update question_mark
		  $uri = $_SERVER['REQUEST_URI'];
		  if(substr_count($uri,"?") == 0){
		  	$question_mark="?";
		  }else{
		  	$question_mark="&";
		  }
		  
					reset($currencies->currencies);
					while (list($key, $value) = each($currencies->currencies)) { 
					if($key != $_SESSION['currency']){	?>
        	<p><?php echo zen_image($template->get_template_dir($key.'.gif', DIR_WS_TEMPLATE, $current_page_base,'images/icons/flag'). '/'.$key.'.gif',$key,'','',' border="0" class="g_t_m"');?><a target="_top" title="US Dollar" rel="nofollow" href="<?php echo $_SERVER['REQUEST_URI'].$question_mark;?>currency=<?php echo $key?>"><?php echo $value['title'] ?></a></p>
          <?php }}?>
      </div>
      <!--[if lte IE 6]></td></tr></table></a><![endif]-->
    </li>
  </ul>
</div>
<!-- eof: featured products  -->

