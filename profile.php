<?php include 'core/init.inc.php';?>
<?php include 'header.php';?>
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
					echo "Hello, " . $_SESSION['username_login'] . "!";
				?>
			</h2>
			<h2>My Events</h2>
			<div data-role="content" class="event-list">
				<?php
					$SQLString = "SELECT * FROM `event_system`";
					$QueryResult = mysql_query($SQLString);
					
					while(($Row = mysql_fetch_row($QueryResult)) !== FALSE) {
						//Display event title and description from db
						echo '<ul data-role="listview" data-inset="true">';				
						echo '<li><a href="#"><h2>'.$Row[1].'</h2><p>'.$Row[6].'</p></a></li>';
						echo '</ul>';
					}
				?>
			</div>
		</div><!-- .event-list -->
	</div>	
</body>
</html>

