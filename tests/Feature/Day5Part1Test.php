<?php

use App\Solutions\Day5\Day5;
use App\Solutions\Day5\ScratchCard;

uses()->group( 'day5' );

it( 'returns correct result for sample data', function () {
    $day           = new Day5();
    $day::$DATASET = Day5::DATA_SAMPLE_PART1;
    expect( $day->part1() )->toBe( '35' );
} );

it( 'returns correct result for part 1', function () {
    $day           = new Day5();
    $day::$DATASET = Day5::DATA_PART1;
    expect( $day->part1() )->toBe( '457535844' );
} );
