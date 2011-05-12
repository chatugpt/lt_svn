<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mail.php 7197 2007-10-06 20:35:52Z drbyte $
 */


define('HEADING_TITLE', 'EDM营销');

define('TEXT_CUSTOMER', '收件人:');
define('TEXT_SUBJECT', '主题:');
define('TEXT_FROM', '发件邮箱:');
define('TEXT_FROMNAME', '发件人姓名:');
define('TEXT_MESSAGE', '纯文本<br />信息:');
define('TEXT_MESSAGE_HTML','HTML<br />信息:');
define('TEXT_SELECT_CUSTOMER', '选择收件人');
define('TEXT_ALL_CUSTOMERS', '所有客户');
define('TEXT_NEWSLETTER_CUSTOMERS', '所有电子商情订阅用户');
define('TEXT_ATTACHMENTS_LIST','选择的附件: ');
define('TEXT_SELECT_ATTACHMENT','服务器上的附件: ');
define('TEXT_SELECT_ATTACHMENT_TO_UPLOAD','附件: ');
define('TEXT_ATTACHMENTS_DIR','上传目录: ');

define('NOTICE_EMAIL_SENT_TO', '注意: 发邮件至: %s');
define('NOTICE_EMAIL_FAILED_SEND', '注意: 发送邮件到所有收件人失败: %s');
define('ERROR_NO_CUSTOMER_SELECTED', '错误:没有选择收件人。');
define('ERROR_NO_SUBJECT', '错误:没有邮件主题。');
define('ERROR_ATTACHMENTS', '错误:只能上传一个附件');

define('TEXT_HOST', 'SMTP服务器:');
define('TEXT_PORT', 'SMTP服务器端口:');
define('TEXT_SSL', 'SSL?');
define('TEXT_SEPERATE', '列表分隔符：');
define('TEXT_USER', 'SMTP账号：');
define('TEXT_PASS', 'SMTP密码：');
define('TEXT_SPAN', '时间间隔：');

define('ERROR_EDM_TOOMUCH', '单次邮件数量过多，最大发送%s封');
?>