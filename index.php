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
require_once 'classes/LanguageGame.php';
require_once 'classes/Player.php'; // Only needed for extra's
require_once 'classes/Word.php';
if (isset($_POST["user_name"])){
    $user = new Player($_POST["user_name"]);
}

$game = new LanguageGame();
$game->start();

//session_destroy();
require 'view.php';