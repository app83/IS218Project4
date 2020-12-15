<?php
class AccountsDB {
    public static function validate_login($email, $password)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM accounts 
                  WHERE email = :email AND password = :password';

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

    public static function get_user($userId)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM accounts WHERE id = :userId';

        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $user = $statement->fetch();

        $statement->closeCursor();
        return $user;

    }

    public static function create_new_user($fname, $lname, $birthday, $email, $password)
    {
        $db = Database::getDB();
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
}
?>