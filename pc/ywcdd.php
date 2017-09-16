<?php
header("Content-Type: text/html;charset=utf-8"); 
$sid=$_POST['sid'];
include('../inc.php');
$sql="select * from dy_dd where sid='$sid' and (dy='3' and zf='1') or (dy='2' and zf='1') or (zf='2'and dy='2')";
$result=mysql_query($sql);
$xh=1;
$sum=0;
$sum1=0;
while($rows=mysql_fetch_array($result))
{
    echo "aaacc".$xh."dd";
    echo "cc".$rows['ddh']."dd";
    echo "cc".$rows['name']."dd";
    echo "cc".$rows['phone']."dd";
    echo "cc".$rows['adr']."dd";
    echo "cc".$rows['ys']."dd";
    echo "cc".$rows['fs']."dd"; 
    echo "cc".$rows['price']."dd";
    $zfdd=$rows['zfdd'];
    if($rows['sh']==1){echo "cc送货dd";}else{echo "cc自提dd";}
    if($rows['zf']==1)
	{
		$sql2="select * from dy_zfdd where zfdd='$zfdd' ";
		$result2=mysql_query($sql2);
		if($rows2=mysql_fetch_array($result2))
		{
			if($rows2['zf']==2)
            {
                echo "cc已付ddbbb";
            }
			
			else {
			 echo "cc待确认ddbbb";
             }
		}
		
		

	}
	else
    {
            echo  "cc到付ddbbb";
    } 
  
    $sum=$sum+$rows['price'];     
    $xh++;
}
echo "zong".$sum."jia";
$sql="select * from dy_zfdd where sid='$sid' and zs='0'and zf='2'";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result))
{
    $sum1=$sum1+$rows['price'];
}
echo "xian".$sum1."fu"

?>
