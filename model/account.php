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
    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }

    public function getfname() {
        return $this->fname;
    }
    public function setfname($value) {
        $this->fname = $value;
    }

    public function getlname() {
        return $this->lname;
    }
    public function setlname($value) {
        $this->lname = $value;
    }

    public function getbirthday() {
        return $this->birthday;
    }
    public function setbirthday($value) {
        $this->birthday = $value;
    }

    public function getemail() {
        return $this->email;
    }
    public function setemail($value) {
        $this->email = $value;
    }

    public function getpassword() {
        return $this->password;
    }
    public function setpassword($value) {
        $this->password = $value;
    }
}
