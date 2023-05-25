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
<form method="POST" action="selection_post.php" id="selection">
<button type="submit" Name="topic" Value= "Contemporary_World">Contemporary World</button>
<button type="submit" name="topic" value="Ethics">Ethics</button>
<button type="submit" name="topic" value="UTS">UTS</button>
<a href="login.php">LOGOUT</a>
</form>
</html>