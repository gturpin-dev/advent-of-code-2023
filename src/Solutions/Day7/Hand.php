<?php

namespace App\Solutions\Day7;

final class Hand {
    public function __construct(
        /**
         * The cards of the hand
         *
         * @var array<Card>
         */
        protected array $cards,
        protected readonly int $bid
    ) {}

    /**
     * Parse the raw hand into a Hand object
     *
     * @param string $raw_hand The raw hand
     */
    public static function from_raw( string $raw_hand ) : self {
        [$cards, $bid] = explode( ' ', $raw_hand );

        $cards = str_split( $cards );
        $cards = array_map( fn ( $card ) => Card::tryFrom( $card ), $cards );

        return new self( $cards, (int) $bid );
    }

    /**
     * Get the type of the hand
     * Here's the list of the hand types from the strongest to the weakest:
     * - Five of a kind
     * - Four of a kind
     * - Full house
     * - Three of a kind
     * - Two pairs
     * - One pair
     * - High card
     */
    public function get_type() : HandType {
        $cards  = $this->get_cards();
        $cards  = array_map( fn ( Card $card ) => $card->get_value(), $cards );
        $counts = array_count_values( $cards );

        return match ( true ) {
            $this->is_five_of_a_kind( $counts )  => HandType::FIVE_OF_A_KIND,
            $this->is_four_of_a_kind( $counts )  => HandType::FOUR_OF_A_KIND,
            $this->is_full_house( $counts )      => HandType::FULL_HOUSE,
            $this->is_three_of_a_kind( $counts ) => HandType::THREE_OF_A_KIND,
            $this->is_two_pairs( $counts )       => HandType::TWO_PAIRS,
            $this->is_one_pair( $counts )        => HandType::ONE_PAIR,
            default                              => HandType::HIGH_CARD,
        };
    }

    /**
     * Check if the hand is a five of a kind
     *
     * @param array<int> $counts The counts of each card value
     */
    protected function is_five_of_a_kind( array $counts ) : bool {
        return  in_array( 5, $counts );
    }

    /**
     * Check if the hand is a four of a kind
     *
     * @param array<int> $counts The counts of each card value
     */
    protected function is_four_of_a_kind( array $counts ) : bool {
        return  in_array( 4, $counts );
    }

    /**
     * Check if the hand is a full house
     *
     * @param array<int> $counts The counts of each card value
     */
    protected function is_full_house( array $counts ) : bool {
        return  in_array( 3, $counts ) && in_array( 2, $counts );
    }

    /**
     * Check if the hand is a three of a kind
     *
     * @param array<int> $counts The counts of each card value
     */
    protected function is_three_of_a_kind( array $counts ) : bool {
        return  in_array( 3, $counts );
    }

    /**
     * Check if the hand is a two pairs
     *
     * @param array<int> $counts The counts of each card value
     */
    protected function is_two_pairs( array $counts ) : bool {
        return  in_array( 2, $counts ) && count( $counts ) == 3;
    }

    /**
     * Check if the hand is a one pair
     *
     * @param array<int> $counts The counts of each card value
     */
    protected function is_one_pair( array $counts ) : bool {
        return  in_array( 2, $counts );
    }

    /**
     * Display the hand
     */
    public function display() : string {
        $cards = $this->get_cards();
        $cards = array_map( fn ( Card $card ) => $card->value, $cards );

        return implode( '', $cards );
    }

    /**
     * Get the cards of the hand
     *
     * @return array<Card>
     */
    public function get_cards() : array {
        return $this->cards;
    }

    /**
     * Get the cards values of the hand
     *
     * @return array<Card>
     */
    public function get_cards_values() : array {
        return array_map( fn ( Card $card ) => $card->get_value(), $this->get_cards() );
    }

    /**
     * Get the bid of the hand
     */
    public function get_bid() : int {
        return $this->bid;
    }
}
