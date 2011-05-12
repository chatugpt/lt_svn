<?php
/**
*@Links Manager
*
* @package admin
* @copyright (c)2006-2008 Clyde Jones
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
*@version $Id: links_extras_dhtml.php 3/27/2008 Clyde Jones
*/
define('HEADING_TITLE', '链接');
define('HEADING_TITLE_SEARCH', '查找 :');
define('TABLE_HEADING_TITLE', '标题');
define('TABLE_HEADING_URL', '网址');
define('TABLE_HEADING_CLICKS', '点击');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '执行');
define('TEXT_INFO_HEADING_DELETE_LINK', '删除链接');
define('TEXT_INFO_HEADING_CHECK_LINK', '检查链接');
define('TEXT_DELETE_INTRO', '您确定要删除这个链接?');
define('TEXT_INFO_LINK_CHECK_RESULT', '链接检查结果:');
define('TEXT_INFO_LINK_CHECK_FOUND', '发现');
define('TEXT_INFO_LINK_CHECK_NOT_FOUND', '没有找到');
define('TEXT_INFO_LINK_CHECK_ERROR', '读取网址错误');
define('TEXT_INFO_LINK_STATUS', '状态:');
define('TEXT_INFO_LINK_CATEGORY', '分类:');
define('TEXT_INFO_LINK_CONTACT_NAME', '联系人姓名:');
define('TEXT_INFO_LINK_CONTACT_EMAIL', '联系人邮箱:');
define('TEXT_INFO_LINK_CLICK_COUNT', '点击:');
define('TEXT_INFO_LINK_DESCRIPTION', '描述:');
define('TEXT_DATE_LINK_CREATED', '链接提交:');
define('TEXT_DATE_LINK_LAST_MODIFIED', '最后更新:');
define('TEXT_IMAGE_NONEXISTENT', '图片不存在');
define('SUCCESS_PAGE_REMOVED', '成功：链接已被删除.');
define('SUCCESS_PAGE_STATUS_UPDATED', '成功：此链接项的状态已更新.');
 

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', '链接状态更新');
define('EMAIL_GREET_NONE', '亲爱的 %s,' . "\n");
define('EMAIL_TEXT', '您的连接状态是' . STORE_NAME . ' 已更新. ' . "\n");
define('EMAIL_TEXT_NEW_STATUS', '新的状态为 : %s. ' ."\n");
define('EMAIL_TEXT_REPLY', '请回复此电子邮件，如果您有任何问题.' . "\n\n");
define('EMAIL_TEXT_STATUS_UPDATE', '亲爱的 %s,' . "\n" . '您的连接状态是 ' . STORE_NAME . ' 已更新. ' . "\n" . '新状态是: %s. ' ."\n" . '请回复此电子邮件，如果您有任何问题.' . "\n\n");
define('CATEGORY_WEBSITE', '网站详细信息');
define('CATEGORY_CONTACT', '联系人信息');
define('CATEGORY_RECIPROCAL', '关联网页的详情');
define('CATEGORY_OPTIONS', '选项');
define('ENTRY_LINKS_TITLE', '站点标题:');
define('ENTRY_LINKS_TITLE_ERROR', '链接标题必须包含最少 ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' 字符.');
define('ENTRY_LINKS_URL', '网址:');
define('ENTRY_LINKS_URL_ERROR', '网址必须至少包含一个 ' . ENTRY_LINKS_URL_MIN_LENGTH . ' 字符.');
define('ENTRY_LINKS_CATEGORY', '分类:');
define('ENTRY_LINKS_DESCRIPTION', '描述:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', '说明必须包含一个最低' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' 字符.');
define('ENTRY_LINKS_IMAGE', '图片网址:');
define('ENTRY_LINKS_CONTACT_NAME', '全名:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', '您的姓名必须包含最少 ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' 字符.');
define('ENTRY_LINKS_RECIPROCAL_URL', '关联页:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', '关联页必须包含一个最低 ' . ENTRY_LINKS_URL_MIN_LENGTH . ' 字符.');
define('ENTRY_LINKS_STATUS', '状态:');
define('ENTRY_LINKS_NOTIFY_CONTACT', '通知联系人:');
define('ENTRY_LINKS_RATING', '评分:');
define('ENTRY_LINKS_RATING_ERROR', '评级应不为空.');
define('TEXT_DISPLAY_NUMBER_OF_LINKS', '显示 <b>%d</b>到 <b>%d</b> ( <b>%d</b> 链接)');
define('IMAGE_NEW_LINK', '新链接');
define('IMAGE_CHECK_LINK', '查检链接');
?>