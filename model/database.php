<?php
    $dsn = 'mysql:host=localhost; dbname=company'; //The name of the database should be correct
    $username = 'mgs_user';
    $password = 'pwd';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('/EXAM/model/database_error.php');
        exit();
    }
?>