<?php
session_start();
// Uncomment the 2 lines below to see errors on the page.
error_reporting(E_ALL);
ini_set("display_errors","On");

$current_question = 0;
$loaded = isset($_POST['next_question']) && is_numeric($_POST['next_question']);

if ($loaded) {
    $current_question = $_POST['next_question'];

    if ($current_question < $_SESSION['count']) {
	    $_SESSION['answers'][$current_question-1] = $_POST['question'];
    } else {
	    $_SESSION['answers'][$current_question-1] = $_POST['question'];
        header("Location: answers.php");
    }
}

$question = $_SESSION['questions'][$current_question]['question'];
$answer1 = $_SESSION['questions'][$current_question]['answer1'];
$answer2 = $_SESSION['questions'][$current_question]['answer2'];
$answer3 = $_SESSION['questions'][$current_question]['answer3'];
$answer4 = $_SESSION['questions'][$current_question]['answer4'];

?>
<html>
<head>
	<title>Questions</title>
</head>
<body>
    <h1>Question Time</h1>
    <h2>Question <?= $current_question+1; ?></h2>
    <h3><?= $question ?></h3>
    <form method="post" action="questions.php">
        <div><input type="radio" name="question" value="answer1" checked><?= $answer1; ?></div>
        <div><input type="radio" name="question" value="answer2"><?= $answer2; ?></div>
        <div><input type="radio" name="question" value="answer3"><?= $answer3; ?></div>
        <div><input type="radio" name="question" value="answer4"><?= $answer4; ?></div>
        <div>
            <input type="submit" value="Submit Answer">
            <input type="hidden" name="next_question" value="<?= $current_question +1; ?>">
        </div>
    </form>
   </body>
</html>


