<?php include('../core/init.inc.php');?>
<?php include('header.php');?>
<body>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1><a href="/Eventou">Eventou</a></h1>
			<a href="/Eventou">Back</a>
		</div>
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<h2>
				<?php
					session_start();
					$username = $_SESSION['username_login'];
					echo "Hello, " . $username . "!";
				?>
			</h2>
			<h2>My Events</h2>
			<div data-role="content" class="event-list">
				<?php
					$SQLString = "SELECT * FROM rsvp_system WHERE user_name='$username'";
					$QueryResult = mysql_query($SQLString);
					
					echo '<ul data-role="listview" data-inset="true">';				
					while(($Row = mysql_fetch_row($QueryResult)) !== FALSE) {
						//Display event title and description from db
						echo '<li><a href="/Eventou/templates/event_description.php?event_id='.$Row[1].'"><h2>'.$Row[2].'</h2><p>'.$Row[3].'</p></a></li>';
					}
					echo '</ul>';
				?>
			</div>
		</div><!-- event-list -->
	</div>	
</body>
</html>

