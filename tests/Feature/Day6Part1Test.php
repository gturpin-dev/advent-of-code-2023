<?php

use App\Solutions\Day6\Day6;

uses()->group( 'day6' );

it( 'returns correct result for sample data', function () {
    $day           = new Day6();
    $day::$DATASET = Day6::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '288' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day6();
    $day::$DATASET = Day6::DATA_PART1;
    expect( $day->part1() )->toBe( '503424' );
} );
