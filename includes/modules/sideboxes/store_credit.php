<?php
/**
 * store_credit sidebox - Displays the current shopper's store credit if any.
 */

  switch (true) {
    case (MODULE_ORDER_TOTAL_SC_ORDER_BOX_STATUS == '0'):
      $show_store_credit_box = false;
      break;
    case (MODULE_ORDER_TOTAL_SC_ORDER_BOX_STATUS  == '1'):
      if ((isset($_SESSION['customer_id']) && user_has_credit($_SESSION['customer_id']) > 0)) {
        $show_store_credit_box = true;
      } else {
        $show_store_credit_box = false;
      }
      break;
    case (MODULE_ORDER_TOTAL_SC_ORDER_BOX_STATUS == '2'):
      if (isset($_SESSION['customer_id'])) {
        $show_store_credit_box = true;
      }
      break;
    }


  if ($show_store_credit_box == true) {
    require($template->get_template_dir('tpl_store_credit.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_store_credit.php');
    $title =  BOX_HEADING_STORE_CREDIT;
    $title_link = false;
    $title_link = ''; //FILENAME_STORE_CREDIT;

    require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
  }

  function user_has_credit($uid){
    global $db;
    $check = $db->execute('select sum(amount) as amount from ' . TABLE_STORE_CREDIT . ' where customers_id=' . (int)$uid);
    if ($check->fields['amount'] > 0){
      return true;
    }else{
      return false;
    }
  }
?>