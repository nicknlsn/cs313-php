<?php
session_start();
if (isset($_SESSION['userName'])) {
	header('Location: surveyResults.php'); // redirect to messages.php
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div id="header">
		<h1>The Survey</h1>
	</div>

	<div id="formSection">
		<form name="myForm" method="POST" action="handleSurvey.php">
			<!-- four questions -->
			<!-- question one -->
			Please enter your name:
			<input type="text" name="userName" size=35 maxlength=50 value="" required>

			<!-- question two -->
			<br/><br/>Choose one:<br/>
			<input type="radio" name="academicLevel" value="Freshman">Freshman<br>
			<input type="radio" name="academicLevel" value="Sophomore">Sophomore<br>
			<input type="radio" name="academicLevel" value="Junior">Junior<br>
			<input type="radio" name="academicLevel" value="Senior" required>Senior<br>

			<!-- question three -->
			<br/>Select your home state:
			<select name="fromState" required>
				<?php
				include 'modules/states.html'
				?>
			</select>

			<!-- question four -->
			<br/><br/>What kind of car do you drive?
			<input type="text" name="car" size=35 maxlength=50 value="" required>

			<br/><br/><input type="submit" value="Submit"></input>
		</form>
		<br/><a href="surveyResults.php">See results</a>
	</div>

	<div id="footer">
		Nick Nelson
	</div>
</body>
</html>
