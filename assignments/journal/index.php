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
	/* some dope functions */
	/**********************************************************/
	function getJournalAndEntries($db) {
		// get last used journal, first get the journalId
		$stmtGetLastEntry = $db->prepare("SELECT * FROM entry WHERE userId=:userId ORDER BY createDate DESC LIMIT 1");
		$stmtGetLastEntry->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
		$stmtGetLastEntry->execute();
	    $latestEntries = $stmtGetLastEntry->fetchAll(PDO::FETCH_ASSOC); // the last entry the user made
	    $latestEntry = $latestEntries[0];
	    $journalId = $latestEntry['journalId']; // the journalId for the last used journal

	    // then get the journal with the journalId, in order to get the journal name
	    $stmtGetJournal = $db->prepare("SELECT * FROM journal WHERE id=:id");
	    $stmtGetJournal->bindValue(':id', $journalId, PDO::PARAM_INT);
	    $stmtGetJournal->execute();
	    $journals = $stmtGetJournal->fetchAll(PDO::FETCH_ASSOC); // the journal with the latest entry
	    $journal = $journals[0];
	    $journalName = $journal['name'];

	    // get the number of journals, for now just get all the journals in the journal table for this user, in the future use the journalCount data in the user table
	    $stmtGetNumJournal = $db->prepare("SELECT * FROM journal WHERE userId=:userId");
	    $stmtGetNumJournal->bindValue(':userId', $_SESSION['userId'], PDO::PARAM_INT);
	    $stmtGetNumJournal->execute();
	    $journals = $stmtGetNumJournal->fetchAll(PDO::FETCH_ASSOC);
	    $numJournals = count($journals);

	    $returnInfo = array('latestEntry'=>$latestEntry, 'journalId'=>$journalId, 'journal'=>$journal, 'journalName'=>$journalName, 'journals'=>$journals, 'numJournals'=>$numJournals);
		return $returnInfo;
	}

	function getEntries($db, $journalId) {
		$stmt = $db->prepare("SELECT * FROM entry WHERE journalId=:journalId;");
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
        $journalInfo = getJournalAndEntries($db);   // some info we need
        $latestEntry = $journalInfo['latestEntry']; // the last entry this user made
        $journalId = $journalInfo['journalId'];     // the journalId the last entry belongs to
        $journal = $journalInfo['journal'];         // the journal the last entry was made in
        $journalName = $journalInfo['journalName']; // the name of that journal
        $journals = $journalInfo['journals'];       // all the journals for this user
        $numJournals = $journalInfo['numJournals']; // the number of journals

	    // get the nav bar going
    	include 'modules/navBarTop.php';

		if (isset($_GET['journal'])) { // check for a request for a specific journal
			// display the requested journal OH MY GOSH HOW DO I DO THIS?
			$journalName = $_GET['journal'];
	    	$entries = getEntries($db, $_GET['journalId'];);
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
		// display login box or sign up box
		include 'modules/loginOrSignup.php';
	}

	// Static bottom navbar
	// include 'modules/navBarBottom.html'; // not sure if i need a bottom bar...
	?>

</body>
</html>
