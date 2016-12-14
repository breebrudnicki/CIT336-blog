<?php
/*
 * A controller to handle the contact page processing
 */
 session_start();
    //collect data sent from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $captcha = $_POST['cap_code'];
    
if($_POST['action'] == 'Send'){

    //check that the fields are not empty
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errors['fields'] = "All fields are required, please fill in each one.";
    }
    //check captcha
    if($_SESSION['security_code'] != $_POST['cap_code'] && !empty($_SESSION['security_code'])) {
        $errors['security'] = 'Sorry, your entered security code does not match the security image.';
    }
    
    if(!empty($errors)) {
        include 'contact.php';
        exit;
    }
    //if there are errors return contact page to fix them
    if (empty($errors)) {
        //assemble the message
        $finalmessage = "Name: $name \n";
        $finalmessage .= "Email: $email \n";
        $finalmessage .= "Subject: $subject \n";
        $finalmessage .= "Message: \n $message";
        //send the message
        $to = 'breecarrick@live.com';
        $from = "From: $email";
        $result = mail($to, $subject, $finalmessage, $from);
        
        //let the sender know what happened
        if ($result == TRUE) {
            $errors[] = "Thank you, $name, your message has been sent.";
        } else {
            $errors[] = "Sorry, $name, there wasn an error and your message could not be sent.";
        }
        
        //remove all values as previouslt stored
        unset($name);
        unset($email);
        unset($subject);
        unset($message);
        unset($captcha);
        
        //display contact page with new message
        include 'contact.php';
        exit;
    }
} else {
 include 'contact.php';
 exit;
}
?>