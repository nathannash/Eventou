<?php
//Connect to server and select database
mysql_connect('localhost:8889', 'root', 'root');
mysql_select_db("Eventou");

//Get values from form
$uid = "SELECT `user_id` FROM  `user_system`";
$title = $_POST['title'];
$datetime = $_POST['datetime'];
$location = $_POST['location'];
$activity = $_POST['activity'];
$participants = $_POST['participants'];
$description = $_POST['description'];

//Insert data into mysql
$sql = "INSERT INTO `event_system`(user_id, title, date_time, location, activity, participants, description) VALUES ('$uid','$title', '$datetime', '$location', '$activity','$participants','$description')";

mysql_query($sql);

header("Location: http://localhost:8888/Eventou");
?>