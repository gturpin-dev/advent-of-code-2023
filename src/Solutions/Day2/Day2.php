<?php

namespace App\Solutions\Day2;

use App\Solutions\Day;

/**
 * The class to solve day 2
 * https://adventofcode.com/2023/day/2
 */
final class Day2 extends Day {
	/**
	 * The day number
	 */
	public static int $day = 2;
	
	/**
	 * Solution for part 1
	 */
	public function part1(): string {
		self::$DATASET = self::DATA_SAMPLE_PART1;
		$data = $this->get_data();
		dump( $data );
		$result = 0;

		foreach ($data as $game) {
			[ $game_id, $rules ] = explode( ':', $game );

			$game_id = (int) str_replace( 'Game ', '', $game_id );
			$subsets   = explode( '; ', $rules );
			$subsets   = array_map( fn( $subset ) => trim( $subset ), $subsets );

			foreach ( $subsets as $subset ) {
				$subset    = explode( ', ', $subset );
				$cube_list = array_map( fn( $cube ) => CubeStack::from_raw( $cube ), $subset );

				// Bail if some cubes are not enough
				foreach ( $cube_list as $cube ) {
					if ( ( $cube->get_color() === ColorEnum::RED ) && $cube->get_number() > 12 ) {
						$game_id = 0;
						break 2;
					}

					if ( ( $cube->get_color() === ColorEnum::GREEN ) && $cube->get_number() > 13 ) {
						$game_id = 0;
						break 2;
					}

					if ( ( $cube->get_color() === ColorEnum::BLUE ) && $cube->get_number() > 14 ) {
						$game_id = 0;
						break 2;
					}
				}
			}

			// The game is valid so we add the game id to the total
			$result += $game_id;
		}

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