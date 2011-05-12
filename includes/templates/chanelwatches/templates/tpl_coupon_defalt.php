<?php
if($_GET['apply'] == "Redemption"){
	if(isset($_POST['insurance_checked']) && $_POST['insurance_checked'] == "false"){
		$_SESSION['coupons']['insurance_checked']="true";
	}else{
		$_SESSION['coupons']['insurance_checked']="false";
	}
//	
//	$dc_redeem_code = $_POST['dc_redeem_code'];
//	$date = date("Y-m-d H:i:s");
//	$sql = "select * from coupons where coupon_code = '".$dc_redeem_code."' and uses_per_coupon > 0 and (coupon_start_date < '".$date."' and coupon_expire_date  > '".$date."')";
//	$rs = $db->Execute($sql);
//	if($rs->RecordCount()>0){
//		$_SESSION['coupons']['size'] = 5;
//		$_SESSION['coupons']['code'] = $rs->fields['coupon_code'];
//		$_SESSION['coupons']['id'] = $rs->fields['coupon_id'];
//		$_SESSION['coupons']['amount'] = $rs->fields['coupon_amount'];
//		$_SESSION['coupons']['type'] = $rs->fields['coupon_type'];  //p % 
//		$_SESSION['coupons']['minimum_order'] = $rs->fields['coupon_minimum_order'];
//	}else{
//		$_SESSION['coupons']['code'] = "";
//		$_SESSION['coupons']['id'] = "";
//		$_SESSION['coupons']['amount'] = "";
//		$_SESSION['coupons']['type'] =  "";
//		$_SESSION['coupons']['minimum_order'] = "";
//		$_SESSION['coupons']['size'] = 4;
//	}
	if(isset($_POST['payment'])){
		$_SESSION['coupons']['payment_choose'] = $_POST['payment'];
	}
	
	include('includes/modules/order_total/ot_coupon.php');
	
	$_SESSION['coupons']['size']="10";
	
	$k = new ot_coupon;
	$k->collect_posts();
	zen_redirect('index.php?main_page=checkout_shipping');
	exit;
}

?>