<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Question Form</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
<h2>New Question Form Values</h2>

<form>

<?php
require ('database.php');
require ('functions.php');

$title = filter_input(INPUT_POST, 'title');
$body = filter_input(INPUT_POST, 'body');
$skills = filter_input(INPUT_POST, 'skills');
$skills = explode(',', $skills);
$skills = ($skills !== NULL) ? $skills : array();

$owneremail = filter_input(input_get, 'email') ;
$ownerid = filter_input(input_get, 'id');

$query = 'SELECT ownerid FROM questions WHERE owneremail = :email';

check_question($title, $body, $skills, $db);
add_question($owneremail, $ownerid, $title, $body, $skills);


?>
</form>
</body>
</html>
