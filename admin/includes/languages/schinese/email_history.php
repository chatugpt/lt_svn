<?php
/*
//////////////////////////////////////////////////////////
//  EMAIL ARCHIVE SEARCH                                //
//  Version 1.0                                         //
//                                                      //
//  By Frank Koehl  (PM: BlindSide)                     //
//  Support by DrByte                                   //
//                                                      //
//  Powered by Zen-Cart (www.zen-cart.com)              //
//  Portions Copyright (c) 2005 The Zen-Cart Team       //
//                                                      //
//  Released under the GNU General Public License       //
//  available at www.zen-cart.com/license/2_0.txt       //
//  or see "license.txt" in the downloaded zip          //
//////////////////////////////////////////////////////////
*/

define('SUBJECT_SIZE_LIMIT', 25);
define('MESSAGE_SIZE_LIMIT', 550);
define('MESSAGE_LIMIT_BREAK', '...');

define('HEADING_TITLE', 'E-mail 档案管理');
define('HEADING_SEARCH_INSTRUCT', '你可以搜索任何符合下列条件的组合..');

define('HEADING_MODULE_SELECT', '过滤模块');
define('HEADING_SEARCH_TEXT', '搜索文本');
define('HEADING_SEARCH_TEXT_FILTER', '当前搜索过滤器: ');
define('HEADING_START_DATE', '开始日期');
define('HEADING_END_DATE', '截止日期');
define('HEADING_PRINT_FORMAT', '打印形式显示结果');
define('HEADING_TRIM_INSTRUCT', '删除...之前的 e-mail ');

define('TABLE_HEADING_EMAIL_DATE', '发送日期');
define('TABLE_HEADING_CUSTOMERS_NAME', '客户名称');
define('TABLE_HEADING_CUSTOMERS_EMAIL', '邮件地址');
define('TABLE_HEADING_EMAIL_FORMAT', '形式');
define('TABLE_HEADING_EMAIL_SUBJECT', '主题');
define('TABLE_FORMAT_TEXT', '文本');
define('TABLE_FORMAT_HTML', 'HTML');

define('TEXT_TRIM_ARCHIVE', '修剪邮件档案...');
define('TEXT_ARCHIVE_ID', '档案 #');
define('TEXT_ALL_MODULES', '所有模块');
define('TEXT_DISPLAY_NUMBER_OF_EMAILS', '显示 <b>%d</b> 至 <b>%d</b> (对于 <b>%d</b> emails)');
define('TEXT_EMAIL_MODULE', '模块: ');
define('TEXT_EMAIL_TO', '至: ');
define('TEXT_EMAIL_FROM', '从: ');
define('TEXT_EMAIL_DATE_SENT', '发送至: ');
define('TEXT_EMAIL_SUBJECT', '主题: ');
define('TEXT_EMAIL_EXCERPT', '留言摘录:');
define('TEXT_EMAIL_NUMBER', 'Email #');

define('RADIO_1_MONTH', ' 1 个月');
define('RADIO_6_MONTHS', ' 6 个月');
define('RADIO_1_YEAR', ' 12 个月');
define('TRIM_CONFIRM_WARNING', '警告: 将永久性将邮件从档案中删除.<br />你确定要这么做吗?');
define('POPUP_CONFIRM_RESEND', '你确定要重发该邮件吗?');
define('POPUP_CONFIRM_DELETE', '你确定要删除该邮件吗?');
define('SUCCESS_TRIM_ARCHIVE', '成功: E-mail 在 <strong>%s</strong>之前的已经删除');
define('SUCCESS_EMAIL_RESENT', '成功: E-mail #%s 已经转发至 %s');

define('IMAGE_ICON_HTML', ' 查看HTML信息 ');
define('IMAGE_ICON_TEXT', ' 查看文本信息e ');
define('IMAGE_ICON_RESEND', ' 重发信息 ');
define('IMAGE_ICON_EMAIL', ' Email 接收者 ');
define('IMAGE_ICON_DELETE', ' 删除信息 ');

define('BUTTON_SEARCH', '搜索档案');
define('BUTTON_TRIM_CONFIRM', '删除 e-mail');
define('BUTTON_CANCEL', '删除');
?>
