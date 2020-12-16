<?php
class Answer {
    private $answerId, $title, $answer;

    public function __construct($answerId, $title, $answer) {
        $this->answerId = $answerId;
        $this->title = $title;
        $this->answer = $answer;
    }

    public function getanswerId() {
        return $this->answerId;
    }
    public function setanswerId($value) {
        $this->answerId = $value;
    }

    public function gettitle() {
        return $this->title;
    }
    public function settitle($value) {
        $this->title = $value;
    }

    public function getanswer() {
        return $this->answer;
    }
    public function setanswer($value) {
        $this->answer = $value;
    }
}
