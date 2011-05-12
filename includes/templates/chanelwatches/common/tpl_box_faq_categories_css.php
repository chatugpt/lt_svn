<?php
/**
 * Common Template - tpl_box_default_right.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_right.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . '</a>';
  }
//
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div class="bg_box_gray margin_t allborder clear">
<h3 class="in_1em line_30px"><?php echo $title; ?></h3>
<h4 class="in_1em line_30px b"><img src="images/search.jpg" name="search"/>
<?php echo FAQ_CATEGORIES_CSS_SEARCH_TEXT; ?></h4>
<span class="pad_10px pad_t block">
<form id="search_form" method="post" action="index.php?pg=search&area=kb&submit=Search&q= Your Search Key">
<input type="text" value="Your Search Key" onkeypress="javascript:if(event.keyCode==13){submitSearch();}" onfocus="if (this.value == 'Your Search Key') this.value = '';" onblur="if (this.value == '') this.value = 'Your Search Key';" class="input_4 gray fl" id="searchKey" style="width: 120px;" name="qqq"/></form>
<div align="center" style="margin-top: 2px; margin-left:5px;" class="fl">
<img onclick="submitSearch();" src="images/gobutton.jpg" name="go"/>
</div>
</span>
<script>
 function submitSearch(){
	 var query;
	 query = document.getElementById('searchKey').value;
	 if( query =='Your Search Key'){
	 		alert('Please submit the keyword!');
	 }else{
		 document.getElementById('search_form').action='faqs_all.html?submit=Search&q='+query;
		 document.getElementById('search_form').submit();
	 }
 }
</script>

<?php echo $content; ?>
</div>
<!--// eof: <?php echo $box_id; ?> //-->

