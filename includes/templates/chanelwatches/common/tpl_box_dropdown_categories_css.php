<?php
/**
 * Common Template - tpl_box_default_left.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_box_default_left.php 2975 2006-02-05 19:33:51Z birdbrain $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '"><span>' . $title  . '</span></a>';
  }
//
?>
<!--// bof: <?php echo $box_id; ?> //-->

<div style="position: relative; z-index: 200; height: 70px; float: left;" id="menu_btn">
	<span id="litbBtn" style="DISPLAY: block; Z-INDEX: 11; BACKGROUND: url(includes/templates/chanelwatches/images/menu_arrow.gif) no-repeat; LEFT: 154px; OVERFLOW: hidden; WIDTH: 16px; CURSOR: pointer; POSITION: absolute; TOP: 18px; HEIGHT: 17px"></span>
  <div id="litbCon1" class="absolute">
  <ul id="menu_index_top">
    <li><?php echo $title; ?></li>
  </ul>
    <ul>
      <li class="cate_title">
			<?php
      if((int)$current_category_id){
			 echo '<a href="'.zen_href_link(FILENAME_DEFAULT, 'cPath=' . zen_get_basis_category_id($current_category_id,(int)$_SESSION['languages_id'])).'">'.zen_get_basis_category_name($current_category_id,(int)$_SESSION['languages_id']).'</a>';
			}else{
			 echo NAVBAR_TITLE;
			}
			 ?></li>
    </ul>
  </div>
  <div id="litbCon2" class="absolute" style="display: none;">
  <ul id="menu_index_top">
    <li><?php echo $title; ?></li>
  </ul>
  <?php echo $content; ?>
  </div>
</div>
<script type="text/javascript">
 var closeMenu = true;
 function controlMenu(){
 if(closeMenu){
 document.getElementById("litbCon2").style.display = 'none';$_("litbBtn").style.backgroundPosition="0 0";
 }else{
 document.getElementById("litbCon2").style.display = 'block';$_("litbBtn").style.backgroundPosition = '0 -16px';
 }
 }
 menuToggle('litbBtn','mouseover',function(){closeMenu=false;controlMenu();});
 menuToggle('litbCon2','mousemove',function(){closeMenu=false;setTimeout(controlMenu, 2000)});
 menuToggle('litbCon2','mouseout',function(){closeMenu=true;setTimeout(controlMenu, 2000);});
</script>
<!--// eof: <?php echo $box_id; ?> //-->
