<?php

namespace App\Solutions\Day4;

use App\Solutions\Day;

/**
 * The class to solve day 4
 * https://adventofcode.com/2023/day/4
 */
final class Day4 extends Day {
	/**
	 * The day number
	 */
	public static int $day = 4;

	/**
	 * Solution for part 1
	 */
	public function part1(): string {
        // self::$DATASET = self::DATA_SAMPLE_PART1;
		$data = $this->get_data();
		// dump( $data );

        $cards  = array_map( fn( $card ) => ScratchCard::from_raw( $card ), $data );

        foreach ($cards as $id => $card) {
            // echo $card->get_points() . " => " . $id . "<br>";
        }

        $result = array_reduce( $cards, fn( $total, $card ) => $total + $card->get_points(), 0 );

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
