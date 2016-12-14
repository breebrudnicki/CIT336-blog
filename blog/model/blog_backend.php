<?php
//get database connection
require_once 'model/database.php';
//functions to select, insert, update, delete blog posts in CMS
//add new blogPosts!
function add_post($title, $post, $date, $userid) {
    global $db;
    $query = "INSERT INTO blogPosts
          (title, post, date, userID)
          VALUES
          (:title, :post, :date, :userID)";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':post', $post);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':userID', $userid);
    $statement->execute();
    $result = $statement->rowCount();
    $statement->closeCursor();
    return $result;
}
//get list of blog posts
function get_posts() {
    global $db;
    $query = 'SELECT * FROM blogPosts
                       ORDER BY date desc';
    $statement = $db->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll();
    $statement->closeCursor();
    return $posts;
}
//edit blog posts
function update_blogPost($title, $post, $blogPostID) {
    global $db;
    $query = "UPDATE blogPosts
              SET
                title = :title,
                post = :post
              WHERE
                blogPostID = :blogPostID";
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':post', $post);
    $statement->bindValue(':blogPostID', $blogPostID);
    $statement->execute();
    $statement->closeCursor();
}
//delete posts
function delete_blogPost($blogPostID) {
    global $db;
    $query = 'DELETE FROM blogPosts
              WHERE blogPostID = :blogPostID';
    $statement = $db->prepare($query);
    $statement->bindValue(':blogPostID', $blogPostID);
    $statement->execute();
    $statement->closeCursor();
}