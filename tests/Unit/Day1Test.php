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

it( 'handle spelled numbers in letters', function () {
	$calibration_document = new CalibrationDocument();
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'one' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 11 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'two' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 22 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'three' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 33 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'four' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 44 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'five' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 55 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'six' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 66 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'seven' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 77 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'eight' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 88 );
	$calibration_value    = $calibration_document->convert_spelled_numbers_to_digits( 'nine' );
	$calibration_value    = $calibration_document->get_calibration_value( $calibration_value );
	expect( $calibration_value )->toBe( 99 );

	// @TODO Add tests or case for each special test of part 1 but with spelled numbers
} );