<?php

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
