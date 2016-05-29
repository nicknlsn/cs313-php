<?php
function connectToDb() {
	try
	{
		$user = "steve";
		$password = "nerdface";
		$db = new PDO('mysql:host=localhost;dbname=Movies', $user, $password);

		// this line makes PDO give us an exception when there are problems
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $ex) {
		echo 'Error!: ' . $ex->getMessage();
		die();
	}

	return $db;
}
?>
