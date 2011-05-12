<?php 
//caizhouqing update save address

if($_GET['main_page'] == "checkout_shipping_address" && $_GET['action'] == "add")
{
//print_r($_POST);
//exit;

    //save address
	$gender=$_POST['gender'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$state=$_POST['state'];
	$zone_country_id=$_POST['zone_country_id'];
	$zone_country_id1=$_POST['zone_country_id1'];
	$zone_id = $_POST['zone_id'];
	$zone_id1 = $_POST['zone_id1'];
	if($zone_id == "") $zone_id=0;
	if($zone_id1 == "") $zone_id1=0;

	$db->Execute("update customers set customers_gender='".$gender."',customers_firstname='".$firstname."',customers_lastname='".$lastname."',customers_telephone='".$phone ."' where customers_id=".$_SESSION['customer_id']);
	
	$address_format_query="update address_book set entry_gender='".$gender."',entry_firstname='".$firstname."',entry_lastname='".$lastname."',entry_street_address='".$_POST['street_address']."',entry_suburb='".$_POST['suburb']."',entry_postcode='".$_POST['postcode']."',entry_city='".$_POST['city']."',entry_state='".$state."',entry_country_id='".$zone_country_id."',entry_zone_id='".$zone_id."',entry_phone='".$phone."' where customers_id=".$_SESSION['customer_id'];
	$db->Execute($address_format_query);  //update address
	
	$address_format_query = "insert into address_book(customers_id,entry_gender,entry_firstname,entry_lastname,entry_street_address,entry_suburb,entry_postcode,entry_city,entry_country_id,entry_zone_id,entry_phone,entry_state) values ('".$_SESSION['customer_id']."','".$_POST['gender1']."','".$_POST['firstname1']."','".$_POST['lastname1']."','".$_POST['street_address1']."','".$_POST['suburb1']."','".$_POST['postcode1']."','".$_POST['city1']."','".$zone_country_id."','".$zone_id1."','".$_POST['phone1']."','".$state."')";
	
	$db->Execute($address_format_query);  //add
	
	$address_format_query="select * from address_book where customers_id =".$_SESSION['customer_id']." order by address_book_id desc";
	$address_format = $db->Execute($address_format_query);
	$_SESSION['sendto'] = $address_format->fields['address_book_id'];
    
	echo "<script language='javascript'>"; 
	echo " location='?main_page=checkout_shipping&address_book_id=".$_SESSION['sendto']."';"; 
	echo "</script>";
	//header("location:".$_SERVER['HTTP_REFERER']."index.php?main_page=checkout_shipping&address_book_id=".$_SESSION['sendto']);
}

?>