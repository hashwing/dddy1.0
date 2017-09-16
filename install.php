<?php
include('inc.php');
/*$sql = "CREATE TABLE dy_user 
(
id int NOT NULL auto_increment,
uid varchar(30),
user text,
psw varchar(30),
email varchar(30),
openid varchar(30),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_user sucessful</br>";   
}
else{echo "dy_user bad!</br>";}
//
$sql = "CREATE TABLE dy_userxq
(
id int NOT NULL auto_increment,
uid varchar(30),
name varchar(20),
phone varchar(30),
adr   text,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_userxq sucessful</br>";   
}
else{echo "dy_userxq bad!</br>";}
//
$sql = "CREATE TABLE dy_sj
(
id int NOT NULL auto_increment,
sid varchar(20),
user varchar(20),
pwd varchar(20),
name varchar(30),
adr   text,
phone varchar(20),
qq varchar(20),
zx int(5),
time varchar(50),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_sj sucessful</br>";   
}
else{echo "dy_sj bad!</br>";}
//
$sql = "CREATE TABLE dy_dd
(
id int NOT NULL auto_increment,
sid varchar(20),
uid varchar(30),
ddh varchar(30),
dsm int(5),
jb int(5),
ys int(5),
fs int(5),
name varchar(20),
phone varchar(11),
adr varchar(255),
fw varchar(255),
sh int(5),
bz varchar(255),
zf int(5),
dy int(5),
wd varchar(255),
price double,
wjm varchar(255),
zfdd varchar(30),
time datetime,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_dd sucessful</br>";   
}
else{echo "dy_dd bad!</br>";}
//
$sql = "CREATE TABLE dy_price
(
id int NOT NULL auto_increment,
sid varchar(20),
pclass varchar(20),
price double,
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_price sucessful</br>";   
}
else{echo "dy_price bad!</br>";}

$sql = "CREATE TABLE dy_zfdd
(
id int NOT NULL auto_increment,
zfdd varchar(30),
sid varchar(20),
uid varchar(30),
zf int(11),
zs int(11),
price double,
zfbddh varchar(30),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_zfdd sucessful</br>";   
}
else{echo "dy_zfdd bad!</br>";}

//
$sql = "CREATE TABLE dy_tk
(
id int NOT NULL auto_increment,
ddh varchar(30),
price double,
zt int(5),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_tk sucessful</br>";   
}
else{echo "dy_tk bad!</br>";}

//
$sql = "CREATE TABLE dy_td
(
id int NOT NULL auto_increment,
ddh varchar(30),
uid varchar(30),
price double,
zt int(5),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_td sucessful</br>";   
}
else{echo "dy_td bad!</br>";}
//

$sql = "CREATE TABLE dy_sjdd
(
id int NOT NULL auto_increment,
sid varchar(20),
price double,
zs int(11),
 PRIMARY KEY  (`id`)
)";
if(mysql_query($sql,$con))
{
    echo "dy_sjdd sucessful</br>";   
}
else{echo "dy_jsdd bad!</br>";}*/
?>