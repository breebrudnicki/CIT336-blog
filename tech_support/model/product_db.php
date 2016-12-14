<?php

// Get all the products for the registration dropdown list
function get_products() {
    global $db;
    //get all the products
    $query = 'SELECT * FROM products';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchALL();
    $statement->closeCursor();
    return $products;
}
function get_product_code($product_name) {
    global $db;
    //get product id from the product name
    $query = 'SELECT productCode FROM products WHERE name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(":name", $product_name);
    $statement->execute();
    $product_code = $statement->fetchALL();
    $statement->closeCursor();
    return $product_code;
}
