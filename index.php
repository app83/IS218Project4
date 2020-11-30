<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
<h2>Login Form Values</h2>

<form>

<?php
require ('database.php');
require ('functions.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

check_login($email, $password, $db);

validate_login($email, $password);

?>
</form>
</body>
</html>
