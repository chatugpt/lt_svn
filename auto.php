<?php
set_time_limit(0);

include('includes/application_top.php');

  
if(isset($_GET['action']) && $_GET['action'] == "update"){
$cID=$_POST['cID'];

for($i=0;$i<sizeof($_POST['products_id']);$i++){
	$p_id = (int)$_POST['products_id'][$i];
	$p_price = $_POST['price'][$i];
	
	if($p_id > 0 && isset($_POST['price'][$i]) && $p_price != ""){
		$sql="update products set products_price=".$p_price." where products_id = ".$p_id;	
	$db->Execute($sql);
	}
}?>

<script>
	parent.window.opener=null;
	parent.window.open("","_self");
	parent.window.close();
</script>

<?php
exit;
}

  $cID = (int)$_GET['cID'];
  $action = (isset($_GET['action']) ? $_GET['action'] : '');
?>
<script language="javascript" src="adminpanel/acquisition/ajax.js"></script>
<script language="javascript" src="adminpanel/acquisition/function.js"></script>

<?php 
if($cID == ""){
echo "'cID' Can not be empty <input type=\"button\" name=\"Submit2\" value=\"hitstory\" onClick=\"javascript:history.go(-1);\" />";
exit;
}


$sql_big = "select categories_id from categories where parent_id=".$cID."";
$rs_big = mysql_query($sql_big);
$rs_1 = $db->Execute($sql_big);


for($t=0; $t<$rs_1->RecordCount();$t++){
$sql_test = "select * from website where web_cid=". $rs_1->fields['categories_id'];
$rs_test = $db->Execute($sql_test);

if($rs_test->RecordCount() != 0){
	$test .= "Test".$t."();";
	}
	$rs_1->movenext();
}
?>

<form action="?action=update" method="post" name="form_url">
<input name="cID" type="hidden" value="<?php echo $cID;?>">
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="55%"><input type="submit" name="Submit42" value="update Database" /></td>
    <td width="18%"><div id="success" style="color:#FF0000;"></div></td>
    <td width="27%" align="right">

      <input type="button" name="Submit5" value="All function" id="Submit" onClick="<?php echo $test;?>">
      <?php $purl="cID=".$cID.""?></td>
  </tr>
