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
<style>
    body {
        background-image: url("images/result_bg.jpg");
        background-size: cover;
        background-position: 10%;
        background-repeat: no-repeat;
        font-size: 25px;
        margin:0;
    }
    div.score {
    border-radius: 25px;
    background-color: white;
	width: 500px;
	height: 700px;
	max-width: 99%;
    margin-left: 110px;
    margin-top: 20px;
	position: relative;
    padding: 10px;
    text-align: center;
    overflow:hidden;
    border: 5px lightcyan solid;
    }
   
    button.select {
    height: 50px;
    width: 196px;
    position: relative;
    background-color: #3be5ff;
    cursor: pointer;
    border: 2px solid darkblue; /*BORDER COLOR*/
    overflow: hidden;
    border-radius: 30px;
    color: black;             /*FONT COLOR AT EASE*/
    transition: all 0.5s ease-in-out;
    }
    .btn-txt {
    z-index: 1;
    font-weight: 800;
    letter-spacing: 0px;
  }

  .select::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    transition: all 0.5s ease-in-out;
    background-color: #3be5ff;  /*COLOR FILL UP THE BUTTON*/
    border-radius: 30px;
    visibility: hidden;
    height: 10px;
    width: 10px;
    z-index: -1;
  }
  
  .select:hover {
    box-shadow: 1px 1px 200px #3be5ff; /* SHADOW COLOR */
    color: black; /* FONT COLOR CHANGE COLOR WHEN HOVER*/
    border: none;
  }
 /*-------------------------------------------------------------------------------------------------------------*/
    button.save {
    height: 50px;
    width: 196px;
    position: relative;
    background-color: #9EAD42;
    cursor: pointer;
    border: 2px solid #013220; /*BORDER COLOR*/
    overflow: hidden;
    border-radius: 30px;
    color: black;             /*FONT COLOR AT EASE*/
    transition: all 0.5s ease-in-out;
    }
    .btn-txt1 {
    z-index: 1;
    font-weight: 800;
    letter-spacing: 0px;
  }

  .save::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    transition: all 0.5s ease-in-out;
    background-color: #9EAD42;  /*COLOR FILL UP THE BUTTON*/
    border-radius: 30px;
    visibility: hidden;
    height: 10px;
    width: 10px;
    z-index: -1;
  }
  
  .save:hover {
    box-shadow: 1px 1px 200px #9EAD42; /* SHADOW COLOR */
    color: black; /* FONT COLOR CHANGE COLOR WHEN HOVER*/
    border: none;
  }
  .donesave{
    height: 50px;
    width: 196px;
    position: relative;
    background-color: transparent;
    cursor: pointer;
    border: 2px solid #9EAD42; /*BORDER COLOR*/
    overflow: hidden;
    border-radius: 30px;
    color: black;             /*FONT COLOR AT EASE*/
    transition: all 0.5s ease-in-out;
  }
  div.sc {
    font-size: 30px;
  }
   /*-------------------------------------------------------------------------------------------------------------*/
   button.lb {
    height: 50px;
    width: 196px;
    position: relative;
    background-color: #9EAD42;
    cursor: pointer;
    border: 2px solid #013220; /*BORDER COLOR*/
    overflow: hidden;
    border-radius: 30px;
    color: black;             /*FONT COLOR AT EASE*/
    transition: all 0.5s ease-in-out;
    }
    .btn-txt2 {
    z-index: 1;
    font-weight: 800;
    letter-spacing: 0px;
  }

  .lb::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    transition: all 0.5s ease-in-out;
    background-color: #9EAD42;  /*COLOR FILL UP THE BUTTON*/
    border-radius: 30px;
    visibility: hidden;
    height: 10px;
    width: 10px;
    z-index: -1;
  }
  
  .lb:hover {
    box-shadow: 1px 1px 200px #9EAD42; /* SHADOW COLOR */
    color: black; /* FONT COLOR CHANGE COLOR WHEN HOVER*/
    border: none;
  }
  /*-------------------------------------------------------------------------------------------------------------*/
  button.profile {
    height: 50px;
    width: 196px;
    position: relative;
    background-color: #3be5ff;
    cursor: pointer;
    border: 2px solid darkblue; /*BORDER COLOR*/
    overflow: hidden;
    border-radius: 30px;
    color: black;             /*FONT COLOR AT EASE*/
    transition: all 0.5s ease-in-out;
    }
    .btn-txt3 {
    z-index: 1;
    font-weight: 800;
    letter-spacing: 0px;
  }

  .profile::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    transition: all 0.5s ease-in-out;
    background-color: #3be5ff;  /*COLOR FILL UP THE BUTTON*/
    border-radius: 30px;
    visibility: hidden;
    height: 10px;
    width: 10px;
    z-index: -1;
  }
  
  .profile:hover {
    box-shadow: 1px 1px 200px #3be5ff; /* SHADOW COLOR */
    color: black; /* FONT COLOR CHANGE COLOR WHEN HOVER*/
    border: none;
  }
  h2 {
    color: white;
    margin-left: 95px;
    
  }
  div.header {
  padding: 1px;
  text-align: left;
  background: #423880;
  font-size: 40px;
  display: flex;
  }
  img {
    top: 2%;
    left: 77%;
    position: absolute;
  }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
</head>

<?php if ($score < 5): ?>
<div class="header">
<h2>Better Luck Next Time <?php echo $_SESSION['user']['username'] ?>! <br></h2>
</div>
<?php elseif ($score >= 5 && $score <= 8): ?>
<div class="header">
<h2>Nice Try <?php echo $_SESSION['user']['username'] ?>! <br></h2>
</div>
<?php else: ?>
<div class="header">
<h2>Congratulations <?php echo $_SESSION['user']['username'] ?>!</h2>
</div>
<?php endif; ?>
<img src="images/logo_bw.png" alt="quizillah" width="400" height="150">

<body>
	

<div class="score">
    <div class="sc">
    Score: <?php echo '<span style="color:blue;">' . $score . '</span>';?> out of <?php echo $manager->getQuestionSize();?> items<br>
    </div>
    Your Answers: <br>
    <?php $Ans = $manager->showAnswer($_SESSION['answers']);?>
<br>

<!-- Return Selection -->
<form method="POST" action="selection.php" >
<button type="submit" class="select" style="position: absolute; top: 90%; left: 25%; transform: translate(-50%, -50%);">
<span class="btn-txt">
Return to Selection
</span>
</button>
</form>

<!-- Save Score -->
<?php if (!isset($_SESSION["buttonClicked"])): ?>
<form method="POST" action="save_score.php" >
<button type="submit"  name="button" class="save" style="position: absolute; top: 80%; left: 70%; transform: translate(-50%, -50%);">
<span class="btn-txt1">
Save Score
</span>
</button>
</form>
<?php else: ?>
<form method="POST" action="save_score.php" >
<button type="submit"  name="button" class="donesave" style="position: absolute; top: 80%; left: 70%; transform: translate(-50%, -50%);" <?php if ($disableButton) echo 'disabled'; ?>>
<span class="btn-txt1">
Save Score
</span>
</button>
</form>
<?php endif; ?>

<!-- Leaderboards -->
<form method="POST" action="leaderboard.php" >
<button type="submit" class="lb" style="position: absolute; top: 80%; left: 25%; transform: translate(-50%, -50%);">
<span class="btn-txt2">
Leaderboards
</span>
</button>
</form>
<!-- Return to selection -->
</body>


<!-- Profile -->
<form method="POST" action="profile.php" >
<button type="submit" class="profile" style="position: absolute; top: 90%; left: 70%; transform: translate(-50%, -50%);">
<span class="btn-txt3">
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