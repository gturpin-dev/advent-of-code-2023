<?php

namespace App\Solutions\Day5;

use App\Solutions\Day;
use App\Solutions\Day5\Map;
use App\Solutions\Day5\MapCollection;
use App\Solutions\Day5\NumberConverterPipeline;

/**
 * The class to solve day 5
 * https://adventofcode.com/2023/day/5
 */
final class Day5 extends Day {
	/**
	 * The day number
	 */
	public static int $day = 5;

	/**
	 * Solution for part 1
	 */
	public function part1(): string {
        self::$DATASET = self::DATA_SAMPLE_PART1;
		$data = $this->get_data();
		dump( $data );

        $seeds = array_shift( $data );
        $seeds = SeedCollection::from_raw( $seeds );

        dump( $seeds );

        // Create chunks of maps @TODO migrate this to the Reader Service because it could be useful for other days
        $chunks = array_reduce( $data, function( $chunks, $item ) {
            if ( ! is_null( $item ) ) {
                $chunks[array_key_last( $chunks )][] = $item;
            } else {
                $chunks[] = [];
            }

            return $chunks;
        }, [] );
        $chunks = array_values( $chunks );

        dump( $chunks );

        $maps = array_map( fn( $chunk ) => Map::from_raw( $chunk ), $chunks );
        $maps = new MapCollection( $maps );

        dump( $maps );
        // die;

        // Set a pipeline of maps to process a seed
		$pipeline = ( new NumberConverterPipeline )
			->pipe( $maps->get( 'seed', 'soil' ) )
			->pipe( $maps->get( 'soil', 'fertilizer' ) )
			->pipe( $maps->get( 'fertilizer', 'water' ) )
			->pipe( $maps->get( 'water', 'light' ) )
			->pipe( $maps->get( 'light', 'temperature' ) )
			->pipe( $maps->get( 'temperature', 'humidity' ) )
			->pipe( $maps->get( 'humidity', 'location' ) )
        ;

        // Process all seeds
        $location_numbers = array_reduce( $seeds->getArrayCopy(), function( $location_numbers, $seed ) use ( $pipeline ) {
            $location_numbers[] = $pipeline->process( $seed->get_number() );

            return $location_numbers;
        }, [] );

        dump( $location_numbers );
        // die;

        // Then find the lowest location number of the seeds and return it
        $result = min( $location_numbers );

        return (string) $result;
	}

	/**
	 * Solution for part 2
	 */
	public function part2(): string {
		$data = $this->get_data();
		dump( $data );

		return 'Part 2';
	}
}
