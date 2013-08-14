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
					echo $_SESSION['username_login'];
				?>
			</h2>
			<h2>My Events</h2>
			<!--<ul data-role="listview" data-inset="true">
			    <li><a href="#">
			        <img width="100" height="100" style="background:#333;" />
			        <h2>Broken Bells</h2>
			        <p>Broken Bells</p></a>
			    </li>
			    <li><a href="#">
			        <img width="100" height="100" style="background:#333;" />
			        <h2>Warning</h2>
			        <p>Hot Chip</p></a>
			    </li>
			    <li><a href="#">
			        <img width="100" height="100" style="background:#333;" />
			        <h2>Wolfgang Amadeus Phoenix</h2>
			        <p>Phoenix</p></a>
			    </li>
			</ul>-->
		</div><!-- .event-list -->
	</div>	
</body>
</html>

