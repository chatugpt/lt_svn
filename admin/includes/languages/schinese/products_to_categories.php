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
//  $Id: products_to_categories.php 2909 2006-01-29 21:29:35Z ajeh $
//

define('HEADING_TITLE','管理 多级链接产品...');
define('HEADING_TITLE2','分类/产品');

define('TEXT_INFO_PRODUCTS_TO_CATEGORIES_AVAILABLE', '产品类别中的可用链接 ...');

define('TABLE_HEADING_PRODUCTS_ID', '2.签子 ID');
define('TABLE_HEADING_PRODUCT', '产品名字');
define('TABLE_HEADING_MODEL', '型号');
define('TABLE_HEADING_ACTION', '执行');

define('TEXT_INFO_HEADING_EDIT_PRODUCTS_TO_CATEGORIES', '编辑产品类别的信息');
define('TEXT_PRODUCTS_ID', '产品 ID# ');
define('TEXT_PRODUCTS_NAME', '产品: ');
define('TEXT_PRODUCTS_MODEL', '型号: ');
define('TEXT_PRODUCTS_PRICE', '价格: ');
define('BUTTON_UPDATE_CATEGORY_LINKS', '更新分类链接');
define('BUTTON_NEW_PRODUCTS_TO_CATEGORIES', '选择产品链接');
define('TEXT_SET_PRODUCTS_TO_CATEGORIES_LINKS', '设置产品分类链接: ');
define('TEXT_INFO_LINKED_TO_COUNT', '&nbsp;&nbsp;现时有多少个链接分类: ');

define('TEXT_INFO_PRODUCTS_TO_CATEGORIES_LINKER_INTRO',
'对连接产品类别的设计是迅速链接当前产品到一个或多个类别.<br />您也可以链接中的所有类别的产品到另一个类别，或从类别中删除，在另外一类是链接产品。 （请参阅下面的附加说明)');

define('TEXT_INFO_PRODUCTS_TO_CATEGORIES_LINKER',
'有关定价的目的, 每个产品需要一个主类别, 无论有多少个分类可能被链接. 这可以通过设置主类别下拉.<br />
该产品目前链接类别或以上各类检查。要添加一个新的类别或类别只要勾选复选框旁边的类别名称。要删除一个现有的链接或多个类别, 只需取消选中旁边的复选框分类名称.<br />
当您检查所有类别想要本产品关联, 按' . BUTTON_UPDATE_CATEGORY_LINKS . '<br />'
);

define('HEADER_CATEGORIES_GLOBAL_CHANGES', '全分类链接更改和主类别ID复位');

define('TEXT_SET_MASTER_CATEGORIES_ID', '<strong>警告:</strong> 改变链接分类你必须改变主分类');

// copy category to category linked
define('TEXT_INFO_COPY_ALL_PRODUCTS_TO_CATEGORY_LINKED', '<strong>复制所有产品作为关联产品到另一个类别分类 ...</strong><br />示例：使用8 和22将连接所有产品类别8和产品类别22');
define('TEXT_INFO_COPY_ALL_PRODUCTS_TO_CATEGORY_FROM_LINKED', '选择所有的产品分类: ');
define('TEXT_INFO_COPY_ALL_PRODUCTS_TO_CATEGORY_TO_LINKED', '链接到分类: ');
define('BUTTON_COPY_CATEGORY_LINKED', '复制产品链接 ');

define('WARNING_PRODUCTS_LINK_TO_CATEGORY_REMOVED', '警告：产品已复位，再没有这一类的一部分 ...');
define('WARNING_COPY_LINKED', '警告: ');
define('WARNING_COPY_ALL_PRODUCTS_TO_CATEGORY_FROM_LINKED', '来自无效的类别产品的链接: ');
define('WARNING_COPY_ALL_PRODUCTS_TO_CATEGORY_TO_LINKED', '无效的类别产品链接: ');
define('WARNING_NO_CATEGORIES_ID', '警告：没有类别被选定...未进行任何更改');
define('SUCCESS_COPY_LINKED', '成功更新的产品链接 ... ');
define('SUCCESS_COPY_ALL_PRODUCTS_TO_CATEGORY_FROM_LINKED', '有效的分类链接产品从: ');
define('SUCCESS_COPY_ALL_PRODUCTS_TO_CATEGORY_TO_LINKED', '有效的分类链接产品转到: ');

