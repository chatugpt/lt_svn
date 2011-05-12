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
//  $Id: prod_cat_header_code.php 290 2004-09-15 19:48:26Z wilt $
//
  require(DIR_FS_CATALOG . DIR_WS_CLASSES . 'faqs.php');
  $zc_faqs = new faqs;


  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();
  if (isset($_GET['faq_type'])) {
    $faq_type = zen_db_prepare_input($_GET['faq_type']);
  } else {
    $faq_type='1';
  }
  $type_faq_admin_handler = $zc_faqs->get_admin_handler($faq_type);
  function zen_reset_page() {
    global $db, $current_faq_category_id;
    $look_up = $db->Execute("select p.faqs_id, pd.faqs_name, p.faqs_image, p.faqs_date_added, p.faqs_last_modified, p.faqs_status from " . TABLE_FAQS . " p, " . TABLE_FAQS_DESCRIPTION . " pd, " . TABLE_FAQS_TO_FAQ_CATEGORIES . " p2c where p.faqs_id = pd.faqs_id and pd.language_id = '" . (int)$_SESSION['languages_id'] . "' and p.faqs_id = p2c.faqs_id and p2c.faq_categories_id = '" . $current_faq_category_id . "' order by pd.faqs_name");
    while (!$look_up->EOF) {
      $look_count ++;
      if ($look_up->fields['faqs_id']== $_GET['pID']) {
        exit;
      } else {
        $look_up->MoveNext();
      }
    }
    return round( ($look_count+.05)/MAX_DISPLAY_RESULTS_CATEGORIES);
  }
// make array for faq types

  $sql = "select * from " . TABLE_FAQ_TYPES;
  $faq_types = $db->Execute($sql);
  while (!$faq_types->EOF) {
    $faq_types_array[] = array('id' => $faq_types->fields['type_id'],
                                     'text' => $faq_types->fields['type_name']);
  
    $faq_types->MoveNext();
  }
?>