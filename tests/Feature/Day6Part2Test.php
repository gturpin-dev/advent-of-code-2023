<?php

use App\Solutions\Day6\Day6;

uses()->group( 'day6' );

it( 'returns correct result for sample data', function () {
    $day           = new Day6();
    $day::$DATASET = Day6::DATA_SAMPLE_PART2;
    expect( $day->part2() )->toBe( '71503' );
} );

it( 'returns correct result for part 2', function () {
    $day           = new Day6();
    $day::$DATASET = Day6::DATA_PART2;
    expect( $day->part2() )->toBe( '32607562' );
} );
