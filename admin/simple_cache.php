<?php
/**
 * Simple SEO URL
 * $Author: yellow1912 $
 * $Rev: 213 $
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */ 

require('includes/application_top.php');
require_once(DIR_WS_CLASSES.'module_installer.php');
$module_installer = new module_installer();
$module_installer->set_module('yellow1912_sc');
$module_installer->upgrade_module();

$yclass = new yclass();
$yclass->init_template();
$yclass->init_validation();

$ytemplate = new ytemplate();
$ytemplate->admin_set_base();
$ytemplate->build_name();
$ytemplate->zen_admin_set_path();

switch($_GET['action']){
	case 'reset_cache':		
		$ytemplate->set('file_counter', SimpleCacheManager::resetCache());
	break;
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
<script language="javascript" src="../js/dynamic_input_field.js"></script>
<style type='text/css'>
.submit_link {
 color: #0000ff;
 background-color: transparent;
 text-decoration: none;
 border: none;
}
</style>

</head>
<body onLoad="init()">
<!-- header //-->
<div class="header_area">
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
</div>
<!-- header_eof //-->
<fieldset>
	<legend>Instruction</legend>
	Simple Cache stores block/page content in /cache/simple_cache. From time to time, you may want to manually clean up the cache.
</fieldset>
<fieldset>
	<legend>Basic Functions</legend>
	Reset all cache: <a href="<?php echo zen_href_link(FILENAME_SIMPLE_CACHE,'action=reset_cache'); ?>">Click here</a><br />
</fieldset>

<?php $ytemplate->render(); ?>

<!-- footer //-->
<div class="footer-area">
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
</div>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>