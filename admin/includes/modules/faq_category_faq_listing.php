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
//  $Id: faq_category_faq_listing.php 969 2005-02-07 16:18:05Z birdbrain $
//
?>
   <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="smallText" align="center" width="100"><?php echo TEXT_LEGEND; ?></td>
            <td class="smallText" align="center" width="100"><?php echo TEXT_LEGEND_STATUS_OFF . '<br />' . zen_image(DIR_WS_IMAGES . 'icon_red_on.gif', IMAGE_ICON_STATUS_OFF); ?></td>
            <td class="smallText" align="center" width="100"><?php echo TEXT_LEGEND_STATUS_ON . '<br />' . zen_image(DIR_WS_IMAGES . 'icon_green_on.gif', IMAGE_ICON_STATUS_ON); ?></td>
            <td class="smallText" align="center" width="100"><?php echo TEXT_LEGEND_FAQ_LINKED . '<br />' . zen_image(DIR_WS_IMAGES . 'icon_yellow_on.gif', IMAGE_ICON_LINKED); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?>&nbsp;-&nbsp;<?php echo zen_output_generated_FAQ_category_path($current_FAQ_category_id); ?></td>
             <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td class="smallText" align="right">
<?php
    echo zen_draw_form('search', FILENAME_FAQ_CATEGORIES, '', 'get');
// show reset search
    if (isset($_GET['search']) && zen_not_null($_GET['search'])) {
      echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES) . '">' . zen_image_button('button_reset.gif', IMAGE_RESET) . '</a>&nbsp;&nbsp;';
    }
    echo HEADING_TITLE_SEARCH_DETAIL . ' ' . zen_draw_input_field('search');
    if (isset($_GET['search']) && zen_not_null($_GET['search'])) {
      $keywords = zen_db_input(zen_db_prepare_input($_GET['search']));
      echo '<br/ >' . TEXT_INFO_SEARCH_DETAIL_FILTER . $keywords;
    }
    echo '</form>';
?>
                </td>
              </tr>
              <tr>
                <td class="smallText" align="right">
<?php
    echo zen_draw_form('goto', FILENAME_FAQ_CATEGORIES, '', 'get');
    echo HEADING_TITLE_GOTO . ' ' . zen_draw_pull_down_menu('lcPath', zen_get_FAQ_category_tree(), $current_FAQ_category_id, 'onChange="this.form.submit();"');
    echo '</form>';
?>
                </td>
              </tr>
            </table></td>
             <td class="pageHeading" align="center"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_MANAGER) . '">' . zen_image(DIR_WS_ICONS . 'faq_manager_home.gif', TABLE_HEADING_FAQ_MANAGER_CONFIGURATION). '</a>' ; ?></td>
          </tr>
	  <tr>
	    <td colspan="3"><?php echo zen_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
      </tr>
	  <tr>
        <td colspan="3"><?php echo zen_draw_separator(); ?></td>
      </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
<?php  if ($action == '') { ?>
                <td class="dataTableHeadingContent" width="20" align="right"><?php echo TABLE_HEADING_ID; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_FAQ_CATEGORIES_FAQS; ?></td>
                <td class="dataTableHeadingContent" align="left"></td>
                <td class="dataTableHeadingContent" align="right"></td>
                <td class="dataTableHeadingContent" align="right"><?php if(isset($_GET['fcPath'])) echo 'No helpful'; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo (isset($_GET['fcPath'])? 'Helpful':TABLE_HEADING_QUANTITY); ?></td>
                <td class="dataTableHeadingContent" width="50" align="center"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_FAQ_CATEGORIES_SORT_ORDER; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
<?php  } // action == '' ?>
              </tr>
