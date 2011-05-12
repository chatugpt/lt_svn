<?php
/**
 * store_credit_cron.php
 *
 * @package Store Credit and Rewards Points Advanced
 * @copyright Copyright 2007-2008 Numinix Technology http://www.numinix.com
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: store_credit_cron.php 2 2008-09-14 02:51:10Z numinix $
 * @author Numinix
 */
 
 	require('includes/application_top.php');
 	//include(DIR_WS_CLASSES . 'store_credit.php');
 	$store_credit = new storeCredit();
 	
 	$stimer = microtime_float();
 	$today = time();
 	$approval_time = MODULE_ORDER_TOTAL_SC_ORDER_REWARD_APPROVAL * 86400; //multiply days by seconds in a day
 	$orders_array = array();
 	$order_counter = 0;
 	$product_counter = 0;
 
 	$rewards_log_pending = $db->Execute("SELECT * 
 	                                     FROM " . TABLE_SC_REWARD_POINT_LOGS . "
 							 												 WHERE status = " . SC_CREDIT_PENDING . "
 							 												 ORDER BY orders_id DESC");
 	$rewards_log_approved = $db->Execute("SELECT * 
 																				FROM " . TABLE_SC_REWARD_POINT_LOGS . "
 																				WHERE status = " . SC_CREDIT_APPROVED . "
 																				ORDER BY orders_id DESC");

 	// BEGIN ORDER CANCELLATIONS																					 
 	while (!$rewards_log_approved->EOF) { // only searching for orders in approved status
 	
	 	$orders_id = $rewards_log_approved->fields['orders_id'];
	 	$amount = $rewards_log_approved->fields['amount'];
	 	$customers_id = $rewards_log_approved->fields['customers_id'];
	 	$products_id = $rewards_log_approved->fields['products_id']; 	
	 	
	 	$orders_table_query = $db->Execute("SELECT orders_id, orders_status 
	 	                                    FROM " . TABLE_ORDERS . "
	 																			WHERE orders_id = " . (int)$orders_id . "
	 																			LIMIT 1");
	 																			

	 																			
	 	if ( (!$store_credit->_check_order_status($orders_id)) && ($orders_table_query->fields['orders_id'] != '') ) { // order status is below requirement and rewards are already applied			
			$store_credit->_subtract_rewards_points($amount, $customers_id, $orders_id, $products_id, "pending");
			$store_credit->_update_modified_on($orders_id, time(), $products_id);
			if (!in_array($orders_id, $orders_array)) {
				$order_counter++;
				array_push($orders_array, $orders_id);
			}
			$product_counter++;
		} elseif ($orders_table_query->fields['orders_id'] == '') { // if order no longer exists
			$store_credit->_subtract_rewards_points($amount, $customers_id, $orders_id, $products_id, "removed");
			$store_credit->_update_modified_on($orders_id, time(), $products_id);
			if (!in_array($orders_id, $orders_array)) {
				$order_counter++;
				array_push($orders_array, $orders_id);
			}
			$product_counter++;
		}
		$rewards_log_approved->MoveNext();
	} // END ORDER CANCELLATIONS
	
	// BEGIN AWARDS
	while (!$rewards_log_pending->EOF) { // only searching for orders in pending status
		
		$orders_id = $rewards_log_pending->fields['orders_id'];
		$amount = $rewards_log_pending->fields['amount'];
		$customers_id = $rewards_log_pending->fields['customers_id'];
		$modified_on = $rewards_log_pending->fields['modified_on'];
	 	$products_id = $rewards_log_pending->fields['products_id']; 
	 	
	 	$orders_table_query = $db->Execute("SELECT orders_id, orders_status 
	 	                                    FROM " . TABLE_ORDERS . "
	 																			WHERE orders_id = " . (int)$orders_id . "
	 																			LIMIT 1");
	 		
		// check that required approval time has passed and that the order_status of the order meets the required status
		$check_time = $modified_on + $approval_time;
		if ( ($today >= $check_time) && ($store_credit->_check_order_status($orders_id)) ) {
			$store_credit->_store_rewards_points($amount, $orders_id, $customers_id);			
			$store_credit->_update_modified_on($orders_id, time(), $products_id);
			if (!in_array($orders_id, $orders_array)) {
				$order_counter++;
				array_push($orders_array, $orders_id);
			}
			$product_counter++;
		}
		
		// check if order has been deleted
		if ($orders_table_query->fields['orders_id'] == '') {
			// set the status to removed and credit back credits applied
			$store_credit->_subtract_rewards_points(0, $customers_id, $orders_id, $products_id, "removed");
			if (!in_array($orders_id, $orders_array)) {
				$order_counter++;
				array_push($orders_array, $orders_id);
			}
			$product_counter++;
		}
			
		$rewards_log_pending->MoveNext();
	}
	// END AWARDS
	
	function microtime_float() {
  	list($usec, $sec) = explode(" ", microtime());
   	return ((float)$usec + (float)$sec);
	}
	
	// BEGIN OUTPUT
	$stimer = microtime_float() - $stimer;
	
	echo sprintf(TEXT_SC_CRON_COMPLETED, $stimer);
	echo sprintf(TEXT_SC_CRON_ORDERS_UPDATED, $order_counter) . ' ' . sprintf(TEXT_SC_CRON_PRODUCTS_UPDATED, $product_counter);
	// END OUTPUT
	
	exit();
?>