</table>
<?php
for($a=0; $a<$rs_1->RecordCount();$a++){
$cID = mysql_result($rs_big,$a,"categories_id");

$c_name = $db->Execute("select categories_name from categories_description where categories_id=".$cID);
$categories_name = $c_name->fields['categories_name'];
 
$sql = "select * from website where web_cid=".$cID;
$rs = mysql_query($sql);
if(MYSQL_NUMROWS($rs) == 0){
	echo "<div style='margin-left:10px; color: #FF0000;'>".$cID." 'cID' Can not be empty <a href=product_acquisition_add.php?cID=".$cID.">Enter</a></div>";
}else{
	$web_name = mysql_result($rs,0,"web_name");
	$coding = mysql_result($rs,0,"web_coding");
	$fun_name = mysql_result($rs,0,"web_fun_name");
	$fun = mysql_result($rs,0,"web_fun_content");
	$content = mysql_result($rs,0,"web_fun_remarks");
	$replacement = mysql_result($rs,0,"web_replace");
	$discount1 = mysql_result($rs,0,"web_fun_a");
	$discount2 = mysql_result($rs,0,"web_fun_b");
	$testurl = mysql_result($rs,0,"web_test_url");
	$arr_fun_name = split(", ",$fun_name);
	$arr_fun = split(", ",$fun);
	$arr_content = split(", ",$content);?>
	
	<script language="javascript">
function addRow<?php echo $a;?>(info){
$0=document.all('tilte<?php echo $a;?>[]');
$1=document.all('price<?php echo $a;?>[]');
$2=document.all('title_keyword<?php echo $a;?>[]');
$p_name=document.all('products_name<?php echo $a;?>[]');
$p_price=document.all('products_price<?php echo $a;?>[]');

//alert(document.all('products_name0[]').length);

for(i=0; i<$p_name.length; i++){
	//if($p_name[i].value.indexOf(info[2]) > -1){
	if(str_digital($p_name[i].value) == info[2] ){          //&& $0[i].value == ""
		$0[i].value = info[0];
		$1[i].value = info[1].replace("$","").replace(/,/g,"");
		$2[i].value = info[2];
		$price = 1-($p_price[i].value / $1[i].value.replace("$",""));
		if(($price > 0.1 || $price< -0.1) && ($price != 1)){
			//alert($price);
			$p_price[i].className='input_bg_red';
		}
	}
}
}

function Test<?php echo $a;?>(){
var testurl="<?php echo $testurl;?>";
var url;
var arr,arr_div;
var info=new Array();

url="adminpanel/acquisition/ajax.php?url="+testurl;
var content=sendUrl(url+"&c=<?php echo $coding;?>"+getRnd());
	//content=get_replacement(content,"?php echo $replacement;?>");
	<?php echo $discount1."\n";?>
	<?php echo $discount2."\n";?>
for(var i=1;i<arr.length;i++){
 <?php for($i=0; $i<count($arr_fun_name); $i++){
		echo "info[".$i."]=".$arr_fun[$i].";\n";
		}
		?>
		if(info[1].substring(0,1) == "$"){
			addRow<?php echo $a;?>(info);
		}	
  }
  //alert(info);
  document.getElementById('success').innerHTML = "<b>---O K---</b>";
}
</script> 

<?php 
}
?>



  <table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="55%">[<?php echo $a+1;?>] <b><?php echo $categories_name;?></b>&nbsp;<a href="<?php echo $testurl;?>" target="_blank"><?php echo $testurl;?></a></td>
    </tr>
  </table>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" id="content" style="display:none;">
    <tr>
      <td width="6%" bgcolor="#EFEFEF">No.</td>
      <td width="22%" bgcolor="#EFEFEF">Old-title</td>
      <td width="23%" bgcolor="#EFEFEF">Title</td>
      <td width="15%" bgcolor="#EFEFEF">Old-Price</td>
      <td width="16%" bgcolor="#EFEFEF">Price</td>
      <td width="18%" bgcolor="#EFEFEF">Title-Which</td>
    </tr>
	<?php 
	$sql = "select products_price,products_name,p.products_id from products p,products_description pd where p.products_id=pd.products_id and master_categories_id=".$cID." and language_id=1";
	if($_GET['sort_by']<>""){
	$sql .= " order by ".$_GET['sort_by'];
	}
	$crs = $db->Execute($sql);
	for($i=0; $i<$crs->RecordCount();$i++){
	?>
	<tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#EFEFEF'" onMouseOut="this.bgColor='#ffffff'">
      <td width="6%"><input name="products_id[]" type="text" id="products_id[]" value="<?php echo $crs->fields['products_id'];?>" size="10" ></td>
      <td width="22%"><input name="products_name<?php echo $a;?>[]" type="text" id="products_name<?php echo $a;?>[]" value="<?php echo $crs->fields['products_name'];?>" size="40"></td>
      <td width="23%"><input name="tilte<?php echo $a;?>[]" type="text" id="tilte<?php echo $a;?>[]" size="40"></td>
      <td width="15%" bgcolor="#B9CFFF"><input name="products_price<?php echo $a;?>[]" type="text" id="products_price<?php echo $a;?>[]" value="<?php echo $crs->fields['products_price'];?>"></td>
      <td width="16%"><input name="price[]" type="text" id="price<?php echo $a;?>[]"></td>
      <td width="18%"><input name="title_keyword<?php echo $a;?>[]" type="text" id="title_keyword<?php echo $a;?>[]"></td>
    </tr>
	<?php 
	$crs->movenext();
	}?>
  </table>
<?php 
}?>
</form>
<script><?php echo $test;?></script>

<script>document.form_url.submit();</script>

