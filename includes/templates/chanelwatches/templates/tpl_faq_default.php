<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: faq_manager.php 001 2005-03-27 dave@open-operations.com
//
?>
<div class="minframe fl">
<?php
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/box_contact_us.php'));
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/faq_categories_css.php'));
?>
</div>
<div class="right_big_con margin_t">
<div class="fl midframe flow">
<h2 class="line_30px border_b block"><?php echo HEADING_TITLE; ?></h2>
<div class="margin_t">
	<ul class="line_120" id="help_nav">
<li onclick="hs(this)" to="new1" id="comm" class="normal"><a onfocus="if( this.blur ) this.blur();" href="javascript:void(0);">
  <span id="border_left" class="border_r"><strong class="ico2 u">WRITE A INQUIRY</strong><br/>
	for Submit Inquiry!</span></a></li>
<li onclick="hs(this)" to="comm1" id="new" class="active"><a onfocus="if( this.blur ) this.blur();" href="javascript:void(0);">
<span class="border_r"><strong class="ico1 u">CONTACT US</strong><br/>Need more infomation before you buy, click here!</span></a></li>
	</ul>
	<div>
<iframe width="100%" scrolling="no" height="500" frameborder="0" src="faqs_submit.html?c=only" style="display: block;" id="new1"></iframe>
<iframe width="100%" scrolling="no" height="1000" frameborder="0" src="contact_us_frame.html?c=only" style="display: none;" id="comm1"></iframe>
	</div>
	</div>
</div>
<div class="therightframe fr">
<a href="<?php echo zen_href_link(FILENAME_FAQS_ALL);?>"><?php echo zen_image($template->get_template_dir('kbbutton.jpg', DIR_WS_TEMPLATE, $current_page_base,'images'). '/kbbutton.jpg') ?></a>
<?php
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/customers_say.php'));
?>
</div>
<div class="clear"></div>
<div class="right_big_con">
<?php
	$mostViewedSql = "SELECT f.`faqs_id`, fd.`faqs_name`, fd.`faqs_viewed` FROM faqs f, faqs_description fd
												WHERE fd.faqs_id=f.faqs_id AND f.`faqs_status` = 1
												AND fd.language_id = ".(int)$_SESSION['languages_id']."
												ORDER BY fd.`faqs_viewed` DESC LIMIT 10";
	$mostViewed = $db->Execute($mostViewedSql);
	
	$latestArticlesSql = "SELECT f.`faqs_id`, fd.`faqs_name` FROM faqs f, faqs_description fd
												WHERE fd.faqs_id=f.faqs_id AND f.`faqs_status` = 1
												AND fd.language_id = ".(int)$_SESSION['languages_id']."
												ORDER BY f.`faqs_date_added` DESC LIMIT 10";
	$latestArticles = $db->Execute($latestArticlesSql);
	if($latestArticles->RecordCount()>0){
?>
<h2 class="border_b margin_t"><span style="padding-right: 510px;"><?php echo TEXT_MOST_VIEWED_LEFT;?></span><span><?php echo TEXT_MOST_VIEWED_RIGHT; ?></span></h2>
<div class="pad_10px">
<ul class="red_arrow_list">
<?php
	while(!$mostViewed->EOF){
		echo '<li class="tt"><a href="'.zen_href_link(zen_get_info_faq_page($mostViewed->fields['faqs_id']),'fcPath='.$fcPath.'&faqs_id='.$mostViewed->fields['faqs_id']).'">'.$mostViewed->fields['faqs_name'].'</li><li style="background:none;">'.$mostViewed->fields['faqs_viewed'].'</a></li>';
		$mostViewed->MoveNext();
	}?>
</ul>
</div>
<?php }
if($latestArticles->RecordCount()>0){
?>
<h2 class="border_b margin_t clear"><?php echo TEXT_LATEST_ARTICLES;?></h2>
<ul class="red_arrow_list pad_10px">
<?php
	while(!$latestArticles->EOF){
		echo '<li><a href="'.zen_href_link(zen_get_info_faq_page($latestArticles->fields['faqs_id']),'fcPath='.$fcPath.'&faqs_id='.$latestArticles->fields['faqs_id']).'">'.$latestArticles->fields['faqs_name'].'</a></li>';
		$latestArticles->MoveNext();
	}?>
</ul>

<?php } ?>
</div>
</div>

<script language="javascript" type="text/javascript"><!--
function hs(tab) {
 var tabs = tab.parentNode.getElementsByTagName('li');
 for (var i = 0; i < tabs.length; i++) {
 var tid = tabs[i].getAttribute('to');
 if (tid==null)
 continue;
 var div = document.getElementById(tid);
 div.style.display = (tab == tabs[i]) ? '' : 'none';
 tabs[i].className = (tab == tabs[i]) ? 'normal' : 'active';
}
}
function popupWindow(url) {
  //window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=260,height=375,screenX=150,screenY=100,top=100,left=150')
    window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=600,height=420,screenX=150,screenY=100,top=100,left=150')
}
//-->
</script>
