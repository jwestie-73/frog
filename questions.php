<?php
session_start();

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="quiz.css" rel="stylesheet" type="text/css">
	<title>Questions</title>
</head>
<body>
    <div class="blankpage">
        <div class="title">
            Question Time
        </div>

        <div class="question_wrapper">
            <div class="question_number">
                Question <?= $current_question+1; ?>
            </div>
            <div class="ask_question"><?= $question ?></div>
            <form method="post" action="questions.php">
                <div class="question"><input type="radio" name="question" value="answer1" checked> <?= $answer1; ?></div>
                <div class="question"><input type="radio" name="question" value="answer2"> <?= $answer2; ?></div>
                <div class="question"><input type="radio" name="question" value="answer3"> <?= $answer3; ?></div>
                <div class="question"><input type="radio" name="question" value="answer4"> <?= $answer4; ?></div>
                <div class="question">
                    <input type="submit" value="Submit Answer">
                    <input type="hidden" name="next_question" value="<?= $current_question +1; ?>">
                </div>
            </form>
        </div>
    </div>
</body>
</html>


