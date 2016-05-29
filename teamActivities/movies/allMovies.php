<?php
require("dbConnect.php");
$db = connectToDb();

$query = "SELECT id, title, year FROM movie";
$stmt = $db->prepare($query);
// $stmt->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<body>
	<h1>All Movies</h1>

	<ul>
<?php
	foreach ($movies as $movie) {
		$id = $movie['id'];
		$title = $movie['title'];
		$year = $movie['year'];
		echo "<li><a href='movieInfo.php?id=$id'>$title ($year)</a></li>";
	}
?>
	</ul>

	<form action="addMovie.php" method="POST">
		<input type="text" name="title" placeholder="Title"></input>
		<input type="text" name="year" placeholder="Year"></input>
		<input type="submit" value="Add Movie"></input>
	</form>

</body>
</html>
