<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
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
//  $Id: faq_categories.php 895 2005-01-07 18:39:16Z ajeh $
//

  require('includes/application_top.php');
  require(DIR_WS_MODULES . 'faq_cat_header_code.php');
  require(DIR_WS_LANGUAGES . 'english/faq.php');
  $action = (isset($_GET['action']) ? $_GET['action'] : '');

  if (zen_not_null($action)) {
    switch ($action) {
      case 'update_faq_category_status':
        // disable faq_category and faqs including subfaq_categories
        if (isset($_POST['faq_categories_id'])) {
          $faq_categories_id = zen_db_prepare_input($_POST['faq_categories_id']);

          $faq_categories = zen_get_faq_category_tree($faq_categories_id, '', '0', '', true);

          for ($i=0, $n=sizeof($faq_categories); $i<$n; $i++) {
            $faq_ids = $db->Execute("select faqs_id
                                         from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                         where faq_categories_id = '" . (int)$faq_categories[$i]['id'] . "'");

            while (!$faq_ids->EOF) {
              $faqs[$faq_ids->fields['faqs_id']]['faq_categories'][] = $faq_categories[$i]['id'];
              $faq_ids->MoveNext();
            }
          }

// change the status of faq_categories and faqs
          zen_set_time_limit(600);
          for ($i=0, $n=sizeof($faq_categories); $i<$n; $i++) {
            if ($_POST['faq_categories_status'] == '1') {
              $faq_categories_status = '0';
              $faqs_status = '0';
            } else {
              $faq_categories_status = '1';
              $faqs_status = '1';
            }

              $sql = "update " . TABLE_FAQ_CATEGORIES . " set faq_categories_status='" . $faq_categories_status . "'
                      where faq_categories_id='" . $faq_categories[$i]['id'] . "'";
              $db->Execute($sql);

            // set faqs_status based on selection
            if ($_POST['set_faqs_status'] == 'set_faqs_status_nochange') {
              // do not change current faq status
            } else {
              if ($_POST['set_faqs_status'] == 'set_faqs_status_on') {
                $faqs_status = '1';
              } else {
                $faqs_status = '0';
              }

              $sql = "select faqs_id from " . TABLE_FAQS_TO_FAQ_CATEGORIES . " where faq_categories_id='" . $faq_categories[$i]['id'] . "'";
              $faq_category_faqs = $db->Execute($sql);

              while (!$faq_category_faqs->EOF) {
                $sql = "update " . TABLE_FAQS . " set faqs_status='" . $faqs_status . "' where faqs_id='" . $faq_category_faqs->fields['faqs_id'] . "'";
                $db->Execute($sql);
                $faq_category_faqs->MoveNext();
              }
            }
          } // for

        }
        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $_GET['fcPath'] . '&cID=' . $_GET['cID']));
        break;

      case 'remove_type':
          $sql = "delete from " .  TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                  where faq_category_id = '" . zen_db_prepare_input($_GET['cID']) . "'
                  and faq_type_id = '" . zen_db_prepare_input($_GET['type_id']) . "'";

          $db->Execute($sql);

          zen_remove_restrict_sub_faq_categories($_GET['cID'], $_GET['type_id']);

          $action = "edit";
          zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=edit_faq_category&fcPath=' . $_GET['fcPath'] . '&cID=' . zen_db_prepare_input($_GET['cID'])));
      break;
      case 'setflag':
        if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
          if (isset($_GET['pID'])) {
            zen_set_faq_status($_GET['pID'], $_GET['flag']);
          }

        }

        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $_GET['fcPath'] . '&pID=' . $_GET['pID'] . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
        break;
      case 'insert_faq_category':
      case 'update_faq_category':
        if ( isset($_POST['add_type']) or isset($_POST['add_type_all']) ) {
          // check if it is already restricted
          $sql = "select * from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                           where faq_category_id = '" . zen_db_prepare_input($_POST['faq_categories_id']) . "'
                           and faq_type_id = '" . zen_db_prepare_input($_POST['restrict_type']) . "'";

          $type_to_cat = $db->Execute($sql);
          if ($type_to_cat->RecordCount() < 1) {
//@@TODO find all sub-faq_categories and restrict them as well.

            $insert_sql_data = array('faq_category_id' => zen_db_prepare_input($_POST['faq_categories_id']),
                                     'faq_type_id' => zen_db_prepare_input($_POST['restrict_type']));

            zen_db_perform(TABLE_FAQ_TYPES_TO_FAQ_CATEGORY, $insert_sql_data);
/*
// moved below so evaluated separately from current faq_category
            if (isset($_POST['add_type_all'])) {
              zen_restrict_sub_faq_categories($_POST['faq_categories_id'], $_POST['restrict_type']);
            }
*/
          }
// add faq type restrictions to subfaq_categories if not already set
          if (isset($_POST['add_type_all'])) {
            zen_restrict_sub_faq_categories($_POST['faq_categories_id'], $_POST['restrict_type']);
          }
          $action = "edit";
          zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=edit_faq_category&fcPath=' . $fcPath . '&cID=' . zen_db_prepare_input($_POST['faq_categories_id'])));
        }
        if (isset($_POST['faq_categories_id'])) $faq_categories_id = zen_db_prepare_input($_POST['faq_categories_id']);
        $sort_order = zen_db_prepare_input($_POST['sort_order']);

        $sql_data_array = array('sort_order' => $sort_order);

        if ($action == 'insert_faq_category') {
          $insert_sql_data = array('parent_id' => $current_faq_category_id,
                                   'date_added' => 'now()');

          $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

          zen_db_perform(TABLE_FAQ_CATEGORIES, $sql_data_array);

          $faq_categories_id = zen_db_insert_id();
// check if [arent is restricted
          $sql = "select parent_id from " . TABLE_FAQ_CATEGORIES . "
                  where faq_categories_id = '" . $faq_categories_id . "'";

          $parent_cat = $db->Execute($sql);
          if ($parent_cat->fields['parent_id'] != '0') {
            $sql = "select faq_type_id from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                     where faq_category_id = '" . $parent_cat->fields['parent_id'] . "'";
            $parent_faq_type = $db->Execute($sql);

            if ($parent_faq_type->RecordCount() > 0) {
              $sql = "select * from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                             where faq_category_id = '" . $parent_cat->fields['parent_id'] . "'
                             and faq_type_id = '" . $parent_faq_type->fields['faq_type_id'] . "'";
              $has_type = $db->Execute($sql);

              if ($has_type->RecordCount() < 1) {
                $insert_sql_data = array('faq_category_id' => $faq_categories_id,
                                         'faq_type_id' => $parent_faq_type->fields['faq_type_id']);

                zen_db_perform(TABLE_FAQ_TYPES_TO_FAQ_CATEGORY, $insert_sql_data);

              }
	    }
          }
        } elseif ($action == 'update_faq_category') {
          $update_sql_data = array('last_modified' => 'now()');

          $sql_data_array = array_merge($sql_data_array, $update_sql_data);

          zen_db_perform(TABLE_FAQ_CATEGORIES, $sql_data_array, 'update', "faq_categories_id = '" . (int)$faq_categories_id . "'");
        }

        $languages = zen_get_languages();
        for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
          $faq_categories_name_array = $_POST['faq_categories_name'];
          $faq_categories_description_array = $_POST['faq_categories_description'];
          $language_id = $languages[$i]['id'];

