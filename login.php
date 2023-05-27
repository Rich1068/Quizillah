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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" href="style.css">	
	</head>
	
	<body>
		<div class="container">
			<form action="attempt-login.php" method="POST">
				<div align="center">
					<img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81ry9dp570dPojWLZoz2qawojbeFVVyYBHJSDCcdEohzGP3FLzni6OsoDdVWecSP2lstaPT_OHXM3bM-3NkisU3LFJEN=s1600" 
						alt="quizillah" width="500" height="245">
				</div>
				<h3 class="head3" align="center">Login Page</h3>
				<div align="center">
					<input type="email" name="email" placeholder="email@address.com" class="email"/>	
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
	</body>
</html>