<?php
/**
 * check order form
 * by liuyi 2010-12-28 10:44
 */
?>
<script language="javascript" type="text/javascript"><!--
function check_order_form() {
	var order_number_obj = $('input[name=order_number]');
	var order_email_obj = $('input[name=order_email]');
	var order_number = order_number_obj.val();
	var order_email = order_email_obj.val();
	
	var emailtest = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/ ;
	var ordertest = /^\d+$/ ;
	if (order_number.trim()=='') {alert('Please fill in the order number!');order_number_obj.select();return false;}
	if (order_email.trim()=='') {alert('Please fill in the email address!');order_email_obj.select();return false;}
	if (order_number.search(ordertest) == -1) {alert('Order number must be numeric!\n e.g.0911020100375457');order_number_obj.select();return false;}
	if (order_email.search(emailtest) == -1) {alert('E-mail address format error!\n e.g. sqt512@126.com');order_email_obj.select();return false;	}
}
//--></script>