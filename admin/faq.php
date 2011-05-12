<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                                 |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: faq.php 895 2005-01-07 18:39:16Z ajeh $
//

  require('includes/application_top.php');

  require(DIR_WS_MODULES . 'faq_cat_header_code.php');

  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  if (zen_not_null($action)) {
    switch ($action) {
      case 'setflag':
        if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
          if (isset($_GET['pID'])) {
            zen_set_faq_status($_GET['pID'], $_GET['flag']);
          }
        }

        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $_GET['fcPath'] . '&pID=' . $_GET['pID'] . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
        break;

      case 'delete_faq_confirm':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/delete_faq_confirm.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/delete_faq_confirm.php');
         } else {
          require(DIR_WS_MODULES . 'delete_faq_confirm.php');
         }
        break;
      case 'move_faq_confirm':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/move_faq_confirm.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/move_faq_confirm.php');
         } else {
          require(DIR_WS_MODULES . 'move_faq_confirm.php');
         }
        break;
      case 'insert_faq':
      case 'update_faq':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/update_faq.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/update_faq.php');
         } else {
          require(DIR_WS_MODULES . 'update_faq.php');
         }
        break;
      case 'copy_to_confirm':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/copy_to_confirm.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/copy_to_confirm.php');
         } else {
          require(DIR_WS_MODULES . 'copy_to_confirm.php');
         }
        break;
      case 'new_faq_preview':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/new_faq_preview.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/new_faq_preview.php');
         } else {
          require(DIR_WS_MODULES . 'new_faq_preview.php');
         }
        break;

    }
  }

// check if the catalog image directory exists
  if (is_dir(DIR_FS_CATALOG_IMAGES)) {
    if (!is_writeable(DIR_FS_CATALOG_IMAGES)) $messageStack->add(ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE, 'error');
  } else {
    $messageStack->add(ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST, 'error');
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script type="text/javascript">
  <!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
if (typeof _editor_url == "string") HTMLArea.replaceAll();
 }
 // -->
</script>

<?php if ($action != 'new_product_meta_tags' && $editor_handler != '') include ($editor_handler); ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="init()">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">

  <tr>
<!-- body_text //-->
    <td width="100%" valign="top">
<?php
  if ($action == 'new_faq') {

  require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/collect_info.php');

  } elseif ($action == 'new_faq_preview') {

  require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/preview_info.php');

  } else {

  require(DIR_WS_MODULES . 'faq_category_faq_listing.php');

    $heading = array();
    $contents = array();
    switch ($action) {
      case 'new_faq_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_NEW_FAQ_CATEGORY . '</b>');

        $contents = array('form' => zen_draw_form('newfaq_category', FILENAME_FAQ_CATEGORIES, 'action=insert_faq_category&fcPath=' . $fcPath, 'post', 'enctype="multipart/form-data"'));
        $contents[] = array('text' => TEXT_NEW_FAQ_CATEGORY_INTRO);

        $faq_category_inputs_string = '';
        $languages = zen_get_languages();
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $faq_category_inputs_string .= '<br />' . zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . zen_draw_input_field('faq_categories_name[' . $languages[$i]['id'] . ']', '', zen_set_field_length(TABLE_FAQ_CATEGORIES_DESCRIPTION, 'faq_categories_name'));
        }

        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES_NAME . $faq_category_inputs_string);
        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES_IMAGE . '<br />' . zen_draw_file_field('faq_categories_image'));

        $dir = @dir(DIR_FS_CATALOG_IMAGES);
        $dir_info[] = array('id' => '', 'text' => "Main Directory");
        while ($file = $dir->read()) {
          if (is_dir(DIR_FS_CATALOG_IMAGES . $file) && strtoupper($file) != 'CVS' && $file != '.svn' && $file != "." && $file != "..") {
            $dir_info[] = array('id' => $file . '/', 'text' => $file);
          }
        }

        $default_directory = substr( $cInfo->faq_categories_image, 0,strpos( $cInfo->faq_categories_image, '/')+1);
        $contents[] = array('text' => TEXT_FAQ_CATEGORIES_IMAGE_DIR . ' ' . zen_draw_pull_down_menu('img_dir', $dir_info, $default_directory));

        $contents[] = array('text' => '<br />' . TEXT_SORT_ORDER . '<br />' . zen_draw_input_field('sort_order', '', 'size="4"'));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_save.gif', IMAGE_SAVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'edit_faq_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_EDIT_FAQ_CATEGORY . '</b>');

        $contents = array('form' => zen_draw_form('faq_categories', FILENAME_FAQ_CATEGORIES, 'action=update_faq_category&fcPath=' . $fcPath, 'post', 'enctype="multipart/form-data"') . zen_draw_hidden_field('faq_categories_id', $cInfo->faq_categories_id));
        $contents[] = array('text' => TEXT_EDIT_INTRO);

        $faq_category_inputs_string = '';
        $languages = zen_get_languages();
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $faq_category_inputs_string .= '<br />' . zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . zen_draw_input_field('faq_categories_name[' . $languages[$i]['id'] . ']', zen_get_faq_category_name($cInfo->faq_categories_id, $languages[$i]['id']), zen_set_field_length(TABLE_FAQ_CATEGORIES_DESCRIPTION, 'faq_categories_name'));
        }
        $contents[] = array('text' => '<br />' . TEXT_EDIT_FAQ_CATEGORIES_NAME . $faq_category_inputs_string);
        $contents[] = array('text' => '<br />' . TEXT_EDIT_FAQ_CATEGORIES_IMAGE . '<br />' . zen_draw_file_field('faq_categories_image'));

        $dir = @dir(DIR_FS_CATALOG_IMAGES);
        $dir_info[] = array('id' => '', 'text' => "Main Directory");
        while ($file = $dir->read()) {
          if (is_dir(DIR_FS_CATALOG_IMAGES . $file) && strtoupper($file) != 'CVS' && $file != "." && $file != "..") {
            $dir_info[] = array('id' => $file . '/', 'text' => $file);
          }
        }

        $default_directory = substr( $cInfo->faq_categories_image, 0,strpos( $cInfo->faq_categories_image, '/')+1);
        $contents[] = array('text' => TEXT_FAQ_CATEGORIES_IMAGE_DIR . ' ' . zen_draw_pull_down_menu('img_dir', $dir_info, $default_directory));
        $contents[] = array('text' => '<br>' . zen_info_image($cInfo->faq_categories_image, $cInfo->faq_categories_name));
        $contents[] = array('text' => '<br>' . $cInfo->faq_categories_image);

        $contents[] = array('text' => '<br />' . TEXT_EDIT_SORT_ORDER . '<br />' . zen_draw_input_field('sort_order', $cInfo->sort_order, 'size="2"'));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_save.gif', IMAGE_SAVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $cInfo->faq_categories_id) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'delete_faq':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/sidebox_delete_faq.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/sidebox_delete_faq.php');
         } else {
          require(DIR_WS_MODULES . 'sidebox_delete_faq.php');
         }
        break;
      case 'move_faq':
        if (file_exists(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/sidebox_move_faq.php')) {
          require(DIR_WS_MODULES . $zc_faqs->get_handler($faq_type) . '/sidebox_move_faq.php');
         } else {
          require(DIR_WS_MODULES . 'sidebox_move_faq.php');
         }
        break;
      case 'copy_to':
         $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_COPY_TO . '</b>');
