<?php
/**
 * File contains just the reward points functions
 *
 * @package classes
 * @copyright Numinix http://www.numinix.com
 * @authors Numinix, Yellow1912
 * $Id: store_credit.php 9 2010-03-08 20:20:50Z numinix $
 */
if(!defined('IS_ADMIN_FLAG'))
die('Illegal Access');

// Convention:
/**
 * ***********************************
 * public func	: lower_case
 * private func	: _lower_case
 * class name	: camelCase
 * variable		: lower_case
 * constant		: UPPER_CASE
 *
 */

// we define these constants here so that this class can be included and re-used on admin side with no problem
// Another alternative is to insert into the configuration table
define('SC_CREDIT_APPROVED', 1);
define('SC_CREDIT_PENDING', 0);
define('SC_CREDIT_REMOVED', -1);

// table
define('TABLE_STORE_CREDIT', DB_PREFIX.'sc_customers');
define('TABLE_SC_CATEGORIES_RATIO', DB_PREFIX.'sc_categories_ratio');
define('TABLE_SC_PRODUCTS_RATIO', DB_PREFIX.'sc_products_ratio');
define('TABLE_SC_REWARD_POINT_LOGS', DB_PREFIX.'sc_reward_point_logs');
define('TABLE_SC_TRANSACTION_LOGS', DB_PREFIX.'sc_transaction_logs');

class storeCredit{
	var $order_total_reward_point = 0;
	var $categories_ratio = array();
	var $products_ratio = array();
	var $reward_point_logs = array();
	var $credits_applied_shipping = MODULE_ORDER_TOTAL_SC_ORDER_SHIPPING; // true or false
	// This function will be called by the observer class when the checkout is completed
	function after_checkout($credits_applied, $customers_id = ''){
    // added to support Numinix Referrals Module
    if ($customers_id == '') {
      // if not supplied a customers_id, use the session
      $customers_id = $_SESSION['customer_id'];
    }
    // Calculating the points
		$credit_array = $this->_process_reward_point($credits_applied, $customers_id);
		$this->_log_reward_point($this->reward_point_logs);
	}

	// this function can be used to update customer reward_point
	// return true on success, false otherwise
	// Be very careful here, since the amount can be negative number as well
	function update_customer_credit($customers_id, $amount){
		global $db;
		$sql='INSERT INTO '.TABLE_STORE_CREDIT.' VALUES (\''.$customers_id.'\', \''.$amount.'\') ON DUPLICATE KEY UPDATE reward_points=reward_points+'.$amount.';';
		$db->Execute($sql);
		if(mysql_affected_rows($db->link) == 1)
		return true;
		return false;
	}

	function retrieve_customer_credit($customers_id){
		global $db;
		$sql = "SELECT amount
	        	FROM " . TABLE_STORE_CREDIT . " 
						WHERE customers_id='" . $customers_id . "' LIMIT 1";

		$result = $db->Execute($sql);
		if($result->RecordCount() == 1)
		return $result->fields['amount'];
		else
		return 0;
	}

  function get_pending_rewards($customers_id) {
    global $db;
    
    $sql_query = "SELECT sum(amount) as total FROM " . TABLE_SC_REWARD_POINT_LOGS . " 
            WHERE customers_id = " . $customers_id . " 
            AND status = " . SC_CREDIT_PENDING;
    $sql = $db->Execute($sql_query);
    $amount = round($sql->fields['total'], 2);
    if ($amount == '') {                     
      $amount = 0;
    }
    return $amount;
  }
  
