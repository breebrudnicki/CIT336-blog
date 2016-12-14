<?php
    $dsn = 'mysql:host=localhost;dbname=foodforo_blogposts';
    $username = 'foodforo_visitor';
    $password = '~Mko6kaAO{k';
    //add database_error.php?.. used admin.php
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('admin.php');
        exit();
    }


