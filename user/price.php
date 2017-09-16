<?php
if(!empty($_POST['price']))
{
    $dsm=$_POST['dsm'];
    $size=$_POST['size'];
    $color=$_POST['color'];
    $ys=$_POST['ys'];
    $fs=$_POST['fs'];
    $sid=$_POST['dyadr'];
    include('../inc.php');
    if($dsm==1)
    {
        $sql="select *from dy_price where sid ='$sid'and pclass='$dsm' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows){
            
            echo $rows['price']*$ys*$fs;
  
        }
        
    }
    else{
        $sql="select *from dy_price where sid ='$sid'and pclass='$dsm' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows){
            
            echo (($rows['price']* intval($ys/2))+($ys%2)*0.1)*$fs;
  
        }
        
    }
}
if(!empty($_POST['shtime']))
{
    $sid=$_POST['dyadr'];
    include('../inc.php');
        $sql="select *from dy_sj where sid ='$sid'";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows){
            
            echo $rows['time'];
  
        }
    
    
    
}
?>