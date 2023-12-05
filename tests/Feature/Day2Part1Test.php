<?php

use App\Solutions\Day2\Day2;

uses()->group( 'day2' );

it( 'returns correct result for sample data', function () {
    $day           = new Day2();
    $day::$DATASET = Day2::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '8' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day2();
    $day::$DATASET = Day2::DATA_PART1;
    expect( $day->part1() )->toBe( '2528' );
} );
