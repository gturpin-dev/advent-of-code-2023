<?php

namespace App\Solutions\Day2;

use App\Solutions\Day2\ColorEnum;

final class CubeStack {

	public function __construct(
		private int $number,
		private ColorEnum $color,
	) {}

	/**
	 * Generate a CubeStack from a raw string
	 * the raw string is the following format:
	 * "<number> <cube color>" 
	 *
	 * @param string $raw_data
	 *
	 * @return self
	 */
	public static function from_raw( string $raw_data ): self {
		[ $number, $color ] = explode( ' ', $raw_data );

		return new self( (int) $number, ColorEnum::from( $color ) );
	}

	public function get_number(): int {
		return $this->number;
	}

	public function get_color(): ColorEnum {
		return $this->color;
	}
}