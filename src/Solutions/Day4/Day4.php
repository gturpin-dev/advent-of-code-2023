<?php

namespace App\Solutions\Day4;

use App\Solutions\Day;

/**
 * The class to solve day 4
 * https://adventofcode.com/2023/day/4
 */
final class Day4 extends Day {
	/**
	 * The day number
	 */
	public static int $day = 4;

	/**
	 * Solution for part 1
	 */
	public function part1(): string {
		$data = $this->get_data();

        $cards  = array_map( fn( $card ) => ScratchCard::from_raw( $card ), $data );
        $result = array_reduce( $cards, fn( $total, $card ) => $total + $card->get_points(), 0 );

		return (string) $result;
	}

	/**
	 * Solution for part 2
	 */
	public function part2(): string {
        $data = $this->get_data();

        // Array of "card_id => count_instances"
        $card_stock     = [];
        $original_cards = array_map( fn( $card ) => ScratchCard::from_raw( $card ), $data );
        $original_cards = array_combine( array_map( fn( $card ) => $card->get_id(), $original_cards ), $original_cards );
        $card_stock     = array_fill_keys( array_keys( $original_cards ), 1 );

        // Add the corresponding number of cards to the stock
        foreach ($original_cards as $current_card) {

            // Search in the stock how many cards we have
            $instance_count        = $card_stock[ $current_card->get_id() ] ?? 0;
            $winning_numbers       = $current_card->get_winning_numbers();
            $winning_numbers_count = count( $winning_numbers );

            // If we have winning numbers, we create copies of cards below the current
            for ( $i = $current_card->get_id() + 1; $i <= $current_card->get_id() + $winning_numbers_count; $i++ ) {
                // Increment the stock with the right amount of cards
                $card_stock[ $i ] = ( $card_stock[ $i ] ?? 0 ) + $instance_count;
            }
        }

        $result = array_sum( $card_stock );

        return (string) $result;




        // // self::$DATASET = self::DATA_SAMPLE_PART2;
		// $data = $this->get_data();
		// // dump( $data );

        // // Array of "card_id => count_instances"
        // $instances_count  = [];
        // $original_cards   = array_map( fn( $card ) => ScratchCard::from_raw( $card ), $data );
        // $original_cards   = array_combine( array_map( fn( $card ) => $card->get_id(), $original_cards ), $original_cards );
        // $cards_to_process = array_values( $original_cards );

        // while ( ! empty( $cards_to_process ) ) {
        //     $current_card          = array_shift( $cards_to_process );
        //     $winning_numbers       = $current_card->get_winning_numbers();
        //     $winning_numbers_count = count( $winning_numbers );

        //     // If we have winning numbers, we create copies of cards below the current
        //     if ( $winning_numbers_count > 0 ) {
        //         $cards_to_create = [];

        //         for ( $i = $current_card->get_id() + 1; $i <= $current_card->get_id() + $winning_numbers_count; $i++ ) {
        //             $cards_to_create[] = clone $original_cards[ $i ];
        //         }

        //         $cards_to_process = array_merge( $cards_to_process, $cards_to_create );
        //     }

        //     // Increment the count for the current card
        //     $instances_count[ $current_card->get_id() ] = ( $instances_count[ $current_card->get_id() ] ?? 0 ) + 1;
        // }

        // dump( $instances_count );

        // // sum all instances
        // $result = array_sum( $instances_count );

		// return (string) $result;
	}
}
