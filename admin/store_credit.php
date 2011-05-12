<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
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
//  $Id: store_credit.php 4 2008-10-25 23:24:35Z numinix $
//

  require('includes/application_top.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();

  require_once(DIR_FS_CATALOG . 'includes/classes/store_credit.php');
  $store_credit = new storeCredit();
  $store_credit->store_pending_rewards();
  
  $action = (isset($_GET['action']) ? $_GET['action'] : '');

  $error = false;
  $processed = false;

  if (zen_not_null($action)) {
    switch ($action) {
      case 'update':
        $customers_id = zen_db_prepare_input($_GET['cID']);
        $amount = zen_db_prepare_input($_POST['customers_balance']);

        $sql_data_array = array('customers_id' => $customers_id,
                                'amount' => $amount);

        $check = $db->execute('select count(*) as count from ' . TABLE_STORE_CREDIT . ' WHERE customers_id=' . (int)$customers_id);
        if($check->fields['count']==0){
          zen_db_perform(TABLE_STORE_CREDIT, $sql_data_array, 'insert', '');
        }else{
          zen_db_perform(TABLE_STORE_CREDIT, $sql_data_array, 'update', "customers_id = '" . (int)$customers_id . "'");
        }
        zen_redirect(zen_href_link(FILENAME_STORE_CREDIT, 'cID=' . $_GET['cID'], 'NONSSL'));
        break;
      case 'award':
        $customers_id = zen_db_prepare_input($_GET['cID']);
        $store_credit->award_pending_rewards($customers_id);
        zen_redirect(zen_href_link(FILENAME_STORE_CREDIT, 'cID=' . $_GET['cID'], 'NONSSL'));
        break;
      default:
        $customers = $db->Execute("select c.customers_id, c.customers_firstname, c.customers_lastname, sc.amount from " . TABLE_CUSTOMERS . " c left join " . TABLE_STORE_CREDIT. " sc on c.customers_id = sc.customers_id where c.customers_id = '" . (int)$_GET['cID'] . "'");

        $cInfo = new objectInfo($customers->fields);
        break;
    }
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<?php
  if ($action == 'edit' || $action == 'update') {
?>
<script language="javascript"><!--

function check_form() {
  var error = 0;
  var error_message = "<?php echo JS_ERROR; ?>";

  int_customers_balance = document.getElementById('customers_balance').value;

  if (isNaN(int_customers_balance)) {
    error_message = error_message + "Customers balance must be numeric";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//--></script>
<?php
  }
?>
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
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if ($action == 'edit' || $action == 'update') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo zen_draw_form('store_credit', FILENAME_STORE_CREDIT, zen_get_all_get_params(array('action')) . 'action=update', 'post', 'onsubmit="return check_form(store_credit);"', true); ?>
        <td class="formAreaTitle">Customers Balance</td>
      </tr>
      <TR>
        <td class="main">
        <table border=0>
          <col width=200>
          <col width=200>
          <tr>
            <td class="main"><b><?php echo TABLE_HEADING_FIRSTNAME ?></b></td>
            <td class="main"><b><?php echo TABLE_HEADING_LASTNAME ?></b></td>
          </tr>
          <tr>
            <td class="main"><?php echo ($cInfo->customers_firstname); ?></td>
            <td class="main"><?php echo ($cInfo->customers_lastname); ?></td>
          </TR>
        </table>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_BALANCE; ?></td>
            <td class="main">
            <?
              if($cInfo->amount==null || is_nan($cInfo->amount)) $cInfo->amount = 0;
              $amount = number_format($cInfo->amount, 2);
              $str_balance = "".($amount);
              echo zen_draw_input_field('customers_balance', $str_balance); 
            ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main"><?php echo zen_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('action')), 'NONSSL') .'">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr></form>
<?php 
  } elseif ($action == 'confirm') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo zen_draw_form('store_credit', FILENAME_STORE_CREDIT, zen_get_all_get_params(array('action')) . 'action=award', 'post', '', true); ?>
        <td class="formAreaTitle">Customers Balance</td>
      </tr>
      <tr>
        <td class="main">
          <table border=0>
            <col width=200>
            <col width=200>
            <tr>
              <td class="main"><b><?php echo TABLE_HEADING_FIRSTNAME; ?></b></td>
              <td class="main"><b><?php echo TABLE_HEADING_LASTNAME; ?></b></td>
            </tr>
            <tr>
              <td class="main"><?php echo ($cInfo->customers_firstname); ?></td>
              <td class="main"><?php echo ($cInfo->customers_lastname); ?></td>
            </tr>
          </table>
      </tr>
      <tr>
        <td class="formArea">
          <table border="0" cellspacing="2" cellpadding="2">
            <tr>
              <td class="main"><?php echo ENTRY_BALANCE; ?></td>
              <td class="main">
              <?
                if($cInfo->amount==null || is_nan($cInfo->amount)) $cInfo->amount = 0;
                $str_balance = "".($cInfo->amount);
                echo $currencies->format($str_balance); 
              ?>
              </td>
              <td class="main">&nbsp;</td>
              <td class="main">Pending Rewards: </td>
              <td class="main"><?php echo $currencies->format($_GET['pending']); ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main"><?php echo zen_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('action')), 'NONSSL') .'">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr>
    </form>
<?php 
  } elseif ($action == 'stats') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo zen_draw_form('store_credit', FILENAME_STORE_CREDIT, zen_get_all_get_params(array('action')), 'post', '', true); ?>
        <td class="formAreaTitle">History</td>
      </tr>
      <tr>
        <td class="main">
          <table border=0>
            <col width=200>
            <col width=200>
            <tr>
              <td class="main"><b><?php echo TABLE_HEADING_FIRSTNAME; ?></b></td>
              <td class="main"><b><?php echo TABLE_HEADING_LASTNAME; ?></b></td>
              <td class="main"><b><?php echo 'Credit Balance'; ?></b></td>
            </tr>
            <tr>
              <td class="main"><?php echo ($cInfo->customers_firstname); ?></td>
              <td class="main"><?php echo ($cInfo->customers_lastname); ?></td>
              <td class="main">              
              <?
                if($cInfo->amount==null || is_nan($cInfo->amount)) $cInfo->amount = 0;
                $str_balance = "".($cInfo->amount);
                echo $currencies->format($str_balance); 
              ?>
              </td>
            </tr>
          </table>
      </tr>
      <tr>
        <td class="formArea">
          <table border="0" cellspacing="2" cellpadding="2" width="50%">
            <tr>
              <th class="main" align="left">Date</th>
              <th class="main" align="left">Order ID</th>
              <th class="main" align="right">Amount</th>
              <th class="main" align="right">Action</th>
            </tr>
<?php
  @define('TABLE_SC_TRANSACTION_LOGS', DB_PREFIX.'sc_transaction_logs');
  $sc_history = $db->Execute("SELECT orders_id, amount, message, created_on 
          FROM " . TABLE_SC_TRANSACTION_LOGS . "
          WHERE customers_id = " . $customers->fields['customers_id'] . "
          ORDER BY created_on DESC");
  while(!$sc_history->EOF) {
    $sc_date = date("F j, Y, g:i a", $sc_history->fields['created_on']);
    $sc_orders_id = $sc_history->fields['orders_id'];
    $sc_amount = (float)$sc_history->fields['amount'];
    if ($sc_amount < 0) {
      $sc_amount = $sc_amount * -1;
      $sc_amount = "-" . $currencies->format($sc_amount);
    } else {
      $sc_amount = $currencies->format($sc_amount); 
    }      
    $sc_action = $sc_history->fields['message'];
?>
            <tr>
              <td class="main"><?php echo $sc_date; ?></td>
              <td class="main"><?php echo $sc_orders_id; ?></td>
              <td class="main" align="right"><?php echo $sc_amount; ?></td>
              <td class="main" align="right"><?php echo $sc_action; ?></td>
            </tr>
<?php
    $sc_history->MoveNext();
  }
?>
          </table>
        </td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main"><?php echo '<a href="' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('action')), 'NONSSL') .'">' . zen_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
      </tr>
    </form>    
<?php
  } else {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr><?php echo zen_draw_form('search', FILENAME_STORE_CREDIT, '', 'get', '', true); ?>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td class="smallText" align="right">
<?php
// show reset search
    if (isset($_GET['search']) && zen_not_null($_GET['search'])) {
      echo '<a href="' . zen_href_link(FILENAME_STORE_CREDIT, '', 'NONSSL') . '">' . zen_image_button('button_reset.gif', IMAGE_RESET) . '</a>&nbsp;&nbsp;';
    }
    echo HEADING_TITLE_SEARCH_DETAIL . ' ' . zen_draw_input_field('search') . zen_hide_session_id();
    if (isset($_GET['search']) && zen_not_null($_GET['search'])) {
      $keywords = zen_db_input(zen_db_prepare_input($_GET['search']));
      echo '<br/ >' . TEXT_INFO_SEARCH_DETAIL_FILTER . $keywords;
    }
?>
            </td>
          </form></tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
<?php
// Sort Listing
          switch ($_GET['list_order']) {
              case "firstname":
              $disp_order = "c.customers_firstname";
              break;
              case "firstname-desc":
              $disp_order = "c.customers_firstname DESC";
              break;
              case "lastname":
              $disp_order = "c.customers_lastname, c.customers_firstname";
              break;
              case "lastname-desc":
              $disp_order = "c.customers_lastname DESC, c.customers_firstname";
              break;
              case "balance-asc":
              $disp_order = "sc.amount";
              break;
              case "balance-desc":
              $disp_order = "sc.amount DESC";
              break;
              case "pending-asc":
              $disp_order = "sc.pending";
              break;
              case "pending-desc":
              $disp_order = "sc.pending DESC";
              break;
              default:
              $disp_order = "c.customers_lastname";
          }
?>
             <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent" align="left">
                <?echo TABLE_HEADING_ID; ?>
                </td>
                <td class="dataTableHeadingContent" align="left">
                  <?php echo (($_GET['list_order']=='lastname' or $_GET['list_order']=='lastname-desc') ? '<span class="SortOrderHeader">' . TABLE_HEADING_LASTNAME . '</span>' : TABLE_HEADING_LASTNAME); ?><br />
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=lastname', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='lastname' ? '<span class="SortOrderHeader">Asc</span>' : '<span class="SortOrderHeaderLink">Asc</b>'); ?></a>&nbsp;
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=lastname-desc', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='lastname-desc' ? '<span class="SortOrderHeader">Desc</span>' : '<span class="SortOrderHeaderLink">Desc</b>'); ?></a>
                </td>
                <td class="dataTableHeadingContent" align="left">
                  <?php echo (($_GET['list_order']=='firstname' or $_GET['list_order']=='firstname-desc') ? '<span class="SortOrderHeader">' . TABLE_HEADING_FIRSTNAME . '</span>' : TABLE_HEADING_FIRSTNAME); ?><br />
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=firstname', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='firstname' ? '<span class="SortOrderHeader">Asc</span>' : '<span class="SortOrderHeaderLink">Asc</b>'); ?></a>&nbsp;
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=firstname-desc', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='firstname-desc' ? '<span class="SortOrderHeader">Desc</span>' : '<span class="SortOrderHeaderLink">Desc</span>'); ?></a>
                </td>
                <td class="dataTableHeadingContent" align="left">
                  <?php echo (($_GET['list_order']=='balance-asc' or $_GET['list_order']=='balance-desc') ? '<span class="SortOrderHeader">' . TABLE_HEADING_BALANCE . '</span>' : TABLE_HEADING_BALANCE); ?><br />
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=balance-asc', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='balance-asc' ? '<span class="SortOrderHeader">Asc</span>' : '<span class="SortOrderHeaderLink">Asc</b>'); ?></a>&nbsp;
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=balance-desc', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='balance-desc' ? '<span class="SortOrderHeader">Desc</span>' : '<span class="SortOrderHeaderLink">Desc</b>'); ?></a>
                </td>
                <td class="dataTableHeadingContent" align="left">
                  <?php echo (($_GET['list_order']=='pending-asc' or $_GET['list_order']=='pending-desc') ? '<span class="SortOrderHeader">' . TABLE_HEADING_PENDING . '</span>' : TABLE_HEADING_PENDING); ?><br />
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=pending-asc', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='pending-asc' ? '<span class="SortOrderHeader">Asc</span>' : '<span class="SortOrderHeaderLink">Asc</b>'); ?></a>&nbsp;
                  <a href="<?php echo zen_href_link(basename($PHP_SELF) . '?list_order=pending-desc', '', 'NONSSL'); ?>"><?php echo ($_GET['list_order']=='pending-desc' ? '<span class="SortOrderHeader">Desc</span>' : '<span class="SortOrderHeaderLink">Desc</b>'); ?></a>
                </td>                
                <td class="dataTableHeadingContent" align="right">&nbsp;</td>
              </tr>
<?php
    $search = '';
    if (isset($_GET['search']) && zen_not_null($_GET['search'])) {
      $keywords = zen_db_input(zen_db_prepare_input($_GET['search']));
//      $search = "where c.customers_lastname like '%" . $keywords . "%' or c.customers_firstname like '%" . $keywords . "%' or c.customers_email_address like '%" . $keywords . "%'";
      $search = "where c.customers_lastname like '%" . $keywords . "%' or c.customers_firstname like '%" . $keywords . "%' or c.customers_email_address like '%" . $keywords . "%' or c.customers_telephone rlike '" . $keywords . "'";
    }
    $customers_query_raw = "SELECT c.customers_id, c.customers_lastname, c.customers_firstname, c.customers_email_address, sc.amount, sc.pending
                            FROM " . TABLE_CUSTOMERS . " c left join 
                            " . TABLE_STORE_CREDIT . " sc on c.customers_id = sc.customers_id 
                            " . $search . " order by $disp_order";

// Split Page
// reset page when page is unknown
if (($_GET['page'] == '' or $_GET['page'] == '1') and $_GET['cID'] != '') {
  $check_page = $db->Execute($customers_query_raw);
  $check_count=1;
  if ($check_page->RecordCount() > MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER) {
    while (!$check_page->EOF) {
      if ($check_page->fields['customers_id'] == $_GET['cID']) {
        break;
      }
      $check_count++;
      $check_page->MoveNext();
    }
    $_GET['page'] = round((($check_count/MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER)+(fmod_round($check_count,MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER) !=0 ? .5 : 0)),0);
  } else {
    $_GET['page'] = 1;
  }
}

    $customers_split = new splitPageResults($_GET['page'], MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER, $customers_query_raw, $customers_query_numrows);
    $customers = $db->Execute($customers_query_raw);
    while (!$customers->EOF) {
      if ((!isset($_GET['cID']) || (isset($_GET['cID']) && ($_GET['cID'] == $customers->fields['customers_id']))) && !isset($cInfo)) {
        $cInfo_array = $customers->fields;
        $cInfo = new objectInfo($cInfo_array);
      }

      if (isset($cInfo) && is_object($cInfo) && ($customers->fields['customers_id'] == $cInfo->customers_id)) {
        echo '          <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customers_id . '&action=edit', 'NONSSL') . '\'">' . "\n";
      } else {
        echo '          <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('cID')) . 'cID=' . $customers->fields['customers_id'], 'NONSSL') . '\'">' . "\n";
      }
?>
                <td class="dataTableContent" align="left"><?php echo $customers->fields['customers_id']; ?></td>
                <td class="dataTableContent" align="left"><?php echo $customers->fields['customers_lastname']; ?></td>
                <td class="dataTableContent" align="left"><?php echo $customers->fields['customers_firstname']; ?></td>
                <td class="dataTableContent" align="left"><?php 
                  $balance = $customers->fields['amount']; 
                if(is_nan($balance)){
                  $balance = 0;
                }
                echo $currencies->format($balance, false, DEFAULT_CURRENCY);
                ?></td>
                <td class="dataTableContent" align="left"><?php echo $currencies->format($customers->fields['pending']); ?></td>
                <td class="dataTableContent" align="right">
                  <?php echo '<a href="' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('cID', 'action')) . 'cID=' . $customers->fields['customers_id'] . '&action=stats', 'NONSSL') . '">' . zen_image(DIR_WS_IMAGES . 'icon_sc_history.gif', 'Transaction History') . '</a>'; ?>&nbsp; 
                  <?php if ($customers->fields['pending'] > 0) { echo '<a href="' .  zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('cID', 'action')) . 'cID=' . $customers->fields['customers_id'] . '&pending=' . $customers->fields['pending'] . '&action=confirm', 'NONSSL') . '">' . zen_image(DIR_WS_IMAGES . 'icon_award_on.gif', 'Award Pending Rewards') . '</a>'; } else { echo zen_image(DIR_WS_IMAGES . 'icon_award_off.gif', 'No Pending Rewards'); } ?>&nbsp;
                  <?php if (isset($cInfo) && is_object($cInfo) && ($customers->fields['customers_id'] == $cInfo->customers_id)) { echo zen_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('cID')) . 'cID=' . $customers->fields['customers_id'] . ($_GET['page'] > 0 ? '&page=' . $_GET['page'] : ''), 'NONSSL') . '">' . zen_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;
                </td>
              </tr>
