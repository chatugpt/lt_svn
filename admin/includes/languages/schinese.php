<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: english.php 7440 2007-11-17 21:51:35Z drbyte $
 */

// added defines for header alt and text
define('MODULES_SHIPPING_HEAD_TITLE', '物流模块');
define('MODULES_PAYMENT_HEAD_TITLE', '支付模块');
define('MODULES_ORDERTOTAL_HEAD_TITLE', '总额计算');

define('HEADER_ALT_TEXT', 'VGoldZone授权管理');
define('HEADER_LOGO_WIDTH', '263px');
define('HEADER_LOGO_HEIGHT', '46px');
define('HEADER_LOGO_IMAGE', 'logo.gif');

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..
setlocale(LC_TIME, 'en_US.ISO_8859-1');
define('DATE_FORMAT_SHORT', '%m/%d/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('DATE_FORMAT_SPIFFYCAL', 'MM/dd/yyyy');  //Use only 'dd', 'MM' and 'yyyy' here in any order

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function zen_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}

// removed for meta tags
// page title
//define('TITLE', 'Zen Cart');

// include template specific meta tags defines
  if (file_exists(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/meta_tags.php')) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . 'meta_tags.php');
//die(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . 'meta_tags.php');

// meta tags
define('ICON_METATAGS_ON', 'Meta Tags定义');
define('ICON_METATAGS_OFF', 'Meta Tags未定义');
define('TEXT_LEGEND_META_TAGS', 'Meta Tags是否定义:');
define('TEXT_INFO_META_TAGS_USAGE', '<strong>注意:</strong> 你在meta_tags.php文件对你的网页，标签进行定义');

// Global entries for the <html> tag   你对你的网页，标签的所有定义在
define('HTML_PARAMS','dir="ltr" lang="en"');

// charset for web pages and emails
define('CHARSET', 'utf-8');

// header text in includes/header.php
define('HEADER_TITLE_TOP', '管理首页');
define('HEADER_TITLE_SUPPORT_SITE', '支持网站');
define('HEADER_TITLE_ONLINE_CATALOG', '网店首页');
define('HEADER_TITLE_VERSION', '版本');
define('HEADER_TITLE_LOGOFF', '退出系统');
//define('HEADER_TITLE_ADMINISTRATION', 'Administration');

// Define the name of your Gift Certificate as Gift Voucher, Gift Certificate, Zen Cart Dollars, etc. here for use through out the shop
  define('TEXT_GV_NAME','礼券');
  define('TEXT_GV_NAMES','礼券');
  define('TEXT_DISCOUNT_COUPON', '优惠券');

// used for redeem code, redemption code, or redemption id
  define('TEXT_GV_REDEEM','兑换号码');

// text for gender
define('MALE', '男');
define('FEMALE', '女');

// text for date of birth example
define('DOB_FORMAT_STRING', 'mm/dd/yyyy');

// configuration box text in includes/boxes/configuration.php
define('BOX_HEADING_CONFIGURATION', '商店配置');
define('BOX_CONFIGURATION_MYSTORE', '基本配置');
define('BOX_CONFIGURATION_LOGGING', '登陆');
define('BOX_CONFIGURATION_CACHE', '缓存');

// modules box text in includes/boxes/modules.php
define('BOX_HEADING_MODULES', '模块管理');
define('BOX_MODULES_PAYMENT', '支付模块');
define('BOX_MODULES_SHIPPING', '物流模块');
define('BOX_MODULES_ORDER_TOTAL', '总额计算');
define('BOX_MODULES_DSF_SHIPPING', '4PX运送');
define('BOX_MODULES_PRODUCT_TYPES', '产品类型');

// categories box text in includes/boxes/catalog.php
define('BOX_HEADING_CATALOG', '商品管理');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', '商品分类');
define('BOX_CATALOG_PRODUCT_TYPES', '商品类型');
define('BOX_CATALOG_CATEGORIES_OPTIONS_NAME_MANAGER', '选项名称');
define('BOX_CATALOG_CATEGORIES_OPTIONS_VALUES_MANAGER', '选项内容');
define('BOX_CATALOG_MANUFACTURERS', '厂商管理');
define('BOX_CATALOG_REVIEWS', '评论管理');
define('BOX_CATALOG_SPECIALS', '特价商品');
define('BOX_CATALOG_FEATURED','推荐商品');
define('BOX_CATALOG_PRODUCTS_EXPECTED', '预售商品');
define('BOX_CATALOG_SALEMAKER', '促销管理');
define('BOX_CATALOG_PRODUCTS_PRICE_MANAGER', '价格管理');
  define('BOX_CATALOG_PRODUCT_OPTIONS_VALUES','Option Value排序');
  define('BOX_CATALOG_PRODUCT_OPTIONS_NAME','Option Name排序');
  define('BOX_CATALOG_CATEGORIES_ATTRIBUTES_CONTROLLER','选项控制');
define('BOX_CATALOG_CATEGORIES_ATTRIBUTES_DOWNLOADS_MANAGER', '下载管理');

// customers box text in includes/boxes/customers.php
define('BOX_HEADING_CUSTOMERS', '客户管理');
define('BOX_CUSTOMERS_CUSTOMERS', '客户资料');
define('BOX_CUSTOMERS_ORDERS', '订单管理');
define('BOX_CUSTOMERS_GROUP_PRICING', '团体价格');
define('BOX_CUSTOMERS_PAYPAL', 'PayPal付款通知（IPN）');
define('BOX_CUSTOMERS_CREDIT', '商店信用');

// taxes box text in includes/boxes/taxes.php
define('BOX_HEADING_LOCATION_AND_TAXES', '地区/税率');
define('BOX_TAXES_COUNTRIES', '国家代码');
define('BOX_TAXES_ZONES', '地区代码');
define('BOX_TAXES_GEO_ZONES', '地区设置');
define('BOX_TAXES_TAX_CLASSES', '税率种类');
define('BOX_TAXES_TAX_RATES', '税率管理');

// reports box text in includes/boxes/reports.php
define('BOX_HEADING_REPORTS', '分析系统');
define('BOX_REPORTS_PRODUCTS_VIEWED', '访问统计');
define('BOX_REPORTS_PRODUCTS_PURCHASED', '销售统计');
define('BOX_REPORTS_ORDERS_TOTAL', '订单统计');
define('BOX_REPORTS_PRODUCTS_LOWSTOCK', '商品库存');
define('BOX_REPORTS_CUSTOMERS_REFERRALS', '客户推荐');
define('BOX_REPORTS_SEARCH_LOG', '搜索记录');

// tools text in includes/boxes/tools.php
define('BOX_HEADING_TOOLS', '工具');
define('BOX_TOOLS_ADMIN', '管理设置');
define('BOX_TOOLS_TEMPLATE_SELECT', '模板选择');
define('BOX_TOOLS_BACKUP', '数据库备份');
define('BOX_TOOLS_BANNER_MANAGER', '广告组管理');
define('BOX_TOOLS_EMAIL_WELCOME','欢迎邮件');
// column controller
define('BOX_TOOLS_LAYOUT_CONTROLLER','外观控制');
define('BOX_TOOLS_CACHE', '缓存控制');
define('BOX_TOOLS_DEFINE_LANGUAGE', '语言定义');
define('BOX_TOOLS_FILE_MANAGER', '文件管理员');
define('BOX_TOOLS_MAIL', '发送邮件');
define('BOX_TOOLS_EDM', 'EDM营销');
define('BOX_TOOLS_NEWSLETTER_MANAGER', '电子商情/商品通知');
define('BOX_TOOLS_SERVER_INFO', '服务器/版本信息');
define('BOX_TOOLS_WHOS_ONLINE', '谁在线上？');
define('BOX_TOOLS_STORE_MANAGER', '存储管理');
define('BOX_TOOLS_DEVELOPERS_TOOL_KIT', '开发人员工具');
define('BOX_TOOLS_SQLPATCH','安装SQL脚本');
define('BOX_TOOLS_EZPAGES','简易页面管理EZ-Pages');
define('BOX_TOOLS_POPULATE', '批量上传');

define('BOX_HEADING_EXTRAS', '其他');

// define pages editor files
define('BOX_TOOLS_DEFINE_PAGES_EDITOR','简单页管理');
define('BOX_TOOLS_DEFINE_MAIN_PAGE', '主页');
define('BOX_TOOLS_DEFINE_CONTACT_US','联系我们');
define('BOX_TOOLS_DEFINE_PRIVACY','隐私声明');
define('BOX_TOOLS_DEFINE_SHIPPINGINFO','关于直发');
define('BOX_TOOLS_DEFINE_CONDITIONS','使用条件');
define('BOX_TOOLS_DEFINE_CHECKOUT_SUCCESS','检验成功');
define('BOX_TOOLS_DEFINE_PAGE_2','页面二');
define('BOX_TOOLS_DEFINE_PAGE_3','页面三');
define('BOX_TOOLS_DEFINE_PAGE_4','页面四');


// localizaion box text in includes/boxes/localization.php
define('BOX_HEADING_LOCALIZATION', '界面设定');
define('BOX_LOCALIZATION_CURRENCIES', '货币代码');
define('BOX_LOCALIZATION_LANGUAGES', '语言代码');
define('BOX_LOCALIZATION_ORDERS_STATUS', '订单状态');

// gift vouchers box text in includes/boxes/gv_admin.php
define('BOX_HEADING_GV_ADMIN', TEXT_GV_NAME . '/优惠券');
define('BOX_GV_ADMIN_QUEUE',  TEXT_GV_NAMES . ' 列表');
define('BOX_GV_ADMIN_MAIL', 'E-mail ' . TEXT_GV_NAME);
define('BOX_GV_ADMIN_SENT', TEXT_GV_NAMES . ' 发放');
define('BOX_COUPON_ADMIN','优惠券管理');

define('IMAGE_RELEASE', 'Redeem ' . TEXT_GV_NAME);

// javascript messages    
define('JS_ERROR', '对表单的操作错误!\n请做一下修整:\n\n');

define('JS_OPTIONS_VALUE_PRICE', '*  新产品需要一个价格属性\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* 新产品属性需要一个价格前缀\n');

define('JS_PRODUCTS_NAME', '* 新产品需要一个名字\n');
define('JS_PRODUCTS_DESCRIPTION', '* 新产品需要描述\n');
define('JS_PRODUCTS_PRICE', '* 新产品需要一个价格值\n');
define('JS_PRODUCTS_WEIGHT', '* 新产品需要一个权重值\n');
define('JS_PRODUCTS_QUANTITY', '* 新产品需求数量值\n');
define('JS_PRODUCTS_MODEL', '* 新产品需要一个型号值\n');
define('JS_PRODUCTS_IMAGE', '* 新产品需要一个图片\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* 这个产品需要设置新的价格\n');

define('JS_GENDER', '* 必须选择性别.\n');
define('JS_FIRST_NAME', '* 名字至少需要 ' . ENTRY_FIRST_NAME_MIN_LENGTH . '个字.\n');
define('JS_LAST_NAME', '* 姓氏至少需要 ' . ENTRY_LAST_NAME_MIN_LENGTH . ' 个字.\n');
define('JS_DOB', '* 出生日期的形式必须是: xx/xx/xxxx (month/date/year).\n');
define('JS_EMAIL_ADDRESS', '* E-Mail的长度的至少要' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' 个字符.\n');
define('JS_ADDRESS', '* 地址至少要 ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' 个字符.\n');
define('JS_POST_CODE', '* 邮政编号至少要 ' . ENTRY_POSTCODE_MIN_LENGTH . ' 个数字.\n');
define('JS_CITY', '* 城市必须至少要 ' . ENTRY_CITY_MIN_LENGTH . ' 个字符.\n');
define('JS_STATE', '* 必须选择国家.\n');
define('JS_STATE_SELECT', '-- 以上选择 --');
define('JS_ZONE', '* 国家选项必须从这份国家名单中选择.');
define('JS_COUNTRY', '* 必须选择地区.\n');
define('JS_TELEPHONE', '* 电话号码必须至少需要 ' . ENTRY_TELEPHONE_MIN_LENGTH . ' 个数字.\n');
define('JS_PASSWORD', '* 密码和密码确认必须一致并且至少需要' . ENTRY_PASSWORD_MIN_LENGTH . ' 个数字或者字母.\n');

define('JS_ORDER_DOES_NOT_EXIST', '订单号 %s 不存在!');

define('CATEGORY_PERSONAL', '个人的');
define('CATEGORY_ADDRESS', '地址');
define('CATEGORY_CONTACT', '联系方式');
define('CATEGORY_COMPANY', '公司');
define('CATEGORY_OPTIONS', '选项');

define('ENTRY_GENDER', '性别:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">需要</span>');
define('ENTRY_FIRST_NAME', 'First Name:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_LAST_NAME', 'Last Name:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_LAST_NAME_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_DATE_OF_BIRTH', '出生日期:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(eg. 05/21/1970)</span>');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail 地址:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">邮箱地址不合法!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">该邮箱地址已存在!</span>');
define('ENTRY_COMPANY', '公司名称:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_PRICING_GROUP', '团购优惠价格');
define('ENTRY_STREET_ADDRESS', '地址:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_SUBURB', '郊区:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_POST_CODE', '邮政编号:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_POSTCODE_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_CITY', '城市:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_CITY_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_STATE', '洲:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">需要</span>');
define('ENTRY_COUNTRY', '国家:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_TELEPHONE_NUMBER', '电话号码:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">至少 ' . ENTRY_TELEPHONE_MIN_LENGTH . ' 个字符</span>');
define('ENTRY_FAX_NUMBER', '传真:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_NEWSLETTER', '摘要:');
define('ENTRY_NEWSLETTER_YES', '订阅');
define('ENTRY_NEWSLETTER_NO', '退订');
define('ENTRY_NEWSLETTER_ERROR', '');

// images
//define('IMAGE_ANI_SEND_EMAIL', 'Sending E-Mail');
define('IMAGE_BACK', '后退');
define('IMAGE_BACKUP', '备用');
define('IMAGE_CANCEL', '删除');
define('IMAGE_CONFIRM', '确认');
define('IMAGE_COPY', '拷贝');
define('IMAGE_COPY_TO', '拷贝到');
define('IMAGE_DETAILS', '细节');
define('IMAGE_DELETE', '删除');
define('IMAGE_EDIT', '编辑');
define('IMAGE_EMAIL', 'Email');
define('IMAGE_FILE_MANAGER', '文件管理员');
define('IMAGE_ICON_STATUS_GREEN', '激活的');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', '激活');
define('IMAGE_ICON_STATUS_RED', '未激活的');
define('IMAGE_ICON_STATUS_RED_LIGHT', '设为未激活的');
define('IMAGE_ICON_STATUS_RED_EZPAGES', '错误 -- 太多的网址/内容类型进入');
define('IMAGE_ICON_STATUS_RED_ERROR', '错误');
define('IMAGE_ICON_INFO', '信息');
define('IMAGE_INSERT', '插入');
define('IMAGE_LOCK', '锁定');
define('IMAGE_MODULE_INSTALL', '安装模块');
define('IMAGE_MODULE_REMOVE', '移除模块');
define('IMAGE_MOVE', '移除');
define('IMAGE_NEW_BANNER', '新标头');
define('IMAGE_NEW_CATEGORY', '新类别');
define('IMAGE_NEW_COUNTRY', '新国家');
define('IMAGE_NEW_CURRENCY', '新币种');
define('IMAGE_NEW_FILE', '新文件');
define('IMAGE_NEW_FOLDER', '新文件夹');
define('IMAGE_NEW_LANGUAGE', '新语言');
define('IMAGE_NEW_NEWSLETTER', '新简讯');
define('IMAGE_NEW_PRODUCT', '新产品');
define('IMAGE_NEW_SALE', '新售出');
define('IMAGE_NEW_TAX_CLASS', '新税级');
define('IMAGE_NEW_TAX_RATE', '新税率');
define('IMAGE_NEW_TAX_ZONE', '新税区');
define('IMAGE_NEW_ZONE', '新地区');
define('IMAGE_OPTION_NAMES', '名称选项管理');
define('IMAGE_OPTION_VALUES', '价值选项管理');
define('IMAGE_ORDERS', '订单');
define('IMAGE_ORDERS_INVOICE', '未声明');
define('IMAGE_ORDERS_PACKINGSLIP', '装箱单');
define('IMAGE_PREVIEW', '预览');
define('IMAGE_RESTORE', '储存');
define('IMAGE_RESET', '重置');
define('IMAGE_SAVE', '保存');
define('IMAGE_SEARCH', '搜索');
define('IMAGE_SELECT', '选择');
define('IMAGE_SEND', '发送');
define('IMAGE_SEND_EMAIL', '发送邮件');
define('IMAGE_UNLOCK', '解锁');
define('IMAGE_UPDATE', '更新');
define('IMAGE_UPDATE_CURRENCIES', '更新交换利率');
define('IMAGE_UPLOAD', '上传');
define('IMAGE_TAX_RATES','税率');
define('IMAGE_DEFINE_ZONES','定义地区');
define('IMAGE_PERMISSIONS', '编辑权限');
define('IMAGE_PRODUCTS_PRICE_MANAGER', '产品价格管理');
define('IMAGE_UPDATE_PRICE_CHANGES', '更新价格');
define('IMAGE_ADD_BLANK_DISCOUNTS','Add ' . DISCOUNT_QTY_ADD . '空白折扣数量');
define('IMAGE_CHECK_VERSION', '检查是否有Zen Cart新版本');
define('IMAGE_PRODUCTS_TO_CATEGORIES', '多级链路管理');

define('IMAGE_ICON_STATUS_ON', '状态 - 启用');
define('IMAGE_ICON_STATUS_OFF', '状态 - 禁用');
define('IMAGE_ICON_LINKED', '产品已链接');

define('IMAGE_REMOVE_SPECIAL','移除特价产品信息');
define('IMAGE_REMOVE_FEATURED','移除精选产品信息');
define('IMAGE_INSTALL_SPECIAL', '增加特价产品信息');
define('IMAGE_INSTALL_FEATURED', '增加精选产品信息');

define('ICON_PRODUCTS_PRICE_MANAGER','产品价格管理');
define('ICON_COPY_TO', '复制到');
define('ICON_CROSS', 'False');
define('ICON_CURRENT_FOLDER', '当前目录');
define('ICON_DELETE', '删除');
define('ICON_EDIT', '编辑');
define('ICON_ERROR', '错误');
define('ICON_FILE', '文件');
define('ICON_FILE_DOWNLOAD', '下载');
define('ICON_FOLDER', '目录');
//define('ICON_LOCKED', 'Locked');
define('ICON_MOVE', '移动');
define('ICON_PERMISSIONS', '权限');
define('ICON_PREVIOUS_LEVEL', '上一级');
define('ICON_PREVIEW', '预览');
define('ICON_RESET', '重置');
define('ICON_STATISTICS', '统计');
define('ICON_SUCCESS', '成功');
define('ICON_TICK', '真');
//define('ICON_UNLOCKED', 'Unlocked');
define('ICON_WARNING', '警告');

// constants for use in zen_prev_next_display function
define('TEXT_RESULT_PAGE', 'Page %s of %d');
define('TEXT_DISPLAY_NUMBER_OF_ADMINS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>个管理员)');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>个标头)');
define('TEXT_DISPLAY_NUMBER_OF_CATEGORIES', '显示<b>%d</b> 至<b>%d</b> f <b>%d</b>个类别)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>个国家)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>各客户)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>币种)');
define('TEXT_DISPLAY_NUMBER_OF_FEATURED', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>种精选产品)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> 种语言)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>个制造商)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> 条简讯)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> 个订单)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>订单状态)');
define('TEXT_DISPLAY_NUMBER_OF_PRICING_GROUPS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>价格组)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> 产品)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCT_TYPES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>产品类型)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', '显示<b>%d</b> 至<b>%d</b> (of <b>%d</b>预期产品)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>产品评论)');
define('TEXT_DISPLAY_NUMBER_OF_SALES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> sales)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>特价产品)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', '显示<b>%d</b> 至<b>%d</b>( <b>%d</b>课税)');
define('TEXT_DISPLAY_NUMBER_OF_TEMPLATES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>模板协会)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>税区)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b>税率)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> 地区)');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');


