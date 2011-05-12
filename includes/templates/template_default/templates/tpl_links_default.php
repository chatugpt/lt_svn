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
//  Original contrib by Vijay Immanuel for osCommerce, converted to zen by dave@open-operations.com - http://www.open-operations.com
//  $Id: links_manager.php 2004-11-19 dave@open-operations.com
//
  if ($display_mode == 'categories') {
?>

<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="centerColumn">
  <tr>
   <td class="breadCrumb" colspan="2"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></td>
  </tr>
  <tr>
    <td class="pageHeading" colspan="2"><h1><?php echo HEADING_TITLE; ?></h1></td>
  </tr>
  <tr>
<?php
    $categories_query = $db->Execute("select lc.link_categories_id, lcd.link_categories_name, lcd.link_categories_description, lc.link_categories_image from " . TABLE_LINK_CATEGORIES . " lc, " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd where lc.link_categories_id = lcd.link_categories_id and lc.link_categories_status = '1' and lcd.language_id = '" . (int)$_SESSION['languages_id'] . "' order by lcd.link_categories_name");
  if ($categories_query->RecordCount() > 0) {
      $rows = 0;
 while (!$categories_query->EOF) {
        $rows++;
        $lPath_new = 'lPath=' . $categories_query->fields['link_categories_id'];
      $width = (int)(100 / MAX_DISPLAY_CATEGORIES_PER_ROW) . '%';
      $newrow = false;
      if ((($rows / MAX_DISPLAY_CATEGORIES_PER_ROW) == floor($rows / MAX_DISPLAY_CATEGORIES_PER_ROW)) && ($rows != $number_of_categories))
      {
        $newrow = true;
      }

?>
<td align="center" class="smallText" width="<?php echo $width; ?> " valign="top"><a href="<?php echo zen_href_link(FILENAME_LINKS, $lPath_new); ?>">
       <?php if (zen_not_null($categories_query->fields['link_categories_image'])) {
          echo zen_links_image(DIR_WS_IMAGES . $categories_query->fields['link_categories_image'], $categories_query->fields['link_categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT, 'style="border: 1px solid black"') . '<br>';
        } else {
          echo zen_image(DIR_WS_IMAGES . 'pixel_trans.gif', $categories_query->fields['link_categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT, 'style="border: 3px double black"') . '<br>';
        } ?><br /><?php echo $categories_query->fields['link_categories_name']; ?></a></td>
<?php
  if ($newrow) {
?>
    </tr>
    <tr>
<?php 
	    }
       	 $categories_query->MoveNext();
      }
    } else {
?>
                <td><?php new infoBox(array(array('text' => TEXT_NO_CATEGORIES))); ?></td>
<?php
    }
?>
              </tr>
           
          <tr>
            <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
              <tr class="infoBoxContents">
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="10"><?php echo zen_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                    <td class="main" align="right"><?php echo '<a href="' . zen_href_link(FILENAME_LINKS_SUBMIT, zen_get_all_get_params()) . '">' . zen_image_button('button_submit_link.gif', IMAGE_BUTTON_SUBMIT_LINK) . '</a>'; ?></td>
                    <td width="10"><?php echo zen_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
        </table>
<?php
  } elseif ($display_mode == 'links') {
// create column list
    $define_list = array('LINK_LIST_IMAGE' => LINK_LIST_IMAGE,
                         'LINK_LIST_DESCRIPTION' => LINK_LIST_DESCRIPTION, 
                         'LINK_LIST_COUNT' => LINK_LIST_COUNT);

    asort($define_list);

    $column_list = array();
    reset($define_list);
    while (list($key, $value) = each($define_list)) {
      if ($value > 0) $column_list[] = $key;
    }

    $select_column_list = '';

    for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
      switch ($column_list[$i]) {
        case 'LINK_LIST_IMAGE':
          $select_column_list .= 'l.links_image_url, ld.links_title, ';
          break;
        case 'LINK_LIST_DESCRIPTION':
          $select_column_list .= 'ld.links_description, ';
          break;
        case 'LINK_LIST_COUNT':
          $select_column_list .= 'l.links_clicked, ';
          break;
      }
    }

// show the links in a given category
// We show them all
    $listing_sql = "select " . $select_column_list . " l.links_id from " . TABLE_LINKS_DESCRIPTION . " ld, " . TABLE_LINKS . " l, " . TABLE_LINKS_TO_LINK_CATEGORIES . " l2lc where l.links_status = '2' and l.links_id = l2lc.links_id and ld.links_id = l2lc.links_id and ld.language_id = '" . (int)$_SESSION['languages_id'] . "' and l2lc.link_categories_id = '" . (int)$current_category_id . "'";

    if ( (!isset($_GET['sort'])) || (!ereg('[1-8][ad]', $_GET['sort'])) || (substr($_GET['sort'], 0, 1) > sizeof($column_list)) ) {
      for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
        if ($column_list[$i] == 'LINK_LIST_TITLE') {
          $_GET['sort'] = $i+1 . 'a';
          $listing_sql .= " order by ld.links_title";
          break;
        }
      }
    } else {
      $sort_col = substr($_GET['sort'], 0 , 1);
      $sort_order = substr($_GET['sort'], 1);
      $listing_sql .= ' order by ';
      switch ($column_list[$sort_col-1]) {
        case 'LINK_LIST_IMAGE':
          $listing_sql .= "ld.links_title";
          break;
        case 'LINK_LIST_DESCRIPTION':
          $listing_sql .= "ld.links_description " . ($sort_order == 'd' ? 'desc' : '') . ", ld.links_title";
          break;
        case 'LINK_LIST_COUNT':
          $listing_sql .= "l.links_clicked " . ($sort_order == 'd' ? 'desc' : '') . ", ld.links_title";
          break;
      }
    }
?>
<table  width="100%" border="0" cellspacing="2" cellpadding="2" class="centerColumn">
  <tr>
   <td class="breadCrumb" colspan="2"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></td>
  </tr>
  <tr>
    <td class="pageHeading" colspan="2"><h1><?php echo HEADING_TITLE; ?></h1></td>
  </tr>
      <tr>
       <td><?php include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_LINK_LISTING)); ?></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo zen_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td class="main" align="right"><?php echo '<a href="' . zen_href_link(FILENAME_LINKS_SUBMIT, zen_get_all_get_params()) . '">' . zen_image_button('button_submit_link.gif', IMAGE_BUTTON_SUBMIT_LINK) . '</a>'; ?></td>
                <td width="10"><?php echo zen_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
<?php
  }
?>