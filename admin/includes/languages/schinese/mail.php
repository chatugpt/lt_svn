<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mail.php 7197 2007-10-06 20:35:52Z drbyte $
 */


define('HEADING_TITLE', '发送电子邮件至客户');

define('TEXT_CUSTOMER', '客户:');
define('TEXT_SUBJECT', '主题:');
define('TEXT_FROM', '来自:');
define('TEXT_MESSAGE', '只有文本 <br />信息:');
define('TEXT_MESSAGE_HTML','丰富的文本 <br />信息:');
define('TEXT_SELECT_CUSTOMER', '选择客户');
define('TEXT_ALL_CUSTOMERS', '所有客户');
define('TEXT_NEWSLETTER_CUSTOMERS', '所有通讯的订户');
define('TEXT_ATTACHMENTS_LIST','选定附件: ');
define('TEXT_SELECT_ATTACHMENT','附件<br />在服务器上: ');
define('TEXT_SELECT_ATTACHMENT_TO_UPLOAD','附件<br />上传<br />&amp; 附上: ');
define('TEXT_ATTACHMENTS_DIR','上传的文件夹: ');

define('NOTICE_EMAIL_SENT_TO', '注意：电子邮件发送给: %s');
define('NOTICE_EMAIL_FAILED_SEND', '注意：无法传送电子邮件给所有收件人: %s');
define('ERROR_NO_CUSTOMER_SELECTED', '错误：没有客户已选定.');
define('ERROR_NO_SUBJECT', '错误：没有问题已经进入.');
define('ERROR_ATTACHMENTS', '错误：您不能选择这两个单独的附件上传和地址。请只选择一个.');
?>