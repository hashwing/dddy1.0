<?php
include('../inc.php');
$ddh=$_GET['ddh'];
$aimurl=$_GET['aimurl'];
function unlinkFile($aimUrl) {
        if (file_exists($aimUrl)) {
            unlink($aimUrl);
            return true;
        } else {
            return false;
        }
    }
    if(mysql_query("DELETE FROM dy_dd WHERE ddh='$ddh'"))
    {
        if(unlinkFile($aimurl))
        {
             echo "<script>alert('ȡ�������ɹ�')</script>";
            echo "<script>window.location.href='wfdd.php'</script>";
        }
        else{
            echo "<script>alert('ȡ������ʧ��')</script>";
            echo "<script>window.location.href='wfdd.php'</script>";
            }
            
    }
    else{
            echo "<script>alert('ȡ������ʧ��')</script>";
            echo "<script>window.location.href='wfdd.php'</script>";
            }
    
?>