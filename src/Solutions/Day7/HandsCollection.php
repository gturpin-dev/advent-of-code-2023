<?php

namespace App\Solutions\Day7;

/**
 * Modelize a collection of hands
 */
final class HandsCollection {
    public function __construct(
        /**
         * The hands of the collection
         *
         * @var array<Hand>
         */
        protected array $hands = []
    ) {}

    /**
     * Sort the hands by their type
     * Firstly by their type, then if equals by their card value first to last
     * It will set the hands "rank" to the key of the array
     * The first hand will have the rank 1, the second 2, etc...
     */
    public function sort() : void {
        usort( $this->hands, function ( Hand $hand_a, Hand $hand_b ) {
            $hand_a_type = $hand_a->get_type();
            $hand_b_type = $hand_b->get_type();
            $comparison  = HandType::compare( $hand_a_type, $hand_b_type );

            // If hands are not equals, return the comparison
            if ( $comparison !== 0 ) {
                return $comparison;
            }

            // If the hands are equals, compare the cards
            $hand_a_cards = $hand_a->get_cards();
            $hand_b_cards = $hand_b->get_cards();

            // For each index of the hand, compare the card of both hands
            for ( $i = 0; $i < count( $hand_a_cards ); $i++ ) {
                $card_a          = $hand_a_cards[$i];
                $card_b          = $hand_b_cards[$i];
                $card_comparison = Card::compare( $card_a, $card_b );

                // If the cards are not equals, end the comparison
                if ( $card_comparison !== 0 ) {
                    return $card_comparison;
                }
            }

            // Should happen only if the hands and cards are equals
            return 0;
        } );

        // Set the rank of each hand
        $this->hands = array_combine(
            range( 1, count( $this->hands ) ),
            $this->hands
        );
    }

    /**
     * Calculate the winning score of the set of hands
     */
    public function get_winning_score() : int {
        $result = array_reduce( $this->get_keys(), function ( int $total_winning, int $hand_rank ) {
            $hand  = $this->get_hand( $hand_rank );
            $score = $hand_rank * $hand->get_bid();

            return $total_winning + $score;
        }, 0 );

        return $result;
    }

    /**
     * Get the hand with the given key
     *
     * @param int $key The key of the hand
     */
    public function get_hand( int $key ) : Hand {
        return $this->hands[$key];
    }

    /**
     * Get the keys of the hands
     *
     * @return array<int>
     */
    public function get_keys() : array {
        return array_keys( $this->hands );
    }
}
