<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2006 The zen-cart developers                           |
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
//  $Id: index.php 5454 2006-12-29 20:10:17Z drbyte $
//
  $version_check_index=true;
  require('includes/application_top.php');

  $languages = zen_get_languages();
  $languages_array = array();
  $languages_selected = DEFAULT_LANGUAGE;
  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
    $languages_array[] = array('id' => $languages[$i]['code'],
                               'text' => $languages[$i]['name']);
    if ($languages[$i]['directory'] == $language) {
      $languages_selected = $languages[$i]['code'];
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<script language="JavaScript" src="includes/menu.js" type="text/JavaScript"></script>
<link href="includes/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS" />
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
  }
  // -->
</script>
</head>
<body onload="init()">
<div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
 <?php

  $customers = $db->Execute("select count(*) as count from " . TABLE_CUSTOMERS);

  $products = $db->Execute("select count(*) as count from " . TABLE_PRODUCTS . " where products_status = '1'");

  $products_off = $db->Execute("select count(*) as count from " . TABLE_PRODUCTS . " where products_status = '0'");

  $reviews = $db->Execute("select count(*) as count from " . TABLE_REVIEWS);
  $reviews_pending = $db->Execute("select count(*) as count from " . TABLE_REVIEWS . " where status='0'");

// BEGIN newsletter_subscribe mod 1/1
  if(defined('NEWSONLY_SUBSCRIPTION_ENABLED') &&
     (NEWSONLY_SUBSCRIPTION_ENABLED=='true')) {
    $newsletters = $db->Execute("select count(*) as count from " . TABLE_SUBSCRIBERS . " where confirmed= '1' or customers_id >= '1'");
  } else {
    $newsletters = $db->Execute("select count(*) as count from " . TABLE_CUSTOMERS . " where customers_newsletter = '1'");
  }
// END newsletter_subscribe mod 1/1

  //$newsletters = $db->Execute("select count(*) as count from " . TABLE_CUSTOMERS . " where customers_newsletter = '1'");

  $counter_query = "select startdate, counter from " . TABLE_COUNTER;
  $counter = $db->Execute($counter_query);
  $counter_startdate = $counter->fields['startdate'];
//  $counter_startdate_formatted = strftime(DATE_FORMAT_LONG, mktime(0, 0, 0, substr($counter_startdate, 4, 2), substr($counter_startdate, -2), substr($counter_startdate, 0, 4)));
  $counter_startdate_formatted = strftime(DATE_FORMAT_SHORT, mktime(0, 0, 0, substr($counter_startdate, 4, 2), substr($counter_startdate, -2), substr($counter_startdate, 0, 4)));

  $specials = $db->Execute("select count(*) as count from " . TABLE_SPECIALS . " where status= '0'");
  $specials_act = $db->Execute("select count(*) as count from " . TABLE_SPECIALS . " where status= '1'");
  $featured = $db->Execute("select count(*) as count from " . TABLE_FEATURED . " where status= '0'");
  $featured_act = $db->Execute("select count(*) as count from " . TABLE_FEATURED . " where status= '1'");
  $salemaker = $db->Execute("select count(*) as count from " . TABLE_SALEMAKER_SALES . " where sale_status = '0'");
  $salemaker_act = $db->Execute("select count(*) as count from " . TABLE_SALEMAKER_SALES . " where sale_status = '1'");


