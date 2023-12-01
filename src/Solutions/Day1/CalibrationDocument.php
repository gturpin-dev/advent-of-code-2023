<?php

namespace App\Solutions\Day1;

/**
 * The calibration document used to calibrate the device properly by the Elves
 */
final class CalibrationDocument {
    /**
     * The spelled numbers and their digits values
     */
    protected const SPELLED_NUMBERS = [
        // superstrings first to replace them first
        'oneight'   => '18',
        'twone'     => '21',
        'threeight' => '38',
        'fiveight'  => '58',
        'sevenine'  => '79',
        'eightwo'   => '82',
        'eighthree' => '83',
        'nineight'  => '98',

        // default
        'one'   => '1',
        'two'   => '2',
        'three' => '3',
        'four'  => '4',
        'five'  => '5',
        'six'   => '6',
        'seven' => '7',
        'eight' => '8',
        'nine'  => '9',
    ];

    public function __construct(
        protected array $calibration_values = []
    ) {}

    /**
     * Get the calibration value from a line of the document
     *
     * @param string $line The line of the document
     */
    public function get_calibration_value( string $line ) : int {
        $digits            = str_split( $line );
        $digits            = array_filter( $digits, 'is_numeric' );
        $first_digit       = $digits[array_key_first( $digits ) ?? 0];
        $last_digit        = $digits[array_key_last( $digits ) ?? 0];
        $calibration_value = $first_digit . $last_digit;

        return (int) $calibration_value;
    }

    /**
     * Sum all the calibration values of the document
     *
     * @param bool $convert_spelled_numbers_to_digits Whether or not to convert spelled numbers to digits
     */
    public function get_sum_calibration_values( bool $convert_spelled_numbers_to_digits = false ) : int {
        $calibration_values = $this->calibration_values;

        if ( $convert_spelled_numbers_to_digits === true ) {
            $calibration_values = array_map( fn ( $line ) => $this->convert_spelled_numbers_to_digits( $line ), $calibration_values );
        }

        $calibration_values = array_map( fn ( $line ) => $this->get_calibration_value( $line ), $calibration_values );
        $result             = array_sum( $calibration_values );

        return $result;
    }

    /**
     * Convert any spelled number to its digit equivalent in a string from one to nine included
     *
     * @param string $line The line of the document
     */
    public function convert_spelled_numbers_to_digits( string $line ) : string {
		return strtr( $line, self::SPELLED_NUMBERS );
    }
}
