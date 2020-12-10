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

/*$owneremail = filter_input(input_get, 'email') ;
$ownerid = filter_input(input_get, 'id');

$query = 'SELECT ownerid FROM questions WHERE owneremail = :email';
*/

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login':
    {
        include('index.html');
        break;
    }
    case 'question_form':
    {
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        $skills = explode(',', $skills);
        $skills = ($skills !== NULL) ? $skills : array();
        $userId = filter_input(INPUT_GET, 'userId');

        if ($title == NULL || $body == NULL || $skills == NULL || strlen($title) < 3 || strlen($body) > 500 || count($skills) < 2) {
            $error = 'All fields are not included';
            include('error.php');
        } else {
            add_question($userId, $title, $body, $skills);
            header("Location: display.php?userId=$userId");

        }
    }
}
//check_question($title, $body, $skills);
//add_question($userId, $title, $body, $skills);


?>
</form>
</body>
</html>
