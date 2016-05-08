<?php
session_start(); // resume existing session
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div id="header">
		<h1>The Survey Results</h1>
	</div>

	<div id="resultsSection">
		<?php
		$handle = fopen("results.txt", "r");   // we will read line by line
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
        		$set = explode(":", $line);    // split by the ':'
        		echo "<h1>$set[0]</h1>";       // name
        		echo "School year: $set[1]<br/>";           // academic level
        		echo "Home state: $set[2]<br/>";     // from state
        		echo "Car: $set[3]<br/>"; // car
			}

			fclose($handle); // close the file
		} else {
		    // error opening the file.
		    echo "Could not open results.txt";
		}

		if (isset($_SESSION['userName'])) {
				echo "<br/>You have a session going that prevents you from doing the survey again. <a href=\"endSession.php\">Click here</a> to end it.";
		}
		?>
	</div>

	<div id="footer">
		© Nick Nelson
	</div>
</body>
</html>
