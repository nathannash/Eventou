<?php
//ini_set('display_errors', 'On');
include ("core/init.inc.php");

$errors = array();

//Check login form
if(isset($_POST['username_login'], $_POST['password_login']) && !empty($_POST['username_login']) && !empty($_POST['password_login'])){
	
	//If the username password combination is valid log in
	if(valid_credentials($_POST['username_login'], $_POST['password_login'])){
		$_SESSION['username_login'] = htmlentities($_POST['username_login']);
		$_SESSION['loggedin'] = true;
		
		header('Location: http://localhost:8888/Eventou/');
		die();
	}
	
}

//Check registration form
if(isset($_POST['username_register'], $_POST['password_register'])){
	
	//Check if username is empty
	if(empty($_POST['username_register'])){
		$errors[] = 'The username cannot be empty.';
	}
	
	//Check if password is empty
	if(empty($_POST['password_register']) || empty($_POST['repeat_password_register'])){
		$errors[] = 'The password cannot be empty.';
	}
	
	//Check if repeat password doesn't match when registering
	if ($_POST['password_register'] !== $_POST['repeat_password_register']){
		$errors[] = 'Password verification failed.'; 
	}

	//Check if username already exists
	if(user_exists($_POST['username_register'])){
		$errors[] = 'The username you entered is already taken.';
	}
	
	//Register account and login
	if(empty($errors)){
		add_user($_POST['username_register'], $_POST['password_register']);
		
		$_SESSION['username'] = htmlentities($_POST['username']);
		$_SESSION['loggedin'] = true;
		
		header('Location: http://localhost:8888/Eventou/');
		die();
	}
}
?>
<?php include 'header.php';?>
<body>
	<?php
		if(empty($errors) === false){
			foreach($errors as $error){
				echo "{$error}";
			}
		}
	?>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1>Login</h1>
			<a data-rel="back">Back</a>
		</div>
		<div data-role="collapsible-set" data-theme="c" data-content-theme="d">
			<div data-role="collapsible" data-collapsed="false">
			<!--Login-->
				<h3>Login</h3>
				<form action="" method="post">
					<!--Username-->
					<label for="username_login">Username:</label>
					<input type="text" name="username_login" />
					<!--Password-->
					<label for="password_login">Password:</label>
					<input type="password" name="password_login" />
					<!--Login-->
					<input type="submit" value="Login" />
				</form>
			</div>
			<div data-role="collapsible">
			<!--Register-->
				<h3>Register</h3>
				<form action="" method="post">
					<!--Username-->
					<label for="username_register">Username:</label>
					<input type="text" name="username_register" />
					<!--Password-->
					<label for="password_register">Password:</label>
					<input type="password" name="password_register" />
					<!--Repeat Password-->
					<label for="repeat_password_register">Repeat Password:</label>
					<input type="password" name="repeat_password_register" />
					<!--Register-->
					<input type="submit" value="Register" />
				</form>
			</div>
		</div>		
</body>
</html>
