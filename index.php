<?php

use App\Services\SolutionFactory;
use App\Solutions\Day1\Day1;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    exit;
}

// $spelled_numbers = [
// 	'one',
// 	'two',
// 	'three',
// 	'four',
// 	'five',
// 	'six',
// 	'seven',
// 	'eight',
// 	'nine',
// ];

// $superstrings = [];

// foreach ($spelled_numbers as $first_word) {
// 	foreach ($spelled_numbers as $second_word) {
// 		if ($first_word !== $second_word && substr($first_word, -1) === $second_word[0]) {
// 			$superstrings[] = $first_word . substr($second_word, 1);
// 		}
// 	}
// }

// echo '<pre>' . print_r( $superstrings, true ) . '</pre>';

// $superstrings = [];
// foreach ($spelled_numbers as $first_word) {
//     foreach ($spelled_numbers as $second_word) {
//         if ($first_word !== $second_word) {
//             $overlap = min(strlen($first_word), strlen($second_word));
//             while ($overlap > 0 && substr($first_word, -$overlap) !== substr($second_word, 0, $overlap)) {
//                 $overlap--;
//             }
//             if ($overlap > 0) {
//                 $superstrings[] = $first_word . substr($second_word, $overlap);
//             }
//         }
//     }
// }

// echo '<pre>' . print_r( $superstrings, true ) . '</pre>';
// die;

$factory = new SolutionFactory();
$factory->solve( Day1::class );
