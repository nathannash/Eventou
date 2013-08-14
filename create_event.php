<?php include 'header.php';?>
<body>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1>Create Event</h1>
			<a href="/Eventou">Back</a>
		</div>
		<!-- list of events -->
		<div data-role="content" class="event-list">
			<form action="core/form.inc.php" method="post"> 
				<!--Title-->
				<label for="title">Title:</label>
				<input type="text" name="title" id="basic" data-mini="true" />
				<!--Time-->
				<label for="datetime">Date &amp; time:</label>				
				<input type="datetime-local" data-clear-btn="true" name="datetime" id="datetime-4" value="">
				<!--Location-->
				<label for="location">Location:</label>
				<input type="text" name="location" id="basic" data-mini="true" />
				<!--Activity-->
				<label for="activity">Activity:</label>
				<select name="activity" id="select-native-1">
					<option value="1">Pickup sports (basketball, soccer, football)</option>
					<option value="2">Outdoor activities (hiking, airsoft, surfing)</option>
					<option value="3">Common interests (photowalks, home-brewing, record collecting)</option>
					<option value="4">Entertainment (movies, concerts, art galleries)</option>
				</select>	
				<!--# of participants-->			
				<label for="participants">Number of participants:</label>
				<select name="participants" id="select-native-1">
					<option value="1">4</option>
					<option value="2">6</option>
					<option value="3">8</option>
					<option value="4">12</option>
				</select>
				<!--Description-->				
				<label for="description">Description:</label>
				<p>Please include a <a href="http://maps.google.com" target="_blank">google maps</a> link to the meeting place</p>				
				<textarea cols="40" rows="8" name="description" id="textarea-1"></textarea>
				<input type="submit" value="Finish">
			</form>
		</div>
	</div>	
</body>
</html>

