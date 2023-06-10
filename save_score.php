<?php
require "vendor/autoload.php";
require "config.php";
session_start();
use App\QuestionManager;
use App\Score;
$manager = new QuestionManager;

$username = $_SESSION['user']['username'];
$quiz = $_SESSION['Subject'];
$score = $manager->computeScore($_SESSION['answers']);
$id = $_SESSION['user']['id']; 
$result = Score::register($username, $quiz, $score, $id);
$_SESSION['buttonClicked'] = true;

header('Location: result.php');
exit;
?>
