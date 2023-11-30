<?php

namespace App\Solutions;

use App\Services\Reader;

/**
 * Abstract class for each day's solution
 * The class will automatically get the input for the day from the input file
 * It also store samples for each day
 */
abstract class Day {
	/**
	 * The day number
	 */
	public static int $day;
	
	/**
	 * Solution for part 1
	 *
	 * @return string
	 */
	abstract public function part1(): string;

	/**
	 * Solution for part 2
	 *
	 * @return string
	 */
	abstract public function part2(): string;

	/**
	 * Get a dataset for the day
	 * 
	 * @param string $filename The name of the file to get the data from
	 * 
	 * @example $this->get_data( 'input_part1.txt' );
	 *
	 * @return array the content of the file as an array
	 */
	protected function get_data( string $filename ): array {
		$day_number = static::$day;
		$filename   = dirname( __DIR__, 2 ) . '/data/day' . $day_number . '/' . $filename;
		$data       = Reader::get_data( $filename, $day_number );

		return $data;
	}
}