<?php

namespace App\Solutions\Day2;

use App\Solutions\Day2\CubeStack;

/**
 * Represents a subset of cubes
 */
final class Subset {
	public function __construct(
		/**
		 * The list of cubes
		 *
		 * @var array<CubeStack>
		 */
		protected array $cubes
	) {}

	/**
	 * Generate a subset from a raw string
	 * the raw string is the following format:
	 * "<cube1>, <cube2>, <cube3>"
	 *
	 * @param string $raw_data
	 *
	 * @return self
	 */
	public static function from_raw( string $raw_data ): self {
		$cube_list = explode( ', ', $raw_data );
		$cube_list = array_map( fn( $cube ) => CubeStack::from_raw( $cube ), $cube_list );

		return new self( $cube_list );
	}

	/**
	 * Check if the subset is valid
	 * The subset is valid with the given available cubes
	 * 
	 * @param array<CubeStack> $available_cubes The available cubes
	 * 
	 * @return bool
	 */
	public function is_valid_with( array $available_cubes ): bool {
		// Bail if some cubes are not enough
		foreach ( $this->cubes as $cube ) {
			if ( ! $this->is_cube_available( $cube, $available_cubes ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Check if the given cube is available in the list
	 * 
	 * @param CubeStack $cube The cube to check
	 * @param array<CubeStack> $available_cubes The available cubes
	 * 
	 * @return bool
	 */
	protected function is_cube_available( CubeStack $cube, array $available_cubes ): bool {
		// Keep cubes with the same color to check
		$available_cubes = array_filter( $available_cubes, fn( $available_cube ) => $available_cube->is_color( $cube->get_color() ) );
		// Keep cubes with a number greater or equal to the cube to check
		$available_cubes = array_filter( $available_cubes, fn( $available_cube ) => $available_cube->get_number() >= $cube->get_number() );

		// If there is at least one cube available, the cube is available
		return count( $available_cubes ) > 0;
	}
}