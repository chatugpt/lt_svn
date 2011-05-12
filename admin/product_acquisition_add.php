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

if($_GET['action']=="add"){
	$web_name=$_POST['web_name'];
	$cID=$_POST['cID'];
	$coding=$_POST['coding'];
	$replacement=$_POST['replacement'];
	$testurl=$_POST['testurl'];

	$sql="insert into website(web_name,web_cid,web_coding,web_replace,web_test_url) value('$web_name','$cID','$coding','$replacement','$testurl')";
	mysql_query($sql);
	//echo $sql;
	//exit;
	$rs=$db->Execute("select web_id from website order by web_id desc");
	echo "<script>alert('Set up a successful');location.href='product_acquisition_edit.php?id=".$rs->fields['web_id']."';</script>";
}
?>

<form action="?action=add" method="post" name="form_url">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><input type="button" name="Submit2" value="hitstory" onClick="javascript:history.go(-1);" /></td>
    </tr>
  </table>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" id="testTbl2">
    <tr bgcolor="#EFEFEF"> 
      <td width="76">test</td>
      <td width="255">name</td>
      <td width="817"><strong>web url </strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>1</td>
      <td>web name :</td>
      <td><input name="web_name" type="text" id="web_name" size="40"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>2</td>
      <td> web_url</td>
      <td> <input name="testurl" type="text" id="testurl" size="80" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>3</td>
      <td>Id-owned</td>
      <td><input name="cID" type="text" id="cID" value="<?php echo $_GET['cID'];?>"/> 
        * Can not be empty</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>4</td>
      <td>Whether or not to code:</td>
      <td><input name="coding" type="radio" value="1" checked="checked">gb2312
  <input type="radio" name="coding" value="0">uft-8</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>5</td>
      <td>To replace the contents of:</td>
      <td><textarea name="replacement" cols="40" rows="5" id="replacement"></textarea>
        <br>
      Multiple use, "" separation of special characters in front of Canada "\"</td>
    </tr>
  </table>
  <br />
  <table width="800" border="0" align="center">
    <tr> 
      <td colspan="4" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit42" value="Access to the rules set" /> </td>
    </tr>
  </table>
</form>
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>