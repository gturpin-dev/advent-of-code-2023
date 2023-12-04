<?php

namespace App\Solutions\Day2;

use App\Solutions\Day;
use App\Solutions\Day2\Game;

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
    public function part1() : string {
        $data   = $this->get_data();
        $result = array_reduce( $data, function ( $total, $game ) {
            $game   = Game::from_raw( $game );
            $result = $game->is_valid() ? $game->get_id() : 0;

            return $total + $result;
        } );

        return (string) $result;
    }

    /**
     * Solution for part 2
     */
    public function part2() : string {
        $data   = $this->get_data();
		$result = array_reduce( $data, function ( $total, $game ) {
			$game   = Game::from_raw( $game );
			$result = $game->get_minimal_set_power();

			return $total + $result;
		} );
		
        return (string) $result;
    }
}
