<?php

use App\Solutions\Day2\Day2;

uses()->group( 'day2' );

it( 'returns correct result for sample data', function () {
    $day1           = new Day2();
    $day1::$DATASET = Day2::DATA_SAMPLE_PART2;
    expect( $day1->part2() )->toBe( '2286' );
} );

it( 'returns correct result for part 2', function () {
    $day1           = new Day2();
    $day1::$DATASET = Day2::DATA_PART2;
    expect( $day1->part2() )->toBe( '67363' );
} );
