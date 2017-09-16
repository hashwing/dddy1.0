<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user'])){
    echo "<script>alert(\"请登录进入\")</script>";
    echo '<script>location.href="../index.html"</script>';
    exit();
}
$uid=$_SESSION['uid'];
include('../inc.php');
$ddh=$_GET['ddh'];
$price=$_GET['price'];
    if(mysql_query("update dy_dd set dy='4' WHERE ddh='$ddh'"))
    {
	$sql="INSERT INTO dy_td (ddh,uid,price,zt) VALUES ('$ddh','$uid', '$price','0')";
         if(mysql_query($sql))
	{
                 echo "<script>alert('申请退单成功，等待商家确认,(若未打印则同意退单,若已打印则不同意打印,不便之处望见谅!!)')</script>";
                  echo "<script>window.location.href='dqrdd.php'</script>";
	}
	else{
            echo "<script>alert('申请退单失败')</script>";
            echo "<script>window.location.href='dqrdd.php'</script>";
            }
    }
    else{
            echo "<script>alert('申请退单失败')</script>";
            echo "<script>window.location.href='dqrdd.php'</script>";
            }
    
?>