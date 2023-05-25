<?php

require "vendor/autoload.php";
require "selection.php";

try {
        $_SESSION['Subject'] = $_POST['topic'];
        header('Location: quiz.php');
        exit;
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
}