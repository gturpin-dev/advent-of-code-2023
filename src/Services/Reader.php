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
     * @param  string $filename   The name of the file to get the data from
     * @param  int    $day_number The number of the day
     * @return array  the content of the file as an array
     *
     * @throws DatasetNotFoundException If the file is not found
     */
    public static function get_data( string $filename, int $day_number ) : array {
        if ( ! file_exists( $filename ) ) {
            throw new DatasetNotFoundException( sprintf( 'The provided "%s" dataset for day %d was not found.', $filename, $day_number ) );
        }

        $data = file_get_contents( $filename );
        $data = explode( "\n", $data );
        $data = array_map( 'trim', $data );
        $data = array_map( fn ( $line ) => empty( $line ) ? null : $line, $data ); // All empty lines are replaced by null value

        return $data;
    }

    /**
     * Parse an array of data into chunks
     * A chunk is an array of lines
     * Each chunk are separated by a null value in the data array
     *
     * @param array<?string> $data The data to parse
     * @return array<array>> The parsed chunk data
     */
    public static function parse_chunks( array $data ) : array {
        $chunks = array_reduce( $data, function ( $chunks, $item ) {
            if ( ! is_null( $item ) ) {
                $chunks[array_key_last( $chunks )][] = $item;
            } else {
                $chunks[] = [];
            }

            return $chunks;
        }, [] );

        // Ensure to reorder the keys if the first line is not null
        return array_values( $chunks );
    }
}
