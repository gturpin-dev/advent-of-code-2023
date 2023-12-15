<?php

namespace App\Solutions\Day7;

use App\Solutions\Day;

/**
 * The class to solve day 7
 * https://adventofcode.com/2023/day/7
 */
final class Day7 extends Day {
	/**
	 * The day number
	 */
	public static int $day = 7;

	/**
	 * Solution for part 1
	 */
	public function part1(): string {
		$data  = $this->get_data();
        $hands = array_map( fn ( $hand ) => Hand::from_raw( $hand ), $data );

        // Order hands by their strength ( firstly by their type, then if equals by their card value )
        $hands = new HandsCollection( $hands );
        $hands->sort();

        // Calculate the winning score of the set of hands
        $result = $hands->get_winning_score();

		return (string) $result;
	}

	/**
	 * Solution for part 2
	 */
	public function part2(): string {
		$data = $this->get_data();
		dump( $data );

		return 'Part 2';
	}
}
