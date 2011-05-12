<?php
/*
	+----------------------------------------------------------------------+
	|	Ultimate SEO URLs For Zen Cart, version 2.100                        |
	+----------------------------------------------------------------------+
	|                                                                      |
	|	Derrived from Ultimate SEO URLs v2.1 for osCommerce by Chemo         |
	|                                                                      |
	|	Portions Copyright 2005, Joshua Dechant                              |
	|                                                                      |
	|	Portions Copyright 2005, Bobby Easland                               |
	|                                                                      |
	|	Portions Copyright 2003 The zen-cart developers                      |
	|                                                                      |
	+----------------------------------------------------------------------+
	| This source file is subject to version 2.0 of the GPL license,       |
	| that is bundled with this package in the file LICENSE, and is        |
	| available through the world-wide-web at the following url:           |
	| http://www.zen-cart.com/license/2_0.txt.                             |
	| If you did not receive a copy of the zen-cart license and are unable |
	| to obtain it through the world-wide-web, please send a note to       |
	| license@zen-cart.com so we can mail you a copy immediately.          |
	+----------------------------------------------------------------------+
*/
if (!class_exists('SEO_URL_INSTALLER')) {
	

	class SEO_URL_INSTALLER{	
		var $default_config;
		var $db;
		var $attributes;

		function SEO_URL_INSTALLER() {
			$this->attributes = array();
		
			$x = 0;
			$this->default_config = array();

			$this->default_config['SEO_ENABLED'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar las direcciones SEO?', 'SEO_ENABLED', 'true', 'Activar las direcciones SEO?  Este es un ajuste global y permite desactivar las direcciones SEO completamente.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['SEO_ADD_CPATH_TO_PRODUCT_URLS'] = array(
				'DEFAULT' => 'false',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Agregar el cPath a las direcciones de los productos?', 'SEO_ADD_CPATH_TO_PRODUCT_URLS', 'false', 'Este ajuste agregar� la ruta de categor�as al final de la direcci�n del producto (ejemplo:. - nombre-producto-p-1.html?cPath=xx).', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['SEO_ADD_CAT_PARENT'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Agregar la categor�a padre al inicio de la direcci�n?', 'SEO_ADD_CAT_PARENT', 'true', 'Este ajuste agregar� el nombre de la categor�a padre al inicio de la direcci�n de la categor�a (ejemplo: categoria-padre-c-1.html).', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['SEO_URLS_FILTER_SHORT_WORDS'] = array(
				'DEFAULT' => '0',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Filtrar palabras cortas', 'SEO_URLS_FILTER_SHORT_WORDS', '0', 'Este ajuste permite filtrar de la direcci�n aquellas palabras de longitud inferior o igual al valor indicado.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, NULL)"
			);
			$x++;

			$this->default_config['SEO_URLS_USE_W3C_VALID'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Mostrar direcciones W3C v�lidas (par�metro de cadena)?', 'SEO_URLS_USE_W3C_VALID', 'true', 'Este ajuste permite mostrar direcciones que cumplen con las directrices establecidas por el W3C.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['USE_SEO_CACHE_GLOBAL'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar la cach� SEO para almacenar las consultas?', 'USE_SEO_CACHE_GLOBAL', 'true', 'Este es un ajuste global y permite desactivar completamente la cach�.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['USE_SEO_CACHE_PRODUCTS'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar la cach� para productos?', 'USE_SEO_CACHE_PRODUCTS', 'true', 'Este ajuste permite activar el almacenamiento en cach� para los productos.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
				);
			$x++;

			$this->default_config['USE_SEO_CACHE_CATEGORIES'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar la cach� para categor�as?', 'USE_SEO_CACHE_CATEGORIES', 'true', 'Este ajuste permite activar el almacenamiento en cach� para las categor�as.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['USE_SEO_CACHE_MANUFACTURERS'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar la cach� para los fabricantes?', 'USE_SEO_CACHE_MANUFACTURERS', 'true', 'Este ajuste permite activar el almacenamiento en cach� para los fabricantes.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['USE_SEO_CACHE_ARTICLES'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar la cach� para art�culos?', 'USE_SEO_CACHE_ARTICLES', 'true', 'Este ajuste permite activar el almacenamiento en cach� para los art�culos.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['USE_SEO_CACHE_INFO_PAGES'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar la cach� para las p�ginas de informaci�n?', 'USE_SEO_CACHE_INFO_PAGES', 'true', 'Este ajuste permite activar el almacenamiento en cach� para las p�ginas de informaci�n', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['USE_SEO_REDIRECT'] = array(
				'DEFAULT' => 'true',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Activar las redirecciones autom�ticas?', 'USE_SEO_REDIRECT', 'true', 'Este ajuste autom�ticamente enviar� cabeceras del tipo 301 para redireccionarle desde las direcciones antiguas a las nuevas..', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['SEO_REWRITE_TYPE'] = array(
				'DEFAULT' => 'Rewrite',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Elija el tipo de reescritura de direcciones', 'SEO_REWRITE_TYPE', 'Rewrite', 'Elija el formato que desea para las direcciones SEO.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''Rewrite''),')"
			);
			$x++;

			$this->default_config['SEO_CHAR_CONVERT_SET'] = array(
				'DEFAULT' => '',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Introduzca las conversiones para los caracteres especiales.', 'SEO_CHAR_CONVERT_SET', '', 'Este ajuste permite convertir los carateres especiales.<br /><br />El formato <strong>DEBER�</strong> tener la siguiente forma: <strong>car�cter=>conversi�n,car�cter2=>conversi�n2</strong>', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, NULL)"
			);
			$x++;

			$this->default_config['SEO_REMOVE_ALL_SPEC_CHARS'] = array(
				'DEFAULT' => 'false',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Eliminar todos los caracteres no alfanum�ricos?', 'SEO_REMOVE_ALL_SPEC_CHARS', 'false', 'Este ajuste eliminar� todos aquellos caracteres que no sean letras o n�meros. Esto deber�a ser �til para eliminar todos los caracteres especiales con 1 un solo ajuste.', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, 'zen_cfg_select_option(array(''true'', ''false''),')"
			);
			$x++;

			$this->default_config['SEO_URLS_CACHE_RESET'] = array(
				'DEFAULT' => 'false',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Restablecer la cach� para las direcciones SEO ', 'SEO_URLS_CACHE_RESET', 'false', 'Esto restablecer� la cach� de datos SEO', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), 'zen_reset_cache_data_seo_urls', 'zen_cfg_select_option(array(''reset'', ''false''),')"
			);
			$x++;

			//IMAGINADW.COM
			$this->default_config['SEO_URLS_ONLY_IN'] = array(
				'DEFAULT' => 'index, product_info, products_new, products_all, featured_products, specials, contact_us, conditions, privacy, reviews, shippinginfo, faqs_all, site_map, gv_faq, discount_coupon, page, page_2, page_3, page_4',
				'QUERY' => "INSERT INTO `".TABLE_CONFIGURATION."` VALUES ('', 'Introduzca las p�ginas para permitir la reescritura', 'SEO_URLS_ONLY_IN', 'index, product_info, products_new, products_all, featured_products, specials, contact_us, conditions, privacy, reviews, shippinginfo, faqs_all, site_map, gv_faq, discount_coupon, page, page_2, page_3, page_4', 'Este ajuste permitir� activar la reescritura de direcciones solo en las p�ginas indicadas. Si deja este ajuste en blanco, todas las p�ginas seran reescritas. <br /><br />El formato <strong>DEBER�</strong> tener la siguiente forma: <strong>pagina1,pagina2,pagina3</strong>', GROUP_INSERT_ID, ".$x.", NOW(), NOW(), NULL, NULL)"
			);
			$x++;

			$this->db = &$GLOBALS['db'];

			$this->init();
		}
	
/**
 * Initializer - if there are settings not defined the default config will be used and database settings installed. 
 * @author Bobby Easland 
 * @version 1.1
 */	
	function init() {
		foreach( $this->default_config as $key => $value ){
			$container[] = defined($key) ? 'true' : 'false';
		} # end foreach
		$this->attributes['IS_DEFINED'] = in_array('false', $container) ? false : true;
		switch(true){
			case ( !$this->attributes['IS_DEFINED'] ):
				$this->eval_defaults();
				$sql = "SELECT configuration_key, configuration_value  
						FROM " . TABLE_CONFIGURATION . " 
						WHERE configuration_key LIKE '%SEO%'";
				$result = $this->db->Execute($sql);
				$num_rows = $result->RecordCount();
				$this->attributes['IS_INSTALLED'] = (sizeof($container) == $num_rows) ? true : false;
				if ( !$this->attributes['IS_INSTALLED'] ){
					$this->install_settings(); 
				}
				break;
			default:
				$this->attributes['IS_INSTALLED'] = true;
				break;
		} # end switch
	} # end function
	
/**
 * This function evaluates the default serrings into defined constants 
 * @author Bobby Easland 
 * @version 1.0
 */	
	function eval_defaults(){
		foreach( $this->default_config as $key => $value ){
			define($key, $value['DEFAULT']);
		} # end foreach
	} # end function

/**
 * This function removes the database settings (configuration and cache)
 * @author Bobby Easland 
 * @version 1.0
 */	
	function uninstall_settings(){
		$this->db->Execute("DELETE FROM `".TABLE_CONFIGURATION_GROUP."` WHERE `configuration_group_title` LIKE '%SEO%'");
		$this->db->Execute("DELETE FROM `".TABLE_CONFIGURATION."` WHERE `configuration_key` LIKE '%SEO%'");
		$this->db->Execute("DROP TABLE IF EXISTS " . TABLE_SEO_CACHE);
	} # end function
	
/**
 * This function installs the database settings
 * @author Bobby Easland 
 * @version 1.0
 */	
	function install_settings(){
		$this->uninstall_settings();
		$sort_order_query = "SELECT MAX(sort_order) as max_sort FROM `".TABLE_CONFIGURATION_GROUP."`";
		$sort = $this->db->Execute($sort_order_query);
		$next_sort = $sort->fields['max_sort'] + 1;
		$insert_group = "INSERT INTO `".TABLE_CONFIGURATION_GROUP."` VALUES ('', 'SEO URLs', 'Opciones para Ultimate SEO URLs by Chemo', '".$next_sort."', '1')";
		$this->db->Execute($insert_group);
		$group_id = $this->db->insert_ID();

		foreach ($this->default_config as $key => $value){
			$sql = str_replace('GROUP_INSERT_ID', $group_id, $value['QUERY']);
			$this->db->Execute($sql);
		}

		$insert_cache_table = "CREATE TABLE " . TABLE_SEO_CACHE . " (
		  `cache_id` varchar(32) NOT NULL default '',
		  `cache_language_id` tinyint(1) NOT NULL default '0',
		  `cache_name` varchar(255) NOT NULL default '',
		  `cache_data` mediumtext NOT NULL,
		  `cache_global` tinyint(1) NOT NULL default '1',
		  `cache_gzip` tinyint(1) NOT NULL default '1',
		  `cache_method` varchar(20) NOT NULL default 'RETURN',
		  `cache_date` datetime NOT NULL default '0000-00-00 00:00:00',
		  `cache_expires` datetime NOT NULL default '0000-00-00 00:00:00',
		  PRIMARY KEY  (`cache_id`,`cache_language_id`),
		  KEY `cache_id` (`cache_id`),
		  KEY `cache_language_id` (`cache_language_id`),
		  KEY `cache_global` (`cache_global`)
		) TYPE=MyISAM;";
		$this->db->Execute($insert_cache_table);
	} # end function	
} # end class
}
?>