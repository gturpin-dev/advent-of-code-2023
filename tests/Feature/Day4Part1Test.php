<?php

use App\Solutions\Day4\Day4;
use App\Solutions\Day4\ScratchCard;

uses()->group( 'day4' );

it( 'returns correct result for sample data', function () {
    $day           = new Day4();
    $day::$DATASET = Day4::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '13' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day4();
    $day::$DATASET = Day4::DATA_PART1;
    expect( $day->part1() )->toBe( '25183' );
} );


// @TODO to move to a Unit test for edge case
// it( 'test edge case', function() {
//     $card = ScratchCard::from_raw( 'Card  16: 13 93  1 50 51 28 73 67 56  4 | 12 81 20 82  9 48 21 78 36 17 76 35 57 91 18 27 11 16 49 23  5 65 58 29 62' );

//     expect( $card->get_points() )->toBe( 0 );
// } );
