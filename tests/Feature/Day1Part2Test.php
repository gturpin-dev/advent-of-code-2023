<?php

use App\Solutions\Day1\Day1;

uses()->group( 'day1' );

it( 'returns correct result for sample data', function () {
    $day1           = new Day1();
    $day1::$DATASET = Day1::DATA_SAMPLE_PART2;
    expect( $day1->part2() )->toBe( '281' );
} );

it( 'returns correct result for part 2', function () {
    $day1           = new Day1();
    $day1::$DATASET = Day1::DATA_PART2;
    expect( $day1->part2() )->toBe( '54719' );
} );
