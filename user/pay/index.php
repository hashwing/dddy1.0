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
    <title>����ѧԺУ԰��ӡ����</title>
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
          <a class="brand" href="#">����ѧԺУ԰��ӡ����</a>
          <div class="btn-group pull-right">
			<a class="btn" href="my-profile.html"><i class="icon-user"></i> <span id="username"></span></a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  <li><a href="#">������Ϣ</a></li>
              <li class="divider"></li>
              <li  id="logout"><a href="#">ע��</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="index.html">��ҳ</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">�ҵĶ��� <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">δ��ɶ���</a></li>
					<li class="divider"></li>
					<li><a href="#">����ɶ���</a></li>
				</ul>
			  </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">�ҵ��˻� <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">������ϸ</a></li>
					<li class="divider"></li>
					<li><a href="#">��ֵ</a></li>
				</ul>
			  </li>
			  <li><a href="#">��ϵ�ͷ�</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="page-header">
				<h1>��������</h1>
			</div>
            <?php while($rows=mysql_fetch_array($result))
            {?>
        <div class="span9" style="width: 95%;">
          <div class="well hero-unit">
          
            <p>�����ţ�<?php echo $rows['ddh'];?> </p>
            <p>�µ�ʱ�䣺<?php echo $rows['time'];?> </p>
            <p>�ջ��ˣ�<?php echo $rows['name'];?>&nbsp;&nbsp;<?php echo $rows['phone'] ;?>&nbsp;&nbsp;�ջ���ַ������ѧԺ<?php echo$rows['adr'];?></p>
            <p>��ӡ�ļ���<?php echo $rows['wjm'];?> </p>
            <p>��ӡ���ã�A4�ڰ�<?php if($rows['dsm']==1){echo "����";}else {echo "˫��";}echo "һҳ".$rows['jb']."��";echo "��".$rows['ys']."ҳ&nbsp;&nbsp;";echo "��ӡ".$rows['fs']."��";?></p>
            <p>��ӡ��Χ��<?php echo $rows['fw'];?> ��ע��<?php echo $rows['bz'];?></p>
            <p>��ӡ�ص㣺<?php $sjadr=$rows['sid'];
                                $sql1="select *from dy_sj where sid ='$sjadr'";
                                $result1=mysql_query($sql1);
                                $row1=mysql_fetch_array($result1);
                                if($row1){ echo $row1['adr']."&nbsp;&nbsp;";if($rows['sh']==1){echo "<font color='green'>".$row1['time']."ͳһ��</font>";}else{echo "�Լ��������";}} ?> </p>
            
            <p>�۸�<?php echo "<font color='red'>".$rows['price']."Ԫ</font>";?></p>
            <a class="btn" href="users.html">ȡ������</a>
            <p style="float: right;"> �Ƿ�֧��&nbsp;<input type="checkbox" name="item" onchange="calculateMoney()" id="<?php echo $rows['ddh'];?>" value="<?php echo $rows['price'];?>" /></p>
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

