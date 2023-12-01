<?php

use App\Solutions\Day1\CalibrationDocument;

uses()->group( 'day1' );

it( 'handle two numeric digits', function () {
    $calibration_document = new CalibrationDocument();
    $calibration_value    = $calibration_document->get_calibration_value( '1azerty2' );
    expect( $calibration_value )->toBe( 12 );
} );

it( 'handle two numeric digits not at the very beginning and very end', function () {
    $calibration_document = new CalibrationDocument();
    $calibration_value    = $calibration_document->get_calibration_value( 'azerty3azerty1azerty' );
    expect( $calibration_value )->toBe( 31 );
} );

it( 'handle multiple digits', function () {
    $calibration_document = new CalibrationDocument();
    $calibration_value    = $calibration_document->get_calibration_value( 'az1er5ty9' );
    expect( $calibration_value )->toBe( 19 );
} );

it( 'handle only one digit', function () {
    $calibration_document = new CalibrationDocument();
    $calibration_value    = $calibration_document->get_calibration_value( 'azer5ty' );
    expect( $calibration_value )->toBe( 55 );
} );

it( 'handle multiple adjacent digits', function () {
    $calibration_document = new CalibrationDocument();
    $calibration_value    = $calibration_document->get_calibration_value( '3465' );
    expect( $calibration_value )->toBe( 35 );
} );

// PART 2

it( 'handle spelled numbers in letters', function ($input, $expected) {
	$calibration_document = new CalibrationDocument();
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( $input );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( $expected );
})->with([
	['one', 11],
	['two', 22],
	['three', 33],
	['four', 44],
	['five', 55],
	['six', 66],
	['seven', 77],
	['eight', 88],
	['nine', 99],
]);

it( 'handle superstrings in spelled numbers', function ( $input, $expected ) {
	$calibration_document = new CalibrationDocument();
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( $input );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( $expected );
} )->with([
	['oneight', 18],
    ['twone', 21],
    ['threeight', 38],
    ['fiveight', 58],
    ['sevenine', 79],
    ['eightwo', 82],
    ['eighthree', 83],
    ['nineight', 98],
]);
