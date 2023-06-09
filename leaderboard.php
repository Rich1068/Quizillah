<!DOCTYPE html>
<html>
  <head>
      <title>
        Leaderboards
      </title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body class="body_res">
      <div>
      <img class="logo" src="images/LEADERBOARD_LOGO.png">
      </div>
      
      <div>
      <img class="crown" src="images/CROWN_LEADERBOARD.png">
      </div>

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
<?php
require "config.php";
use App\Score;

if (!isset($_SESSION['dropdown'])) {
  $_SESSION['dropdown'] = 'Contemporary_World'; 
}
$selectedSubject = $_SESSION['dropdown'];
?>
<br><br><br><br><br><br>

    <form action="leaderboard_process.php" method="post" id="myForm">
      <select id="Dropdown" name="Dropdown" onchange="submitForm()">
        <option value="Contemporary_World" <?php if ($selectedSubject === 'Contemporary_World') echo 'selected'; ?>>Contemporary World</option>
        <option value="Ethics" <?php if ($selectedSubject === 'Ethics') echo 'selected'; ?>>Ethics</option>
        <option value="Ccs05" <?php if ($selectedSubject === 'Ccs05') echo 'selected'; ?>>CCS05</option>
        <option value="Ccs06" <?php if ($selectedSubject === 'Ccs06') echo 'selected'; ?>>CCS06</option>
        <option value="Ite" <?php if ($selectedSubject === 'Ite') echo 'selected'; ?>>ITE</option>
      </select>
    </form>
    
    <h2 align="center" class="lb-res">LEADERBOARDS </h2>

<?php
$leaderboard = Score::list();

echo "<table border='1' cellpadding='5' class='tb-res'>";
echo "<tr>";
    echo "<th class='th-res'>Username</th>";
    echo "<th class='th-res'>Subject</th>";
    echo "<th class='th-res'>Score</th>";
    echo "<th class='th-res'>Saved_at</th>";
echo "</tr>";
foreach($leaderboard as $data){
    echo "<tr>";
    foreach ($data as $columnName => $Value){
        echo "<td>" . $Value . "</td>";
    }
    echo "<tr>";
}
?>
<script>
<?php

  // $storedValue = isset($_SESSION['dropdown']) ? $_SESSION['dropdown'] : '';
?>
document.getElementById('Dropdown').value = '<?php echo $selectedSubject; ?>';


function submitForm() {
    document.getElementById('myForm').submit();
  }
</script>

</html>