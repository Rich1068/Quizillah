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
	<style>

	input[type="email"],
	input[type="password"] 
	{
        padding: 5px;
        border: 2px solid #00008B;	
        border-radius: 20px;
        margin-left: 25px;
        margin-right: 25px;
        width: 85%;
        display: block;
        transition: all 0.3s ease;
    }
	input[type="password"]{
		margin-bottom: 30px;
	}
	input[type="email"]{
		margin-bottom: 5px;
	}

	button{
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
		margin-bottom: 20px;
	}

	button:hover {
        background-color: #3e8e41;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
        transform: translate(2px, 2px);
	}	
	

	.container {
		text-align: right;
		display: flex;
		width: 1000px;
		height: 700px;
		max-width: 99%;
		align-items: center;
		justify-content: center;
		position: absolute;
		right: 0;
		overflow: hidden;
		background-color: #ffffff25;
		border-radius: 0px;
		box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.03);
		border: 0.1px solid rgba(128, 128, 128, 0.178);
	}
		
	/*.container::after {
		position: absolute;
		content: "";
		width: 80%;
		height: 80%;
		right: -40%;
		background: rgb(157, 173, 203);
		background: radial-gradient(
			circle,
			rgba(157, 173, 203, 1) 61%,
			rgba(99, 122, 159, 1) 100%
		);
			border-radius: 50%;
			z-index: -1;
	}*/

	.divider {
		height: 20px;
		border: 10px;
		display: flex;
		position: center;
		width: 89%;
		margin-left: 25px;
	}

	.divider::before,
	.divider::after {
		flex: 1;
		content: '';
		border-top: 5px solid;
		margin: 5px;	
	}

	.divider::before {
		border-color: yellow; /* Change the color for the left side */
	}

	.divider::after {
		border-color: #00008B; /* Change the color for the right side */
	}

	hr.div2{
		order: 3px solid yellow;
		border-radius: 0px;
		width: 86%;
	}

	.head3{
		color: #00008B;
		font-family:sans-serif;
	}

	</style>	
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
			<input type="email" name="email" placeholder="email@address.com" />	
		</div>

		<div class="divider"> </div>

		<div align="center">
			<input type="password" name="password" />	
		</div>

		<div align="center">
			<button>
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