define('TEXT_DEFAULT', '默认');
define('TEXT_SET_DEFAULT', '设为默认');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* 需要</span>');

define('ERROR_NO_DEFAULT_CURRENCY_DEFINED', '错误: 当前没有默认币种. 请选择一种: Administration Tools->Localization->Currencies');

define('TEXT_CACHE_CATEGORIES', '分类项');
define('TEXT_CACHE_MANUFACTURERS', '厂商项');
define('TEXT_CACHE_ALSO_PURCHASED', '同时购买模块');

define('TEXT_NONE', '--空--');
define('TEXT_TOP', '顶级');

define('ERROR_DESTINATION_DOES_NOT_EXIST', '错误: 目标路径不存在 %s');
define('ERROR_DESTINATION_NOT_WRITEABLE', '错误: 目标路径不可写 %s');
define('ERROR_FILE_NOT_SAVED', ': 上传的文件没有保存。');
define('ERROR_FILETYPE_NOT_ALLOWED', '错误: 不允许上传该类型文件  %s');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', '成功: 文件上传成功 %s');
define('WARNING_NO_FILE_UPLOADED', '警告:没有上传文件.');
define('WARNING_FILE_UPLOADS_DISABLED', '警告: php.ini配置文件不允许文件上传.');
define('ERROR_ADMIN_SECURITY_WARNING', '警告:您的登录管理不安全 ... 你仍然使用默认的登录设置方式:管理员管理没有移除或者变更：演示<br />为了您的商店安全，请尽快改变登录方式<br />请在Tools->Admin Settings下改变登录ID和密码.<br />另外的，为了安全，请查看文档');
define('WARNING_DATABASE_VERSION_OUT_OF_DATE','您的数据库需要修补. 通过Tools->Server Information查看数据库水平.');
define('WARN_DATABASE_VERSION_PROBLEM','真'); //set to false to turn off warnings about database version mismatches
define('WARNING_ADMIN_DOWN_FOR_MAINTENANCE', '<strong>警告:</strong>网站目前设置为停机维护 ...<br />通告: 在维护模式下，你不能测试大部分的支付和运送模块');
define('WARNING_BACKUP_CFG_FILES_TO_DELETE', '警告: 这些文件应该被删除，以防止安全漏洞: ');
define('WARNING_INSTALL_DIRECTORY_EXISTS', '警告: 安装路径在: ' . DIR_FS_CATALOG . 'zc_install. 为了系统安装，请移除.');
define('WARNING_CONFIG_FILE_WRITEABLE', '警告: 您的配置文件: %sincludes/configure.php.这是潜在的安全隐患 - 请在该文件设置正确的使用权限(只读, CHMOD 644 or 444是典型的方法).  <a href="http://tutorials.zen-cart.com/index.php?article=90" target="_blank">请查看FAQ</a>');
define('WARNING_COULD_NOT_LOCATE_LANG_FILE', '警告: 找不到语言文件: ');
define('ERROR_MODULE_REMOVAL_PROHIBITED', '错误: 取消模块移除: ');

