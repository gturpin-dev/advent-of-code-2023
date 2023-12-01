<?php

namespace App\Services;

use App\Solutions\Day;

/**
 * This factory will instanciate the solutions of part 1 & 2 for the given day
 */
final class SolutionFactory {

	/**
	 * Solve the given day
	 *
	 * @param class-string $solution_class The class of the solution to instanciate
	 * 
	 * @example $this->solve( Day1::class );
	 *
	 * @return void
	 */
	public function solve( string $solution_class ): void {
		if ( ! class_exists( $solution_class ) ) {
			throw new \Exception( sprintf( 'The class "%s" does not exist.', $solution_class ) );
		}

		if ( ! is_subclass_of( $solution_class, Day::class ) ) {
			throw new \Exception( sprintf( 'The class "%s" is not a valid day, it must extend %s.', $solution_class, Day::class ) );
		}

		// Solve the day
		$solution = new $solution_class();

		echo '<h1>Solution for Day ' . $solution_class::$day . ' Part 1</h1>';
		$solution_class::$DATASET = $solution_class::DATA_PART1;
		dump( $solution->part1() );

		echo '<h1>Solution for Day ' . $solution_class::$day . ' Part 2</h1>';
		$solution_class::$DATASET = $solution_class::DATA_PART2;
		dump( $solution->part2() );
	}
}