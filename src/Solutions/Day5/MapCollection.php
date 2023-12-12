<?php

namespace App\Solutions\Day5;

use App\Solutions\Day5\Map;

/**
 * Modelize a collection of maps
 */
final class MapCollection {
    public function __construct(
        /**
         * The maps
         *
         * @var array<Map>
         */
        protected array $maps = []
    ) {}

    /**
     * Get a map from the collection
     *
     * @param string $source_category      The source category of the map
     * @param string $destination_category The destination category of the map
     *
     * @return Map|null
     */
    public function get( string $source_category, string $destination_category ): ?Map {
        $map = array_filter( $this->maps, function( $map ) use ( $source_category, $destination_category ) {
            return ( $map->get_source_category() === $source_category ) && ( $map->get_destination_category() === $destination_category );
        } );
        $map = array_shift( $map );

        return $map;
    }
}
