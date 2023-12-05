<?php

use App\Solutions\Day1\Day1;

uses()->group( 'day1' );

it( 'returns correct result for sample data', function () {
    $day           = new Day1();
    $day::$DATASET = Day1::DATA_SAMPLE_PART2;
    expect( $day->part2() )->toBe( '281' );
} );

it( 'returns correct result for part 2', function () {
    $day           = new Day1();
    $day::$DATASET = Day1::DATA_PART2;
    expect( $day->part2() )->toBe( '54719' );
} );
