<?php

use App\Solutions\Day1\Day1;

uses()->group( 'day1' );

it( 'returns correct result for sample data', function () {
    $day           = new Day1();
    $day::$DATASET = Day1::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '142' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day1();
    $day::$DATASET = Day1::DATA_PART1;
    expect( $day->part1() )->toBe( '55971' );
} );
