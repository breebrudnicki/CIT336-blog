<?php
//get database connection
require_once 'model/database.php';

//function to get user information for login
function login($email) {
    global $db;
    $query = 'SELECT * FROM Users
               WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $password = $statement->fetch();
    $statement->closeCursor();
    return $password;
}

