<?php

namespace App\Services;

use App\Exceptions\DatasetNotFoundException;

/**
 * Read a local file
 */
final class Reader {
	/**
	 * Return the content of a file properly formatted for the day
	 * 
	 * @param string $filename   The name of the file to get the data from
	 * @param int    $day_number The number of the day
	 * 
	 * @throws DatasetNotFoundException If the file is not found
	 * 
	 * @return array the content of the file as an array
	 */
	public static function get_data( string $filename, int $day_number ): array {
		if ( ! file_exists( $filename ) ) {
			throw new DatasetNotFoundException( sprintf( 'The provided "%s" dataset for day %d was not found.', $filename, $day_number ) );
		}
		
		$data = file_get_contents( $filename );
		$data = explode( "\n", $data );
		$data = array_map( 'trim', $data );
		$data = array_map(fn($line) => empty($line) ? null : $line, $data); // All empty lines are replaced by null value
		
		return $data;
	}
}