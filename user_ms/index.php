<?php
//get the model
require_once 'model.php';

if(filter_input(INPUT_GET, $action)) {
    $action = filter_input(INPUT_GET, 'action');
} else {
    $action = filter_input(INPUT_POST, 'action');
}


//Control structures
switch ($action) {
    case 'register':
        // Capture and filter the inputs
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        break;

    default:
        include'views/registration.php';
        break;
}

?>