  function store_pending_rewards() {
    global $db;
    
    $customers = $db->Execute("SELECT customers_id FROM " . TABLE_CUSTOMERS . " ORDER BY customers_id ASC");
    while (!$customers->EOF) {
      $customers_id = $customers->fields['customers_id'];
      $pending_rewards = $this->get_pending_rewards($customers_id);
      $sc_account_check = $db->Execute("SELECT customers_id, pending FROM " . TABLE_STORE_CREDIT . " WHERE customers_id = " . $customers_id . " LIMIT 1");
      if ($sc_account_check->fields['customers_id'] != '') {
        // update the table as customers_id exists
        if ($sc_account_check->fields['pending'] != $pending_rewards) {
          $db->Execute("UPDATE " . TABLE_STORE_CREDIT . "
                        SET pending = " . $pending_rewards . "
                        WHERE customers_id = " . $customers_id . "
                        LIMIT 1");
        }
      } else {
        // create a store credit account for customer with pending rewards
        $db->Execute("INSERT INTO " . TABLE_STORE_CREDIT . " (customers_id, amount, pending, created_on, modified_on)
          VALUES ('" . $customers_id . "', '0', '" . $pending_rewards . "', '" . time() . "', '" . time() . "')");
      }
      $customers->MoveNext();    
    }
  }
  
  function award_pending_rewards($customers_id) {
    global $db;
                  
    $pending_orders = $db->Execute("SELECT * FROM " . TABLE_SC_REWARD_POINT_LOGS . "
                                    WHERE customers_id = " . $customers_id . "
                                    AND status = " . SC_CREDIT_PENDING . "
                                    ORDER BY orders_id DESC");
    while(!$pending_orders->EOF) {
      $orders_id = $pending_orders->fields['orders_id'];
      $amount = $pending_orders->fields['amount'];
      $products_id = $pending_orders->fields['products_id'];
      
      $this->_store_rewards_points($amount, $orders_id, $customers_id);      
      $this->_update_modified_on($orders_id, time(), $products_id);
      
      $pending_orders->MoveNext();
    }
  }

	// Any function below this point should not be called outside of the class
	// Once the time comes that ZC forces the use of PHP5, we will change all these to private functions

	function _process_reward_point($credits_applied, $customers_id){
		global $order;
    if (MODULE_ORDER_TOTAL_SC_CALCULATION_BASE == 'sub-total') { 
		  $orders_subtotal = $order->info['subtotal'];
    } else {
      $orders_subtotal = $order->info['total'];
    }
		$this->__calculate_reward_point($order, $orders_subtotal, $credits_applied, $customers_id);
	}

	// This function is intended to be used inside admin to re-calculate reward_point of an order
	function _calculate_reward_point_by_orderid($order_id, $credits_applied){
		$order = new order($order_id);
    if (MODULE_ORDER_TOTAL_SC_CALCULATION_BASE == 'sub-total') { 
      $orders_subtotal = $order->info['subtotal'];
    } else {
      $orders_subtotal = $order->info['total'];
    }
		$this->__calculate_reward_point($order, $orders_subtotal, $credits_applied);
	}

	// this function calculate the total reward_point of the order
	// it will also build the log array at the same to so that we can use that to update the log table later
	function __calculate_reward_point($order, $orders_subtotal, $credits_applied, $customers_id){
    if (isset($_SESSION['customer_whole']) && $_SESSION['customer_whole'] != 0) {
      return false;
    }
    //calculate the percentage of the order that was bought with credits
		if ($credits_applied > $orders_subtotal) {
			$credits_applied = $orders_subtotal;
		}
		$credits_applied_ratio = 1 - ($credits_applied / $orders_subtotal); // 1 - (10/50) = 0.80 (ratio to multiply times rewards points)
		// loop thru each product in the order
		$this->order_total_reward_point = 0;
		foreach($order->products as $product){
			// if product is free, why should we add store reward_point?
			if($product['product_is_free'] != 1){
        // use final_price or price
        if ($product['final_price'] > 0) {
          $price = $product['final_price'];
        } else {
          $price = $product['price'];
        }
				// store reward_point is calculated based on price BEFORE TAX
				$products_ratio = (($price * $product['qty']) / $orders_subtotal);
				$credits_applied_per_row = $this->_round_up($credits_applied * $products_ratio);
				$ratio = $this->__retrieve_reward_point_ratio((int)$product['id']);
				$amount = ($this->_round_up($ratio * $price * $credits_applied_ratio * $product['qty'])); // multiply the reward amount by the ratio of credits applied to the order sub total
				//do not award any credits if the order was covered by credits_applied
				if ($credits_applied >= $orders_subtotal) {
					$amount = 0;
				}

				// The log array is built here since the amount and ratio is also calculated at this point
				$this->reward_point_logs[] = array(
				'products_id'			  => (int)$product['id'],
				'products_prid'			=> $product['id'],
				'orders_id'	        => $_SESSION['order_number_created'],
				'customers_id' 		  => $customers_id,
				'orders_subtotal' 	=> $orders_subtotal,
				'ratio' 						=> $ratio,
				'quantity'					=> $product['qty'],
				'amount'						=> $amount,
				'credits_applied' 	=> $credits_applied_per_row,
				'status'						=> SC_CREDIT_PENDING,
				'created_on'				=> time(),
				'modified_on'			  => time()
				);
			}
		}
	}

	// checks the reward status of an order to see if reward has already been applied
	function _check_reward_status($orders_id) {
		global $db;
		$reward_status_query = "SELECT status
														FROM " . TABLE_SC_REWARD_POINT_LOGS . " 
														WHERE orders_id = " . $orders_id . "
														LIMIT 1";

		$reward_status = $db->Execute($reward_status_query);
		if ($reward_status->fields['status'] == SC_CREDIT_PENDING) {
			return true; // can reward = true
		} else {
			return false; // in case of blank, default to false
		}
	}

	// check the order status of an order to see if it is above the required order status to receive rewards points
	function _check_order_status($orders_id) {
		global $db;
		$order_query = "SELECT orders_status FROM " . TABLE_ORDERS . "
										WHERE orders_id = " . $orders_id . "
										LIMIT 1";
		$order_status = $db->Execute($order_query);

		if ($order_status->fields['orders_status'] >= MODULE_ORDER_TOTAL_SC_ORDER_REWARD_STATUS) {
			return true;
		} elseif ($order_status->fields['orders_status'] >= MODULE_ORDER_TOTAL_SC_ORDER_REWARD_STATUS) {
			return false;
		}
	}

	// if the orders_status is changed to below the required status, reverse credits
	function _reverse_reward_points($orders_id, $rewards_points_amount, $customers_id) {
		// check to see if credit has been applied and order_status no longer meets the requirement
		if ( (!$this->_check_rewards_status($orders_id)) && (!$this->_check_order_status($orders_id)) ) {
			$this->_subtract_rewards_points($rewards_points_amount, $customers_id, $orders_id);
		}
	}

	// awards rewards points to store credit table
	function _add_rewards_points($rewards_points_amount, $customers_id, $orders_id) {
		global $db;
		// update the store credit amount with the new reward points
		$sql='INSERT INTO ' .TABLE_STORE_CREDIT . ' (customers_id, amount, created_on, modified_on)
	  			VALUES (\'' . $customers_id . '\', \'' . $rewards_points_amount . '\', \'' . time() . '\', \'' . time() . '\') 
	  			ON DUPLICATE KEY UPDATE amount = (amount + ' . $rewards_points_amount . '), 
																	modified_on = ' . time() . ';';
		//die($sql);
		$db->Execute($sql);

		// update reward point log to approved status
		$db->Execute("UPDATE " . TABLE_SC_REWARD_POINT_LOGS . "
									SET status = " . SC_CREDIT_APPROVED . "
									WHERE orders_id = " . $orders_id);

		$message = "Add rewards";
		$this->_log_credit_transaction($customers_id, $rewards_points_amount, $orders_id, $message);
	}

	// removes rewards points from store credit table
	function _subtract_rewards_points($rewards_points_amount, $customers_id, $orders_id, $products_id, $status_switch = "pending") {
		global $db;

		// check to see that store credit is larger than amount subtracted
		//$store_credit_balance = $db->Execute("SELECT amount FROM " . TABLE_STORE_CREDIT . "
		//WHERE customers_id = " . $customers_id . "
		//LIMIT 1");

		// update the store credit amount with the new reward points
		$db->Execute("UPDATE " . TABLE_STORE_CREDIT . "
									SET amount = amount - " . $rewards_points_amount . ", modified_on = " . time() . "
									WHERE customers_id = " . $customers_id);

		if ($status_switch == "pending") {
			// update reward point log to pending status
			$db->Execute("UPDATE " . TABLE_SC_REWARD_POINT_LOGS . "
										SET status = " . SC_CREDIT_PENDING . "
										WHERE orders_id = " . $orders_id);
		}	elseif ($status_switch == "approved") {
			// update reward point log to approved status
			$db->Execute("UPDATE " . TABLE_SC_REWARD_POINT_LOGS . "
										SET status = " . SC_CREDIT_APPROVED . "
										WHERE orders_id = " . $orders_id);
		} elseif ($status_switch == "removed") {
			$db->Execute("UPDATE " . TABLE_SC_REWARD_POINT_LOGS . "
										SET status = " . SC_CREDIT_REMOVED . "
										WHERE orders_id = " . $orders_id);

			// calculates how many credits were applied to purchase the order
			$credits_applied_query = $db->Execute("SELECT credits_applied FROM " . TABLE_SC_REWARD_POINT_LOGS . "
																						 WHERE orders_id = " . $orders_id . "
																						 AND products_id = " . $products_id . "
																						 LIMIT 1");
			$credits_applied = $credits_applied_query->fields['credits_applied'];

			// re-adds the applied credits to the order
			if ($credits_applied > 0) {
				$db->Execute("UPDATE " . TABLE_STORE_CREDIT . "
											SET amount = amount + " . $credits_applied . "
											WHERE customers_id = " . $customers_id);
				$message = "Credits reapplied";
				$this->_log_credit_transaction($customers_id, $credits_applied, $orders_id, $message);
			}
		}

		$amount = 0 - $rewards_points_amount; // make to a negative number
		$message = "Subtract rewards order " . $status_switch;
		$this->_log_credit_transaction($customers_id, $amount, $orders_id, $message);
	}

	// checks rewards log table for rewards points amount
	function _retrieve_rewards_points($orders_id) {
		global $db;
		$rewards_query = "SELECT amount FROM " . TABLE_SC_REWARD_POINT_LOGS . "
											WHERE orders_id = " . $orders_id . "
											LIMIT 1";
		$rewards_points = $db->Execute($rewards_query);
		$rewards_points_amount = $rewards_points->fields['amount'];
		return $rewards_points_amount;
	}

	// adds the rewards points to the store credit table if all requirements are met
	function _store_rewards_points($rewards_points_amount, $orders_id, $customers_id) {
		// error check
		if (is_numeric($rewards_points_amount)) {
			// check to see that customer has an amount set in the Store Credit table
			//if ($amount = $this->retrieve_customer_credit($customers_id) == 0) {
			//$sql_data_array = array('customers_id' => $customers_id,
			//                      'amount' => $amount);
			// set the customers store credit amount to 0
			//zen_db_perform(TABLE_STORE_CREDIT, $sql_data_array, 'insert', '');
			//}
			// update the store credit amount with the new reward points
			$this->_add_rewards_points($rewards_points_amount, $customers_id, $orders_id);

			// update the log with new reward status
		}
	}

	// updated the modified_on time in rewards log
	function _update_modified_on($orders_id, $time, $products_id) {
		global $db;

		$db->Execute("UPDATE " . TABLE_SC_REWARD_POINT_LOGS . "
									SET modified_on = " . $time . "
									WHERE orders_id = " . $orders_id . "
									AND products_id = " . $products_id . "
									LIMIT 1");
		if(mysql_affected_rows($db->link) == 1)
		return true;
		return false;
	}

	// this function is used to log any reward point related to any specific products
	function _log_reward_point($logs){
		foreach($logs as $log)
		zen_db_perform(TABLE_SC_REWARD_POINT_LOGS, $log);
		// TODO: add error checking here.
	}

	// this function is used to log credit transaction in general
	// so if the customer get N points from an order, that should also be recorded here
	function _log_credit_transaction($customers_id, $amount, $orders_id = 0, $messsage=''){
		// no point in having a transaction with no money involvded
		if($amount != 0){
			$log = array('customers_id' => $customers_id,
			'amount'		=> $amount,
			'orders_id' 	=> $orders_id,
			'message' 			=> $messsage,
			'created_on' 	=> time());
			zen_db_perform(TABLE_SC_TRANSACTION_LOGS, $log);
			// TODO: add error checking here.
		}
	}

	function _round_up($amount){
		// round it up the way we want, then return the amount
		$amount = round($amount, 2);
		return $amount;
	}

	function _build_log($status){
		foreach($order->products as $product){
			// if product is free, why should we add store reward_point?
			if($product['product_is_free'] != 1){
				// store reward_point is calculated based on price BEFORE TAX
				$reward_points = $this->_calculate_product_credit((int)$product['id'],$product['price']);
				$this->order_total_reward_point += $reward_points;
			}
		}
		//zen_db_perform
	}

	function _calculate_product_credit($products_id, $price){
		return $price * $this->__retrieve_reward_point_ratio($products_id);
	}

	//retrieves the ratio for that product, category, or the store as a whole
	function __retrieve_reward_point_ratio($products_id){
		$categories_id = zen_get_products_category_id($products_id);
    
    if ($this->_retrieve_products_ratio($products_id) !== 'false') {
      // products ratio
      $ratio = $this->_retrieve_products_ratio($products_id);
    } elseif ($this->_retrieve_categories_ratio($categories_id) !== 'false') {
      // category ratio
      $ratio = $this->_retrieve_categories_ratio($categories_id);
    } else {
      // use global ratio
      $ratio = MODULE_ORDER_TOTAL_SC_ORDER_REWARD_PERCENTAGE;
    } 
		return (float)($ratio/ 100);
	}

	//returns the reward amount for a product
	function _retrieve_reward_amount($products_id) {
		global $db, $currencies;
		$ratio = $this->__retrieve_reward_point_ratio($products_id);
		$price_query = $db->Execute("SELECT products_price
																 FROM " . TABLE_PRODUCTS . "
																 WHERE products_id = " . (int)$products_id);
		$amount = $ratio * $price_query->fields['products_price'];
		$amount = $currencies->format($amount);

		return $amount;
	}


	function _retrieve_categories_ratio($categories_id){
		global $db;
		// we check if the ratio for this category is already retrieved before, then we dont have to query the db again
		if(isset($this->categories_ratio["$categories_id"]))
		return $this->categories_ratio["$categories_id"];
    $cPath = zen_get_generated_category_path_ids($categories_id);
    $categories = explode('_', $cPath);
    $match = false;
    foreach ($categories as $category_id) {
      $sql = 'SELECT ratio FROM '.TABLE_SC_CATEGORIES_RATIO.' WHERE categories_id='.$category_id.' LIMIT 1';
      $ratio = $db->Execute($sql);
      if($ratio->RecordCount() == 1){
        $this->categories_ratio["$categories_id"] = $ratio->fields['ratio'];
        $match = true;
        return $ratio->fields['ratio'];
      }
    }
    if (!$match) return 'false';
	}

	function _retrieve_products_ratio($products_id){
		global $db;
		// we check if the ratio for this product is already retrieved before, then we dont have to query the db again
		if(isset($this->products_ratio["$products_id"]))
		return $this->products_ratio["$products_id"];
		$sql = 'SELECT ratio FROM '.TABLE_SC_PRODUCTS_RATIO.' WHERE products_id=\''.$products_id.'\' LIMIT 1';
		$ratio = $db->Execute($sql);
		if($ratio->RecordCount() == 1){
			$this->products_ratio["$categories_id"] = $ratio->fields['ratio'];
			return $ratio->fields['ratio'];
		}
		else
		return 'false';
	}

	// this function should be used by after_checkout only, not anywhere else
	// Reasons: it use the current customers_id in session, it also relies upon the the condition that
	// order_total_reward_point is already calculated
	function _update_customer_credit(){
		$this->update_customer_credit((int)$_SESSION['customers_id'], $this->order_total_reward_point);
	}
}
?>