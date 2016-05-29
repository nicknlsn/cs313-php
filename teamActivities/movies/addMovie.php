<?php
require("dbConnect.php");
$db = connectToDb();

$title = htmlspecialchars($_POST['title']);
$year = htmlspecialchars($_POST['year']);

echo "Trying to add $title - $year";

$query = "INSERT INTO movie(title, year) VALUES (:title, :year)";
$stmt = $db->prepare($query);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':year', $year, PDO::PARAM_INT);
$stmt->execute();

header("Location: allMovies.php");
die("Page should have been redirected");
?>
