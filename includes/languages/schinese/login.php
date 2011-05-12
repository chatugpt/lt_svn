<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: login.php 6352 2007-05-20 21:05:01Z drbyte $
 */

define('NAVBAR_TITLE', '登录');
define('HEADING_TITLE', '<span class="red">登录</span>或创建一个账号');

define('HEADING_NEW_CUSTOMER', '新用户');
define('HEADING_NEW_CUSTOMER_SPLIT', '新用户');

define('TEXT_NEW_CUSTOMER_INTRODUCTION', '您还没有注册<strong>' . STORE_NAME .'</strong>账号，请注册！');
define('TEXT_NEW_CUSTOMER_INTRODUCTION_SPLIT', 'Have a PayPal account? Want to pay quickly with a credit card? Use the PayPal button below to use the Express Checkout option.');
define('TEXT_NEW_CUSTOMER_POST_INTRODUCTION_DIVIDER', '<span class="larger">或</span><br />');
define('TEXT_NEW_CUSTOMER_POST_INTRODUCTION_SPLIT', 'Create a Customer Profile with <strong>' . STORE_NAME . '</strong> which allows you to shop faster, track the status of your current orders, review your previous orders and take advantage of our other member\'s benefits.');

define('HEADING_RETURNING_CUSTOMER', '会员');
define('HEADING_RETURNING_CUSTOMER_SPLIT', '会员');

define('TEXT_RETURNING_CUSTOMER_SPLIT', 'In order to continue, please login to your <strong>' . STORE_NAME . '</strong> account.');

define('TEXT_PASSWORD_FORGOTTEN', '忘记密码？');

define('TEXT_LOGIN_ERROR', 'Error: Sorry, there is no match for that email address and/or password.');
define('TEXT_VISITORS_CART', '<strong>Note:</strong> Your &quot;Visitors Cart&quot; contents will be merged with your &quot;Members Cart&quot; contents once you have logged on. <a href="javascript:session_win();">[More Info]</a>');

define('TABLE_HEADING_PRIVACY_CONDITIONS', '<span class="privacyconditions">Privacy Statement</span>');
define('TEXT_PRIVACY_CONDITIONS_DESCRIPTION', '<span class="privacydescription">Please acknowledge you agree with our privacy statement by ticking the following box. The privacy statement can be read</span> <a href="' . zen_href_link(FILENAME_PRIVACY, '', 'SSL') . '"><span class="pseudolink">here</span></a>.');
define('TEXT_PRIVACY_CONDITIONS_CONFIRM', '<span class="privacyagree">I have read and agreed to your privacy statement.</span>');

define('ERROR_SECURITY_ERROR', 'There was a security error when trying to login.');

define('TEXT_LOGIN_BANNED', 'Error: Access denied.');
?>