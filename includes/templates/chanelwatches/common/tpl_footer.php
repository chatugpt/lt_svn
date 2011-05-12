<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 4821 2006-10-23 10:54:15Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
?>

<?php
if (!isset($flag_disable_footer) || !$flag_disable_footer) {

?>

<!--bof-navigation display -->

<div id="footerblock" class="margin_t maxwidth fl">
<?php
if(MAZENTOP_COMMUNITY_ENABLE) {
?>
<div style="margin-bottom: 10px;" class="allborder pad_10px">
	<div class="fl b big4 line_30px black loin_o_c_left">Join our community  :</div>
	<a href="<?php echo MAZENTOP_COMMUNITY_BLOG_URL; ?>" target="_blank"><img border="0" alt="<?php echo STORE_NAME; ?> Official Blog " class="fl" src="images/mazentop/blog.gif"></a>
	<a href="<?php echo MAZENTOP_COMMUNITY_TWITTER_URL; ?>" target="_blank" rel="nofollow"><img border="0" alt="<?php echo STORE_NAME; ?> on Twitter " class="fl" src="images/mazentop/twitter.gif"></a>	
	<a href="<?php echo MAZENTOP_COMMUNITY_FACEBOOK_URL; ?>" target="_blank" rel="nofollow"><img border="0" alt="<?php echo STORE_NAME; ?> on Facebook " class="fl" src="images/mazentop/facebook.gif"></a>
	<a href="<?php echo MAZENTOP_COMMUNITY_YOUTUBE_URL; ?>" target="_blank" rel="nofollow"><img border="0" alt="<?php echo STORE_NAME; ?> on YouTube " class="fl" src="images/mazentop/youtube.gif"></a>
	<div class="clear"></div>
</div>
<?php
}
?>
<?php
if ($this_is_home_page){
	require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/links_box.php'));
}
?>
<div class="g_t_c">
<?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?>
<?php } ?>
</div>

<!--eof-navigation display -->
<div id="footimg" class="g_t_c">
<?php echo zen_define_page_content('页脚支付物流图标简单页'); ?>
		
    
	</div>
<!--bof- site copyright display -->
<div class="g_t_c margin_t"><?php echo zen_define_page_content('页脚版权信息简单页'); ?></div>
<!--eof- site copyright display -->

</div>
<?php
} // flag_disable_footer
?>