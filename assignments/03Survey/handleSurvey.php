<?php

// get data
$user = htmlspecialchars($_POST["userName"]);
$academicLevel = htmlspecialchars($_POST["academicLevel"]);
$fromState = htmlspecialchars($_POST["fromState"]);
$car = htmlspecialchars($_POST["car"]);
$line = "$user:$academicLevel:$fromState:$car\n";

// append data to file
file_put_contents("results.txt", $line, FILE_APPEND);

// redirect to messages.php
header('Location: surveyResults.php');

?>