<?php
      $customers->MoveNext();
    }
?>
              <tr>
                <td colspan="5"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText" valign="top"><?php echo $customers_split->display_count($customers_query_numrows, MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_CUSTOMERS); ?></td>
                    <td class="smallText" align="right"><?php echo $customers_split->display_links($customers_query_numrows, MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER, MAX_DISPLAY_PAGE_LINKS, $_GET['page'], zen_get_all_get_params(array('page', 'info', 'x', 'y', 'cID'))); ?></td>
                  </tr>
<?php
    if (isset($_GET['search']) && zen_not_null($_GET['search'])) {
?>
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . zen_href_link(FILENAME_STORE_CREDIT, '', 'NONSSL') . '">' . zen_image_button('button_reset.gif', IMAGE_RESET) . '</a>'; ?></td>
                  </tr>
<?php
    }
?>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    default:
      if (isset($cInfo) && is_object($cInfo)) {
        $heading[] = array('text' => '<b>' . TABLE_HEADING_ID . $cInfo->customers_id . ' ' . $cInfo->customers_firstname . ' ' . $cInfo->customers_lastname . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<a href="' . zen_href_link(FILENAME_STORE_CREDIT, zen_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customers_id . '&action=edit', 'NONSSL') . '">' . zen_image_button('button_edit.gif', IMAGE_EDIT) . '</a>');
      }
      break;
  }

  if ( (zen_not_null($heading)) && (zen_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
