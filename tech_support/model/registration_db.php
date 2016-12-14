<?php
// Register the product and associate it with the customer
// Check the registrations table to see what data is expected
function add_registration($customer_id, $product_code, $date) {
    global $db;
    //prepare a query to insert a new registration into the table
    $query = 'INSERT INTO registrations
                (customerID, productCode, registrationDate)
              VALUES
                (:customerID, :productCode, :registrationDate)';
    $statement=$db->prepare($query);
    $statement->bindValue(':customerID', $customer_id);
    $statement->bindValue(':productCode', $product_code);
    $statement->bindValue(':registrationDate', $date);
    $statement->execute();
    $statement->closeCursor();
}
?>