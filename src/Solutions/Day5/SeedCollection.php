<?php

namespace App\Solutions\Day5;

use App\Solutions\Day5\Seed;

/**
 * Modelize a collection of seeds
 */
final class SeedCollection extends \ArrayObject {
    public function __construct(
        /**
         * The seeds
         *
         * @var array<Seed>
         */
        array $seeds = []
    ) {
        parent::__construct( $seeds );
    }

    /**
     * Parse raw data to create a collection of seeds
     *
     * @param string $raw_data The raw data to parse
     *
     * @return self
     */
    public static function from_raw( string $raw_data ) : self {
        $raw_data = str_replace( 'seeds: ', '', $raw_data );
        $raw_data = trim( $raw_data );
        $raw_data = explode( ' ', $raw_data );
        $seeds    = array_map( fn( $seed ) => new Seed( $seed ), $raw_data );

        return new self( $seeds );
    }
}
