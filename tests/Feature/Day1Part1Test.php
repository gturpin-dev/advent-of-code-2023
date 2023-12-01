<?php

use App\Solutions\Day1\Day1;

uses()->group( 'day1' );

it( 'returns correct result for sample data', function () {
    $day1           = new Day1();
    $day1::$DATASET = Day1::DATA_SAMPLE;
    expect( $day1->part1() )->toBe( '142' );
} );

it( 'returns correct result for part1', function () {
    $day1           = new Day1();
    $day1::$DATASET = Day1::DATA_PART1;
    expect( $day1->part1() )->toBe( '55971' );
} );
