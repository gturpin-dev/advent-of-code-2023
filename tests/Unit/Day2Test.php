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
