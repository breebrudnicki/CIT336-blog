<?php
/* 
 * The model for the dyn_mvc example
 * All database interactions happen here
 * All prepared statements are enclosed in custom functions
 * Remember to return the result of the function
 */

// Get the database connection
require_once 'database.php';

function selectUsers(){
    global $db;
    $sql = 'select * from registration order by regId';
$statement = $db->prepare($sql);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
return $users;
}