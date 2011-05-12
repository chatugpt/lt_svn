<?php
/**
 * index.php represents the hub of the Zen Cart MVC system
 * 
 * Overview of flow
 * <ul>
 * <li>Load application_top.php - see {@tutorial initsystem}</li>
 * <li>Set main language directory based on $_SESSION['language']</li>
 * <li>Load all *header_php.php files from includes/modules/pages/PAGE_NAME/</li>
 * <li>Load html_header.php (this is a common template file)</li>
 * <li>Load main_template_vars.php (this is a common template file)</li>
 * <li>Load on_load scripts (page based and site wide)</li>
 * <li>Load tpl_main_page.php (this is a common template file)</li>
 * <li>Load application_bottom.php</li>
 * </ul>
 *
 * @package general
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: index.php 2942 2006-02-02 04:41:23Z drbyte $
 */
/**
 * Load common library stuff 
 */
  require('includes/application_top.php');
  
  
  //备份customer_id SESSION
  $customerIdBak = $_SESSION['customer_id'];
  
  //备份购物车
  $shippingCartBak = clone $_SESSION['cart'];
  
  //备份订单信息
  if (is_object($order)) {
  	$orderBak = clone $order;
  }
  
  //清除订单信息
  require_once DIR_WS_CLASSES . 'order.php';
  $order = new order;
  
  //清除SESSION登录信息
  $_SESSION['customer_id'] = null;
  
  //清空购物车
  $_SESSION['cart']->reset();
  
  //添加购物车
  $_SESSION['cart']->add_cart((int)$_POST['products_id'], (int)$_POST['product_qty']);
  //var_dump($_POST);
  //计算运费
  require(DIR_WS_MODULES . zen_get_module_directory('product_shipping_estimator.php'));
  require($template->get_template_dir('tpl_modules_product_shipping_estimator.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_shipping_estimator.php');
  
  //还原购物车
  $_SESSION['cart'] = $shippingCartBak;
  
  //还原SESSION登录信息
  $_SESSION['customer_id'] = $customerIdBak;
  
  //还原订单信息
  $order = $orderBak;