<?php
/**
 * Simple Cache
 * @Version: Alpha 1
 * @Authour: yellow1912
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */ 
if (!defined('IS_ADMIN_FLAG')) {
	die('Illegal Access');
}
	$autoLoadConfig[80][] = array('autoType'=>'class', 'loadFile'=>'simpleCacheCore.class.php');
	$autoLoadConfig[80][] = array('autoType'=>'class', 'loadFile'=>'simpleCacheZen.class.php');
?>