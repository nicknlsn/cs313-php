<?php
session_start(); // resume existing session
session_unset();
session_destroy();
header('Location: survey.php');
?>
