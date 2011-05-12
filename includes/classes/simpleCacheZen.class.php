<?php
 /*
 * @package general
 * @author yellow1912
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
	class SimpleCache extends OutputCache {
		
//		protected static $intervals = array();
		protected static $cache_folder;	 
		
		public static function init(){
			self::$gzip_level = ((int)SIMPLE_CACHE_GZIP_LEVEL >= 0 && (int)SIMPLE_CACHE_GZIP_LEVEL <= 9) ? (int)SIMPLE_CACHE_GZIP_LEVEL : 0;
			
//			self::$intervals['default'] = (int)SIMPLE_CACHE_DEFAULT_TIME;
			
//			$cache_block_intervals = explode(',', SIMPLE_CACHE_BLOCK_TIME);
//			foreach($cache_block_intervals as $cache_block_interval){
//				$interval = explode(':', $cache_block_interval);
//				self::$intervals[$cache_block_interval[0]] = (int)$cache_block_interval[1];
//			}
			self::$cache_folder = DIR_FS_SQL_CACHE.'/simple_cache/';
			self::setStore(self::$cache_folder);
		}
		
		public static function startBlock($id, $change_on_page = true, $post_safe = false, $cache_time = -1){
			if(SIMPLE_CACHE_STATUS == 'false' || ($post_safe && $_SERVER["REQUEST_METHOD"] == 'POST'))
				return false;
			if($change_on_page) $id .=  getenv('REQUEST_URI');
			$cache_time = ($cache_time > 0) ? $cache_time : (int)SIMPLE_CACHE_DEFAULT_TIME;
			return self::Start('blocks', $id, $cache_time);
		}
		
		public static function startPage($post_safe = false, $cache_time = -1){
			if(SIMPLE_CACHE_STATUS == 'false' || ($post_safe && $_SERVER["REQUEST_METHOD"] == 'POST'))
				return false;
			$cache_time = ($cache_time > 0) ? $cache_time : (int)SIMPLE_CACHE_DEFAULT_TIME;
			return self::Start('pages', getenv('REQUEST_URI'), (int)SIMPLE_CACHE_DEFAULT_TIME);
		}
	}
	
	SimpleCache::init();