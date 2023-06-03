<?php
require "config.php";

if (isset($_POST['back'])) {
    $number = $_SESSION['current_question_number'];
    if ($number > 1) {
        $_SESSION['current_question_number'] = $number - 1;
    }
}

header("Location: quiz.php");