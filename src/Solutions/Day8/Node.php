<?php

namespace App\Solutions\Day8;

/**
 * Modelize a node of the network
 */
final class Node {
    public function __construct(
        protected readonly string $value,
        protected readonly string $left_value,
        protected readonly string $right_value,
    ) {}

    /**
     * Get the value of the node
     *
     * @param string $raw_data
     *
     * @return Node
     */
    public static function from_raw( string $raw_data ): Node {
        [$node_value, $right_part]  = explode( ' = ', $raw_data );
        $right_part                 = trim( $right_part, '()' );
        [$left_value, $right_value] = explode( ', ', $right_part );

        return new self( $node_value, $left_value, $right_value );
    }

    /**
     * Get the value of the node
     *
     * @return string
     */
    public function get_value(): string {
        return $this->value;
    }

    /**
     * Get the value of the left node
     *
     * @return string
     */
    public function get_left_value(): string {
        return $this->left_value;
    }

    /**
     * Get the value of the right node
     *
     * @return string
     */
    public function get_right_value(): string {
        return $this->right_value;
    }
}
