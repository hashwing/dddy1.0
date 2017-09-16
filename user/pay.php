<?php
session_start();
if(!isset($_SESSION['user'])){
    exit();
    }
    include('../inc.php');
    $ddh=$_GET['zfdd'];
    $count=$_GET['count'];
    $sh=$_GET['sh'];
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
   $sprice=0.5;

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
    <meta charset="utf-8">
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
  </head>
  <body>
    <?php include('head.php') ?>

    <div class="container-fluid">
      <div class="row-fluid" >
        <div class="span9" style="width: 100%;">
          <div class="well hero-unit">
          
            <p>支付单号：<?php echo $ddh?></p>
            <p>商品名称：<?php echo $count;?>份文档打印</p>
	    <p>价格：<span style="color: red;"><?php echo $price?>元</span></p>
            <p>运费：<?php if($sh==1&&$price<$sprice){echo $sprice-$price."(不足".$sprice."元收取差额运费)"; $priceall=0.5;}  else {echo 0; $priceall=$price;}?></p>
            <p>总计价格：<span style="color: red;"><?php echo $priceall?>元</span></p>
            <form name="alipayment" action="pay/alipayapi.php" method="post" target="_blank">
                        <input  name="WIDout_trade_no" type="hidden" value="<?php echo $ddh?>" />
                        <input  name="WIDsubject" type="hidden" value="<?php echo $count;?>份文档打印" />
                        <input size="30" name="WIDprice" type="hidden" type="text" value="<?php echo $price?>" />
                        <input size="30" name="WIDbody" type="hidden" value="肇庆学院校园打印服务"/>
                        <input size="30" name="WIDshow_url" type="hidden" value="http://dy.ggproject.cn"/>
                        <input size="30" name="WIDreceive_name" type="hidden" value="<?php echo $name?>"/>
                        <input size="30" name="WIDreceive_address" type="hidden" value="肇庆学院<?php echo $adr?>" />
                        <input size="30" name="WIDreceive_zip" type="hidden" value="526061" />
			<input size="30" name="yunfee" type="hidden" value="<?php if($sh==1&&$price<$sprice){echo $sprice-$price;}  else echo 0;?>" />
                        <input size="30" name="WIDreceive_phone" type="hidden"  value="<?php echo $phone?>"/>
                        <input size="30" name="WIDreceive_mobile" type="hidden"  value="<?php echo $phone?>"/>
            <p style="float: right;"><input type="submit"  class="btn btn-success btn-large" id="tj" value="支付宝支付" /></p>
         </form>
          </div>
		  <br />
		  
        </div>
      </div>

      <hr>

      <div style="height: 110px;"></div>

    </div>
    <footer class="well">
        <p style="text-align:center">Copyright &copy; 2015.肇庆学院校园打印服务团队 所有</p>  
			<p style="text-align:center"><a href="http://www.miibeian.gov.cn">备案号：粤ICP备15113762号</a></p>

      </footer>

    <script src="js/jquery.js"></script>
    <script src="js/user.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>