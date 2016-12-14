<?php
// Get your database connection
require_once 'database.php';

// Capture and filter the inputs
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//echo "first name: $firstName<br> last name: $lastName <br> email: $email";
//exit();
// Use a prepared statement to write the data to the visitors.registration table
$query = 'INSERT into registration '
            . '(regFirstName, regLastName, regEmail) '
        . 'VALUES '
            . '(:firstName, :lastName, :email)';
$statement = $db->prepare($query);
$statement->bindValue(':firstName', $firstName);
$statement->bindValue(':lastName', $lastName);
$statement->bindValue(':email', $email);
$result = $statement->execute();
$statement->closecursor();

// Test if the insertion worked, if yes display a confirmation, if not show a failure message
if( $result == 1 ) {
    $message = "You have been registered.";
} else {
    $message = "Sorry, there was an error with your registration. Please try again.";
}

?>
<!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Registration Result | Ch. 4 Revisited</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
			<header>
				<h1>Ch. 4 Revisited</h1>
				<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
			</header>
			<main>
                                <?php echo $message; ?>
			</main>
			<footer>
				<small>For review only</small>
			</footer>
			</body>

		</html>
