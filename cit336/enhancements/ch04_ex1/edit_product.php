<?php
// Get the product data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$list_price = filter_input(INPUT_POST, 'price');

//test variables
//echo 'product id = ' . $product_id . ', category id = ' . $category_id . 
//        ', code = ' . $code . ', name = ' . $name . ', price = ' . $list_price;

// Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $list_price == null || $list_price == false ||
        $product_id == null || $product_id == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    // Update the product information in the database  
    
    $query = "UPDATE products
              SET
                categoryID = :category_id,
                productCode = :code,
                productName = :name,
                listPrice = :price
              WHERE
                productID = :product_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $list_price);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