// clean $faq_categories_description when blank or just <p /> left behind
          $sql_data_array = array('faq_categories_name' => zen_db_prepare_input($faq_categories_name_array[$language_id]),
                                  'faq_categories_description' => ($faq_categories_description_array[$language_id] == '<p />' ? '' : zen_db_prepare_input($faq_categories_description_array[$language_id])));

          if ($action == 'insert_faq_category') {
            $insert_sql_data = array('faq_categories_id' => $faq_categories_id,
                                     'language_id' => $languages[$i]['id']);

            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

            zen_db_perform(TABLE_FAQ_CATEGORIES_DESCRIPTION, $sql_data_array);
          } elseif ($action == 'update_faq_category') {
            zen_db_perform(TABLE_FAQ_CATEGORIES_DESCRIPTION, $sql_data_array, 'update', "faq_categories_id = '" . (int)$faq_categories_id . "' and language_id = '" . (int)$languages[$i]['id'] . "'");
          }
        }

        if ($faq_categories_image = new upload('faq_categories_image')) {
          $faq_categories_image->set_destination(DIR_FS_CATALOG_IMAGES . $_POST['img_dir']);
          if ($faq_categories_image->parse() && $faq_categories_image->save()) {
            $faq_categories_image_name = $_POST['img_dir'] . $faq_categories_image->filename;
          }
          if ($faq_categories_image->filename != 'none' && $faq_categories_image->filename != '') {
            $db->Execute("update " . TABLE_FAQ_CATEGORIES . "
                          set faq_categories_image = '" . $faq_categories_image_name . "'
                          where faq_categories_id = '" . (int)$faq_categories_id . "'");
          } else {
            // remove when set to none
            if ($faq_categories_image->filename == 'none') {
              $db->Execute("update " . TABLE_FAQ_CATEGORIES . "
                            set faq_categories_image = ''
                            where faq_categories_id = '" . (int)$faq_categories_id . "'");
            }
          }
        }


        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $faq_categories_id));
        break;
      case 'delete_faq_category_confirm_old':
        // demo active test
        if (zen_admin_demo()) {
          $_GET['action']= '';
          $messageStack->add_session(ERROR_ADMIN_DEMO, 'caution');
        	zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath));
        }
        if (isset($_POST['faq_categories_id'])) {
          $faq_categories_id = zen_db_prepare_input($_POST['faq_categories_id']);

          $faq_categories = zen_get_faq_category_tree($faq_categories_id, '', '0', '', true);
          $faqs = array();
          $faqs_delete = array();

          for ($i=0, $n=sizeof($faq_categories); $i<$n; $i++) {
            $faq_ids = $db->Execute("select faqs_id
                                         from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                         where faq_categories_id = '" . (int)$faq_categories[$i]['id'] . "'");

            while (!$faq_ids->EOF) {
              $faqs[$faq_ids->fields['faqs_id']]['faq_categories'][] = $faq_categories[$i]['id'];
              $faq_ids->MoveNext();
            }
          }

          reset($faqs);
          while (list($key, $value) = each($faqs)) {
            $faq_category_ids = '';

            for ($i=0, $n=sizeof($value['faq_categories']); $i<$n; $i++) {
              $faq_category_ids .= "'" . (int)$value['faq_categories'][$i] . "', ";
            }
            $faq_category_ids = substr($faq_category_ids, 0, -2);

            $check = $db->Execute("select count(*) as total
                                         from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                         where faqs_id = '" . (int)$key . "'
                                         and faq_categories_id not in (" . $faq_category_ids . ")");
            if ($check->fields['total'] < '1') {
              $faqs_delete[$key] = $key;
            }
          }

// removing faq_categories can be a lengthy process
          zen_set_time_limit(600);
          for ($i=0, $n=sizeof($faq_categories); $i<$n; $i++) {
            zen_remove_faq_category($faq_categories[$i]['id']);
          }

          reset($faqs_delete);
          while (list($key) = each($faqs_delete)) {
            zen_remove_faq($key);
          }
        }


        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath));
        break;

