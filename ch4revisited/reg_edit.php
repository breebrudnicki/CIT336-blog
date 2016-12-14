<?php
//have the ability to talk to the database (get database connection)
require_once 'database.php';

//get the product data (sent from other page through get(in this case))
$reg_id = filter_input(INPUT_POST, 'reg_id');

//change data in database with prepared statements
$query = "SELECT * FROM registration WHERE regId = :reg_id";
$statement = $db->prepare($query);
$statement-> bindValue(':reg_id', $reg_id);
$statement-> execute();
$user = $statement-> fetch();
$statement-> closeCursor();
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Edit Registration | Ch. 4 Revisited</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<h1>Ch. 4 Revisited</h1>
		<div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
	</header>
	<main>
		<h1>Edit Registration</h1>
		<p>All fields are required.</p>
		<form action="reg_update.php" method="post">
			<fieldset>
				<label for="firstName">First Name</label>
				<input type="text" name="firstName" id="firstName" value="<?php echo $user['regFirstName']; ?>">
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" id="lastName" value="<?php echo $user['regLastName']; ?>">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value="<?php echo $user['regEmail']; ?>">
                                <input type="hidden" name="reg_id" id="reg_id" value="<?php echo $user['regId']; ?>">
				<label>&nbsp;</label>
				<input type="submit" name="submit" value="Edit">
			</fieldset>
		</form>
	</main>
	<footer>
		<small>For review only</small>
	</footer>
</body>

</html>
