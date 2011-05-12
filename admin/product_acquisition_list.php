<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: product.php 6131 2007-04-08 06:56:51Z drbyte $
 */
  require('includes/application_top.php');
  
  require('acquisition/product_price_update.php'); //update save

  require(DIR_WS_MODULES . 'prod_cat_header_code.php');
  $cID = (int)$_GET['cID'];
  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  $search = trim($_GET['search']);
  $sort = $_GET['sort'];
  $rn = $_GET['rn'];

  if (is_dir(DIR_FS_CATALOG_IMAGES)) {
    if (!is_writeable(DIR_FS_CATALOG_IMAGES)) $messageStack->add(ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE, 'error');
  } else {
    $messageStack->add(ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST, 'error');
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script language="javascript" src="includes/javascript/common.js"></script>
<script language="javascript" src="includes/javascript/multifile.js"></script>

<script type="text/javascript">
String.prototype.toProperCase = function()
{
  return this.toLowerCase().replace(/^(.)|\s(.)/g, 
      function($1) { return $1.toUpperCase(); });
}
</script>
<script type="text/javascript">
<!--
<!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
if (typeof _editor_url == "string") HTMLArea.replaceAll();
 }
 // -->

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<style type="text/css">
<!--
.input_bg_red {
	background-color: #FF3333;
}
-->
</style>
</head>
<body onLoad="init()">
<script language="javascript" src="acquisition/ajax.js"></script>
<script language="javascript" src="acquisition/function.js"></script>
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<?php 
if($cID == ""){
echo "'cID' Can not be empty <input type=\"button\" name=\"Submit2\" value=\"hitstory\" onClick=\"javascript:history.go(-1);\" />";
exit;
}

$sql_page = "select * from categories where parent_id=".$cID;
$rs_page = $db->Execute($sql_page);

$num=$rs_page->RecordCount(); 
if(isset($_GET['rn']) && $_GET['rn']!=""){
	$pageSize=$_GET['rn'];
}else{
	$pageSize=5; 
}
 
if(isset($_GET['page'])) 
{ 
$page=intval($_GET['page']); 
} 
else 
{ 
$page=1; 
} 
if($num) 
{ 
if($num<$pageSize) 
{ 
$pageNum=1; //Ö»ÓÐÒ»Ò³ 
} 
if($num % $pageSize) 
{ 
$pageNum=(int)($num/$pageSize)+1; 
} 
else 
{ 
$pageNum=$num/$pageSize; 
} 
} 
else 
{ 
$pageNum=0; 
}
$url = 'cID='.$cID.'&rn='.$rn.'';
$pageString = ''; 
if( $page == 1 ){ 
$pageString .= 'Home | Previous |'; 
} 
else{ 
$pageString .= '<a href=?page=1&'.$url.'>Home</a> | <a href=?page='.($page-1).'&'.$url.'>Previous</a> | '; 
} 
if( ($page == $pageNum) || ($pageNum == 0) ){ 
$pageString .= 'Next page | Last Page '; 
} 
else{ 
$pageString .= '<a href=?page='.($page+1).'&'.$url.'> Next page</a> | <a href=?page='.$pageNum.'&'.$url.'>Last Page</a>'; 
} 

$fristNum=($page-1)*$pageSize; 

//////////////////////////// -------------------------

$sql_big = "select categories_id from categories where parent_id=".$cID." limit $fristNum, $pageSize";
$rs_big = $db->Execute($sql_big);

$rs_1 = $db->Execute($sql_big);

for($t=0; $t<$rs_big->RecordCount();$t++){

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
<input name="page" type="hidden" value="<?php echo $page;?>">
<input name="rn" type="hidden" value="<?php echo $rn;?>">
<input name="cPath" type="hidden" value="0">
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="55%"><input type="button" name="Submit22" value="hitstory" onClick="javascript:history.go(-1);" />
        <input name="Submit32" type="button" value="Into the set" onClick="javascript:location.href='product_acquisition.php';">
      <input type="submit" name="Submit42" value="update Database" /> number:<?php echo $num;?>
      Total page:<?php echo $page;?>/<?php echo $pageNum;?> Sub-pages:<?php echo $pageSize?></td>
    <td width="18%"><div id="success" style="color:#FF0000;"></div></td>
    <td width="27%" align="right">
      <label></label>
      <input type="button" name="Submit5" value="All function" id="Submit" onClick="<?php echo $test;?>">
    <input type="reset" name="Submit" value="Reset">
	<?php $purl="cID=".$cID.""?>
    <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
      <option value="">Choose</option>
	  <option value="?rn=5&<?php echo $purl;?>">p-5</option>
      <option value="?rn=10&<?php echo $purl;?>">p-10</option>
	  <option value="?rn=15&<?php echo $purl;?>">p-15</option>
	  <option value="?rn=20&<?php echo $purl;?>">p-20</option>
	  <option value="?rn=30&<?php echo $purl;?>">p-30</option>
	  <option value="?rn=100&<?php echo $purl;?>">p-ALL</option>
    </select></td>
  </tr>
</table>
<?php
for($a=0; $a<$rs_big->RecordCount();$a++){
$cID = $rs_big->fields['categories_id'];

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
//$0=document.getElementsByName('tilte<?php echo $a;?>[]');
//$1=document.getElementsByName('price<?php echo $a;?>[]');
//$2=document.getElementsByName('title_keyword<?php echo $a;?>[]');
//$p_name=document.getElementsByName('products_name<?php echo $a;?>[]');
//$p_price=document.getElementsByName('products_price<?php echo $a;?>[]');

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

url="acquisition/ajax.php?url="+testurl;
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
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" id="content">
    <tr>
      <td width="6%" bgcolor="#EFEFEF">No.</td>
      <td width="22%" bgcolor="#EFEFEF">Old-title</td>
      <td width="23%" bgcolor="#EFEFEF">Title</td>
      <td width="15%" bgcolor="#EFEFEF">Old-Price <A href="?sort_by=p.products_price ASC&cID=<?php echo $_GET['cID'];?>&page=<?php echo $page;?>&rn=<?php echo $rn;?>"><IMG title=" Sort Price (inc) - Ascendingly " height="12" alt="Sort Price (inc) - Ascendingly" src="images/icon_up.gif" width="11" border="0"></A> <A href="?sort_by=p.products_price DESC&cID=<?php echo $_GET['cID'];?>&page=<?php echo $page;?>&rn=<?php echo $rn;?>"><IMG title=" Sort Price (inc) - Descendingly " height="12" alt="Sort Price (inc) - Descendingly" src="images/icon_down.gif" width="11" border="0"></A></td>
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
$rs_big->movenext();
}?>
</form>
<!-- footer //-->
<table width="98%" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
<?php 
echo "count:".$pageNum." page | "; 
echo $pageString;
?></td>
  </tr>
</table>
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>