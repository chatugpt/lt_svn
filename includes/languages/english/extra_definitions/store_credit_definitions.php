<?
/* Start Store Credit Order Total Module */
if (MODULE_ORDER_TOTAL_SC_ORDER_REWARD_POINTS == 'true') {
	define('BOX_HEADING_STORE_CREDIT','Reward Points');
	define('MODULE_ORDER_TOTAL_STORE_CREDIT_TEXT_INSTRUCTIONS', 'Do you want to apply your rewards points?');
	define('TEXT_SC_NAMES', 'Reward Points');
	define('TEXT_SC_NAME', 'Reward Points');
  define('BOX_DESC_STORE_CREDIT_PENDING', 'You have %s in pending rewards points'); 
} else {
	define('BOX_HEADING_STORE_CREDIT','Store Credit');
	define('MODULE_ORDER_TOTAL_STORE_CREDIT_TEXT_INSTRUCTIONS', 'Do you want to apply your store credit?');
	define('TEXT_SC_NAMES', 'Store Credits');
	define('TEXT_SC_NAME', 'Store Credit');
  define('BOX_DESC_STORE_CREDIT_PENDING', 'You have %s in pending store credit'); 
}

define('BOX_DESC_STORE_CREDIT', 'Your balance is ');
define('TEXT_SC_CRON_COMPLETED', 'Completed in %s seconds.<br>');
define('TEXT_SC_CRON_ORDERS_UPDATED', '%s order(s) updated.');
define('TEXT_SC_CRON_PRODUCTS_UPDATED', '%s product(s) updated.');

define('TEXT_SC_PRODUCTS_INFO', 'Earn up to %s in rewards points when you purchase this product!');
/* End Store Credit Order Total Module */
?>