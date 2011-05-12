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
//  $Id: currencies.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', '货币');

define('TABLE_HEADING_CURRENCY_NAME', '货币');
define('TABLE_HEADING_CURRENCY_CODES', '号码');
define('TABLE_HEADING_CURRENCY_VALUE', '值');
define('TABLE_HEADING_ACTION', '作用');

define('TEXT_INFO_EDIT_INTRO', '请做必要的更改');
define('TEXT_INFO_CURRENCY_TITLE', '标题:');
define('TEXT_INFO_CURRENCY_CODE', '号码:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', '左边符号:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', '右边符号:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', '小数点:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', '千分位点:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', '小数位:');
define('TEXT_INFO_CURRENCY_LAST_UPDATED', '最后更改:');
define('TEXT_INFO_CURRENCY_VALUE', '值得、:');
define('TEXT_INFO_CURRENCY_EXAMPLE', '示例输出:');
define('TEXT_INFO_INSERT_INTRO', '请输入新货币以及相关数据');
define('TEXT_INFO_DELETE_INTRO', '你确定要删除这种货币吗?');
define('TEXT_INFO_HEADING_NEW_CURRENCY', '新币种');
define('TEXT_INFO_HEADING_EDIT_CURRENCY', '编辑币种');
define('TEXT_INFO_HEADING_DELETE_CURRENCY', '删除币种');
define('TEXT_INFO_SET_AS_DEFAULT', TEXT_SET_DEFAULT . ' (需要手动更新的货币值)');
define('TEXT_INFO_CURRENCY_UPDATED', '汇率 %s (%s) 通过%s更新成功.');

define('ERROR_REMOVE_DEFAULT_CURRENCY', '错误: 默认币种不能被删除. 请设置另一币种为默认币种，然后重新尝试.');
define('ERROR_CURRENCY_INVALID', '错误: 汇率转换 %s (%s) 没有通过 %s 而更新. 这是个有效的货币号码吗?');
define('WARNING_PRIMARY_SERVER_FAILED', '警告: 最初的汇率转换服务 (%s) 失败 %s (%s) - 请尝试其他的汇率转换服务.');
?>