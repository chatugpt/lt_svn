<?php 
$url=$_GET['url'];
$c=$_GET['c'];

//c=1 转成 gb2312输出不然出现乱
if($c=1){
	header("Content-Type: text/html;charset=gb2312"); 
}elseif($c=2){
	header("Content-Type: text/html;charset=utf-8"); 
}else{
	header("Content-Type: text/html;charset=");
}

error_reporting(7);
//开始获得内容
$file = fopen ($url, "r"); 
if (!$file) { 
echo "<font color=red>打不开文件</font>\n"; 
exit; 
} 

while (!feof ($file)) { 
  $line .= fgets ($file, 1024);   //获得内容赋值给变量 $line
}

echo $line;
?>