<?php
  require('includes/application_top.php');
  
  $cID = (int)$_GET['cID'];
  
	if($cID == ""){
	echo "'cID' Can not be empty <input type=\"button\" name=\"Submit2\" value=\"hitstory\" onClick=\"javascript:history.go(-1);\" />";
	exit;
	}

$sql_big = "select * from categories where parent_id=".$cID;
$rs_big = $db->Execute($sql_big);

for($t=0; $t<$rs_big->RecordCount();$t++){
	$test .= "Test".$t."();";	
}

	for($a=0; $a<$rs_big->RecordCount();$a++){
	$cID = $rs_big->fields['categories_id'];
?>

[<?php echo $a+1;?>] <b><?php echo $cID;?></b>&nbsp;<a href="<?php echo $testurl;?>" target="_blank"><?php echo $testurl;?></a> 

	<?php 
	$sql = "select products_price,products_name,p.products_id from products p,products_description pd where p.products_id=pd.products_id and master_categories_id=".$cID." and language_id=1";
	if($_GET['sort_by']<>""){
	$sql .= " order by ".$_GET['sort_by'];
	}
	$crs = $db->Execute($sql);
	for($i=0; $i<$crs->RecordCount();$i++){
	
		echo "<product>".$crs->fields['products_id'];?>,<?php echo $crs->fields['products_name'];?>,<?php echo $crs->fields['products_price']."<product></br>";
	
	$crs->movenext();
	}
$rs_big->movenext();
}
?>