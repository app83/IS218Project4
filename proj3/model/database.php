<?php

$username = 'app83';
$password = 'Dreambig11!';
$dsn = 'mysql:host=sql1.njit.edu;dbname=app83';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>