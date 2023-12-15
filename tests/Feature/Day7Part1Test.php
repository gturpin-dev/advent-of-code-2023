<?php

use App\Solutions\Day7\Day7;

uses()->group( 'day7' );

it( 'returns correct result for sample data', function () {
    $day           = new Day7();
    $day::$DATASET = Day7::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '6440' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day7();
    $day::$DATASET = Day7::DATA_PART1;
    expect( $day->part1() )->toBe( '246163188' );
} );
