<?php

namespace App\Solutions\Day3;

/**
 * Modelize a position with X and Y coordinates
 */
final readonly class Position {
    public function __construct(
        public int $x,
        public int $y
    ) {}
}
