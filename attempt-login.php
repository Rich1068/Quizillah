<?php

require "config.php";

use App\User;

try {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = User::attemptLogin($email, $password);

	if (!$result) {
		throw new Exception('Access denied, invalid credentials.');
	}

	if (!is_null($result) ) {

		// Set the logged in session variable and redirect user to index page

		$_SESSION['is_logged_in'] = true;
		$_SESSION['user'] = [
			'id' => $result->getId(),
			'username' => $result->getUsername(),
			'email' => $result->getEmail()
		];
		header('Location: selection.php');
	}

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
} catch (Exception $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

echo '<a href="login.php">Login</a>';