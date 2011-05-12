<?php
require('includes/application_top.php');

$IMGVER_TempString="";
//产生六个随机字符
for($i=1;$i<=6;$i++){
   $IMGVER_TempString.=GetRandomChar();
}
//echo $IMGVER_TempString;
//将产生的随机字符串保存会话变量中
$_SESSION["IMGVER_RndText"]=$IMGVER_TempString;

function GetRandomChar(){
   // mt_srand((double)microtime()*1000000);
    $IMGVER_RandVal=mt_rand(1,3);//创建一个1到3之间的数字

    switch($IMGVER_RandVal){
      case 1:
         $IMGVER_RandVal=mt_rand(97,122);
         break;
          
       case 2:
         $IMGVER_RandVal=mt_rand(46,57);
         break;

        case 3:
         $IMGVER_RandVal=mt_rand(65,90);
         break;
      }

     return chr($IMGVER_RandVal);
   }

//创建图像区域和颜色
$IMGVER_IMAGE=imagecreate(115,20);
$IMGVER_COLOR_B=imagecolorallocate($IMGVER_IMAGE,255,255,255);
$IMGVER_COLOR_WHITE=imagecolorallocate($IMGVER_IMAGE,0,0,0);

//填充
imagefill($IMGVER_IMAGE,0,0,$IMGVER_COLOR_B);

//获取产生的随机字符串
$IMGVER_RandomText=$_SESSION["IMGVER_RndText"];
//依次显示六个字符
imagechar($IMGVER_IMAGE,4,5,2,$IMGVER_RandomText[0],$IMGVER_COLOR_WHITE);
imagechar($IMGVER_IMAGE,5,20,2,$IMGVER_RandomText[1],$IMGVER_COLOR_WHITE);
imagechar($IMGVER_IMAGE,3,40,2,$IMGVER_RandomText[2],$IMGVER_COLOR_WHITE);
imagechar($IMGVER_IMAGE,4,60,2,$IMGVER_RandomText[3],$IMGVER_COLOR_WHITE);
imagechar($IMGVER_IMAGE,5,80,2,$IMGVER_RandomText[4],$IMGVER_COLOR_WHITE);
imagechar($IMGVER_IMAGE,3,100,2,$IMGVER_RandomText[5],$IMGVER_COLOR_WHITE);

//显示图像
header("Content-type:image/jpg");
imagejpeg($IMGVER_IMAGE);
?>