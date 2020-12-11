<?php include('abstract-views/header.php'); ?>

<h2>Registration Form</h2>

<form action="../index.php" method="POST" class="regularForm">
    <input type="hidden" name="action" value ="register_form">
    <input type="hidden" name="userId" value="<?php echo $userId; ?>">

    <div class="row">
    <div class="form-group col-md-4">
        <label for="fname">First Name: </label>
        <input class="form-control" type=text name="fname" id="fname">
    </div>
    <div class="form-group col-md-4">
        <label for="lname">Last Name:</label>
        <input class="form-control" type=text name="lname" id="lname">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
        <label for="birthday">Birthday:</label>
        <input class="form-control" type=date name="birthday" id="birthday">
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4">
        <label for="email">Email:</label>
        <input class="form-control" type=email name="email" id="email">
    </div>
    <div class="form-group col-md-4">
        <label for="password">Password:</label>
        <input class="form-control" type=password name="password" id="password">
    </div>
    </div>
    <input class="btn btn-success" type=submit value="Register">

</form>
<br>Existing User? <a href="login.php">Login Here</a>

<?php include('abstract-views/footer.php'); ?>