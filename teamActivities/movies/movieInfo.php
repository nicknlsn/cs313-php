<?php
require("dbConnect.php");
$db = connectToDb();

$id = $_GET['id'];

$query = "SELECT title, year FROM movie WHERE id=:id";
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$movie = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<body>
	<h1>Movie Info for <?=$movie['title']?></h1>

	<ul>
<?php
	// foreach ($movies as $movie) {
	// 	$id = $movie['id'];
	// 	$title = $movie['title'];
	// 	$year = $movie['year'];
	// 	echo "<li><a href='movieInfo.php?id=$id'>$title ($year)</a></li>";
	// }
?>
	</ul>

</body>
</html>
