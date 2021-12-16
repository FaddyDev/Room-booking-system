<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_db='deoffice';
$connection=mysql_connect($mysql_host,$mysql_user,$mysql_password) or die('could not connect to the database');
mysql_select_db($mysql_db)or die('could not connect to the database')
?>