<?php

namespace App\Solutions\Day7;

enum Card : string {
    case ACE   = 'A';
    case KING  = 'K';
    case QUEEN = 'Q';
    case JACK  = 'J';
    case TEN   = 'T';
    case NINE  = '9';
    case EIGHT = '8';
    case SEVEN = '7';
    case SIX   = '6';
    case FIVE  = '5';
    case FOUR  = '4';
    case THREE = '3';
    case TWO   = '2';

    /**
     * Get the strength value of the card
     */
    public function get_value() : int {
        return match ( $this ) {
            self::ACE   => 14,
            self::KING  => 13,
            self::QUEEN => 12,
            self::JACK  => 11,
            self::TEN   => 10,
            self::NINE  => 9,
            self::EIGHT => 8,
            self::SEVEN => 7,
            self::SIX   => 6,
            self::FIVE  => 5,
            self::FOUR  => 4,
            self::THREE => 3,
            self::TWO   => 2,
        };
    }

    /**
     * Compare two hand types
     */
    public static function compare( Card $card_a, Card $card_b ) : int {
        return match ( true ) {
            $card_a->get_value() === $card_b->get_value() => 0,
            $card_a->get_value() > $card_b->get_value()   => 1,
            default                                       => -1,
        };
    }
}
