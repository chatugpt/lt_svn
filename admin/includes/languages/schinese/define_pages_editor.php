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
// $Id: define_pages_editor.php 1969 2005-09-13 06:57:21Z drbyte $
//

define('HEADING_TITLE', '为。。。定义页面编辑: ');
define('NAVBAR_TITLE', '定义页面编辑');

define('TEXT_INFO_EDIT_PAGE', '选择一个页面以编辑:');

define('TEXT_INFO_MAIN_PAGE', '主页');

define('TEXT_INFO_SHIPPINGINFO', '运送和退货');
define('TEXT_INFO_PRIVACY', '隐私');
define('TEXT_INFO_CONDITIONS', '使用条件');
define('TEXT_INFO_CONTACT_US', '联系我们');
define('TEXT_INFO_CHECKOUT_SUCCESS', '结账成功');

define('TEXT_INFO_PAGE_2', '页面 2');
define('TEXT_INFO_PAGE_3', '页面 3');
define('TEXT_INFO_PAGE_4', '页面 4');

define('TEXT_FILE_DOES_NOT_EXIST', '文件不存在: %s');

define('ERROR_FILE_NOT_WRITEABLE', '错误: 该文件不可写。请设置合法的用户权限在: %s');

define('TEXT_INFO_SELECT_FILE', '选择一个页面以编辑 ...');
define('TEXT_INFO_EDITING', '编辑文件:');

define('TEXT_INFO_CAUTION','注意: 你可以编辑当前模板下的文件以覆盖原先的文件, 例如: /languages/' . $_SESSION['language'] . '/html_includes/' . $template_dir . '<br />请在更改您的文件之前先做好备份.');
?>