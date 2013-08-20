<?php
include("core/init.inc.php");

if(isset($_POST['createEvent'], $_POST['submit'])){
	//Capture form data
	$uid = mysql_query("SELECT user_id FROM user_system");
	$title = $_POST['title'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$activity = $_POST['activity'];
	$participants = $_POST['participants'];
	$description = $_POST['description'];
	
	//Create database record
	$SQLString = "INSERT INTO event_system (user_id, title, date_time, location, activity, participants, description) VALUES($uid, $title, $time, $location, $activity, $participants, $description)";
	
	mysql_query($SQLString);
	
	header('Location: http://localhost:8888/Eventou/');
	var_dump($_POST['createForm']);
}


/*$uid = SELECT `user_id` FROM  `user_system`;


if(isset($_POST['submit'])){
	$title = mysql_real_escape_string($_POST['title']);
	$datetime = $_POST['datetime'];
	$location = mysql_real_escape_string($_POST['location']);
	$activity = $_POST['activity'];
	$participants = $_POST['participants'];
	$description = mysql_real_escape_string($_POST['description']);

	Insert data into mysql
	$sql = "INSERT INTO `event_system`(user_id, title, date_time, location, activity, participants, description) VALUES ('$uid','$title', '$datetime', '$location', '$activity','$participants','$description')";

	mysql_query($sql);
} elseif(){
	var_dump($_POST['submit']);
}

header("Location: http://localhost:8888/Eventou");*/

?>