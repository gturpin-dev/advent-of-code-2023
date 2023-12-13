<?php

namespace App\Solutions\Day6;

use App\Solutions\Day;
use App\Solutions\Day6\RaceCollection;
use phpDocumentor\Reflection\Types\ArrayKey;

/**
 * The class to solve day 6
 * https://adventofcode.com/2023/day/6
 */
final class Day6 extends Day {
    /**
     * The day number
     */
    public static int $day = 6;

    /**
     * Solution for part 1
     */
    public function part1() : string {
        $data   = $this->get_data();
        $races  = RaceCollection::from_raw( $data );
        $result = $races->count_ways_to_win();

        return (string) $result;
    }

    /**
     * Solution for part 2
     */
    public function part2() : string {
        $data = $this->get_data();
        dump( $data );

        return 'Part 2';
    }
}
