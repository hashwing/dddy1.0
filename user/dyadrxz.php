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
				<h1>请选择打印地点</h1>
        </div>
            
        <div class="span9" style="width: 95%;">
          <div class="well hero-unit">
         
            
            <div class="row-fluid">
             <?php 
            $sql="select *from dy_sj where zx=1 ";
            $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result))
            {?>
            <div class="span3">
			<p><a href="dd.php?sid=<?php echo $rows['sid']; ?>&adr=<?php echo $rows['adr']; ?>" ><?php echo $rows['adr'] ?></a>【在线】</p>
              <h5><?php echo $rows['time'] ?>【电话】<?php echo $rows['phone'] ?></h5>
           
            
          </div>
           <?php } ?> 
          </div>
         <hr />
         <div class="row-fluid">
             <?php 
            $sql="select *from dy_sj where zx=0";
            $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result))
            {?>
            <div class="span3">
			<p><?php echo $rows['adr'] ?>【离线】</p>
              <h5><?php echo $rows['time'] ?></h5>
           
            
          </div>
           <?php } ?> 
          </div>
		  <br />
		  
        </div>
        
      </div>

      

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/user.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/zf.js"></script>
  </body>
</html>
