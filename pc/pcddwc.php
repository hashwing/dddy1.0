<?php
header("Content-Type: text/html;charset=utf-8"); 
$ddh=$_POST['ddh'];
include('../inc.php');
$sql="UPDATE dy_dd SET dy='1' WHERE ddh='$ddh'";
            if(mysql_query($sql))
            {
                 echo 1;       
            }
            else{
                    echo 0;
                } 
?>