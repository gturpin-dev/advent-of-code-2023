<?php

namespace App\Solutions\Day7;

/**
 * Represents the type of a hand
 */
enum HandType: int {
	case FIVE_OF_A_KIND  = 10;
	case FOUR_OF_A_KIND  = 9;
	case FULL_HOUSE      = 8;
	case THREE_OF_A_KIND = 7;
	case TWO_PAIRS       = 6;
	case ONE_PAIR        = 5;
	case HIGH_CARD       = 4;

    /**
     * Compare two hand types
     *
     * @param HandType $hand_type_a The first hand type
     * @param HandType $hand_type_b The second hand type
     */
    public static function compare( HandType $hand_type_a, HandType $hand_type_b ): int {
        return match ( true ) {
            $hand_type_a->value === $hand_type_b->value => 0,
            $hand_type_a->value > $hand_type_b->value   => 1,
            default                                     => -1,
        };
    }
}
