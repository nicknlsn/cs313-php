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

echo "<h1><a href=teamScriptures.php>Scripture Resources</a></h1>";
echo "<a href=search.php>Search</a><br/><br/>";
echo "<a href=insert.php>Insert</a><br/><br/>";
if (isset($_POST['searchScripture'])) {
	# if there was a search
	echo $_POST['searchScripture'];
	echo '<br/>';

} else {
	foreach ($db->query('SELECT id, book, chapter, verse, content FROM scriptures') as $row)
	{
   		echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ' ' . $row['verse'] . '</b>' . ' "' . $row['content'] . '"';
   		echo '<br />';
   		echo '<ul>';
   		// $stmt = $db->prepare("SELECT name from topic WHERE topicId=:");;
   		// foreach ($variable as $key => $value) {
	   	// 	echo '<li>' . ;
   		// }
   		echo '</ul>';
	}
}

?>
<!-- <html>
<body>
	<form>
		Search Book: <input type="text" name="searchBook">
	</form>
</body>
</html>
 -->
