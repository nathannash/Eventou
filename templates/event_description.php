<?php include('../core/init.inc.php');?>
<?php include('header.php');?>
<body>
	<div data-role="page">
		<!-- header -->	
		<?php
			//Get current URL and extract event_id
			$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$pageID = explode("=", $url); //everything after 'event_id?=' is the pageID
		
			//MySQL Query
			$eventID = mysql_real_escape_string($_GET['event_id']);
			$query = "SELECT * FROM event_system WHERE event_id='$eventID' LIMIT 1";
			$result = mysql_query($query);
			$row = mysql_fetch_row($result);			
		?>
		<div data-role="header" class="header">
		    <h1><a href="<?php echo $url?>"><?php echo $row[2];?></a></h1>
			<a href="/Eventou">Back</a>
		</div>
		<!-- event description -->
		<div data-role="content">
			<?php																
				//Serve up the correct record
				if ($pageID[1] === $eventID){
					echo '<h2>'. $row[2] .'</h2>'; //title 
					echo '<p>'. $row[3] .' near<br />'; // date_time
					echo $row[4]. '</p>'; //location
					echo '<p>'. $row[7] .'</p>'; //description
				}
			?>
			<h2>RSVP</h2>
			<?php
				//Check participant limit from event_system table
				$participants = $row[6];
				$maxAttendees;
				$query2 = "SELECT * FROM rsvp_system WHERE event_id='$eventID'";
				$result2 = mysql_query($query2);
				$RSVP = mysql_num_rows($result2);
								
				//Set user limit
				switch($participants) {
					case 1:
						$maxAttendees = 4;
						break;
					case 2:
						$maxAttendees = 6;
						break;
					case 3:
						$maxAttendees = 8;
						break;
					case 4:
						$maxAttendees = 12;
						break;
				}
				
				echo  $RSVP . '/' . $maxAttendees;
			?>
			<?php			
				//additional insert details for record creation
				session_start();
				$username = $_SESSION['username_login'];
				$attendTrue = 1;
			
				$title = $row[2];
				$description = $row[7];
			
				//MySQL Query	
				$user_name = mysql_real_escape_string($_GET['username_login']);
				$query3 = "SELECT * FROM `rsvp_system` WHERE `user_name` = '$username'";
				$result3 = mysql_query($query3);
				$row3 = mysql_fetch_row($result3);	
				
				//Make sure the user isn't already RSVP'd
				if(isset($_POST['RSVP']) && $row3[0] == $username && $row3[1] == $eventID){
					echo '<p><strong>You have already RSVP\'d for this event</strong></p>';
				} else {
					//Insert user RSVP record into table
					if(isset($_POST['RSVP']) && $_SESSION['loggedin'] === TRUE){
						if($RSVP < $maxAttendees){
							$query3 = "INSERT INTO `rsvp_system`(`user_name`, `event_id`, `title`, `description`, `rsvp`) VALUES ('$username', '$eventID', '$title', '$description', $attendTrue)";
							$result3 = mysql_query($query3);
							$RSVP++;
						}
					}
				}			
			?>
			<?php
				//Only allow logged in users to RSVP
				if($_SESSION['loggedin'] === TRUE){
					echo '<form action="'. $url .'" method="POST">';
					echo '<input type="submit" name="RSVP" value="RSVP"/>';
					echo '</form>';
				} else{
					echo '<p><strong>Please log-in to RSVP to an event.</strong></p>';
				}
			?>
		</div>
	</div>	
</body>
</html>

