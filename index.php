<?php

use App\Services\SolutionFactory;
use App\Solutions\Day1\Day1;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    exit;
}

$factory = new SolutionFactory();
$factory->solve( Day1::class );
