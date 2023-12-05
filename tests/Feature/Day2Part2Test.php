<?php

use App\Solutions\Day2\Day2;

uses()->group( 'day2' );

it( 'returns correct result for sample data', function () {
    $day           = new Day2();
    $day::$DATASET = Day2::DATA_SAMPLE_PART2;
    expect( $day->part2() )->toBe( '2286' );
} );

it( 'returns correct result for part 2', function () {
    $day           = new Day2();
    $day::$DATASET = Day2::DATA_PART2;
    expect( $day->part2() )->toBe( '67363' );
} );
