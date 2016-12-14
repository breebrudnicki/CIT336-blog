<?php
// Get your database connection
require_once 'database.php';
// Determine if an update request has started
// If so, retrieve the data from the database to be edited
// If not, send the site visitor back to the index.php file
if (filter_input(INPUT_GET, 'id')) {

// Capture the data key that should have been sent
$id = filter_input(INPUT_GET, 'id');


// If the key has no value, set an error message for display in this page
  if (empty($id)) {
    $message = 'No key value was provided. The process failed.';
  }

// If data key is present, use a prepared statement to select the 
// related data from the visitors.registration table
$sql = 'SELECT * FROM registration WHERE regId = :id';
$statement = $db->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$userdata = $statement->fetch();
$statement->closeCursor();

// Test if a recordset of data was returned,
// if not, set an error message
// if yes jump to the main element and display the data in a form for editing
  if (empty($userdata)) {
   $message = 'Sorry, no data was returned.';
  }
} else {
  // Redirect to the index.php page if the visitor comes to 
  // this page without first triggering an update
  header('location: index.php');
  exit;
}
?>
<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Delete Content | Ch. 4 Revisited</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header>
            <h1>Ch. 4 Revisited</h1>
            <div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
        </header>
        <main>
            <?php 
            if(isset($message)){
              echo '<p>'.$message.' <a href="index.php" title="Return to the index page">Go to Index page</a></p>';
            } else {
            ?>
            <form action="delete_confirm.php" method="post">
			<fieldset>
				<label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" readonly value="<?php echo "{$userdata['regFirstName']}"; ?>">
				<label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" 
readonly value="<?php echo "{$userdata['regLastName']}"; ?>">
				<label for="email">Email</label>
                <input type="email" name="email" id="email" 
readonly value="<?php echo "{$userdata['regEmail']}"; ?>">
				<label>&nbsp;</label>
				<input type="submit" name="submit" value="Delete">
                <input type="hidden" name="id" id="id" 
                  value="<?php echo "{$userdata['regId']}"; ?>">
			</fieldset>
		</form>
            <?php } ?>
        </main>
        <footer>
            <small>For review only</small>
        </footer>
    </body>

</html>
