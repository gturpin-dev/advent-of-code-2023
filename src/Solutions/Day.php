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
     * The dataset file to use
     */
    public static string $DATASET;

    /**
     * The data for part 1
     */
    public const DATA_PART1 = 'input_part1.txt';

    /**
     * The data for part 2
     */
    public const DATA_PART2 = 'input_part2.txt';

    /**
     * The sample data for part 1
     */
    public const DATA_SAMPLE_PART1 = 'sample_part1.txt';

    /**
     * The sample data for part 2
     */
    public const DATA_SAMPLE_PART2 = 'sample_part2.txt';

    /**
     * Solution for part 1
     */
    abstract public function part1() : string;

    /**
     * Solution for part 2
     */
    abstract public function part2() : string;

    /**
     * Get a dataset for the day
     *
     *
     * @example $this->get_data( 'input_part1.txt' );
     *
     * @return array the content of the file as an array
     */
    protected function get_data() : array {
        $day_number = static::$day;
        $filename   = dirname( __DIR__, 2 ) . '/data/day' . $day_number . '/' . static::$DATASET;
        $data       = Reader::get_data( $filename, $day_number );
        // Remove the last empty line if it's null
        if ( null === end( $data ) ) {
            array_pop( $data );
        }

        return $data;
    }
}
