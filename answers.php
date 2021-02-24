<?php
session_start();

require_once "questions.class.php";
$score = questions::get_score($_SESSION['questions'], $_SESSION['answers']);


?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="quiz.css" rel="stylesheet" type="text/css">
	<title>Answers</title>
</head>
<body>
<div class="blankpage">
    <div class="title">
        <h1>Answer Time</h1>
    </div>

    <div class="score">
        You scored <?= $score; ?> out of <?= $_SESSION['count']; ?>
    </div>

    <?php
    foreach ($_SESSION['questions'] as $question => $detail) {
        ?>
        <div class="question_wrapper">
            <div class="show_answer">Question <?= $question+1;?> <?= $detail['question'];?></div>
            <div>
                <div class="answers">
                    <div class="answer_image">
                        <?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer1'); ?>
                    </div>
                    <div class="answer_list"><?= $detail['answer1'];?></div>
                    <div class="css_reset"></div>
                </div>

                <div class="answers">
                    <div class="answer_image">
                        <?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer2'); ?>
                    </div>
                    <div class="answer_list"><?= $detail['answer2'];?></div>
                    <div class="css_reset"></div>
                </div>

                <div class="answers">
                    <div class="answer_image">
                      <?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer3'); ?>
                    </div>
                    <div class="answer_list"><?= $detail['answer3'];?></div>
                    <div class="css_reset"></div>
                </div>

                <div class="answers">
                    <div class="answer_image">
                        <?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer4'); ?>
                    </div>
                    <div class="answer_list"><?= $detail['answer4'];?></div>
                    <div class="css_reset"></div>
                </div>




            </div>
        </div>

        <?php
    }
    ?>

    <div class="startbutton"><a href="restart.php">Restart the Quiz</a></div>

</div>

</body>
</html>
