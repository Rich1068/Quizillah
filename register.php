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
	<style>
		
		form {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 10px;
            margin: 20px;
            max-width: 700px; /* set a maximum width */
            margin-left: 10px; /* center horizontally */
            margin-right: auto;
			height: 625px;
        }
		
		input[type="text"],
		input[type="password"] 
		{
            padding: 5px;
            border: 2px solid #00008B;	
            border-radius: 20px;
            margin-bottom: 10px;  
            margin-left: 25px;
            margin-right: 25px;
            width: 85%;
            display: block;
            transition: all 0.3s ease;
        }

		button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 255px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
		}

		button[type="submit"]:hover {
            background-color: #3e8e41;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
            transform: translate(2px, 2px);
		}

		hr.divider{
			border: 3px solid yellow;
			border-radius: 0px;
			width: 86%;
			margin-bottom: 30px; 
		}

		hr.divider2{
			border: 3px solid #00008B;
			border-radius: 0px;
			width: 86%;
		}
		hr.divider3{
			border: 3px solid #00008B;
			border-radius: 0px;
			width: 86%;
			margin-bottom: 10px; 
		}

		hr.divider4{
			border: 3px solid yellow;
			border-radius: 0px;
			width: 86%;
			margin-bottom: 20px;
		}
		
		.form-section {
			padding: 16px;
			font-size: .85rem;
			text-align: center;
		}

		.form-section a {
			font-weight: bold;
			color: #0066ff;
			transition: color .3s ease;
		}
		.about{
			font-weight: bold;
			color: yellow;
			text-align: right;
			margin-right: 100px;
			transition: color .3s ease;
		}
		.vl {
			border-right: 20px solid #00008B;
			height: 100vh;
			top: 0;
			right: 0;
			width: 30px;
			z-index: 9999;
			position: fixed;
			margin-right: 70px;
		}

		.vl1 {
			border-right: 20px solid yellow;
			height: 100vh;
			top: 0;
			right: 0;
			width: 30px;
			z-index: 9999;
			position: fixed;
			margin-right: 30px;
		}

		body {
            background: orange;
            font-family: Arial, sans-serif;
        }
		

	</style>	
</head>
<body>
	<form action="save-registration.php" method="POST">

		<div align="center">
			<img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81ry9dp570dPojWLZoz2qawojbeFVVyYBHJSDCcdEohzGP3FLzni6OsoDdVWecSP2lstaPT_OHXM3bM-3NkisU3LFJEN=s1600" 
				alt="quizillah" width="300" height="150">
		</div>

		<div align="center">
			<input type="text" name="email" placeholder="Email" optional/>	
		</div>

		<div align="center">
			<input type="text" name="username" placeholder="Username" required/>	
		</div>

		<hr class="divider" align="center">

		<div align="center">
			<input type="password" name="password" placeholder="Password" required/>	
		</div>

		<div align="center">
			<input type="password" name="confirm_password" placeholder="Confirm Password" required/>
		</div>

		<hr class="divider2">

		<button type="submit" align="center">Register</button>

		<hr class="divider3" align="center">
		<hr class="divider4" align="center">

		<div class="form-section">
			<p>Have an account? <a href="login.php">Log in</a> </p>
		</div>
	</form>

	<div class="vl"></div>
	<div class="vl1"></div>

	<div class="about">
		<a href="login.php">About us</a> 
	</div>
</body>
</html>

        