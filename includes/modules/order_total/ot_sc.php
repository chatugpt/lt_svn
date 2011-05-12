<?php
/**
 * @package store credit
 * @copyright Copyright 2007-2008 Numinix Technology http://www.numinix.com
 * @copyright Portions Copyright 2007 Kath Chapman
 * @copyright Portions Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: ot_sc.php 9 2010-03-08 20:20:50Z numinix $Rev 79 2008-03-09 13:33:59Z numinix $
 */

class ot_sc {
	var $title, $output;

	function ot_sc() {
		global $currencies;
		$this->code = 'ot_sc';
		$this->title = MODULE_ORDER_TOTAL_SC_TITLE;
		$this->header = MODULE_ORDER_TOTAL_SC_HEADER;
		$this->description = MODULE_ORDER_TOTAL_SC_DESCRIPTION;
		$this->user_prompt = MODULE_ORDER_TOTAL_SC_USER_PROMPT;
		$this->sort_order = MODULE_ORDER_TOTAL_SC_SORT_ORDER;
		$this->credit_class = true;
		$this->credit_account = $this->get_user_balance($_SESSION['customer_id']);
		(($this->credit_account > 0 && MODULE_ORDER_TOTAL_SC_STATUS == 'true' && (!$_SESSION['customer_whole'] || $_SESSION['customer_whole'] == 0)) ? $this->enabled = true : $this->enabled = false); //disabled for wholesale
    $this->output = array();
	}

	function process() {
		global $order, $currencies;
		if ($this->enabled && $this->selection_test()) {
      $order_total = $this->get_order_total();
      $this->deduction = $this->calculate_credit($order_total);
			// Calculate the credit to be applied
			
			$order->info['total'] = zen_round($order->info['total'] - $this->deduction, 2);
			if ( ($this->deduction > 0) && ($this->selection_test()) )  {
				$this->output[] = array('title' => $this->title . ':',
				'text' => '-' . $currencies->format($this->deduction),
				'value' => $this->deduction);
			}
			if ($this->deduction >= $order->info['total']) {
				$_SESSION['credit_covers'] = true; 
			} else {
				$_SESSION['credit_covers'] = false; 
			}
		} else {
			$_SESSION['credit_covers'] = false;
		}
	}

