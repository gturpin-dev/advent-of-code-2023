<?php

namespace App\Solutions\Day1;

/**
 * The calibration document used to calibrate the device properly by the Elves
 */
final class CalibrationDocument {
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
     */
    public function get_sum_calibration_values() : int {
        $calibration_values = array_map( fn ( $line ) => $this->get_calibration_value( $line ), $this->calibration_values );
        $result             = array_sum( $calibration_values );

        return $result;
    }
}
