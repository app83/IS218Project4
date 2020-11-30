<?php
require('database.php');

function check_userinput($fname, $lname, $birthday, $email, $password, $db)
{
    //First Name
    if (empty($fname)) {
        echo "First Name is required <br><br>";
    } else {
        echo "First Name:  <strong>$fname</strong> <br><br>";
    }

//Last Name
    if (empty($lname)) {
        echo "Last Name is required <br><br>";
    } else {
        echo "Last Name:  <strong>$lname</strong> <br><br>";
    }

//Birthday
    if (empty($birthday)) {
        echo "Birthdate is required <br><br>";
    } else {
        echo "Birthday:  <strong>$birthday</strong> <br><br>";
    }

    check_login($email, $password, $db);
}

function check_login($email, $password, $db){
    //Email Address
    if (empty($email)) {
        echo "Email is required <br><br>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Needs '@' character <br><br>";
    }
    else {
        echo "Email: <strong>$email</strong> <br><br>";
    }

//Password
    if (empty($password)){
        echo "Password is required <br><br>";
    }
    else if (strlen($password) < 8) {
        echo "Password must be at least 8 characters <br><br>";
    }
    else {
        echo "Password: <strong>$password</strong> <br><br>";
    }

}

function add_user($fname, $lname, $birthday, $email, $password, $db)
{
    try {
        $query = 'INSERT INTO accounts (fname, lname, birthday, email, password) 
                      VALUES ( :fname, :lname, :birthday, :email, :password)';

        $statement = $db->prepare($query);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':birthday', $birthday);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);

        $statement->execute();
        $statement->closeCursor();
        header('Location: display.php');
    } catch (Exception $error) {
        $error_message = $error->getMessage();
        echo "Error INSERTING into SQL: $error_message";
    }

}

function check_question($title, $body, $skills, $db)
{
    //Question Name
    if (strlen($title) < 3) {
        echo "Question Name must be at least 3 characters <br><br>";
    }
    else if (empty($title)) {
        echo "Question Name is required <br><br>";
    }
    else {
        echo "Question Name: <strong>$title</strong> <br><br>";
    }

//Question Body
    if (strlen($body) > 500) {
        echo "Question Body must be less than 500 characters <br><br>";
    }
    else if (empty($body)) {
        echo "Question Body is required <br><br>";
    }
    else {
        echo "Question Body: <strong>$body</strong> <br><br>";
    }

//Question Skills
    if (count($skills) < 2 ) {
        echo "At least 2 question skills need to be entered <br><br>";
    }
    else if (empty($skills)) {
        echo "Question Skills are required <br><br>";
    }
    else {
        echo "Question Skills: <strong>";
        print_r ($skills);
        echo "</strong> <br><br>";
    }
}
function add_question($userId, $title, $body, $skills, $db)
{
    global $db;
    $query = 'SELECT email FROM accounts WHERE id = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $returned = $statement->fetch();
    $email = $returned['email'];
    $statement->closeCursor();

    try {
        $query = 'INSERT INTO questions (owneremail, ownerid, title, body, skills, createddate) 
                      VALUES ( :email, :ownerid, :title, :body, :skills, NOW())';

        $statement = $db->prepare($query);

        $statement->bindValue(':email', $email);
        $statement->bindValue(':ownerid', $userId);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);

        $statement->execute();

        $statement->closeCursor();
        header('Location: display.php');
    } catch (Exception $error) {
        $error_message = $error->getMessage();
        echo "Error INSERTING into SQL: $error_message";
    }

}

function get_question($userId)
{
    global $db;
    $query = 'SELECT title, body, skills FROM questions WHERE ownerid = :userId';

    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;

}
function validate_login($email, $password) {
    global $db;
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
}

function get_username($userId)
{
    global $db;
    $query = 'SELECT fname, lname FROM accounts WHERE id= :userId';

    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);

    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    return $user;
}

