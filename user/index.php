<?php
session_start();

//����Ƿ��¼����û��¼��ת���¼����
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