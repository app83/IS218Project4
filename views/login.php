<?php include('abstract-views/header.php'); ?>

<h2>Login Form</h2><br>

<form action="../index.php" method="post" class="regularForm">
    <input type="hidden" name="action" value="validate_login">

    <div class="form-group row col-md-4">
        <label for="email">Email:</label>
        <input class="form-control" type=email name="email" id="email" >
    </div>

    <div class="form-group row col-md-4">
        <label for="password">Password:</label>
        <input class="form-control" type=password name="password" id="password" >
    </div>

    <input class="btn btn-success" type=submit value="Login">
</form>
<br>New User? <a href="registration.php">Register Here</a>

<?php include('abstract-views/footer.php'); ?>
