<html>
  <head>
  <style>
  select {
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: darkcyan;
    color: white;
    font-size: 20px;
    left:26.5%;
    top:4%;
    position: absolute;
  }
  #myForm {
    margin-top: 20px;
  }
  option {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: darkcyan;
  }
  body {
    background-image: url("images/LEADERBOARD_MAIN_BG.png");
    position: cover;
    background-repeat: no-repeat;
    font-family: Arial, Helvetica, sans-serif;
  }
  table {
    margin: auto;
    border-collapse: collapse;
    width: 80%;
    max-width: 800px;
    border: 1px solid #ccc;
    font-family: Arial, sans-serif;
    position: center;
    border-radius: 10px;
    border-style: hidden; /* hide standard table (collapsed) border */
    box-shadow: 0 0 0 1px #666; /* this draws the table border  */ 
    background-color: white;
    overflow: hidden;
    text-align: center;
    font-size: 20px;
      }
  th{
    background-color: skyblue;
    }
  img.logo{
    position: absolute;
    right: 27%;
    width: 15%
    }
  img.crown{
    position:absolute; 
    left: 0; 
    right: 0; 
    margin: 0 auto;
  }
  h2{
    position: relative;
    color: white;

  }
</style>
</head>
<body>
  <div>
  <img class="logo" src="images/LEADERBOARD_LOGO.png">
  </div>
  
  <div>
  <img class="crown" src="images/CROWN_LEADERBOARD.png">
  </div>
  
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
<h2 align="center">LEADERBOARDS </h2>
<?php
$leaderboard = Score::list();

echo "<table border='1' cellpadding='5'>";
echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Subject</th>";
    echo "<th>Score</th>";
    echo "<th>Saved_at</th>";
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