<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: dsf_shipping.php 6131 2007-04-08 06:56:51Z drbyte $
 */

  require('includes/application_top.php');

  $action = (isset($_GET['action']) ? $_GET['action'] : '');

  if (zen_not_null($action)) {
    switch ($action) {
      case 'do_install':
      	set_time_limit(300);
      	$db->Execute("TRUNCATE `dsf_countries`;");
      	$db->Execute("TRUNCATE `dsf_countries_map`;");
      	$db->Execute("TRUNCATE `dsf_account_info`;");
      	$db->Execute("TRUNCATE `dsf_shipping`;");
	  	//get default account info
	  	$dsf_account_info_data = file_get_contents("http://www.zen-cart.cn/4px/dsf_account_info_data.php");
	  	$dsf_account_info_data = unserialize($dsf_account_info_data);
	  	$aiInfo = new objectInfo($dsf_account_info_data);
	  	//var_dump($dsf_account_info_data);
	  	zen_db_perform("dsf_account_info", $dsf_account_info_data, 'insert');
	  	
	  	//get dsf countries data
	  	$dsf_countries_data = file_get_contents("http://www.zen-cart.cn/4px/dsf_countries_data.php");
	  	$dsf_countries_data = unserialize($dsf_countries_data);
	  	//var_dump($dsf_countries_data);
	  	foreach ($dsf_countries_data as $dsf_countries_tmp) {
	  	  zen_db_perform("dsf_countries", $dsf_countries_tmp, 'insert');
	  	}
	  	
	  	
	  	//get dsf_countries_map_data.php
	  	$dsf_countries_map_data = file_get_contents("http://www.zen-cart.cn/4px/dsf_countries_map_data.php");
	  	$dsf_countries_map_data = unserialize($dsf_countries_map_data);
	  	//var_dump($dsf_countries_map_data);
	  	foreach ($dsf_countries_map_data as $dsf_countries_map_tmp) {
	  	  zen_db_perform("dsf_countries_map", $dsf_countries_map_tmp, 'insert');
	  	}
	  	
	  	//get dsf_shipping.php
	  	$dsf_shipping_data = file_get_contents("http://www.zen-cart.cn/4px/dsf_shipping_data.php");
	  	$dsf_shipping_data = unserialize($dsf_shipping_data);
	  	//var_dump($dsf_shipping_list);
	  	foreach ($dsf_shipping_data as $dsf_shipping_tmp) {
	  	  zen_db_perform("dsf_shipping", $dsf_shipping_tmp, 'insert');
	  	}
	  	zen_redirect(zen_href_link("dsf_shipping", 'action=account_info'));
	  	break;
      case 'account_save':
      	$id = 1;
        $dsf_account_info_query_raw = "select * from dsf_account_info where id={$id} limit 1";
	    $dsf_account_info = $db->Execute($dsf_account_info_query_raw);
	    
        $dsf_username = zen_db_prepare_input($_POST['dsf_username']);
        $dsf_password = zen_db_prepare_input($_POST['dsf_password']);
        $status = zen_db_prepare_input($_POST['status']);
        
        if (strlen($dsf_password) <= 0) {
          $dsf_password = $dsf_account_info->fields['dsf_password'];
        }
        
        if (strlen(trim($dsf_username)) > 0) {
          $client = new SoapClient($dsf_account_info->fields['dsf_wsdl_url'], array('encoding' => 'utf-8'));
		  $params = array("in0" => $dsf_username, "in1" => $dsf_password);
		  $userinfo = $client->verifyUser($params);
		}

		//var_dump($userinfo);exit;
        $sql_data_array = array('dsf_username' => $dsf_username . ""
        						,'dsf_password' => $dsf_password . ""
        						,'company_name_en' => $userinfo->out->companyEName . ""
        						,'company_name_cn' => $userinfo->out->companyCName . ""
        						,'company_id' => $userinfo->out->companyId . ""
        						,'company_code' => $userinfo->out->companyCode . ""
        						,'customer_service_code' => $userinfo->out->customerserviceCode . ""
        						,'customer_service_id' => $userinfo->out->customerserviceId . ""
        						,'customer_service_name' => $userinfo->out->customerserviceName . ""
        						,'maintainer_code' => $userinfo->out->maintainerCode . ""
        						,'maintainer_id' => $userinfo->out->maintainerId . ""
        						,'maintainer_name' => $userinfo->out->maintainerName . ""
        						,'status' => $status . ""
        						//,'created' => date("Y-m-d H:i:s")
        						,'modified' => date("Y-m-d H:i:s")
        						);
        //var_dump($sql_data_array);exit;

        zen_db_perform("dsf_account_info", $sql_data_array, 'update', "id = '" . (int)$id . "'");
        zen_redirect(zen_href_link("dsf_shipping", 'action=account_info'));
      	break;
      case 'account_delete':
      	$db->Execute("TRUNCATE `dsf_countries`;");
      	$db->Execute("TRUNCATE `dsf_countries_map`;");
      	$db->Execute("TRUNCATE `dsf_account_info`;");
      	$db->Execute("TRUNCATE `dsf_shipping`;");
      	zen_redirect(zen_href_link("dsf_shipping"));
      	break;
      case 'shipping_save':
        if (isset($_GET['sID'])) $dsf_shipping_id = zen_db_prepare_input($_GET['sID']);
        $dsf_shipping_code = zen_db_prepare_input($_POST['dsf_shipping_code']);
        $dsf_shipping_name = zen_db_prepare_input($_POST['dsf_shipping_name']);
        $shipping_displays_name = zen_db_prepare_input($_POST['shipping_displays_name']);
        $shipping_displays_image = zen_db_prepare_input($_POST['shipping_displays_image']);
        $shipping_displays_note = zen_db_prepare_input($_POST['shipping_displays_note']);
        $price_percentage = zen_db_prepare_input($_POST['price_percentage']);
        $price_increase = zen_db_prepare_input($_POST['price_increase']);
        $sort_index = zen_db_prepare_input($_POST['sort_index']);
        $status = zen_db_prepare_input($_POST['status']);

        $sql_data_array = array('shipping_displays_name' => $shipping_displays_name
        						,'shipping_displays_image' => $shipping_displays_image
        						,'shipping_displays_note' => $shipping_displays_note
        						,'price_percentage' => $price_percentage
        						,'price_increase' => $price_increase
        						,'sort_index' => $sort_index
        						,'status' => $status
        						//,'created' => date("Y-m-d H:i:s")
        						,'modified' => date("Y-m-d H:i:s")
        						);

        zen_db_perform("dsf_shipping", $sql_data_array, 'update', "dsf_shipping_id = '" . (int)$dsf_shipping_id . "'");
        zen_redirect(zen_href_link("dsf_shipping", (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'sID=' . $dsf_shipping_id));
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
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_DSF_SHIPPING_CODE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_DSF_SHIPPING_NAME; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SHIPPING_DISPLAYS_NAME; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SHIPPING_DISPLAYS_IMAGE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SHIPPING_DISPLAYS_NOTE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRICE_PERCENTAGE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRICE_INCREASE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SORT_INDEX; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_MODIFIED; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
  $dsf_shipping_query_raw = "select * from dsf_shipping order by sort_index desc, dsf_shipping_code";
  $dsf_shipping_split = new splitPageResults($_GET['page'], MAX_DISPLAY_SEARCH_RESULTS, $dsf_shipping_query_raw, $dsf_shipping_query_numrows);
  $dsf_shipping = $db->Execute($dsf_shipping_query_raw);
  while (!$dsf_shipping->EOF) {
    if ((!isset($_GET['sID']) || (isset($_GET['sID']) && ($_GET['sID'] == $dsf_shipping->fields['dsf_shipping_id']))) && !isset($mInfo)) {
      $mInfo = new objectInfo($dsf_shipping->fields);
    }
    if (isset($mInfo) && is_object($mInfo) && ($dsf_shipping->fields['dsf_shipping_id'] == $mInfo->dsf_shipping_id)) {
      echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link("dsf_shipping", 'page=' . $_GET['page'] . '&sID=' . $dsf_shipping->fields['dsf_shipping_id'] . '&action=shipping_edit') . '\'">' . "\n";
    } else {
      echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link("dsf_shipping", 'page=' . $_GET['page'] . '&sID=' . $dsf_shipping->fields['dsf_shipping_id'] . '&action=shipping_info') . '\'">' . "\n";
    }
?>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['dsf_shipping_code']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['dsf_shipping_name']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['shipping_displays_name']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['shipping_displays_image']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['shipping_displays_note']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['price_percentage']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['price_increase']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['sort_index']; ?></td>
                <td class="dataTableContent"><?php echo $dsf_shipping->fields['status']; ?></td>
                <td class="dataTableContent"><?php echo zen_date_short($dsf_shipping->fields['modified']); ?></td>
                <td class="dataTableContent" align="right">
                  <?php echo '<a href="' . zen_href_link("dsf_shipping", 'page=' . $_GET['page'] . '&sID=' . $dsf_shipping->fields['dsf_shipping_id'] . '&action=shipping_edit') . '">' . zen_image(DIR_WS_IMAGES . 'icon_edit.gif', ICON_EDIT) . '</a>'; ?>
                  <?php if (isset($mInfo) && is_object($mInfo) && ($dsf_shipping->fields['dsf_shipping_id'] == $mInfo->dsf_shipping_id)) { echo zen_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . zen_href_link("dsf_shipping", zen_get_all_get_params(array('sID')) . 'sID=' . $dsf_shipping->fields['dsf_shipping_id']) . '">' . zen_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>
                </td>
              </tr>
<?php
    $dsf_shipping->MoveNext();
  }
?>
              <tr>
                <td colspan="11"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText" valign="top"><?php echo $dsf_shipping_split->display_count($dsf_shipping_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_DSF_SHIPPING); ?></td>
                    <td class="smallText" align="right"><?php echo $dsf_shipping_split->display_links($dsf_shipping_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?></td>
                  </tr>
                </table></td>
              </tr>
<?php
  if (empty($action)) {
?>
              <tr>
                <td align="right" colspan="11" class="smallText">
    			  <?php
    				$dsf_account_info_query_raw = "select * from dsf_account_info where id=1 limit 1";
	  				$dsf_account_info = $db->Execute($dsf_account_info_query_raw);
	  				if (!$dsf_account_info->EOF) {
					  $aiInfo = new objectInfo($dsf_account_info->fields);
					}
    				if (isset($aiInfo) && is_object($aiInfo) && $aiInfo->company_code) {
				      echo '<a onclick="javascript:if(!confirm(\''.TEXT_DSF_ACCOUNT_CONFIRM_DELETE.'\')){return false;}" href="' . zen_href_link("dsf_shipping", 'action=account_delete') . '">' . zen_image_button('button_module_remove.gif', MODULE_REMOVE) . '</a> &nbsp;&nbsp;&nbsp;&nbsp;';
				      echo '<a href="' . zen_href_link("dsf_shipping", 'action=account_edit') . '">' . zen_image_button('button_edit.gif', IMAGE_EDIT) . '</a>';
				    } else {
    				  echo '<a href="' . zen_href_link("dsf_shipping", 'action=do_install') . '">' . zen_image_button('button_module_install.gif', IMAGE_MODULE_INSTALL) . '</a>';
    				} ?>
    </td>
              </tr>
<?php
  }
?>
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    case 'account_edit':
      $dsf_account_info_query_raw = "select * from dsf_account_info where id=1 limit 1";
	  $dsf_account_info = $db->Execute($dsf_account_info_query_raw);
	  
	  
	  if ($dsf_account_info->fields['status'] == "1") {
	    $status_true = true;
	    $status_false = false;
	  } else {
	  	$status_true = false;
	    $status_false = true;
	  }

      $heading[] = array('text' => '<b>' . TEXT_HEADING_DSF_ACCOUNT_INSTALL . '</b>');

      $contents = array('form' => zen_draw_form('dsf_shipping', "dsf_shipping", 'action=account_save', 'post', 'enctype="multipart/form-data"'));
      $tmpText = '<b>' . TEXT_DSF_STATUS_TITLE . '</b><br />' . TEXT_DSF_STATUS_DESC . '<br /><br />' . zen_draw_radio_field('status', 1, $status_true) . ' true <br />' . zen_draw_radio_field('status', 0, $status_false) . ' false <br /><br />';
      $contents[] = array('text' => $tmpText);
      
      $tmpText = '<b>' . TEXT_DSF_USERNAME_TITLE . '</b><br />' . TEXT_DSF_USERNAME_DESC . '<br /><br />' . zen_draw_input_field('dsf_username', $dsf_account_info->fields['dsf_username'], 'size="20"') . '<br /><br />';
      $contents[] = array('text' => $tmpText);
      
      $tmpText = '<b>' . TEXT_DSF_PASSWORD_TITLE . '</b><br />' . TEXT_DSF_PASSWORD_DESC . '<br /><br />' . zen_draw_password_field('dsf_password', '') . '<br /><br />';
      $contents[] = array('text' => $tmpText);

      $contents[] = array('align' => 'center', 'text' => '<br>' . zen_image_submit('button_save.gif', IMAGE_SAVE) . ' <a href="' . zen_href_link("dsf_shipping", 'action=account_info') . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    case 'account_info':
      $dsf_account_info_query_raw = "select * from dsf_account_info where id=1 limit 1";
	  $dsf_account_info = $db->Execute($dsf_account_info_query_raw);
	  if (!$dsf_account_info->EOF) {
	  	$aiInfo = new objectInfo($dsf_account_info->fields);
	  }

      if (isset($aiInfo) && is_object($aiInfo)) {
        $heading[] = array('text' => '<b>' . DSF_ACCOUNT_INFO . '</b>');

        $contents[] = array('text' => TEXT_DSF_ACCOUNT_STATUS . '<br /><b>' . $aiInfo->status . '</b>');
        $contents[] = array('text' => TEXT_DSF_USERNAME . '<br /><b>' . $aiInfo->dsf_username . '</b>');
        $contents[] = array('text' => TEXT_COMPANY_NAME_EN . '<br /><b>' . $aiInfo->company_name_en . '</b>');
        $contents[] = array('text' => TEXT_COMPANY_NAME_CN . '<br /><b>' . $aiInfo->company_name_cn . '</b>');
        $contents[] = array('text' => TEXT_COMPANY_CODE . '<br /><b>' . $aiInfo->company_code . '</b>');
        $contents[] = array('text' => TEXT_CUSTOMER_SERVICE_CODE . '<br /><b>' . $aiInfo->customer_service_code . '</b>');
        $contents[] = array('text' => TEXT_CUSTOMER_SERVICE_NAME . '<br /><b>' . $aiInfo->customer_service_name . '</b>');
        $contents[] = array('text' => TEXT_MAINTAINER_CODE . '<br /><b>' . $aiInfo->maintainer_code . '</b>');
        $contents[] = array('text' => TEXT_MAINTAINER_NAME . '<br /><b>' . $aiInfo->maintainer_name . '</b>');
        $contents[] = array('text' => TEXT_DATE_ADDED . '<br /><b>' . zen_date_short($aiInfo->created) . '</b>');
        if (zen_not_null($aiInfo->modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . '<br /><b>' . zen_date_short($aiInfo->modified) . '</b>');
      }
      $contents[] = array('align' => 'center', 'text' => '<a href="' . zen_href_link("dsf_shipping", 'action=account_edit') . '">' . zen_image_button('button_edit.gif', IMAGE_EDIT) . '</a>');
      break;
    case 'shipping_edit':
      if (isset($mInfo) && is_object($mInfo)) {
        $heading[] = array('text' => '<b>' . $mInfo->dsf_shipping_name . '</b>');

	      $contents = array('form' => zen_draw_form('dsf_shipping', "dsf_shipping", 'page=' . $_GET['page'] . '&sID=' . $mInfo->dsf_shipping_id . '&action=shipping_save', 'post', 'enctype="multipart/form-data"'));
	      
	      //shipping status
		  if ($mInfo->status == "1") {
		    $status_true = true;
		    $status_false = false;
		  } else {
		  	$status_true = false;
		    $status_false = true;
		  }
	      $tmpText = '<b>' . TEXT_DSF_SHIPPING_STATUS_TITLE . '</b><br />' . TEXT_DSF_SHIPPING_STATUS_DESC . '<br /><br />' . zen_draw_radio_field('status', 1, $status_true) . ' true <br />' . zen_draw_radio_field('status', 0, $status_false) . ' false <br /><br />';
	      $contents[] = array('text' => $tmpText);
	      
	      //dsf_shipping_code
	      $tmpText = '<b>' . TEXT_DSF_SHIPPING_CODE_TITLE . '</b><br />' . TEXT_DSF_SHIPPING_CODE_DESC . '<br /><br />' . $mInfo->dsf_shipping_code . '<br /><br />';
	      $contents[] = array('text' => $tmpText);
	      
	      //dsf_shipping_name
	      $tmpText = '<b>' . TEXT_DSF_SHIPPING_NAME_TITLE . '</b><br />' . TEXT_DSF_SHIPPING_NAME_DESC . '<br /><br />' . $mInfo->dsf_shipping_name . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      //shipping_displays_name
	      $tmpText = '<b>' . TEXT_SHIPPING_DISPLAYS_NAME_TITLE . '</b><br />' . TEXT_SHIPPING_DISPLAYS_NAME_DESC . '<br /><br />' . zen_draw_input_field('shipping_displays_name', $mInfo->shipping_displays_name, 'size="30"') . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      //shipping_displays_image
	      $tmpText = '<b>' . TEXT_SHIPPING_DISPLAYS_IMAGE_TITLE . '</b><br />' . TEXT_SHIPPING_DISPLAYS_IMAGE_DESC . '<br /><br />' . zen_draw_input_field('shipping_displays_image', $mInfo->shipping_displays_image, 'size="30"') . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      //shipping_displays_note
	      $tmpText = '<b>' . TEXT_SHIPPING_DISPLAYS_NOTE_TITLE . '</b><br />' . TEXT_SHIPPING_DISPLAYS_NOTE_DESC . '<br /><br />' . zen_draw_input_field('shipping_displays_note', $mInfo->shipping_displays_note, 'size="30"') . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      //price_percentage
	      $tmpText = '<b>' . TEXT_PRICE_PERCENTAGE_TITLE . '</b><br />' . TEXT_PRICE_PERCENTAGE_DESC . '<br /><br />' . zen_draw_input_field('price_percentage', $mInfo->price_percentage, 'size="30"') . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      //price_increase
	      $tmpText = '<b>' . TEXT_PRICE_INCREASE_TITLE . '</b><br />' . TEXT_PRICE_INCREASE_DESC . '<br /><br />' . zen_draw_input_field('price_increase', $mInfo->price_increase, 'size="30"') . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      //sort_index
	      $tmpText = '<b>' . TEXT_SORT_INDEX_TITLE . '</b><br />' . TEXT_SORT_INDEX_DESC . '<br /><br />' . zen_draw_input_field('sort_index', $mInfo->sort_index, 'size="30"') . '<br /><br />';
	      $contents[] = array('text' => $tmpText);

	      $contents[] = array('align' => 'center', 'text' => '<br>' . zen_image_submit('button_save.gif', IMAGE_SAVE) . ' <a href="' . zen_href_link("dsf_shipping", 'page=' . $_GET['page'] . '&sID=' . $mInfo->dsf_shipping_id) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
	  }
      break;
    case 'shipping_info':
    default:
      if (isset($mInfo) && is_object($mInfo)) {
        $heading[] = array('text' => '<b>' . $mInfo->dsf_shipping_name . '</b>');

        $contents[] = array('text' => TEXT_DSF_SHIPPING_STATUS . '<br /><b>' . $mInfo->status . '</b>');
        $contents[] = array('text' => TEXT_DSF_SHIPPING_CODE . '<br /><b>' . $mInfo->dsf_shipping_code . '</b>');
        $contents[] = array('text' => TEXT_DSF_SHIPPING_NAME . '<br /><b>' . $mInfo->dsf_shipping_name . '</b>');
        $contents[] = array('text' => TEXT_SHIPPING_DISPLAYS_NAME . '<br /><b>' . $mInfo->shipping_displays_name . '</b>');
        $contents[] = array('text' => TEXT_SHIPPING_DISPLAYS_IMAGE . '<br /><b>' . $mInfo->shipping_displays_image . '</b>');
        $contents[] = array('text' => TEXT_SHIPPING_DISPLAYS_NOTE . '<br /><b>' . $mInfo->shipping_displays_note . '</b>');
        $contents[] = array('text' => TEXT_PRICE_PERCENTAGE . '<br /><b>' . $mInfo->price_percentage . '</b>');
        $contents[] = array('text' => TEXT_PRICE_INCREASE . '<br /><b>' . $mInfo->price_increase . '</b>');
        
        $contents[] = array('text' => TEXT_DATE_ADDED . '<br /><b>' . zen_date_short($mInfo->created) . '</b>');
        if (zen_not_null($mInfo->modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . '<br /><b>' . zen_date_short($mInfo->modified) . '</b>');
        
        $contents[] = array('align' => 'center', 'text' => '<a href="' . zen_href_link("dsf_shipping", 'page=' . $_GET['page'] . '&sID=' . $mInfo->dsf_shipping_id . '&action=shipping_edit') . '">' . zen_image_button('button_edit.gif', IMAGE_EDIT) . '</a>');
      }
      break;
  }

  if ( (zen_not_null($heading)) && (zen_not_null($contents)) ) {
    echo '            <td width="20%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
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
