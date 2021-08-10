<?php

class LanguageGame
{
    private array $words = [];
    private array $randomWord;
    private string $correctAnswer = '';
    public int $score;
    private int $questionNumber = 0;



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
        $this->score = (int)($_POST['score'] ?? 0);
        if ((isset($_POST['score']) && ($_POST['score']) == 0)){
            $_SESSION['questionNumber'] = 0;
        } else {
            $this->questionNumber = (int)(($_SESSION['questionNumber']) ?? 0);
        }


    }
    public function toggleNameField() : string
    {
        if (isset($_SESSION['user_name'])){
            return '';
        } else {
            return ' <form method="post">
                     <label for="user_name">Enter your name</label>
                     <input type="text" id="user_name" name="user_name"/>
                     <button type="submit">Send</button>
                 </form>';

        }


    }
    public function toggleGameFields () :string
    {
        if (!isset($_SESSION['user_name'])){

            return '';
        }

        return '<form method="post">
            <input type="hidden" name="score" value="0">
            <button type="submit">Reset Score</button>'
            .'<form method="post">'
            .'<div> Your score:'.$this->getScore() .'of ' . $this->getQuestionNumber() .'</div>'
            .'<input type="hidden" name="score" value="' .$this->score .'">'
            .' <label for="answer"> Please, translate: ' .$this->getRandomWord()['french']. '</label>'
            .'<input type="hidden" name="question" value="' .$this->getRandomWord()['english'] .'">'
            .'<input type="text" id="answer" name="answer"/>'
            .'</form>';


    }

    public function run(bool $verifyAnswer) : void
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

    public function getQuestionNumber() : int
    {
        return $this->questionNumber;
    }
    public function setQuestionNumber() :void
    {
        $this->questionNumber = (int)($this->questionNumber + 1);
        $_SESSION['questionNumber'] = $this->questionNumber;
    }
    public function addScore() :void
    {
        $this->score = (int)($this->score) + 1;
    }

    public function getRandomWord() :array
    {
        return $this->randomWord;
    }
    public function getCorrectAnswer() : string
    {
        return $this->correctAnswer;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    public function resetQuestionNumber(): void
    {
        $_SESSION['questionNumber'] = '0';
    }


}