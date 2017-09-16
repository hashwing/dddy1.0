<?php
date_default_timezone_set('PRC');
echo ((int)substr(date("Y-m-d H:i:s",time()),8,2))-((int)substr("2008-12-04",8,2));
if(((int)substr(date("Y-m-d H:i:s",time()),8,2))-((int)substr("2008-12-04",8,2))==1)
{
}
?>