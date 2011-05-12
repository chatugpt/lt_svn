<?php
/**
 * 这个文档主要写入一些效验代码，比如登录之后才能上传等等 非法上传的过滤 请使用 exit(?) 或者 die
 */
//    session_start();
//    $user=$_SESSION['user'];
//    if(!$user){
//        /**
//         * not can upload
//         */
//        exit("<script type='text/javascript'>window.location='/';</script>");
//    }

/**
 * 可以上传的文件类型
 */
$str_arr_type = "/jpg/jpeg/gif/bmp/png/doc/docx/rar/zip/pdf";
/**
 * 允许最大文件大小  字节 ( MB * 1024 * 1024)  ( KB * 1024)
 */
$max_file_size = 2 * 1024 * 1024;
/**
 * 相对路径(超链接使用的地址，顶级可使用'/')
 */
$path = DIR_WS_HTTPS_CATALOG.'images/mce_upload/';
/**
 * 绝对路径
 */
$save_path = $_SERVER["DOCUMENT_ROOT"] . $path;

/**
 * sys_charset 存储文件的字符编码  web_charset 网页字符编码
 */
$sys_charset = 'gbk';
$web_charset = 'utf-8';
?>
