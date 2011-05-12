<?php
/**
 * 布局配置
 *
 */
define('MAZENTOP_COMMUNITY_ENABLE', true); //是否打开加入社区
define('MAZENTOP_COMMUNITY_BLOG_URL', ''); //商家blog地址
define('MAZENTOP_COMMUNITY_TWITTER_URL', ''); //商家Twitter地址
define('MAZENTOP_COMMUNITY_FACEBOOK_URL', ''); //商家facebook地址
define('MAZENTOP_COMMUNITY_YOUTUBE_URL', ''); //商家youtube地址
define('MAZENTOP_SIDEBOX_RECENTLY_VIEWED_NUM', 2); //边栏最近浏览显示个数

/**
 * 4px运费计算配置
 *
 */
define('EXTRA_HOST_NOT_OURS', false); //定义是否是mazentop的主机，不是则第四方运费计算需调整
define('EXTRA_4PX_URL', 'http://www.mazentop.com/4px/estimator.php'); //提供4px运费计算模块URL
define('EXTRA_4PX_SIGKEY', '217a6f95b12844e03d13ba1a2dffcf2d'); //提供4px服务的密钥

/**
 * session配置
 *
 */
define('MAZENTOP_SESSION_EXPIRE', 0); //设置session过期时间
?>