//////////////////////////////////
// delete new

      case 'delete_faq_category_confirm':
        // demo active test
        if (zen_admin_demo()) {
          $_GET['action']= '';
          $messageStack->add_session(ERROR_ADMIN_DEMO, 'caution');
        	zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath));
        }

// future cat specific deletion
        $delete_linked = 'true';
        if ($_POST['delete_linked'] == 'delete_linked_no') {
          $delete_linked = 'false';
        } else {
          $delete_linked = 'true';
        }

        // delete faq_category and faqs
        if (isset($_POST['faq_categories_id'])) {
          $faq_categories_id = zen_db_prepare_input($_POST['faq_categories_id']);

          $faq_categories = zen_get_faq_category_tree($faq_categories_id, '', '0', '', true);

          for ($i=0, $n=sizeof($faq_categories); $i<$n; $i++) {
            $faq_ids = $db->Execute("select faqs_id
                                         from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                         where faq_categories_id = '" . (int)$faq_categories[$i]['id'] . "'");

            while (!$faq_ids->EOF) {
              $faqs[$faq_ids->fields['faqs_id']]['faq_categories'][] = $faq_categories[$i]['id'];
              $faq_ids->MoveNext();
            }
          }

// change the status of faq_categories and faqs
          zen_set_time_limit(600);
          for ($i=0, $n=sizeof($faq_categories); $i<$n; $i++) {

            // set faqs_status based on selection

              $sql = "select faqs_id from " . TABLE_FAQS_TO_FAQ_CATEGORIES . " where faq_categories_id='" . $faq_categories[$i]['id'] . "'";
              $faq_category_faqs = $db->Execute($sql);

              while (!$faq_category_faqs->EOF) {
                // future cat specific use for
                zen_remove_faq($faq_category_faqs->fields['faqs_id'], $delete_linked);
                $faq_category_faqs->MoveNext();
              }

            zen_remove_faq_category($faq_categories[$i]['id']);

          } // for
        }
        zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath));
        break;

