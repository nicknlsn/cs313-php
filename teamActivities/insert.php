<?php
try
{
   $user = 'team';
   $password = 'TeamA';
   $db = new PDO('mysql:host=127.0.0.1;dbname=Scriptures', $user, $password);
}
catch (PDOException $ex)
{
   echo 'Error!: ' . $ex->getMessage();
   die();
}
?>
<html>

<body>
	<form action="insertHandler.php" method="POST">
		<h1>Insert Scripture</h1>
		<label><h3>Book: </h3><input type="text" name="book"></input></label>
		<label><h3>Chapter: </h3><input type="number" name="chapter"></input></label>
		<label><h3>Verse: </h3><input type="number" name="verse"></input></label>
		<label><h3>Content: </h3><textarea type="text" name="content"></textarea></label>
		<?php
		$stmt = $db->prepare("SELECT name FROM topics");
		// $stmt->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
		$stmt->execute();
	    $names = $stmt->fetchAll(PDO::FETCH_ASSOC); // the last entry the user made

	    foreach ($names as $name) {
	    	echo '</br><label><input type="checkbox" name="checkbox" value="' . $name['name'] . '"></input>' . $name['name'] . '</label>';
	    }
		?>

		<input type="submit">
	</form>
</body>
</html>
