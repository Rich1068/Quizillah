<?php
session_start();
require "vendor/autoload.php";
$_SESSION['is_quiz_started'] = false;
unset($_SESSION['Subject']);
unset($_SESSION['answers']);
unset($_SESSION['buttonClicked']);
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
    
    <body class="bg" align="center">
     <div>   
        <form method="POST" action="selection_post.php" id="selection" >
            <div style="position: relative; display: inline-block;margin-top:55px;" >
                <img src="images/CW_Selection.png"
                width="200" height="400">
                <button type="submit" Name="topic" Value= "Contemporary_World" class="button_type1" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt">Contemporary World</span>
                </button>
            </div>

            <div style="position: relative; display: inline-block;">
                <img src="images/ethics_selection.png"
                width="200" height="400">
                <button type="submit" name="topic" value="Ethics" class="button_type2" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                        <span class="btn-txt1">Ethics</span>
                </button>
            </div>
                
            <div style="position: relative; display: inline-block;">
                <img src="images/CCS06_Select.png"
                width="200" height="400">
                <button type="submit" name="topic" value="Ccs06" class="button_type3" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                        <span class="btn-txt2">CCS06</span>
                    </button>
            </div>

            <div style="position: relative; display: inline-block;">
                <img src="images/ITE_SELECTION.png"
                width="200" height="400">
                <button type="submit" name="topic" value="Ite" class="button_type4" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                        <span class="btn-txt3">ITE</span>
                </button>
            </div>

            <div style="position: relative; display: inline-block;">
                <img src="images/infoman_selection.png"
                width="200" height="400">
                <button type="submit" name="topic" value="Ccs05" class="button_type5" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt3">CCS05</span>
                </button>
            </div>


            <div align="center">
                <a class="logout" href="login.php">LOGOUT</a>
            </div>
            
        </form>
</div>
    </body>
</html>