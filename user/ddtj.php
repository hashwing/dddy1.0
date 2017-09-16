<?php
session_start();
if(!isset($_SESSION['user'])){
    exit();
}
date_default_timezone_set('PRC');
$name=$_POST['name'];
$phone=$_POST['phone'];
$adr=$_POST['adr'];
$dsm=$_POST['dsm'];
$sid=$_POST['dyadr'];
$jb=$_POST['jb'];
$ys=$_POST['ys'];
$fs=$_POST['fs'];
$fw=$_POST['fw'];
$bz=$_POST['bz'];
$size=$_POST['size'];
$color=$_POST['color'];
$wd=$_POST['doc'];
$sh=$_POST['sh'];
$ofilename=$_POST['ofilename'];
$ddh=trade_no();
$uid=$_SESSION['uid'];
$datetime=date('ymdHis');
include('../inc.php');
function trade_no() {
         list($usec, $sec) = explode(" ", microtime());
         $usec = substr(str_replace('0.', '', $usec), 0 ,4);
         $str  = rand(10,99);
         return date("YmdHis").$usec.$str;
     }
if($dsm==1)
    {
        $sql="select *from dy_price where sid ='$sid'and pclass='$dsm' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows){
            
             $price=$rows['price']*$ys*$fs;
  
        }
        
    }
    else{
        $sql="select *from dy_price where sid ='$sid'and pclass='$dsm' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows){
            
             $price=(($rows['price']* intval($ys/2))+($ys%2)*0.1)*$fs;
  
        }
        
    }
$sql="INSERT INTO dy_dd (ddh,uid,sid,dsm,jb,ys,fs,fw,bz,sh,wd,price,wjm,time,zf,dy,name,phone,adr) VALUES ('$ddh', '$uid', '$sid','$dsm','$jb','$ys','$fs','$fw','$bz','$sh','$wd','$price','$ofilename','$datetime','0','0','$name','$phone','$adr')";
if(mysql_query($sql))
{
    if(mysql_query("UPDATE dy_userxq SET name='$name',phone='$phone',adr='$adr' WHERE uid='$uid'"))
    {
        echo 1;
    }
    
}

?>