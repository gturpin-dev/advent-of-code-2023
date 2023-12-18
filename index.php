<?php

use App\Services\SolutionFactory;
use App\Solutions\Day1\Day1;
use App\Solutions\Day2\Day2;
use App\Solutions\Day3\Day3;
use App\Solutions\Day4\Day4;
use App\Solutions\Day5\Day5;
use App\Solutions\Day6\Day6;
use App\Solutions\Day7\Day7;
use App\Solutions\Day8\Day8;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    exit;
}

$factory = new SolutionFactory();
$factory->solve( Day8::class );
