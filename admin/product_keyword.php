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
<script>
function ConfirmDel()
{
   if(confirm("Determined to delete it?"))
     return true;
   else
     return false;
	 
}
</script>
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
$url="sort=".$sort."&search=".$search;

if(isset($search) && trim($search) != ""){
$sql = "select * from products_keyword where products_keyword_title like '%".$search."%'";
}else{
$sql = "select * from products_keyword";
}

$result=mysql_query($sql); 
$num=mysql_num_rows($result); 
$pageSize=20; //每页显示的记录数 
if(isset($_GET['page'])) //获取当前页数 
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
$pageNum=1; //只有一页 
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
//////////////////////////// 
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


if(!zen_not_null($sort)){
	$sort="products_keyword_date desc";
}


$sql .= " order by " .$sort; 
$sql .= " limit $fristNum, $pageSize "; 

$rs = $db->Execute($sql);
$count = $rs->RecordCount();
?>
<!-- body //-->
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="pageHeading">Extras / Products-Keyword&nbsp;&nbsp;(count:<?php echo $count;?>)</td>
    <td class="pageHeading" align="right"><img src="images/pixel_trans.gif" border="0" alt="" width="1" height="42"></td>
    <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td class="smallText" align="right"><form name="search" action="product_keyword.php" method="get">
		<input name="sort" type="hidden" value="<?php echo $sort;?>">
          Search:
          <input name="search" type="text" value="<?php echo $search;?>">
        </form>
        </td>
      </tr>
      <tr>
        <td class="smallText" align="right"><?php echo $sort;?>&nbsp;&nbsp;<a href="product_keyword.php"><img src="images/icons/cross.gif" border="0" alt="Status - Disabled" title=" Status - Disabled " width="16" height="16"></a>&nbsp;&nbsp;
              <form name="goto" action="product_keyword.php" method="get">
			  <input name="search" type="hidden" value="<?php echo $search;?>">
                Sort:
                <select rel="dropdown" name="sort" onChange="this.form.submit();">
				  <option value="" SELECTED>SORT</option>
                  <option value="">Desc</option>
                  <option value="Products_KeyWord_id desc">&nbsp;&nbsp;Products_KeyWord_ID&nbsp;&nbsp;</option>
                  <option value="Products_KeyWord_Title desc" >&nbsp;&nbsp;Products_KeyWord_Title&nbsp;&nbsp;</option>
                  <option value="Products_KeyWord_Date desc">&nbsp;&nbsp;Products_KeyWord_Date&nbsp;&nbsp;</option>
                  <option value="Products_KeyWord_Hits desc">&nbsp;&nbsp;Products_KeyWord_Hits&nbsp;&nbsp;</option>
                  <!--<option value="Products_KeyWord_IP desc">&nbsp;&nbsp;Products_KeyWord_IP&nbsp;&nbsp;</option>-->
				  <option value="">Asc</option>
                  <option value="Products_KeyWord_id asc">&nbsp;&nbsp;Products_KeyWord_ID&nbsp;&nbsp;</option>
                  <option value="Products_KeyWord_Title asc" >&nbsp;&nbsp;Products_KeyWord_Title&nbsp;&nbsp;</option>
                  <option value="Products_KeyWord_Date asc">&nbsp;&nbsp;Products_KeyWord_Date&nbsp;&nbsp;</option>
                  <option value="Products_KeyWord_Hits asc">&nbsp;&nbsp;Products_KeyWord_Hits&nbsp;&nbsp;</option>
                  <!--<option value="Products_KeyWord_IP asc">&nbsp;&nbsp;Products_KeyWord_IP&nbsp;&nbsp;</option>-->
                </select>
              </form>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
<!-- body_text //-->
    <td width="10%" height="18" valign="top" bgcolor="#d7d6cc">ID</td>
    <td width="18%" valign="top" bgcolor="#d7d6cc">Products_KeyWord_Title</td>
    <td width="21%" valign="top" bgcolor="#d7d6cc">Products_KeyWord_Date</td>
    <td width="16%" valign="top" bgcolor="#d7d6cc">Products_KeyWord_Hits </td>
    <td width="17%" valign="top" bgcolor="#d7d6cc">Products_KeyWord_IP</td>
    <td width="18%" valign="top" bgcolor="#d7d6cc">Action</td>
    <!-- body_text_eof //-->
  </tr>
  <?php while (!$rs->EOF){?>
  <tr class="dataTableRow" onMouseOver="rowOverEffect(this)" onMouseOut="rowOutEffect(this)">
    <td valign="top"><?php echo $rs->fields['products_keyword_id'];?></td>
    <td valign="top"><?php echo $rs->fields['products_keyword_title'];?></td>
    <td valign="top"><?php echo $rs->fields['products_keyword_date'];?></td>
    <td valign="top"><?php echo $rs->fields['products_keyword_hits'];?></td>
    <td valign="top"><?php echo $rs->fields['products_keyword_ip'];?></td>
    <td valign="top"><a href="?action=del&id=<?php echo $rs->fields['products_keyword_id'];?>&search=<?php echo $search;?>&sort=<?php echo $sort;?>" onclick="return ConfirmDel();"><img src="images/icon_delete.gif" border="0"></a></td>
  </tr>
  <?php 
  $rs->MoveNext();
  }
?>
</table>
<!-- body_eof //-->
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="center">
<?php 
echo "count:".$pageNum." page | "; 
echo $pageString;
?></td>
  </tr>
</table>

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
