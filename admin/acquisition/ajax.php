<?php 
$url=$_GET['url'];
$c=$_GET['c'];

//c=1 ת�� gb2312�����Ȼ������
if($c=1){
	header("Content-Type: text/html;charset=gb2312"); 
}elseif($c=2){
	header("Content-Type: text/html;charset=utf-8"); 
}else{
	header("Content-Type: text/html;charset=");
}

error_reporting(7);
//��ʼ�������
$file = fopen ($url, "r"); 
if (!$file) { 
echo "<font color=red>�򲻿��ļ�</font>\n"; 
exit; 
} 

while (!feof ($file)) { 
  $line .= fgets ($file, 1024);   //������ݸ�ֵ������ $line
}

echo $line;
?>