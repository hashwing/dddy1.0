<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user'])){
    echo 0;
    exit();
}
$uid=$_SESSION['uid'];
$sid=$_GET['sid'];
$dyadr=$_GET['adr'];
include('../inc.php');
$sql="select *from dy_userxq where uid ='$uid'";
$results=mysql_query($sql);
$row=mysql_fetch_array($results);
if($row)
{
    $name=$row['name'];
    $adr=$row['adr'];
    $phone=$row['phone'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>肇庆学院校园打印服务</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis"/>

    <link href="css/bootstrap.css" rel="stylesheet"/>
	<link href="css/site.css" rel="stylesheet"/>
    <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <!--[if lt IE 9]>
      <script src="js/html5.js"></script>
    <![endif]-->
 <script type="text/javascript">

      

</script>
    
    
    
    
  </head>
  <body >
    <?php include('head.php')?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><i class="icon-wrench"></i>个人信息</li>
              <li class="active"><a href="#">个人信息设置</a></li>
              <li class="nav-header"><i class="icon-signal"></i> 交易信息</li>
              <li><a href="#">交易明细</a></li>
              <li><a href="wfdd.php">未付款订单</a></li>
              <li><a href="dqrdd.php">待确认过订单</a></li>
              <li><a href="ywcdd.php">已完成订单</a></li>
              <li class="nav-header"><i class="icon-user"></i> 我的账户</li>
              <li><a href="#">充值</a></li>
              <li><a href="#">提现</a></li>
			  <li id="logout"><a href="#">注销</a></li> 
            </ul>
          </div>
        </div>
        <div class="span9">
         <div class="row-fluid">
			<div class="page-header">
				<h1>订单填写</h1>
			</div>
			<form  name="ddf" class="form-horizontal" > 
				<fieldset>
                <h3>基本信息</h3>
					<div class="control-group">
						<label class="control-label" for="name">姓名</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="name" value="<?php echo $name?>" name="name" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="phone">电话</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="phone" name="phone" value="<?php echo $phone?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="adr">地址</label>
						<div class="controls">
							肇庆学院　<input type="text" class="input-xlarge" id="adr"  name="adr" value="<?php echo $adr?>" style="width: 200px;"/>
						</div>
					</div>
                    <h3>打印设置</h3>
                    <div class="control-group">
                   
						<div class="controls">
                       纸张大小：
							<select id="size" name="size" style="width: 70px;" onchange="price()" >
								<option value="1" selected>A4</option>
							</select>
                            　色彩：
                            <select id="color" name="color" style="width: 100px;" onchange="price()" >
								<option value="1" selected>黑白</option>
							</select>
                            
						</div>         
					</div>
					
					<div class="control-group">
                   
						<div class="controls">
                        单双面：
							<select id="dsm" name="dsm" style="width: 70px;" onchange="price()" >
								<option value="1" selected>单面</option>
								<option value="2">双面</option>
							</select>
                            打印地点：
                            <select id="dyadr" name="dyadr" style="width: 100px;" onchange="shtime()" >
                            
        
								<option value="<?php echo $sid; ?>" selected><?php echo $dyadr; ?></option>
                                
							</select>
                            
						</div>         
					</div>
                    
                    <div class="control-group">
						<div class="controls">
                            一页几版：<input type="number" class="input-xlarge" id="jb" name="jb" value="1" min="1" style="width:40px;" onchange="price()" />
							<font color="red">打印页数：</font><input type="number" class="input-xlarge" id="ys" name="ys" value="50" min="1" style="width:40px;" onchange="price()" />
                            份数：<input type="number" class="input-xlarge" id="fs" name="fs" value="1" min="1" style="width:40px;" onchange="price()" />
						</div>
							
						
					</div>	
                    
                    <div class="control-group">
                     <label class="control-label" for="name">打印范围</label>
						<div class="controls">
                           <input type="text" class="input-xlarge" id="fw" name="fw" value="全部" />
						</div>	
					</div>		
                    
                    <div class="control-group">
                     <label class="control-label" for="name">备注</label>
						<div class="controls">
                           <input type="text" class="input-xlarge" id="bz"  name="bz" />
						</div>	
					</div>	
                    <h3>上传文档</h3>
                    <div class="control-group">
                     <label class="control-label" for="name">上传文档</label>
						<div class="controls">
                           <input type="file" class="input-xlarge" id="wd" name="wd" />
						</div>	
					</div>	
					<div class="control-group">
						<label class="control-label" for="active">送货上门</label>
						<div class="controls">
							<input type="checkbox" id="sh" value="1" name="sh" onchange="issh()" checked />
                            &nbsp;&nbsp;&nbsp;&nbsp;<span id="sht">(要送货,不足0.5元将收取差额运费)</span><br/><span style="font-size: 15px; color: red; font-weight: bold;" id="sht1"> <span id="shtime"></span></span>
						</div>
                        <p></p>
                        <span style="font-size: 15px; color: red; font-weight: bold; text-align: center;" ><h3>合计：<span id="price" ></span>元</h3></span>
					</div>
					<div class="form-actions">
						<input type="button" onclick="UpladFile()" class="btn btn-success btn-large" id="tj" value="提交订单" /><span id="tjz"></span> <a class="btn" onclick="history.go(-1)">上一步</a>
					
                    </div>					
				</fieldset>
			</form>
		  </div>
      </div>
      </div>

      <hr/>

      

    </div>
    <?php include('footer.php')?>

    <script src="js/jquery.js"></script>
    <script src="js/user.js"></script>
    
	<script src="js/bootstrap.min.js"></script>
    <script src="js/ddtj.js"></script>
  </body>
</html>
