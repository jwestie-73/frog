<?php
session_start();

//Load classes here
require_once "questions.class.php";

// Parameters
$question_quantity = 5;

// reset if restarting
if (isset($_SESSION['answers'])) {
	$_SESSION['questions'] = [];
	$_SESSION['answers'] = [];
	$_SESSION['count'] = 0;
}

$_SESSION['questions'] = questions::get_questions($question_quantity);
$_SESSION['answers'] = [];
$_SESSION['count'] = $question_quantity;

header("Location: questions.php");
die();
