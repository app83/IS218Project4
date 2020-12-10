<?php

function validate_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();

    $user = $statement->fetch();
    $isValidLogin = count($user) > 0;
    if (!$isValidLogin) {
        $statement->closeCursor();
        return false;
    } else {
        $userId = $user['id'];
        $statement->closeCursor();
        return $userId;
    }
}

function get_user($userId) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE id = :userId';

    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $user = $statement->fetch();

    $statement->closeCursor();
    return $user;

}

function create_new_user($fname, $lname, $birthday, $email, $password) {
    global $db;
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

}
?>