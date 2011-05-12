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
//  $Id: salemaker.php 6369 2007-05-25 03:03:42Z ajeh $
//

define('HEADING_TITLE', '销售设备');
define('TABLE_HEADING_SALE_NAME', '销售名');
define('TABLE_HEADING_SALE_DEDUCTION', '扣除');
define('TABLE_HEADING_SALE_DATE_START', '开始日期');
define('TABLE_HEADING_SALE_DATE_END', '结束日期');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '执行');
define('TEXT_SALEMAKER_NAME', '销售名:');
define('TEXT_SALEMAKER_DEDUCTION', '扣除:');
define('TEXT_SALEMAKER_DEDUCTION_TYPE', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类型:&nbsp;&nbsp;');
define('TEXT_SALEMAKER_PRICERANGE_FROM', '产品价格范围:');
define('TEXT_SALEMAKER_PRICERANGE_TO', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;到&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
define('TEXT_SALEMAKER_SPECIALS_CONDITION', '如果一个产品是一种特殊:');
define('TEXT_SALEMAKER_DATE_START', '开始日期:');
define('TEXT_SALEMAKER_DATE_END', '结束日期:');
define('TEXT_SALEMAKER_CATEGORIES', '<b>或</b> 检查此销售的分类:');
define('TEXT_SALEMAKER_POPUP', '<a href="javascript:session_win();"><span class="errorText"><b>点击这里销售设备使用提示.</b></span></a>');
define('TEXT_SALEMAKER_POPUP1', '<a href="javascript:session_win1();"><span class="errorText"><b>(更多信息)</b></span></a>');
define('TEXT_SALEMAKER_IMMEDIATELY', '立即');
define('TEXT_SALEMAKER_NEVER', '没有');
define('TEXT_SALEMAKER_ENTIRE_CATALOG', '选中此复选框，如果你想出售被应用到<b>所有产品</b>:');
define('TEXT_SALEMAKER_TOP', '整个目录');
define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_DATE_MODIFIED', '最后修改:');
define('TEXT_INFO_DATE_STATUS_CHANGE', '最后状态改变:');
define('TEXT_INFO_SPECIALS_CONDITION', '特价条件:');
define('TEXT_INFO_DEDUCTION', '扣除:');
define('TEXT_INFO_PRICERANGE_FROM', '价格范围:');
define('TEXT_INFO_PRICERANGE_TO', ' 到 ');
define('TEXT_INFO_DATE_START', '开始:');
define('TEXT_INFO_DATE_END', '过期:');
define('SPECIALS_CONDITION_DROPDOWN_0', '忽略特价商品价格 - 应用于产品价格和替换特殊');
define('SPECIALS_CONDITION_DROPDOWN_1', '忽略销售条件 - 没有出售时适用特价存在');
define('SPECIALS_CONDITION_DROPDOWN_2', '特价适用于中扣除销售价格 - 否则适用于价格');
// moved to english.php
/*
define('DEDUCTION_TYPE_DROPDOWN_0', 'Deduct amount');
define('DEDUCTION_TYPE_DROPDOWN_1', 'Percent');
define('DEDUCTION_TYPE_DROPDOWN_2', 'New Price');
*/
define('TEXT_INFO_HEADING_COPY_SALE', '每份售价');
define('TEXT_INFO_COPY_INTRO', '输入一个名称副本<br>&nbsp;&nbsp;"%s"');
define('TEXT_INFO_HEADING_DELETE_SALE', '删除销售');
define('TEXT_INFO_DELETE_INTRO', '您确定要永久删除此出售?');
define('TEXT_MORE_INFO', '(更多信息)');

define('TEXT_WARNING_SALEMAKER_PREVIOUS_CATEGORIES','&nbsp;警告 : %s 销售已经包括了这个类别');
?>