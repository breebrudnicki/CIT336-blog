<?php
session_start();
if ($_SESSION['loggedin'] === true) {
    $loggedin = $_SESSION['loggedin'];
}
//controller for admin content management
//get the model(s)
require_once 'model/users.php';
require_once 'model/blog_backend.php';

//find the action
if (filter_input(INPUT_GET, 'action')) {
    $action = filter_input(INPUT_GET, 'action');
} else {
    $action = filter_input(INPUT_POST, 'action');
}
//default is login page
switch ($action) {
    case 'login':
        //capture the data
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        if ($email == false) {
            $message = "Please enter a valid email address";
            include 'views/login.php';
            exit;
        }
        //create a function to query the databse based on the email address that was entered
        $user = login($email);
        $hashedpassword = $user['password'];
        //check the password to see if it is correct
//        echo $password. "<br>";
//        echo $hashedpassword;
//        echo 'does password match ' . password_verify($password, $user['password']);
//        exit;
        if (password_verify($password, $user['password'])) {
            //the passwords match, do the login
            $_SESSION['loggedin'] = true;
            $_SESSION['UserID'] = $user['userID'];
        } else {
            //the password does not match, login failed
            $message = 'Please check your credentials and try again';
            include 'views/login.php';
            exit;
        }
        //create post list..
        //get all posts and order by date
        $blogPosts = get_posts();
        include 'views/post_list.php';
        break;
    case 'add post':
        include 'views/add_post.php';
        break;
    case 'edit':
        //get information from post chosen to edit
        $title = filter_input(INPUT_POST, 'title');
        $post = filter_input(INPUT_POST, 'post');
        $blogPostID = filter_input(INPUT_POST, 'blogPostID');
        include 'views/edit_post.php';
        break;
    case 'publish changes':
        //add variable blog post id
        $title = filter_input(INPUT_POST, 'title');
        $post = filter_input(INPUT_POST, 'post');
        $blogPostID = filter_input(INPUT_POST, 'blogPostID');
        if (empty($title) || empty($post)) {
            $error = "Please insure that all fields have a valid value.";
        }
                // if error exists send to view for repair
        if (isset($error)) {
            include 'views/edit_post.php';
            exit;
        }
        update_blogPost($title, $post, $blogPostID);
        //include updated blog roll list
        $blogPosts = get_posts();
        $message = "Changes successfully made. View blog post: <a href='index.php'>Blog</a>";
        include 'views/post_list.php';
        break;
    case 'delete':
        //add variable blog post id
        $blogPostID = filter_input(INPUT_POST, 'blogPostID');
        //call function to delete post
        delete_blogPost($blogPostID);
        //include updated blog roll list
        $blogPosts = get_posts();
        $message = "Post successfully deleted";
        include 'views/post_list.php';
        break;
    case 'publish':
        //grab inputs
        $title = filter_input(INPUT_POST, 'title');
        $post = filter_input(INPUT_POST, 'post');
        //validate data
        if (empty($title) || empty($post)) {
            $error = "Please insure that all fields have a valid value.";
        }
        // if error exists send to view for repair
        if (isset($error)) {
            include 'views/add_post.php';
            exit;
        }
        //create variables necessary for adding a blog post
        $date = date('Y/m/d');
        $userid = $_SESSION['UserID'];
        //insert new blog post into the database using a custom function
        add_post($title, $post, $date, $userid);
        //display post_list (dashboard) view with updated information
        $blogPosts = get_posts();
        $message = "View new blog post: <a href='index.php'>Blog</a>";
        include 'views/post_list.php';
        break;
    case 'logout':
        //logout request has been received, process the logout
        //process the logout
        setcookie(session_name(), '', 1); //gets rid of the session cookie
        session_destroy();
        //report the result of the logout
        header('location: .');
        break;
    case 'upload':
        break;
    default:
        include 'views/login.php';
        break;
}

