<?php

namespace App\Solutions\Day3;

/**
 * A Gear is a "*" in the grid
 * It is valid when it has exactly 2 adjacent part numbers
 */
final class Gear {
	/**
	 * The gear symbol
	 */
	public const SYMBOL = '*';

	/**
	 * The adjacent part numbers
	 *
	 * @var array<GridNumber>
	 */
	protected array $adjacent_part_numbers = [];
	
	/**
	 * @param Position $position The gear position
	 * @param Grid     $related_grid     The grid where the gear is
	 */
	public function __construct(
		/**
		 * The gear position
		 */
		protected Position $position,

		/**
		 * The grid where the gear is
		 */
		protected Grid $related_grid
	) {}

	/**
	 * Check if the gear is valid
	 * A gear is valid when it has exactly 2 adjacent part numbers
	 *
	 * @return bool Whether the gear is valid or not
	 */
	public function is_valid() : bool {
		$grid_numbers            = $this->related_grid->find_numbers();
		$part_numbers            = array_filter( $grid_numbers, fn ( GridNumber $number ) => $number->is_part_number() );
		$adjacent_cells_position = $this->related_grid->get_adjacent_positions( $this->position );

		// Check if adjacent cells intersect with position of any part number, if yes, store it in an array
		$adjacent_part_numbers = [];
		foreach ( $adjacent_cells_position as $adjacent_cell_position ) {
			foreach ( $part_numbers as $part_number ) {
				if ( in_array( $adjacent_cell_position, $part_number->get_positions() ) ) {
					$adjacent_part_numbers[] = $part_number;
				}
			}
		}

		// Remove duplicates part numbers
		$adjacent_part_numbers       = array_unique( $adjacent_part_numbers, SORT_REGULAR );
		$this->adjacent_part_numbers = $adjacent_part_numbers;

		return count( $adjacent_part_numbers ) === 2;
	}

	/**
	 * Get the gear ratio
	 * The gear ratio is the product of the adjacent part numbers
	 *
	 * @return int The gear ratio
	 */
	public function get_ratio() : int {
		return array_reduce( $this->adjacent_part_numbers, fn ( $total, GridNumber $part_number ) => $total * $part_number->get_value(), 1 );
	}
}