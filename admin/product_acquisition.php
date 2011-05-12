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
	  		$db->Execute("delete from website where web_id=".$id);
			header('location:?search='.$search.'&sort='.$sort.'');
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
<script>
function ConfirmDel()
{
   if(confirm("Determined to delete it?"))
     return true;
   else
     return false;
	 
}
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
$sql = "select * from website where web_name like '%".$search."%'";
}else{
$sql = "select * from website";
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
	$sort="web_date desc";
}


$sql .= " order by " .$sort; 
$sql .= " limit $fristNum, $pageSize "; 

$rs = $db->Execute($sql);
$count = $rs->RecordCount();
?>
<form action="" method="get" name="form_url">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="pageHeading">Extras / product - acquisition&nbsp;&nbsp;(count:<?php echo $count;?>)</td>
    <td class="pageHeading" align="right"><img src="images/pixel_trans.gif" border="0" alt="" width="1" height="42"></td>
    <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td class="smallText" align="right">
          Search:
          <input name="search" type="text" value="<?php echo $search;?>">        </td>
      </tr>
      
    </table></td>
  </tr>
</table>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <!-- body_text //-->
    <td width="7%" height="18" valign="top" bgcolor="#d7d6cc">ID</td>
    <td width="20%" valign="top" bgcolor="#d7d6cc">web name </td>
    <td width="32%" valign="top" bgcolor="#d7d6cc">web url </td>
    <td width="10%" valign="top" bgcolor="#d7d6cc">web class id </td>
    <td width="13%" valign="top" bgcolor="#d7d6cc">add date </td>
    <td width="18%" valign="top" bgcolor="#d7d6cc">Action</td>
    <!-- body_text_eof //-->
  </tr>
  <?php while (!$rs->EOF){?>
  <tr class="dataTableRow" onMouseOver="rowOverEffect(this)" onMouseOut="rowOutEffect(this)">
    <td valign="top"><?php echo $rs->fields['web_id'];?></td>
    <td valign="top"><?php echo $rs->fields['web_name'];?></td>
    <td valign="top"><a href="<?php echo $rs->fields['web_test_url'];?>" target="_blank"><?php echo $rs->fields['web_test_url'];?></a></td>
    <td valign="top"><?php echo $rs->fields['web_cid'];?></td>
    <td valign="top"><?php echo $rs->fields['web_date'];?></td>
    <td valign="top"><a href="?action=del&id=<?php echo $rs->fields['web_id'];?>&search=<?php echo $search;?>" onClick="return ConfirmDel();"><img src="images/icon_delete.gif" border="0"></a> 
	<?php echo '<a href="' . zen_href_link(product_acquisition_edit, 'id=' . $rs->fields['web_id'] . '') . '">' . zen_image(DIR_WS_IMAGES . 'icon_edit.gif', ICON_EDIT) . '</a>'; ?></td>
  </tr>
  <?php 
  $rs->MoveNext();
  }
?>
</table>
<!-- body_eof //-->
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="center"><label>
      <input name="Submit" type="button" class="s_select" value="add new" onclick="javascript:location.href='product_acquisition_add.php';">
    </label></td>
  </tr>
  <tr>
    <td height="30" align="center"><?php 
echo "count:".$pageNum." page | "; 
echo $pageString;
?></td>
  </tr>
</table>
<!-- footer_eof //-->
</form>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>