define('_JANUARY', '一月');
define('_FEBRUARY', '二月');
define('_MARCH', '三月');
define('_APRIL', '四月');
define('_MAY', '五月');
define('_JUNE', '六月');
define('_JULY', '七月');
define('_AUGUST', '八月');
define('_SEPTEMBER', '九月');
define('_OCTOBER', '十月');
define('_NOVEMBER', '十一月');
define('_DECEMBER', '十二月');

define('TEXT_DISPLAY_NUMBER_OF_GIFT_VOUCHERS', '显示<b>%d</b> 至<b>%d</b> (of <b>%d</b>礼券)');
define('TEXT_DISPLAY_NUMBER_OF_COUPONS', '显示<b>%d</b> 至<b>%d</b> (of <b>%d</b> 礼券)');

define('TEXT_VALID_PRODUCTS_LIST', '产品列表');
define('TEXT_VALID_PRODUCTS_ID', '产品 ID');
define('TEXT_VALID_PRODUCTS_NAME', '产品名称');
define('TEXT_VALID_PRODUCTS_MODEL', '产品型号');

define('TEXT_VALID_CATEGORIES_LIST', '类别列表');
define('TEXT_VALID_CATEGORIES_ID', '类别 ID');
define('TEXT_VALID_CATEGORIES_NAME', '类别名称');

