<?php

namespace App\Solutions\Day2;

/**
 * Represents a game of cubes
 */
final class Game {
    /**
     * The list of subsets
     *
     * @var array<Subset>
     */
    protected array $subsets;

    /**
     * The game id
     */
    protected int $id;

    /**
     * Create a new game
     *
     * @param array<Subset> $subsets
     */
    public function __construct( int $id, array $subsets ) {
        $this->id      = $id;
        $this->subsets = $subsets;
    }

    /**
     * Generate a game from a raw string
     * the raw string is the following format:
     * "Game <id>: <subset1>; <subset2>; <subset3>"
     */
    public static function from_raw( string $raw_data ) : self {
        [$game_id, $rules] = explode( ':', $raw_data );

        $game_id = (int) str_replace( 'Game ', '', $game_id );
        $subsets = explode( '; ', trim( $rules ) );
        $subsets = array_map( fn ( $subset ) => Subset::from_raw( $subset ), $subsets );

        return new self( $game_id, $subsets );
    }

    /**
     * Check if the game is valid
     * The game is valid if all the subsets are valid with the following available cubes:
     * - 12 red cubes
     * - 13 green cubes
     * - 14 blue cubes
     */
    public function is_valid() : bool {
        // Bail if some cubes are not enough in the subsets
        foreach ( $this->subsets as $subset ) {
            if ( ! $subset->is_valid_with( [
                new CubeStack( 12, ColorEnum::RED ),
                new CubeStack( 13, ColorEnum::GREEN ),
                new CubeStack( 14, ColorEnum::BLUE ),
            ] ) ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the sum of the minimal set power
     * The power of a set is defined as the multiplication of the minimal possible number of cubes for each color in the set to be valid
     */
    public function get_minimal_set_power() : int {
        $red_minimal_number   = 0;
        $green_minimal_number = 0;
        $blue_minimal_number  = 0;

        // Get the minimal possible number of cubes for each color in the set to be valid
        foreach ( $this->subsets as $subset ) {
            $red_minimal_number   = max( $red_minimal_number, $subset->get_cube_number_for_color( ColorEnum::RED ) );
            $green_minimal_number = max( $green_minimal_number, $subset->get_cube_number_for_color( ColorEnum::GREEN ) );
            $blue_minimal_number  = max( $blue_minimal_number, $subset->get_cube_number_for_color( ColorEnum::BLUE ) );
        }

        return $red_minimal_number * $green_minimal_number * $blue_minimal_number;
    }

    /**
     * Get the game id
     */
    public function get_id() : int {
        return $this->id;
    }

    /**
     * Get the list of subsets
     *
     * @return array<Subset>
     */
    public function get_subsets() : array {
        return $this->subsets;
    }
}
