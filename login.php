<?php

require "config.php";
session_destroy();
// If the session variable is already set, automatically redirect the user to index page
if (isset($_SESSION['is_logged_in'])) {
	if ($_SESSION['is_logged_in']) {
		header('Location: selection.php');
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<style>
		.about_us{
			position:fixed;
    		bottom:0;
    		right:0;
			font-size: 25px;
			margin: 10px;
		}
		</style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" href="style.css">	
	</head>
	
	<body class="login_body">
		<div class="container">
			<form action="attempt-login.php" method="POST">
				<div align="center">
					<img src="images/Logo.png" 
						alt="quizillah" width="500" height="245">
				</div>
				<h3 class="head3" align="center">Login Page</h3>
				<div align="left">
					<input type="email" name="email" placeholder="email@address.com" class="email" size="50"/>	
				</div>

				<div class="divider"> </div>

				<div align="center">
					<input type="password" name="password" class="pass"/>	
				</div>

				<div align="center">
					<button class="login">
						Login
					</button>	
				</div>
				<hr class="div2" align="center">
				<div class="div3" align="center">Not yet a member?</div>
				<div align="center">
					<a href="register.php">Register</a>	
				</div>
			</form>
		</div>
		<a href="about_us.php" class="about_us"><b>ABOUT US</b></a>	
	</body>
</html>