define('DEFINE_LANGUAGE','选择语言:');

define('BOX_ENTRY_COUNTER_DATE','点击开始日期:');
define('BOX_ENTRY_COUNTER','点击计数:');

// not installed
define('NOT_INSTALLED_TEXT','未安装');

// Product Options Values Sort Order - option_values.php

  define('TEXT_UPDATE_SORT_ORDERS_OPTIONS','<strong>更新属性排序顺序从选项值默认</strong> ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_UPDATES','<strong>更新所有的产品属性排序</strong><br />使其与选项值选项排序相一致:<br />');

// Product Options Name Sort Order - option_values.php

// Attributes only

// generic model
  define('TEXT_MODEL','型号:');


// check GV release queue and alert store owner
  define('SHOW_GV_QUEUE',true);
  define('TEXT_SHOW_GV_QUEUE','%s 等待批准 ');
  define('IMAGE_GIFT_QUEUE', TEXT_GV_NAME . ' 队列');
  define('IMAGE_ORDER','排序');


  define('IMAGE_DISPLAY','显示');
  define('IMAGE_UPDATE_SORT','更新排列顺序');
  define('IMAGE_EDIT_PRODUCT','编辑铲平');
  define('IMAGE_EDIT_ATTRIBUTES','编辑属性');
  define('TEXT_NEW_PRODUCT', '产品类: &quot;%s&quot;');
  define('IMAGE_OPTIONS_VALUES','选项名称和选项值');
  define('TEXT_PRODUCTS_PRICE_MANAGER','产品价格管理');
  define('TEXT_PRODUCT_EDIT','编辑产品');
  define('TEXT_ATTRIBUTE_EDIT','编辑属性');
  define('TEXT_PRODUCT_DETAILS','查看详细信息');

