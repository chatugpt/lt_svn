<?php
/**
 * @package admin profiles
 * @copyright Copyright kuroi web design 2006-2007
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: modules_dhtml.php - amendment for Admin Profiles 2007-01-03 by kuroi
 */
require('includes/application_top.php');

if ($_GET['action']=='save'){ // if changes to adminID's profile are being saved

	// This section updates the dB as menu headers are turned on and off for this adminID
	$headers = $db->Execute("select * from ".TABLE_ADMIN_MENU_HEADERS);
	while (!$headers->EOF){
		$field = '';
		$field = $_POST[$headers->fields['header']];
		$althere = $db->Execute("select * from ".TABLE_ADMIN_VISIBLE_HEADERS." where header_id = '".$headers->fields['id']."' and admin_id = '".$_GET['adminID']."'"); 
		if ($field == 'on' || $field == 'off'){
			if ($althere->fields['header_id'] == ''){$query = $db->Execute("insert into ".TABLE_ADMIN_VISIBLE_HEADERS." set header_id = '".$headers->fields['id']."', admin_id = '".$_GET['adminID']."'");}
		}else{
			if ($althere->fields['header_id'] != ''){$query = $db->Execute("delete from ".TABLE_ADMIN_VISIBLE_HEADERS." where header_id = '".$headers->fields['id']."' and admin_id = '".$_GET['adminID']."'");}
		}
		$headers->MoveNext();
	}

	// This section updates the dB for those pages who are being allowed or disallowed for adminID
		$pages = $db->Execute("select * from ".TABLE_ADMIN_FILES);
	while (!$pages->EOF){
		$field = '';
		$field = $_POST[str_replace(' ', '_', $pages->fields['page'])];
		//echo 'FIELD = ' . $field;
		$althere = $db->Execute("select * from ".TABLE_ADMIN_ALLOWED_PAGES." where page_id = '".$pages->fields['id']."' and admin_id = '".$_GET['adminID']."'");
		if ($field == 'on' || $field == 'off'){
			if ($althere->fields['page_id'] == ''){$query = $db->Execute("insert into ".TABLE_ADMIN_ALLOWED_PAGES." set page_id = '".$pages->fields['id']."', admin_id = '".$_GET['adminID']."'");}
		}else{
			if ($althere->fields['page_id'] != ''){$query = $db->Execute("delete from ".TABLE_ADMIN_ALLOWED_PAGES." where page_id = '".$pages->fields['id']."' and admin_id = '".$_GET['adminID']."'");}
		}
	$pages->MoveNext();
	}
  
  // This section updates the dB for those categories who are being allowed or disallowed for adminID
		$categories = $db->Execute("select c.categories_id, cd.categories_name, c.parent_id
                                  from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd
                                  where c.categories_id = cd.categories_id
                                  and cd.language_id = '1'");
                                
	while (!$categories->EOF){
		$field = '';
		$field = $_POST['category_'.$categories->fields['categories_id']];
		
		$althere = $db->Execute("select * from ".TABLE_ADMIN_ALLOWED_CATEGORIES." where categories_id = '".$categories->fields['categories_id']."' and admin_id = '".$_GET['adminID']."'");
		if ($field == 'on' || $field == 'off'){
			if ($althere->fields['categories_id'] == ''){$query = $db->Execute("insert into ".TABLE_ADMIN_ALLOWED_CATEGORIES." set categories_id = '".$categories->fields['categories_id']."', admin_id = '".$_GET['adminID']."'");}
		}else{
			if ($althere->fields['categories_id'] != ''){$query = $db->Execute("delete from ".TABLE_ADMIN_ALLOWED_CATEGORIES." where categories_id = '".$categories->fields['categories_id']."' and admin_id = '".$_GET['adminID']."'");}
		}
	$categories->MoveNext();
	}
	
	// recursive call to this routine in order to display page showing the revised user profile
	header("Location: admin_control.php?adminID=".$_GET['adminID']);

}else{

// Display page allowing updates to user profiles
?><!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<link rel="stylesheet" type="text/css" href="includes/admin_profiles.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script type="text/javascript">
<!--
function init(){
	cssjsmenu('navbar');
	if (document.getElementById){
		var kill = document.getElementById('hoverJS');
		kill.disabled = true;
	}
}

function checkAll(form,header,value){
	for (var i = 0; i < form.elements.length; i++){   
    	if (form.elements[i].className == header){
			form.elements[i].checked = value;
		}
	}
}
// -->
</script>
</head>
<body onLoad="init()">
<?php
require(DIR_WS_INCLUDES . 'header.php');

$adminID = $_GET['adminID'];
$admin = $db->Execute("select admin_name from " . TABLE_ADMIN . " where admin_id = " . $adminID); // read user name to display in Admin Profiles header
?>

<div id="profileHeader">
	<div id="profileName"><?php echo 'Admin Profile for '.$admin->fields['admin_name'] ?></div>
	<div id="profileFunctions"><a href="<?php echo zen_href_link(FILENAME_ADMIN)?>">Update another user</a></div>
</div>
<form id="profileBoxes" name="profileBoxes" action="admin_control.php?adminID=<?php echo $adminID; ?>&amp;action=save" method="post">
<div class="formButtons"><input type="submit" value="Save Changes"><input type="reset" value="Cancel Changes"></div>

<?php

  // read in list of all valid menu headers from dB ex. 3rd party mods and display headers and checkboxes for their pages
  $headers_defined = $db->Execute("select * from " . TABLE_ADMIN_MENU_HEADERS . " where id > 0 and id <> 21 order by id"); 
  display_profiles($headers_defined, $adminID);
  
  // read in name of header for 3rd party mods and display checkboxes for any relevant pages
  $headers_undefined = $db->Execute("select * from " . TABLE_ADMIN_MENU_HEADERS . " where id = 0"); 
  display_profiles($headers_undefined, $adminID);

  // the same thing as for 3rd party mods, but for categories
  $headers_undefined = $db->Execute("select * from " . TABLE_ADMIN_MENU_HEADERS . " where id = 21"); 
  display_profiles($headers_undefined, $adminID);  
  // (yes, yes. I know that this is ineffficient code, but better code would compromise backward compatibility)
  
?>

<br/>
<p>* indicates pages which do not appear on the admin drop down menus but are called from pages that do</p>
<div class="formButtons"><input type="submit" value="Save Changes"><input type="reset" value="Cancel Changes"></div>
</form>
</body>
</html>
<?php } ?>