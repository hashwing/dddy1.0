<?php
session_start();
if(!isset($_SESSION['user'])){
    exit();
    }
date_default_timezone_set('PRC');
    $uid=$_SESSION['uid'];
    include('../inc.php');
function trade_no() {
         list($usec, $sec) = explode(" ", microtime());
         $usec = substr(str_replace('0.', '', $usec), 0 ,4);
         $str  = rand(10,99);
         return date("YmdHis").$usec.$str;
     }
     
$zfdd="z".trade_no();
$sum=0;
$count= json_decode($_POST['hdd'],true);
for($i=0;$i<count($count);$i++)
{
     $sql="select *from dy_dd where ddh='$count[$i]' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows)
        {
            $sh=$rows['sh'];
            $sum+=$rows['price'];
	    $sid=$rows['sid'];
           $sql="UPDATE dy_dd SET zfdd='$zfdd' WHERE ddh='$count[$i]'";
            if(mysql_query($sql))
            {
                 ;       
            }
            else{
                    echo 0;
                    exit();
                } 
        }
        else{
            echo 0;
            exit();
        }
        
}
$sql="INSERT INTO dy_zfdd (zfdd,price,uid,sid,zs,zf) VALUES ('$zfdd','$sum','$uid','$sid','0','0')";
if(mysql_query($sql))
{
    echo "pay.php?zfdd=".$zfdd."&count=".count($count)."&sh=".$sh;       
}
else{
            echo 0;
            exit();
}

?>