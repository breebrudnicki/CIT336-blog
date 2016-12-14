<?php
// Get your db connection file, be sure it has a new connection to the
// tech support database
require('../model/database.php');

// Get the models needed - work will need to be done in both
require('../model/customer_db.php');
require('../model/registration_db.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');

/* 
 * What you will need
 * > 1. The product_register application should default to the customer_login view
 * > 2. If the email address is not provided, make them enter one
 * > 3. Check if the email entered is valid, if so get the user information from 
 *       the database
 * > 4. Send the logged-in user to the product registration page
 * > 5. Automatically enter the user's name in the product registration form
 * > 6. When the page loads the product list should be a drop down menu of 
 *       products built from a result set queried out of the database
 *   7. If the product registration data is submitted, register the product
 *   8. If the product is registered successfully, confirm it to the user.
 */

switch ($action) {
    case 'product_registration' :
        //get the data from the form 
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        //echo "email: $email <br> password: $password";
        //validate information
        if ($email == FALSE) {
            $error_message = "You must enter a valid email";
        } else if (empty ($password)) {
            $error_message = "Please enter your password";
        } else {
            $error_message = '';
        }
        //if error message eists go back to the login page
        if ($error_message != '') {
            include 'customer_login.php';
            exit();
        }
        //get information about the user by their email
        $customers = get_customer_by_email($email);
        //make sure that it is a registered customer trying to login
        if (empty($customers)) {
            $error_message = "Incorrect email.";
            include 'customer_login.php';
            exit;
        } //check to see if password is correct (all passwords are sesame)
        else if ( 'sesame' != $password) {
            $error_message = "Incorrect password.";
            include 'customer_login.php';
            exit;
        }
        //get products from the database
        $products = get_products();
        include 'product_register.php';
        break;
    case 'confirm' :
        //get the data from the form
        $customer_id = filter_input(INPUT_POST, 'customer_id');
        //grab date, necessary for creating a registration
        $date = date("m/d/y");
        //get the product code
        $product_name = filter_input(INPUT_POST, 'product');
        $product_code = get_product_code($product_name);
        foreach ($product_code as $code) :
        $product_code = $code['productCode'];
        endforeach;
        //echo "customer id: $customer_id <br> product name: $product_name <br> date: $date <br> product code: $product_code";
        $registration = add_registration($customer_id, $product_code, $date);
        include 'confirmation.php';
        break;
    default :
        include 'customer_login.php';
        break;
}
