<?php
session_start();
require("dbConnector.php"); // get database connected
$db = loadDatabase();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'modules/headBlock.html';
?>

<body>
	<?php
	/**********************************************************/
	/* some dope functions - might move this to another file eventually */
	/**********************************************************/
	function getJournals($db) {
		// this query returns the journals for this user, with the first row being the one with the latest entry
		$query = "SELECT DISTINCT journal.id, journal.name FROM journal LEFT JOIN entry ON entry.journalId=journal.id WHERE journal.userId=:userId ORDER BY entry.createDate DESC";
		$stmtJournalInfo = $db->prepare($query);
		$stmtJournalInfo->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
		$stmtJournalInfo->execute();
	    $journals = $stmtJournalInfo->fetchAll(PDO::FETCH_ASSOC); // fetch all to get all rows, each row representing a journal

	    return array(
	    	'journalId'=>$journals[0]['id'],     // id of last used journal
	    	'journalName'=>$journals[0]['name'], // name of lase used journal
	    	'journals'=>$journals,               // all of this users journal ids and names, used for the navbar drop down menu
	    	'numJournals'=>count($journals)      // the number of journals this user has, used for the navbar drop down menu
	    	);
	}

	// get all the entries for a particular journal
	function getEntries($db, $journalId) {
		$stmt = $db->prepare("SELECT createDate, text FROM entry WHERE journalId=:journalId;");
	    $stmt->bindValue(':journalId', $journalId, PDO::PARAM_INT);
	    $stmt->execute();
    	$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$entriesReversed = array_reverse($entries);
    	return $entriesReversed;
	}
	/**********************************************************/
	/* end dope functions */
	/**********************************************************/

	if (isset($_SESSION['loggedIn'])) { // user is logged in
		// get journals with a function!!!
        $journalInfo = getJournals($db);            // need to do this every time for navbar menu
        $journalId = $journalInfo['journalId'];     // the journalId the last entry belongs to
        $journalName = $journalInfo['journalName']; // the name of that journal
        $journals = $journalInfo['journals'];       // all the journals for this user
        $numJournals = $journalInfo['numJournals']; // the number of journals

	    // get the nav bar going
    	include 'modules/navBarTop.php';

		if (isset($_GET['journal'])) { // check for a request for a specific journal
			// display the requested journal OH MY GOSH HOW DO I DO THIS?
			$journalName = $_GET['journal'];
	    	$entries = getEntries($db, $_GET['journalId']);
		} else { // display the latest journal and entries
	    	$entries = getEntries($db, $journalId);
		}
		echo '<div class="container">';
	    echo '<h1>Journal: ' . $journalName . '</h1>';
    	foreach ($entries as $entry) { // just display all the entries for now, next week we'll get a text box going and might hide previous entries
    		echo '<h3>Entry from: ' . $entry['createDate'] . '</h3>';
    		echo '<h4>' . $entry['text'] . '</h4>';
    		echo '</br>';
    	}
    	echo '</div>';
	} else { // user needs to login or sign up
		include 'modules/navBarTop.php';
		// display login box or sign up box
		include 'modules/loginOrSignup.php';
	}

	// Static bottom navbar
	// include 'modules/navBarBottom.html'; // not sure if i need a bottom bar...
	?>

</body>
</html>
