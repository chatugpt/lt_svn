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
if (isset($_GET['faqs_id'])) $_GET['faqs_id'] = ereg_replace('[^0-9a-f:]', '', $_GET['faqs_id']);
if (isset($_GET['fcPath'])) $_GET['fcPath'] = ereg_replace('[^0-9_]', '', $_GET['fcPath']);
while (list($key, $value) = each($_GET)) {
$_GET[$key] = ereg_replace('[<>]', '', $value);
}
// validate faqs_id for search engines and bookmarks, etc.
  if (isset($_GET['faqs_id']) and $_SESSION['check_valid'] != 'false') {
    $check_valid = zen_faqs_id_valid($_GET['faqs_id']);
    if (!$check_valid) {
      $_GET['main_page'] = zen_get_info_faq_page($_GET['faqs_id']);
      // do not recheck redirect
      $_SESSION['check_valid'] = 'false';
      zen_redirect(zen_href_link($_GET['main_page'], 'faqs_id=' . $_GET['faqs_id']));
    }
  } else {
    $_SESSION['check_valid'] = 'true';
  }
// calculate faq_category path
  if (isset($_GET['fcPath'])) {
    $fcPath = $_GET['fcPath'];
  } elseif (isset($_GET['faqs_id']) && !zen_check_url_get_terms()) {
    $fcPath = zen_get_faq_path($_GET['faqs_id']);
  } else {
    if (SHOW_FAQ_CATEGORIES_ALWAYS == '1' && !zen_check_url_get_terms()) {
      $show_welcome = 'true';
      $fcPath = (defined('FAQ_CATEGORIES_START_MAIN') ? FAQ_CATEGORIES_START_MAIN : '');
    } else {
      $show_welcome = 'false';
      $fcPath = '';
    }
  }
  if (zen_not_null($fcPath)) {
    $fcPath_array = zen_parse_faq_category_path($fcPath);
    $fcPath = implode('_', $fcPath_array);
    $current_faq_category_id = $fcPath_array[(sizeof($fcPath_array)-1)];
  } else {
    $current_faq_category_id = 0;
    $fcPath_array = array();
  }
// add faq_category names
  if (isset($fcPath_array)) {
    for ($i=0, $n=sizeof($fcPath_array); $i<$n; $i++) {
      $faq_categories_query = "select faq_categories_name
                           from " . TABLE_FAQ_CATEGORIES_DESCRIPTION . "
                           where faq_categories_id = '" . (int)$fcPath_array[$i] . "'
                           and language_id = '" . (int)$_SESSION['languages_id'] . "'";

      $faq_categories = $db->Execute($faq_categories_query);

      if ($faq_categories->RecordCount() > 0) {
        $breadcrumb->add($faq_categories->fields['faq_categories_name'], zen_href_link(FILENAME_FAQS, 'fcPath=' . implode('_', array_slice($fcPath_array, 0, ($i+1)))));
      } else {
        break;
      }
    }
  }
  require(DIR_WS_CLASSES . 'faq_category_tree.php');
?>