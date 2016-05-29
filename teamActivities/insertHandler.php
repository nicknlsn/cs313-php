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

$stmt = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) values (:book, :chapter, :verse, :content)");
$stmt->execute(array(':book' => $_POST['book'], ':chapter' => $_POST['chapter'], ':verse' => $_POST['verse'], ':content' => $_POST['content']));

// $something = $stmt->fetchAll(PDO::FETCH_ASSOC); // the last entry the user made

header("Location: teamScriptures.php");
?>
