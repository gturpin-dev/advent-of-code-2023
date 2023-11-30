<?php

use App\Solutions\Day1\Day1;
use App\Services\SolutionFactory;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
} else {
	die;
}

$factory = new SolutionFactory();
$factory->solve( Day1::class );