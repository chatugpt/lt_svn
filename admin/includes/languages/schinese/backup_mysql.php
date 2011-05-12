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
// $Id: backup_mysql.php,v 1.3 2007/04/28 00:00:00 DrByte Exp $
//

// define the locations of the mysql utilities.  Typical location is in '/usr/bin/' ... but not on Windows servers.
// try 'c:/mysql/bin/mysql.exe' and 'c:/mysql/bin/mysqldump.exe' on Windows hosts ... change drive letter and path as needed
define('LOCAL_EXE_MYSQL',     '/usr/bin/mysql');  // used for restores
define('LOCAL_EXE_MYSQLDUMP', '/usr/bin/mysqldump');  // used for backups

// the following are the language definitions
define('HEADING_TITLE', '数据库备份管理 - MySQL');
define('WARNING_NOT_SECURE_FOR_DOWNLOADS','<span class="errorText">注意: SSL未启用，任何在该页面的下载操作都不会加密.');
define('TABLE_HEADING_TITLE', '标题');
define('TABLE_HEADING_FILE_DATE', '日期');
define('TABLE_HEADING_FILE_SIZE', '大小');
define('TABLE_HEADING_ACTION', '操作');

define('TEXT_INFO_HEADING_NEW_BACKUP', '新备份');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', '恢复本地');
define('TEXT_INFO_NEW_BACKUP', '请不要干扰操作，这可能需要几分钟时间.');
define('TEXT_INFO_UNPACK', '<br><br>(解压后)');
define('TEXT_INFO_RESTORE', '请耐心等待恢复操作.<br><br>备份文件越大，处理时间会越长!<br><br>也可以使用sql客户端操作<br><br>如:<br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', '请耐心等待恢复操作.<br><br>备份文件越大，处理时间会越长!');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', '必须上传sql（纯文本）文件.');
define('TEXT_INFO_DATE', '日期:');
define('TEXT_INFO_SIZE', '大小:');
define('TEXT_INFO_COMPRESSION', '压缩:');
define('TEXT_INFO_USE_GZIP', 'GZIP');
define('TEXT_INFO_USE_ZIP', 'ZIP');
define('TEXT_INFO_SKIP_LOCKS', '跳过锁定选项(如果你收到锁定表格权限错误的消息，请查看此项)');
define('TEXT_INFO_USE_NO_COMPRESSION', '不压缩 (纯SQL)');
define('TEXT_INFO_DOWNLOAD_ONLY', '下载到本地');
define('TEXT_INFO_BEST_THROUGH_HTTPS', '(安全HTTPS连接)');
define('TEXT_DELETE_INTRO', '确定删除该备份?');
define('TEXT_NO_EXTENSION', 'None');
define('TEXT_BACKUP_DIRECTORY', '备份目录:');
define('TEXT_LAST_RESTORATION', '上次恢复:');
define('TEXT_FORGET', '(忘记)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', '错误: 备份目录不存在，请在configure.php中配置.');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', '错误: 备份目录不可写.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', '错误: 下载连接不可用.');
define('ERROR_CANT_BACKUP_IN_SAFE_MODE','错误: 当打开safe_mode或者open_basedir选项激活的状态下，此备份脚本不起作用.<br />当你做备份没有收到错误提示信息时，请查看文件是否小于200kb.如果是这样，那么很可能是不可靠的备份.');
define('ERROR_EXEC_DISABLED','错误: 服务器的"exec()"已禁用，请联系主机提供商.');
define('ERROR_FILE_NOT_REMOVEABLE', '错误: 由于服务器配置，您无法移除该文件，请使用ftp软件移除.');

define('SUCCESS_LAST_RESTORE_CLEARED', '成功: 最后恢复日期已更新.');
define('SUCCESS_DATABASE_SAVED', '成功: 数据已保存.');
define('SUCCESS_DATABASE_RESTORED', '成功: 恢复数据库成功.');
define('SUCCESS_BACKUP_DELETED', '成功: 备份已移除.');
define('FAILURE_DATABASE_NOT_SAVED', '失败: 保存数据库失败.');
define('FAILURE_DATABASE_NOT_SAVED_UTIL_NOT_FOUND', '错误: 无法找到MYSQLDUMP备份程序. 备份失败.');
define('FAILURE_DATABASE_NOT_RESTORED', '失败: 数据库没有恢复成功，请认真检查.');
define('FAILURE_DATABASE_NOT_RESTORED_FILE_NOT_FOUND', '失败: 数据库未恢复.  错误: 文件未找到: %s');
define('FAILURE_DATABASE_NOT_RESTORED_UTIL_NOT_FOUND', '错误: 无法找到备份文件. 恢复失败.');
define('FAILURE_BACKUP_FAILED_CHECK_PERMISSIONS','启动 (mysqldump or mysqldump.exe)失败，备份失败.');

// Set this to 'true' if the zip options aren't appearing while doing a backup, and you are certain that gzip support exists on your server
define('COMPRESS_OVERRIDE','假');

?>