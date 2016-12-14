<?php
session_start();
//get the model or connect to the support code so that the variables can function
require_once 'model.php';

// we have to have some way to figure out if we have an action, we need to acknowledge GET it or POST, which are the two options of method in PHP.

if(filter_input(INPUT_GET, 'action')) {
$action = filter_input(INPUT_GET, 'action');
}
else {
    $action = filter_input(INPUT_POST, 'action');
}
// the above is just accounting for if there was a request.
 
// Control structures
switch($action) {
    case 'Register':
        $first_name= filter_input(INPUT_POST, 'firstName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $last_name = filter_input(INPUT_POST, 'lastName');
        $password = filter_input(INPUT_POST, 'password');

        //validate the inputs
if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
    $error = "Please insure that all fields have a valid value.";
}
     // if error exists send to view for repair
if (isset($error)) {
    include 'view/registration.php';
    exit;
}
// Text Section for passwords
//   echo 'Default password: '.$password.'<br>';
    $password = password_hash($password, PASSWORD_DEFAULT);
//    echo 'Hashed password: '.$hashedpassword.'<br>';
//    echo 'Hash is '. strlen($hashedpassword).' characters long.<br>';
    
    

//echo '<p>Now we will see if  the raw password and the hash are the same</p>';   
    //Now we want to compare passwords, needed for login
//    if(password_verify($password, $hashedpassword)) {
//        echo 'The passwords match';
//            } else {
//                echo 'Hey, what are you trying to pull here?';
//            }
//            exit;

$regResult = registerUser($first_name, $last_name, $email, $password);

if($regResult) {
    $message = "$first_name, Thank you for registering.";
    
} else {
    $message = "$first_name, Sorry there was an error.";
}
include 'view/login.php';
exit;
    break;
    
  
    
    case "Login":
        //capture the data
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email');
      
       $user = verifyLogin($email);
        //create a function to capture the variables
       
       if(password_verify($password, $user['usrPassword'])){
          //  the password matched, do the login
           $_SESSION['loggedin'] = TRUE;
       $_SESSION['firstname'] = $user['usrFirstName'];
       $_SESSION['usertype'] = $user['usrType'];
      
       header('location: view/welcome.php');
       exit;
       } else {
            // the password does not match, login failed
       $message = "Please check your credentials and try again.";
       include 'view/login.php';
       exit;
       }
        break;
          case 'signin':
        include 'view/login.php';
        exit;
        break;
    case 'Logout':
//        session_destroy();
//        $_SESSION['loggedin'] = FALSE;
//        $_SESSION['firstname'] = NULL;
//        $_SESSION['usertype'] = NULL;
        unset($_SESSION['loggedin']);
        unset ($_SESSION['firstname']);
        unset ($_SESSION['usertype']);
        break;
    
default:
        include 'view/registration.php';
        break;
}

// Capture and filter the inputs

// // Test Section for passwords
// $pass = filter_input(INPUT_POST, 'password');
//echo 'Default password: '.$pass.'<br>';
//$hashedpassword = password_hash($pass, PASSWORD_DEFAULT);
// echo 'Hashed password: '.$hashedpassword.'<br>';
//echo 'Hash is '. strlen($hashedpassword).' characters long.<br>';
//exit;
// echo'<p>Now we will see if the raw password and the hash are the same</p>';






?>
