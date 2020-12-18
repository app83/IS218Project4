<?php
class Question {
    private $questionId, $title, $body, $skills;

    public function __construct($questionId, $title, $body, $skills) {
        $this->questionId = $questionId;
        $this->title = $title;
        $this->body = $body;
        $this->skills = $skills;
    }

    public function getQuestionId() {
        return $this->questionId;
    }
    public function setQuestionId($questionId) {
        $this->questionId = $questionId;
    }

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
        $this->body = $body;
    }

    public function getSkills() {
        return $this->skills;
    }
    public function setSkills($skills) {
        $this->skills = $skills;
    }

}