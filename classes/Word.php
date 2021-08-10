<?php

class Word
{
    public string $answer;
    public string $quesion;

    public function __construct($answer, $question)
    {
            $this->answer = $answer;
            $this->quesion = $question;
    }

    public function verify() :bool
    {
        if (strtolower($this->answer) == $this->quesion){
            return true;
        } else {
            return false;
        }
    }
}