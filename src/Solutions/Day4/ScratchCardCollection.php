<?php

namespace App\Solutions\Day4;

/**
 * Modelize a collection of scratch cards
 */
final class ScratchCardCollection {

    /**
     * The instances count for each card
     *
     * @var array<int, int> The card id => instances count
     */
    protected array $instances_count = [];

    public function __construct(
        /**
         * The cards
         *
         * @var array<ScratchCard>
         */
        protected array $cards,
    ) {}

    /**
     * Process the scratch cards to get other cards instances
     *
     * @return void
     */
    public function process(): void {
        // set card ids as keys
        $this->cards = array_combine( array_map( fn( $card ) => $card->get_id(), $this->cards ), $this->cards );

        // Init the stock with original cards
        $this->instances_count = array_fill_keys( array_keys( $this->cards ), 1 );

        foreach ( $this->cards as $card ) {
            $this->process_card( $card );
        }
    }

    /**
     * Process a unique card to get other cards instances
     *
     * @param ScratchCard $card The card to process
     *
     * @return void
     */
    protected function process_card( ScratchCard $card ): void {
        // Search in the stock how many instances of the card we have
        $instance_count        = $this->instances_count[ $card->get_id() ] ?? 0;
        $winning_numbers_count = count( $card->get_winning_numbers() );

        // If we have winning numbers, we create copies of cards below the current
        for ( $i = $card->get_id() + 1; $i <= $card->get_id() + $winning_numbers_count; $i++ ) {
            // Increment the stock with the right amount of cards
            $this->instances_count[ $i ] = ( $this->instances_count[ $i ] ?? 0 ) + $instance_count;
        }
    }

    /**
     * Sum the total instances found for all cards
     *
     * @return integer
     */
    public function get_total_instances(): int {
        return array_sum( $this->instances_count );
    }
}
