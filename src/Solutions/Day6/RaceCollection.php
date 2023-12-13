<?php

namespace App\Solutions\Day6;

/**
 * Modelize a collection of Race
 */
final class RaceCollection {
    public function __construct(
        /**
         * The races in the collection
         *
         * @var array<Race>
         */
        protected readonly array $races = []
    ) {}

    /**
     * Parse raw data to create a collection of Races
     *
     * @param array<string> $raw_data The raw data to parse
     * The raw data must be and array of two string
     *
     * @return self
     */
    public static function from_raw( array $raw_data ): self {
        $time_line = array_shift( $raw_data );
        $distance_line = array_shift( $raw_data );

        preg_match_all( '/\d+/', $time_line, $times );
        $times = array_map( 'intval', $times[0] ?? [] );

        preg_match_all( '/\d+/', $distance_line, $distances );
        $distances = array_map( 'intval', $distances[0] ?? [] );

        // Create new Races from the times and distances
        $races = array_map( function( $time, $index ) use ( $distances ) {
            $distance = $distances[ $index ] ?? 0;

            return new Race( $time, $distance );
        }, $times, array_keys( $times ) );

        return new self( $races );
    }

    /**
     * Count the number of ways to win
     *
     * @return integer
     */
    public function count_ways_to_win(): int {
        return array_reduce( $this->races, fn ( $total, $race ) => $total * $race->count_ways_to_win(), 1 );
    }
}
