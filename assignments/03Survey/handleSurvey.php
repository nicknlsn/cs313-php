<?php
session_start(); // resume existing session

// get data
$name = htmlspecialchars($_POST["userName"]);
$academicLevel = htmlspecialchars($_POST["academicLevel"]);
$fromState = htmlspecialchars($_POST["fromState"]);
$car = htmlspecialchars($_POST["car"]);
$line = "$name:$academicLevel:$fromState:$car\n";

// update session variable
$_SESSION["userName"] = "$name";

// append data to file
file_put_contents("results.txt", $line, FILE_APPEND);

// redirect to messages.php
header('Location: surveyResults.php');

?>
