<?php
header("Cache-Control: no-cache, must-revalidate");
include("../../../configure.php");
$connect = @mysql_pconnect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD) or die ('could not connect:' . mysql_error());
mysql_select_db(DB_DATABASE) or die('no' . mysql_error());  
 $search = trim($_POST['search']);
 $sql = "select products_keyword_title from products_keyword where products_keyword_title like '".$search."%' order by products_keyword_hits desc"; 
 $rs = mysql_query($sql);
 $num = MYSQL_NUMROWS($rs);
$str = '' ;
 if($num>10) $num = 10;
  for($i=0;$i<$num;$i++){
   $str .=  '<div id="search_result" class="suggest_link" style="cursor:pointer;" onmouseover="javascript:suggestOver(this);" onmouseout="javascript:sugggestOut(this);" onclick="javascript:setSearch(this.innerHTML);">'.mysql_result($rs,$i,"products_keyword_title").'</div>';
  }
  echo $str;
?>