<?php

namespace App\Solutions\Day5;

/**
 * Modelize a range with a start number and an end number
 */
final class Range {
    public function __construct(
        protected readonly int $start,
        protected readonly int $end
    ) {}

    /**
     * Weither a number is contained in the range
     *
     * @param integer $number The number to check
     *
     * @return boolean
     */
    public function contains( int $number ): bool {
        return $number >= $this->start && $number <= $this->end;
    }

    public function get_start(): int {
        return $this->start;
    }

    public function get_end(): int {
        return $this->end;
    }
}
