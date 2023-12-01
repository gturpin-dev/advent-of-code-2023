<?php

/**
 * File which must be called to create a new day solution by CLI
 */

use App\Services\NewDayGenerator;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    exit;
}

if ( ! isset( $argv[1] ) ) {
    exit( 'You must provide a day number.' );
}

$day_number = (int) $argv[1];
NewDayGenerator::generate( $day_number );
