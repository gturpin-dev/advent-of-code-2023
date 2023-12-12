<?php

namespace App\Solutions\Day5;

/**
 * Modelize a seed
 */
final class Seed {
    public function __construct(
        protected readonly int $number
    ) {}

    public function get_number(): int {
        return $this->number;
    }
}
