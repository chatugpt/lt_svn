<?php
/**
 * Autoresponder+
 * Version 1.3.2
 * By Steven300
 * @copyright Portions Copyright 2004-2008 Zen Cart Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */

require('includes/application_top.php');

//start time variables
if ( AUTO_TIMER == 'true' ) {

//Get start time
$entry_start = AUTO_START_TIME;
// replace semicolon with empty ''
$start = str_replace(':', '', $entry_start);

//Get end time
$entry_end = AUTO_END_TIME;
// replace semicolon with empty ''
$end = str_replace(':', '', $entry_end);

//Get current time
$t = time();
$now = date('His', $t);

//Compare
if ( ($start < $now ) && ( $end > $now ) ) {
    $status="go";
    } else {
    $status="stop";
	}
	
	} //end time variables

//If time validation passes or is not set
if ( ( ( AUTO_TIMER == 'true' ) && ( $status=='go' ) ) || ( AUTO_TIMER == 'false' ) ) {

//If autoresponder enabled
if (AUTO_ENABLE_AUTORESPONDER == 'true') {

//Control Logging
$log_file_name = AUTO_LOG_DIRECTORY . "autoresponder_log.log";

//Log function
function log_cws($msg){
	global $log_file_name;
	if (AUTO_LOG_EMAILS == 'true') {
		$fp=fopen($log_file_name,"a");
		fputs($fp, $msg);
		//Log to screen for testing
		//echo $msg . "\n";
		fclose($fp);
	}
}

//variables
$this_auto_mode='';
$this_auto_order_status_id='';
$this_auto_days_after='';
$this_auto_subscribed='';
$this_auto_subject='';
$this_auto_include_name='';
$this_auto_message_text='';
$this_auto_message_html='';
$this_auto_state='';
$preset='';
$subscribed='';
$words='';
$name='';
$text_message='';
$html_message='';
$sender='';
$to='';
$subject='';
$this_auto_restrict='';
$location='';

// change for testing purposes e.g. $admin_email="test@test.com";
// default - $admin_email=STORE_OWNER_EMAIL_ADDRESS;
$admin_email=STORE_OWNER_EMAIL_ADDRESS;

//If preset #1 enabled
if (AUTO_ENABLE_PRESET == 'true') {

$this_auto_mode=AUTO_MODE;
$this_auto_order_status_id=AUTO_ORDER_STATUS_ID;
$this_auto_days_after=AUTO_DAYS_AFTER;
$this_auto_subscribed=AUTO_SUBSCRIBED;
$this_auto_subject=AUTO_SUBJECT;
$this_auto_include_name=AUTO_INCLUDE_NAME;
$this_auto_message_text=AUTO_MESSAGE_TEXT;
$this_auto_message_html=AUTO_MESSAGE_HTML;
$this_auto_state=AUTO_STATE;
$this_auto_restrict=AUTO_RESTRICT;
$location=AUTO_LOCATION;

$preset="preset #1";

//Prepare log mode data
$log_mode='';
if ($this_auto_mode == 'live') {
$log_mode="(live mode)";
} else {
$log_mode="(test mode)";
}

//Start Log
log_cws("Start " . $preset . " " . $log_mode . ": ".date("Y-m-d H:i:s")." ");

	if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'no' ) ) {

	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'to zone' ) ) {
	
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_ZONES . " z 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_zone_id=z.zone_id 
	AND z.zone_name like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'to country' ) ) {
		
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
		
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_COUNTRIES . " co 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_country_id=co.countries_id 
	AND co.countries_name like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'from zone' ) ) {
	
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_ZONES . " z 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_zone_id=z.zone_id 
	AND z.zone_name not like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'from country' ) ) {
		
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
		
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_COUNTRIES . " co 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_country_id=co.countries_id 
	AND co.countries_name not like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ($this_auto_state == 'account-no-order') {
	
	$account_day=mktime()-($this_auto_days_after*86400);
	$account_day=date("Y-m-d",$account_day);

	$sql2="select distinct c.customers_email_address, c.customers_firstname, c.customers_lastname, c.customers_id FROM " . AUTO_TABLE_CUSTOMERS_INFO . " ci, " . AUTO_TABLE_CUSTOMERS . " c left join " . AUTO_TABLE_ORDERS . " o on c.customers_id = o.customers_id 
	WHERE o.customers_id is NULL AND ci.customers_info_date_account_created like '".$account_day."%' AND ci.customers_info_id = c.customers_id ORDER BY customers_lastname";
	
	$result2=$db->Execute($sql2);
	
	} else if ($this_auto_state == 'account') {
	
	$account_day=mktime()-($this_auto_days_after*86400);
	$account_day=date("Y-m-d",$account_day);

	$sql2="select distinct c.customers_email_address, c.customers_firstname, c.customers_lastname, c.customers_id FROM " . AUTO_TABLE_CUSTOMERS_INFO . " ci, " . AUTO_TABLE_CUSTOMERS . " c left join " . AUTO_TABLE_ORDERS . " o on c.customers_id = o.customers_id 
	WHERE ci.customers_info_date_account_created like '".$account_day."%' AND ci.customers_info_id = c.customers_id ORDER BY customers_lastname";
	
	$result2=$db->Execute($sql2);
	
	}
	
	while(!$result2->EOF)
	{
	
	if ($this_auto_state == 'order') {
	
		$sql3="select customers_name, customers_email_address from " . AUTO_TABLE_ORDERS . " where orders_id='".$result2->fields['orders_id']."'";
		$result3=$db->Execute($sql3);
		
		} else if ($this_auto_state == 'account-no-order') {
		
		$first=$result2->fields['customers_firstname'];
		$second=$result2->fields['customers_lastname'];
		
		} else if ($this_auto_state == 'account') {
		
		$first=$result2->fields['customers_firstname'];
		$second=$result2->fields['customers_lastname'];
		
		}
		
		//Get newsletter status (1)
		$sql9="select customers_newsletter, customers_email_address from " . AUTO_TABLE_CUSTOMERS . " where customers_email_address='".$result2->fields['customers_email_address']."'";
		$result9=$db->Execute($sql9);
		
		//Get newsletter status (2)
		$subscribed=$result9->fields['customers_newsletter'];
		
		//Get newsletter status (3)
		if ( $subscribed == '1' ) {
		$subscribed = "true";
		} else {
		$subscribed = "false";
		}
		
		//Prepare email data		
		
		if ($this_auto_state == 'order') {
		$name=$result3->fields['customers_name'];
		} else if ($this_auto_state == 'account-no-order') {
		$name= $first . " " . $second;
		} else if ($this_auto_state == 'account') {
		$name= $first . " " . $second;		
		}
		
		$sender=STORE_OWNER_EMAIL_ADDRESS;
		$to=$result2->fields['customers_email_address'];
		$subject=$this_auto_subject;
		
		//Get customer's first name
		$words = split('[ ]+', $name);
		$words[0];
		
		//Reset message
		$text_message='';
		$html_message='';
		
		//Customer name options for text email
		if ($this_auto_include_name == '0') {
		$text_message = $this_auto_message_text;
		} else if ($this_auto_include_name == '1') {
		$text_message = $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '2') {
		$text_message = $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '3') {
		$text_message = "Hi " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '4') {
		$text_message = "Hi " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '5') {
		$text_message = "Hello " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '6') {
		$text_message = "Hello " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '7') {
		$text_message = $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '8') {
		$text_message = $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '9') {
		$text_message = "Hi " . $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '10') {
		$text_message = "Hi " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '11') {
		$text_message = "Hello " . $words[0]  . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '12') {
		$text_message = "Hello " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '13') {
		$text_message = "Dear " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '14') {
		$text_message = "Dear " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '15') {
		$text_message = "Dear " . $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '16') {
		$text_message = "Dear " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		}
		
		//Customer name options for html email		
		if ($this_auto_include_name == '0') {
		$html_message = $this_auto_message_html;
		} else if ($this_auto_include_name == '1') {
		$html_message = $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '2') {
		$html_message = $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '3') {
		$html_message = "Hi " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '4') {
		$html_message = "Hi " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '5') {
		$html_message = "Hello " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '6') {
		$html_message = "Hello " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '7') {
		$html_message = $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '8') {
		$html_message = $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '9') {
		$html_message = "Hi " . $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '10') {
		$html_message = "Hi " . $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '11') {
		$html_message = "Hello " . $words[0]  . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '12') {
		$html_message = "Hello " . $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '13') {
		$html_message = "Dear " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '14') {
		$html_message = "Dear " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '15') {
		$html_message = "Dear " . $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '16') {
		$html_message = "Dear " . $name . "," . "<p />" . $this_auto_message_html;
		}
		
		//Prepare log data
		if ($this_auto_state == 'order') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Post-Order" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Location Restricted: " . $this_auto_restrict . "\r\n" . "Location: " . $location . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Order ID: " . $result2->fields['orders_id'] . "\r\n" . "Date of Order: " . $order_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";
		} else if ($this_auto_state == 'account-no-order') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Account No Order" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Account Date: " . $account_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";
		} else if ($this_auto_state == 'account') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Account" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Account Date: " . $account_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";		
		}
				
		//Must be subscribed and customer is subscribed
		if ( ( $this_auto_subscribed == 'true' ) && ( $subscribed == "true" ) ) {		
	
		//If in test mode, send email to store owner only
		if ($this_auto_mode == 'test') {
				
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
    
		} else if ($this_auto_mode == 'live') { //else if in live mode, send email to customer only
		
		zen_mail($name, $to, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
		
		//If in live mode and admin receives copy, send email to store owner as well
		if ( (AUTO_ADMIN_COPY == 'true') && ($this_auto_mode == 'live')  ) {
		
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
    	
    	//Write to log
		log_cws($logdata);
		
		//Must be subscribed but customer not subscribed
		} else if ( ( $this_auto_subscribed == 'true' ) && ( $subscribed == "false" ) ) {
		
		//do nothing
		
		} else { //Subscribed or not..
		
		//If in test mode, send email to store owner only
		if ($this_auto_mode == 'test') {
				
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
    
		} else if ($this_auto_mode == 'live') { //else if in live mode, send email to customer only
		
		zen_mail($name, $to, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
		
		//If in live mode and admin receives copy, send email to store owner as well
		if ( (AUTO_ADMIN_COPY == 'true') && ($this_auto_mode == 'live')  ) {
		
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
    	
    	//Write to log
		log_cws($logdata);
		
		}
	
	//Go to next email
	$result2->MoveNext();

	} //End while loop

//End log
log_cws("End: ".date("Y-m-d H:i:s"). "\r\n" . "\r\n" . "\r\n");

} // end preset #1








//If preset #2 enabled
if (AUTO_ENABLE_PRESET_2 == 'true') {

$this_auto_mode=AUTO_MODE_2;
$this_auto_order_status_id=AUTO_ORDER_STATUS_ID_2;
$this_auto_days_after=AUTO_DAYS_AFTER_2;
$this_auto_subscribed=AUTO_SUBSCRIBED_2;
$this_auto_subject=AUTO_SUBJECT_2;
$this_auto_include_name=AUTO_INCLUDE_NAME_2;
$this_auto_message_text=AUTO_MESSAGE_TEXT_2;
$this_auto_message_html=AUTO_MESSAGE_HTML_2;
$this_auto_state=AUTO_STATE_2;
$this_auto_restrict=AUTO_RESTRICT_2;
$location=AUTO_LOCATION_2;

$preset="preset #2";

//Prepare log mode data
$log_mode='';
if ($this_auto_mode == 'live') {
$log_mode="(live mode)";
} else {
$log_mode="(test mode)";
}

//Start Log
log_cws("Start " . $preset . " " . $log_mode . ": ".date("Y-m-d H:i:s")." ");

	if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'no' ) ) {

	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'to zone' ) ) {
	
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_ZONES . " z 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_zone_id=z.zone_id 
	AND z.zone_name like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'to country' ) ) {
		
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
		
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_COUNTRIES . " co 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_country_id=co.countries_id 
	AND co.countries_name like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'from zone' ) ) {
	
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_ZONES . " z 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_zone_id=z.zone_id 
	AND z.zone_name not like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'from country' ) ) {
		
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
		
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_COUNTRIES . " co 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_country_id=co.countries_id 
	AND co.countries_name not like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ($this_auto_state == 'account-no-order') {
	
	$account_day=mktime()-($this_auto_days_after*86400);
	$account_day=date("Y-m-d",$account_day);

	$sql2="select distinct c.customers_email_address, c.customers_firstname, c.customers_lastname, c.customers_id FROM " . AUTO_TABLE_CUSTOMERS_INFO . " ci, " . AUTO_TABLE_CUSTOMERS . " c left join " . AUTO_TABLE_ORDERS . " o on c.customers_id = o.customers_id 
	WHERE o.customers_id is NULL AND ci.customers_info_date_account_created like '".$account_day."%' AND ci.customers_info_id = c.customers_id ORDER BY customers_lastname";
	
	$result2=$db->Execute($sql2);
	
	} else if ($this_auto_state == 'account') {
	
	$account_day=mktime()-($this_auto_days_after*86400);
	$account_day=date("Y-m-d",$account_day);

	$sql2="select distinct c.customers_email_address, c.customers_firstname, c.customers_lastname, c.customers_id FROM " . AUTO_TABLE_CUSTOMERS_INFO . " ci, " . AUTO_TABLE_CUSTOMERS . " c left join " . AUTO_TABLE_ORDERS . " o on c.customers_id = o.customers_id 
	WHERE ci.customers_info_date_account_created like '".$account_day."%' AND ci.customers_info_id = c.customers_id ORDER BY customers_lastname";
	
	$result2=$db->Execute($sql2);
	
	}
	
	while(!$result2->EOF)
	{
	
	if ($this_auto_state == 'order') {
	
		$sql3="select customers_name, customers_email_address from " . AUTO_TABLE_ORDERS . " where orders_id='".$result2->fields['orders_id']."'";
		$result3=$db->Execute($sql3);
		
		} else if ($this_auto_state == 'account-no-order') {
		
		$first=$result2->fields['customers_firstname'];
		$second=$result2->fields['customers_lastname'];
		
		} else if ($this_auto_state == 'account') {
		
		$first=$result2->fields['customers_firstname'];
		$second=$result2->fields['customers_lastname'];
		
		}
		
		//Get newsletter status (1)
		$sql9="select customers_newsletter, customers_email_address from " . AUTO_TABLE_CUSTOMERS . " where customers_email_address='".$result2->fields['customers_email_address']."'";
		$result9=$db->Execute($sql9);
		
		//Get newsletter status (2)
		$subscribed=$result9->fields['customers_newsletter'];
		
		//Get newsletter status (3)
		if ( $subscribed == '1' ) {
		$subscribed = "true";
		} else {
		$subscribed = "false";
		}
		
		//Prepare email data		
		
		if ($this_auto_state == 'order') {
		$name=$result3->fields['customers_name'];
		} else if ($this_auto_state == 'account-no-order') {
		$name= $first . " " . $second;
		} else if ($this_auto_state == 'account') {
		$name= $first . " " . $second;		
		}
		
		$sender=STORE_OWNER_EMAIL_ADDRESS;
		$to=$result2->fields['customers_email_address'];
		$subject=$this_auto_subject;
		
		//Get customer's first name
		$words = split('[ ]+', $name);
		$words[0];
		
		//Reset message
		$text_message='';
		$html_message='';
		
		//Customer name options for text email
		if ($this_auto_include_name == '0') {
		$text_message = $this_auto_message_text;
		} else if ($this_auto_include_name == '1') {
		$text_message = $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '2') {
		$text_message = $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '3') {
		$text_message = "Hi " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '4') {
		$text_message = "Hi " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '5') {
		$text_message = "Hello " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '6') {
		$text_message = "Hello " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '7') {
		$text_message = $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '8') {
		$text_message = $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '9') {
		$text_message = "Hi " . $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '10') {
		$text_message = "Hi " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '11') {
		$text_message = "Hello " . $words[0]  . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '12') {
		$text_message = "Hello " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '13') {
		$text_message = "Dear " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '14') {
		$text_message = "Dear " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '15') {
		$text_message = "Dear " . $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '16') {
		$text_message = "Dear " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		}
		
		//Customer name options for html email		
		if ($this_auto_include_name == '0') {
		$html_message = $this_auto_message_html;
		} else if ($this_auto_include_name == '1') {
		$html_message = $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '2') {
		$html_message = $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '3') {
		$html_message = "Hi " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '4') {
		$html_message = "Hi " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '5') {
		$html_message = "Hello " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '6') {
		$html_message = "Hello " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '7') {
		$html_message = $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '8') {
		$html_message = $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '9') {
		$html_message = "Hi " . $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '10') {
		$html_message = "Hi " . $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '11') {
		$html_message = "Hello " . $words[0]  . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '12') {
		$html_message = "Hello " . $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '13') {
		$html_message = "Dear " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '14') {
		$html_message = "Dear " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '15') {
		$html_message = "Dear " . $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '16') {
		$html_message = "Dear " . $name . "," . "<p />" . $this_auto_message_html;
		}
		
		//Prepare log data
		if ($this_auto_state == 'order') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Post-Order" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Location Restricted: " . $this_auto_restrict . "\r\n" . "Location: " . $location . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Order ID: " . $result2->fields['orders_id'] . "\r\n" . "Date of Order: " . $order_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";
		} else if ($this_auto_state == 'account-no-order') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Account No Order" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Account Date: " . $account_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";
		} else if ($this_auto_state == 'account') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Account" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Account Date: " . $account_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";		
		}
				
		//Must be subscribed and customer is subscribed
		if ( ( $this_auto_subscribed == 'true' ) && ( $subscribed == "true" ) ) {		
	
		//If in test mode, send email to store owner only
		if ($this_auto_mode == 'test') {
				
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
    
		} else if ($this_auto_mode == 'live') { //else if in live mode, send email to customer only
		
		zen_mail($name, $to, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
		
		//If in live mode and admin receives copy, send email to store owner as well
		if ( (AUTO_ADMIN_COPY == 'true') && ($this_auto_mode == 'live')  ) {
		
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
    	
    	//Write to log
		log_cws($logdata);
		
		//Must be subscribed but customer not subscribed
		} else if ( ( $this_auto_subscribed == 'true' ) && ( $subscribed == "false" ) ) {
		
		//do nothing
		
		} else { //Subscribed or not..
		
		//If in test mode, send email to store owner only
		if ($this_auto_mode == 'test') {
				
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
    
		} else if ($this_auto_mode == 'live') { //else if in live mode, send email to customer only
		
		zen_mail($name, $to, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
		
		//If in live mode and admin receives copy, send email to store owner as well
		if ( (AUTO_ADMIN_COPY == 'true') && ($this_auto_mode == 'live')  ) {
		
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
    	
    	//Write to log
		log_cws($logdata);
		
		}
	
	//Go to next email
	$result2->MoveNext();

	} //End while loop

//End log
log_cws("End: ".date("Y-m-d H:i:s"). "\r\n" . "\r\n" . "\r\n");

} // end preset #2




//If preset #3 enabled
if (AUTO_ENABLE_PRESET_3 == 'true') {

$this_auto_mode=AUTO_MODE_3;
$this_auto_order_status_id=AUTO_ORDER_STATUS_ID_3;
$this_auto_days_after=AUTO_DAYS_AFTER_3;
$this_auto_subscribed=AUTO_SUBSCRIBED_3;
$this_auto_subject=AUTO_SUBJECT_3;
$this_auto_include_name=AUTO_INCLUDE_NAME_3;
$this_auto_message_text=AUTO_MESSAGE_TEXT_3;
$this_auto_message_html=AUTO_MESSAGE_HTML_3;
$this_auto_state=AUTO_STATE_3;
$this_auto_restrict=AUTO_RESTRICT_3;
$location=AUTO_LOCATION_3;

$preset="preset #3";

//Prepare log mode data
$log_mode='';
if ($this_auto_mode == 'live') {
$log_mode="(live mode)";
} else {
$log_mode="(test mode)";
}

//Start Log
log_cws("Start " . $preset . " " . $log_mode . ": ".date("Y-m-d H:i:s")." ");

	if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'no' ) ) {

	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'to zone' ) ) {
	
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_ZONES . " z 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_zone_id=z.zone_id 
	AND z.zone_name like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'to country' ) ) {
		
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
		
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_COUNTRIES . " co 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_country_id=co.countries_id 
	AND co.countries_name like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'from zone' ) ) {
	
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
	
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_ZONES . " z 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_zone_id=z.zone_id 
	AND z.zone_name not like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ( ($this_auto_state == 'order') && ( $this_auto_restrict == 'from country' ) ) {
		
	$order_day=mktime()-($this_auto_days_after*86400);
	$order_day=date("Y-m-d",$order_day);
		
	$sql2="SELECT DISTINCT OSH.orders_id, O.customers_email_address, O.customers_name  
	FROM " . AUTO_TABLE_ORDERS_STATUS_HISTORY . " OSH, " . AUTO_TABLE_ORDERS . " O, " . AUTO_TABLE_CUSTOMERS . " c, " . AUTO_TABLE_ADDRESS_BOOK . " ab, " . AUTO_TABLE_COUNTRIES . " co 
	WHERE OSH.date_added like '".$order_day."%'
	AND OSH.orders_status_id='". AUTO_ORDER_STATUS_ID ."' 
	AND OSH.orders_id=O.orders_id 
	AND OSH.orders_status_id=O.orders_status 
	AND O.customers_id=c.customers_id 
	AND c.customers_default_address_id = ab.address_book_id 
	AND ab.entry_country_id=co.countries_id 
	AND co.countries_name not like '".$location."%'";
	
	$result2=$db->Execute($sql2);
	
	} else if ($this_auto_state == 'account-no-order') {
	
	$account_day=mktime()-($this_auto_days_after*86400);
	$account_day=date("Y-m-d",$account_day);

	$sql2="select distinct c.customers_email_address, c.customers_firstname, c.customers_lastname, c.customers_id FROM " . AUTO_TABLE_CUSTOMERS_INFO . " ci, " . AUTO_TABLE_CUSTOMERS . " c left join " . AUTO_TABLE_ORDERS . " o on c.customers_id = o.customers_id 
	WHERE o.customers_id is NULL AND ci.customers_info_date_account_created like '".$account_day."%' AND ci.customers_info_id = c.customers_id ORDER BY customers_lastname";
	
	$result2=$db->Execute($sql2);
	
	} else if ($this_auto_state == 'account') {
	
	$account_day=mktime()-($this_auto_days_after*86400);
	$account_day=date("Y-m-d",$account_day);

	$sql2="select distinct c.customers_email_address, c.customers_firstname, c.customers_lastname, c.customers_id FROM " . AUTO_TABLE_CUSTOMERS_INFO . " ci, " . AUTO_TABLE_CUSTOMERS . " c left join " . AUTO_TABLE_ORDERS . " o on c.customers_id = o.customers_id 
	WHERE ci.customers_info_date_account_created like '".$account_day."%' AND ci.customers_info_id = c.customers_id ORDER BY customers_lastname";
	
	$result2=$db->Execute($sql2);
	
	}
	
	while(!$result2->EOF)
	{
	
	if ($this_auto_state == 'order') {
	
		$sql3="select customers_name, customers_email_address from " . AUTO_TABLE_ORDERS . " where orders_id='".$result2->fields['orders_id']."'";
		$result3=$db->Execute($sql3);
		
		} else if ($this_auto_state == 'account-no-order') {
		
		$first=$result2->fields['customers_firstname'];
		$second=$result2->fields['customers_lastname'];
		
		} else if ($this_auto_state == 'account') {
		
		$first=$result2->fields['customers_firstname'];
		$second=$result2->fields['customers_lastname'];
		
		}
		
		//Get newsletter status (1)
		$sql9="select customers_newsletter, customers_email_address from " . AUTO_TABLE_CUSTOMERS . " where customers_email_address='".$result2->fields['customers_email_address']."'";
		$result9=$db->Execute($sql9);
		
		//Get newsletter status (2)
		$subscribed=$result9->fields['customers_newsletter'];
		
		//Get newsletter status (3)
		if ( $subscribed == '1' ) {
		$subscribed = "true";
		} else {
		$subscribed = "false";
		}
		
		//Prepare email data		
		
		if ($this_auto_state == 'order') {
		$name=$result3->fields['customers_name'];
		} else if ($this_auto_state == 'account-no-order') {
		$name= $first . " " . $second;
		} else if ($this_auto_state == 'account') {
		$name= $first . " " . $second;		
		}
		
		$sender=STORE_OWNER_EMAIL_ADDRESS;
		$to=$result2->fields['customers_email_address'];
		$subject=$this_auto_subject;
		
		//Get customer's first name
		$words = split('[ ]+', $name);
		$words[0];
		
		//Reset message
		$text_message='';
		$html_message='';
		
		//Customer name options for text email
		if ($this_auto_include_name == '0') {
		$text_message = $this_auto_message_text;
		} else if ($this_auto_include_name == '1') {
		$text_message = $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '2') {
		$text_message = $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '3') {
		$text_message = "Hi " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '4') {
		$text_message = "Hi " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '5') {
		$text_message = "Hello " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '6') {
		$text_message = "Hello " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '7') {
		$text_message = $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '8') {
		$text_message = $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '9') {
		$text_message = "Hi " . $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '10') {
		$text_message = "Hi " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '11') {
		$text_message = "Hello " . $words[0]  . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '12') {
		$text_message = "Hello " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '13') {
		$text_message = "Dear " . $words[0] . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '14') {
		$text_message = "Dear " . $name . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '15') {
		$text_message = "Dear " . $words[0] . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		} else if ($this_auto_include_name == '16') {
		$text_message = "Dear " . $name . "," . "\r\n" . "\r\n" . $this_auto_message_text;
		}
		
		//Customer name options for html email		
		if ($this_auto_include_name == '0') {
		$html_message = $this_auto_message_html;
		} else if ($this_auto_include_name == '1') {
		$html_message = $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '2') {
		$html_message = $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '3') {
		$html_message = "Hi " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '4') {
		$html_message = "Hi " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '5') {
		$html_message = "Hello " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '6') {
		$html_message = "Hello " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '7') {
		$html_message = $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '8') {
		$html_message = $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '9') {
		$html_message = "Hi " . $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '10') {
		$html_message = "Hi " . $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '11') {
		$html_message = "Hello " . $words[0]  . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '12') {
		$html_message = "Hello " . $name . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '13') {
		$html_message = "Dear " . $words[0] . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '14') {
		$html_message = "Dear " . $name . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '15') {
		$html_message = "Dear " . $words[0] . "," . "<p />" . $this_auto_message_html;
		} else if ($this_auto_include_name == '16') {
		$html_message = "Dear " . $name . "," . "<p />" . $this_auto_message_html;
		}
		
		//Prepare log data
		if ($this_auto_state == 'order') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Post-Order" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Location Restricted: " . $this_auto_restrict . "\r\n" . "Location: " . $location . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Order ID: " . $result2->fields['orders_id'] . "\r\n" . "Date of Order: " . $order_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";
		} else if ($this_auto_state == 'account-no-order') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Account No Order" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Account Date: " . $account_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";
		} else if ($this_auto_state == 'account') {
		$logdata="\r\n" . "\r\n" . "Sending email.." . "\r\n" . "Date: " . date("Y-m-d H:i:s") . "\r\n" . "Query: Account" . "\r\n" . "Customer: " . $name . "\r\n" . "Email Address: " . $to . "\r\n" . "Subject: " . $subject . "\r\n" . "Subscribed: " . $subscribed . "\r\n" . "Account Date: " . $account_day . "\r\n". "Days Waited: " . $this_auto_days_after . "\r\n" . "\r\n";		
		}
				
		//Must be subscribed and customer is subscribed
		if ( ( $this_auto_subscribed == 'true' ) && ( $subscribed == "true" ) ) {		
	
		//If in test mode, send email to store owner only
		if ($this_auto_mode == 'test') {
				
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
    
		} else if ($this_auto_mode == 'live') { //else if in live mode, send email to customer only
		
		zen_mail($name, $to, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
		
		//If in live mode and admin receives copy, send email to store owner as well
		if ( (AUTO_ADMIN_COPY == 'true') && ($this_auto_mode == 'live')  ) {
		
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
    	
    	//Write to log
		log_cws($logdata);
		
		//Must be subscribed but customer not subscribed
		} else if ( ( $this_auto_subscribed == 'true' ) && ( $subscribed == "false" ) ) {
		
		//do nothing
		
		} else { //Subscribed or not..
		
		//If in test mode, send email to store owner only
		if ($this_auto_mode == 'test') {
				
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
    
		} else if ($this_auto_mode == 'live') { //else if in live mode, send email to customer only
		
		zen_mail($name, $to, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
		
		//If in live mode and admin receives copy, send email to store owner as well
		if ( (AUTO_ADMIN_COPY == 'true') && ($this_auto_mode == 'live')  ) {
		
		zen_mail(STORE_NAME, $admin_email, $subject, $text_message, STORE_NAME, $sender, $html_message,'autoresponder');
		
		}
    	
    	//Write to log
		log_cws($logdata);
		
		}
	
	//Go to next email
	$result2->MoveNext();

	} //End while loop

//End log
log_cws("End: ".date("Y-m-d H:i:s"). "\r\n" . "\r\n" . "\r\n");

} // end preset #3









} //end autoresponder enabled

} //end timer

//Output confirmation message to screen
echo "Autoresponder successfully loaded." . "<br />" . "End of message.";

?>