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
     * @param  int    $column The column number ( like X )
     * @param  int    $row    The row number    ( like Y )
     * @return string The cell value
     *
     * @throws OutOfBoundsException If the cell is out of bounds
     */
    public function get_cell( int $column, int $row ) : string {
        if ( ! isset( $this->data[$row] ) || ! isset( $this->data[$row][$column] ) ) {
            throw new OutOfBoundsException( sprintf( 'The cell (%d,%d) is out of bounds', $column, $row ) );
        }

        return $this->data[$row][$column];
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
                    $positions[] = [$column_index, $row_index];
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
     * @param  int           $column The column number ( like X )
     * @param  int           $row    The row number    ( like Y )
     * @return array<string> An array of cell values
     */
    public function get_adjacent_cells( int $column, int $row ) : array {
        $adjacent_positions = $this->get_adjacent_positions( $column, $row );

        return array_map( fn ( $position ) => $this->get_cell( $position[0], $position[1] ), $adjacent_positions );
    }

    /**
     * Get the adjacent positions of a given position
     *
     * @param  int               $column The column number ( like X )
     * @param  int               $row    The row number    ( like Y )
     * @return array<array<int>>
     */
    public function get_adjacent_positions( int $column, int $row ) : array {
        $positions = [];

        // Top left
        if ( $column > 0 && $row > 0 ) {
            $positions[] = [$column - 1, $row - 1];
        }

        // Top
        if ( $row > 0 ) {
            $positions[] = [$column, $row - 1];
        }

        // Top right
        if ( $column < $this->max_column - 1 && $row > 0 ) {
            $positions[] = [$column + 1, $row - 1];
        }

        // Left
        if ( $column > 0 ) {
            $positions[] = [$column - 1, $row];
        }

        // Right
        if ( $column < $this->max_column - 1 ) {
            $positions[] = [$column + 1, $row];
        }

        // Bottom left
        if ( $column > 0 && $row < $this->max_row - 1 ) {
            $positions[] = [$column - 1, $row + 1];
        }

        // Bottom
        if ( $row < $this->max_row - 1 ) {
            $positions[] = [$column, $row + 1];
        }

        // Bottom right
        if ( $column < $this->max_column - 1 && $row < $this->max_row - 1 ) {
            $positions[] = [$column + 1, $row + 1];
        }

        return $positions;
    }
}
