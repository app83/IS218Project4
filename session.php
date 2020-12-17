<?php

$lifetime = 60 * 60 * 24 * 365; //1 year in seconds
session_set_cookie_params($lifetime, '/');

session_start();

$_SESSION['user'] = filter_input(INPUT_POST, 'userId');

if(!isset($_SESSION['user'])) {
    header("Location: views/login.php");
}
else {
    echo $_SESSION['user'];
    echo "Login was Successful";
}

?>
