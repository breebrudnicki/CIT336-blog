<?php
// Get your database connection
require_once 'database.php';

// Determine if the form on the update_process.php page has been 
// submitted
// If so, process the data
// If not, send the site visitor back to the index.php file

if (filter_input(INPUT_POST, 'submit') === 'Delete') {

// Capture and filter the inputs (4 total)
  $firstname = filter_input(INPUT_POST, 'firstName');
  $lastname = filter_input(INPUT_POST, 'lastName');
  $email = filter_input(INPUT_POST, 'email');
  $id = filter_input(INPUT_POST, 'id');
  
// Check the values, set an error if values are empty
//echo "$firstname, $lastname, $email, $id";
//exit;

// Check for errors, if found redirect to the 
// update_process.php page for repair and resubmission
//  if (!empty($error)) {
//    include 'update_process.php';
//    exit;
//  }

// Use a prepared statement to update the data to the visitors.registration table
$sql = 'DELETE FROM registration WHERE regId=:id';
$statement=$db->prepare($sql);
//$statement->bindValue(':firstname', $firstname);
//$statement->bindValue(':lastname', $lastname);
//$statement->bindValue(':email', $email);
$statement->bindValue(':id', $id);
$statement->execute();
$deleteResult = $statement->rowCount();
$statement->closeCursor();


// Test if the update worked, if yes display a confirmation, 
// if not set a failure message
// The message should be shown in the main element below
  if ($deleteResult) {
    $message = 'The delete worked.';
  } else {
    $message = 'The delete failed.';
  }
} else {
  // Redirect to the index page if the form in the update_proccess.php
  // page was not submitted and the data sent to this page
  header('location: index.php');
  exit;
}
?>
<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Delete Result | Ch. 4 Revisited</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header>
            <h1>Ch. 4 Revisited</h1>
            <div id="tools"><a href="registration.php" title="Go to the registration page">Register</a> </div>
        </header>
        <main>
            <?php
            echo '<p>' . $message . '</p>';
            ?>
            <p><a href="index.php" title="Return to the index page">Return to the Index page</a> of this folder.</p>
        </main>
        <footer>
            <small>For review only</small>
        </footer>
    </body>

</html>
