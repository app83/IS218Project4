<?php
session_start();

if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
{
    header("Location: views/login.php");
}
else {
    echo $_SESSION['user'];
    echo "Login was Successful";
}

//echo "<a href='views/logout.php'> Logout</a> ";

?>