// sale maker
  define('DEDUCTION_TYPE_DROPDOWN_0', '扣除额');
  define('DEDUCTION_TYPE_DROPDOWN_1', '百分比');
  define('DEDUCTION_TYPE_DROPDOWN_2', '新价格');

// Min and Units
  define('PRODUCTS_QUANTITY_MIN_TEXT_LISTING','最小的:');
  define('PRODUCTS_QUANTITY_UNIT_TEXT_LISTING','单位:');
  define('PRODUCTS_QUANTITY_IN_CART_LISTING','在购物车:');
  define('PRODUCTS_QUANTITY_ADD_ADDITIONAL_LISTING','添加其他:');

  define('TEXT_PRODUCTS_MIX_OFF','*没有混合选项');
  define('TEXT_PRODUCTS_MIX_ON','*有混合选项');

// search filters
  define('TEXT_INFO_SEARCH_DETAIL_FILTER','搜索过滤器: ');
  define('HEADING_TITLE_SEARCH_DETAIL','搜索: ');
  define('HEADING_TITLE_SEARCH_FILTER','组过滤器: ');
  define('HEADING_TITLE_SEARCH_DETAIL_REPORTS', '搜索产品 - 由逗号分隔');
  define('HEADING_TITLE_SEARCH_DETAIL_REPORTS_NAME_MODEL', '搜索产品名称/型号');

  define('PREV_NEXT_PRODUCT', '产品: ');
  define('TEXT_CATEGORIES_STATUS_INFO_OFF', '<span class="alert">*类别不可用</span>');
  define('TEXT_PRODUCTS_STATUS_INFO_OFF', '<span class="alert">*产品不可用</span>');

