<?php
/**
 * Ask a Question Page (based on Contact Us Page)
 *
 * @package page
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_php.php 3230 2006-03-20 23:21:29Z drbyte $
 */


  $valid_product = false;
  if (isset($_GET['products_id'])) {
    $product_info_query = "select pd.products_name, p.products_image, p.products_model
                           from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                           where p.products_status = '1'
                           and p.products_id = '" . (int)$_GET['products_id'] . "'
                           and p.products_id = pd.products_id
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'";

    $product_info = $db->Execute($product_info_query);

    if ($product_info->RecordCount() > 0) {
      $valid_product = true;
    }
  }

  if ($valid_product == false) {
    zen_redirect(zen_href_link(zen_get_info_page($_GET['products_id']), 'products_id=' . $_GET['products_id']));
  }

require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

$error = false;
if (isset($_GET['action']) && ($_GET['action'] == 'send')) {
  $name = zen_db_prepare_input($_POST['contactname']);
  $email_address = zen_db_prepare_input($_POST['email']);
  $enquiry = zen_db_prepare_input(strip_tags($_POST['enquiry']));

  $zc_validate_email = zen_validate_email($email_address);

  if ($zc_validate_email and !empty($enquiry) and !empty($name)) {
    // auto complete when logged in
    if($_SESSION['customer_id']) {
      $sql = "SELECT customers_id, customers_firstname, customers_lastname, customers_password, customers_email_address, customers_default_address_id 
              FROM " . TABLE_CUSTOMERS . " 
              WHERE customers_id = :customersID";
      
      $sql = $db->bindVars($sql, ':customersID', $_SESSION['customer_id'], 'integer');
      $check_customer = $db->Execute($sql);
      $customer_email= $check_customer->fields['customers_email_address'];
      $customer_name= $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
    } else {
      $customer_email='Not logged in';
      $customer_name='Not logged in';
    }

    // use contact us dropdown if defined
    if (CONTACT_US_LIST !=''){
      $send_to_array=explode("," ,CONTACT_US_LIST);
      preg_match('/\<[^>]+\>/', $send_to_array[$_POST['send_to']], $send_email_array);
      $send_to_email= eregi_replace (">", "", $send_email_array[0]);
      $send_to_email= eregi_replace ("<", "", $send_to_email);
      $send_to_name = preg_replace('/\<[^*]*/', '', $send_to_array[$_POST['send_to']]);
    } else {  //otherwise default to EMAIL_FROM and store name
    $send_to_email = EMAIL_FROM;
    $send_to_name =  STORE_NAME;
    }

    // Prepare extra-info details
    $extra_info = email_collect_extra_info($name, $email_address, $customer_name, $customer_email);
    // Prepare Text-only portion of message
    $text_message = OFFICE_FROM . "\t" . $name . "\n" .
    OFFICE_EMAIL . "\t" . $email_address . "\n" .
    PROD_NAME . "\t" . $product_info->fields['products_name'] . "\n" .  
    zen_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $_GET['products_id']) .
    "\n\n" .  

    '------------------------------------------------------' . "\n\n" .
    strip_tags($_POST['enquiry']) .  "\n\n" .
    '------------------------------------------------------' . "\n\n" .
    $extra_info['TEXT'];
    // Prepare HTML-portion of message
    $html_msg['EMAIL_MESSAGE_HTML'] = '<b>Product: </b><a href="' . zen_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $_GET['products_id']) . '">' . $product_info->fields['products_name'] . '</a><br />' . strip_tags($_POST['enquiry']);

    $html_msg['CONTACT_US_OFFICE_FROM'] = OFFICE_FROM . ' ' . $name . '<br />' . OFFICE_EMAIL . '(' . $email_address . ')';
    $html_msg['EXTRA_INFO'] = $extra_info['HTML'];
    // Send message
    // reuse contact_us form so we get the correct reply-to and don't have
    // to change includes/functions/functions_email.php (which has special
    // hooks for contact_us.
    zen_mail($send_to_name, $send_to_email, EMAIL_SUBJECT, $text_message, $name, $email_address, $html_msg,'contact_us');

    zen_redirect(zen_href_link(FILENAME_ASK_A_QUESTION, 'action=success&products_id='.$_GET['products_id']));
  } else {
    $error = true;
    if (empty($name)) {
      $messageStack->add('contact', ENTRY_EMAIL_NAME_CHECK_ERROR);
    }
    if ($zc_validate_email == false) {
      $messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    }
    if (empty($enquiry)) {
      $messageStack->add('contact', ENTRY_EMAIL_CONTENT_CHECK_ERROR);
    }
  }
} // end action==send

// default email and name if customer is logged in
if($_SESSION['customer_id']) {
  $sql = "SELECT customers_id, customers_firstname, customers_lastname, customers_password, customers_email_address, customers_default_address_id 
          FROM " . TABLE_CUSTOMERS . " 
          WHERE customers_id = :customersID";
  
  $sql = $db->bindVars($sql, ':customersID', $_SESSION['customer_id'], 'integer');
  $check_customer = $db->Execute($sql);
  $email= $check_customer->fields['customers_email_address'];
  $name= $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
}

if (CONTACT_US_LIST !=''){
  foreach(explode(",", CONTACT_US_LIST) as $k => $v) {
    $send_to_array[] = array('id' => $k, 'text' => preg_replace('/\<[^*]*/', '', $v));
  }
}

// include template specific file name defines
$define_page = zen_define_page(FILENAME_DEFINE_ASK_A_QUESTION, false);

//$breadcrumb->add(NAVBAR_TITLE);
?>
