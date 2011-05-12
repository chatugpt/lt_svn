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
//  $Id: media_manager.php 4873 2006-11-02 09:12:46Z drbyte $
//

define('HEADING_TITLE_MEDIA_MANAGER', '多媒体管理');

define('TABLE_HEADING_MEDIA', '集合名称');
define('TABLE_HEADING_ACTION', '执行');
define('TEXT_HEADING_NEW_MEDIA_COLLECTION', '新媒体集合');
define('TEXT_NEW_INTRO', '请输入新媒体集合下面的细节');
define('TEXT_MEDIA_COLLECTION_NAME', '媒体集合名称');
define('TEXT_MEDIA_EDIT_INSTRUCTIONS', '使用上面的部分改变媒体集合名称，然后点击保存按钮.<br /><br />
                                        选择使用下面的添加或删除媒体集合媒体剪辑.');
define('TEXT_DATE_ADDED', '添加日期:');
define('TEXT_LAST_MODIFIED', '最近更新:');
define('TEXT_PRODUCTS', '关联产品:');
define('TEXT_CLIPS', '链接剪辑:');
define('TEXT_NO_PRODUCTS', '没有这类产品');
define('TEXT_HEADING_EDIT_MEDIA_COLLECTION', '编辑媒体集合');
define('TEXT_EDIT_INTRO', '请修改下面的新媒体集合详情');
define('TEXT_HEADING_DELETE_MEDIA_COLLECTION', '删除收藏媒体');
define('TEXT_DELETE_INTRO', '你想删除此媒体集合?');
  define('TEXT_DISPLAY_NUMBER_OF_MEDIA', '显示 <strong>%d</strong> 到 <strong>%d</strong> ( <strong>%d</strong> 媒体集合)');
define('TEXT_ADD_MEDIA_CLIP', '添加媒体剪辑');
define('TEXT_MEDIA_CLIP_DIR', '上传到媒体目录');
define('TEXT_MEDIA_CLIP_TYPE', '媒体剪辑类型');
define('TEXT_HEADING_ASSIGN_MEDIA_COLLECTION', '指定媒体集合到产品');
define('TEXT_PRODUCTS_INTRO', '您可以指定和删除下面的产品使用这种媒体形式收集.');
define('IMAGE_PRODUCTS', '分配到产品');
define('TEXT_DELETE_PRODUCTS', '删除该媒体收集和与之相关联的所有项目?');
define('TEXT_DELETE_WARNING_PRODUCTS', '<strong>警告:</strong>有  %s 项目依然与这个媒体集合!');
define('TEXT_WARNING_FOLDER_UNWRITABLE', '注：媒体文件夹 ' . DIR_FS_CATALOG_MEDIA . ' 不可写。不能上传文件.');

define('ERROR_UNKNOWN_DATA', '错误：未知的资料提供...操作取消');
define('TEXT_ADD','添加');


?>