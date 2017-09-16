<?php
    require "app_config.php";
    require_once("SUBMAILAutoload.php");

    $submail=new MAILSend($mail_configs);
    $submail->AddTo("1144205233@qq.com","gg");
    $submail->SetSender("no-reply@submail.cn","SUBMAIL");
    $submail->SetSubject("test");
    $submail->SetText("test text");
    $submail->SetHtml("test html");
    $submail->send();