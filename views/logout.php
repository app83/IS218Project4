<?php

echo "Logged out Successfully";

session_destroy(); //destroys the session

header("Location: views/login.php");

?>