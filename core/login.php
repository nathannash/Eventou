<?php include('init.inc.php');?>
<?php include('../templates/header.php');?>
<body>
	<div data-role="page">
		<!-- header -->	
		<div data-role="header" class="header">
		    <h1>Login</h1>
			<a data-rel="back">Back</a>
		</div>
		<?php		
		$errors = array();

		//Check login form
		if(isset($_POST['username_login'], $_POST['password_login']) && !empty($_POST['username_login']) && !empty($_POST['password_login'])){
			//If the username password combination is valid log in
			if(valid_credentials($_POST['username_login'], $_POST['password_login'])){
				$_SESSION['username_login'] = htmlentities($_POST['username_login']);
				$_SESSION['loggedin'] = true;

				header('Location: http://'.$host.'/'.$base.'/');
			}
		} elseif(isset($_POST['username_login'], $_POST['password_login'])){
			if(empty($_POST['username_login'])){
				echo '<div class="ui-bar alert-danger"><h3>The username can\'t be empty.</h3></div>';
			}
			if(empty($_POST['password_login'])){
				echo '<div class="ui-bar alert-danger"><h3>The password can\'t be empty.</h3></div>';
			}
		}

		//Check registration form
		if(isset($_POST['username_register'], $_POST['email_register'], $_POST['password_register'])){
			//Check if username is empty
			if(empty($_POST['username_register'])){
				$errors[] = '<div class="ui-bar alert-danger"><h3>The username cannot be empty.</h3></div>';
			}

			//Check if password is empty
			if(empty($_POST['password_register']) || empty($_POST['repeat_password_register'])){
				$errors[] = '<div class="ui-bar alert-danger"><h3>The password cannot be empty.</h3></div>';
			}

			//Check if repeat password doesn't match when registering
			if ($_POST['password_register'] !== $_POST['repeat_password_register']){
				$errors[] = '<div class="ui-bar alert-danger"><h3>Password verification failed.</h3></div>'; 
			}

			//Check if username already exists
			if(user_exists($_POST['username_register'])){
				$errors[] = '<div class="ui-bar alert-danger"><h3>The username you entered is already taken.</h3></div>';
			}

			//Register account and login
			if(empty($errors)){
				add_user($_POST['username_register'], $_POST['password_register'], $_POST['email_register']);

				$_SESSION['username'] = htmlentities($_POST['username']);		
				$_SESSION['loggedin'] = true;

				header('Location:http://'.$host.'/'.$base.'/');
			}
		}?>
		<?php
			//Spit out any errors
			if(empty($errors) === false){
				foreach($errors as $error){
					echo "{$error}";
				}
			}?>		
		<div data-role="collapsible-set" data-theme="c" data-content-theme="d">
			<div data-role="collapsible" data-collapsed="false">
			<!--Login-->
			<?php
				//Form variables 
				$usernameLogin = "username_login";
				$passwordLogin = "password_login";
				//Stickyform variables
				$uLogin = $uPass = "";
			?>
				<h3>Login</h3>
				<form action="" method="post">
					<!--Username-->
					<label for="<?php echo $usernameLogin;?>">Username:</label>
					<input type="text" name="<?php echo $usernameLogin;?>" value="<?php if(isset($_POST['login_submit'])){ $uLogin = $_POST['username_login']; echo $uLogin;} ?>"/>
					<!--Password-->
					<label for="<?php echo $passwordLogin;?>">Password:</label>
					<input type="password" name="<?php echo $passwordLogin;?>" value="<?php if(isset($_POST['login_submit'])){ $uPass = $_POST['password_login']; echo $uPass;} ?>" />
					<!--Login-->
					<input type="submit" name="login_submit" value="Login" />
				</form>
			</div>
			<div data-role="collapsible">
			<!--Register-->
			<?php
				//Form variables 
				$usernameRegister = 'username_register';
				$emailRegister = 'email_register';
				$passRegister = 'password_register';
				$passRegisterRepeat	= 'repeat_password_register';
				//Stickyform variables
				$rUsernameRegister = $rEmailRegister = $rPassRegister = $rPassRegisterRepeat = "";
			?>
				<h3>Register</h3>
				<form action="" method="post">
					<!--Username-->
					<label for="<?php echo $usernameRegister;?>">Username:</label>
					<input type="text" name="<?php echo $usernameRegister;?>" value="<?php if(isset($_POST['register_submit'])){ $rUsernameRegister = $_POST['username_register']; echo $rUsernameRegister;} ?>" />
					<!--email-->
					<label for="<?php echo $emailRegister;?>">Email:</label>
					<input type="text" name="<?php echo $emailRegister;?>" value="<?php if(isset($_POST['register_submit'])){ $rEmailRegister = $_POST['email_register']; echo $rEmailRegister;} ?>"/>
					<!--Password-->
					<label for="<?php echo $passwordRegister;?>">Password:</label>
					<input type="password" name="<?php echo $passRegister;?>" value="<?php if(isset($_POST['register_submit'])){ $rPassRegister = $_POST['password_register']; echo $rPassRegister;} ?>"/>
					<!--Repeat Password-->
					<label for="<?php echo $passwordRegisterRepeat;?>">Repeat Password:</label>
					<input type="password" name="<?php echo $passRegisterRepeat;?> value="<?php if(isset($_POST['register_submit'])){ $rPassRegisterRepeat = $_POST['repeat_password_register']; echo $rPassRegisterRepeat;} ?>"" />
					<!--Register-->
					<input type="submit" name="register_submit" value="Register" />
				</form>
			</div>
		</div>		
</body>
</html>
