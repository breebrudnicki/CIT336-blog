<?php
// Get your database connection
require_once 'database.php';
// Determine if the registration form has been submitted
// If so, process the data
// If not, send the site visitor back to the registration.php file

if (filter_input(INPUT_POST, 'submit') === 'Register') {

// Capture and filter the inputs
  $firstName = filter_input(INPUT_POST, 'firstName');
  $lastName = filter_input(INPUT_POST, 'lastName');
  $email = filter_input(INPUT_POST, 'email');

// Check the values, return if errors are found
  if (empty($firstName)) {
    $error[] = 'Please provide a first name.';
  }
  if (empty($lastName)) {
    $error[] = 'Please provide a last name.';
  }
  if (empty($email)) {
    $error[] = 'Please provide an email address.';
  }

// Check for errors, if found redirect to the 
// registration.php page for repair and resubmission
  if (!empty($error)) {
    include 'registration.php';
    exit;
  }

// Use a prepared statement to write the data to the visitors.registration table
  $query = 'INSERT INTO registration (regFirstName, regLastName, regEmail) VALUES (:firstname, :lastname, :email)';
  $statement = $db->prepare($query);
  $statement->bindValue(':firstname', $firstName);
  $statement->bindValue(':lastname', $lastName);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $insertResult = $statement->rowCount();
  $statement->closeCursor();

// Test if the insertion worked, if yes display a confirmation, if not show a failure message
  if (!empty($insertResult)) {
    $message = 'The registration worked. Thank you.';
  } else {
    $message = 'We\'re sorry, but the regisration failed. Please try again later.';
  }
} else {
  // Redirect to the registration page if the registration form
  // was not submitted and the data sent to this page
  header('location: registration.php');
  exit;
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
            <?php
            echo '<p>' . $message . '</p>';
            ?>
        </main>
        <footer>
            <small>For review only</small>
        </footer>
    </body>

</html>
