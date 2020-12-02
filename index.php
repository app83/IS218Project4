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

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

/*
 if ($email == NULL || $password == NULL || strlen($password) < 8 ) {
    echo "All fields are required and password must be 8 characters long";
    header ('Location: index.html');
} else {
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $user = $statement->fetch();

    $isValidLogin = count($user) > 0;
    if(!$isValidLogin){
        $statement->closeCursor();
        header('Location: index.html');
        return false;
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        header('Location: display.php');
        return $userId;
    }
 */
check_login($email, $password, $db);

validate_login($email, $password);

?>
</form>
</body>
</html>
