<?php

use App\Solutions\Day2\ColorEnum;
use App\Solutions\Day2\CubeStack;
use App\Solutions\Day2\Game;
use App\Solutions\Day2\Subset;

uses()->group( 'day2' );

it( 'properly create a Game object', function ( string $raw_data, int $expected ) {
    $game = Game::from_raw( $raw_data );

    expect( $game->get_id() )->toBe( $expected );
    expect( $game )->toBeInstanceOf( Game::class );
} )->with( [
    'Game Id of 1 digit' => [
        'raw_data' => 'Game 1: 12 red, 13 green, 14 blue',
        'expected' => 1,
    ],
    'Game Id of 2 digits' => [
        'raw_data' => 'Game 12: 12 red, 13 green, 14 blue',
        'expected' => 12,
    ],
] );

it( 'properly validate a Subset object', function ( string $raw_data, array $available_cubes, bool $expected ) {
    $subset = Subset::from_raw( $raw_data );

    expect( $subset->is_valid_with( $available_cubes ) )->toBe( $expected );
} )->with( [
    'Valid subset' => [
        'raw_data'        => '12 red, 13 green, 14 blue',
        'available_cubes' => [
            new CubeStack( 20, ColorEnum::RED ),
            new CubeStack( 20, ColorEnum::GREEN ),
            new CubeStack( 20, ColorEnum::BLUE ),
        ],
        'expected' => true,
    ],
    'Valid subset with same cubes number' => [
        'raw_data'        => '20 red, 20 green, 20 blue',
        'available_cubes' => [
            new CubeStack( 20, ColorEnum::RED ),
            new CubeStack( 20, ColorEnum::GREEN ),
            new CubeStack( 20, ColorEnum::BLUE ),
        ],
        'expected' => true,
    ],
    'Invalid subset' => [
        'raw_data'        => '20 red, 20 green, 20 blue',
        'available_cubes' => [
            new CubeStack( 10, ColorEnum::RED ),
            new CubeStack( 10, ColorEnum::GREEN ),
            new CubeStack( 10, ColorEnum::BLUE ),
        ],
        'expected' => false,
    ],
] );

it( 'properly create CubeStack object', function () {
    $cube = new CubeStack( 12, ColorEnum::RED );

    expect( $cube->get_number() )->toBe( 12 );
    expect( $cube->get_color() )->toBe( ColorEnum::RED );
    expect( $cube->is_color( ColorEnum::RED ) )->toBe( true );
} );

it( 'properly get cube number for a given color', function ( string $raw_subset_data, ColorEnum $given_color, int $expected_number ) {
    $subset = Subset::from_raw( $raw_subset_data );

    expect( $subset->get_cube_number_for_color( $given_color ) )->toBe( $expected_number );
} )->with( [
    'Get cube number for red' => [
        'raw_subset_data' => '12 red, 13 green, 14 blue',
        'given_color'     => ColorEnum::RED,
        'expected_number' => 12,
    ],
    'Get cube number for green' => [
        'raw_subset_data' => '12 red, 13 green, 14 blue',
        'given_color'     => ColorEnum::GREEN,
        'expected_number' => 13,
    ],
    'Get cube number for blue' => [
        'raw_subset_data' => '12 red, 13 green, 14 blue',
        'given_color'     => ColorEnum::BLUE,
        'expected_number' => 14,
    ],
] );

it( 'properly find the minimal subset power', function () {
    $game = Game::from_raw( 'Game 1: 12 red, 13 green, 15 blue; 5 red, 5 green, 5 blue; 20 red, 25 green' );

    expect( $game->get_minimal_set_power() )->toBe( 7500 );
} );
