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
// $Id: email_extras.php 5454 2006-12-29 20:10:17Z drbyte $
//

// office use only
  define('OFFICE_FROM','从:');
  define('OFFICE_EMAIL','E-mail:');

  define('OFFICE_SENT_TO','至:');
  define('OFFICE_EMAIL_TO','E-mail:');
  define('OFFICE_USE','办公专用:');
  define('OFFICE_LOGIN_NAME','注册名称:');
  define('OFFICE_LOGIN_EMAIL','注册 e-mail:');
  define('OFFICE_LOGIN_PHONE','<strong>电话:</strong>');
  define('OFFICE_IP_ADDRESS','IP 地址:');
  define('OFFICE_HOST_ADDRESS','主机地址:');
  define('OFFICE_DATE_TIME','日期:');

// email disclaimer
  define('EMAIL_DISCLAIMER', '如果您需要关于我们产品的更多信息或者您有任何的问题，请给我们发送邮件，至 %s. 我们将全心全意为您服务.'."\n\n".'我们将通过这个电子邮箱为您提供服务. 如果您没能正确的接收到该邮箱邮件，请给我们发送邮件。');
  
  define('EMAIL_SPAM_DISCLAIMER','这个E - mail发送与美国的CAN - SPAM法的规定生效01/01/20删除请求可以发送到这个地址，并会得到承认.');
  define('EMAIL_FOOTER_COPYRIGHT','');
  define('SEND_EXTRA_GV_ADMIN_EMAILS_TO_SUBJECT','[GV ADMIN SENT]');
  define('SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO_SUBJECT','[DISCOUNT COUPONS]');
  define('SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_SUBJECT','[ORDERS STATUS]');
  define('TEXT_UNSUBSCRIBE', "\n\n取消订阅以后的简讯或者促销邮件，请点击下面的链接: \n");

// for whos_online when gethost is off
  define('OFFICE_IP_TO_HOST_ADDRESS', '不可用');
?>