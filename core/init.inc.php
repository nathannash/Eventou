<?php
session_start();
mysql_connect('localhost:8889', 'root', 'root');
mysql_select_db('Eventou');

$path = dirname(__FILE__);

include("{$path}/user.inc.php");
?>