// admin demo
  define('ADMIN_DEMO_ACTIVE','目前管理演示活动，有些设置可能会被禁用');
  define('ADMIN_DEMO_ACTIVE_EXCLUSION','目前管理演示活动，有些设置可能会被禁用 - <strong>注意: 管理覆盖启用</strong>');
  define('ERROR_ADMIN_DEMO','管理演示活动 ... 你尝试执行的功能已禁用');

// Version Check notices
  define('TEXT_VERSION_CHECK_NEW_VER','新版本可用 v');
  define('TEXT_VERSION_CHECK_NEW_PATCH','新补丁可用: v');
  define('TEXT_VERSION_CHECK_PATCH','补丁');
  define('TEXT_VERSION_CHECK_DOWNLOAD','在此处下载');
  define('TEXT_VERSION_CHECK_CURRENT','你的zencart&trade版本; 在当前显示.');

// downloads manager
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_DOWNLOADS_MANAGER', '显示<b>%d</b> 至<b>%d</b> ( <b>%d</b> 下载)');


define('ERROR_NOTHING_SELECTED', '无选择 ... 无变更');
define('TEXT_STATUS_WARNING','<strong>注意:</strong> 日期设置时，自动状态可用/不可用');

define('TEXT_LEGEND_LINKED', '链接商品');
define('TEXT_MASTER_CATEGORIES_ID','产片主要类别:');
define('TEXT_LEGEND', '图示: ');
define('TEXT_LEGEND_STATUS_OFF', '关闭 ');
define('TEXT_LEGEND_STATUS_ON', '打开 ');

define('TEXT_INFO_MASTER_CATEGORIES_ID', '<strong>注意: 主类别用于<br />产品类别会影响对相关产品的价格的定价目的，例如：销售</strong>');
define('TEXT_YES', '是');
define('TEXT_NO', '否');

// shipping error messages
define('ERROR_SHIPPING_CONFIGURATION', '<strong>运送配置出错!</strong>');
define('ERROR_SHIPPING_ORIGIN_ZIP', '<strong>警告:</strong> 商店邮编没有定义。见配置|货运/包装来进行设置.');
define('ERROR_ORDER_WEIGHT_ZERO_STATUS', '<strong>警告:</strong> 没有重量的产品被设置为免运费或者免运费模块不可用');
define('ERROR_USPS_STATUS', '<strong>警告:</strong> UPS运送木块丢失用户名，或者被设置为测试用途，而不是生产并且不可用.<br />如果您不能检索美国邮政运输行情, 联系美国邮政运输局以激活您在他们呢的生产服务网站上的网页工具账户');

define('ERROR_SHIPPING_MODULES_NOT_DEFINED', '注意: 您没有激活运输模块，请在Modules->Shipping 设置.');
define('ERROR_PAYMENT_MODULES_NOT_DEFINED', '注意: 您没有激活支付模块，请在Mdules->Payment 设置');

// text pricing
define('TEXT_CHARGES_WORD','计算费用:');
define('TEXT_PER_WORD','<br />价格/字: ');
define('TEXT_WORDS_FREE',' 免费字数 ');
define('TEXT_CHARGES_LETTERS','计算费用:');
define('TEXT_PER_LETTER','<br />每封信的价格: ');
define('TEXT_LETTERS_FREE',' 免费信件');
define('TEXT_ONETIME_CHARGES','*onetime charges = ');
define('TEXT_ONETIME_CHARGES_EMAIL',"\t" . '*onetime charges = ');
define('TEXT_ATTRIBUTES_QTY_PRICES_HELP', '期权数量折扣');
define('TABLE_ATTRIBUTES_QTY_PRICE_QTY','QTY');
define('TABLE_ATTRIBUTES_QTY_PRICE_PRICE','价格');
define('TEXT_ATTRIBUTES_QTY_PRICES_ONETIME_HELP', '每次期权数量折扣');
define('TEXT_CATEGORIES_PRODUCTS', '选择一个产品类别。。。或者在不同产品之间移动');
define('TEXT_PRODUCT_TO_VIEW', '选择查看一个产品，点击显示 ...');

