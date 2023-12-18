<?php

use App\Solutions\Day8\Day8;

uses()->group( 'day8' );

it( 'returns correct result for sample data', function ( $dataset, $expected ) {
    $day           = new Day8();
    $day::$DATASET = $dataset;
    expect( $day->part1() )->toBe( $expected );
} )->with( [
    'sample 1' => ['sample_part1.txt', '2'],
    'sample 2' => ['sample_part1-2.txt', '6'],
] );

it( 'returns correct result for part 1', function () {
    $day           = new Day8();
    $day::$DATASET = Day8::DATA_PART1;
    expect( $day->part1() )->toBe( '' );
} );
