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
//  $Id: FAQ categories.php 671 2004-11-28 19:52:17Z toolcrazy $
//

define('HEADING_TITLE', '帮助类别 / 帮助');
define('HEADING_TITLE_GOTO', '转至:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_FAQ_CATEGORIES_FAQS', '帮助类别/ 帮助');
define('TABLE_HEADING_FAQ_CATEGORIES_SORT_ORDER', '排序');

define('TEXT_LEGEND_FAQ_LINKED','链接常见问题');

define('TABLE_HEADING_QUANTITY','常见问题总数');

define('TABLE_HEADING_ACTION', '作用');
define('TABLE_HEADING_STATUS', '状态');

define('TEXT_FAQ_CATEGORIES', '常见问题类别：');
define('TEXT_SUBFAQ_CATEGORIES', '常见问题子类别:');
define('TEXT_FAQS', '常见问题:');
define('TEXT_FAQS_AVERAGE_RATING', '平均分:');

define('TEXT_DATE_ADDED', '添加日期:');

define('TEXT_LAST_MODIFIED', '最后修改:');
define('TEXT_IMAGE_NONEXISTENT', '图像不存在');
define('TEXT_NO_CHILD_FAQ_CATEGORIES_OR_FAQS', '请在该级下插入一个新的常见问题类别或常见问题.');
define('TEXT_FAQ_MORE_INFORMATION', '查看更多相关信息，请访问常见问题<a href="http://%s" target="blank">帮助页面</a>.');
define('TEXT_FAQ_DATE_ADDED', '这个常见问题已经添加到我们的页面上 %s.');


define('TEXT_EDIT_INTRO', '请做必要的修改');
define('TEXT_EDIT_FAQ_CATEGORIES_ID', '常见问题类别 ID:');
define('TEXT_EDIT_FAQ_CATEGORIES_NAME', '常见问题类别名称:');
define('TEXT_EDIT_FAQ_CATEGORIES_IMAGE', '常见问题类别图像:');
define('TEXT_EDIT_SORT_ORDER', '排序:');

define('TEXT_INFO_COPY_TO_INTRO', '您希望把这个常见问题拷贝到哪个新的类别下');
define('TEXT_INFO_CURRENT_FAQ_CATEGORIES', '当前常见问题类别: ');

define('TEXT_INFO_HEADING_NEW_FAQ_CATEGORY', '新常见问题类别');
define('TEXT_INFO_HEADING_EDIT_FAQ_CATEGORY', '编辑常见问题类别');
define('TEXT_INFO_HEADING_DELETE_FAQ_CATEGORY', '删除常见问题类别');
define('TEXT_INFO_HEADING_MOVE_FAQ_CATEGORY', '移动常见问题类别');

define('BUTTON_ADD_FAQ_TYPES_SUBFAQ_CATEGORIES_ON', '添加包含常见问题的子类别');
define('BUTTON_ADD_FAQ_TYPES_SUBFAQ_CATEGORIES_OFF', '添加不包含常见问题的子类别');
define('IMAGE_NEW_FAQ_CATEGORY', '新常见问题类别');
define('IMAGE_NEW_FAQ', '新的常见问题');

define('TEXT_INFO_HEADING_DELETE_FAQ', '删除常见问题');
define('TEXT_INFO_HEADING_MOVE_FAQ', '移动常见问题Q');
define('TEXT_INFO_HEADING_COPY_TO', '复制到');

define('TEXT_DELETE_FAQ_CATEGORY_INTRO', '您确定要删除该常见问题类别吗?');
define('TEXT_DELETE_FAQ_INTRO', '您确定要永久的删除该常见问题吗?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>警告:<b>警告:</b> 还有 %s 个（子）类别和这个类别相链接!');
define('TEXT_DELETE_WARNING_FAQS', '<b>警告:</b>  还有 %s 个常见问题仍然和该类别相连接!');

define('TEXT_MOVE_FAQS_INTRO', '请选择你想要把<b>%s</b> 插入到的类别');
define('TEXT_MOVE_FAQ_CATEGORIES_INTRO', '请选择你想要把<b>%s</b> 插入到的类别');
define('TEXT_MOVE', '移 <b>%s</b> 至:');

define('TEXT_NEW_FAQ_CATEGORY_INTRO', '请为新类别填写下列信息');
define('TEXT_FAQ_CATEGORIES_NAME', '常见问题类别名称:');
define('TEXT_FAQ_CATEGORIES_IMAGE', '常见问题类别图像:');
define('TEXT_SORT_ORDER', '排序:');

define('TEXT_FAQS_STATUS', '问题状态:');
define('TEXT_FAQS_VIRTUAL', '虚拟常见问题:');
define('TEXT_FAQS_IS_ALWAYS_FREE_SHIPPING', '总是免运费:');
define('TEXT_FAQS_QTY_BOX_STATUS', '显示常见问题数量框:');
define('TEXT_FAQS_DATE_AVAILABLE', '有效期:');
define('TEXT_FAQ_AVAILABLE', '上架');
define('TEXT_FAQ_NOT_AVAILABLE', '下架');
define('TEXT_FAQ_IS_VIRTUAL', '是, 忽略送货地址');
define('TEXT_FAQ_NOT_VIRTUAL', '否, 需要送货地址');
define('TEXT_FAQ_IS_ALWAYS_FREE_SHIPPING', '是, 总是免运费');
define('TEXT_FAQ_NOT_ALWAYS_FREE_SHIPPING', '否, 正常运送规则');