<?php
    $faq_categories_count = 0;
    $rows = 0;
    if (isset($_GET['search'])) {
      $search = zen_db_prepare_input($_GET['search']);
      $faq_categories = $db->Execute("select c.faq_categories_id, cd.faq_categories_name, cd.faq_categories_description, c.faq_categories_image,
                                         c.parent_id, c.sort_order, c.date_added, c.last_modified,
                                         c.faq_categories_status
                                  from " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                  where c.faq_categories_id = cd.faq_categories_id
                                  and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                  and cd.faq_categories_name like '%" . zen_db_input($search) . "%'
                                  order by c.sort_order, cd.faq_categories_name");
    } else {
      $faq_categories = $db->Execute("select c.faq_categories_id, cd.faq_categories_name, cd.faq_categories_description, c.faq_categories_image,
                                         c.parent_id, c.sort_order, c.date_added, c.last_modified,
                                         c.faq_categories_status
                                  from " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                  where c.parent_id = '" . (int)$current_faq_category_id . "'
                                  and c.faq_categories_id = cd.faq_categories_id
                                  and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                  order by c.sort_order, cd.faq_categories_name");
    }
    while (!$faq_categories->EOF) {
      $faq_categories_count++;
      $rows++;

// Get parent_id for subfaq_categories if search
      if (isset($_GET['search'])) $fcPath = $faq_categories->fields['parent_id'];

      if ((!isset($_GET['cID']) && !isset($_GET['pID']) || (isset($_GET['cID']) && ($_GET['cID'] == $faq_categories->fields['faq_categories_id']))) && !isset($cInfo) && (substr($action, 0, 3) != 'new')) {
        //$faq_category_childs = array('childs_count' => zen_childs_in_faq_category_count($faq_categories->fields['faq_categories_id']));
        //$faq_category_faqs = array('faqs_count' => zen_faqs_in_faq_category_count($faq_categories->fields['faq_categories_id']));

        //$cInfo_array = array_merge($faq_categories->fields, $faq_category_childs, $faq_category_faqs);
        $cInfo = new objectInfo($faq_categories->fields);
      }

      if (isset($cInfo) && is_object($cInfo) && ($faq_categories->fields['faq_categories_id'] == $cInfo->faq_categories_id) ) {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\''  . zen_href_link(FILENAME_FAQ_CATEGORIES, zen_get_faq_category_path($faq_categories->fields['faq_categories_id'])) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_FAQ_CATEGORIES, zen_get_faq_category_path($faq_categories->fields['faq_categories_id'])) . '\'">' . "\n";
      }
?>
<?php if ($action == '') { ?>
                <td class="dataTableContent" width="20" align="right"><?php echo $faq_categories->fields['faq_categories_id']; ?></td>
                <td class="dataTableContent"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, zen_get_faq_category_path($faq_categories->fields['faq_categories_id'])) . '">' . zen_image(DIR_WS_ICONS . 'folder.gif', ICON_FOLDER) . '</a>&nbsp;<b>' . $faq_categories->fields['faq_categories_name'] . '</b>'; ?></td>
                <td class="dataTableContent" align="center">&nbsp;</td>
                <td class="dataTableContent" align="right">&nbsp;<?php // echo zen_get_faqs_sale_discount('', $faq_categories->fields['faq_categories_id'], true); ?></td>
                <td class="dataTableContent" align="center">&nbsp;</td>
                <td class="dataTableContent" align="right" valign="bottom">
                  <?php
                  if (SHOW_COUNTS_ADMIN == 'false') {
                    // don't show counts
                  } else {
                    // show counts
                    $total_faqs = zen_get_faqs_to_faq_categories($faq_categories->fields['faq_categories_id'], true);
                    $total_faqs_on = zen_get_faqs_to_faq_categories($faq_categories->fields['faq_categories_id'], false);
                    echo $total_faqs_on . TEXT_FAQS_STATUS_ON_OF . $total_faqs . TEXT_FAQS_STATUS_ACTIVE;
                  }
                  ?>
                  &nbsp;&nbsp;
                </td>
                <td class="dataTableContent" width="50" align="left">
<?php
      if ($faq_categories->fields['faq_categories_status'] == '1') {
        echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=setflag_faq_categories&flag=0&cID=' . $faq_categories->fields['faq_categories_id'] . '&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_green_on.gif', IMAGE_ICON_STATUS_ON) . '</a>';
      } else {
        echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=setflag_faq_categories&flag=1&cID=' . $faq_categories->fields['faq_categories_id'] . '&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_red_on.gif', IMAGE_ICON_STATUS_OFF) . '</a>';
      }
      if (zen_get_faqs_to_faq_categories($faq_categories->fields['faq_categories_id'], true, 'faqs_active') == 'true') {
        echo '&nbsp;&nbsp;' . zen_image(DIR_WS_IMAGES . 'icon_yellow_on.gif', IMAGE_ICON_LINKED);
      }
?>
                </td>
                <td class="dataTableContent" align="right"><?php echo $faq_categories->fields['sort_order']; ?></td>
                <td class="dataTableContent" align="right">
                  <?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $faq_categories->fields['faq_categories_id'] . '&action=edit_faq_category') . '">' . zen_image(DIR_WS_IMAGES . 'icon_edit.gif', ICON_EDIT) . '</a>'; ?>
                  <?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $faq_categories->fields['faq_categories_id'] . '&action=delete_faq_category') . '">' . zen_image(DIR_WS_IMAGES . 'icon_delete.gif', ICON_DELETE) . '</a>'; ?>
                  <?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $faq_categories->fields['faq_categories_id'] . '&action=move_faq_category') . '">' . zen_image(DIR_WS_IMAGES . 'icon_move.gif', ICON_MOVE) . '</a>'; ?>
                </td>
