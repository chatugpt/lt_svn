<?php 
/** 
* session handling 
* see {@link http://www.zen-cart.com/wiki/index.php/Developers_API_Tutorials#InitSystem wikitutorials} for more details. 
* 
* @package initSystem 
* @copyright Copyright 2003-2005 Zen Cart Development Team 
* @copyright Portions Copyright 2003 osCommerce 
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0 
* @version $Id: init_sessions.php 2753 2005-12-31 19:17:17Z wilt $ 
*/ 
if (!defined('IS_ADMIN_FLAG')) { 
die('Illegal Access'); 
} 
/** 
* require the session handling functions 
*/ 
require(DIR_WS_FUNCTIONS . 'sessions.php'); 
/** 
* set the session name and save path 
*/ 
zen_session_name('zenid'); 
zen_session_save_path(SESSION_WRITE_DIRECTORY); 
/** 
* set the session cookie parameters 
*/ 
session_set_cookie_params(0, '/', (zen_not_null($current_domain) ? $current_domain : '')); 
/** 
* set the session ID if it exists 
*/ 
if (isset($_POST[zen_session_name()])) { 
zen_session_id($_POST[zen_session_name()]); 
} elseif ( ($request_type == 'SSL') && isset($_GET[zen_session_name()]) ) { 
zen_session_id($_GET[zen_session_name()]); 
} 
/** 

* start the session 
*/ 
$session_started = false; 
if (SESSION_FORCE_COOKIE_USE == 'True') { 
zen_setcookie('cookie_test', 'please_accept_for_session', time()+60*60*24*30, '/', (zen_not_null($current_domain) ? $current_domain : '')); 

if (isset($_COOKIE['cookie_test'])) { 
zen_session_start(); 
$session_started = true; 
} 
} elseif (SESSION_BLOCK_SPIDERS == 'True') { 
$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']); 
$spider_flag = false; 
if (zen_not_null($user_agent)) { 
$spiders = file(DIR_WS_INCLUDES . 'spiders.txt'); 
for ($i=0, $n=sizeof($spiders); $i<$n; $i++) { 
if (zen_not_null($spiders[$i])) { 
if (is_integer(strpos($user_agent, trim($spiders[$i])))) { 
$spider_flag = true; 
break; 
} 
} 
} 
} 
if ($spider_flag == false) { 
zen_session_start(); 
$session_started = true; 
} 
} else { 
zen_session_start(); 
$session_started = true; 
} 
/** 
* set host_address once per session to reduce load on server 
*/ 
if (!isset($_SESSION['customers_host_address'])) { 
if (SESSION_IP_TO_HOST_ADDRESS == 'true') { 
$_SESSION['customers_host_address']= gethostbyaddr($_SERVER['REMOTE_ADDR']); 
} else { 
$_SESSION['customers_host_address'] = OFFICE_IP_TO_HOST_ADDRESS; 
} 
} 
/** 
* verify the ssl_session_id if the feature is enabled 
*/ 
if ( ($request_type == 'SSL') && (SESSION_CHECK_SSL_SESSION_ID == 'True') && (ENABLE_SSL == 'true') && ($session_started == true) ) { 
$ssl_session_id = $_SERVER['SSL_SESSION_ID']; 
if (!$_SESSION['SSL_SESSION_ID']) { 
$_SESSION['SSL_SESSION_ID'] = $ssl_session_id; 
} 
if ($_SESSION['SSL_SESSION_ID'] != $ssl_session_id) { 
zen_session_destroy(); 
zen_redirect(zen_href_link(FILENAME_SSL_CHECK)); 
} 
} 
/** 
* verify the browser user agent if the feature is enabled 
*/ 
if (SESSION_CHECK_USER_AGENT == 'True') { 
$http_user_agent = $_SERVER['HTTP_USER_AGENT']; 
if (!$_SESSION['SESSION_USER_AGENT']) { 
$_SESSION['SESSION_USER_AGENT'] = $http_user_agent; 
} 
if ($_SESSION['SESSION_USER_AGENT'] != $http_user_agent) { 
zen_session_destroy(); 
zen_redirect(zen_href_link(FILENAME_LOGIN)); 
} 
} 
/** 
* verify the IP address if the feature is enabled 
*/ 
if (SESSION_CHECK_IP_ADDRESS == 'True') { 
$ip_address = zen_get_ip_address(); 
if (!$_SESSION['SESSION_IP_ADDRESS']) { 
$_SESSION['SESSION_IP_ADDRESS'] = $ip_address; 
} 
if ($_SESSION['SESSION_IP_ADDRESS'] != $ip_address) { 
zen_session_destroy(); 
zen_redirect(zen_href_link(FILENAME_LOGIN)); 
} 
} 

// JTD begin dwno mod 
if (SESSION_BLOCK_SPIDERS != 'True' || $spider_flag == false) { // JTD - Grayson's spider fix 

// keep any post data after redirection 
if (isset($_SESSION['_post']) && is_array($_SESSION['_post'])) 
{ 
if (count($_POST) === 0) 
{ 
$_POST = $_SESSION['_post']; 
} 
unset($_SESSION['_post']); 
} 

/* 
$_SERVER['QUERY_STRING'] is supposedly not automatically created on certain systems 
simulate the creation of $_SERVER['QUERY_STRING'] 
*/ 
function get_query_string($ampersand_encode = true) 
{ 
$result = array(); 
foreach($_GET AS $key => $value) { 
$result[] = $key . '=' . $value; 
} 
if ($ampersand_encode === true) 
{ 
return implode('&', $result); 
} 
return implode('&', $result); 
} // end function get_query_string 

$_SERVER['QUERY_STRING'] = get_query_string(false); 

header('Cache-control: private'); 

$session_name = session_name(); 
if (!isset($_SESSION['prev_request_type']) || $_SESSION['prev_request_type'] != $request_type) 
// this is either the initial hit or we're switching between SSL and NON-SSL 
{ 
// make sure the sid is in the query string 
$_GET[$session_name] = session_id(); 
$_SERVER['QUERY_STRING'] = get_query_string(false); 
// remember this request type - if we change from/to SSL we need to recheck that a cookie has been set 
$_SESSION['prev_request_type'] = $request_type; 
// remember any posted data 
$_SESSION['_post'] = $_POST; 
session_write_close(); 
// redirect to self with the SID in the query string 
header('Location: ' . ($request_type == 'SSL' ? constant('HTTPS_SERVER') : constant('HTTP_SERVER')) . $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING']); 
die(); 
} 

// if cookies are enabled, remove the SID from the query string and redirect 
if (isset($_COOKIE[$session_name])) 
// cookies are enabled 
{ 
if (isset($_GET[$session_name]) && $_GET[$session_name] != '') 
// a SID is in the query string 
{ 
// remove the SID from the query string 
unset($_GET[$session_name]); 
$_SERVER['QUERY_STRING'] = get_query_string(false); 
// remember any posted data 
$_SESSION['_post'] = $_POST; 
// end session 
session_write_close(); 
// redirect with clean query string 
header('Location: ' . ($request_type == 'SSL' ? constant('HTTPS_SERVER') : constant('HTTP_SERVER')) . $_SERVER['SCRIPT_NAME'] . ( $_SERVER['QUERY_STRING'] != '' ? '?' . $_SERVER['QUERY_STRING'] : '' )); 
die(); 
} 
} 
// remember this request type - if we change from/to SSL we need to recheck that a cookie has been set 
$_SESSION['prev_request_type'] = $request_type; 
// JTD end dwno mod 
} // JTD - end Grayson's spider fix 
?> 