?>
<div id="colone">
<div class="reportBox">
<div class="header"><?php echo BOX_TITLE_STATISTICS; ?> </div>
<?php
	echo '<div class="row"><span class="left">' . BOX_ENTRY_COUNTER_DATE . '</span><span class="rigth"> ' . $counter_startdate_formatted . '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_COUNTER . '</span><span class="rigth"> ' . $counter->fields['counter'] . '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_CUSTOMERS . '</span><span class="rigth"> ' . $customers->fields['count'] . '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_PRODUCTS . ' </span><span class="rigth">' . $products->fields['count'] . '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_PRODUCTS_OFF . ' </span><span class="rigth">' . $products_off->fields['count'] . '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_REVIEWS . '</span><span class="rigth">' . $reviews->fields['count']. '</span></div>';
    if (REVIEWS_APPROVAL=='1') {
	  echo '<div class="row"><span class="left"><a href="' . zen_href_link(FILENAME_REVIEWS, 'status=1', 'NONSSL') . '">' . BOX_ENTRY_REVIEWS_PENDING . '</a></span><span class="rigth">' . $reviews_pending->fields['count']. '</span></div>';
    }
	echo '<div class="row"><span class="left">' . BOX_ENTRY_NEWSLETTERS . '</span><span class="rigth"> ' . $newsletters->fields['count']. '</span></div>';

	echo '<br /><div class="row"><span class="left">' . BOX_ENTRY_SPECIALS_EXPIRED . '</span><span class="rigth"> ' . $specials->fields['count']. '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_SPECIALS_ACTIVE . '</span><span class="rigth"> ' . $specials_act->fields['count']. '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_FEATURED_EXPIRED . '</span><span class="rigth"> ' . $featured->fields['count']. '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_FEATURED_ACTIVE . '</span><span class="rigth"> ' . $featured_act->fields['count']. '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_SALEMAKER_EXPIRED . '</span><span class="rigth"> ' . $salemaker->fields['count']. '</span></div>';
	echo '<div class="row"><span class="left">' . BOX_ENTRY_SALEMAKER_ACTIVE . '</span><span class="rigth"> ' . $salemaker_act->fields['count']. '</span></div>';

?>
 </div>
 <div class="reportBox">
   <div class="header"><?php echo BOX_TITLE_ORDERS; ?> </div>
  <?php   $orders_contents = '';
  $orders_status = $db->Execute("select orders_status_name, orders_status_id from " . TABLE_ORDERS_STATUS . " where language_id = '" . $_SESSION['languages_id'] . "'");

  while (!$orders_status->EOF) {
    $orders_pending = $db->Execute("select count(*) as count from " . TABLE_ORDERS . " where orders_status = '" . $orders_status->fields['orders_status_id'] . "'");

    $orders_contents .= '<div class="row"><span class="left"><a href="' . zen_href_link(FILENAME_ORDERS, 'selected_box=customers&status=' . $orders_status->fields['orders_status_id'], 'NONSSL') . '">' . $orders_status->fields['orders_status_name'] . '</a>:</span><span class="rigth"> ' . $orders_pending->fields['count'] . '</span>   </div>';
    $orders_status->MoveNext();
  }

  echo $orders_contents;
?>
  </div>
</div>
<div id="coltwo">
<div class="reportBox">
<div class="header"><?php echo BOX_ENTRY_NEW_CUSTOMERS; ?> </div>
  <?php  $customers = $db->Execute("select c.customers_id as customers_id, c.customers_firstname as customers_firstname, c.customers_lastname as customers_lastname, a.customers_info_date_account_created as customers_info_date_account_created, a.customers_info_id from " . TABLE_CUSTOMERS . " c left join " . TABLE_CUSTOMERS_INFO . " a on c.customers_id = a.customers_info_id order by a.customers_info_date_account_created DESC limit 5");

  while (!$customers->EOF) {
    echo '              <div class="row"><span class="left"><a href="' . zen_href_link(FILENAME_CUSTOMERS, 'search=' . $customers->fields['customers_lastname'] . '&origin=' . FILENAME_DEFAULT, 'NONSSL') . '" class="contentlink">'. $customers->fields['customers_firstname'] . ' ' . $customers->fields['customers_lastname'] . '</a></span><span class="rigth">' . "\n";
    echo zen_date_short($customers->fields['customers_info_date_account_created']);
    echo '              </span></div>' . "\n";
    $customers->MoveNext();
  }
?>
</div>

 <div class="reportBox">
<?php
  $counter_query = "select startdate, counter, session_counter from " . TABLE_COUNTER_HISTORY . " order by startdate DESC limit 10";
  $counter = $db->Execute($counter_query);
?>
   <div class="header"><?php echo sprintf(LAST_10_DAYS, $counter->RecordCount()); ?><?php echo '<span class="rigth"> &nbsp;&nbsp;&nbsp;' . SESSION . ' - ' . TOTAL . '</span>'; ?></div>
  <?php

  while (!$counter->EOF) {
    $counter_startdate = $counter->fields['startdate'];
    $counter_startdate_formatted = strftime(DATE_FORMAT_SHORT, mktime(0, 0, 0, substr($counter_startdate, 4, 2), substr($counter_startdate, -2), substr($counter_startdate, 0, 4)));
    echo '              <div class="row"><span class="left">' . $counter_startdate_formatted . '</span><span class="rigth"> ' . $counter->fields['session_counter'] . ' - ' . $counter->fields['counter'] . '</span>   </div>' . "\n";
    $counter->MoveNext();
  }