define('TEXT_FAQS_QTY_BOX_STATUS_ON', '是, 显示数量框');
define('TEXT_FAQS_QTY_BOX_STATUS_OFF', '否, 不显示数量框');

define('TEXT_FAQS_MANUFACTURER', '常见问题提出者:');
define('TEXT_FAQS_NAME', '问题标题:');
define('TEXT_FAQS_CONTACT_NAME', '常见问题联系人名称:');
define('TEXT_FAQS_CONTACT_MAIL', '常见问题联系邮箱:');
define('TEXT_FAQS_DESCRIPTION', '问题答案:');
define('TEXT_FAQS_ANSWER', '常见问题答案:');
define('TEXT_FAQS_NOTIFY_CONTACT', '通知客户的问题:');
define('TEXT_FAQS_QUANTITY', '常见问题数量:');
define('TEXT_FAQS_MODEL', '常见问题类型:');
define('TEXT_FAQS_IMAGE', '常见问题图像:');
define('TEXT_FAQS_IMAGE_DIR', '上传路径:');
define('TEXT_FAQS_URL', '常见问题 URL:');
define('TEXT_FAQS_URL_WITHOUT_HTTP', '<small>(without http://)</small>');
define('EMPTY_FAQ_CATEGORY', '空常见问题类别');

define('TEXT_HOW_TO_COPY', '方法复制:');
define('TEXT_COPY_AS_LINK', '链接常见问题');
define('TEXT_COPY_AS_DUPLICATE', '重复常见问题');

define('TEXT_RESTRICT_FAQ_TYPE', '限定常见类型');
define('TEXT_FAQ_CATEGORY_HAS_RESTRICTIONS', '此分类FAQ被限制在常见的FAQ分类中');
define('ERROR_CANNOT_ADD_FAQ_TYPE','指定的常见类型不能被添加到这个常见问题类别. 检查您的常见问题类别限制.');

define('ERROR_CANNOT_LINK_TO_SAME_FAQ_CATEGORY', '错误:在同类别常见问题无法连接到常见问题.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', '错误: 分类图片目录不可写: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', '错误: 分类图片目录不存在: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_FAQ_CATEGORY_TO_PARENT', '错误:常见问题分类不能移动到子常见问题分类.');
define('ERROR_CANNOT_MOVE_FAQ_TO_FAQ_CATEGORY_SELF', '错误: 不能移动常见问题到常见问题相同的分类或者到一个已经存在常见问题分类.');

// FAQs and Attribute Copy Options
  define('TEXT_COPY_ATTRIBUTES_ONLY','仅适用于重复的常见问题 ...');
  define('TEXT_COPY_ATTRIBUTES','重复复制常见问题属性？');
  define('TEXT_COPY_ATTRIBUTES_YES','是的');
  define('TEXT_COPY_ATTRIBUTES_NO','不');

  define('TEXT_INFO_CURRENT_FAQ', '当前常见问题: ');
define('TABLE_HEADING_MODEL', '类型');

define('TEXT_FAQ_CATEGORIES_IMAGE_DIR','上传路径:');
  define('TEXT_FAQ_OPTIONS', '<strong>请选择:</strong>');
  define('TEXT_ANY_TYPE', '任意类型');
  define('TABLE_HEADING_FAQ_TYPES', '常见问题类型');

// FAQ categories status
define('TEXT_INFO_HEADING_STATUS_FAQ_CATEGORY', '改变此常见问题分类状态为:');
define('TEXT_FAQ_CATEGORIES_STATUS_INTRO', '改变此常见问题状态到: ');
define('TEXT_FAQ_CATEGORIES_STATUS_OFF', '关');
define('TEXT_FAQ_CATEGORIES_STATUS_ON', '开');
define('TEXT_FAQS_STATUS_INFO', '改变所有常见问题状态到: ');
define('TEXT_FAQS_STATUS_OFF', '关');
define('TEXT_FAQS_STATUS_ON', '开');
define('TEXT_FAQS_STATUS_NOCHANGE', '不变');
define('TEXT_FAQ_CATEGORIES_STATUS_WARNING', '<strong>警告 ...</strong><br />注意: 禁用一个常见问题类别会禁用该类别下的所有常见问题. 位于此链接常见问题常见问题类别，与其他常见问题类别共享也将被禁止.');
define('TEXT_DISPLAY_NUMBER_OF_FAQS', '显示 <b>%d</b> 到 <b>%d</b> (的 <b>%d</b> 常见问题)');
define('TEXT_FAQS_STATUS_ON_OF',' 的 ');
define('TEXT_FAQS_STATUS_ACTIVE',' 激活的');

define('TEXT_FAQ_CATEGORIES_DESCRIPTION', '常见问题分类描述:');
define('TABLE_HEADING_FAQ_MANAGER_CONFIGURATION', '帮助中心配置');
define('TABLE_HEADING_FAQ_MANAGER_SUPPORT', '帮助中心支持');
?>
