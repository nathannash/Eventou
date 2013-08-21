<?php include 'core/init.inc.php';?>
<?php include 'header.php';?>
<body>
	<div data-role="page">
	    <!-- Admin/User Panel options -->
	    <div data-role="panel" data-position-fixed="true" data-display="reveal" id="mypanel">
			<ul>
				<?php
					session_start();
					//If the use is logged in display this menu
					if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
						echo '<li><a href="/Eventou/profile.php">'. $_SESSION['username_login'] .'</a></li>';
						echo '<li><a href="/Eventou/create_event.php">Create Event</a></li>';
						echo '<li><a href="/Eventou/logout.php">Logout</a></li>';
					} else {
						echo '<li><a href="/Eventou/login.php">Login/Register</a></li>';
					}
				?>					
			</ul>
			<a href="#my-header" data-rel="close">Close panel</a>
	        <!-- panel content goes here -->
	    </div>
		<!-- header -->	
		<div data-role="header" class="header">
			<a href="#mypanel">Menu</a>
		    <h1><a href="/Eventou">Eventou</a></h1>
		</div>
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<?php
				$SQLString = "SELECT * FROM `event_system`";
				$QueryResult = @mysql_query($SQLString);
				
				//Display events
				echo '<ul data-role="listview" data-inset="true">';				
				while(($Row = mysql_fetch_row($QueryResult)) !== FALSE) {
					//Display event title, time and description from db
					echo '<li><a href="/Eventou/event_description.php?event_id='.$Row[1].'"><h2>'.$Row[2].'</h2><p>'.$Row[3].'</p><p>'.$Row[7].'</p></a></li>';
				}
				echo '</ul>';
				mysql_close();
			?>
		</div>
	</div>	
</body>
</html>

