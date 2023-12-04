<?php

use App\Solutions\Day2\Day2;

uses()->group( 'day2' );

it( 'returns correct result for sample data', function () {
    $day1           = new Day2();
    $day1::$DATASET = Day2::DATA_SAMPLE_PART1;
    expect( $day1->part1() )->toBe( '8' );
} );

it( 'returns correct result for part 1', function () {
    $day1           = new Day2();
    $day1::$DATASET = Day2::DATA_PART1;
    expect( $day1->part1() )->toBe( '2528' );
} );
