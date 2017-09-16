<?php
session_start();
if(!isset($_SESSION['user'])){
    exit();
    }
    include('../../inc.php');
    $ddh=$_GET['zfdd'];
    $uid=$_SESSION['uid'];
    $sql="select *from dy_userxq where uid='$uid' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_assoc($result);
        if($rows)
        {
            
            $name=$rows['name'];
            $phone=$rows['phone'];
            $adr=$rows['adr'];
        }


 $sql="select *from dy_zfdd where zfdd='$ddh' ";
        $result=mysql_query($sql);
        $rows=mysql_fetch_array($result);
        if($rows)
        {
            
            $price=$rows['price'];
        }
        
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>肇庆学院校园打印服务</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis">

    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/site.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="js/html5.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">肇庆学院校园打印服务</a>
          <div class="btn-group pull-right">
			<a class="btn" href="my-profile.html"><i class="icon-user"></i> <span id="username"></span></a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  <li><a href="#">个人信息</a></li>
              <li class="divider"></li>
              <li  id="logout"><a href="#">注销</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="index.html">首页</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">我的订单 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">未完成订单</a></li>
					<li class="divider"></li>
					<li><a href="#">已完成订单</a></li>
				</ul>
			  </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">我的账户 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">交易明细</a></li>
					<li class="divider"></li>
					<li><a href="#">充值</a></li>
				</ul>
			  </li>
			  <li><a href="#">联系客服</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="page-header">
				<h1>订单详情</h1>
			</div>
            <?php while($rows=mysql_fetch_array($result))
            {?>
        <div class="span9" style="width: 95%;">
          <div class="well hero-unit">
          
            <p>订单号：<?php echo $rows['ddh'];?> </p>
            <p>下单时间：<?php echo $rows['time'];?> </p>
            <p>收货人：<?php echo $rows['name'];?>&nbsp;&nbsp;<?php echo $rows['phone'] ;?>&nbsp;&nbsp;收货地址：肇庆学院<?php echo$rows['adr'];?></p>
            <p>打印文件：<?php echo $rows['wjm'];?> </p>
            <p>打印设置：A4黑白<?php if($rows['dsm']==1){echo "单面";}else {echo "双面";}echo "一页".$rows['jb']."版";echo "共".$rows['ys']."页&nbsp;&nbsp;";echo "打印".$rows['fs']."份";?></p>
            <p>打印范围：<?php echo $rows['fw'];?> 备注：<?php echo $rows['bz'];?></p>
            <p>打印地点：<?php $sjadr=$rows['sid'];
                                $sql1="select *from dy_sj where sid ='$sjadr'";
                                $result1=mysql_query($sql1);
                                $row1=mysql_fetch_array($result1);
                                if($row1){ echo $row1['adr']."&nbsp;&nbsp;";if($rows['sh']==1){echo "<font color='green'>".$row1['time']."统一送</font>";}else{echo "自己上门提货";}} ?> </p>
            
            <p>价格：<?php echo "<font color='red'>".$rows['price']."元</font>";?></p>
            <a class="btn" href="users.html">取消订单</a>
            <p style="float: right;"> 是否支付&nbsp;<input type="checkbox" name="item" onchange="calculateMoney()" id="<?php echo $rows['ddh'];?>" value="<?php echo $rows['price'];?>" /></p>
          </div>
         
		  <br />
		  
        </div>
        <?php } ?>
      </div>

      

    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/user.js"></script>
	<script src="../js/bootstrap.min.js"></script>
  </body>
</html>

