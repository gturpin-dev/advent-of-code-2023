<?php

namespace App\Solutions\Day5;

/**
 * Modelize a correspondance between two ranges with the same size and step of 1
 */
final class Correspondance {
    public function __construct(
        protected readonly Range $source,
        protected readonly Range $destination,
    ) {}

    /**
     * Weither a number can be handled by the correspondance
     *
     * @param int $number The number to check
     */
    public function can_handle( int $number ) : bool {
        return $this->source->contains( $number );
    }

    /**
     * Convert the number from the source to the destination range
     *
     * @param  int $number The number to convert
     * @return int The converted number
     */
    public function convert( int $number ) : int {
        $offset = $number - $this->source->get_start();

        return $this->destination->get_start() + $offset;
    }
}
