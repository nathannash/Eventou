<?php 
include('init.inc.php');
session_start();
session_unset();
session_destroy();
header('Location: http://'.$host.'/'.$base);
?>