<?php } // action == '' ?>
              </tr>
<?php
      $faq_categories->MoveNext();
    }

    $faqs_count = 0;
    if (isset($_GET['search'])) {
      $faqs_query_raw = ("select p.*, pd.*, p2c.*
                                from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd, "
                                       . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                                where p.faqs_id = pd.faqs_id
                                and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and p.faqs_id = p2c.faqs_id
                                and (
                                pd.faqs_name like '%" . zen_db_input($_GET['search']) . "%'
                                or pd.faqs_description like '%" . zen_db_input($_GET['search']) . "%'
                                )
                                order by p.faqs_sort_order, pd.faqs_name");
    } else {
      $faqs_query_raw = ("select p.*, pd.*, p2c.*
                                from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd, "
                                       . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                              where p.faqs_id = pd.faqs_id
                                and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and p.faqs_id = p2c.faqs_id
                                and p2c.faq_categories_id = '" . (int)$current_faq_category_id . "'
                                order by p.faqs_sort_order, pd.faqs_name");
    }
// Split Page
// reset page when page is unknown
if ($_GET['page'] == '' and $_GET['pID'] != '') {
  $old_page = $_GET['page'];
  $check_page = $db->Execute($faqs_query_raw);
  if ($check_page->RecordCount() > MAX_DISPLAY_RESULTS_CATEGORIES) {
    $check_count=1;
    while (!$check_page->EOF) {
      if ($check_page->fields['faqs_id'] == $_GET['pID']) {
        break;
      }
      $check_count++;
      $check_page->MoveNext();
    }
    $_GET['page'] = round((($check_count/MAX_DISPLAY_RESULTS_CATEGORIES)+(fmod($check_count,MAX_DISPLAY_RESULTS_CATEGORIES) !=0 ? .5 : 0)),0);
    $page = $_GET['page'];
    if ($old_page != $_GET['page']) {
//      zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $_GET['fcPath'] . '&pID=' . $_GET['pID'] . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
    }
  } else {
    $_GET['page'] = 1;
  }
}
    $faqs_split = new splitPageResults($_GET['page'], MAX_DISPLAY_RESULTS_CATEGORIES, $faqs_query_raw, $faqs_query_numrows);
    $faqs = $db->Execute($faqs_query_raw);
// Split Page

    while (!$faqs->EOF) {
      $faqs_count++;
      $rows++;

// Get faq_categories_id for faq if search
      if (isset($_GET['search'])) $fcPath = $faqs->fields['faq_categories_id'];

      if ( (!isset($_GET['pID']) && !isset($_GET['cID']) || (isset($_GET['pID']) && ($_GET['pID'] == $faqs->fields['faqs_id']))) && !isset($pInfo) && !isset($cInfo) && (substr($action, 0, 3) != 'new')) {
// find out the rating average from customer faq_reviews
        $faq_reviews = $db->Execute("select (avg(reviews_rating) / 5 * 100) as average_rating
                                 from " . TABLE_FAQ_REVIEWS . "
                                 where faqs_id = '" . (int)$faqs->fields['faqs_id'] . "'");
        $pInfo_array = array_merge($faqs->fields, $faq_reviews->fields);
        $pInfo = new objectInfo($pInfo_array);
      }

// Split Page
      $type_handler = $zc_faqs->get_admin_handler($faqs->fields['faqs_type']);
      if (isset($pInfo) && is_object($pInfo) && ($faqs->fields['faqs_id'] == $pInfo->faqs_id) ) {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link($type_handler , 'page=' . $_GET['page'] . '&faq_type=' . $faqs->fields['faqs_type'] . '&fcPath=' . $fcPath . '&pID=' . $faqs->fields['faqs_id'] . '&action=new_faq') . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link($type_handler , 'page=' . $_GET['page'] . '&faq_type=' . $faqs->fields['faqs_type'] . '&fcPath=' . $fcPath . '&pID=' . $faqs->fields['faqs_id'] . '&action=new_faq') . '\'">' . "\n";
      }
// Split Page
?>
                <td class="dataTableContent" width="20" align="right"><?php echo $faqs->fields['faqs_id']; ?></td>
                <td class="dataTableContent"><?php echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $faqs->fields['faqs_id'] . '&action=new_faq_preview&read=only' . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_ICONS . 'preview.gif', ICON_PREVIEW) . '</a>&nbsp;' . $faqs->fields['faqs_name']; ?></td>
                <td class="dataTableContent"></td>
                <td class="dataTableContent" align="right"></td>
                <td class="dataTableContent" align="right"><?php echo $faqs->fields['faqs_nohelpful']; ?></td>
                <td class="dataTableContent" align="right"><?php echo $faqs->fields['faqs_helpful']; ?></td>
                <td class="dataTableContent" width="50" align="center">
<?php
      if ($faqs->fields['faqs_status'] == '1') {
        echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=setflag&flag=0&pID=' . $faqs->fields['faqs_id'] . '&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_green_on.gif', IMAGE_ICON_STATUS_ON) . '</a>';
      } else {
        echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=setflag&flag=1&pID=' . $faqs->fields['faqs_id'] . '&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_red_on.gif', IMAGE_ICON_STATUS_OFF) . '</a>';
      }
      if (zen_get_faq_is_linked($faqs->fields['faqs_id']) == 'true') {
        echo '&nbsp;&nbsp;' . zen_image(DIR_WS_IMAGES . 'icon_yellow_on.gif', IMAGE_ICON_LINKED) . '<br>';
      }
?>
                </td>
<?php if ($action == '') { ?>
                <td class="dataTableContent" align="center"><?php echo $faqs->fields['faqs_sort_order']; ?></td>
                <td class="dataTableContent" align="right">
        <?php echo '<a href="' . zen_href_link($type_handler, 'fcPath=' . $fcPath . '&faq_type=' . $faqs->fields['faqs_type'] . '&pID=' . $faqs->fields['faqs_id']  . '&action=new_faq' . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_edit.gif', ICON_EDIT) . '</a>'; ?>
        <?php echo '<a href="' . zen_href_link($type_handler, 'fcPath=' . $fcPath . '&faq_type=' . $faqs->fields['faqs_type'] . '&pID=' . $faqs->fields['faqs_id'] . '&action=delete_faq' . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_delete.gif', ICON_DELETE) . '</a>'; ?>
        <?php echo '<a href="' . zen_href_link($type_handler, 'fcPath=' . $fcPath . '&faq_type=' . $faqs->fields['faqs_type'] . '&pID=' . $faqs->fields['faqs_id'] . '&action=move_faq' . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_move.gif', ICON_MOVE) . '</a>'; ?>
        <?php echo '<a href="' . zen_href_link($type_handler, 'fcPath=' . $fcPath . '&faq_type=' . $faqs->fields['faqs_type'] . '&pID=' . $faqs->fields['faqs_id'] .'&action=copy_to' . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image(DIR_WS_IMAGES . 'icon_copy_to.gif', ICON_COPY_TO) . '</a>'; ?>
<?php
//} // EOF: Attribute commands
?>
<?php } // action == '' ?>

                </td>
              </tr>
<?php
      $faqs->MoveNext();
    }

    $fcPath_back = '';
    if (sizeof($fcPath_array) > 0) {
      for ($i=0, $n=sizeof($fcPath_array)-1; $i<$n; $i++) {
        if (empty($fcPath_back)) {
          $fcPath_back .= $fcPath_array[$i];
        } else {
          $fcPath_back .= '_' . $fcPath_array[$i];
        }
      }
    }

    $fcPath_back = (zen_not_null($fcPath_back)) ? 'fcPath=' . $fcPath_back . '&' : '';
?>
<?php if ($action == '') { ?>

              <tr>
                <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo TEXT_FAQ_CATEGORIES . '&nbsp;' . $faq_categories_count . '<br />' . TEXT_FAQS . '&nbsp;' . $faqs_count; ?></td>
                    <td align="right" class="smallText"><?php if (sizeof($fcPath_array) > 0) echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, $fcPath_back . 'cID=' . $current_faq_category_id) . '">' . zen_image_button('button_back.gif', IMAGE_BACK) . '</a>&nbsp;'; if (!isset($_GET['search']) && (sizeof($fcPath_array) == 0)) echo '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&action=new_faq_category') . '">' . zen_image_button('button_new_faq_category.gif', IMAGE_NEW_FAQ_CATEGORY) . '</a>&nbsp;'; ?>

<form name="newfaq" action="<?php echo zen_href_link(FILENAME_FAQ_CATEGORIES, '', 'NONSSL'); ?>" method = "get"><?php    echo zen_image_submit('button_new_faq.gif', IMAGE_NEW_FAQ); ?>
<?php
  $sql = "select ptc.faq_type_id, pt.type_name from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . " ptc, " . TABLE_FAQ_TYPES . " pt
          where ptc.faq_category_id = '" . $current_faq_category_id . "'
          and pt.type_id = ptc.faq_type_id";
  $restrict_types = $db->Execute($sql);
  if ($restrict_types->RecordCount() >0 ) {
    $faq_restrict_types_array = array();
    while (!$restrict_types->EOF) {
      $faq_restrict_types_array[] = array('id' => $restrict_types->fields['faq_type_id'],
                                         'text' => $restrict_types->fields['type_name']);
      $restrict_types->MoveNext();
    }
   } else {
    $faq_restrict_types_array = $faq_types_array;
  }
?>
<?php echo '&nbsp;&nbsp;' . zen_draw_pull_down_menu('faq_type', $faq_restrict_types_array); ?>
           <input type="hidden" name="fcPath" value="<?php echo $fcPath; ?>">
           <input type="hidden" name="action" value="new_faq">
          </form>
          &nbsp;</td>
                  </tr>
                </table></td>
              </tr>
<?php } // turn off when editing ?>
            </table></td>
