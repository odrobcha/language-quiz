<?php

class LanguageGame
{
    private array $words = [];
    private array $randomWord;
    private string $correctAnswer = '';
    public int $score;



    public function __construct($score)
    {
        // :: is used for static functions
        // They can be called without an instance of that class being created
        // and are used mostly for more *static* types of data (a fixed set of translations in this case)
        foreach (Data::words() as $frenchTranslation => $englishTranslation) {
            $tempArray = ['french' => $frenchTranslation, 'english' => $englishTranslation];
            array_push($this->words, $tempArray);

            // TODO: create instances of the Word class to be added to the words array

        }
        $this->randomWord = $this->words[rand(0, count($this->words) - 1)];
        $this->score = (int)$score;

    }

    public function run(bool $verifyAnswer)
    {
        // TODO: check for option A or B

        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate

        // Option B: user has just submitted an answer
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown

        if ($verifyAnswer){
            $this->addScore();
        //    var_dump($this->score);
            $this->correctAnswer = '<br> <div>Great job! The answer is correct</div>';

        } else {
            $this->correctAnswer = "<br> <div>Oooops! The answer is not correct... Study more </div>";

        }

    }
    public function addScore(){
        $this->score = (int)($this->score) + 1;
    }

    public function getRandomWord()
    {
        return $this->randomWord;
    }
    public function getCorrectAnswer(){
        return $this->correctAnswer;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }
}