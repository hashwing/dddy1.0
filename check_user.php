<?php 
include('inc.php');
header("Content-type:text/html;charset=gb2312"); 
//GET方式获取数据（取决于异步提交时提交方式） 
if($_GET['user']) 
{ 
$user=$_GET['user']; 
//此处可进行数据库匹配，本次省略直接判断 
$result = mysql_query("SELECT * FROM dy_user");
while($row = mysql_fetch_array($result))
{
  if($user==$row['user'])
  {
    echo "<font color=red>已被注册</font>"; 
    exit();
  } 
    
      
}
echo "<font color=green>可以使用</font>";
}


?> 