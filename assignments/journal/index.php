<?php
// session handling here
session_start();

// lets just log in norman levy to demo read only site
try {
	$user = "php";
	$password = "thePassword";
	$db = new PDO('mysql:host=127.0.0.1;dbname=Journal', $user, $password);
} catch (PDOException $ex) {
	echo "Error " . $ex->getMessage();
	die();
}

$username = "normanLevy";
$password = "hardPassword";
// $stmt = $db->prepare('SELECT * FROM user WHERE username=:username AND password=:password');
// $stmt->bindValue(':username', $username, PDO::PARAM_STR);
// $stmt->bindValue(':password', $password, PDO::PARAM_STR);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($rows as $row) {
// 	echo 'user: ' . $row['username'];
// 	echo '<br/>';
// 	echo 'password: ' . $row['password'];
// } // cool demo bro
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'modules/headBlock.html';
?>

<body>

	<!-- top nav bar -->
	<?php
	// probably try to get journals here... so the info can be used in the nav bar.
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        // get journals
		$stmt = $db->prepare("SELECT * FROM journal WHERE userId=:userId");
		$stmt->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
		$stmt->execute();
        $journals = $stmt->fetchAll(PDO::FETCH_ASSOC); // journals is all journals belonging to logged in user
      }

      include 'modules/navBarTop.php';
      ?>

      <?php
if (isset($_SESSION['loggedIn'])) { // user is logged in
	// display journal

	// 1. get entries for first journal
	$journal = $journals[0];
	$journalId = $journal['id'];
		// echo 'journalId: ' . $journalId;

	// 2. display last used journal? crap, thats not in the database. just use the oldest journal, or the first row returned. do this step in div class container
	echo '<div class="container">';
	echo '<h1>' . $journal['name'] . '</h1>';
	// lets just display some entries to demo the read only site'
	$stmt = $db->prepare("SELECT * FROM entry WHERE journalId=:journalId;");
	$stmt->bindValue(':journalId', $journalId, PDO::PARAM_INT);
	$stmt->execute();
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC); // journals is all journals belonging to logged in user
	foreach ($entries as $entry) {
		echo '<h3>Entry from: ' . $entry['createDate'] . '</h3>';
		echo '<h4>' . $entry['text'] . '</h4>';
		echo '</br>';
	}
	echo '</div>';

} else { // user needs to login/signup
	// display login box or signup box
	include 'modules/loginOrSignup.php';
}
?>

<!-- Static bottom navbar -->
<?php
// include 'modules/navBarBottom.html'; // not sure if i need a bottom bar...
?>

</body>
</html>
