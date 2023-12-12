<?php

namespace App\Solutions\Day5;

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
         * @var array<int, int>
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
        // $correspondances = array_map( function( $formula ) {
        //     [$destination_range_start, $source_range_start, $range_length] = explode( ' ', trim( $formula ) );

        //     $range_source    = range( $source_range_start, $source_range_start + ( $range_length - 1 ) );
        //     $range_dest      = range( $destination_range_start, $destination_range_start + ( $range_length - 1 ) );
        //     $correspondances = array_combine( $range_source, $range_dest );

        //     return $correspondances;
        // }, $raw_data );

        // // Merge all correspondances formulas into one array preserving keys
        // $correspondances = array_replace( ...$correspondances );


        $correspondances = array_map(function ($formula) {
            [$destination_range_start, $source_range_start, $range_length] = explode(' ', trim($formula));

            $range_source_end = $source_range_start + ($range_length - 1);
            $range_dest_end = $destination_range_start + ($range_length - 1);

            return [
                'source' => ['start' => $source_range_start, 'end' => $range_source_end],
                'destination' => ['start' => $destination_range_start, 'end' => $range_dest_end]
            ];
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
            if ($number >= $correspondance['source']['start'] && $number <= $correspondance['source']['end']) {
                // Calculate the offset of the number within the source range
                $offset = $number - $correspondance['source']['start'];

                // Apply the same offset to the destination range
                return $correspondance['destination']['start'] + $offset;
            }
        }

        // If no correspondance is found, return the initial value
        return $number;
        // return $this->correspondances[$number] ?? $number;
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
