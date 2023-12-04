<?php

use App\Solutions\Day1\Day1;
use App\Solutions\Day2\Day2;
use App\Services\SolutionFactory;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    exit;
}

$factory = new SolutionFactory();
$factory->solve( Day2::class );
