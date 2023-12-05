<?php

use App\Solutions\Day3\Day3;

uses()->group( 'day3' );

it( 'returns correct result for sample data', function () {
    $day           = new Day3();
    $day::$DATASET = Day3::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '4361' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day3();
    $day::$DATASET = Day3::DATA_PART1;
    expect( $day->part1() )->toBe( '527144' );
} );
