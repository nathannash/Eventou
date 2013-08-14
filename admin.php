<?php include 'header.php';?>
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
			<a data-rel="back">Back</a>
		</div>
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<h2>Administration Panel</h2>
		</div>
	</div>	
</body>
</html>

