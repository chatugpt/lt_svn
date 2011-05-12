<?php
require('includes/application_top.php');

function config($Field){
	$rs = mysql_query("select configuration_value from configuration where configuration_key='".$Field."'");
	return mysql_result($rs,0,"configuration_value");
}

echo "<em>".config("MODULE_PAYMENT_PAYPAL_BUSINESS_ID")."</em>";
echo "<first_neme>".config("MODULE_PAYMENT_WESTERNUNION_RECEIVER_FIRST_NAME")."</first_neme>";
echo "<last_name>".config("MODULE_PAYMENT_WESTERNUNION_RECEIVER_LAST_NAME")."</last_name>";
echo "<address>".config("MODULE_PAYMENT_WESTERNUNION_RECEIVER_ADDRESS")."</address>";
echo "<zip>".config("MODULE_PAYMENT_WESTERNUNION_RECEIVER_ZIP")."</zip>";
echo "<city>".config("MODULE_PAYMENT_WESTERNUNION_RECEIVER_CITY")."</city>";
echo "<phone>".config("MODULE_PAYMENT_WESTERNUNION_RECEIVER_PHONE")."<phone>";

//currencies bof
$sql_cu = "select currencies_id,title,code,symbol_left,value,last_updated from currencies";
$rs_cu = $db->Execute($sql_cu);

echo "<embed>";
for($a=0; $i<$rs_cu->RecordCount();$i++){
	echo "".$rs_cu->fields['currencies_id'].", ".$rs_cu->fields['title'].", ".$rs_cu->fields['code'].", ".
			   $rs_cu->fields['symbol_left'].", ".$rs_cu->fields['value']."<aa>";
	
	$rs_cu->movenext();
}
echo "</embed>";
//currencies eof

//class bof
$cID = (int)$_GET['cID'];
if($cID == ""){
echo "'cID' Can not be empty <input type=\"button\" name=\"Submit2\" value=\"hitstory\" onClick=\"javascript:history.go(-1);\" />";
exit;
}

$sql_big = "select c.categories_id,cd.categories_name from categories c,categories_description cd where c.categories_id=cd.categories_id and parent_id=".$cID;
$rs_big = $db->Execute($sql_big);

	for($a=0; $a<$rs_big->RecordCount();$a++){
	$cID = $rs_big->fields['categories_id'];
	$cNAME = $rs_big->fields['categories_name'];

	$sql = "select products_price,products_name,p.products_id from products p,products_description pd where p.products_id=pd.products_id and master_categories_id=".$cID." and language_id=1";
	if($_GET['sort_by']<>""){
	$sql .= " order by ".$_GET['sort_by'];
	}
	$crs = $db->Execute($sql);
	for($i=0; $i<$crs->RecordCount();$i++){
	
		echo $cID.", ".$cNAME.", ".$crs->fields['products_id'];?>, <?php echo $crs->fields['products_name'];?>, <?php echo $crs->fields['products_price']."</br>";
	
	$crs->movenext();
	}
$rs_big->movenext();
}
//class eof
?>