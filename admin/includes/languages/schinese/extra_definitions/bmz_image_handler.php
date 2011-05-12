<?php
/**
 * bmz_image_handler.php
 * english language definitions for image handler
 *
 * @author  Tim Kroeger <tim@breakmyzencart.com>
 * @author  Sam Lown
 * @copyright Copyright 2005-2006 breakmyzencart.com
 * @license http://www.gnu.org/licenses/gpl.txt GNU General Public License V2.0
 * @version $Id: bmz_image_handler.php,v 1.6 2006/05/01 12:13:12 tim Exp $
 */

define('BOX_TOOLS_IMAGE_HANDLER', '图片处理器<sup>2</sup>');
define('ICON_IMAGE_HANDLER','图片处理器 2');
define('IH_VERSION_VERSION', '版本');
define('IH_VERSION_NOT_FOUND', '没有找到图片处理器.');
define('IH_REMOVE', '从数据库中移除图片处理器');
define('IH_CONFIRM_REMOVE', '确定？');
define('IH_REMOVED', '成功移除图片处理器。');
define('IH_UPDATE', '更新图片处理器。');
define('IH_UPDATED', '成功更新图片处理器。');
define('IH_INSTALL', '安装图片处理器。');
define('IH_INSTALLED', '成功安装图片处理器。');
define('IH_SCAN_FOR_ORIGINALS', '扫描旧格式 IH 0.1和IH1.1格式的<em>原始</em>图片');
define('IH_CONFIRM_IMPORT', '你确定要导入所列的图片么?<br /><strong>请先备份你的数据库和图片文件夹!</strong>');
define('IH_NO_ORIGINALS', '没有发现旧式的IH 0.x或者 IH 1.x格式的原始图片');
define('IH_IMAGES_IMPORTED', '图片导入成功');
define('IH_CLEAR_CACHE', '清除图片缓存');
define('IH_CACHE_CLEARED', '图片缓存清除.');

define('IH_SOURCE_TYPE', '原始图片类型');
define('IH_SOURCE_IMAGE', '原始图片');
define('IH_SMALL_IMAGE', '默认图片');
define('IH_MEDIUM_IMAGE', '产品图片');

define('IH_ADD_NEW_IMAGE', '新添一个图片');
define('IH_NEW_NAME_DISCARD_IMAGES', '使用新名称，丢弃其他图片');
define('IH_NEW_NAME_COPY_IMAGES', '使用新名称，复制其他图片');
define('IH_KEEP_NAME', '保留原有名称和产生额外的图像');
define('IH_DELETE_FROM_DB_ONLY', '只从数据库中删除参考图片');

define('IH_HEADING_TITLE', '图像处理程序<sup>2</sup>');
define('IH_HEADING_TITLE_PRODUCT_SELECT','请选择一个产品替换图像.');

define('TABLE_HEADING_PHOTO_NAME', '图片名称');
define('TABLE_HEADING_DEFAULT_SIZE','默认尺寸');
define('TABLE_HEADING_MEDIUM_SIZE', '中等尺寸');
define('TABLE_HEADING_LARGE_SIZE','大尺寸');
define('TABLE_HEADING_ACTION', '动作');

define('TEXT_PRODUCT_INFO', '产品');
define('TEXT_PRODUCTS_MODEL', '类型');
define('TEXT_IMAGE_BASE_DIR', '根目录');
define('TEXT_NO_PRODUCT_IMAGES', '该产品每图像');
define('TEXT_CLICK_TO_ENLARGE', '点击放大');
define('TEXT_PRICED_BY_ATTRIBUTES', '安属性定价');
 
define('TEXT_INFO_IMAGE_INFO', '图片信息');
define('TEXT_INFO_NAME', '名称');
define('TEXT_INFO_FILE_TYPE', '文件类型');
define('TEXT_INFO_EDIT_PHOTO', '编辑图片');
define('TEXT_INFO_NEW_PHOTO', '新图片');
define('TEXT_INFO_IMAGE_BASE_NAME', '图像的基本名称（可选）');
define('TEXT_INFO_AUTOMATIC_FROM_DEFAULT', ' 自动（从默认的图像的名称）');
define('TEXT_INFO_MAIN_DIR', '主目录');
define('TEXT_INFO_BASE_DIR', '图片根目录');
define('TEXT_INFO_NEW_DIR', '为图片选择或者定义一个新目录.');
define('TEXT_INFO_IMAGE_DIR', '图片目录');
define('TEXT_INFO_OR', '或者');
define('TEXT_INFO_AUTOMATIC', '自动');
define('TEXT_INFO_IMAGE_SUFFIX', '图片后缀（可选）');
define('TEXT_INFO_USE_AUTO_SUFFIX','输入一个新后缀或者留空自动选择');
define('TEXT_INFO_DEFAULT_IMAGE', '默认图片文件');
define('TEXT_INFO_DEFAULT_IMAGE_HELP', '默认图像必须被定义。当图片被选定为中等或者大尺寸时，默认的图像被假定为最小的.');
define('TEXT_INFO_CONFIRM_DELETE', "确定删除");
define('TEXT_INFO_CONFIRM_DELETE_SURE', '你确定要删除该图片和它的全部大小规格？');
define('TEXT_INFO_SELECT_ACTION', '选项');
define('TEXT_INFO_CLICK_TO_ADD', '点击为此产品添加新图片');

