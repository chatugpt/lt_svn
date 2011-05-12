<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: product.php 6131 2007-04-08 06:56:51Z drbyte $
 */

  require('includes/application_top.php');

  require(DIR_WS_MODULES . 'prod_cat_header_code.php');
  $id = (int)$_GET['id'];
  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  $search = trim($_GET['search']);
  $sort = $_GET['sort'];
  
  if (zen_not_null($action)) {
    switch ($action) {
      case 'del':
	  	if(zen_not_null($id)){
	  		$db->Execute("delete from products_keyword where products_keyword_id=".$id);
			header('location:product_keyword.php?search='.$search.'&sort='.$sort.'');
		}
        }
   }
 // check if the catalog image directory exists
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
</script>
</head>
<body onLoad="init()">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<?php
error_reporting(7);
function replace($str){
$str=str_replace("\\","\\\\",$str);
return $str;
}

$id=(int)$_REQUEST['id'];
if($id == "") $id=1;

if($_GET['action']=="add"){

for($i=0;$i<sizeof($_POST['fun_name']);$i++)   
{   
	if($_POST['fun_name'][$i] != ""){
		$fun_name .= $_POST['fun_name'][$i].", ";
	}   
}
$fun_name = substr($fun_name,0,strlen($fun_name)-2);

for($i=0;$i<sizeof($_POST['fun']);$i++)   
{   
	if($_POST['fun'][$i] != ""){
		$fun .= $_POST['fun'][$i].", ";
	}   
}
$fun = substr($fun,0,strlen($fun)-2);

for($i=0;$i<sizeof($_POST['content']);$i++)   
{   
	if($_POST['content'][$i] != ""){
		$content .= $_POST['content'][$i].", ";
	}   
}
$content = substr($content,0,strlen($content)-2);
	$web_name=$_POST['web_name'];
	$cID=$_POST['cID'];
	$coding=$_POST['coding'];
	$replacement=$_POST['replacement'];
	$discount1=$_POST['discount1'];
	$discount2=$_POST['discount2'];
	$testurl=$_POST['testurl'];

	$sql="update website set web_name='$web_name',web_cid='$cID',web_coding='$coding',web_replace='$replacement',web_fun_name='$fun_name',web_fun_content='$fun',web_fun_remarks='$content',web_fun_a='$discount1',web_fun_b='$discount2',web_test_url='$testurl' where web_id=".$id;
	//$sql="update website set web_test_url='123123'";
	mysql_query($sql);
	//echo $sql;
	//exit;
	echo "<script>alert('Set up a successful');location.href='?id=".$id."';</script>";
}

$sql = "select * from website where web_id=".$id;
$rs = mysql_query($sql);

$web_name = mysql_result($rs,0,"web_name");
$coding = mysql_result($rs,0,"web_coding");
$cID = mysql_result($rs,0,"web_cid");
$fun_name = mysql_result($rs,0,"web_fun_name");
$fun = mysql_result($rs,0,"web_fun_content");
$content = mysql_result($rs,0,"web_fun_remarks");
$replacement = mysql_result($rs,0,"web_replace");
$discount1 = mysql_result($rs,0,"web_fun_a");
$discount2 = mysql_result($rs,0,"web_fun_b");
$testurl = mysql_result($rs,0,"web_test_url");
//$testurl = str_replace("&","||||||",str_replace("?","______",$testurl));
$arr_fun_name = split(", ",$fun_name);
$arr_fun = split(", ",$fun);
$arr_content = split(", ",$content);

?>

<script language="javascript" src="acquisition/ajax.js"></script>
<script language="javascript" src="acquisition/function.js"></script>


<script language="javascript"> 
function addRow(){
var tmp = 0;
for (i=0; i<document.all.length; i++) if (document.all[i].name == "fun") tmp++;

var newTr = testTbl.insertRow(); 
newTr.bgColor = '#ffffff'; 
var newTd0 = newTr.insertCell(); 
var newTd1 = newTr.insertCell(); 
var newTd2 = newTr.insertCell(); 
var newTd3 = newTr.insertCell(); 
var newTd4 = newTr.insertCell(); 
newTd0.innerText = tmp+1; 
newTd1.innerHTML = "<input name='fun_name[]' type='text' id='fun_name[]' size='25'>";
newTd2.innerHTML= "<input name='fun[]' type='text' id='fun[]' size='60'>";
newTd3.innerHTML= "<input name='content[]' type='text' id='content[]' size='15'>";
newTd4.innerHTML= "<input type='button' name='Submit' value='test_function' onclick='Test(this.id)' id="+tmp+">";
}

function del(){
var tmp = 0;
for (i=0; i<document.all.length; i++) if (document.all[i].name == "fun[]") tmp++

var obj=document.getElementById("testTbl");
if(tmp > 1) obj.deleteRow(tmp); 
}

// Collection contains address? Replaced by the ______ 
// Collection contains the address of the replaced & |||||| 
// Collection page if it is not utf-8 format, with the need for a & c = 1 the parameters will automatically do the conversion work gb2312 
// After each url please getRnd () parameter, this is a random parameter to avoid caching the content every time a new value (do not check the cache's value) 
// common / ajax.asp? url = This is to be used for cross-domain php program

