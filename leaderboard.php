<html>
<?php
require "config.php";
use App\Score;

if (!isset($_SESSION['dropdown'])) {
  $_SESSION['dropdown'] = 'Contemporary_World'; // Set default value
}
$selectedSubject = $_SESSION['dropdown'];
?>
<form action="leaderboard_process.php" method="post" id="myForm">
  <select id="Dropdown" name="Dropdown" onchange="submitForm()">
    <option value="Contemporary_World" <?php if ($selectedSubject === 'Contemporary_World') echo 'selected'; ?>>Contemporary World</option>
    <option value="Ethics" <?php if ($selectedSubject === 'Ethics') echo 'selected'; ?>>Ethics</option>
    <option value="UTS" <?php if ($selectedSubject === 'UTS') echo 'selected'; ?>>UTS</option>
  </select>
</form>

<?php
$leaderboard = Score::list();

echo "<table border='1' cellpadding='5'>";
echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Subject</th>";
    echo "<th>Score</th>";
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