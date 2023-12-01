<?php

namespace App\Services;

use App\Solutions\Day;
use App\Solutions\Day1\Day1;

/**
 * This factory will instanciate the solutions of part 1 & 2 for the given day
 */
final class SolutionFactory {
    public const BOTH_PARTS  = 0;
    public const FIRST_PART  = 1;
    public const SECOND_PART = 2;

    /**
     * Solve the given day
     *
     * @param class-string $solution_class The class of the solution to instanciate
     * @param int          $parts          The parts to solve
     *
     * @example $this->solve( Day1::class, SolutionFactory::BOTH_PARTS );
     */
    public function solve( string $solution_class, int $parts = self::BOTH_PARTS ) : void {
        if ( ! class_exists( $solution_class ) ) {
            throw new \Exception( sprintf( 'The class "%s" does not exist.', $solution_class ) );
        }

        if ( ! is_subclass_of( $solution_class, Day::class ) ) {
            throw new \Exception( sprintf( 'The class "%s" is not a valid day, it must extend %s.', $solution_class, Day::class ) );
        }

        // Solve the day
        $solution_instance = new $solution_class();

        match ( $parts ) {
            self::FIRST_PART  => $this->display_solution( $solution_instance, $solution_class, 'part1' ),
            self::SECOND_PART => $this->display_solution( $solution_instance, $solution_class, 'part2' ),
            default           => [
                $this->display_solution( $solution_instance, $solution_class, 'part1' ),
                $this->display_solution( $solution_instance, $solution_class, 'part2' ),
            ],
        };
    }

    /**
     * Display the solution for the given part
     */
    protected function display_solution( Day $solution_instance, string $solution_class, string $part_method ) : void {
        echo '<h1>Solution for Day ' . $solution_class::$day . ' ' . ucfirst( $part_method ) . '</h1>';
        $solution_class::$DATASET = $solution_class::DATA_PART1;
        dump( $solution_instance->$part_method() );
    }
}
