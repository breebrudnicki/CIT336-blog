<?php

// Get your database connection
require_once 'support/database.php';

// Use a prepared statement to write the data to the visitors.registration table
function registerUser($firstName, $lastName, $email, $password) {
    global $db;
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
}

// Test if the insertion worked, if yes display a confirmation, if not show a failure message
if ($result == 1) {
    $message = "You have been registered.";
} else {
    $message = "Sorry, there was an error with your registration. Please try again.";
}
