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
        <form method="POST" action="selection_post.php" id="selection" class="select">
            <div style="position: relative; display: inline-block;">
                <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81qTLWWAMPBPKUk1AdEccp2yP-dLWOoqvVOxahMUjW-D6Sdg5TRJe8kbFVwEjMWmQ79X2ALTLBpdV5XfSF9Tvb_akU5i3A=s2560"
                width="200" height="400">
                <button type="submit" Name="topic" Value= "Contemporary_World" class="button_type1" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt">Contemporary World</span>
                </button>
            </div>

            <div style="position: relative; display: inline-block;">
            <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81pgjbX1CIzXgLq1NvQQaoPgM63mvUvBKu-w9LWl8bckKjF-ttKlPHcet2UA3tEwgI-d-7eKQ8YZwcC2dxCZ7yqoqojxmQ=s2560"
             width="200" height="400">
            <button type="submit" name="topic" value="Ethics" class="button_type2" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt1">Ethics</span>
                </button>
            </div>
                
            <div style="position: relative; display: inline-block;">
            <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81rWmQbDiizSHXpKZfN17926ZM6Wi0F2oFPjGjHamqy2jrBvANrWnw_YZlV05tnhcKBOqS8oEH7uUFPuTPkwgSlpSMJ_lw=s2560"
             width="200" height="400">
            <button type="submit" name="topic" value="UTS" class="button_type3" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt2">CCS06</span>
                </button>
            </div>

            <div style="position: relative; display: inline-block;">
            <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81rYMU5OZBFCxaQ6enilBLmpjgjBcVZxz2aCX8YmbmUpG8zv-HCSGLFwLl408pkj1tX7TJwsbmy8ZW1jhYgB7DIQ9puA=s2560"
             width="200" height="400">
            <button type="submit" name="topic" value="UTS" class="button_type4" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt3">ITE</span>
                </button>
            </div>

            <div style="position: relative; display: inline-block;">
            <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81qJhhaKQzr38Y4mp5UbRab14uVHWjQOjQaeAC2zLwNntcbp_-3HBs6fVMYlbJgYFp7J9_kPHKyllssLAcnikGuZGFT3MA=s2560"
             width="200" height="400">
                <button type="submit" name="topic" value="UTS" class="button_type5" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                    <span class="btn-txt3">CCS05</span>
                </button>
            </div>


            <div align="center">
                <a class="logout" href="login.php">LOGOUT</a>
            </div>

        </form>
    </body>
</html>