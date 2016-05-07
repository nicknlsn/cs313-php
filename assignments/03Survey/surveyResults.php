<?php
// get all data from file
// $contents = file_get_contents("results.txt");
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
        		echo "$set[1]<br/>";           // academic level
        		echo "From: $set[2]<br/>";     // from state
        		echo "Drives a: $set[3]<br/>"; // car
			}

			fclose($handle); // close the file
		} else {
		    // error opening the file.
		    echo "Could not open results.txt";
		}
		?>
	</div>

	<div id="footer">
		© Nick Nelson
	</div>
</body>
</html>
