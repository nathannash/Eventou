<?php include 'core/init.inc.php';?>
<?php include 'header.php';?>
<body>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1><a href="/Eventou">Eventou</a></h1>
			<a href="/Eventou">Back</a>
		</div>
		<!-- event description -->
		<div data-role="content">
			<?php
				//Get current URL and extract event_id
				$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$pageID = explode("=", $url); //everything after 'event_id?=' is the pageID
				
				//MySQL Query
				$eventID = mysql_real_escape_string($_GET['event_id']);
				$query = "SELECT * FROM event_system WHERE event_id='$eventID' LIMIT 1";
				$result = mysql_query($query);
				$row = mysql_fetch_row($result);
																
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
			?>			
			<form action=" " method="post"> 
				<input type="submit" value="RSVP">
			</form>			
		</div>
	</div>	
</body>
</html>