define('TEXT_MSG_AUTO_BASE_ERROR', '没有默认文件时自动选择根目录文件.');
define('TEXT_MSG_INVALID_BASE_ERROR', '无效的图片名称，或者找不到默认图片.');
define('TEXT_MSG_AUTO_REPLACE',  '自动替换原名称，新名称的不文明字符 ');
define('TEXT_MSG_INVALID_SUFFIX', '无效的图片后缀.');
define('TEXT_MSG_IMAGE_TYPES_NOT_SAME_ERROR', '图像类型不一致.');
define('TEXT_MSG_DEFAULT_REQUIRED_FOR_RESIZE', '默认图像需要自动调整大小.');
define('TEXT_MSG_NO_DEFAULT', '没有指定默认图像');
define('TEXT_MSG_FILE_EXISTS', '文件不存在，请修改文件名或者文件后缀.');
define('TEXT_MSG_INVALID_SQL', "SQL语句查询失败.");
define('TEXT_MSG_NOCREATE_IMAGE_DIR', "创建图片文件夹目录失败.");
define('TEXT_MSG_NOCREATE_MEDIUM_IMAGE_DIR', "创建中型图片文件夹失败.");
define('TEXT_MSG_NOCREATE_LARGE_IMAGE_DIR', "创建大型文件夹目录失败.");
define('TEXT_MSG_NOPERMS_IMAGE_DIR', "无法设置图像的目录的权限.");
define('TEXT_MSG_NOPERMS_MEDIUM_IMAGE_DIR', "无法设置中型图片文件夹的权限.");
define('TEXT_MSG_NOPERMS_LARGE_IMAGE_DIR', "无法设置大型图片文件夹的权限.");

define('TEXT_MSG_NOUPLOAD_DEFAULT', "默认图片文件夹上传失败.");
define('TEXT_MSG_NORESIZE', "不能调整图片大小");
define('TEXT_MSG_NOCOPY_LARGE', "大图片文件夹复制失败.");
define('TEXT_MSG_NOCOPY_MEDIUM', "中等图片文件夹复制失败.");
define('TEXT_MSG_NOCOPY_DEFAULT', "默认图片文件夹复制失败.");
define('TEXT_MSG_NOPERMS_LARGE', "设置大图片文件夹权限失败.");
define('TEXT_MSG_NOPERMS_MEDIUM', "设置中等图片文件夹权限失败.");
define('TEXT_MSG_NOPERMS_DEFAULT', "设置默认图片文件夹权限失败.");
define('TEXT_MSG_IMAGE_SAVED', '成功保存图片.');
define('TEXT_MSG_LARGE_DELETED', '删除大图片.');
define('TEXT_MSG_NO_DELETE_LARGE', '删除大图片失败.');
define('TEXT_MSG_MEDIUM_DELETED', '删除中等图片.');
define('TEXT_MSG_NO_DELETE_MEDIUM', '删除中等图片失败.');
define('TEXT_MSG_DEFAULT_DELETED', '删除默认图片.');
define('TEXT_MSG_NO_DELETE_DEFAULT', '删除默认图片失败.');
define('TEXT_MSG_NO_DEFAULT_FILE_FOUND', "没有找到要删除的默认图片.");

define('TEXT_MSG_IMAGE_DELETED', '删除图片成功.');
define('TEXT_MSG_IMAGE_NOT_FOUND', '找不到图片.');
define('TEXT_MSG_IMAGE_NOT_DELETED', '删除图片失败.');

define('TEXT_MSG_IMPORT_SUCCESS', '导入成功 ：');
define('TEXT_MSG_IMPORT_FAILURE', '导入失败： ');