// WebMakers.com Added: Split Page
        if (empty($pInfo->faqs_id)) {
          $pInfo->faqs_id= $pID;
        }
        $contents = array('form' => zen_draw_form('copy_to', $type_faq_admin_handler, 'action=copy_to_confirm&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . zen_draw_hidden_field('faqs_id', $pInfo->faqs_id));
        $contents[] = array('text' => TEXT_INFO_COPY_TO_INTRO);
        $contents[] = array('text' => '<br />' . TEXT_INFO_CURRENT_FAQ . '<br /><b>' . $pInfo->faqs_name  . ' ID#' . $pInfo->faqs_id . '</b>');
        $contents[] = array('text' => '<br />' . TEXT_INFO_CURRENT_FAQ_CATEGORIES . '<br /><b>' . zen_output_generated_faq_category_path($pInfo->faqs_id, 'faq') . '</b>');
        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES . '<br />' . zen_draw_pull_down_menu('faq_categories_id', zen_get_faq_category_tree(), $current_faq_category_id));
        $contents[] = array('text' => '<br />' . TEXT_HOW_TO_COPY . '<br />' . zen_draw_radio_field('copy_as', 'link', true) . ' ' . TEXT_COPY_AS_LINK . '<br />' . zen_draw_radio_field('copy_as', 'duplicate') . ' ' . TEXT_COPY_AS_DUPLICATE);
        $contents[] = array('text' => '<br />' . zen_image(DIR_WS_IMAGES . 'pixel_black.gif','','100%','3'));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_copy.gif', IMAGE_COPY) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;


    } // switch

    if ( (zen_not_null($heading)) && (zen_not_null($contents)) ) {
      echo '            <td width="25%" valign="top">' . "\n";

      $box = new box;
      echo $box->infoBox($heading, $contents);

      echo '            </td>' . "\n";
    }
?>

          </tr>
          <tr>
<?php
// Split Page
if ($faqs_query_numrows > 0) {
  if (empty($pInfo->faqs_id)) {
    $pInfo->faqs_id= $pID;
  }
?>
            <td class="smallText" align="right"><?php echo $faqs_split->display_count($faqs_query_numrows, MAX_DISPLAY_RESULTS_CATEGORIES, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_FAQS) . '<br>' . $faqs_split->display_links($faqs_query_numrows, MAX_DISPLAY_RESULTS_CATEGORIES, MAX_DISPLAY_PAGE_LINKS, $_GET['page'], zen_get_all_get_params(array('page', 'info', 'x', 'y')) ); ?></td>

<?php
}
// Split Page
?>
          </tr>
        </table></td>
      </tr>
    </table>
<?php
  }
?>
    </td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>