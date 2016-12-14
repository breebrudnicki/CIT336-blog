<?php
//get database connection
require_once 'model/database.php';
function get_posts() {
    global $db;
    $query = 'SELECT * FROM blogPosts
                       ORDER BY date DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll();
    $statement->closeCursor();
    return $posts;
}

