<?php include('../core/init.inc.php');?>
<?php include('header.php');?>
<body>
	<div data-role="page">
	    <!-- Admin/User Panel options -->
	    <div data-role="panel" data-position-fixed="true" data-display="reveal" id="mypanel">
			<ul>
				<li><a href="/Eventou">Home</a></li>
				<li><a href="/Eventou/profile.php">$Username</a></li>
				<li><a href="/Eventou/create-event.php">Create Event</a></li>
				<li><a href="/Eventou/admin.php">Admin</a></li>				
			</ul>
			<a href="#my-header" data-rel="close">Close panel</a>
	        <!-- panel content goes here -->
	    </div>
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1><a href="/Eventou">Eventou</a></h1>
			<a href="/Eventou">Back</a>
		</div>
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<h2>Administration Panel</h2>
			<p>This page is for the deletion of abusive events that do not adhere to this sites Terms of Service.</p>
			<h3>Delete Events</h3>
			<?php
				$SQLString = "SELECT * FROM `event_system`";
				$QueryResult = @mysql_query($SQLString);
				
				//Display events
				echo '<ul data-role="listview" data-filter="true" data-filter-placeholder="Search events..." data-inset="true">
';				
				while(($Row = mysql_fetch_row($QueryResult)) !== FALSE) {
					//Display event title, time and description from db
					echo '<li data-icon="delete"><a href="delete_event.php?id='.$Row[1].'"><h2>'.$Row[2].'</h2><p>'.$Row[3].'</p><p>'.$Row[7].'</p></a></li>';
				}
				echo '</ul>';
				mysql_close();
			?>			
		</div>
	</div>	
</body>
</html>

