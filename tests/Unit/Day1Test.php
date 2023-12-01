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
