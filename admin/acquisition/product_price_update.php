<?php 
if(isset($_GET['action']) && $_GET['action'] == "update"){
$cID=$_POST['cID'];
$cPath=$_POST['cPath'];

for($i=0;$i<sizeof($_POST['products_id']);$i++){
	$p_id = (int)$_POST['products_id'][$i];
	$p_price = $_POST['price'][$i];
	
	if($p_id > 0 && isset($_POST['price'][$i]) && $p_price != ""){
		$sql="update products set products_price=".$p_price." where products_id = ".$p_id;	
	$db->Execute($sql);
	}
}
if($cPath == 0){
	header('location: product_acquisition_list.php?cID='.$cID.'&page='.$_POST['page'].'&rn='.$_POST['rn'].'');
	exit;
}else{
	header('location: product_acquisition_arr.php?cID='.$cID.'');
	exit;
	}
}
?>