<?php 
include('inc.php');
header("Content-type:text/html;charset=gb2312"); 
//GET��ʽ��ȡ���ݣ�ȡ�����첽�ύʱ�ύ��ʽ�� 
if($_GET['user']) 
{ 
$user=$_GET['user']; 
//�˴��ɽ������ݿ�ƥ�䣬����ʡ��ֱ���ж� 
$result = mysql_query("SELECT * FROM dy_user");
while($row = mysql_fetch_array($result))
{
  if($user==$row['user'])
  {
    echo "<font color=red>�ѱ�ע��</font>"; 
    exit();
  } 
    
      
}
echo "<font color=green>����ʹ��</font>";
}


?> 