function Test(s){
var testurl="<?php echo $testurl;?>";
var url;
var arr,arr_div;
var info=new Array();
var i = document.getElementById("no").value;
var fun = document.getElementsByName("fun[]")[s].value;

url="acquisition/ajax.php?url="+testurl;
var content=sendUrl(url+"&c=<?php echo $coding;?>"+getRnd());
	//content=get_replacement(content,"?php echo $replacement;?>");
	<?php echo $discount1."\n";?>
	<?php echo $discount2."\n";

		for($i=0; $i<count($arr_fun_name); $i++){
		echo "info[".$i."]=".$arr_fun[$i].";\n";
		}
		?>
	alert(eval(fun));
}
</script> 
<form action="?action=add" method="post" name="form_url">
<input name="id" type="hidden" value="<?php echo $id;?>">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><input type="button" name="Submit2" value="hitstory" onClick="javascript:history.go(-1);" /><input type="button" name="Submit3" value="Into the collection" onClick="javascript:location.href='product_acquisition_arr.php?cID=<?php echo $cID;?>';" /></td>
    </tr>
  </table>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" style="line-height:1.6;">
    <tr> 
      <td width="328" valign="top" bgcolor="#FFFFFF" >get_a(arr[i])<br>
        ClearHtmlTag(arr[i]) <br>
        getResult(content,s1,s2)<br>
        get_email(content) <br>
        get_tel(content) <br />
        get_qq_str(content)<br />
        arr=content.split(&quot;&lt;div class=\&quot;Shop\&quot;&gt;&quot;); <br />
      arr_div = arr[i].split(&quot;&lt;/div&gt;&quot;);</td>
      <td width="337" valign="top" bgcolor="#FFFFFF">function get_href(value)<br />
        get_title(content) <br />
        get_url(url) <br />
        filter_text(content) <br />
        arr[8].replace(&quot;biaobei&quot;,&quot;&quot;) <br />
        get_link_text(value) <br />
      pages(url,c)</td>
      <td width="511" valign="top" bgcolor="#FFFFFF">http://www.gamelee.com/dofus-amayiro-gold-10_1248.html<br>
        arr=content.split(&quot;&lt;td class=\&quot;productListing-data\&quot;&gt;&quot;);<br>
        arr_div=content.split(&quot;&lt;td class=\&quot;productListing-data\&quot; align=\&quot;right\&quot;&gt;&quot;);<br>
        <br>
        ClearHtmlTag(get_a(arr[i])[0])<br>
      arr_div[i].split(&quot;&lt;&quot;)[0]<br>
      str_digital(ClearHtmlTag(get_a(arr[i])[0]))</td>
    </tr>
  </table>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" id="testTbl2">
    <tr bgcolor="#EFEFEF"> 
      <td width="76">test</td>
      <td width="255">name</td>
      <td width="817"><strong> web url </strong></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>1</td>
      <td> test web </td>
      <td> <input name="testurl" type="text" id="testurl" value="<?php echo $testurl;?>" size="80" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>2</td>
      <td>num</td>
      <td><input name="no" type="text" id="no" value="2" />
      cID
      <input name="cID" type="text" class="input_bg_red" id="cID" value="<?php echo $cID;?>" /></td>
    </tr>
  </table>
  <br />
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" id="testTbl2">
    <tr bgcolor="#EFEFEF"> 
      <td width="76">No.</td>
      <td width="255">Decomposition of the name</td>
      <td width="718">Decomposition function </td>
      <td width="88">test</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>1</td>
      <td> for Above arr</td>
      <td> <textarea name="discount1" cols="60" rows="3" id="discount1"><?php echo htmlentities($discount1);?></textarea></td>
      <td> <input type="button" name="Submit6" value="test" id="Submit6" onClick="" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>2</td>
      <td>for Within arr_div</td>
      <td><input name="discount2" type="text" id="discount2" value="<?php echo htmlentities($discount2);?>" size="80" /></td>
      <td><input type="button" name="Submit62" value="test" id="Submit62" onClick="" /></td>
    </tr>
  </table>
  <br />
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" id="testTbl">
    <tr bgcolor="#EFEFEF">
      <td width="76">No.</td>
      <td width="261">Function name</td>
      <td width="530">Function</td>
      <td width="189"><DIV id="result_box" dir="ltr">Remarks</DIV></td>
      <td width="98">test</td>
    </tr>
    <?php for($i=0; $i<count($arr_fun_name); $i++){?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $i+1;?></td>
      <td> <p>
        <input name="fun_name[]" type="text" id="fun_name[]" size="30" value="<?php echo $arr_fun_name[$i];?>">
      </p>
      </td>
      <td> <input name="fun[]" type="text" id="fun[]" size="60" value="<?php echo  htmlentities($arr_fun[$i]);?>"></td>
      <td> <input name="content[]" type="text" id="content[]" size="15" value="<?php echo $arr_content[$i];?>"></td>
      <td> <input type="button" name="Submit" value="test_function" id="<?php echo $i;?>" onClick="Test(this.id);"></td>
    </tr>
    <?php }?>
  </table>
  <table width="800" border="0">
    <tr> 
      <td colspan="4" align="center" bgcolor="#FFFFFF"> <input type="button" name="Submit5" value="Increase " onClick="addRow();"> 
        <input type="button" name="Submit52" value="Reduce" onClick="del();">
         
        <input type="submit" name="Submit42" value="save" /> </td>
    </tr>
  </table>
  <br>
  <table width="98%" height="156" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#FFFFFF"> 
      <td width="24%">web name :</td>
      <td width="76%"><input name="web_name" type="text" id="web_name" size="40" value="<?php echo $web_name;?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>Whether or not to code:</td>
      <td><input name="coding" type="radio" value="1" checked="checked">
        gb2312 
          <input type="radio" name="coding" value="0">
        uft-8</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>To replace the contents of:</td>
      <td><textarea name="replacement" cols="40" rows="5" id="replacement"><?php echo $replacement;?></textarea> 
        <br>
        Multiple use, "" separation of special characters in front of Canada "\"</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit4" value="save"></td>
    </tr>
  </table>

<?php function Menu(){?>
<input name="fun_name" type="text" value="<%=arr_fun_name(i)%>" />
<?php }?>
</form>
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>