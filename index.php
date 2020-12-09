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

    case 'validate_login':
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $userId = filter_input(INPUT_POST, 'userId');

        if ($email == NULL || $password == NULL) {
            $error = 'Email and Password are not included';
            include('error.php');
        } else {
            $userId = validate_login($email, $password);
            echo "User ID IS: $userId";
            if ($userId == false) {
                header("Location: register.html");
            } else {
                header("Location: display.php?userId=$userId");
            }
        }
        break;
    }
}
//check_login($email, $password, $db);

//validate_login($email, $password);

?>
</form>
</body>
</html>
