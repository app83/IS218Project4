<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Question Form</title>
    <link rel="stylesheet" href="output.css">
</head>

<body>
<h2>New Question Form Values</h2>

<form>

<?php
require ('database.php');
require ('functions.php');

$title = filter_input(INPUT_POST, 'title');
$body = filter_input(INPUT_POST, 'body');
$skills = filter_input(INPUT_POST, 'skills');
$skills = explode(',', $skills);
$skills = ($skills !== NULL) ? $skills : array();

$owneremail = filter_input(input_get, 'email') ;
$ownerid = filter_input(input_get, 'id');

$query = 'SELECT ownerid FROM questions WHERE owneremail = :email';

/*
 if ($title == NULL || $body == NULL || $skills == NULL || strlen($title) < 3 || strlen($body) > 500 || count($skills) < 2 ){
    echo "All fields are required.";
    header ('Location: question.html');
} else {
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

 */
check_question($title, $body, $skills);
add_question($userId, $title, $body, $skills);


?>
</form>
</body>
</html>
