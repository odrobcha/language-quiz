<?php

class Word
{
    public string $answer;
    public string $quesion;

    public function __construct($answer, $question)
    {
        // :: is used for static functions
        // They can be called without an instance of that class being created
        // and are used mostly for more *static* types of data (a fixed set of translations in this case)

            $this->answer = $answer;
            $this->quesion = $question;

            // TODO: create instances of the Word class to be added to the words array


    }

    public function verify()
    {
        if ($this->answer == $this->quesion){
            return true;
        } else {
            return false;
        }

        // TODO: use this function to verify if the provided answer by the user matches the correct one
        // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
        // Bonus (hard): can you allow answers with small typo's (max one character different)?
    }

    public function getAnswer()
    {
        return $this->word;
    }
    public function getRandomWord()
    {
        return $this->randomWord;
    }




}