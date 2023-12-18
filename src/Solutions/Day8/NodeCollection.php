<?php

namespace App\Solutions\Day8;

final class NodeCollection {
    public function __construct(
        /**
         * @var array<Node>
         */
        protected array $nodes,
    ) {
        $this->nodes = array_combine( array_map( fn( $node ) => $node->get_value(), $nodes ), $nodes );
    }

    public function get_first_node(): ?Node {
        return $this->nodes[array_key_first( $this->nodes ) ?? 0] ?? null;
    }

    /**
     * Retrieve a node value from a current node_value and an instruction
     *
     * @param string $current_node_value The current node value
     * @param Instruction $instruction The instruction to apply
     */
    public function get_node_value( string $current_node_value, Instruction $instruction ): ?string {
        $node = $this->get_node( $current_node_value );

        return match ( $instruction ) {
            Instruction::LEFT  => $node?->get_left_value(),
            Instruction::RIGHT => $node?->get_right_value(),
        };
    }

    /**
     * Get a Node from the collection
     *
     * @param string $node_value The node value
     */
    public function get_node( string $node_value ): ?Node {
        return $this->nodes[$node_value] ?? null;
    }
}