// eof delete new
/////////////////////////////////
// @@TODO where is delete_faq_confirm

      case 'move_faq_category_confirm':
        if (isset($_POST['faq_categories_id']) && ($_POST['faq_categories_id'] != $_POST['move_to_faq_category_id'])) {
          $faq_categories_id = zen_db_prepare_input($_POST['faq_categories_id']);
          $new_parent_id = zen_db_prepare_input($_POST['move_to_faq_category_id']);

          $path = explode('_', zen_get_generated_faq_category_path_ids($new_parent_id));

          if (in_array($faq_categories_id, $path)) {
            $messageStack->add_session(ERROR_CANNOT_MOVE_FAQ_CATEGORY_TO_PARENT, 'error');

            zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $faq_categories_id));
          } else {
            $db->Execute("update " . TABLE_FAQ_CATEGORIES . "
                          set parent_id = '" . (int)$new_parent_id . "', last_modified = now()
                          where faq_categories_id = '" . (int)$faq_categories_id . "'");

            zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $new_parent_id . '&cID=' . $faq_categories_id));
          }
        }

        break;

      $_GET['action']= '';
      zen_redirect(zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $_GET['faqs_id'] . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')));
      break;
    case 'new_faq':
      if (isset($_GET['faq_type'])) {
      // see if this faq_category is restricted
        $pieces = explode('_',$_GET['fcPath']);
        $cat_id = $pieces[sizeof($pieces)-1];
//	echo $cat_id;
        $sql = "select faq_type_id from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . " where faq_category_id = '" . $cat_id . "'";
        $faq_type_list = $db->Execute($sql);
        $sql = "select faq_type_id from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . " where faq_category_id = '" . $cat_id . "' and faq_type_id = '" . $_GET['faq_type'] . "'";
        $faq_type_good = $db->Execute($sql);
        if ($faq_type_list->RecordCount() < 1 || $faq_type_good->RecordCount() > 0) {
          $url = zen_get_all_get_params();
          $sql = "select type_handler from " . TABLE_FAQ_TYPES . " where type_id = '" . $_GET['faq_type'] . "'";
          $handler = $db->Execute($sql);
          zen_redirect(zen_href_link($handler->fields['type_handler'] . '.php', zen_get_all_get_params()));
        } else {
          $messageStack->add(ERROR_CANNOT_ADD_FAQ_TYPE, 'error');
        }
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
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onLoad="init()">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="0">
  <tr>
<!-- body_text //-->
    <td width="100%" valign="top">
<?php
    require(DIR_WS_MODULES . 'faq_category_faq_listing.php');

    $heading = array();
    $contents = array();
// Make an array of faq types
    $sql = "select type_id, type_name from " . TABLE_FAQ_TYPES;
    $faq_types = $db->Execute($sql);
    while (!$faq_types->EOF) {
      $type_array[] = array('id' => $faq_types->fields['type_id'], text => $faq_types->fields['type_name']);
      $faq_types->MoveNext();
    }
    switch ($action) {
      case 'setflag_faq_categories':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_STATUS_FAQ_CATEGORY . '</b>');
        $contents = array('form' => zen_draw_form('faq_categories', FILENAME_FAQ_CATEGORIES, 'action=update_faq_category_status&fcPath=' . $_GET['fcPath'] . '&cID=' . $_GET['cID'], 'post', 'enctype="multipart/form-data"') . zen_draw_hidden_field('faq_categories_id', $cInfo->faq_categories_id) . zen_draw_hidden_field('faq_categories_status', $cInfo->faq_categories_status));
        $contents[] = array('text' => zen_get_faq_category_name($cInfo->faq_categories_id, $_SESSION['languages_id']));
        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES_STATUS_WARNING . '<br /><br />');
        $contents[] = array('text' => TEXT_FAQ_CATEGORIES_STATUS_INTRO . ' ' . ($cInfo->faq_categories_status == '1' ? TEXT_FAQ_CATEGORIES_STATUS_OFF : TEXT_FAQ_CATEGORIES_STATUS_ON));
        if ($cInfo->faq_categories_status == '1') {
          $contents[] = array('text' => '<br />' . TEXT_FAQS_STATUS_INFO . ' ' . TEXT_FAQS_STATUS_OFF . zen_draw_hidden_field('set_faqs_status_off', true));
        } else {
          $contents[] = array('text' => '<br />' . TEXT_FAQS_STATUS_INFO . '<br />' .
          zen_draw_radio_field('set_faqs_status', 'set_faqs_status_on', true) . ' ' . TEXT_FAQS_STATUS_ON . '<br />' .
          zen_draw_radio_field('set_faqs_status', 'set_faqs_status_off') . ' ' . TEXT_FAQS_STATUS_OFF . '<br />' .
          zen_draw_radio_field('set_faqs_status', 'set_faqs_status_nochange') . ' ' . TEXT_FAQS_STATUS_NOCHANGE);
        }


//        $contents[] = array('text' => '<br />' . TEXT_FAQS_STATUS_INFO . '<br />' . zen_draw_radio_field('set_faqs_status', 'set_faqs_status_off', true) . ' ' . TEXT_FAQS_STATUS_OFF . '<br />' . zen_draw_radio_field('set_faqs_status', 'set_faqs_status_on') . ' ' . TEXT_FAQS_STATUS_ON);

        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;

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
        $faq_category_inputs_string = '';

        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $faq_category_inputs_string .= '<br />' . zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;';
          if (HTML_EDITOR_PREFERENCE=='FCKEDITOR') {
		  	include_once (DIR_WS_INCLUDES.'fckeditor.php');
            /*$faq_category_inputs_string .= '<br />';
            $faq_category_inputs_string .= '<IFRAME src= "' . DIR_WS_CATALOG . 'editors/fckeditor/editor/fckeditor.html?FieldName=faq_categories_description[' . $languages[$i]['id']  . ']&Upload=false&Browse=false&Toolbar=Short" width="97%" height="200" frameborder="no" scrolling="yes"></IFRAME>';
            $faq_category_inputs_string .= '<INPUT type="hidden" name="faq_categories_description[' . $languages[$i]['id']  . ']" ' . 'value=' . "'" . zen_get_faq_category_description($cInfo->faq_categories_id, $languages[$i]['id']) . "'>";*/
			$oFCKeditor = new FCKeditor('faq_categories_description[' . $languages[$i]['id']  . ']') ;
                $oFCKeditor->Value = zen_get_faq_category_description($cInfo->faq_categories_id, $languages[$i]['id']);
                $oFCKeditor->Width  = '90%' ;
                $oFCKeditor->Height = '230' ;
//                $oFCKeditor->Config['ToolbarLocation'] = 'Out:xToolbar' ;
//                $oFCKeditor->Create() ;
                $output = $oFCKeditor->CreateHtml() ;
        $faq_category_inputs_string .= '<br />' . $output;
          } else {
            $faq_category_inputs_string .= zen_draw_textarea_field('faq_categories_description[' . $languages[$i]['id'] . ']', 'soft', '100%', '20', zen_get_faq_category_description($cInfo->faq_categories_id, $languages[$i]['id']));
          }
        }
        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES_DESCRIPTION . $faq_category_inputs_string);
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

        $contents[] = array('text' => '<br />' . TEXT_SORT_ORDER . '<br />' . zen_draw_input_field('sort_order', '', 'size="6"'));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_save.gif', IMAGE_SAVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'edit_faq_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_EDIT_FAQ_CATEGORY . '</b>');

        $contents = array('form' => zen_draw_form('faq_categories', FILENAME_FAQ_CATEGORIES, 'action=update_faq_category&fcPath=' . $fcPath, 'post', 'enctype="multipart/form-data"') . zen_draw_hidden_field('faq_categories_id', $cInfo->faq_categories_id));
        $contents[] = array('text' => TEXT_EDIT_INTRO);

        $languages = zen_get_languages();

        $faq_category_inputs_string = '';
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $faq_category_inputs_string .= '<br />' . zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . zen_draw_input_field('faq_categories_name[' . $languages[$i]['id'] . ']', zen_get_faq_category_name($cInfo->faq_categories_id, $languages[$i]['id']), zen_set_field_length(TABLE_FAQ_CATEGORIES_DESCRIPTION, 'faq_categories_name'));
        }
        $contents[] = array('text' => '<br />' . TEXT_EDIT_FAQ_CATEGORIES_NAME . $faq_category_inputs_string);
        $faq_category_inputs_string = '';
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $faq_category_inputs_string .= '<br />' . zen_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' ;
          if (HTML_EDITOR_PREFERENCE=='FCKEDITOR') {
            $faq_category_inputs_string .= '<br />';
            $faq_category_inputs_string .= '<IFRAME src= "' . DIR_WS_CATALOG . 'FCKeditor/fckeditor.html?FieldName=faq_categories_description[' . $languages[$i]['id']  . ']&Upload=false&Browse=false&Toolbar=Short" width="97%" height="200" frameborder="no" scrolling="yes"></IFRAME>';
            $faq_category_inputs_string .= '<INPUT type="hidden" name="faq_categories_description[' . $languages[$i]['id']  . ']" ' . 'value=' . "'" . zen_get_faq_category_description($cInfo->faq_categories_id, $languages[$i]['id']) . "'>";
          } else {
            $faq_category_inputs_string .= zen_draw_textarea_field('faq_categories_description[' . $languages[$i]['id'] . ']', 'soft', '100%', '20', zen_get_faq_category_description($cInfo->faq_categories_id, $languages[$i]['id']));
          }
        }
        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES_DESCRIPTION . $faq_category_inputs_string);
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

        $contents[] = array('text' => '<br />' . TEXT_EDIT_SORT_ORDER . '<br />' . zen_draw_input_field('sort_order', $cInfo->sort_order, 'size="6"'));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_save.gif', IMAGE_SAVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $cInfo->faq_categories_id) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        $contents[] = array('text' => TEXT_RESTRICT_FAQ_TYPE . ' ' . zen_draw_pull_down_menu('restrict_type', $type_array) . '&nbsp<input type="submit" name="add_type_all" value="' . BUTTON_ADD_FAQ_TYPES_SUBFAQ_CATEGORIES_ON . '">' . '&nbsp<input type="submit" name="add_type" value="' . BUTTON_ADD_FAQ_TYPES_SUBFAQ_CATEGORIES_OFF . '">');
        $sql = "select * from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                         where faq_category_id = '" . $cInfo->faq_categories_id . "'";

        $restrict_types = $db->Execute($sql);
        if ($restrict_types->RecordCount() > 0 ) {
          $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORY_HAS_RESTRICTIONS . '<br />');
          while (!$restrict_types->EOF) {
            $sql = "select type_name from " . TABLE_FAQ_TYPES . " where type_id = '" . $restrict_types->fields['faq_type_id'] . "'";
            $type = $db->Execute($sql);
            $contents[] = array('text' => '<a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'action=remove_type&fcPath=' . $fcPath . '&cID='.$cInfo->faq_categories_id.'&type_id='.$restrict_types->fields['faq_type_id']) . '">' . zen_image_button('button_delete.gif', IMAGE_DELETE) . '</a>&nbsp;' . $type->fields['type_name'] . '<br />');
            $restrict_types->MoveNext();
          }
        }
        break;
      case 'delete_faq_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_FAQ_CATEGORY . '</b>');

        $contents = array('form' => zen_draw_form('faq_categories', FILENAME_FAQ_CATEGORIES, 'action=delete_faq_category_confirm&fcPath=' . $fcPath) . zen_draw_hidden_field('faq_categories_id', $cInfo->faq_categories_id));
        $contents[] = array('text' => TEXT_DELETE_FAQ_CATEGORY_INTRO);
        $contents[] = array('text' => '<br /><b>' . $cInfo->faq_categories_name . '</b>');
        if ($cInfo->childs_count > 0) $contents[] = array('text' => '<br />' . sprintf(TEXT_DELETE_WARNING_CHILDS, $cInfo->childs_count));
        if ($cInfo->faqs_count > 0) $contents[] = array('text' => '<br />' . sprintf(TEXT_DELETE_WARNING_FAQS, $cInfo->faqs_count));
