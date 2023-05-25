<html>
<?php
require "config.php";
use App\User;

$table = User::profile();

echo "<table border='1' cellpadding='5'>";
echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Subject</th>";
    echo "<th>Score</th>";
echo "</tr>";
foreach($table as $data){
    echo "<tr>";
    foreach ($data as $columnName => $Value){
        echo "<td>" . $Value . "</td>";
    }
    echo "<tr>";
}
?>