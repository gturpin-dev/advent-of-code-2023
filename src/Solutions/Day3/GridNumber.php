<?php

namespace App\Solutions\Day3;

/**
 * A grid number is a number in the grid with position of every digits
 */
final class GridNumber {
	public const SYMBOLS = [ '*', '/', '=', '#', '-', '&', '+', '@', '$', '%' ];
	
	/**
	 * The number value
	 */
	protected int $value;

	/**
	 * The number digits positions
	 */
	protected array $positions;

	/**
	 * The grid where the number is
	 */
	protected Grid $related_grid;

	/**
	 * @param int   $value        The number value
	 * @param array $positions    The number digits positions
	 * @param Grid  $related_grid The grid where the number is
	 */
	public function __construct( int $value, array $positions, Grid $related_grid ) {
		$this->value        = $value;
		$this->positions    = $positions;
		$this->related_grid = $related_grid;
	}

	/**
	 * Check if a number is a part number
	 * A part number is a number that has at least one adjacent symbol
	 * 
	 * @return bool Whether the number is a part number or not
	 */
	public function is_part_number() : bool {
		$adjacent_cells = [];
		foreach ( $this->positions as $position ) {
			$adjacent_cells = array_merge( $adjacent_cells, $this->related_grid->get_adjacent_cells( $position[0], $position[1] ) );
		}

		$adjacent_symbols = array_filter( $adjacent_cells, fn ( $cell_value ) => self::is_symbol( $cell_value ) );

		return count( $adjacent_symbols ) > 0;
	}

	/**
	 * Whether the number is a symbol or not
	 * 
	 * @param string $cell_value The cell value
	 */
	public static function is_symbol( string $cell_value ) : bool {

		if ($cell_value === '.') return false;
		if (is_numeric( $cell_value )) return false;
		
		return true;
		
		return in_array( $cell_value, self::SYMBOLS );
	}

	/**
	 * Get the number value
	 *
	 * @return int
	 */
	public function get_value() : int {
		return $this->value;
	}

	/**
	 * Get the number digits positions
	 *
	 * @return array
	 */
	public function get_positions() : array {
		return $this->positions;
	}

	/**
	 * Get the grid where the number is
	 *
	 * @return Grid
	 */
	public function get_related_grid() : Grid {
		return $this->related_grid;
	}
}