	function pre_confirmation_check($order_total) {
		global $order;
    
    if ($this->enabled && $this->selection_test()) {
		  // clean out negative values and strip common currency symbols
		  $this->credit_account = preg_replace('/[^0-9.%]/', '', $this->credit_account);
		  $this->credit_account = abs($this->credit_account);

		  if ($this->credit_account > 0) {
			  if (ereg('[^0-9/.]', trim($this->credit_account))) {
				  zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'credit_class_error_code=' . $this->code . '&credit_class_error=' . urlencode(TEXT_INVALID_REDEEM_AMOUNT), 'SSL',true, false));
			  }
			  if ($this->credit_account > $this->get_user_balance($_SESSION['customer_id'])) {
				  zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'credit_class_error_code=' . $this->code . '&credit_class_error=' . urlencode(TEXT_INVALID_REDEEM_AMOUNT), 'SSL',true, false));
			  }
			  //$this->deduction = $this->calculate_credit($order_total);
			  if ($this->deduction >= $order->info['total'] && MODULE_ORDER_TOTAL_SC_ORDER_STATUS_ID != 0) $order->info['order_status'] = MODULE_ORDER_TOTAL_SC_ORDER_STATUS_ID;
		  }
		  return $this->deduction;
    } else {
      return 0;
    }
	}

	function use_credit_amount() {
	}

	function apply_credit() {
		global $db;
		if (($this->selection_test()) && ($this->enabled)) {
			if((is_numeric($this->deduction)) && ($this->credit_account >= $this->deduction)){
				$db->execute("update " . TABLE_STORE_CREDIT . " set amount = amount - " . $this->deduction. " where customers_id=" . $_SESSION['customer_id']);
			} else {
        $this->deduction = 0;
      }
			if (MODULE_ORDER_TOTAL_SC_NO_CREDITS == 'true') {
				$_SESSION['credits_applied'] = $this->deduction;
			}
			$this->clear_sessions();
			$this->clear_posts();
		}
	}

	function calculate_credit($amount) {
		// expect inputs to be cleaned
		if($this->credit_account < $amount) {
			//$this->credit_covers = false;
			return $this->credit_account;
		} else {
			// create a session to be used to turn off payment required
			//$this->credit_covers = true;
			return $amount;
		}
	}

	function get_order_total() {
		global $order;
		$order_total = $order->info['total'];
    //echo($order_total . '<br />');
    if (MODULE_ORDER_TOTAL_SC_EXCLUDE_CATEGORIES == 'true') {
      // go through every product and any that are within a category that has a 0 ratio, subtract the products total from the order total
      $products = $_SESSION['cart']->get_products();
      foreach($products as $product) {
        $subtract = false;
        // first check products ratio
        if ($this->_retrieve_products_ratio($product['id']) != 'false' && $this->_retrieve_products_ratio($product['id']) == 0) {
          $subtract = true; // set to true to subtract later
        } elseif ($this->_retrieve_products_ratio($product['id']) == 'false')  {
          // check category instead
          $categories_id = zen_get_products_category_id($product['id']);
          $cPath = zen_get_generated_category_path_ids($categories_id);
          $categories = explode('_', $cPath);
          foreach ($categories as $category_id) {
            if ($this->_retrieve_categories_ratio($category_id) != 'false' && $this->_retrieve_categories_ratio($category_id) == 0) {
              $subtract = true;
              break; // starts with lowest most category, so break if anything is found
            }
          }
        }
        if ($subtract) {
          $price = $product['quantity'] * $product['final_price'];
          $order_total -= $price;
        }
      }
    }
    if (MODULE_ORDER_TOTAL_SC_EXCLUDE_SHIPPING == 'true') {
      // shipping excluded
      $order_total -= $order->info['shipping_cost'];
    }
    //die($order_total);
		return $order_total;
	}
  
  function _retrieve_categories_ratio($categories_id){
    global $db;
    // we check if the ratio for this category is already retrieved before, then we dont have to query the db again
    if(isset($this->categories_ratio["$categories_id"]))
    return $this->categories_ratio["$categories_id"];
    $sql = 'SELECT ratio FROM '.TABLE_SC_CATEGORIES_RATIO.' WHERE categories_id='.$categories_id.' LIMIT 1';
    $ratio = $db->Execute($sql);
    if($ratio->RecordCount() == 1){
      $this->categories_ratio["$categories_id"] = $ratio->fields['ratio'];
      return $ratio->fields['ratio'];
    }
    else
    return 'false';
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

	function credit_selection() {
		global $order, $currencies;
		if ($this->enabled) {
			$order_total = $this->get_order_total();
			//$this->deduction = $this->calculate_credit($order_total);
      if ($this->credit_account < $order_total) {
        $usable_credits = $this->credit_account;
      } elseif (!$this->selection_test()) {
        $usable_credits = $order_total;
      } else {
        $usable_credits = 0;
      }
			if (FEC_STATUS == 'true') {
        $onclick = ' onclick="updateForm();"';
      }
      if ($usable_credits) {
				$selection = array('id' => $this->code,
				'module' => $this->title,
				'redeem_instructions' => MODULE_ORDER_TOTAL_STORE_CREDIT_TEXT_INSTRUCTIONS,
				'fields' => array(array('field' => zen_draw_checkbox_field('opt_credit', '1', $this->selection_test(), 'id="opt_credit"' . $onclick),
				                        'title' => $currencies->format($usable_credits, true, $order->info['currency'], $order->info['currency_value'])
				)));
      } // otherwise credits cannot be used
			return $selection;
		}
	}

	function selection_test() {
		if (isset($_SESSION['opt_credit']) && ($_SESSION['opt_credit'] == '1')) {
			return true;
		}
	}

	function collect_posts() {
		global $db, $currencies;
		if (isset($_POST['opt_credit'])) {
			$_SESSION['opt_credit'] = $_POST['opt_credit'];
		} else {
			if ($_GET['main_page'] == 'checkout_confirmation') {
				$this->clear_sessions();
			}
		}
	}

	function clear_sessions() {
		unset($_SESSION['opt_credit']);
		unset($_SESSION['credit_covers']);
	}

	function clear_posts() {
		unset($_POST['opt_credit']);
	}

	function update_credit_account($i) {
	}

	function get_user_balance($customer_id){
		global $db;
		if(isset($customer_id)){
			$check_query = $db->Execute("select amount from " . TABLE_STORE_CREDIT . " where customers_id = ".$customer_id);
			if(isset($check_query->fields['amount']) && $check_query->fields['amount'] > 0)
			return $check_query->fields['amount'];
		}
		return 0;
	}

	function check() {
		global $db;
		if (!isset($this->check)) {
			$check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_SC_STATUS'");
			$this->check = $check_query->RecordCount();
		}
		return $this->check;
	}

	function keys() {
		return array('MODULE_ORDER_TOTAL_SC_STATUS', 'MODULE_ORDER_TOTAL_SC_SORT_ORDER', 'MODULE_ORDER_TOTAL_SC_ORDER_STATUS_ID', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_POINTS', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_APPROVAL', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_PERCENTAGE', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_STATUS', 'MODULE_ORDER_TOTAL_SC_NO_CREDITS', 'MODULE_ORDER_TOTAL_SC_CALCULATION_BASE', 'MODULE_ORDER_TOTAL_SC_EXCLUDE_CATEGORIES', 'MODULE_ORDER_TOTAL_SC_EXCLUDE_SHIPPING', 'MODULE_ORDER_TOTAL_SC_ORDER_PRODUCT_POINTS', 'MODULE_ORDER_TOTAL_SC_ORDER_BOX_STATUS', 'MODULE_ORDER_TOTAL_SC_ORDER_BOX_PENDING');
	}

	function install() {
		global $db;
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('This module is installed', 'MODULE_ORDER_TOTAL_SC_STATUS', 'true', '', '6', '1', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ORDER_TOTAL_SC_SORT_ORDER', '840', 'Sort order of display.', '6', '2', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_ORDER_TOTAL_SC_ORDER_STATUS_ID', '0', 'Set the status of orders made where GV covers full payment', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Offer Reward Points', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_POINTS', 'false', 'Give customers a percentage of their purchases as store credit/reward points?', '6', '3', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Approval Period', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_APPROVAL', '0', 'How many days should pass from date of last modification before awarding rewards points?', '6', '3', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) values ('Reward Points Percentage', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_PERCENTAGE', '1', 'What percentage of purchase should be rewarded?', '6', '3', NOW(), NULL, NULL)");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Required Order Status', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_STATUS', '2', 'What order status is required to receive reward points?', '6', '4', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Rewards On Credit', 'MODULE_ORDER_TOTAL_SC_NO_CREDITS', 'true', 'Only offer rewards points on portion of purchase not paid with store credits?', '6', '4', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Rewards Points Calculation Base', 'MODULE_ORDER_TOTAL_SC_CALCULATION_BASE', 'sub-total', 'Base rewards points on the sub-total or the order total?', '6', '4', 'zen_cfg_select_option(array(\'sub-total\', \'total\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Rewards Points Exclude Categories', 'MODULE_ORDER_TOTAL_SC_EXCLUDE_CATEGORIES', 'false', 'Disallow categories or products with a 0 ratio from being able to be bought with reward points?', '6', '4', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Rewards Points Exclude Shipping', 'MODULE_ORDER_TOTAL_SC_EXCLUDE_SHIPPING', 'false', 'Disallow reward points being used against shipping fees?', '6', '4', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");    		
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Display Product Points', 'MODULE_ORDER_TOTAL_SC_ORDER_PRODUCT_POINTS', 'false', 'Display potential rewards points earned on product_info page?', '6', '4', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Store Credit Box Status', 'MODULE_ORDER_TOTAL_SC_ORDER_BOX_STATUS', '0', 'Store Credit Box Shows<br />0= Never/Off<br />1= Only if credit available<br />2= Always', '6', '5', 'zen_cfg_select_option(array(\'0\', \'1\', \'2\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Store Credit Box Pending Rewards', 'MODULE_ORDER_TOTAL_SC_ORDER_BOX_PENDING', 'false', 'Display the customer\'s pending rewards points?', '6', '6', 'zen_cfg_select_option(array(\'true\', \'false\'), ', now())");	
  }

	function remove() {
		global $db;
		$db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
	}
}
?>