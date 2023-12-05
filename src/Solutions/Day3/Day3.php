<?php

namespace App\Solutions\Day3;

use App\Solutions\Day;

/**
 * The class to solve day 3
 * https://adventofcode.com/2023/day/3
 */
final class Day3 extends Day {
    /**
     * The day number
     */
    public static int $day = 3;

    /**
     * Solution for part 1
     */
    public function part1() : string {
        // self::$DATASET = self::DATA_SAMPLE_PART1;
        $data = $this->get_data();

        $grid         = new Grid( $data );
        $grid_numbers = $grid->find_numbers();
        $part_numbers = array_filter( $grid_numbers, fn ( $number ) => $number->is_part_number() );
        $result       = array_reduce( $part_numbers, fn ( $total, GridNumber $part_number ) => $total += $part_number->get_value(), 0 );

        return $result;
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
