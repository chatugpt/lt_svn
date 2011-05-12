<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: password_forgotten.php 4820 2006-10-23 07:19:46Z drbyte $
//

define('HEADING_TITLE', '重新发送密码');

define('TEXT_ADMIN_EMAIL', '管理员电子邮箱地址: ');

define('ERROR_WRONG_EMAIL', '<p>您输入了错误的电子邮件地址.</p>');
define('ERROR_WRONG_EMAIL_NULL', '<p>走开 :-P</p>');
define('SUCCESS_PASSWORD_SENT', '<p>一个新的密码已发送至您的电子邮箱地址.</p>');

define('TEXT_EMAIL_SUBJECT', '您所要求的变化');
define('TEXT_EMAIL_FROM', EMAIL_FROM);
define('TEXT_EMAIL_MESSAGE', '一个新的密码被请求 ' . $_SERVER['REMOTE_ADDR']  . '.' . "\n\n" . '您好的新密码 \'' . STORE_NAME . '\' 是:' . "\n\n" . '   %s' . "\n\n以后你在使用新的密码登录，您可以变更要到'工具->“管理设定'区域中.");

?>