<?php
/**
 * Header code file for the Account History Information/Details page (which displays details for a single specific order)
 *
 * @package page
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 2943 2006-02-02 15:56:09Z wilt $
 */
// This should be first line of the script:

$order_no = $_POST['order_number'];
$order_em = $_POST['order_email'];
if (isset($order_no) && $order_no != "" && isset($order_em) && $order_em != ""){
	$customer_info_query = "SELECT orders_id,customers_id
                        FROM   " . TABLE_ORDERS . "
                        WHERE  order_no = :orderNO AND customers_email_address = :orderEM ";

	$customer_info_query = $db->bindVars($customer_info_query, ':orderNO', $order_no, 'string');
	$customer_info_query = $db->bindVars($customer_info_query, ':orderEM', $order_em, 'string');
	$customer_info = $db->Execute($customer_info_query);
	$order_id = $customer_info->fields['orders_id'];
	if(!empty($order_id)) {


$statuses_query = "SELECT os.orders_status_name, osh.date_added, osh.comments
                   FROM   " . TABLE_ORDERS_STATUS . " os, " . TABLE_ORDERS_STATUS_HISTORY . " osh
                   WHERE      osh.orders_id = :ordersID
                   AND        osh.orders_status_id = os.orders_status_id
                   AND        os.language_id = :languagesID
                 ORDER BY   osh.date_added";

$statuses_query = $db->bindVars($statuses_query, ':ordersID', $order_id, 'integer');
$statuses_query = $db->bindVars($statuses_query, ':languagesID', $_SESSION['languages_id'], 'integer');
$statuses = $db->Execute($statuses_query);



while (!$statuses->EOF) {

  $statusArray[] = array('date_added'=>$statuses->fields['date_added'],
  'orders_status_name'=>$statuses->fields['orders_status_name'],
  'comments'=>$statuses->fields['comments']);

  $statuses->MoveNext();
}


require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

require(DIR_WS_CLASSES . 'order.php');
$order = new order($order_id);
}
}

// This should be last line of the script:


require($template->get_template_dir('tpl_order_status_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_order_status_default.php');
?>