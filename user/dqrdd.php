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
$sql="select *from dy_dd where  (uid ='$uid' and zf='1' and dy='0') or (uid ='$uid' and zf='1' and dy='1') or(uid ='$uid' and zf='1' and dy='2')or(uid ='$uid' and zf='2' and dy='0') or (uid ='$uid' and zf='2' and dy='1')";
        $result=mysql_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>肇庆学院校园打印服务</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis">

    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/site.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="js/html5.js"></script>
    <![endif]-->
    <style type="text/css">
<!--
#overlay {
	Z-INDEX: 9999; POSITION: fixed; TEXT-ALIGN: center; WIDTH: 100%; BOTTOM: 0px; HEIGHT: 70px; _position: absolute;background-color: silver; 
}
body{padding-bottom: 40px;}
-->
</style>
  </head>
  <body onload="iniEvent()" >

   <?php include('head.php')?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="page-header">
				<h1>待确认订单详情</h1>
			</div>
            <?php while($rows=mysql_fetch_array($result))
            {?>
        <div class="span9" style="width: 95%;">
          <div class="well hero-unit">
          
            <p>订单号：<?php echo $rows['ddh'];?> </p>
            <p>支付单号：<?php echo $rows['zfdd'];?></p>
            <p>下单时间：<?php echo $rows['time'];?> </p>
            <p>收货人：<?php echo $rows['name'];?>&nbsp;&nbsp;<?php echo $rows['phone'] ;?>&nbsp;&nbsp;收货地址：肇庆学院<?php echo$rows['adr'];?></p>
            <p>打印文件：<?php echo $rows['wjm'];?> </p>
            <p>打印设置：A4黑白<?php if($rows['dsm']==1){echo "单面";}else {echo "双面";}echo "一页".$rows['jb']."版";echo "共".$rows['ys']."页&nbsp;&nbsp;";echo "打印".$rows['fs']."份";?></p>
            <p>打印范围：<?php echo $rows['fw'];?> 备注：<?php echo $rows['bz'];?></p>
            <p>打印地点：<?php $sjadr=$rows['sid'];
                                $sql1="select *from dy_sj where sid ='$sjadr'";
                                $result1=mysql_query($sql1);
                                $row1=mysql_fetch_array($result1);
                                if($row1){ echo $row1['adr']."&nbsp;&nbsp;";if($rows['dy']!=2){echo "<font color='green'>".$row1['time']."</font>";}} ?></p>
                                <p>状态：<?php if($rows['zf']==1)echo "已付款，";else echo "未付款，"; if($rows['dy']==0)echo "等待打印"; if($rows['dy']==1)echo "已打印正在配送或等待上门自提"; if($rows['dy']==2&&$rows['zf']!=2)echo "已完成交易，请到支付宝账单中确认收货";if($rows['dy']==4) echo "申请退单中,等待商家确认";?> </p>
            
            <p>价格：<?php echo "<font color='red'>".$rows['price']."元</font>";?></p>
            <?php if($rows['dy']==0&&$rows['zf']==2) echo"<a class=\"btn\" href=\"javascript:if(confirm('确实申请退单吗?'))location='sqtd.php?ddh=".$rows['ddh']."&price=".$rows['price']."'\">申请退单</a>";   ?>
          </div>
         
		  <br />
		  
        </div>
        <?php } ?>
      </div>

      

    </div>
    <?php include('footer.php')?>
    <script src="js/jquery.js"></script>
    <script src="js/user.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/zf.js"></script>
  </body>
</html>
