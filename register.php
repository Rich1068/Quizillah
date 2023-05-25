<?php

require "vendor/autoload.php";

session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>
<h1>Register a User</h1>

<form action="save-registration.php" method="POST">
	<div>
		<label>Username</label>
		<input type="text" name="username" placeholder="Username" required/>	
	</div><br>
	<div>
		<label>Email</label>
		<input type="text" name="email" placeholder="Email" optional/>	
	</div><br>
    <div>
		<label>Password</label>
		<input type="password" name="password" placeholder="Password" required/>	
	</div><br>
    <div>
    <label>Confirm Password</label>
		<input type="password" name="confirm_password" placeholder="Confirm Password" required/>
    </div>
	<div>
		<button>
			Register 
		</button>	
	</div>
	</form>
</body>
</html>

        