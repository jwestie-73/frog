<?php

class questions {

	/**
	 * Returns a random list of questions
	 *
	 * @param int $quantity
	 * @return array
	 */
	public static function get_questions(int $quantity=5) {
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


}