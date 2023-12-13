<?php

use App\Solutions\Day5\Day5;

uses()->group( 'day5' );

it( 'returns correct result for sample data', function () {
    $day           = new Day5();
    $day::$DATASET = Day5::DATA_SAMPLE_PART2;
    expect( $day->part2() )->toBe( '46' );
} );

it( 'returns correct result for part 2', function () {
    $day           = new Day5();
    $day::$DATASET = Day5::DATA_PART2;
    expect( $day->part2() )->toBe( '' );
} );
