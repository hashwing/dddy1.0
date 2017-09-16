<?php
header("Content-Type: text/html;charset=utf-8"); 
$ddh=$_POST['ddh'];
include('../inc.php');
$sql="select * from dy_dd where ddh='$ddh' ";
$result=mysql_query($sql);
if($rows=mysql_fetch_array($result))
{
    //echo "aa".$rows['ddh']."bb,";
    echo "cc".$rows['name']."dd";
    echo "cc".$rows['phone']."dd";
    echo "cc".$rows['adr']."dd";
    echo "ccA4黑白dd";
    if($rows['dsm']==1){echo "cc单面dd";}else {echo "cc双面dd";}
    echo "cc一页".$rows['jb']."版dd";
    echo "cc共".$rows['ys']."页dd";
    echo "cc打印".$rows['fs']."份dd"; 
    echo "cc".$rows['fw']."dd"; 
    echo "cc".$rows['bz']."dd";
    if($rows['sh']==1){echo "cc送货dd";}else{echo "cc自提dd";} 
    echo "cc".$rows['price']."dd";
    echo "cc".$rows['wd']."dd";
    if($rows['zf']==1)echo "cc已付款dd";else echo "cc未付款dd";  
}

?>