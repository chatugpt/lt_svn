<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: shopping_cart.php 3183 2006-03-14 07:58:59Z birdbrain $
 */

define('NAVBAR_TITLE', '购物车');
define('HEADING_TITLE', '您购买的商品');
define('HEADING_TITLE_EMPTY', '您的购物车');
define('TEXT_INFORMATION', '');
define('TABLE_HEADING_REMOVE', '移除');
  define('TABLE_HEADING_ITEM_NAME', 'Item: ');
  define('TABLE_HEADING_PRODUCTS_NAME', '商品名:  ');
  
  define('TABLE_HEADING_PRICE', '价格: ');
  define('TABLE_HEADING_DELETE', '删除: ');
//define('TABLE_HEADING_QUANTITY', 'Qty.');
define('TABLE_HEADING_MODEL', '型号');
define('TABLE_HEADING_PRICE','单位');
define('TEXT_CART_EMPTY', '您还没有购买任何商品。');
define('SUB_TITLE_SUB_TOTAL', 'Sub-Total:');
define('SUB_TITLE_TOTAL', 'Total:');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Products marked with ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' are out of stock or there are not enough in stock to fill your order.<br />Please change the quantity of products marked with (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '). Thank you');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Products marked with ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' are out of stock.<br />Items not in stock will be placed on backorder.');

define('TEXT_TOTAL_ITEMS', '总数: ');
define('TEXT_TOTAL_WEIGHT', '&nbsp;&nbsp;重量: ');
define('TEXT_TOTAL_AMOUNT', '&nbsp;&nbsp;数量: ');

define('TEXT_VISITORS_CART', '<a href="javascript:session_win();">[帮助 (?)]</a>');
define('TEXT_OPTION_DIVIDER', '&nbsp;-&nbsp;');

define('TEXT_ESTIMATOR_HEADING_ITEMS','总数: ');
define('TEXT_ESTIMATOR_HEADING_WEIGHT','重量: ');
define('TEXT_ESTIMATOR_HEADING_COST','总额: ');
?>