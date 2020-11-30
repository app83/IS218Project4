<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
<h2>Registration Form Values</h2>

<form>

<?php
require ('database.php');
require ('functions.php');

$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$birthday = filter_input(INPUT_POST, 'birthday');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

check_userinput($fname, $lname, $birthday, $email, $password, $db);
add_user($fname, $lname, $birthday, $email, $password, $db);

?>
</form>
</body>
</html>


