<?php
session_start();
require "vendor/autoload.php";
$_SESSION['is_quiz_started'] = false;
unset($_SESSION['Subject']);
unset($_SESSION['answers']);
$_SESSION['current_question_number'] = 1;

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: login.php');
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selection</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <form method="POST" action="selection_post.php" id="selection">
            <button type="submit" Name="topic" Value= "Contemporary_World" class="cw">
                <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
                </span>
                    <span class="button-text">CW</span>
            </button>

            <button type="submit" name="topic" value="Ethics" class="ethics" > 
                <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
                </span>

                    <span class="button-text">Ethics</span>
                </button>
                
            <button type="submit" name="topic" value="UTS" class="uts">
                <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
                </span>
                    <span class="button-text">UTS</span>
            </button>

            <div class="logout-container">
                <a href="login.php">LOGOUT</a>
            </div>

        </form>
    </body>
</html>