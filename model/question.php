<?php
class Question {
    private $questionId, $title, $body, $skills;

    public function __construct($questionId, $title, $body, $skills) {
        $this->questionId = $questionId;
        $this->title = $title;
        $this->body = $body;
        $this->skills = $skills;
    }

    public function getquestionId() {
        return $this->questionId;
    }
    public function setquestionId($value) {
        $this->questionId = $value;
    }

    public function gettitle() {
        return $this->title;
    }
    public function settitle($value) {
        $this->title = $value;
    }

    public function getbody() {
        return $this->body;
    }
    public function setbody($value) {
        $this->body = $value;
    }

    public function getskills() {
        return $this->skills;
    }
    public function setskills($value) {
        $this->skills = $value;
    }

}