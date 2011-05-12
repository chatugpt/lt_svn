<?php
/**
 * Common Template - tpl_box_default_single.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_single.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

// choose box images based on box position
//
if($this_is_home_page){
?>
<!--// bof: <?php echo $box_id; ?> //-->
<div class="midframe fl relative">
<script type="text/javascript"><!--
var i_flash;
// Netscape
if (navigator.plugins) {
	for (var i=0; i < navigator.plugins.length; i++) {
		if (navigator.plugins[i].name.toLowerCase().indexOf("shockwave flash") >= 0){
				i_flash = true;
				}
		}
}
// --></script>
<script type="text/vbscript"><!--
//IE
on error resume next
set f = CreateObject("ShockwaveFlash.ShockwaveFlash")
if IsObject(f) then
i_flash = true
end if
// --></script>
<script type="text/javascript"><!--
if (i_flash && isWin) {
flashWrite("swf", "flash/newbox.swf", "535", "180","Opaque");
} else {
 var no_flash_img = "http://image.newbox.com/images/promotions/200807/111216985402.jpg";
 var no_flash_link = "#";
 var str='<a href="'+no_flash_link+'"><img src="'+no_flash_img+'"></img></a>';
 document.write(str);
}
// --></script>
</div>
<!--// eof: <?php echo $box_id; ?> //-->
<?php } ?>
