<?php
/**
 * @package admin
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: newsletters.php 4385 2006-09-04 04:10:48Z drbyte $
 */

define('HEADING_TITLE', '通讯及产品管理的通知');

define('TABLE_HEADING_NEWSLETTERS', '通讯');
define('TABLE_HEADING_SIZE', '大小');
define('TABLE_HEADING_MODULE', '型号');
define('TABLE_HEADING_SENT', '发送');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_NEWSLETTER_MODULE', '型号:');
define('TEXT_NEWSLETTER_TITLE', '主题:');
define('TEXT_NEWSLETTER_CONTENT', '只有文本 <br />内容:');
define('TEXT_NEWSLETTER_CONTENT_HTML', '丰富的文本 <br />内容:');

define('TEXT_NEWSLETTER_DATE_ADDED', '添加日期:');
define('TEXT_NEWSLETTER_DATE_SENT', '发送日期:');

define('TEXT_INFO_DELETE_INTRO', '你确定要删除此通讯?');

define('TEXT_PLEASE_WAIT', '请稍候..发送电子邮件 ..<br /><br />请不要打断这一进程!');
define('TEXT_FINISHED_SENDING_EMAILS', '完成发送电子邮件!');

define('TEXT_AFTER_EMAIL_INSTRUCTIONS','%s 邮件处理. (每个复选框表示1收件人。在复选框悬停看到的电子邮件地址.)<br /><br />注意你的信箱 ('.EMAIL_FROM.') 为:<UL><LI>a) 反弹的消息</LI><LI>b) 不良好的电子邮件地址</LI><LI>c) 删除请求.</LI></UL>清除可以通过编辑处理客户记录在管理|客户菜单.');

define('ERROR_NEWSLETTER_TITLE', '错误：需要新闻通讯的标题');
define('ERROR_NEWSLETTER_MODULE', '错误：通讯模块要求');
define('ERROR_PLEASE_SELECT_AUDIENCE','错误：请选择一个观众收到这份简讯');
?>