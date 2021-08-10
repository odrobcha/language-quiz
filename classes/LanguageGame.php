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
        foreach (Data::words() as $frenchTranslation => $englishTranslation) {
            $tempArray = ['french' => $frenchTranslation, 'english' => $englishTranslation];
            array_push($this->words, $tempArray);
        };

        $this->randomWord = $this->words[rand(0, count($this->words) - 1)];
        $this->score = (int)($_POST['score'] ?? 0);

        if ((isset($_POST['reset']))){
            $_SESSION['questionNumber'] = 0;
            $this->questionNumber = 0;
            $this->score = 0;
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

        return
            '<form method="post" class="answer">'
            .'<div> Your score: '.$this->score .' of ' . ($_SESSION['questionNumber'] ?? 0) .'</div>'
            .'<input type="hidden" name="score" value="' .$this->score .'">'
            .' <label for="answer"> Please, translate: ' .$this->getRandomWord()['french']. ' </label>'
            .'<input type="hidden" name="question" value="' .$this->getRandomWord()['english'] .'">'
            .'<input type="text" id="answer" name="answer"/>'
            .'</form>'
            .'<form method="post" class="reset">
                    <input type="hidden" name="reset" value="0">
                    <button type="submit">Reset Score</button>'
            .' </form>';
    }

    public function run(bool $verifyAnswer) : void
    {
        $this->setQuestionNumber();
        if ($verifyAnswer){
            $this->addScore();
            $this->correctAnswer = '<br> <div>Great job! The answer is correct</div>';
        } else {
            $this->correctAnswer = "<br> <div>Oooops! The answer is not correct... Study more </div>";
        }
    }

    public function setQuestionNumber() :void
    {
        if (isset($_SESSION['questionNumber'])){
            $_SESSION['questionNumber']++;
        } else {
            $_SESSION['questionNumber'] = 1;
        }
    }
    public function addScore() :void
    {
        $this->score++;
    }

    public function getRandomWord() :array
    {
        return $this->randomWord;
    }
    public function getCorrectAnswer() : string
    {
        return $this->correctAnswer;
    }
}