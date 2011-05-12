<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
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
//  $Id: faq.php 980 2005-02-09 02:32:48Z ajeh $
//

define('HEADING_TITLE', '常见问题类别 / 常见问题');
define('HEADING_TITLE_GOTO', '转至:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_FAQ_CATEGORIES_FAQS', '常见问题类别 /常见问题');
define('TABLE_HEADING_FAQ_CATEGORIES_SORT_ORDER', '排序');
define('TEXT_FAQ_CATEGORIES_STATUS_INFO_OFF', '<span class="alert">*常见问题类别不可用</span>');
define('TEXT_FAQS_STATUS_INFO_OFF', '<span class="alert">*常见问题不可用</span>');

define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_STATUS', '状态');
define('TEXT_FAQS_CONTACT_NAME', '常见问题联系人姓名:');
define('TEXT_FAQS_CONTACT_MAIL', '常见问题联系邮箱:');
define('TEXT_FAQS_ANSWER', '常见问题回答:');
define('ENTRY_FAQS_NOTIFY_CONTACT', '通知客户的问题:');
define('TEXT_FAQ_CATEGORIES', '常见问题类别:');
define('TEXT_SUBCATEGORIES', '常见问题子类别:');
define('TEXT_FAQS', '常见问题:');
define('TEXT_FAQS_AVERAGE_RATING', '平均评分:');
define('TEXT_FAQS_QUANTITY_INFO', '熟练:');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_DATE_AVAILABLE', '有效期:');
define('TEXT_LAST_MODIFIED', '最后修改:');
define('TEXT_IMAGE_NONEXISTENT', '图像不存在');
define('TEXT_NO_CHILD_FAQ_CATEGORIES_OR_FAQS', '请在此级插入一个新的类别或者常见问题.');
define('TEXT_FAQ_MORE_INFORMATION', '查看更多相关信息，请访问常见问题<a href="http://%s" target="blank">帮助页面</a>.');
define('TEXT_FAQ_DATE_ADDED', '这个常见问题已经添加到我们的页面上 %s.');
define('TEXT_EDIT_INTRO', '请做必要的修改');
define('TEXT_EDIT_FAQ_CATEGORIES_ID', '常见问题类别 ID:');
define('TEXT_EDIT_FAQ_CATEGORIES_NAME', '常见问题类别名称:');
define('TEXT_EDIT_FAQ_CATEGORIES_IMAGE', '常见问题类别图像:');
define('TEXT_EDIT_SORT_ORDER', '排列顺序:');
define('FAQ_SUPPORT_SITE', 'http://zen-cart.com/forums');

define('TEXT_INFO_COPY_TO_INTRO', '您希望把这个常见问题拷贝到哪个新的类别下');
define('TEXT_INFO_CURRENT_FAQ_CATEGORIES', '当前常见问题类别: ');

define('TEXT_INFO_HEADING_NEW_CATEGORY', '新的常见问题类别');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', '编辑常见问题类别');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', '删除常见问题类别');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', '移动常见问题类别');
define('TEXT_INFO_HEADING_DELETE_FAQ', '删除常见问题');
define('TEXT_INFO_HEADING_MOVE_FAQ', '移动常见问题');
define('TEXT_INFO_HEADING_COPY_TO', '复制到');

define('TEXT_DELETE_CATEGORY_INTRO', '您确定要删除这个类别吗?');
define('TEXT_DELETE_FAQ_INTRO', '您确定要永久的删除这个常见问题吗?<br /><br /><strong>警告:</strong> 对于有链接的常见问题<br />1 如果您要从主类别中删除常见问题，请确保常见问题主类别已经更新<br />2 检查常见类别的复选框以删除常见问题，从');

define('TEXT_DELETE_WARNING_CHILDS', '<b>警告:</b> 还有 %s 个（子）类别和这个类别相链接!');
define('TEXT_DELETE_WARNING_FAQS', '<b>警告:</b>  还有 %s 个常见问题仍然和该类别相连接!');

define('TEXT_MOVE_FAQS_INTRO', '请选择你想要把<b>%s</b> 插入到的类别');
define('TEXT_MOVE_FAQ_CATEGORIES_INTRO', '请选择你想要把<b>%s</b> 插入到的类别');
define('TEXT_MOVE', '移 <b>%s</b> 至:');

define('TEXT_NEW_CATEGORY_INTRO', '请为新类别填写下列信息');
define('TEXT_NEW_FAQ', '常见问题类别中的常见问题: &quot;%s&quot;');
define('TEXT_FAQ_CATEGORIES_NAME', '常见问题类别名称:');
define('TEXT_FAQ_CATEGORIES_IMAGE', '常见问题类别图像:');
define('TEXT_SORT_ORDER', '排序:');

define('TEXT_FAQS_STATUS', '问题状态:');
define('TEXT_FAQS_DATE_AVAILABLE', '有效期:');
define('TEXT_FAQ_AVAILABLE', '激活的');
define('TEXT_FAQ_NOT_AVAILABLE', '未激活的');
define('TEXT_FAQS_SORT_ORDER', '排序:');
define('TEXT_DISPLAY_NUMBER_OF_FAQS', '显示 <b>%d</b> 至 <b>%d</b> (对于 <b>%d</b> 常见问题)');


define('TEXT_FAQS_NAME', '问题标题:');
define('TEXT_FAQS_DESCRIPTION', '问题答案:');
define('TEXT_FAQS_QUANTITY', '常见问题数量:');
define('TEXT_FAQS_MODEL', '常见问题类型:');
define('TEXT_FAQS_IMAGE', '常见问题图像:');
define('TEXT_FAQS_IMAGE_DIR', '上传路径:');
define('TEXT_FAQS_URL', '常见问题 URL:');
define('TEXT_FAQS_URL_WITHOUT_HTTP', '<small>(without http://)</small>');
define('EMPTY_CATEGORY', '空常见问题类别');

define('TEXT_HOW_TO_COPY', '方法复制:');
define('TEXT_COPY_AS_LINK', '链接常见问题');
define('TEXT_COPY_AS_DUPLICATE', '重复常见问题');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', '错误: 不能链接到同一类别下的常见问题.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', '错误: 类别图像路径不可写: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', '错误: 类别图像路径不存在: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', '错误: 常见问题类别不能移动到子类别下.');
define('TEXT_INFO_CURRENT_FAQ', '当前常见问题: ');
define('TABLE_HEADING_MODEL', '类型');
define('TEXT_FAQ_CATEGORIES_IMAGE_DIR','上传路径:');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', '更新类型状态');
define('EMAIL_TEXT_STATUS_UPDATE', '亲爱的 %s,' . "\n\n" . '您在' . STORE_NAME . ' 的问题状态已经更新.' . "\n\n" . '新状态: %s' . "\n\n" . '如果您有任何问题，请回复这个邮件.' . "\n");

define('TEXT_FAQS_OWNER', '问题提出者:');
define('TEXT_FAQS_OWNER_EMAIL', '联系邮箱:');
?>