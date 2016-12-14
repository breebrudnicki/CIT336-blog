<?php
require_once('database.php');

// Get ID
$category_name = filter_input(INPUT_POST, 'category_name');

// Delete the category from the database
if ($category_name != null) {
    $query = 'DELETE FROM categories
              WHERE categoryName = :category_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Category List page
include('category_list.php');