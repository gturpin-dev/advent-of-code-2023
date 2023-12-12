<?php

namespace App\Solutions\Day5;

/**
 * A pipeline to process a number from other through a pipeline of maps
 */
final class NumberConverterPipeline {
    /**
     * The maps to use in the pipeline
     * The order of the maps is the order of the process
     *
     * @var array<Map>
     */
    protected array $maps = [];

    /**
     * Add a map to the pipeline
     *
     * @param Map $map The map to add
     *
     * @return self
     */
    public function pipe( Map $map ) : self {
        $this->maps[] = $map;

        return $this;
    }

    /**
     * Process a number through the pipeline
     *
     * @param int $number The number to process
     *
     * @return int
     */
    public function process( int $number ) : int {
        foreach ( $this->maps as $map ) {
            $number = $map->process( $number );
        }

        return $number;
    }
}
