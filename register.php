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



/*if ($fname == NULL || $lname == NULL || $birthday == NULL || $email == NULL || $password == NULL || strlen($password) < 8) {
    echo "All fields are required and password must be at least 8 characters.";
} else {
    echo "Successful registration";
    header('Location: display.php?userId=$userId');
}
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
    case 'register_form':
        {
            $fname = filter_input(INPUT_POST, 'fname');
            $lname = filter_input(INPUT_POST, 'lname');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $userId = filter_input(INPUT_POST, 'userId');

            if ($fname == NULL || $lname == NULL || $birthday == NULL || $email == NULL || $password == NULL) {
                $error = 'All fields are not included';
                include('error.php');
            } else {
                add_user($fname, $lname, $birthday, $email, $password);
                header("Location: display.php?userId=$userId");
            }
        }

}
//check_userinput($fname, $lname, $birthday, $email, $password);
//add_user($fname, $lname, $birthday, $email, $password);

?>
</form>
</body>
</html>


