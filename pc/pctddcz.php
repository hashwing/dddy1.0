<?php
header("Content-Type: text/html;charset=utf-8"); 
$ddh=$_POST['ddh'];
$zt=$_POST['zt'];
$zf=$_POST['zf'];
$price=$_POST['price'];
include('../inc.php');
if($zt==1)
{
    $sql="UPDATE dy_td SET zt='1' WHERE ddh='$ddh'";
    if(mysql_query($sql))
    {
    if($zf==1)
    {
       $sql="UPDATE dy_dd SET zf='0' WHERE ddh='$ddh'";
            if(mysql_query($sql))
            {
                $sql="INSERT INTO dy_tk (ddh,price,zt) VALUES ('$ddh', '$price','0')";
                if(mysql_query($sql))
                 echo 1;       
            }
            else{
                    echo 0;
                }  
        
    }
    else{
         $sql="UPDATE dy_dd SET zf='0' WHERE ddh='$ddh'";
            if(mysql_query($sql))
            {
                 echo 1;       
            }
            else{
                    echo 0;
                } 
    }
  }  
}
if($zt==0)
{
    $sql="UPDATE dy_td SET zt='2' WHERE ddh='$ddh'";
    if(mysql_query($sql))
    {
    $sql="UPDATE dy_dd SET dy='2' WHERE ddh='$ddh'";
            if(mysql_query($sql))
            {
                 echo 1;       
            }
            else{
                    echo 0;
                }
    } 
}

?>