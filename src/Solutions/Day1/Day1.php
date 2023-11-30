<?php

namespace App\Solutions\Day1;

use App\Solutions\Day;

/**
 * The class to solve day 1
 */
final class Day1 extends Day {
	/**
	 * The day number
	 */
	protected static int $day = 1;
	
	/**
	 * Solution for part 1
	 */
	public function part1(): string {
		$data = $this->get_data( 'input_part1.txt' );
		dd( $data );
		
		return '';
	}

	/**
	 * Solution for part 2
	 */
	public function part2(): string {
		$data = $this->get_data( 'input_part2.txt' );
		dd( $data );

		return '';
	}
}