define('TEXT_INFO_SET_MASTER_CATEGORIES_ID', '不可用主类别 ID');
define('TEXT_INFO_ID', ' ID# ');
define('TEXT_INFO_SET_MASTER_CATEGORIES_ID_WARNING', '<strong>警告:</strong> 该产品是与多个类别，但没有主类已设置!');

define('PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT', '产品价格面议');
define('PRODUCTS_PRICE_IS_FREE_TEXT','免费产品');

define('TEXT_PRODUCT_WEIGHT_UNIT','公斤');

// min, max, units
define('PRODUCTS_QUANTITY_MAX_TEXT_LISTING', '最大:');

// Discount Savings
  define('PRODUCT_PRICE_DISCOUNT_PREFIX','Save:&nbsp;');
  define('PRODUCT_PRICE_DISCOUNT_PERCENTAGE','% off');
  define('PRODUCT_PRICE_DISCOUNT_AMOUNT','&nbsp;off');
// Sale Maker Sale Price
  define('PRODUCT_PRICE_SALE','Sale:&nbsp;');

// Rich Text / HTML resources
define('TEXT_HTML_EDITOR_NOT_DEFINED','如果你没有HTML编辑器定义或禁用JavaScript，您可以在这里手动输入原始HTML文本.');
define('TEXT_WARNING_HTML_DISABLED','<span class = "main">注意: 您使用的是纯文字的电子邮件。如果你想发送HTML您需要在Email选项下启用“use MIME HTML”</span>');
define('TEXT_WARNING_CANT_DISPLAY_HTML','<span class = "main">注意: 你只在EMALI下使用TEXT. 如果你想要发送HTML，你需要在email选项下启用“use MIME HTML”</span>');
define('TEXT_EMAIL_CLIENT_CANT_DISPLAY_HTML',"您看到这个文本是因为您的email客户端不能显示HTML消息所以我们以HTML的形式给你发送email.");
define('ENTRY_EMAIL_PREFERENCE','Email格式:');
define('ENTRY_EMAIL_FORMAT_COMMENTS','对所有邮件选择空或者输出不可用，包括订单详细消息');
define('ENTRY_EMAIL_HTML_DISPLAY','HTML');
define('ENTRY_EMAIL_TEXT_DISPLAY','纯文本');
define('ENTRY_EMAIL_NONE_DISPLAY','无');
define('ENTRY_EMAIL_OPTOUT_DISPLAY','选择退出简讯');
define('ENTRY_NOTHING_TO_SEND','您在您的消息处没有键入任何内容');
 define('EMAIL_SEND_FAILED','错误: 发送邮件到: "%s" <%s> 主题是: "%s"失败');

  define('EDITOR_NONE', '纯文本');
  define('TEXT_EDITOR_INFO', '文本编辑器');
  define('ERROR_EDITORS_FOLDER_NOT_FOUND', '您有一个HTML编辑器可以在我的商店处选择到，但是编辑器的文件夹不能找到，请禁用您的选择或者把您的编辑器文件夹移动到 \''.DIR_WS_CATALOG.'编辑器文件夹下');
  define('TEXT_CATEGORIES_PRODUCTS_SORT_ORDER_INFO', '类别/商品排序: ');
  define('TEXT_SORT_PRODUCTS_SORT_ORDER_PRODUCTS_NAME', '产品排列顺序, 产品名称');
  define('TEXT_SORT_PRODUCTS_NAME', '产品名称');
  define('TEXT_SORT_PRODUCTS_MODEL', '产品类型');
  define('TEXT_SORT_PRODUCTS_QUANTITY', '产品Qty+, 产品名称');
  define('TEXT_SORT_PRODUCTS_QUANTITY_DESC', '产品 Qty-, 产品名称');
  define('TEXT_SORT_PRODUCTS_PRICE', '产品价格+, 产品名称');
  define('TEXT_SORT_PRODUCTS_PRICE_DESC', '产品价格-, 产品名称');
  define('TEXT_SORT_CATEGORIES_SORT_ORDER_PRODUCTS_NAME', '类别排列顺序, 类别名称');
  define('TEXT_SORT_CATEGORIES_NAME', '类别名称');



  define('TABLE_HEADING_YES','是');
  define('TABLE_HEADING_NO','否');
  define('TEXT_PRODUCTS_IMAGE_MANUAL', '<br /><strong>或者，选择一个服务器，文件名现有的图像文件:</strong>');
  define('TEXT_IMAGES_OVERWRITE', '<br /><strong>在服务器上重写一个存在的图像文件?</strong>');
  define('TEXT_IMAGE_OVERWRITE_WARNING','警告: 文件已更新但没有被重写 ');
  define('TEXT_IMAGES_DELETE', '<strong>Delete Image?</strong> 注意: 从产品中移除图像，图不会从服务器中删除:');
  define('TEXT_IMAGE_CURRENT', '图像名称: ');

  define('ERROR_DEFINE_OPTION_NAMES', '警告: 没有选项名称被定义');
  define('ERROR_DEFINE_OPTION_VALUES', '警告: 没有选项值被定义');
  define('ERROR_DEFINE_PRODUCTS', '警告: 没有产品被定义');
  define('ERROR_DEFINE_PRODUCTS_MASTER_CATEGORIES_ID', '警告: 这个产品没有被设置为主要类别ID');

  define('BUTTON_ADD_PRODUCT_TYPES_SUBCATEGORIES_ON','增加包含的子类别');
  define('BUTTON_ADD_PRODUCT_TYPES_SUBCATEGORIES_OFF','增加缺少的子类别');

  define('BUTTON_PREVIOUS_ALT','上一个产品');
  define('BUTTON_NEXT_ALT','下一个产品');

  define('BUTTON_PRODUCTS_TO_CATEGORIES', '多级链路管理');
  define('BUTTON_PRODUCTS_TO_CATEGORIES_ALT', '复制到多个产品类别');

  define('TEXT_INFO_OPTION_NAMES_VALUES_COPIER_STATUS', '所有全局复制，添加和删除功能的状态是目前关');
  define('TEXT_SHOW_OPTION_NAMES_VALUES_COPIER_ON', '显示全局特征：开');
  define('TEXT_SHOW_OPTION_NAMES_VALUES_COPIER_OFF', '显示全局特征：关');

