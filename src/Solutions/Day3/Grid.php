<?php

namespace App\Solutions\Day3;

/**
 * a grid is defined by columns and rows of one digit
 * The grid must be able to know a value of a number at a given position
 * Or for a given position, find the adjacent values
 */
final class Grid {
    /**
     * The grid data like array of rows containing array of columns
     */
    protected array $data;

    /**
     * The max column number
     */
    protected int $max_column;

    /**
     * The max row number
     */
    protected int $max_row;

    /**
     * @param array<string> $data The grid data like array of rows containing string
     */
    public function __construct( array $data ) {
        $rows = array_map( fn ( $row ) => str_split( $row ), $data );

        $this->data       = $rows;
        $this->max_column = count( $rows[0] );
        $this->max_row    = count( $rows );
    }

    /**
     * Get a specific cell value
     *
     * @param  Position $position The position of the cell
     * @return string   The cell value
     *
     * @throws OutOfBoundsException If the cell is out of bounds
     */
    public function get_cell( Position $position ) : string {
        if ( ! isset( $this->data[$position->y] ) || ! isset( $this->data[$position->y][$position->x] ) ) {
            throw new OutOfBoundsException( sprintf( 'The cell (%d,%d) is out of bounds', $position->x, $position->y ) );
        }

        return $this->data[$position->y][$position->x];
    }

    /**
     * Retrieve every numbers in the grid
     * A number is a sequence of digits in a row
     *
     * @return array<GridNumber>
     */
    public function find_numbers() : array {
        $numbers = [];

        foreach ( $this->data as $row_index => $row ) {
            $number    = '';
            $positions = [];

            foreach ( $row as $column_index => $digit ) {

                // If the digit is a number we start writing the number and store its positions
                if ( is_numeric( $digit ) ) {
                    $number .= $digit;
                    $positions[] = new Position( $column_index, $row_index );
                } else {

                    // If not a number, if we have a number in progress we store it and reset the number and positions
                    if ( ! empty( $number ) ) {
                        $numbers[] = new GridNumber( (int) $number, $positions, $this );
                        $number    = '';
                        $positions = [];
                    }
                }
            }

            // Check if there is a number at the end of the line
            if ( ! empty( $number ) ) {
                $numbers[] = new GridNumber( (int) $number, $positions, $this );
            }
        }

        return $numbers;
    }

    /**
     * Get a specific cell value
     *
     * @param  Position      $position The position of the cell
     * @return array<string> An array of cell values
     */
    public function get_adjacent_cells( Position $position ) : array {
        $adjacent_positions = $this->get_adjacent_positions( $position );

        return array_map( fn ( Position $position ) => $this->get_cell( $position ), $adjacent_positions );
    }

    /**
     * Get the adjacent positions of a given position
     *
     *
     * @return array<Position> An array of adjacent positions
     */
    public function get_adjacent_positions( Position $current_position ) : array {
        $positions = [];

        // Top left
        if ( $current_position->x > 0 && $current_position->y > 0 ) {
            $positions[] = new Position( $current_position->x - 1, $current_position->y - 1 );
        }

        // Top
        if ( $current_position->y > 0 ) {
            $positions[] = new Position( $current_position->x, $current_position->y - 1 );
        }

        // Top right
        if ( $current_position->x < $this->max_column - 1 && $current_position->y > 0 ) {
            $positions[] = new Position( $current_position->x + 1, $current_position->y - 1 );
        }

        // Left
        if ( $current_position->x > 0 ) {
            $positions[] = new Position( $current_position->x - 1, $current_position->y );
        }

        // Right
        if ( $current_position->x < $this->max_column - 1 ) {
            $positions[] = new Position( $current_position->x + 1, $current_position->y );
        }

        // Bottom left
        if ( $current_position->x > 0 && $current_position->y < $this->max_row - 1 ) {
            $positions[] = new Position( $current_position->x - 1, $current_position->y + 1 );
        }

        // Bottom
        if ( $current_position->y < $this->max_row - 1 ) {
            $positions[] = new Position( $current_position->x, $current_position->y + 1 );
        }

        // Bottom right
        if ( $current_position->x < $this->max_column - 1 && $current_position->y < $this->max_row - 1 ) {
            $positions[] = new Position( $current_position->x + 1, $current_position->y + 1 );
        }

        return $positions;
    }
}
