<?php
class Account {
    private $id, $fname, $lname, $birthday, $email, $password;

    public function __construct($id, $fname, $lname, $birthday, $email, $password) {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->password = $password;

    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getFname() {
        return $this->fname;
    }
    public function setFname($fname) {
        $this->fname = $fname;
    }

    public function getLname() {
        return $this->lname;
    }
    public function setLname($lname) {
        $this->lname = $lname;
    }

    public function getBirthday() {
        return $this->birthday;
    }
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}
