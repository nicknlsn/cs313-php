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
if (isset($_POST['searchScripture'])) {
	# if there was a search
	echo $_POST['searchScripture'];
	echo '<br/>';

} else {
	foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
	{
   		echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ' ' . $row['verse'] . '</b>' . ' "' . $row['content'] . '"';
   		echo '<br />';
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
