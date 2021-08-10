<?php

class LanguageGame
{
    private array $words = [];
    private array $randomWord;
    private string $correctAnswer = '';
    public int $score;
    private int $questionNumber;



    public function __construct()
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
       // $this->score = (int)$score;
        $this->score = (int)($_POST['score'] ?? 0);
        $this->questionNumber = (int)(($_SESSION['questionNumber']) ?? 0);

    }

    public function run(bool $verifyAnswer)
    {
       
        // TODO: check for option A or B

        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate

        // Option B: user has just submitted an answer
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown
        $this->setQuestionNumber();
        if ($verifyAnswer){
            $this->addScore();
            $this->correctAnswer = '<br> <div>Great job! The answer is correct</div>';
        } else {
            $this->correctAnswer = "<br> <div>Oooops! The answer is not correct... Study more </div>";

        }

    }

    public function getQuestionNumber()
    {
        return $this->questionNumber;
    }
    public function setQuestionNumber()
    {
        $this->questionNumber = (int)($this->questionNumber + 1);
        $_SESSION['questionNumber'] = $this->questionNumber;
    }
    public function addScore()
    {
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