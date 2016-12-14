<?php
// Needed: a function to get a customer by their email address
function get_customer_by_email($email) {
    global $db;
    //get the registered user the entered their email
    $query = 'SELECT * FROM customers
               WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement-> execute();
    $customers = $statement->fetchALL();
    $statement->closeCursor();
    //var_dump($customers);
    //exit;
    return $customers;
}