<?php
	include("core/init.inc.php");
	
	//For error handling
	$DBConnect = mysql_connect('localhost:8889', 'root', 'root');
	$DBName = mysql_select_db('Eventou');
	
	//Ensure form content is HTTP $_POST
	if(empty($_SERVER['CONTENT_TYPE'])){
	     $type = "application/x-www-form-urlencoded";
	     $_SERVER['CONTENT_TYPE'] = $type;
	}

	if(isset($_POST['submit'])){
		//User ID
		$result = mysql_query("SELECT `user_id` FROM `user_system`");
		$row = mysql_fetch_row($result);
		$uid = $row[0];
		//Capture form data
		$title = mysql_real_escape_string($_POST['title']);
		$event_id = md5($title);
		$time = mysql_real_escape_string($_POST['time']);
		$location = mysql_real_escape_string($_POST['location']);
		$activity = mysql_real_escape_string($_POST['activity']);
		$participants = mysql_real_escape_string($_POST['participants']);
		$description = mysql_real_escape_string($_POST['description']);
		
		$SQLString = "INSERT INTO `event_system`(`user_id`,`event_id`, `title`, `date_time`, `location`, `activity`, `participants`, `description`) VALUES ('$uid','$event_id', '$title', '$time', '$location', $activity, $participants, '$description')";			
				
		mysql_query($SQLString, $DBConnect);
		header("Location: /Eventou");
		mysql_close();
	}
?>
<?php include('header.php');?>
<body>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1>Create Event</h1>
			<a href="/Eventou">Back</a>
		</div>
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<form name="createEvent" action=" " method="POST"> 
				<!--Title-->
				<label for="title">Title:</label>
				<input type="text" name="title" value="" data-mini="true" />
				<!--Time-->
				<label for="time">Date &amp; time:</label>				
				<input type="datetime-local" name="time" value="" data-clear-btn="true">
				<!--Location-->
				<label for="location">Location:</label>
				<input type="text" name="location" value="" data-mini="true" />
				<!--Activity-->
				<label for="activity">Activity:</label>
				<select name="activity">
					<option value="1">Pickup sports (basketball, soccer, football)</option>
					<option value="2">Outdoor activities (hiking, airsoft, surfing)</option>
					<option value="3">Common interests (photowalks, home-brewing, record collecting)</option>
					<option value="4">Entertainment (movies, concerts, art galleries)</option>
				</select>	
				<!--# of participants-->			
				<label for="participants">Number of participants:</label>
				<select name="participants">
					<option value="1">4</option>
					<option value="2">6</option>
					<option value="3">8</option>
					<option value="4">12</option>
				</select>
				<!--Description-->				
				<label for="description">Description:</label>
				<p>Please include a <a href="http://maps.google.com" target="_blank">google maps</a> link to the meeting place</p>				
				<textarea cols="40" rows="8" name="description" value=""></textarea>
				<input type="submit" name="submit" value="Finish">
			</form>
		</div>
	</div>	
</body>
</html>

