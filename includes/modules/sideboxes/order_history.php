<?php
/**
 * order_history sidebox - if enabled, shows customers' most recent orders
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: order_history.php 4822 2006-10-23 11:11:36Z drbyte $
 */

  //if (isset($_SESSION['customer_id']) && (int)$_SESSION['customer_id'] != 0) {
// retreive the last x products purchased
  $orders_history_query2 = "select distinct op.products_id
                   from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_PRODUCTS . " p
                   where o.orders_id = op.orders_id
                   and op.products_id = p.products_id
                   and p.products_status = '1'
                   group by products_id
                   order by o.date_purchased desc
                   limit " . MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX;
		//echo $orders_history_query;
    $orders_history = $db->Execute($orders_history_query2);

    if ($orders_history->RecordCount() > 0) {
      $product_ids = '';
      while (!$orders_history->EOF) {
        $product_ids .= (int)$orders_history->fields['products_id'] . ',';
        $orders_history->MoveNext();
      }
      $product_ids = substr($product_ids, 0, -1);
      $rows=0;
      $customer_orders_string = '<table border="0" width="100%" cellspacing="0" cellpadding="1">';
      $products_history_query = "select pd.products_id,o.orders_id,pd.products_name,o.customers_state,o.customers_country
                         from " . TABLE_PRODUCTS_DESCRIPTION . " pd,". TABLE_ORDERS ." o , orders_products op 
                         where pd.products_id in (" . $product_ids . ")
                         and pd.language_id = '" . (int)$_SESSION['languages_id'] . "' and pd.products_id = op.products_id and o.orders_id = op.orders_id 
                         order by o.orders_id desc limit 6";
      $products_history = $db->Execute($products_history_query);
	  //echo $products_history_query;

      while (!$products_history->EOF) {
        
		//echo $products_history->fields['orders_id'];
		$rows++;
        $customer_orders[$rows]['id'] = $products_history->fields['products_id'];
        $customer_orders[$rows]['name'] = $products_history->fields['products_name'];
        $customer_orders[$rows]['customers_state'] = $products_history->fields['customers_state'];
        $customer_orders[$rows]['customers_country'] = $products_history->fields['customers_country'];
        $products_history->MoveNext();
      }
      $customer_orders_string .= '</table>';

      require($template->get_template_dir('tpl_order_history.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_order_history.php');
      $title =  BOX_HEADING_CUSTOMER_ORDERS;
      $title_link = false;
      require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/tpl_box_order_history.php');
    }
  //}
?>