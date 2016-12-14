<?php
    $dsn = 'mysql:host=localhost;dbname=foodforo_tech_support';
    $username = 'foodforo_userg1';
    $password = 'Gg?PHc5-{_!S';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>