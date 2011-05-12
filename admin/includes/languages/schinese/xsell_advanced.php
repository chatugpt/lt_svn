<?php
/**
 * Cross Sell products
 *
 * Derived from:
 * Original Idea From Isaac Mualem im@imwebdesigning.com <mailto:im@imwebdesigning.com>
 * Portions Copyright (c) 2002 osCommerce
 * Complete Recoding From Stephen Walker admin@snjcomputers.com
 * Released under the GNU General Public License
 *
 * Adapted to Zen Cart by Merlin - Spring 2005
 * Reworked for Zen Cart v1.3.0  03-30-2006
 *
 * Reworked again to change/add more features by yellow1912
 * Pay me a visit at RubikIntegration.com
 *
 */
define('HEADING_TITLE',  '高级的交叉销售（X卖）管理');
define('TEXT_PRODUCT_ID', '产品 '.XSELL_FORM_INPUT_TYPE);

define('TEXT_CROSS_SELL','交叉销售');

define('CROSS_SELL_SORT_ORDER_UPDATED','更新排序以下产品订单: %s');
define('CROSS_SELL_SORT_ORDER_NOT_UPDATED', '没有排序更新!');
define('CROSS_SELL_NO_INPUT_FOUND',  '请输入至少 %d 产品标识/模型进行交叉销售');
define('CROSS_SELL_NO_MAIN_FOUND', '请输入主要的产品'.XSELL_FORM_INPUT_TYPE);
define('CROSS_SELL_ALREADY_ADDED','产品 %s 已被添加到产品 %s');
define('CROSS_SELL_ADDED', '产品 %s 追加了一个交叉销售到产品 %s');
define('CROSS_SELL_PRODUCT_DELETED','%s 交叉销售成功的被先移除.');
define('CROSS_SELL_PRODUCT_NOT_DELETED','没有移除交叉销售.');
define('CROSS_SELL_PRODUCT_NOT_FOUND','没有发现产品 '.XSELL_FORM_INPUT_TYPE.': %s');
define('CROSS_SELL_CLEANED_UP','%s 交叉销售（s）清理');
define('CROSS_SELL_PRODUCT_DUPLICATE','%s 和 %s 有同一个产品标识');
?>