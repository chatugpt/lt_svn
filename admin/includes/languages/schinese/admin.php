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
//  $Id: admin.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', '管理设置');

define('TABLE_HEADING_ADMINS_NAME', '管理员名称');
define('TABLE_HEADING_ADMINS_ID', 'ID');
define('TABLE_HEADING_ADMINS_EMAIL', '电子邮箱');
define('TABLE_HEADING_ACTION', '选项');

define('TEXT_HEADING_NEW_ADMIN', '新建');
define('TEXT_HEADING_EDIT_ADMIN', '编辑');
define('TEXT_HEADING_DELETE_ADMIN', '删除');
define('TEXT_HEADING_RESET_PASSWORD', '重设密码');

define('TEXT_ADMINS', '管理员:');
define('TEXT_ADMINS_EMAIL', '电子邮箱:');

define('TEXT_NEW_INTRO', '请填写下面的新管理员信息');
define('TEXT_EDIT_INTRO', '请做任何必要的更改');

define('TEXT_ADMINS_NAME', '管理员名称:');
define('TEXT_ADMINS_PASSWORD', '密码:');
define('TEXT_ADMINS_CONFIRM_PASSWORD', '确认密码:');

define('TEXT_DELETE_INTRO', '您确定删除该管理员吗?');
define('TEXT_DELETE_IMAGE', '删除管理员图像?');


define('ENTRY_PASSWORD_NEW_ERROR', '您的新密码至少要包含' . ENTRY_PASSWORD_MIN_LENGTH . ' 个数字或者字母.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', '确认密码必要和新密码一致.');

define('TEXT_ADMINS_LEVEL','登录的管理员级别:');
define('TEXT_ADMIN_LEVEL_INSTRUCTIONS','设置管理员级别为1将使这个登录时覆盖管理活动.只有管理员级别为1才能在管理活动中更改管理员登录密码.');
define('TEXT_ADMIN_DEMO','改管理活动将使得全功能的管理转变为半功能管理，当你想建立一个演示版本的时候，这样可以减少破坏性。只有当登录管理级别为1的时候才能更改这些设置并且允许所有的管理使用功能，即使在管理演示打开的情况下.<br />记得在激活这些设置下把演示登录级别设置为0');
define('TEXT_DEMO_STATUS','当前的管理演示级别设置为:');
define('TEXT_DEMO_OFF','关');
define('TEXT_DEMO_ON','开');
?>