?>

</div>

<div class="reportBox">
<?php
  $origin_query = "SELECT sum(from_type_freq) as total FROM " . TABLE_ORIGIN_FREQ ;  
  $origin = $db->Execute($origin_query);
  $origin_total = $origin->fields['total'];
  $origin_query2 = "SELECT from_type_name ,from_type_freq FROM " . TABLE_ORIGIN_FREQ ;
  $origin2 = $db->Execute($origin_query2);
?>
   <div class="indexheader"><?php echo HOW_KNOW_WEB; ?></div>
  <?php

  while (!$origin2->EOF) {
    echo '<div class="row"><span class="left">' . $origin2->fields['from_type_name'] . '</span><span class="rigth"> ' . round($origin2->fields['from_type_freq']/$origin_total*100,2).'%</span></div>' . "\n";
    $origin2->MoveNext();
  }
?>

</div>
</div>
<div id="colthree">
<div class="reportBox">
<div class="header"><?php echo BOX_ENTRY_NEW_ORDERS; ?> </div>
  <?php  $orders = $db->Execute("select o.orders_id as orders_id, o.order_no as order_no, o.customers_name as customers_name, o.customers_id, o.date_purchased as date_purchased, o.currency, o.currency_value, ot.class, ot.text as order_total from " . TABLE_ORDERS . " o left join " . TABLE_ORDERS_TOTAL . " ot on (o.orders_id = ot.orders_id) where class = 'ot_total' order by orders_id DESC limit 5");

  while (!$orders->EOF) {
    echo '              <div class="row"><span class="left"><a href="' . zen_href_link(FILENAME_ORDERS, 'oID=' . $orders->fields['order_no'] . '&origin=' . FILENAME_DEFAULT, 'NONSSL') . '" class="contentlink"> ' . $orders->fields['customers_name'] . '</a></span><span class="center">' . $orders->fields['order_total'] . '</span><span class="rigth">' . "\n";
    echo zen_date_short($orders->fields['date_purchased']);
    echo '              </span></div>' . "\n";
    $orders->MoveNext();
  }
?>
</div>

<div class="reportBox">
  <?php
  
  $faq_index = $db->Execute("SELECT f.`faqs_id`,f.`faqs_date_added`, ft.`faq_categories_id`, fd.`faqs_name` FROM faqs f, faqs_description fd, faqs_to_faq_categories ft
                             WHERE fd.faqs_id=f.faqs_id AND ft.faqs_id=f.faqs_id AND f.`faqs_status` = 2
                             ORDER BY f.`faqs_date_added` limit 10");
  if ($faq_index->RecordCount()>0){
  ?>
	<div class="indexheader"><a href="<?php echo zen_href_link(FILENAME_FAQ_CATEGORIES); ?>" style="float:right; font-weight:normal;"><span style="color:#327bc0;">At present there are <?php echo $faq_index->RecordCount(); ?> questions</span></a><?php echo BOX_ENTRY_NEW_FAQS; ?> </div>
	<?php 
	  while (!$faq_index->EOF) {
	    echo '<div class="row"><span><a href="' . zen_href_link('faq', zen_get_faq_category_path($faq_index->fields['faq_categories_id']) . '&pID=' . $faq_index->fields['faqs_id'] .'&faq_type=1&action=new_faq') . '" class="contentlink"> ' . $faq_index->fields['faqs_name'] . '</a></span><span class="right">' . zen_date_short($faq_index->fields['faqs_date_added']) . '</span><br/>';
	    echo '<span>' . zen_get_faq_categories_name_from_faq($faq_index->fields['faqs_id']) . '</span></div>' . "\n";
	    $faq_index->MoveNext();
	  }
  }
?>
</div>

</div>
</div>
<!-- The following copyright announcement is in compliance
to section 2c of the GNU General Public License, and
thus can not be removed, or can only be modified
appropriately.

Please leave this comment intact together with the
following copyright announcement. //-->


</body>
</html>
<?php require('includes/application_bottom.php'); ?>