/*
        // future cat specific
        if ($cInfo->faqs_count > 0) {
          $contents[] = array('text' => '<br />' . TEXT_FAQS_LINKED_INFO . '<br />' .
          zen_draw_radio_field('delete_linked', 'delete_linked_yes') . ' ' . TEXT_FAQS_DELETE_LINKED_YES . '<br />' .
          zen_draw_radio_field('delete_linked', 'delete_linked_no', true) . ' ' . TEXT_FAQS_DELETE_LINKED_NO);
        }
*/
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $cInfo->faq_categories_id) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'move_faq_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_FAQ_CATEGORY . '</b>');

        $contents = array('form' => zen_draw_form('faq_categories', FILENAME_FAQ_CATEGORIES, 'action=move_faq_category_confirm&fcPath=' . $fcPath) . zen_draw_hidden_field('faq_categories_id', $cInfo->faq_categories_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_FAQ_CATEGORIES_INTRO, $cInfo->faq_categories_name));
        $contents[] = array('text' => '<br />' . sprintf(TEXT_MOVE, $cInfo->faq_categories_name) . '<br />' . zen_draw_pull_down_menu('move_to_faq_category_id', zen_get_faq_category_tree(), $current_faq_category_id));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_move.gif', IMAGE_MOVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&cID=' . $cInfo->faq_categories_id) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'delete_faq':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_FAQ . '</b>');

        $contents = array('form' => zen_draw_form('faqs', FILENAME_FAQ_CATEGORIES, 'action=delete_faq_confirm&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . zen_draw_hidden_field('faqs_id', $pInfo->faqs_id));
        $contents[] = array('text' => TEXT_DELETE_FAQ_INTRO);
        $contents[] = array('text' => '<br /><b>' . $pInfo->faqs_name . ' ID#' . $pInfo->faqs_id . '</b>');

        $faq_faq_categories_string = '';
        $faq_faq_categories = zen_generate_faq_category_path($pInfo->faqs_id, 'faq');
        for ($i = 0, $n = sizeof($faq_faq_categories); $i < $n; $i++) {
          $faq_category_path = '';
          for ($j = 0, $k = sizeof($faq_faq_categories[$i]); $j < $k; $j++) {
            $faq_category_path .= $faq_faq_categories[$i][$j]['text'] . '&nbsp;&gt;&nbsp;';
          }
          $faq_category_path = substr($faq_category_path, 0, -16);
          $faq_faq_categories_string .= zen_draw_checkbox_field('faq_faq_categories[]', $faq_faq_categories[$i][sizeof($faq_faq_categories[$i])-1]['id'], true) . '&nbsp;' . $faq_category_path . '<br />';
        }
        $faq_faq_categories_string = substr($faq_faq_categories_string, 0, -4);

        $contents[] = array('text' => '<br />' . $faq_faq_categories_string);
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'move_faq':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_FAQ . '</b>');

        $contents = array('form' => zen_draw_form('faqs', FILENAME_FAQ_CATEGORIES, 'action=move_faq_confirm&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . zen_draw_hidden_field('faqs_id', $pInfo->faqs_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_FAQS_INTRO, $pInfo->faqs_name));
        $contents[] = array('text' => '<br />' . TEXT_INFO_CURRENT_FAQ_CATEGORIES . '<br /><b>' . zen_output_generated_faq_category_path($pInfo->faqs_id, 'faq') . '</b>');
        $contents[] = array('text' => '<br />' . sprintf(TEXT_MOVE, $pInfo->faqs_name) . '<br />' . zen_draw_pull_down_menu('move_to_faq_category_id', zen_get_faq_category_tree(), $current_faq_category_id));
        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_move.gif', IMAGE_MOVE) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'copy_to':
         $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_COPY_TO . '</b>');
// WebMakers.com Added: Split Page
        if (empty($pInfo->faqs_id)) {
          $pInfo->faqs_id= $pID;
        }

        $contents = array('form' => zen_draw_form('copy_to', FILENAME_FAQ_CATEGORIES, 'action=copy_to_confirm&fcPath=' . $fcPath . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . zen_draw_hidden_field('faqs_id', $pInfo->faqs_id));
        $contents[] = array('text' => TEXT_INFO_COPY_TO_INTRO);
        $contents[] = array('text' => '<br />' . TEXT_INFO_CURRENT_FAQ . '<br /><b>' . $pInfo->faqs_name  . ' ID#' . $pInfo->faqs_id . '</b>');
        $contents[] = array('text' => '<br />' . TEXT_INFO_CURRENT_FAQ_CATEGORIES . '<br /><b>' . zen_output_generated_faq_category_path($pInfo->faqs_id, 'faq') . '</b>');
        $contents[] = array('text' => '<br />' . TEXT_FAQ_CATEGORIES . '<br />' . zen_draw_pull_down_menu('faq_categories_id', zen_get_faq_category_tree(), $current_faq_category_id));
        $contents[] = array('text' => '<br />' . TEXT_HOW_TO_COPY . '<br />' . zen_draw_radio_field('copy_as', 'link', true) . ' ' . TEXT_COPY_AS_LINK . '<br />' . zen_draw_radio_field('copy_as', 'duplicate') . ' ' . TEXT_COPY_AS_DUPLICATE);

        $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_copy.gif', IMAGE_COPY) . ' <a href="' . zen_href_link(FILENAME_FAQ_CATEGORIES, 'fcPath=' . $fcPath . '&pID=' . $pInfo->faqs_id . (isset($_GET['page']) ? '&page=' . $_GET['page'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;


    } // switch

    if ( (zen_not_null($heading)) && (zen_not_null($contents)) ) {
      echo '            <td valign="top">' . "\n";

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
  <td class="smallText" align="center"><?php echo $faqs_split->display_count($faqs_query_numrows, MAX_DISPLAY_RESULTS_CATEGORIES, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_FAQS) . '<br>' . $faqs_split->display_links($faqs_query_numrows, MAX_DISPLAY_RESULTS_CATEGORIES, MAX_DISPLAY_PAGE_LINKS, $_GET['page'], zen_get_all_get_params(array('page', 'info', 'x', 'y')) ); ?></td>

<?php
}
// Split Page
?>
          </tr>
        </table></td>
      </tr>
    </table>
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
