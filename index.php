<?php include 'core/init.inc.php';?>
<?php include 'header.php';?>
<a href="index.php" id="" title="index">index</a>
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
			<!--<ul data-role="listview" data-inset="true">
			    <li>
					<a href="/Eventou/event-description.html">
			        <img width="100" height="100" style="background:#333;" />
			        <h2>Broken Bells</h2>
			        <p>Broken Bells</p></a>
			    </li>
			    <li>
					<a href="/Eventou/event-description.html">
			        <img width="100" height="100" style="background:#333;" />
			        <h2>Warning</h2>
			        <p>Hot Chip</p></a>
			    </li>
			    <li>
					<a href="/Eventou/event-description.html">
			        <img width="100" height="100" style="background:#333;" />
			        <h2>Wolfgang Amadeus Phoenix</h2>
			        <p>Phoenix</p></a>
			    </li>
			</ul>-->
		</div>
	</div>	
</body>
</html>

