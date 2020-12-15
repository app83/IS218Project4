<?php
class Database {
    private static $dsn = 'mysql:host=sql1.njit.edu;dbname=app83';
    private static $username = 'app83';
    private static $password = 'Dreambig1!';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $error) {
                $error_message = $error->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>

