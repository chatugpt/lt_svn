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
//  $Id: general.php 895 2005-01-07 18:39:16Z ajeh $
//
// calculate faq_category path
  if (isset($_GET['fcPath'])) {
    $fcPath = $_GET['fcPath'];
  } else {
    $fcPath = '';
  }

  if (zen_not_null($fcPath)) {
    $fcPath_array = zen_parse_faq_category_path($fcPath);
    $fcPath = implode('_', $fcPath_array);
    $current_faq_category_id = $fcPath_array[(sizeof($fcPath_array)-1)];
  } else {
    $current_faq_category_id = 0;
  }


////
// Sets the status of a product review
  function zen_set_faq_reviews_status($review_id, $status) {
    global $db;
    if ($status == '1') {
      return $db->Execute("update " . TABLE_FAQ_REVIEWS . "
                           set status = '1'
                           where reviews_id = '" . (int)$review_id . "'");

    } elseif ($status == '0') {
      return $db->Execute("update " . TABLE_FAQ_REVIEWS . "
                           set status = '0'
                           where reviews_id = '" . (int)$review_id . "'");

    } else {
      return -1;
    }
  }



  function zen_get_faq_category_tree($faq_parent_id = '0', $spacing = '', $exclude = '', $faq_category_tree_array = '', $include_itself = false, $faq_category_has_faqs = false, $limit = false) {
    global $db;

    if ($limit) {
      $limit_count = " limit 1";
    } else {
      $limit_count = '';
    }

    if (!is_array($faq_category_tree_array)) $faq_category_tree_array = array();
    if ( (sizeof($faq_category_tree_array) < 1) && ($exclude != '0') ) $faq_category_tree_array[] = array('id' => '0', 'text' => TEXT_TOP);

    if ($include_itself) {
      $faq_category = $db->Execute("select cd.faq_categories_name
                                from " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                where cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and cd.faq_categories_id = '" . (int)$faq_parent_id . "'");

      $faq_category_tree_array[] = array('id' => $faq_parent_id, 'text' => $faq_category->fields['faq_categories_name']);
    }

    $faq_categories = $db->Execute("select c.faq_categories_id, cd.faq_categories_name, c.parent_id
                                from " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                where c.faq_categories_id = cd.faq_categories_id
                                and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and c.parent_id = '" . (int)$faq_parent_id . "'
                                order by c.sort_order, cd.faq_categories_name");

    while (!$faq_categories->EOF) {
      if ($faq_category_has_faqs == true and zen_faqs_in_faq_category_count($faq_categories->fields['faq_categories_id'], '', false, true) >= 1) {
        $mark = '*';
      } else {
        $mark = '&nbsp;&nbsp;';
      }
      if ($exclude != $faq_categories->fields['faq_categories_id']) $faq_category_tree_array[] = array('id' => $faq_categories->fields['faq_categories_id'], 'text' => $spacing . $faq_categories->fields['faq_categories_name'] . $mark);
      $faq_category_tree_array = zen_get_faq_category_tree($faq_categories->fields['faq_categories_id'], $spacing . '&nbsp;&nbsp;&nbsp;', $exclude, $faq_category_tree_array, '', $faq_category_has_faqs);
      $faq_categories->MoveNext();
    }

    return $faq_category_tree_array;
  }


////
// faqs with name pulldown
  function zen_draw_faqs_pull_down($name, $parameters = '', $exclude = '', $show_id = false, $set_selected = false, $show_current_faq_category = false) {
    global $currencies, $db, $current_faq_category_id;

    if ($exclude == '') {
      $exclude = array();
    }

    $select_string = '<select name="' . $name . '"';

    if ($parameters) {
      $select_string .= ' ' . $parameters;
    }

    $select_string .= '>';

    if ($show_current_faq_category) {
// only show $current_faq_categories_id
      $faqs = $db->Execute("select p.*, pd.*, ptc.*
                                from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd
                                left join " . TABLE_FAQS_TO_FAQ_CATEGORIES . " ptc on ptc.faqs_id = p.faqs_id
                                where p.faqs_id = pd.faqs_id
                                and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and ptc.faq_categories_id = '" . $current_faq_category_id . "'
                                order by faqs_name");
    } else {
      $faqs = $db->Execute("select p.*, pd.*
                                from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd
                                where p.faqs_id = pd.faqs_id
                                and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                order by faqs_name");
    }

    while (!$faqs->EOF) {
      if (!in_array($faqs->fields['faqs_id'], $exclude)) {
        $select_string .= '<option value="' . $faqs->fields['faqs_id'] . '"';
        if ($set_selected == $faqs->fields['faqs_id']) $select_string .= ' SELECTED';
        $select_string .= '>' . $faqs->fields['faqs_name'] . ($show_id ? ' - ID# ' . $faqs->fields['faqs_id'] : '') . '</option>';
      }
      $faqs->MoveNext();
    }

    $select_string .= '</select>';

    return $select_string;
  }

  function zen_get_faq_category_name($faq_category_id, $language_id) {
    global $db;
    $faq_category = $db->Execute("select faq_categories_name
                              from " . TABLE_FAQ_CATEGORIES_DESCRIPTION . "
                              where faq_categories_id = '" . (int)$faq_category_id . "'
                              and language_id = '" . (int)$language_id . "'");

    return $faq_category->fields['faq_categories_name'];
  }


  function zen_get_faq_category_description($faq_category_id, $language_id) {
    global $db;
    $faq_category = $db->Execute("select faq_categories_description
                              from " . TABLE_FAQ_CATEGORIES_DESCRIPTION . "
                              where faq_categories_id = '" . (int)$faq_category_id . "'
                              and language_id = '" . (int)$language_id . "'");

    return $faq_category->fields['faq_categories_description'];
  }

  function zen_get_faqs_name($faq_id, $language_id = 0) {
    global $db;

    if ($language_id == 0) $language_id = $_SESSION['languages_id'];
    $faq = $db->Execute("select faqs_name
                             from " . TABLE_FAQS_DESCRIPTION . "
                             where faqs_id = '" . (int)$faq_id . "'
                             and language_id = '" . (int)$language_id . "'");

    return $faq->fields['faqs_name'];
  }
  
    function zen_get_faqs_contact_name($faq_id, $language_id = 0) {
    global $db;

    if ($language_id == 0) $language_id = $_SESSION['languages_id'];
    $faq = $db->Execute("select faqs_contact_name
                             from " . TABLE_FAQS_DESCRIPTION . "
                             where faqs_id = '" . (int)$faq_id . "'
                             and language_id = '" . (int)$language_id . "'");

    return $faq->fields['faqs_contact_name'];
  }


    function zen_get_faqs_contact_mail($faq_id, $language_id = 0) {
    global $db;

    if ($language_id == 0) $language_id = $_SESSION['languages_id'];
    $faq = $db->Execute("select faqs_contact_mail
                             from " . TABLE_FAQS_DESCRIPTION . "
                             where faqs_id = '" . (int)$faq_id . "'
                             and language_id = '" . (int)$language_id . "'");

    return $faq->fields['faqs_contact_mail'];
  }

  function zen_get_faqs_description($faq_id, $language_id) {
    global $db;
    $faq = $db->Execute("select faqs_description
                             from " . TABLE_FAQS_DESCRIPTION . "
                             where faqs_id = '" . (int)$faq_id . "'
                             and language_id = '" . (int)$language_id . "'");

    return $faq->fields['faqs_description'];
  }


  function zen_get_faqs_answer($faq_id, $language_id) {
    global $db;
    $faq = $db->Execute("select faqs_answer
                             from " . TABLE_FAQS_DESCRIPTION . "
                             where faqs_id = '" . (int)$faq_id . "'
                             and language_id = '" . (int)$language_id . "'");

    return $faq->fields['faqs_answer'];
  }



  function zen_get_faqs_url($faq_id, $language_id) {
    global $db;
    $faq = $db->Execute("select faqs_url
                             from " . TABLE_FAQS_DESCRIPTION . "
                             where faqs_id = '" . (int)$faq_id . "'
                             and language_id = '" . (int)$language_id . "'");

    return $faq->fields['faqs_url'];
  }

////
// Count how many faqs exist in a faq_category
// TABLES: faqs, faqs_to_faq_categories, faq_categories
  function zen_faqs_in_faq_category_count($faq_categories_id, $include_deactivated = false, $include_child = true, $limit = false) {
    global $db;
    $faqs_count = 0;

    if ($limit) {
      $limit_count = ' limit 1';
    } else {
      $limit_count = '';
    }

    if ($include_deactivated) {

      $faqs = $db->Execute("select count(*) as total
                                from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                                where p.faqs_id = p2c.faqs_id
                                and p2c.faq_categories_id = '" . (int)$faq_categories_id . "'" . $limit_count);
    } else {
      $faqs = $db->Execute("select count(*) as total
                                from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                                where p.faqs_id = p2c.faqs_id
                                and p.faqs_status = '1'
                                and p2c.faq_categories_id = '" . (int)$faq_categories_id . "'" . $limit_count);

    }

    $faqs_count += $faqs->fields['total'];

    if ($include_child) {
      $childs = $db->Execute("select faq_categories_id from " . TABLE_FAQ_CATEGORIES . "
                              where parent_id = '" . (int)$faq_categories_id . "'");
      if ($childs->RecordCount() > 0 ) {
        while (!$childs->EOF) {
          $faqs_count += zen_faqs_in_faq_category_count($childs->fields['faq_categories_id'], $include_deactivated);
          $childs->MoveNext();
        }
      }
    }
    return $faqs_count;
  }


////
// Count how many subfaq_categories exist in a faq_category
// TABLES: faq_categories
  function zen_childs_in_faq_category_count($faq_categories_id) {
    global $db;
    $faq_categories_count = 0;

    $faq_categories = $db->Execute("select faq_categories_id
                                from " . TABLE_FAQ_CATEGORIES . "
                                where parent_id = '" . (int)$faq_categories_id . "'");

    while (!$faq_categories->EOF) {
      $faq_categories_count++;
      $faq_categories_count += zen_childs_in_faq_category_count($faq_categories->fields['faq_categories_id']);
      $faq_categories->MoveNext();
    }

    return $faq_categories_count;
  }



////
// Sets the status of a faq 

  function zen_set_faq_status($faqs_id, $status) {
    global $db;
    if ($status == '1') {
      return $db->Execute("update " . TABLE_FAQS . "
                           set faqs_status = '1', faqs_last_modified = now()
                           where faqs_id = '" . (int)$faqs_id . "'");

    } elseif ($status == '0') {
      return $db->Execute("update " . TABLE_FAQS . "
                           set faqs_status = '0', faqs_last_modified = now()
                           where faqs_id = '" . (int)$faqs_id . "'");

    } else {
      return -1;
    }
  }


  function zen_generate_faq_category_path($id, $from = 'faq_category', $faq_categories_array = '', $index = 0) {
    global $db;

    if (!is_array($faq_categories_array)) $faq_categories_array = array();

    if ($from == 'faq') {
      $faq_categories = $db->Execute("select faq_categories_id
                                  from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                                  where faqs_id = '" . (int)$id . "'");

      while (!$faq_categories->EOF) {
        if ($faq_categories->fields['faq_categories_id'] == '0') {
          $faq_categories_array[$index][] = array('id' => '0', 'text' => TEXT_TOP);
        } else {
          $faq_category = $db->Execute("select cd.faq_categories_name, c.parent_id
                                    from " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                    where c.faq_categories_id = '" . (int)$faq_categories->fields['faq_categories_id'] . "'
                                    and c.faq_categories_id = cd.faq_categories_id
                                    and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'");

          $faq_categories_array[$index][] = array('id' => $faq_categories->fields['faq_categories_id'], 'text' => $faq_category->fields['faq_categories_name']);
          if ( (zen_not_null($faq_category->fields['parent_id'])) && ($faq_category->fields['parent_id'] != '0') ) $faq_categories_array = zen_generate_faq_category_path($faq_category->fields['parent_id'], 'faq_category', $faq_categories_array, $index);
          $faq_categories_array[$index] = array_reverse($faq_categories_array[$index]);
        }
        $index++;
        $faq_categories->MoveNext();
      }
    } elseif ($from == 'faq_category') {
      $faq_category = $db->Execute("select cd.faq_categories_name, c.parent_id
                                from " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                where c.faq_categories_id = '" . (int)$id . "'
                                and c.faq_categories_id = cd.faq_categories_id
                                and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'");

      $faq_categories_array[$index][] = array('id' => $id, 'text' => $faq_category->fields['faq_categories_name']);
      if ( (zen_not_null($faq_category->fields['parent_id'])) && ($faq_category->fields['parent_id'] != '0') ) $faq_categories_array = zen_generate_faq_category_path($faq_category->fields['parent_id'], 'faq_category', $faq_categories_array, $index);
    }

    return $faq_categories_array;
  }

  function zen_output_generated_faq_category_path($id, $from = 'faq_category') {
    $calculated_faq_category_path_string = '';
    $calculated_faq_category_path = zen_generate_faq_category_path($id, $from);
    for ($i=0, $n=sizeof($calculated_faq_category_path); $i<$n; $i++) {
      for ($j=0, $k=sizeof($calculated_faq_category_path[$i]); $j<$k; $j++) {
        $calculated_faq_category_path_string .= $calculated_faq_category_path[$i][$j]['text'] . '&nbsp;&gt;&nbsp;';
      }
      $calculated_faq_category_path_string = substr($calculated_faq_category_path_string, 0, -16) . '<br>';
    }
    $calculated_faq_category_path_string = substr($calculated_faq_category_path_string, 0, -4);

    if (strlen($calculated_faq_category_path_string) < 1) $calculated_faq_category_path_string = TEXT_TOP;

    return $calculated_faq_category_path_string;
  }

  function zen_get_generated_faq_category_path_ids($id, $from = 'faq_category') {
    global $db;
    $calculated_faq_category_path_string = '';
    $calculated_faq_category_path = zen_generate_faq_category_path($id, $from);
    for ($i=0, $n=sizeof($calculated_faq_category_path); $i<$n; $i++) {
      for ($j=0, $k=sizeof($calculated_faq_category_path[$i]); $j<$k; $j++) {
        $calculated_faq_category_path_string .= $calculated_faq_category_path[$i][$j]['id'] . '_';
      }
      $calculated_faq_category_path_string = substr($calculated_faq_category_path_string, 0, -1) . '<br>';
    }
    $calculated_faq_category_path_string = substr($calculated_faq_category_path_string, 0, -4);

    if (strlen($calculated_faq_category_path_string) < 1) $calculated_faq_category_path_string = TEXT_TOP;

    return $calculated_faq_category_path_string;
  }

  function zen_remove_faq_category($faq_category_id) {
    global $db;
    $faq_category_image = $db->Execute("select faq_categories_image
                                    from " . TABLE_FAQ_CATEGORIES . "
                                    where faq_categories_id = '" . (int)$faq_category_id . "'");

    $duplicate_image = $db->Execute("select count(*) as total
                                     from " . TABLE_FAQ_CATEGORIES . "
                                     where faq_categories_image = '" .
                                           zen_db_input($faq_category_image->fields['faq_categories_image']) . "'");
    if ($duplicate_image->fields['total'] < 2) {
      if (file_exists(DIR_FS_CATALOG_IMAGES . $faq_category_image->fields['faq_categories_image'])) {
        @unlink(DIR_FS_CATALOG_IMAGES . $faq_category_image->fields['faq_categories_image']);
      }
    }

    $db->Execute("delete from " . TABLE_FAQ_CATEGORIES . "
                  where faq_categories_id = '" . (int)$faq_category_id . "'");

    $db->Execute("delete from " . TABLE_FAQ_CATEGORIES_DESCRIPTION . "
                  where faq_categories_id = '" . (int)$faq_category_id . "'");

    $db->Execute("delete from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                  where faq_categories_id = '" . (int)$faq_category_id . "'");


  }

  function zen_remove_faq($faq_id, $ptc = 'true') {
    global $db;
    $faq_image = $db->Execute("select faqs_image
                                   from " . TABLE_FAQS . "
                                   where faqs_id = '" . (int)$faq_id . "'");

    $duplicate_image = $db->Execute("select count(*) as total
                                     from " . TABLE_FAQS . "
                                     where faqs_image = '" . zen_db_input($faq_image->fields['faqs_image']) . "'");

    if ($duplicate_image->fields['total'] < 2 and $faq_image->fields['faqs_image'] != '') {
      $faqs_image = $faq_image->fields['faqs_image'];
      $faqs_image_extention = substr($faqs_image, strrpos($faqs_image, '.'));
			$faqs_image_base = ereg_replace($faqs_image_extention, '', $faqs_image);

      $filename_medium = 'medium/' . $faqs_image_base . IMAGE_SUFFIX_MEDIUM . $faqs_image_extention;
			$filename_large = 'large/' . $faqs_image_base . IMAGE_SUFFIX_LARGE . $faqs_image_extention;

      if (file_exists(DIR_FS_CATALOG_IMAGES . $faq_image->fields['faqs_image'])) {
        @unlink(DIR_FS_CATALOG_IMAGES . $faq_image->fields['faqs_image']);
      }
      if (file_exists(DIR_FS_CATALOG_IMAGES . $filename_medium)) {
        @unlink(DIR_FS_CATALOG_IMAGES . $filename_medium);
      }
      if (file_exists(DIR_FS_CATALOG_IMAGES . $filename_large)) {
        @unlink(DIR_FS_CATALOG_IMAGES . $filename_large);
      }
    }


    $db->Execute("delete from " . TABLE_FAQS . "
                  where faqs_id = '" . (int)$faq_id . "'");

//    if ($ptc == 'true') {
      $db->Execute("delete from " . TABLE_FAQS_TO_FAQ_CATEGORIES . "
                    where faqs_id = '" . (int)$faq_id . "'");
//    }

    $db->Execute("delete from " . TABLE_FAQS_DESCRIPTION . "
                  where faqs_id = '" . (int)$faq_id . "'");


    $faq_reviews = $db->Execute("select reviews_id
                                     from " . TABLE_FAQ_REVIEWS . "
                                     where faqs_id = '" . (int)$faq_id . "'");

    while (!$faq_reviews->EOF) {
      $db->Execute("delete from " . TABLE_FAQ_REVIEWS_DESCRIPTION . "
                    where reviews_id = '" . (int)$faq_reviews->fields['reviews_id'] . "'");
      $faq_reviews->MoveNext();
    }
    $db->Execute("delete from " . TABLE_FAQ_REVIEWS . "
                  where faqs_id = '" . (int)$faq_id . "'");

  }



 
////
// Parse and secure the fcPath parameter values
  function zen_parse_faq_category_path($fcPath) {
// make sure the faq_category IDs are integers
    $fcPath_array = array_map('zen_string_to_int', explode('_', $fcPath));

// make sure no duplicate faq_category IDs exist which could lock the server in a loop
    $tmp_array = array();
    $n = sizeof($fcPath_array);
    for ($i=0; $i<$n; $i++) {
      if (!in_array($fcPath_array[$i], $tmp_array)) {
        $tmp_array[] = $fcPath_array[$i];
      }
    }

    return $tmp_array;
  }

////
// look-up Attributues Options Name faqs_options_values_to_faqs_options
  function zen_get_faqs_options_name_from_value($lookup) {
    global $db;

    if ($lookup==0) {
      return 'RESERVED FOR TEXT ONLY ATTRIBUTES';
    }

    $check_options_to_values = $db->Execute("select faqs_options_id
                    from " . TABLE_FAQS_OPTIONS_VALUES_TO_FAQS_OPTIONS . "
                    where faqs_options_values_id='" . $lookup . "'");

    $check_options = $db->Execute("select faqs_options_name
                      from " . TABLE_FAQS_OPTIONS . "
                      where faqs_options_id='" . $check_options_to_values->fields['faqs_options_id']
                      . "' and language_id='" . $_SESSION['languages_id'] . "'");

    return $check_options->fields['faqs_options_name'];
  }








////
// Check if faq_id is valid
  function zen_faqs_id_valid($faqs_id) {
    global $db;
    $faqs_valid_query = "select count(*) as count
                         from " . TABLE_FAQS . "
                         where faqs_id = '" . (int)$faqs_id . "'";

    $faqs_valid = $db->Execute($faqs_valid_query);

    if ($faqs_valid->fields['count'] > 0) {
      return true;
    } else {
      return false;
    }
  }

function zen_copy_faqs_attributes($faqs_id_from, $faqs_id_to) {
  global $db;
  global $messageStack;
  global $copy_attributes_delete_first, $copy_attributes_duplicates_skipped, $copy_attributes_duplicates_overwrite, $copy_attributes_include_downloads, $copy_attributes_include_filename;

// Check for errors in copy request
  if ( (!zen_has_faq_attributes($faqs_id_from, 'false') or !zen_faqs_id_valid($faqs_id_to)) or $faqs_id_to == $faqs_id_from ) {
    if ($faqs_id_to == $faqs_id_from) {
      // same faqs_id
      $messageStack->add_session('<b>WARNING: Cannot copy from Product ID #' . $faqs_id_from . ' to Product ID # ' . $faqs_id_to . ' ... No copy was made' . '</b>', 'caution');
    } else {
      if (!zen_has_faq_attributes($faqs_id_from, 'false')) {
        // no attributes found to copy
        $messageStack->add_session('<b>WARNING: No Attributes to copy from Product ID #' . $faqs_id_from . ' for: ' . zen_get_faqs_name($faqs_id_from) . ' ... No copy was made' . '</b>', 'caution');
      } else {
        // invalid faqs_id
        $messageStack->add_session('<b>WARNING: There is no Product ID #' . $faqs_id_to . ' ... No copy was made' . '</b>', 'caution');
      }
    }
  } else {
// FIX HERE - remove once working


// get attributes to copy from

// die('UPDATE/IGNORE - Checking Copying from ' . $faqs_id_from . ' to ' . $faqs_id_to . ' Do I delete first? ' . ($copy_attributes_delete_first == '1' ? 'Yes' : 'No') . ' Do I add? ' . ($add_attribute == true ? 'Yes' : 'No') . ' Do I Update? ' . ($update_attribute == true ? 'Yes' : 'No') . ' Do I skip it? ' . ($copy_attributes_duplicates_skipped=='1' ? 'Yes' : 'No') . ' Found attributes in From: ' . $check_duplicate->RecordCount());

      if ($copy_attributes_duplicates_skipped == '1' and $check_duplicate->RecordCount() != 0) {
        // skip it
          $messageStack->add_session(TEXT_ATTRIBUTE_COPY_SKIPPING . $faqs_copy_from->fields['faqs_attributes_id'] . ' for Products ID#' . $faqs_id_to, 'caution');
      } else {
        if ($add_attribute == true) {
        }
        if ($update_attribute == true) {
        $messageStack->add_session(TEXT_ATTRIBUTE_COPY_UPDATING . $faqs_copy_from->fields['faqs_attributes_id'] . ' for Products ID#' . $faqs_id_to, 'caution');
        }


      $faqs_copy_from->MoveNext();
    } // end of faqs attributes while loop
  } // end of no attributes or other errors
} // eof: zen_copy_faqs_attributes


////






////
// faq_categories pulldown with faqs
  function zen_draw_faqs_pull_down_faq_categories($name, $parameters = '', $exclude = '', $show_id = false, $show_parent = false) {
    global $db, $currencies;

    if ($exclude == '') {
      $exclude = array();
    }

    $select_string = '<select name="' . $name . '"';

    if ($parameters) {
      $select_string .= ' ' . $parameters;
    }

    $select_string .= '>';

    $faq_categories = $db->Execute("select distinct c.faq_categories_id, cd.faq_categories_name " .
        " from " . TABLE_FAQ_CATEGORIES . " c, " .
        TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd, " .
        TABLE_FAQS_TO_FAQ_CATEGORIES . " ptoc " .
        " where ptoc.faq_categories_id = c.faq_categories_id and c.faq_categories_id = cd.faq_categories_id and cd.language_id = '" . (int)$_SESSION['languages_id'] . "' order by faq_categories_name");

    while (!$faq_categories->EOF) {
      if (!in_array($faq_categories->fields['faq_categories_id'], $exclude)) {
        if ($show_parent == true) {
          $parent = zen_get_parent_faq_category_name($faq_categories->fields['faq_categories_id']);
          if ($parent != '') {
            $parent = ' : in ' . $parent;
          }
        } else {
          $parent = '';
        }
        $select_string .= '<option value="' . $faq_categories->fields['faq_categories_id'] . '">' . $faq_categories->fields['faq_categories_name'] . $parent . ($show_id ? ' - ID#' . $faq_categories->fields['faq_categories_id'] : '') . '</option>';
      }
      $faq_categories->MoveNext();
    }

    $select_string .= '</select>';

    return $select_string;
  }

////



////
// Construct a faq_category path to the faq
// TABLES: faqs_to_faq_categories
  function zen_get_faq_path($faqs_id, $status_override = '1') {
    global $db;
    $fcPath = '';

    $faq_category_query = "select p2c.faq_categories_id
                       from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                       where p.faqs_id = '" . (int)$faqs_id . "' " .
                       ($status_override == '1' ? " and p.faqs_status = '1' " : '') . "
                       and p.faqs_id = p2c.faqs_id limit 1";

    $faq_category = $db->Execute($faq_category_query);

    if ($faq_category->RecordCount() > 0) {

      $faq_categories = array();
      zen_get_parent_faq_categories($faq_categories, $faq_category->fields['faq_categories_id']);

      $faq_categories = array_reverse($faq_categories);

      $fcPath = implode('_', $faq_categories);

      if (zen_not_null($fcPath)) $fcPath .= '_';
      $fcPath .= $faq_category->fields['faq_categories_id'];
    }

    return $fcPath;
  }

////
// Recursively go through the faq_categories and retreive all parent faq_categories IDs
// TABLES: faq_categories
  function zen_get_parent_faq_categories(&$faq_categories, $faq_categories_id) {
    global $db;
    $parent_faq_categories_query = "select parent_id
                                from " . TABLE_FAQ_CATEGORIES . "
                                where faq_categories_id = '" . (int)$faq_categories_id . "'";

    $parent_faq_categories = $db->Execute($parent_faq_categories_query);

    while (!$parent_faq_categories->EOF) {
      if ($parent_faq_categories->fields['parent_id'] == 0) return true;
      $faq_categories[sizeof($faq_categories)] = $parent_faq_categories->fields['parent_id'];
      if ($parent_faq_categories->fields['parent_id'] != $faq_categories_id) {
        zen_get_parent_faq_categories($faq_categories, $parent_faq_categories->fields['parent_id']);
      }
      $parent_faq_categories->MoveNext();
    }
  }

////
// Return a faq's faq_category
// TABLES: faqs_to_faq_categories
  function zen_get_faqs_faq_category_id($faqs_id) {
    global $db;

    $the_faqs_faq_category_query = "select faqs_id, faq_categories_id from " . TABLE_FAQS_TO_FAQ_CATEGORIES . " where faqs_id = '" . $faqs_id . "'" . " order by faqs_id,faq_categories_id";
    $the_faqs_faq_category = $db->Execute($the_faqs_faq_category_query);

    return $the_faqs_faq_category->fields['faq_categories_id'];
  }


////
// Count how many subfaq_categories exist in a faq_category
// TABLES: faq_categories
  function zen_get_parent_faq_category_name($faq_categories_id) {
    global $db;

    $faq_categories_lookup = $db->Execute("select parent_id
                                from " . TABLE_FAQ_CATEGORIES . "
                                where faq_categories_id = '" . (int)$faq_categories_id . "'");

    $parent_name = zen_get_faq_category_name($faq_categories_lookup->fields['parent_id'], (int)$_SESSION['languages_id']);

    return $parent_name;
  }



////
// Return true if the faq_category has subfaq_categories
// TABLES: faq_categories
  function zen_has_faq_category_subfaq_categories($faq_category_id) {
    global $db;
    $child_faq_category_query = "select count(*) as count
                             from " . TABLE_FAQ_CATEGORIES . "
                             where parent_id = '" . (int)$faq_category_id . "'";

    $child_faq_category = $db->Execute($child_faq_category_query);

    if ($child_faq_category->fields['count'] > 0) {
      return true;
    } else {
      return false;
    }
  }

////
  function zen_get_faq_categories($faq_categories_array = '', $faq_parent_id = '0', $indent = '') {
    global $db;

    if (!is_array($faq_categories_array)) $faq_categories_array = array();

    $faq_categories_query = "select c.faq_categories_id, cd.faq_categories_name
                         from " . TABLE_FAQ_CATEGORIES . " c, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                         where parent_id = '" . (int)$faq_parent_id . "'
                         and c.faq_categories_id = cd.faq_categories_id
                         and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                         order by sort_order, cd.faq_categories_name";

    $faq_categories = $db->Execute($faq_categories_query);

    while (!$faq_categories->EOF) {
      $faq_categories_array[] = array('id' => $faq_categories->fields['faq_categories_id'],
                                  'text' => $indent . $faq_categories->fields['faq_categories_name']);

      if ($faq_categories->fields['faq_categories_id'] != $faq_parent_id) {
        $faq_categories_array = zen_get_faq_categories($faq_categories_array, $faq_categories->fields['faq_categories_id'], $indent . '&nbsp;&nbsp;');
      }
      $faq_categories->MoveNext();
    }

    return $faq_categories_array;
  }


////
// Get the status of a faq_category
  function zen_get_faq_categories_status($faq_categories_id) {
    global $db;
    $sql = "select faq_categories_status from " . TABLE_FAQ_CATEGORIES . " where faq_categories_id='" . $faq_categories_id . "'";
    $check_status = $db->Execute($sql);
    return $check_status->fields['faq_categories_status'];
  }

////
// Get the status of a faq
  function zen_get_faqs_status($faq_id) {
    global $db;
    $sql = "select faqs_status from " . TABLE_FAQS . " where faqs_id='" . $faq_id . "'";
    $check_status = $db->Execute($sql);
    return $check_status->fields['faqs_status'];
  }

////
// check if linked
  function zen_get_faq_is_linked($faq_id, $show_count = 'false') {
    global $db;

    $sql = "select * from " . TABLE_FAQS_TO_FAQ_CATEGORIES . " where faqs_id='" . $faq_id . "'";
    $check_linked = $db->Execute($sql);
    if ($check_linked->RecordCount() > 1) {
      if ($show_count == 'true') {
        return $check_linked->RecordCount();
      } else {
        return 'true';
      }
    } else {
      return 'false';
    }
  }


////
// TABLES: faq_categories_name from faqs_id
  function zen_get_faq_categories_name_from_faq($faq_id) {
    global $db;

    $check_faqs_faq_category= $db->Execute("select faqs_id, faq_categories_id from " . TABLE_FAQS_TO_FAQ_CATEGORIES . " where faqs_id='" . $faq_id . "' limit 1");
    $the_faq_categories_name= $db->Execute("select faq_categories_name from " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " where faq_categories_id= '" . $check_faqs_faq_category->fields['faq_categories_id'] . "' and language_id= '" . $_SESSION['languages_id'] . "'");

    return $the_faq_categories_name->fields['faq_categories_name'];
  }

  function zen_count_faqs_in_cats($faq_category_id) {
    global $db;
    $cat_faqs_query = "select count(if (p.faqs_status='1',1,NULL)) as pr_on, count(*) as total
                           from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                           where p.faqs_id = p2c.faqs_id
                           and p2c.faq_categories_id = '" . (int)$faq_category_id . "'";

    $pr_count = $db->Execute($cat_faqs_query);
//    echo $pr_count->RecordCount();
    $c_array['this_count'] += $pr_count->fields['total'];
    $c_array['this_count_on'] += $pr_count->fields['pr_on'];

    $cat_child_faq_categories_query = "select faq_categories_id
                               from " . TABLE_FAQ_CATEGORIES . "
                               where parent_id = '" . (int)$faq_category_id . "'";

    $cat_child_faq_categories = $db->Execute($cat_child_faq_categories_query);

    if ($cat_child_faq_categories->RecordCount() > 0) {
      while (!$cat_child_faq_categories->EOF) {
          $m_array = zen_count_faqs_in_cats($cat_child_faq_categories->fields['faq_categories_id']);
          $c_array['this_count'] += $m_array['this_count'];
          $c_array['this_count_on'] += $m_array['this_count_on'];

//          $this_count_on += $pr_count->fields['pr_on'];
        $cat_child_faq_categories->MoveNext();
      }
    }
    return $c_array;
 }

////
// Return the number of faqs in a faq_category
// TABLES: faqs, faqs_to_faq_categories, faq_categories
// syntax for count: zen_get_faqs_to_faq_categories($faq_categories->fields['faq_categories_id'], true)
// syntax for linked faqs: zen_get_faqs_to_faq_categories($faq_categories->fields['faq_categories_id'], true, 'faqs_active')
  function zen_get_faqs_to_faq_categories($faq_category_id, $include_inactive = false, $counts_what = 'faqs') {
    global $db;

    $faqs_count = 0;
    if ($include_inactive == true) {
      switch ($counts_what) {
        case ('faqs'):
        $cat_faqs_query = "select count(*) as total
                           from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                           where p.faqs_id = p2c.faqs_id
                           and p2c.faq_categories_id = '" . (int)$faq_category_id . "'";
        break;
        case ('faqs_active'):
        $cat_faqs_query = "select p.faqs_id
                           from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                           where p.faqs_id = p2c.faqs_id
                           and p2c.faq_categories_id = '" . (int)$faq_category_id . "'";
        break;
      }

    } else {
      switch ($counts_what) {
        case ('faqs'):
          $cat_faqs_query = "select count(*) as total
                             from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                             where p.faqs_id = p2c.faqs_id
                             and p.faqs_status = '1'
                             and p2c.faq_categories_id = '" . (int)$faq_category_id . "'";
        break;
        case ('faqs_active'):
          $cat_faqs_query = "select p.faqs_id
                             from " . TABLE_FAQS . " p, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c
                             where p.faqs_id = p2c.faqs_id
                             and p.faqs_status = '1'
                             and p2c.faq_categories_id = '" . (int)$faq_category_id . "'";
        break;
      }

    }
    $cat_faqs = $db->Execute($cat_faqs_query);
      switch ($counts_what) {
        case ('faqs'):
          $cat_faqs_count += $cat_faqs->fields['total'];
          break;
        case ('faqs_active'):
        while (!$cat_faqs->EOF) {
          if (zen_get_faq_is_linked($cat_faqs->fields['faqs_id']) == 'true') {
            return $faqs_linked = 'true';
          }
          $cat_faqs->MoveNext();
        }
          break;
      }

    $cat_child_faq_categories_query = "select faq_categories_id
                               from " . TABLE_FAQ_CATEGORIES . "
                               where parent_id = '" . (int)$faq_category_id . "'";

    $cat_child_faq_categories = $db->Execute($cat_child_faq_categories_query);

    if ($cat_child_faq_categories->RecordCount() > 0) {
      while (!$cat_child_faq_categories->EOF) {
      switch ($counts_what) {
        case ('faqs'):
          $cat_faqs_count += zen_get_faqs_to_faq_categories($cat_child_faq_categories->fields['faq_categories_id'], $include_inactive);
          break;
        case ('faqs_active'):
          if (zen_get_faqs_to_faq_categories($cat_child_faq_categories->fields['faq_categories_id'], true, 'faqs_active') == 'true') {
            return $faqs_linked = 'true';
          }
          break;
        }
        $cat_child_faq_categories->MoveNext();
      }
    }


      switch ($counts_what) {
        case ('faqs'):
          return $cat_faqs_count;
          break;
        case ('faqs_active'):
          return $faqs_linked;
          break;
      }
  }

////
// master faq_category selection
  function zen_get_master_faq_categories_pulldown($faq_id) {
    global $db;

    $master_faq_category_array = array();

    $master_faq_categories_query = $db->Execute("select ptc.faqs_id, cd.faq_categories_name, cd.faq_categories_id
                                    from " . TABLE_FAQS_TO_FAQ_CATEGORIES . " ptc
                                    left join " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " cd
                                    on cd.faq_categories_id = ptc.faq_categories_id
                                    where ptc.faqs_id='" . $faq_id . "'
                                    and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                    ");

    while (!$master_faq_categories_query->EOF) {
      $master_faq_category_array[] = array('id' => $master_faq_categories_query->fields['faq_categories_id'], 'text' => $master_faq_categories_query->fields['faq_categories_name']);
      $master_faq_categories_query->MoveNext();
    }

    return $master_faq_category_array;
  }

////
// get faqs type
  function zen_get_faqs_type($faq_id) {
    global $db;

    $check_faqs_type = $db->Execute("select faqs_type from " . TABLE_FAQS . " where faqs_id='" . $faq_id . "'");
    return $check_faqs_type->fields['faqs_type'];
  }

 
////
// get faqs image
  function zen_get_faqs_image($faq_id) {
    global $db;
    $faq_image = $db->Execute("select faqs_image
                                   from " . TABLE_FAQS . "
                                   where faqs_id = '" . (int)$faq_id . "'");

    return $faq_image->fields['faqs_image'];
  }



////
// Recursive algorithim to restrict all sub_faq_categories to a rpoduct type
  function zen_restrict_sub_faq_categories($zf_cat_id, $zf_type) {
    global $db;
    $zp_sql = "select faq_categories_id from " . TABLE_FAQ_CATEGORIES . " where parent_id = '" . $zf_cat_id . "'";
    $zq_sub_cats = $db->Execute($zp_sql);
    while (!$zq_sub_cats->EOF) {
      $zp_sql = "select * from " . TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                         where faq_category_id = '" . $zq_sub_cats->fields['faq_categories_id'] . "'
                         and faq_type_id = '" . $zf_type . "'";

      $zq_type_to_cat = $db->Execute($zp_sql);

      if ($zq_type_to_cat->RecordCount() < 1) {
        $za_insert_sql_data = array('faq_category_id' => $zq_sub_cats->fields['faq_categories_id'],
                                    'faq_type_id' => $zf_type);
        zen_db_perform(TABLE_FAQ_TYPES_TO_FAQ_CATEGORY, $za_insert_sql_data);
      }
      zen_restrict_sub_faq_categories($zq_sub_cats->fields['faq_categories_id'], $zf_type);
      $zq_sub_cats->MoveNext();
    }
  }


////
// Recursive algorithim to restrict all sub_faq_categories to a rpoduct type
  function zen_remove_restrict_sub_faq_categories($zf_cat_id, $zf_type) {
    global $db;
    $zp_sql = "select faq_categories_id from " . TABLE_FAQ_CATEGORIES . " where parent_id = '" . $zf_cat_id . "'";
    $zq_sub_cats = $db->Execute($zp_sql);
    while (!$zq_sub_cats->EOF) {
        $sql = "delete from " .  TABLE_FAQ_TYPES_TO_FAQ_CATEGORY . "
                where faq_category_id = '" . $zq_sub_cats->fields['faq_categories_id'] . "'
                and faq_type_id = '" . $zf_type . "'";

        $db->Execute($sql);
      zen_remove_restrict_sub_faq_categories($zq_sub_cats->fields['faq_categories_id'], $zf_type);
      $zq_sub_cats->MoveNext();
    }
  }


    function zen_get_show_faq_switch($lookup, $field, $suffix= 'SHOW_', $prefix= '_INFO', $field_prefix= '_', $field_suffix='') {
      global $db;

      $sql = "select faqs_type from " . TABLE_FAQS . " where faqs_id='" . $lookup . "'";
      $type_lookup = $db->Execute($sql);

      $sql = "select type_handler from " . TABLE_FAQ_TYPES . " where type_id = '" . $type_lookup->fields['faqs_type'] . "'";
      $show_key = $db->Execute($sql);


      $zv_key = strtoupper($suffix . $show_key->fields['type_handler'] . $prefix . $field_prefix . $field . $field_suffix);

      $sql = "select configuration_key, configuration_value from " . TABLE_FAQ_TYPE_LAYOUT . " where configuration_key='" . $zv_key . "'";
      $zv_key_value = $db->Execute($sql);

      if ($zv_key_value->RecordCount() > 0) {
        return $zv_key_value->fields['configuration_value'];
      } else {
        $sql = "select configuration_key, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key='" . $zv_key . "'";
        $zv_key_value = $db->Execute($sql);
        if ($zv_key_value->RecordCount() > 0) {
          return $zv_key_value->fields['configuration_value'];
        } else {
          return $zv_key_value->fields['configuration_value'];
        }
      }
    }


////
// check that a download filename exists
  function zen_orders_faqs_downloads($check_filename) {
    global $db;

    $valid_downloads = true;
    // Could go into /admin/includes/configure.php
    // define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
    if (!file_exists(DIR_FS_CATALOG . 'download/' . $check_filename)) {
      $valid_downloads = false;
    // break;
    } else {
      $valid_downloads = true;
    }

    return $valid_downloads;
  }

////
// salemaker faq_categories array
  function zen_parse_salemaker_faq_categories($clist) {
    $clist_array = explode(',', $clist);

// make sure no duplicate faq_category IDs exist which could lock the server in a loop
    $tmp_array = array();
    $n = sizeof($clist_array);
    for ($i=0; $i<$n; $i++) {
      if (!in_array($clist_array[$i], $tmp_array)) {
        $tmp_array[] = $clist_array[$i];
      }
    }
    return $tmp_array;
  }

 
  
    function zen_get_faq_category_path($current_faq_category_id = '') {
    global $fcPath_array, $db;
// set to 0 if Top Level
    if ($current_faq_category_id == '') {
      if (empty($fcPath_array)) {
        $fcPath_new= '';
      } else {
        $fcPath_new = implode('_', $fcPath_array);
      }
    } else {
      if (sizeof($fcPath_array) == 0) {
        $fcPath_new = $current_faq_category_id;
      } else {
        $fcPath_new = '';
        $last_faq_category = $db->Execute("select parent_id
                                       from " . TABLE_FAQ_CATEGORIES . "
                                       where faq_categories_id = '" . (int)$fcPath_array[(sizeof($fcPath_array)-1)] . "'");

        $current_faq_category = $db->Execute("select parent_id
                                          from " . TABLE_FAQ_CATEGORIES . "
                                           where faq_categories_id = '" . (int)$current_faq_category_id . "'");

        if ($last_faq_category->fields['parent_id'] == $current_faq_category->fields['parent_id']) {
          for ($i = 0, $n = sizeof($fcPath_array) - 1; $i < $n; $i++) {
            $fcPath_new .= '_' . $fcPath_array[$i];
          }
        } else {
          for ($i = 0, $n = sizeof($fcPath_array); $i < $n; $i++) {
            $fcPath_new .= '_' . $fcPath_array[$i];
          }
        }

        $fcPath_new .= '_' . $current_faq_category_id;

        if (substr($fcPath_new, 0, 1) == '_') {
          $fcPath_new = substr($fcPath_new, 1);
        }
      }
    }

    return 'fcPath=' . $fcPath_new;
  }
  
  
?>
