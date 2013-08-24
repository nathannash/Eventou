<?php
session_start();
ob_start();

//Host details
mysql_connect('mysql.nathannash.me', 'nnash', 'dcmb13');
mysql_select_db('Eventou');

//Database details
$DBConnect = mysql_connect('mysql.nathannash.me', 'nnash', 'dcmb13');
$DBName = mysql_select_db('Eventou');

//URL details
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$base = "Eventou";

$path = dirname(__FILE__);
include("{$path}/user.inc.php");
?>