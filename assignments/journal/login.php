<?php
session_start();
require("dbConnector.php"); // get database connected
$db = loadDatabase();

$query = "SELECT password, id, username, emailAddress FROM user WHERE emailAddress=:emailAddress";
$stmtLogin = $db->prepare($query);
$stmtLogin->bindValue(':emailAddress', $_POST['email'], PDO::PARAM_STR);
$stmtLogin->execute();
$login = $stmtLogin->fetch(PDO::FETCH_ASSOC); // will be empty if username is bad

// if correct, set session variable?
if (!$login || $login['password'] != $_POST['password']) {
	// bad username and/or password
	$_SESSION['failedLogin'] = true;
} else {
	// good username and password
	$_SESSION['failedLogin'] = false;
	$_SESSION["username"] = $login['username'];
	$_SESSION["loggedIn"] = true;
	$_SESSION["userId"] = $login['id'];
	// think about implementing a timeout
}

header('Location: index.php'); // redirect to index.php

// if not correct, go back to index
?>
