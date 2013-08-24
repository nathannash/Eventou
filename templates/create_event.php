<?php include('../core/init.inc.php');?>
<?php include('header.php');?>
<body>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1>Create Event</h1>
			<a href="/Eventou">Back</a>
		</div>
		<?php		
			//Ensure form content is HTTP $_POST
			if(empty($_SERVER['CONTENT_TYPE'])){
			     $type = "application/x-www-form-urlencoded";
			     $_SERVER['CONTENT_TYPE'] = $type;
			}

			if(isset($_POST['submit'])){
				if(!empty($_POST['title']) && !empty($_POST['time']) && !empty($_POST['location'])&& !empty($_POST['activity'])&& !empty($_POST['participants'])&& !empty($_POST['description'])){
						//User ID
						$result = mysql_query("SELECT `user_id` FROM `user_system`");
						$row = mysql_fetch_row($result);
						$uid = $row[0];
						session_start();
						$username = $_SESSION['username_login'];
						//Capture form data
						$title = mysql_real_escape_string($_POST['title']);
						$event_id = md5($title);
						$time = mysql_real_escape_string($_POST['time']);
						$location = mysql_real_escape_string($_POST['location']);
						$activity = mysql_real_escape_string($_POST['activity']);
						$participants = mysql_real_escape_string($_POST['participants']);
						$description = mysql_real_escape_string($_POST['description']);
						$attendTrue = 1;
		
						//Create record in event_system and rsvp_system
						$SQLString = "INSERT INTO `event_system`(`user_id`,`event_id`, `title`, `date_time`, `location`, `activity`, `participants`, `description`) VALUES ('$uid','$event_id', '$title', '$time', '$location', $activity, $participants, '$description')";	
						$SQLString2 = "INSERT INTO `rsvp_system`(`user_name`, `event_id`, `title`, `description`, `rsvp`) VALUES ('$username', '$event_id', '$title', '$description', $attendTrue)";		
				
						mysql_query($SQLString, $DBConnect);
						mysql_query($SQLString2, $DBConnect);
						header('Location: http://'.$host.'/'.$base.'/');
						mysql_close();
					}
				} 
			
			if(isset($_POST['submit'])){
				if(empty($_POST['title']) || empty($_POST['time']) || empty($_POST['location']) || empty($_POST['activity']) || empty($_POST['participants']) || empty($_POST['description'])){
					echo '<div class="ui-bar alert-danger"><h3>Please fill in all of the required fields.</h3></div>';
				}
			}				
		?>		
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<?php
				//Form variables
				$eventTitle = 'title';
				$eventTime = 'time';
				$eventLocation = 'location';
				$eventActivity = 'activity';
				$eventParticipants = 'participants';
				$eventDescription = 'description';
				//Stickyform variables
				$eTitle = $eTime = $eLocation = $eActivity = $eParticipants = $eDescription = "";
			?>
			<form name="createEvent" action=" " method="POST"> 
				<!--Title-->
				<label for="<?php echo $eventTitle;?>"><span class="required">*</span>Title:</label>
				<input type="text" name="<?php echo $eventTitle;?>" value="<?php if(isset($_POST['submit'])){ $eTitle = $_POST['title']; echo $eTitle;} ?>" data-mini="true" />
				<!--Time-->
				<label for="<?php echo $eventTime;?>"><span class="required">*</span>Date &amp; time:</label>				
				<input type="datetime-local" name="<?php echo $eventTime;?>" value="<?php if(isset($_POST['submit'])){ $eTime = $_POST['time']; echo $eTime;} ?>" data-clear-btn="true">
				<!--Location-->
				<label for="<?php echo $eventLocation;?>"><span class="required">*</span>Location:</label>
				<input type="text" name="<?php echo $eventLocation;?>" value="<?php if(isset($_POST['submit'])){ $eLocation = $_POST['location']; echo $eLocation;} ?>" data-mini="true" />
				<!--Activity-->
				<label for="<?php echo $eventActivity;?>"><span class="required">*</span>Activity:</label>
				<select name="<?php echo $eventActivity;?>">
					<option value="1">Pickup sports (basketball, soccer, football)</option>
					<option value="2">Outdoor activities (hiking, airsoft, surfing)</option>
					<option value="3">Common interests (photowalks, home-brewing, record collecting)</option>
					<option value="4">Entertainment (movies, concerts, art galleries)</option>
				</select>	
				<!--# of participants-->			
				<label for="<?php echo $eventParticipants;?>"><span class="required">*</span>Number of participants:</label>
				<select name="<?php echo $eventParticipants;?>">
					<option value="1">4</option>
					<option value="2">6</option>
					<option value="3">8</option>
					<option value="4">12</option>
				</select>
				<!--Description-->				
				<label for="<?php echo $eventDescription;?>"><span class="required">*</span>Description:</label>
				<textarea cols="40" rows="8" name="<?php echo $eventDescription;?>" value=""><?php if(isset($_POST['submit'])){ $eDescription = $_POST['description']; echo $eDescription;} ?></textarea>
				<input type="submit" name="submit" value="Finish">
			</form>
		</div>
	</div>	
</body>
</html>

