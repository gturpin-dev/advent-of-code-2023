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
		$data = $this->get_data();

        $cards  = array_map( fn( $card ) => ScratchCard::from_raw( $card ), $data );
        $result = array_reduce( $cards, fn( $total, $card ) => $total + $card->get_points(), 0 );

		return (string) $result;
	}

	/**
	 * Solution for part 2
	 */
	public function part2(): string {
        $data = $this->get_data();

        $original_cards = array_map( fn( $card ) => ScratchCard::from_raw( $card ), $data );
        $collection     = new ScratchCardCollection( $original_cards );

        $collection->process();
        $result = $collection->get_total_instances();

        return (string) $result;
	}
}
