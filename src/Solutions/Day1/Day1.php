<?php

namespace App\Solutions\Day1;

use App\Solutions\Day;

/**
 * The class to solve day 1
 * https://adventofcode.com/2023/day/1
 */
final class Day1 extends Day {
	/**
	 * The day number
	 */
	public static int $day = 1;

	/**
	 * Solution for part 1
	 */
	public function part1(): string {
		$data = $this->get_data();
		dump( $data );

		$calibration_values = [];
		foreach ( $data as $line ) {
			$digits            = str_split( $line );
			$digits            = array_filter( $digits, 'is_numeric' );
			$first_digit       = $digits[ array_key_first( $digits ) ];
			$last_digit        = $digits[ array_key_last( $digits ) ];
			$calibration_value = $first_digit . $last_digit;

			$calibration_values[] = $calibration_value;
		}

		$result = array_sum( $calibration_values );

		return $result;
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