<?php

//checks if the give username exists in the database
function user_exists($user){
	$user = mysql_real_escape_string($user);
	$total = mysql_query("SELECT COUNT(`user_id`) FROM `user_system` WHERE `user_name` = '{$user}");
	
	return (mysql_result($total, 0) == '1') ? true : false;
}

//checks if the given username and password combination is valid
function valid_credentials($user, $pass){
	$user = mysql_real_escape_string($user);
	$pass = sha1($pass);
	
	$total = mysql_query("SELECT COUNT(`user_id`) FROM `user_system` WHERE `user_name` = '{$user}' AND `user_password` = '{$pass}'");
	
	return (mysql_result($total, 0) == '1') ? true : false;
}

//adds a user to the database
function add_user($user, $pass, $email){
	$user = mysql_real_escape_string(htmlentities($user));
	$pass = sha1($pass);
	$email = mysql_real_escape_string($email);
	
	mysql_query("INSERT INTO `user_system` (`user_name`, `user_email`, `user_password`) VALUES('{$user}', '{$email}', '{$pass}') ");
}

?>