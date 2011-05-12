<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2006 The zen-cart developers                           |
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
//  $Id: sqlpatch.php 4138 2006-08-14 05:56:44Z drbyte $
//
  define('HEADING_TITLE','SQL查询执行器');
  define('HEADING_WARNING','确保做到一个完整数据库备份，然后在这里运行脚本');
  define('HEADING_WARNING2','如果您要安装第三方，请注意您这样做你自己的风险.<br />Zen Cart&贸易;不保证其安全的脚本由第三方提供的任何担。测试前，使用你的数据库!');
  define('HEADING_WARNING_INSTALLSCRIPTS', '注: Zen Cart 数据库升级脚本不应从这个网页运行.<br />Please upload the new <strong>安装</strong> 文件夹并运行，而不是从那里升级为更好的可靠性.');
  define('TEXT_QUERY_RESULTS','查询结果:');
  define('TEXT_ENTER_QUERY_STRING','进入查询 <br />要执行:&nbsp;&nbsp;<br /><br />一定要<br />结束 ;');
  define('TEXT_QUERY_FILENAME','上传文件:');
  define('ERROR_NOTHING_TO_DO','错误：没有做的事情 - 没有疑问或查询，文件中指定.');
  define('TEXT_CLOSE_WINDOW', '[ 关闭窗口 ]');
  define('SQLPATCH_HELP_TEXT','该工具允许您安装SQLPATCH粘贴到的SQL代码直接输入该工具允许您安装SQLPATCH粘贴SQL代码直接输入文本域中'.
                              '这个区域，或所提供的上传脚本（。的SQL）文件.<br />' .
                              '在编写脚本可以使用这个工具，不包括表前缀，因为该工具会 ' .
                              '自动插入数据库所需的活跃前缀的基础上，在商店设置\的 ' .
                              'admin/includes/configure.php 文件 (DB_PREFIX definition).<br /><br />' .
                              '这些命令只能输入或上传开始与下面的语句，并且必须是大写:'.
                              '<br /><ul><li>如果存在的删除表</li><li>创建表</li><li>插入</li><li>插入忽略探索</li><li>修改表</li>' .
                              '<li>更新 (只是一个单一的表)</li><li>更新忽略 (只是一个单一的表)</li><li>删除</li><li>删除索引</li><li>创建索引</li>' .
                              '<br /><li>选择</li></ul>' . 
'<h2>高级方法</h2>以下方法可用于更复杂的问题，因为必要的陈述:<br />
要运行一些代码块在一起，使它们作为一个MySQL的命令处理, 你需要 "<code>#NEXT_X_ROWS_AS_ONE_COMMAND:xxx</code>" 值设置.  解析器将视为一个X的命令数目.<br />
如果您运行的是通过phpMyAdmin或相当于此文件,  "#NEXT..." 评论被忽略，并且该脚本将更好的执行.<br />
<br /><strong>注: </strong>SELECT.... FROM... and LEFT JOIN statements need the "FROM" or "LEFT JOIN" 须以本身线解析脚本来添加顺序表前缀.<br /><br />
<em><strong>例如:</strong></em>
<ul><li><code>#NEXT_X_ROWS_AS_ONE_COMMAND:4<br />
SET @t1=0;<br />
SELECT (@t1:=configuration_value) as t1 <br />
FROM configuration <br />
WHERE configuration_key = \'KEY_NAME_HERE\';<br />
UPDATE product_type_layout SET configuration_value = @t1 WHERE configuration_key = \'KEY_NAME_TO_CHECK_HERE\';<br />
DELETE FROM configuration WHERE configuration_key = \'KEY_NAME_HERE\';<br />&nbsp;</li>

<li>#NEXT_X_ROWS_AS_ONE_COMMAND:1<br />
INSERT INTO tablename <br />
(col1, col2, col3, col4)<br />
SELECT col_a, col_b, col_3, col_4<br />
FROM table2;<br />&nbsp;</li>

<li>#NEXT_X_ROWS_AS_ONE_COMMAND:1<br />
INSERT INTO table1 <br />
(col1, col2, col3, col4 )<br />
SELECT p.othercol_a, p.othercol_b, po.othercol_c, pm.othercol_d<br />
FROM table2 p, table3 pm<br />
LEFT JOIN othercol_f po<br />
ON p.othercol_f = po.othercol_f<br />
WHERE p.othercol_f = pm.othercol_f;</li>
</ul></code>' );
  define('REASON_TABLE_ALREADY_EXISTS','无法创建表 %s ，因为它已经存在');
  define('REASON_TABLE_DOESNT_EXIST','无法删除表 %s，因为它不存在.');
  define('REASON_TABLE_NOT_FOUND','无法执行表 %s 因为它不存在.');
  define('REASON_CONFIG_KEY_ALREADY_EXISTS','不能插入关键字 "%s" 因为它已经存在');
  define('REASON_COLUMN_ALREADY_EXISTS','无法添加行 %s 因为它已经存在.');
  define('REASON_COLUMN_DOESNT_EXIST_TO_DROP','不能删除列 %s因为它不存在.');
  define('REASON_COLUMN_DOESNT_EXIST_TO_CHANGE','不能修改列 %s 因为它已经存在.');
  define('REASON_PRODUCT_TYPE_LAYOUT_KEY_ALREADY_EXISTS','无法插入产品-类型-布局配置关键字 "%s"  因为它已经存在');
  define('REASON_INDEX_DOESNT_EXIST_TO_DROP','不能删除索引 %s 在表中 %s 因为它不存在.');
  define('REASON_PRIMARY_KEY_DOESNT_EXIST_TO_DROP','无法在表中删除主键 %s 因为它不存在.');
  define('REASON_INDEX_ALREADY_EXISTS','无法添加索引 %s 在表中 %s 因为它已经存在.');
  define('REASON_PRIMARY_KEY_ALREADY_EXISTS','无法在表中添加主键 %s 因为主键已经存在.');
  define('REASON_NO_PRIVILEGES','用户 '.DB_SERVER_USERNAME.'@'.DB_SERVER.' 没有 %s 数据库权限 '.DB_DATABASE.'.');

?>