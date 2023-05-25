<?php
require "config.php";

if (isset($_POST['Dropdown'])) {
    $selectedOption = $_POST['Dropdown'];
    // Save the selected option to the session
    $_SESSION['dropdown'] = $selectedOption;
    header('Location: Leaderboard.php');
  }

?>