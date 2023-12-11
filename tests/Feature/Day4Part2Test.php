<?php

use App\Solutions\Day4\Day4;

uses()->group( 'day4' );

it( 'returns correct result for sample data', function () {
    $day           = new Day4();
    $day::$DATASET = Day4::DATA_SAMPLE_PART2;
    expect( $day->part2() )->toBe( '30' );
} );

it( 'returns correct result for part 2', function () {
    $day           = new Day4();
    $day::$DATASET = Day4::DATA_PART2;
    expect( $day->part2() )->toBe( '5667240' );
} );
