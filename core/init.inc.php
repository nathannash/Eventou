<?php
session_start();
ob_start();

//Host details
mysql_connect('localhost:8889', 'root', 'root');
mysql_select_db('Eventou');

//Database details
$DBConnect = mysql_connect('localhost:8889', 'root', 'root');
$DBName = mysql_select_db('Eventou');

//URL details
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$base = "Eventou";

$path = dirname(__FILE__);
include("{$path}/user.inc.php");
?>