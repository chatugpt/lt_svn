<?php
/**
 * @package admin
 * @copyright Copyright kuroi web design 2006-2007
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: init_admin_auth.php - amended for Admin Profiles 2007-04-30 by kuroi
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

  if (!(basename($PHP_SELF) == FILENAME_LOGIN . ".php")) {
  	$page = basename($PHP_SELF, ".php");
  	if ($page != FILENAME_DEFAULT &&
		$page != FILENAME_PRODUCT &&
		$page != FILENAME_LOGOFF &&
		$page != FILENAME_ALT_NAV &&
		$page != FILENAME_PASSWORD_FORGOTTEN &&
		$page != 'denied') {
		if (check_page($page) == 'false') header("location: denied.php");
	}
    if (!isset($_SESSION['admin_id'])) {
      if (!(basename($PHP_SELF) == FILENAME_PASSWORD_FORGOTTEN . '.php')) {
        zen_redirect(zen_href_link(FILENAME_LOGIN, '', 'SSL'));
      }
    }
  }
  // BOF - Admin Profile's Categories
  // If we're on the categories page and the category, which user want to see is not 
  // allowed for him - redirect to main catrgory
  $cPath = $_GET['cPath'];
  $cid = zen_parse_category_path($cPath);
  $cid = end($cid);
//  echo '>>>  '.$cid;
  if ($page == FILENAME_CATEGORIES && category_allowed($cid) == 'false' && $cPath != '0') {
    //header("location: denied.php");
    zen_redirect(zen_href_link(FILENAME_CATEGORIES, 'cPath=0'));
  }
  // EOF - Admin Profile's Categories

  if ((basename($PHP_SELF) == FILENAME_LOGIN . '.php') and (substr_count(dirname($PHP_SELF),'//') > 0 or substr_count(dirname($PHP_SELF),'.php') > 0)) {
    zen_redirect(zen_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
?>