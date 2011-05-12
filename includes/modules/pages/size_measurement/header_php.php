<?php
/**
 * Size Measurement Page
 *
 * @package page
 * @copyright Copyright littlecoral.com
 * @version $Id: header_php.php 1 2008-12-14 02:36:10Z zihen $
 */
require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

$send_success = false;
if (isset($_POST['customer'])) {
	$customer = $_POST['customer'];
	$email_subject = 'Size Measurement By ' . $customer['name'];
	$send_to_name = STORE_NAME;
	$send_to_email = 'zihen@zihen.com';
	$text_message = '';
	foreach($customer as $key => $value) {
		$text_message .= ucfirst(str_replace('_', ' ', $key)) . ' : ' . $value . "\n\n";
	}
	
	$html_message = str_replace("\n", '<br />', $text_message);
    // Send message
    zen_mail($send_to_name, $send_to_email, $email_subject, $text_message, $customer['name'], $customer['email'], $html_msg,'size_measurement');
	zen_mail($send_to_name, $customer['email'], $email_subject, $text_message, $customer['name'], $customer['email'], $html_msg,'size_measurement');
	
	$send_success = true;

	// 发送成功后的页面显示内容
	$success_message = 'Your send success message.';
} else {
	$important_note = '<p>
							Please send your detailed measurements (in inches or cm) below to us so that we can  start the making asap.  Click thumbnail image to enlarge in a new window to see the images clearly.
					   </p>
					   <p class="importantText">
							<b>Important Note:</b><br />
							We may discuss the style and other related information via email before, but in order to avoid any error of making Please provide all the information including the result of our dicussion in this form . We will make the dress upon the information from this form STRICTLY. We have tons of email to be processed everyday so that we are afraid that some information may be not collected for making. So it\'s VERYVERY IMPORTANT to provide your detailed requirements again here.
						</p>';
}

define('NAVBAR_TITLE', 'Size Measurement');
$breadcrumb->add('Size Measurement');
?>