<?php 
	include("includes/classes/Account.php");
	
	$account = new Account();

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to the Spotify Clone</title>
</head>
<body>
	
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<div class="form-control-box">
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Bart Simpson" required>
			</div>
			<div class="form-control-box">
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
			</div>
			<button type="submit" name="loginButton">Login</button>
		</form>


	<form id="loginForm" action="register.php" method="POST">
			<h2>Create you free account</h2>
			<div class="form-control-box">
				<label for="userName">Username</label>
				<input id="userName" name="userName" type="text" placeholder="e.g. BartSimpson" required>
			</div>

			<div class="form-control-box">
				<label for="firstName">First Name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" required>
			</div>

			<div class="form-control-box">
				<label for="lastName">Last Name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" required>
			</div>

			<div class="form-control-box">
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="bart@email.com" required>
			</div>

			<div class="form-control-box">
				<label for="email2">Confirm Email</label>
				<input id="email2" name="email2" type="email" placeholder="bart@email.com" required>
			</div>

			<div class="form-control-box">
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Your Password" required>
			</div>

			<div class="form-control-box">
				<label for="password2">Confirm Password</label>
				<input id="password2" name="password2" type="password" placeholder="Your Password" required>
			</div>
			<button type="submit" name="registerButton">Sign Up</button>
		</form>
	</div>

</body>
</html>