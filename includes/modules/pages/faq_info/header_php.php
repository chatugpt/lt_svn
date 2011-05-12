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
if(!$_GET['faqs_id'] && $_GET['fcPath'])
{
$faq_in_category_sql = "SELECT f.`faqs_id` FROM faqs f, faqs_description fd, faqs_to_faq_categories ft WHERE fd.faqs_id=f.faqs_id AND ft.faqs_id=f.faqs_id AND f.`faqs_status` = 1 AND faq_categories_id = ". $_GET['fcPath']." limit 1";
    $faq_in_category = $db->Execute($faq_in_category_sql);

    $_GET['faqs_id']=$faq_in_category->fields['faqs_id'];
}
else $_GET['faqs_id']=$_GET['faqs_id'];
if (!$_GET['$fcPath']) {
$fcPath = zen_get_faqs_faq_category_id2($_GET['$faqs_id']);
}
  require(DIR_WS_MODULES . 'require_languages.php');
  $sql = "select faqs_name from " . TABLE_FAQS_DESCRIPTION . " where faqs_id = '" . (int)$_GET['faqs_id'] . "' and language_id = '" . (int)$_SESSION['languages_id'] . "'";
  $faq_metatags = $db->Execute($sql);
    define('META_TAG_TITLE', $faq_metatags->fields['faqs_name'] . ' ' . TITLE);
    $breadcrumb->add($faq_metatags->fields['faqs_name']);
?>