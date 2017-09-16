<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['user'])){
    echo 0;
    exit();
}
if(!empty($_POST['out'])){
    unset($_SESSION['user']);
    unset($_SESSION['uid']);
    echo 1;
    exit;
}
if(!empty($_POST['user']))
{
    echo $_SESSION['user'];
}

?>