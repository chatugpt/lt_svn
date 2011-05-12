<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
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
//  $Id: group_pricing.php 2770 2006-01-02 07:52:42Z drbyte $
//

define('HEADING_TITLE', '集团定价');

define('TABLE_HEADING_GROUP_ID', 'ID');
define('TABLE_HEADING_GROUP_NAME', '集团名称');
define('TABLE_HEADING_GROUP_AMOUNT', '% 折扣');
define('TABLE_HEADING_ACTION', '选项');

define('TEXT_HEADING_NEW_PRICING_GROUP', '新定价组');
define('TEXT_HEADING_EDIT_PRICING_GROUP', '编辑定价组');
define('TEXT_HEADING_DELETE_PRICING_GROUP', '删除价格组');

define('TEXT_NEW_INTRO', '请为新组添加下列信息');
define('TEXT_EDIT_INTRO', '请做必要的修改');
define('TEXT_DELETE_INTRO', '你确定要删除该组么?');
define('TEXT_DELETE_PRICING_GROUP', '删除价格组');
define('TEXT_DELETE_WARNING_GROUP_MEMBERS','<b>警告:</b> 有 %s 客户依然点击该分类链接!');

define('TEXT_GROUP_PRICING_NAME', '组名称: ');
define('TEXT_GROUP_PRICING_AMOUNT', '折扣百分比: ');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_LAST_MODIFIED', '修改日期:');
define('TEXT_CUSTOMERS', '组客户:');

define('ERROR_GROUP_PRICING_CUSTOMERS_EXIST','错误: 客户在该组中. 请确认您要删除的组的所有成员，并删除它.');
define('ERROR_MODULE_NOT_CONFIGURED','注意: 你已经定义了组价格,但是你没有激活集团定价订单总计模块.<br />请转到 Admin->Modules->Order Total->Membership Discount (ot_group_pricing) 安装/配置该模块.');

?>