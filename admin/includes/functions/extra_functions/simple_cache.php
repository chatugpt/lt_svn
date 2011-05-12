<?php
/**
 * Simple SEO URL
 * @Version: Alpha 2.2c
 * @Authour: yellow1912
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */ 
require_once(DIR_FS_CATALOG.'includes/classes/simpleCacheCore.class.php');
require_once(DIR_FS_CATALOG.'includes/classes/simpleCacheZen.class.php');
class SimpleCacheManager extends SimpleCache {
	
	protected static $file_counter;
	// TODO: chmod if needed
	protected function SureRemoveDir($dir, $DeleteMe) {
		global $messageStack;
	    if(!$dh = @opendir($dir)){
	    	$messageStack->add("Could not open dir $dir", 'warning');
	    	return;
	    }
	    while (false !== ($obj = readdir($dh))) {
	        if($obj=='.' || $obj=='..') continue;
	        if (!@unlink($dir.'/'.$obj)) self::SureRemoveDir($dir.'/'.$obj, false);
	        else self::$file_counter++;
	    }
	
	    closedir($dh);
	    if ($DeleteMe){
	        @rmdir($dir);
	    }
	}
	
	function resetCache(){
		global $messageStack;
		if(!@is_writable(self::$cache_folder))
			$messageStack->add(self::$cache_folder." folder is not writable", 'error');
		self::SureRemoveDir(self::$cache_folder, false);
		return self::$file_counter;
	}
}