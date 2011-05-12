<?php
/**
 * create_account header_php.php
 *
 * @package page
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 4035 2006-07-28 05:49:06Z drbyte $
 caizhouqing update reg_goto_url
 */

// This should be first line of the script:
//caizhouqing update by bof
$products_id = $_SESSION['navigation']->snapshot['get']['products_id'];
$page = $_SESSION['navigation']->snapshot['page'];

if(($products_id > 0) and ($page == "tell_a_friend")){
$_SESSION['navigation']->clear_snapshot();
//header("location:index.php?main_page=tell_a_friend&products_id=".$products_id."");
echo "<script language='javascript'>location='?main_page=tell_a_friend&products_id=".$products_id."';</script>";
//exit;
}
//caizhouqing update by eof 

$zco_notifier->notify('NOTIFY_HEADER_START_CREATE_ACCOUNT');


require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));
require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CREATE_ACCOUNT));

$breadcrumb->add(NAVBAR_TITLE);



// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_CREATE_ACCOUNT');
?>