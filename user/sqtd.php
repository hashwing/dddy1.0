<?php
session_start();
//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['user'])){
    echo "<script>alert(\"���¼����\")</script>";
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
                 echo "<script>alert('�����˵��ɹ����ȴ��̼�ȷ��,(��δ��ӡ��ͬ���˵�,���Ѵ�ӡ��ͬ���ӡ,����֮��������!!)')</script>";
                  echo "<script>window.location.href='dqrdd.php'</script>";
	}
	else{
            echo "<script>alert('�����˵�ʧ��')</script>";
            echo "<script>window.location.href='dqrdd.php'</script>";
            }
    }
    else{
            echo "<script>alert('�����˵�ʧ��')</script>";
            echo "<script>window.location.href='dqrdd.php'</script>";
            }
    
?>