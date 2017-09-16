<?php
session_start();
date_default_timezone_set('PRC');
$datetime = "zqu".trade_no();
include('inc.php');
$user=$_POST['user'];
$email=$_POST['email'];
$psw=$_POST['pwd'];
function trade_no() {
         list($usec, $sec) = explode(" ", microtime());
         $usec = substr(str_replace('0.', '', $usec), 0 ,4);
         $str  = rand(10,99);
         return date("YmdHis").$usec.$str;
     }
$result = mysql_query("SELECT * FROM dy_user");
while($row = mysql_fetch_array($result))
{
  if($user==$row['user'])
  {
    echo 0;
    exit();
  } 
          
}
$sql="INSERT INTO dy_user (uid, user, email,psw) 
VALUES ('$datetime', '$user', '$email','$psw')";
if(mysql_query($sql))
{
    $sql="INSERT INTO dy_userxq (uid) VALUES ('$datetime')";
    if(mysql_query($sql))
    {
        $_SESSION['uid']=$datetime;
        $_SESSION['user']=$user;
        echo 1;
    }
    else{
        echo 2;
    }
    
}
else{
    echo 2;
}




?>