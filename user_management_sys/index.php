<?php
session_start();
//get the model or connect to the support code so that the variables can function
require_once 'model.php';

// we have to have some way to figure out if we have an action, we need to acknowledge GET it or POST, which are the two options of method in PHP.

if (filter_input(INPUT_GET, 'action')) {
    $action = filter_input(INPUT_GET, 'action');
} else {
    $action = filter_input(INPUT_POST, 'action');
}
// the above is just accounting for if there was a request.
// Control structures
switch ($action) {
    case 'Register':
        $first_name = filter_input(INPUT_POST, 'firstName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $last_name = filter_input(INPUT_POST, 'lastName');
        $password = filter_input(INPUT_POST, 'password');
        //validate the inputs
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
            $error = "Please ensure that all fields have a valid value.";
        }
        // if error exists send to view for repair
        if (isset($error)) {
            include 'view/registration.php';
            exit;
        }

//Test Section for passwords
//echo 'Default password: '.$password.'<br>';
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT); //hashed password
        
echo 'Hashed password: '.$hashedpassword.'<br>';
echo 'decrypted password'. password_verify($password, $hashedpassword);
//echo 'Hash is '.strlen($hashedpassword). 'characters long.<br>';
//
//
//echo '<p>Now we will see if the raw password and the hash are the same</p>';
//Now we want to compare passwords, needed for login (must query it out of the db based on email)
//if(password_verify($password, $hashedpassword)) {
//    echo 'The passwords match';
//} else {
//    echo 'Hey, what are you trying to pull here?';
//}
exit;

        $regResult = registerUser($first_name, $last_name, $email, $password);

        if ($regResult) {
            $message = "$first_name, Thank you for registering.";
        } else {
            $message = "$first_name, Sorry there was an error.";
        }
        include 'view/login.php';
        exit;
        break;
    case 'Login' :
        //capture the data
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        //create a function to query the databse based on the email address that was entered
        
        $user = login($email);
        //$passwordHash = $passwordReturn['usrPassword'];
        //print_r($passwordReturn);
        //exit;
        //Now we want to compare passwords, needed for login (must query it out of the db based on email)
        if (password_verify($password, $user['usrPassword'])) {
            //the passwords match, do the login
            $_SESSION['loggedin'] = true;
            $_SESSION['firstname'] = $user['usrFirstName'];
            $_SESSION['usertype'] = $user['userType'];
            header('location: view/welcome.php');
        } else {
            //the password does not match, login failed
            $message = 'Please check your credentials and try again';
            include 'view/login.php';
            exit;
        }
        //exit;
        break;
    case 'signin' :
        include 'view/login.php';
        break;
    default:
        include 'view/registration.php';
        break;
}

// Capture and filter the inputs
?>
