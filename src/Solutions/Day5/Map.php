<?php

namespace App\Solutions\Day5;

use App\Solutions\Day5\Range;

/**
 * Modelize a Map
 */
final class Map {
    public function __construct(
        /**
         * An identifier for the map to tell which is the source correspondance
         */
        protected readonly string $source_category,

        /**
         * An identifier for the map to tell which is the destination correspondance
         */
        protected readonly string $destination_category,

        /**
         * The correspondances for the map
         *
         * @var array<array<string, Range>> each sub array contains the 'source' and 'destination' key that contains a Range
         */
        protected array $correspondances = []
    ) {}

    /**
     * Parse raw data to create a map
     *
     * @param array<string> $raw_data The raw data to parse
     * The first line will be the definition of source and destination categories
     * The next lines will be the correspondances formulas
     *
     * @return self
     */
    public static function from_raw( array $raw_data ) : self {
        // Parse the map definition
        $definition = array_shift( $raw_data );
        preg_match( '/(\w+)-to-(\w+)/', $definition, $matches );
        $source_category      = $matches[1] ?? '';
        $destination_category = $matches[2] ?? '';

        // Getting all correspondances formulas from raw data
        $correspondances = array_map(function ($formula) {
            [$destination_range_start, $source_range_start, $range_length] = explode(' ', trim($formula));

            $range_source_end = $source_range_start + ($range_length - 1);
            $range_dest_end   = $destination_range_start + ($range_length - 1);

            return new Correspondance(
                new Range( $source_range_start, $range_source_end ),
                new Range( $destination_range_start, $range_dest_end )
            );
        }, $raw_data);


        return new self( $source_category, $destination_category, $correspondances );
    }

    /**
     * Process a number through the map
     *
     * @param int $number The number to process
     *
     * @return int
     */
    public function process( int $number ) : int {
        foreach ($this->correspondances as $correspondance) {
            if ( $correspondance->can_handle( $number ) ) {
                return $correspondance->convert( $number );
            }
        }

        // If no correspondance is found, return the initial value
        return $number;
    }

    /**
     * Get the source category of the map
     *
     * @return string
     */
    public function get_source_category(): string {
        return $this->source_category;
    }

    /**
     * Get the destination category of the map
     *
     * @return string
     */
    public function get_destination_category(): string {
        return $this->destination_category;
    }
}
