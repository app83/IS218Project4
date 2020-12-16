<?php
echo "Logged out Successfully";

session_destroy();   // function that Destroys Session

header("Location: views/login.php");

?>