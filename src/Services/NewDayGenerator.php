<?php

namespace App\Services;

/**
 * This class will generate the files for a new day
 */
final class NewDayGenerator {
    /**
     * Generate the files for a new day
     *
     * @param int $day_number The number of the day to generate
     */
    public static function generate( int $day_number ) : void {
        $root_dir = dirname( __DIR__, 2 );

        // Create the data directory
        self::maybe_mkdir( $root_dir . '/data/day' . $day_number );
        self::create_file( $root_dir . '/data/day' . $day_number . '/sample_part1.txt' );
        self::create_file( $root_dir . '/data/day' . $day_number . '/sample_part2.txt' );
        self::create_file( $root_dir . '/data/day' . $day_number . '/input_part1.txt' );
        self::create_file( $root_dir . '/data/day' . $day_number . '/input_part2.txt' );

        // Create the solution directory
        $solution_stub = self::get_solution_stub();
        $solution_stub = preg_replace( '/\bDummyDayNumber\b/', (string) $day_number, $solution_stub );
        $solution_stub = preg_replace( '/\bDayDummyDayNumber\b/', 'Day' . $day_number, $solution_stub );
        self::maybe_mkdir( $root_dir . '/src/Solutions/Day' . $day_number );
        self::create_file( $root_dir . '/src/Solutions/Day' . $day_number . '/Day' . $day_number . '.php', $solution_stub );
    }

    /**
     * Create a file if it does not exist
     *
     * @param string $filename The name of the file to create
     * @param string $content  The content of the file
     */
    protected static function create_file( string $filename, string $content = '' ) : void {
        if ( ! file_exists( $filename ) ) {
            file_put_contents( $filename, $content );
        }
    }

    /**
     * Create a directory if it does not exist
     *
     * @param string $dirname The name of the directory to create
     */
    protected static function maybe_mkdir( string $dirname ) : void {
        if ( ! file_exists( $dirname ) ) {
            mkdir( $dirname );
        }
    }

    /**
     * Get the stub for the solution file
     */
    protected static function get_solution_stub() : string {
        // Get content of the Day.stub
        $stub = file_get_contents( dirname( __DIR__, 2 ) . '/src/stubs/Day.stub' );

        return $stub;
    }
}
