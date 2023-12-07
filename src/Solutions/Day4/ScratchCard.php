<?php

namespace App\Solutions\Day4;

/**
 * Modelize a scratch card game
 */
final class ScratchCard {

    public function __construct(
        /**
         * The card id
         *
         * @var int
         */
        protected readonly int $id,

        /**
         * Numbers that can be won
         *
         * @var array<int>
         */
        protected readonly array $winnable_numbers,

        /**
         * Numbers that are on the card
         *
         * @var array<int>
         */
        protected readonly array $card_numbers,
    )
    {}

    /**
     * Init a scratch card from raw data
     * Format: "Card <id>: <int> <int> <int> | <int> <int> <int>"
     *
     * @param string $data The raw data
     *
     * @return self
     */
    public static function from_raw( string $data ): self {
        [ $card_raw, $numbers_raw ] = explode( ':', $data );

        // Get the card id
        preg_match( '/\d+/', $card_raw, $card_id );
        $card_id = (int) $card_id[0] ?? 0;

        [ $winnable_numbers_part, $card_numbers_part ] = explode( '|', $numbers_raw );

        // Retrieve a list of all digits
        preg_match_all( '/\d+/', $winnable_numbers_part, $winnable_numbers );
        preg_match_all( '/\d+/', $card_numbers_part, $card_numbers );

        // Convert them to int
        $winnable_numbers = array_map( 'intval', $winnable_numbers[0] ?? [] );
        $card_numbers     = array_map( 'intval', $card_numbers[0] ?? [] );

        return new self( $card_id, $winnable_numbers, $card_numbers );
    }

    /**
     * Get the winning numbers
     *
     * @return array<int>
     */
    protected function get_winning_numbers(): array {
        return array_intersect( $this->card_numbers, $this->winnable_numbers );
    }

    /**
     * Get the points for this card
     *
     * @return integer
     */
    public function get_points(): int {
        $winning_number       = $this->get_winning_numbers();
        $winning_number_count = count( $winning_number );

        // Bail early if no winning number
        if ( $winning_number_count === 0 ) {
            return 0;
        }

        $card_points = pow( 2, $winning_number_count - 1 );

        return $card_points;
    }
}
