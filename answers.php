<?php
session_start();
// Uncomment the 2 lines below to see errors on the page.
error_reporting(E_ALL);
ini_set("display_errors","On");

require_once "questions.class.php";
$score = questions::get_score($_SESSION['questions'], $_SESSION['answers']);
//echo '<pre style="background-color:white">'.print_r($_SESSION, true).'</pre>';
//die();

?>
<html>
<head>
	<title>Answers</title>
</head>
<body>
	<h1>Answer Time</h1>

	<?php
	foreach ($_SESSION['questions'] as $question => $detail) {
		?>
		<div>
			<h2>Question <?= $question+1;?> <?= $detail['question'];?></h2>
			<div>
				<div><?= $detail['answer1'];?></div>
				<div><?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer1'); ?> </div>
                <div><?= $detail['answer2'];?></div>
                <div><?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer2'); ?> </div>
                <div><?= $detail['answer3'];?></div>
                <div><?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer3'); ?> </div>
                <div><?= $detail['answer4'];?></div>
                <div><?= questions::get_answer($detail['correct'], $_SESSION['answers'][$question], 'answer4'); ?> </div>
			</div>
		</div>

		<?php
	}
	?>

    <div>You scored <?= $score; ?> out of <?= $_SESSION['count']; ?></div>

    <div><a href="restart.php">Restart the Quiz</a></div>

</body>
</html>
