<?php
session_start();
date_default_timezone_set('PRC');
$uid=$_SESSION['uid'];
include('../inc.php');
$sql="select *from dy_dd where uid ='$uid'and zf='0' and dy='0' ";
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
    
    
    border-top-color: silver; border-top-width: 1px;border-top-style: solid;
	Z-INDEX: 9999; POSITION: fixed; TEXT-ALIGN: center; WIDTH: 100%; BOTTOM: 0px; HEIGHT: 70px;  background-color: #fff; 
}
#bottomNav { 
     border-top-color: silver; border-top-width: 1px;border-top-style: solid;
    background-color:#fff; z-index:999; position:fixed; bottom:0; left:0; width:100%; 
top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight); /* for IE6 */ 
overflow:visible; } 
#overlay input{
    width: 40px;
    height: 40px;
}
body{padding-bottom: 40px;}
-->
</style>
  </head>
  <body onload="iniEvent()" >

    <?php include('head.php');?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="page-header">
				<h1>未付款订单详情</h1>
			</div>
            <?php while($rows=mysql_fetch_array($result))
            {
		if(((int)substr(date("Y-m-d H:i:s",time()),8,2))-((int)substr($rows['time'],8,2))==0)
		{

	   ?>
	
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
            
            <p>价格：<?php echo "<font color='red'>".number_format($rows['price'], 2)."元</font>";?></p>
            <a class="btn" href="javascript:if(confirm('确实取消订单吗?'))location='qxdd.php?ddh=<?php echo $rows['ddh'] ?>&aimurl=<?php echo $rows['wd'] ?>'">取消订单</a>
            <p style="float: right;"> 选择支付&nbsp;<input type="checkbox" name="item" onchange="calculateMoney()" id="<?php echo $rows['ddh'];?>" value="<?php echo number_format($rows['price'], 2);?>" /></p>
          </div>
         
		  <br />
		  
        </div>
        <?php }} ?>
      </div>

      

    </div>    					       
  <div id='bottomNav' >
  <br />
  <p style="float: right; padding-right: 25px;">
  <!--span style="font-size: 18px; font-weight: bold;">全选</span><input type="checkbox" name="全选" onchange="checkAll()"/-->
  &nbsp;&nbsp;<span style="color: red;font-size: 20px; font-weight: bold;">合计：<span id="sumMoney">0.00</span>元</span>
  &nbsp;&nbsp;&nbsp;<span id="tjtip"></span><span id="zxzf"><a class="btn btn-success btn-large" id="zxzf" onclick="zftj()">在线支付</a>&nbsp;&nbsp;<a class="btn" id="zxfz" onclick="hdfk()">货到付款</a></span></p>
  </div>
    <script src="js/jquery.js"></script>
    <script src="js/user.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/zf.js"></script>
  </body>
</html>
