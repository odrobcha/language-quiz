<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);
session_start();
// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load your classes
require_once 'classes/Data.php';
require 'classes/LanguageGame.php';
// require_once 'classes/Player.php'; // Only needed for extra's
require_once 'classes/Word.php';

$score = $_POST['score'] ?? 0;
//var_dump($score);
$game = new LanguageGame($score);
//var_dump($score);
if (!empty($_POST)){
    $answer = new Word($_POST["answer"], $_POST["question"]);
    $game->run($answer->verify());
}


require 'view.php';