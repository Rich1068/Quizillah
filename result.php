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

//save score button
if (isset($_SESSION['buttonClicked']) && $_SESSION['buttonClicked']) {
    $disableButton = true;
} else {
    $disableButton = false;
}
?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>RESULT</title>
      <link rel="stylesheet" href="style.css">
  </head>

    <?php if ($score < 5): ?>
      <div class="header-res">
        <h2 class="result">
          Better Luck Next Time 
            <?php echo $_SESSION['user']['username'] ?>! 
            <br>
        </h2>
      </div>

    <?php elseif ($score >= 5 && $score <= 9): ?>
      <div class="header-res">
        <h2 class="result">
          Nice Try <?php echo $_SESSION['user']['username'] ?>! 
            <br>
        </h2>
      </div>

    <?php else: ?>
      <div class="header-res">
          <h2 class="result">
            Congratulations <?php echo $_SESSION['user']['username'] ?>!
          </h2>
      </div>

    <?php endif; ?>
      <img src="images/logo_bw.png" alt="quizillah" width="400" height="150" class="logo-bg_res">

  <body class="BODY-RES">
    
    <div class="score">
        <div class="sc">
          Score: <?php echo '<span style="color:blue;">' . $score . '</span>';?> out of <?php echo $manager->getQuestionSize();?> items<br>
        </div>

        <div style="display:inline-block; text-align: left;">
          Your Answers: <br><br>
        <?php $Ans = $manager->showAnswer($_SESSION['answers']);?>
    </div>
    <br>

  <!-- Return Selection -->
    <form method="POST" action="selection.php" >
      <button type="submit" class="select" style="position: absolute; top: 95%; left: 25%; transform: translate(-50%, -50%);">
        <span class="btn-txt">
          Return to Selection
        </span>
      </button>
    </form>

    <!-- Save Score -->
    <?php if (!isset($_SESSION["buttonClicked"])): ?>
      <form method="POST" action="save_score.php" >
        <button type="submit"  name="button" class="save" style="position: absolute; top: 85%; left: 70%; transform: translate(-50%, -50%);">
          <span class="btn-txt1-res">
            Save Score
          </span>
        </button>
      </form>

    <?php else: ?>
      <form method="POST" action="save_score.php" >
        <button type="submit" Title="Score already saved"  name="button" class="donesave" style="position: absolute; top: 85%; left: 70%; transform: translate(-50%, -50%);" <?php if ($disableButton) echo 'disabled'; ?>>
          <span class="btn-txt1-res">
            Save Score
          </span>
        </button>
      </form>
    <?php endif; ?>

    <!-- Leaderboards -->
    <form method="POST" action="leaderboard.php" >
      <button type="submit" class="lb" style="position: absolute; top: 85%; left: 25%; transform: translate(-50%, -50%);">
        <span class="btn-txt2-res">
          Leaderboards
        </span>
        </button>
    </form>
    <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
            <label for="menu-icon"></label>
            <nav class="nav"> 		
            
                <ul class="pt-5">
                <img class="ddlogo" src="images/logo_bw.png">
                    <li><a href="selection.php">Selection</a></li>
                    <li><a href="leaderboard.php">Leaderboard</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </nav>
  </body>


  <!-- Profile -->
    <form method="POST" action="profile.php" >
      <button type="submit" class="profile" style="position: absolute; top: 95%; left: 70%; transform: translate(-50%, -50%);">
        <span class="btn-txt3-res">
          Profile
        </span>
      </button>
    </form>
  </div>
  </html>

  <script>
  //save score button scripts
    function disableButton() {
          var button = document.querySelector('button[name="button"]');
          button.disabled = true;
      }

  </script>