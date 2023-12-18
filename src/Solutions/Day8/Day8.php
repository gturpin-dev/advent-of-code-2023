<?php

namespace App\Solutions\Day8;

use App\Solutions\Day;

/**
 * The class to solve day 8
 * https://adventofcode.com/2023/day/8
 */
final class Day8 extends Day {
    /**
     * The day number
     */
    public static int $day = 8;

    /**
     * Solution for part 1
     */
    public function part1() : string {
        $data         = $this->get_data();
        $data         = array_filter( $data );                                                                   // remove null values
        $instructions = array_shift( $data );
        $instructions = str_split( $instructions );
        $instructions = array_map( fn ( $instruction ) => Instruction::tryFrom( $instruction ), $instructions );

        $nodes           = array_map( fn ( $node ) => Node::from_raw( $node ), $data );
        $node_collection = new NodeCollection( $nodes );
        $node_value      = $node_collection->get_node( 'AAA' ); // Always start at AAA
        $node_value      = $node_value?->get_value();

        // Perform the instructions
        $step = 0;
        while ( $node_value !== 'ZZZ' ) {
            $instruction    = array_shift( $instructions );
            $instructions[] = $instruction;
            $node_value     = $node_collection->get_node_value( $node_value ?? '', $instruction );
            $step++;
        }

        return (string) $step;
    }

    /**
     * Solution for part 2
     */
    public function part2() : string {
        self::$DATASET = self::DATA_SAMPLE_PART2;
        $data          = $this->get_data();
        dump( $data );

        return 'Part 2';
    }
}
