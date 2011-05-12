<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                                 |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: layout_controller.php 3197 2006-03-17 21:40:58Z drbyte $
//

define('HEADING_TITLE', '列箱');

define('TABLE_HEADING_LAYOUT_BOX_NAME', '盒文件名');
define('TABLE_HEADING_LAYOUT_BOX_STATUS', '左/右列<br />状态');
define('TABLE_HEADING_LAYOUT_BOX_STATUS_SINGLE', '单列<br />状态');
define('TABLE_HEADING_LAYOUT_BOX_LOCATION', '左 or 右<br />列');
define('TABLE_HEADING_LAYOUT_BOX_SORT_ORDER', '左/右列 <br />排序');
define('TABLE_HEADING_LAYOUT_BOX_SORT_ORDER_SINGLE', '单列<br />排序');
define('TABLE_HEADING_ACTION', '选项');

define('TEXT_INFO_EDIT_INTRO', '请做必要的修改');
define('TEXT_INFO_LAYOUT_BOX','选择框: ');
define('TEXT_INFO_LAYOUT_BOX_NAME', '箱名:');
define('TEXT_INFO_LAYOUT_BOX_LOCATION','地址: (单列忽略此设置)');
define('TEXT_INFO_LAYOUT_BOX_STATUS', '左/右列状态: ');
define('TEXT_INFO_LAYOUT_BOX_STATUS_SINGLE', '单列状态: ');
define('TEXT_INFO_LAYOUT_BOX_STATUS_INFO','开= 1 关=0');
define('TEXT_INFO_LAYOUT_BOX_SORT_ORDER', '左/右列的排序顺序:');
define('TEXT_INFO_LAYOUT_BOX_SORT_ORDER_SINGLE', '单列的排序顺序:');
define('TEXT_INFO_INSERT_INTRO', '请输入新框的相关数据');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除该盒子么?');
define('TEXT_INFO_HEADING_NEW_BOX', '新盒子');
define('TEXT_INFO_HEADING_EDIT_BOX', '编辑盒子');
define('TEXT_INFO_HEADING_DELETE_BOX', '删除盒子');
define('TEXT_INFO_DELETE_MISSING_LAYOUT_BOX','从模板列表中删除没有的盒子: ');
define('TEXT_INFO_DELETE_MISSING_LAYOUT_BOX_NOTE','注意：这不会删除文件，在任何时间，你都可以重新添加盒加入到正确的目录.<br /><br /><strong>删除盒名称: </strong>');
define('TEXT_INFO_RESET_TEMPLATE_SORT_ORDER','复位所有盒子排序顺序匹配模板的默认排序: ');
define('TEXT_INFO_RESET_TEMPLATE_SORT_ORDER_NOTE','这不会删除任何的盒子. 它只会重置当前排序顺序');
define('TEXT_INFO_BOX_DETAILS','盒详细: ');

////////////////

define('HEADING_TITLE_LAYOUT_TEMPLATE', '网站模板布局');

define('TABLE_HEADING_LAYOUT_TITLE', '标题');
define('TABLE_HEADING_LAYOUT_VALUE', '价值');
define('TABLE_HEADING_ACTION', '选项');


define('TEXT_MODULE_DIRECTORY', '站点布局目录:');
define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后修改:');

// layout box text in includes/boxes/layout.php
define('BOX_HEADING_LAYOUT', '布局');
define('BOX_LAYOUT_COLUMNS', '列控制器');

// file exists
define('TEXT_GOOD_BOX',' ');
define('TEXT_BAD_BOX','<font color="ff0000"><b>缺失</b></font><br />');


// Success message
define('SUCCESS_BOX_DELETED','成功删除从框模板: ');
define('SUCCESS_BOX_RESET','成功重置所有模板中的设置为默认设置: ');
define('SUCCESS_BOX_UPDATED','成功更新的对话框设置: ');

define('TEXT_ON',' 开 ');
define('TEXT_OFF',' 关 ');
define('TEXT_LEFT',' 左 ');
define('TEXT_RIGHT',' 右 ');

?>