<?php
/**
 * Side Box Template
 *
 */
  require_once(DIR_WS_CLASSES . 'store_credit.php');
  $store_credit = new storeCredit();
  
  $content ="";

  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  if(isset($_SESSION['customer_id'])){
    $check = $db->execute('select sum(amount) as amount from ' . TABLE_STORE_CREDIT . ' where customers_id='. (int)$_SESSION['customer_id']);
    $amount = $check->fields['amount'];
  }else{
    $amount = 0;
  }
  $content .= BOX_DESC_STORE_CREDIT . $currencies->format($amount);
  if (MODULE_ORDER_TOTAL_SC_ORDER_BOX_PENDING == 'true') {
    $pending_rewards = $store_credit->get_pending_rewards((int)$_SESSION['customer_id']);
    if ((float)$pending_rewards > 0) {
      $content .= '<center><hr width="50%"/></center>';
      $content .= sprintf(BOX_DESC_STORE_CREDIT_PENDING, $currencies->format($pending_rewards));
    }
  }  
  $content .= '</div>';
?>
