<?php

namespace App\Solutions\Day6;

/**
 * Modelize a Race
 */
final class Race {
    public function __construct(
        protected readonly int $time,
        protected readonly int $distance
    ) {}

    /**
     * Count number of ways to win
     * A way to win is a strategy to beat the record of distance in a race
     */
    public function count_ways_to_win() : int {
        $ways_to_try = range( 1, $this->time );

        $ways_to_win = array_filter( $ways_to_try, function ( $button_duration ) {
            $distance_to_beat = $this->distance;
            $speed            = $button_duration;

            // When the button is held, we don't move but we still consume time
            $time_left = $this->time - $button_duration;

            // The button duration is the millimeters per second
            $distance_done = $speed * $time_left;

            return $distance_done > $distance_to_beat;
        } );

        return count( $ways_to_win );
    }

    /**
     * Parse raw data to create a Race
     *
     * @param array<string> $raw_data The raw data to parse
     *                                The raw data must be and array of two string
     *
     * @return self
     */
    public static function from_raw_with_good_kerning( array $raw_data ): self {
        $time_line     = array_shift( $raw_data );
        $distance_line = array_shift( $raw_data );

        preg_match_all( '/\d+/', $time_line, $times );
        $times = array_map( 'intval', $times[0] ?? [] );

        preg_match_all( '/\d+/', $distance_line, $distances );
        $distances = array_map( 'intval', $distances[0] ?? [] );

        $time     = (int) implode( '', $times );
        $distance = (int) implode( '', $distances );

        return new self( $time, $distance );
    }
}
