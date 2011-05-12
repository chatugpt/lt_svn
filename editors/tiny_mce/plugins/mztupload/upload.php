<?php

/**
 * 加载效验、配置文件
 */
header("Content-type: text/html; charset=UTF-8");
include '../../../../includes/configure.php';
include 'val_config.php';

/**
 * 对已存在文件获取新的文件名
 * @param <type> $name
 * @return <type> 新的文件名 文件名(0) 文件名(1) 文件名(2)...
 */
function mztupload_get_new_name($name, $path) {
    $first_i = strrpos($name, '(');
    $last_i = strrpos($name, ')');
    $type = pathinfo($path . $name);
    $type = $type["extension"];
    $type = (empty($type) ? '' : '.' . $type);
    $len = strlen($name) - strlen($type);
    $file_name = substr($name, 0, $first_i ? $first_i : $len);
    if ($first_i && $last_i == ( $len - 1)) {
        $i = 0;
        while (true) {
            $name = $file_name . '(' . $i . ')' . $type;
            if (file_exists($path . $name)) {
                $i++;
            } else {
                break;
            }
        }
    } else {
        $name = $file_name . '(0)' . $type;
        if (file_exists($path . $name)) {
            return mztupload_get_new_name($name, $path);
        }
    }
    return $name;
}
$tmp_file_name = iconv($web_charset, $sys_charset, $_FILES["file"]["tmp_name"]);
$file_name = iconv($web_charset, $sys_charset, $_FILES["file"]["name"]);
$file_size = $_FILES["file"]["size"];
$result = 0;
$result_v = '';
/**
 * 文件夹不存在则创建
 */
if (!file_exists($save_path)) {
    mkdir($save_path, 777);
}
$type = pathinfo($save_path . $file_name);
$type = $type["extension"];
if (stripos($str_arr_type, $type)) {
    if ($file_size < $max_file_size) {
        if (is_uploaded_file($tmp_file_name)) {
            if (file_exists($save_path . $file_name)) {
                $file_name = mztupload_get_new_name($file_name, $save_path);
            }
            move_uploaded_file($tmp_file_name, $save_path . $file_name);
            if (file_exists($save_path . $file_name)) {
                $result = 1;
                $result_v = iconv($sys_charset, $web_charset, $path . $file_name);
            }
        }
    } else {
        /**
         * 文件大小超支反馈
         */
        $result = 3;
        $result_v = $max_file_size . ',You file size:' . $file_size;
    }
} else {
    /**
     * 不允许上传的类型反馈
     */
    $result = 2;
    $result_v = $str_arr_type;
}
echo "<script type='text/javascript'>parent.mztupload_stop_upload($result,'$result_v');</script> ";
?>
