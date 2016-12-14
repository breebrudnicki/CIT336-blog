<?php 
//get the database connection
require_once 'model/database.php';

//check for and capture the value of action if sent from the browser
if (filter_input(INPUT_GET, 'action')) {
    $action = filter_input(INPUT_GET, 'action');
} else {
    $action = filter_input(INPUT_POST, 'action');
}

//create a switch statement to check for the value in action
switch ($action) {
    case 'dne' :
        break;
    default :
        include 'view/home.php';
        break;
}