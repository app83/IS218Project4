<?php include('abstract-views/header.php'); ?>

<form action="../index.php" method="post">
    <input type="hidden" name="action" value="validate_login">

    Email: <input type=email name="email" id="email" ><br><br>
    Password: <input type=password name="password" id="password" ><br><br>
    <input type=submit value="Login">

</form>
<br><br>New User? <a href="registration.php">Register Here</a>
<?php include('abstract-views/footer.php'); ?>
