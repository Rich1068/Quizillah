<?php
require "vendor/autoload.php";


session_start();
use App\QuestionManager;


$score = null;
$Ans = null;
try {
    $manager = new QuestionManager;
    $manager->initialize();
    
    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }
    $score = $manager->computeScore($_SESSION['answers']);
} catch (Exception $e) {
    
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
</head>
<body>

<h1>Thank You!</h1>

<h3>
    Congratulations <?php echo $_SESSION['user']['username'] . " (" . $_SESSION['user']['email'] . ")"; ?>! <br>
    Score: <?php echo '<span style="color:blue;">' . $score . '</span>';?> out of <?php echo $manager->getQuestionSize();?> items<br>Your Answers: <br>
    <?php $Ans = $manager->showAnswer($_SESSION['answers']);?></h3><br>
    
</body>
<form method="POST" action="selection.php" >
<button type="submit">Return to Selection</button>
</form>

<form method="POST" action="save_score.php" >
<button type="submit">Save Score</button>
</form>

<form method="POST" action="leaderboard.php" >
<button type="submit">Leaderboards</button>
</form>

<form method="POST" action="profile.php" >
<button type="submit">Profile</button>
</form>
</html>

