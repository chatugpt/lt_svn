<?php
/**
 * @package admin
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: geo_zones.php 4736 2006-10-13 07:11:44Z drbyte $
 */

define('HEADING_TITLE', '区域定义 - 税种, 支付方式 和配送模式');

define('TABLE_HEADING_COUNTRY', '国家');
define('TABLE_HEADING_COUNTRY_ZONE', '区域');
define('TABLE_HEADING_TAX_ZONES', '区域名称');
define('TABLE_HEADING_TAX_ZONES_DESCRIPTION', '区域描述');
define('TABLE_HEADING_STATUS', '状态');
define('TABLE_HEADING_ACTION', '选项');
//define('TEXT_LEGEND', 'LEGEND: ');
define('TEXT_LEGEND_TAX_AND_ZONES', ': 税种 &amp; 区域定义');
define('TEXT_LEGEND_ONLY_ZONES', ': 只定义区域，不定义税种 ');
define('TEXT_LEGEND_NOT_CONF', ': 未配置');

define('TEXT_INFO_HEADING_NEW_ZONE', '新区域');
define('TEXT_INFO_NEW_ZONE_INTRO', '请输入新区域信息');

define('TEXT_INFO_HEADING_EDIT_ZONE', '编辑区域');
define('TEXT_INFO_EDIT_ZONE_INTRO', '请做必要的修改');

define('TEXT_INFO_HEADING_DELETE_ZONE', '删除区域');
define('TEXT_INFO_DELETE_ZONE_INTRO', '你确定要删除此区域?');

define('TEXT_INFO_HEADING_NEW_SUB_ZONE', '新子区域');
define('TEXT_INFO_NEW_SUB_ZONE_INTRO', '请输入新子区域信息');

define('TEXT_INFO_HEADING_EDIT_SUB_ZONE', '编辑子区域');
define('TEXT_INFO_EDIT_SUB_ZONE_INTRO', '请做必要的修改');

define('TEXT_INFO_HEADING_DELETE_SUB_ZONE', '删除子区域');
define('TEXT_INFO_DELETE_SUB_ZONE_INTRO', '你确定要删除此子区域?');

define('TEXT_INFO_DATE_ADDED', '添加日期:');
define('TEXT_INFO_LAST_MODIFIED', '最后更新:');
define('TEXT_INFO_ZONE_NAME', '区域名称:');
define('TEXT_INFO_NUMBER_ZONES', '区域代号:');
define('TEXT_INFO_ZONE_DESCRIPTION', '描述:');
define('TEXT_INFO_COUNTRY', '国家:');
define('TEXT_INFO_COUNTRY_ZONE', '区域:');
define('TYPE_BELOW', '所有区域');
define('PLEASE_SELECT', '所有区域');
define('TEXT_ALL_COUNTRIES', '所有国家');

define('TEXT_INFO_NUMBER_TAX_RATES','税率数值:');
define('ERROR_TAX_RATE_EXISTS','警告: 定义该区域的税率。在删除该税种时，请先移除该区域');
?>