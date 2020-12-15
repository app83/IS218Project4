<?php
class AnswersDB {

    public static function newAnswer($title, $body, $skills, $ownerid)
    { //change the function based on what will be in the answers table!!!!
        $db = Database::getDB();
        $query = 'INSERT INTO answers 
                 (title, body, skills, ownerid)
	          VALUES 
	             (:title, :body, :skills, :ownerid)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':ownerid', $ownerid);
        $statement->execute();
        $statement->closeCursor();
    }

}
?>

