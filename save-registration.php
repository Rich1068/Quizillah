<html>
<head>
	<link rel="stylesheet" href="style.css">	
</head>
<?php

require "config.php";

use App\User;

// Save the user information, and automatically login the user

try {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = $_POST['confirm_password'];

	if ($_POST['password']!=$_POST['confirm_password']){
		header("Refresh:0; url=register.php");
		
		echo '<script>alert("Password and Confirm Password does not match. Please try again")</script>';
	}
	else{
		$result = User::register($username, $email, $password);
	}
	if ($result) {

		// Set the logged in session variable and redirect user to index page

		$_SESSION['is_logged_in'] = true;
		$_SESSION['user'] = [
			'id' => $result,
			'username' => $username,
			'email' => $email
		];
		header('Location: selection.php');
	}

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<img class='error' src='images/Error.png'>";
	echo "<h1 class='h1'>" . "Email Already In Use Please Try Another Email" . "</h1>";
	echo "<a class='login' href='register.php'>Back to Register</a>";
}