define('WARNING_COPY_FROM_IN_TO_LINKED', '<strong>警告：没有变化的产品已经链接 ... </strong>');

// remove category to category linked
define('TEXT_INFO_REMOVE_ALL_PRODUCTS_TO_CATEGORY_LINKED', '<strong>在一个类别中删除所有产品的链接到另一个类别产品 ...</strong><br />示例：使用8和22将取消链接8类第2类所有产品');
define('TEXT_INFO_REMOVE_ALL_PRODUCTS_TO_CATEGORY_FROM_LINKED', '选择类别中全部产品: ');
define('TEXT_INFO_REMOVE_ALL_PRODUCTS_TO_CATEGORY_TO_LINKED', '除去被链接到的分类: ');
define('BUTTON_REMOVE_CATEGORY_LINKED', '删除链接产品 ');

define('WARNING_REMOVE_LINKED', '警告: ');
define('WARNING_REMOVE_ALL_PRODUCTS_TO_CATEGORY_FROM_LINKED', '删除无效的分类链接产品从: ');
define('WARNING_REMOVE_ALL_PRODUCTS_TO_CATEGORY_TO_LINKED', '删除无效的分类链接产品转到: ');
define('SUCCESS_REMOVE_LINKED', '成功的移除产品链接 ... ');
define('SUCCESS_REMOVE_ALL_PRODUCTS_TO_CATEGORY_FROM_LINKED', '删除有效的分类，链接产品从: ');
define('SUCCESS_REMOVE_ALL_PRODUCTS_TO_CATEGORY_TO_LINKED', '删除有效的分类，链接产品转到 : ');

define('WARNING_REMOVE_FROM_IN_TO_LINKED', '<strong>警告：没有改变，没有相关产品 ... </strong>');

define('WARNING_MASTER_CATEGORIES_ID_CONFLICT', '<strong>警告：主类别ID冲突!! </strong>');
define('TEXT_INFO_MASTER_CATEGORIES_ID_CONFLICT', '<strong>主类别ID是: </strong>');
define('TEXT_INFO_MASTER_CATEGORIES_ID_PURPOSE', '注：主分类定价的目的是用于该产品类别中链接的影响产品价格，例如：销售<br />');
define('WARNING_MASTER_CATEGORIES_ID_CONFLICT_FIX', '要解决这个问题，您已被重定向到冲突的第一个产品。重新分配主类别ID，以便它是为产品类别不再是主类别ID，您正试图将其删除，从后重试。当所有冲突已得到纠正，您将能够完成删除您要求.');
define('TEXT_MASTER_CATEGORIES_ID_CONFLICT_FROM', ' 冲突来自类别: ');
define('TEXT_MASTER_CATEGORIES_ID_CONFLICT_TO', ' 冲突转到类别: ');
define('SUCCESS_MASTER_CATEGORIES_ID', '成功更新产品分类链接 ...');
define('WARNING_MASTER_CATEGORIES_ID', '警告：没有主类别设置!');

define('TEXT_PRODUCTS_ID_INVALID', '警告：无效产品编号或没有选择产品');
define('TEXT_PRODUCTS_ID_NOT_REQUIRED', '注：产品ID并不需要被设置为使用连接所有从一类产品到另一个类别<br />但是，建立一个有效的产品ID将显示所有可用的类别及其ID号.');

// reset all products to new master_categories_id
// copy category to category linked
define('TEXT_INFO_RESET_ALL_PRODUCTS_TO_CATEGORY_MASTER', '<strong>重设所有在选定类别的产品用作新的主分类编号选定的类别 ...</strong><br />例如：重设22个类别将设置22类所有产品用途类别划分的22个类别ID作为主');
define('TEXT_INFO_RESET_ALL_PRODUCTS_TO_CATEGORY_FROM_MASTER', '在分类中为所有产品重置主分类编号 ');
define('BUTTON_RESET_CATEGORY_MASTER', '重设主分类ID');

define('WARNING_RESET_ALL_PRODUCTS_TO_CATEGORY_FROM_MASTER', '警告：无效的分类选择...');
define('SUCCESS_RESET_ALL_PRODUCTS_TO_CATEGORY_FROM_MASTER', '成功更新的所有产品类别编号为新的总分类: ');

?>