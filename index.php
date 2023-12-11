<?php

use App\Solutions\Day1\Day1;
use App\Solutions\Day2\Day2;
use App\Solutions\Day3\Day3;
use App\Solutions\Day4\Day4;
use App\Services\SolutionFactory;

set_time_limit(50000);

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    exit;
}

$factory = new SolutionFactory();
$factory->solve( Day4::class );