// moved from categories and all product type language files
  define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', '错误:在同一个类别下不能链接产品.');
  define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', '错误:类别图像路径不可写: ' . DIR_FS_CATALOG_IMAGES);
  define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', '错误:类别图像路径不存在: ' . DIR_FS_CATALOG_IMAGES);
  define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', '错误:类别不能被移动到子类别下.');
  define('ERROR_CANNOT_MOVE_PRODUCT_TO_CATEGORY_SELF', '错误:不能把产品移动到同一个类别或者是已经存在该产品的类别下.');
  define('ERROR_CATEGORY_HAS_PRODUCTS', '错误:类别下已经有产品!<br /><br />虽然这是可以做到暂时来建立您的类别。。。分类类别包含产品或者是包含子类别，但是却不能两者都包含!');
  define('SUCCESS_CATEGORY_MOVED', '成功! 类别已成功移除 ...');
  define('ERROR_CANNOT_MOVE_CATEGORY_TO_CATEGORY_SELF', '错误:不能把类别移动到相同类别下! ID#');

// EZ-PAGES Alerts
  define('TEXT_EZPAGES_STATUS_HEADER_ADMIN', '警告: EZ-PAGES HEADER -仅用于管理员IP');
  define('TEXT_EZPAGES_STATUS_FOOTER_ADMIN', '警告: EZ-PAGES FOOTER -仅用于管理员IP');
  define('TEXT_EZPAGES_STATUS_SIDEBOX_ADMIN', '警告: EZ-PAGES SIDEBOX -仅用于管理员IP');

// moved from product types
// warnings on Virtual and Always Free Shipping
  define('TEXT_VIRTUAL_PREVIEW','警告: 该产品被标识为免运费产品并且忽略运送地区<br />所有产品都是虚拟产品，不需要运送');
  define('TEXT_VIRTUAL_EDIT','警告:该产品被标识为免运费产品并且忽略运送地区<br />但所有产品都是虚拟产品时，不需要运送');
  define('TEXT_FREE_SHIPPING_PREVIEW','警告:该产品被标识为免运费产品，需要运送地址<br />订单中的所有产品总是免运费产品，需要免运费模块');
  define('TEXT_FREE_SHIPPING_EDIT','警告:将产品标识为免运费产品，需要运送地址<br />订单中的所有产品总是免运费产品，需要免运费模块');

// admin activity log warnings
  define('WARNING_ADMIN_ACTIVITY_LOG_DATE', '警告:在管理活动记录表中有超过2个月大的记录，应当清理...');
  define('WARNING_ADMIN_ACTIVITY_LOG_RECORDS', '警告: 在管理活动记录表中有超过50,000的纪录，并应清洗... ');
  define('RESET_ADMIN_ACTIVITY_LOG', '到商店管理处重设管理活动日志');

  define('CATEGORY_HAS_SUBCATEGORIES', '注意: 该类别包含子类别<br />产品不能被添加');

  define('WARNING_WELCOME_DISCOUNT_COUPON_EXPIRES_IN', '警告! 欢迎使用电邮优惠券，在%s天后到期');

  define('TEXT_ACCESS_DENIED', '对不起, 您的安全许可不允许您访问此资源，如果您认为这是不正确的，请联系您的网络管理员。不便之处，请见谅.');
  
  
  define('TEXT_MSG_NOUPLOAD_LARGE','警告 ! 上传失败');
  define('TEXT_MSG_UPLOAD_LARGE','成功上传 ');
  
  define('PRODUCT_MEDIUM_SMALL_WIDTH','85');
  define('PRODUCT_MEDIUM_SMALL_HEIGHT','85');
  define('PRODUCT_MEDIUM_IMAGE_WIDTH','282');
  define('PRODUCT_MEDIUM_IMAGE_HEIGHT','282');
  define('PRODUCT_MEDIUM_LARGE_WIDTH','500');
  define('PRODUCT_MEDIUM_LARGE_HEIGHT','500');
///////////////////////////////////////////////////////////
// include additional files:
  require(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . FILENAME_EMAIL_EXTRAS);
  include(zen_get_file_directory(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/', FILENAME_OTHER_IMAGES_NAMES, 'false'));


?>