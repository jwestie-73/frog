<?php

class questions {

	/**
	 * Returns a random list of questions
	 *
	 * @param int $quantity
	 * @return array
	 */
	public static function get_questions(int $quantity=5): array {
		$fullList = json_decode(file_get_contents("questions.json"), true);
		return self::randomize_questions($fullList[0], $quantity);
	}

	/**
	 * Picks a set amount of questions at random from the list supplied to it.
	 *
	 * @param array $questions The list of questions
	 * @param int $quantity The number of questions
	 * @return array A list of random questions
	 */
	private static function randomize_questions(array $questions, int $quantity): array {
		$returned_questions = [];

		$total_questions = ($quantity < count($questions))
			? $quantity
			: count($questions);

		$randomized = array_rand($questions, $total_questions);

		for ($i=0; $i<$total_questions; $i++) {
			$returned_questions[$i] = $questions[$randomized[$i]];
		}

		return $returned_questions;
	}

	/**
	 * Sets the yes/No answer against the question on the answers page
	 *
	 * @param string $question The correct answer to the question
	 * @param string $answer The selected answer
	 * @param string $current The current answer on screen
	 * @return string HTML of the yes/no image
	 */
	public static function get_answer(string $question, string $answer, string $current): string {
		$correct = ($question == $current);
		$incorrect = ($answer == $current) && ($answer != $question);

		if ($correct) {
			$html = '<img src="yes.png" alt="Correct">';
		} else if ($incorrect) {
			$html = '<img src="no.png" alt="Incorrect">';
		} else {
			$html = '';
		}

		return $html;
	}

	/**
	 * Gets the score (number of correct answers
	 *
	 * @param array $questions Array of the questions
	 * @param array $answers Array of the answers
	 * @return int The number of correct answers
	 */
	public static function get_score(array $questions, array $answers): int {
		$score = 0;

		foreach ($questions as $question => $detail) {
			if ($detail['correct'] == $answers[$question]) {
				$score ++;
			}
		}

		return $score;
	}

}
