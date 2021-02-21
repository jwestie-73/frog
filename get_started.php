<?php
session_start();
/*
===================================================
Start file - sets the default values
*/

// Uncomment the 2 lines below to see errors on the page.
error_reporting(E_ALL);
ini_set("display_errors","On");

//Load classes here
require_once "questions.class.php";

// Parameters
$question_quantity = 5;

$_SESSION['questions'] = questions::get_questions($question_quantity);
$_SESSION['answers'] = [];
$_SESSION['count'] = $question_quantity;

header("Location: questions.php");
die();
