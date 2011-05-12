<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=advanced_search_result.<br />
 * Displays results of advanced search
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_advanced_search_result_default.php 4182 2006-08-21 02:11:37Z ajeh $
 */
   $column_box_default ='tpl_box_default_left.php';
   
  if($linkMark = strpos($_SERVER['REQUEST_URI'],'?')){
    $cleanUrl = substr($_SERVER['REQUEST_URI'],0,$linkMark);
  }else{
    $cleanUrl = $_SERVER['REQUEST_URI'];
  }
  function cleanSameArg($clean){
    global $_GET,$cleanUrl;
    $newArg = array();
    reset($_GET);
    while (list($key, $value) = each($_GET)) {
      if($key != 'cPath' and $key != 'display' and $key != $clean){
        $newArg[] = $key.'='.$value;        
      }
    }
    if(sizeof($newArg)>0){
      return $cleanUrl.'?'.implode('&',$newArg);
    }else{
      return $cleanUrl;
    }
  }
  function cleanSameArg2($clean,$clean2){
    global $_GET,$cleanUrl;
    $newArg = array();
    reset($_GET);
    while (list($key, $value) = each($_GET)) {
      if($key != 'cPath' and $key != 'display' and $key != $clean and $key != $clean2){
        $newArg[] = $key.'='.$value;        
      }
    }
    if(sizeof($newArg)>0){
      return $cleanUrl.'?'.implode('&',$newArg);
    }else{
      return $cleanUrl;
    }
  }
  function cleanSameArgNoHtml($clean){
    global $_GET,$cleanUrl;
    $newArg = array();
    reset($_GET);
    while (list($key, $value) = each($_GET)) {
      if($key != 'cPath' and $key != 'display' and $key != 'main_page' and $key != 'categories_id' and $key != $clean){
        $newArg[] = $key.'='.$value;        
      }
    }
    if(sizeof($newArg)>0){
      return '&'.implode('&',$newArg);
    }else{
      return FALSE;
    }
  }
  
  function postfixUrl(){
    global $_SERVER;
    $posbool = strpos($_SERVER['REQUEST_URI'],'?');
    return (is_int($posbool) ? substr($_SERVER['REQUEST_URI'],$posbool) : '');
  }
?>
<div class="minframe fl">
<?php
 //require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/box_contact_us.php'));
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/search_categories.php'));
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/popular_searches.php'));
 require(DIR_WS_MODULES . zen_get_module_directory('sideboxes/'.$template_dir.'/customers_say.php'));

?>
</div>
<div class="right_big_con">
<h2 class="border_b line_30px pad_l_10px"><?php echo HEADING_TITLE; ?></h2>
<?php
  if (($advanced_search_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
<div class="pagebar border_b gray_bg"><span class="fl"><?php echo $advanced_search_split->display_count(TEXT_DISPLAY_NUMBER_OF_SEARCH_RESULT); ?></span><ul class="fr"><?php echo TEXT_RESULT_PAGE . ' ' . $advanced_search_split->display_drop_down(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></ul></div>
<?php
  }
?>
<div class="list_bar">
    <ul>
      <li><strong>&nbsp;&nbsp;View:&nbsp;&nbsp;</strong></li>
      <li class="li1">
      <?php switch($listTypes){
           case 1: ?>
        <span class="list_list">List</span>
        <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'listtypes=2').cleanSameArgNoHtml('listtypes');?>"><span class="list_grid">Grid</span></a>    
        <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'listtypes=3').cleanSameArgNoHtml('listtypes');?>"><span class="list_gallery">Gallery</span></a>    
      <?php break;
           case 2:?>
        <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'listtypes=1').cleanSameArgNoHtml('listtypes');?>"><span class="list_list">List</span></a>
        <span class="list_grid">Grid</span>  
        <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'listtypes=3').cleanSameArgNoHtml('listtypes');?>"><span class="list_gallery">Gallery</span></a>  
      <?php     break;
           case 3:?>
        <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'listtypes=1').cleanSameArgNoHtml('listtypes');?>"><span class="list_list">List</span></a>
        <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'listtypes=2').cleanSameArgNoHtml('listtypes');?>"><span class="list_grid">Grid</span></a>
        <span class="list_gallery">Gallery</span>       
      <?php     break;
      }
      ?>
      </li>
      
      <li class="li2">
      <?php switch($display){ 
      case 1:?> 
      <span class="category_">ALL</span>
      <span class="category">
      <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'display=2').cleanSameArgNoHtml('display');?>">   Wholesale Only
      </a>    </span>       
      <span class="category">
      <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'display=3').cleanSameArgNoHtml('display');?>">    Free Shipping
      </a>    </span>
      <?php break;
      case 2:?>
      <span class="category"><a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'display=1').cleanSameArgNoHtml('display');?>">ALL</a></span>
      <span class="category_">Wholesale Only</span>       
      <span class="category">
      <a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'display=3').cleanSameArgNoHtml('display');?>">   Free Shipping
      </a>    </span>
      <?php break;
      case 3:?>
      <span class="category"><a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'display=1').cleanSameArgNoHtml('display');?>">ALL</a></span>
      <span class="category"><a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, 'display=2').cleanSameArgNoHtml('display');?>">Wholesale Only</a></span>       
      <span class="category_">Free Shipping</span>
      <?php break;
      }
      ?>
      </li>
      <li><strong>Sorted By: </strong><?php echo zen_draw_pull_down_menu('productsort',$productsort, (isset($_GET['productsort']) ? $_GET['productsort'] : ''), 'onchange="changeSort(this,\''.cleanSameArg('productsort').'\');" class="select" rel="dropdown"');?></li>
      <li><strong>Show: </strong> <?php echo zen_draw_pull_down_menu('pagesize',$pagesize, (isset($_GET['pagesize']) ? $_GET['pagesize'] : '20'), 'onchange="changePagesize(this,\''.cleanSameArg('pagesize').'\');" class="select1" rel="dropdown"');?>
    </ul>
  </div>
  <?php
  switch($listTypes){
      case '1':
        require($template->get_template_dir('tpl_tabular_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_tabular_display.php');
      break;
      case '2':
        require($template->get_template_dir('tpl_grid_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_grid_display.php');
      break;
      case '3':
        require($template->get_template_dir('tpl_gallery_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_gallery_display.php');
      break;
    }
    ?>

<?php if ( ($advanced_search_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>
<div class="pagebar margin_t g_t_c gray_bg"><?php echo TEXT_RESULT_PAGE . ' ' . $advanced_search_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></div>
<?php
  }
?>
<?php
// only end form if form is created
    if ($show_top_submit_button == true or $show_bottom_submit_button == true) {
?>
<?php } // end if form is made ?>
</div>


