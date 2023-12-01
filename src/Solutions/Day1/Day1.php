<?php

namespace App\Solutions\Day1;

use App\Solutions\Day;

/**
 * The class to solve day 1
 * https://adventofcode.com/2023/day/1
 */
final class Day1 extends Day {
    /**
     * The day number
     */
    public static int $day = 1;

    /**
     * Solution for part 1
     */
    public function part1() : string {
        $data                 = $this->get_data();
        $calibration_document = new CalibrationDocument( $data );
        $result               = $calibration_document->get_sum_calibration_values();

        return (string) $result;
    }

    /**
     * Solution for part 2
     */
    public function part2() : string {
        $data                 = $this->get_data();
        $calibration_document = new CalibrationDocument( $data );
        $result               = $calibration_document->get_sum_calibration_values( true );

        return (string) $result;
    }
}
