<?php
//Test db connect
$DBName = "Eventou";
$DBConnect = mysql_connect('localhost:8889', 'root','root');

if ($DBConnect === FALSE){
     echo "<p>Connection error: " . mysql_error() . "</p>\n";
	} else {
		 if (mysql_select_db($DBName, $DBConnect) === FALSE) {
	          echo "<p>Could not select the \"$DBName\" " .
	               "database: " . mysql_error($DBConnect) .
	               "</p>\n";
	          mysql_close($DBConnect);
	          $DBConnect = FALSE;
	     }
	}
?>