<?php

Class Color {
	
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	
	static $verbose = False;

	public function __construct( array $kwargs ) {

		if (array_key_exists('rgb', $kwargs ))
		{
			$this->red = intval($kwargs['rgb']) >> 16 & 255;
			$this->green = intval($kwargs['rgb']) >> 8 & 255;
			$this->blue = intval($kwargs['rgb']) & 255;
		}
		else
		{
			if (array_key_exists('red', $kwargs ))
			{
				$this->red = $kwargs['red'];
			}
			if (array_key_exists('green', $kwargs ))
			{
				$this->green = $kwargs['green'];
			}
			if (array_key_exists('blue', $kwargs ))
			{
				$this->blue = $kwargs['blue'];
			}
		}
		if (self::$verbose)
			printf ('Color( red: %3d, green: %3d, blue: %3d ) constructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
		return;
	}

	public function add(Color $color) {
			$arr = array ('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue);
			$new_color = new Color($arr);
			return $new_color;
		}

	public function sub(Color $color) {
		$arr = array ('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue);
		$new_color = new Color($arr);
		return $new_color;
	}

	public function mult($mult) {
		$arr = array ('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult);
		$new_color = new Color($arr);
		return $new_color;
	}

	public function __toString() {
		return sprintf ('Color( red: %3d, green: %3d, blue: %3d )', $this->red, $this->green, $this->blue);
	}


	public static function doc() {
		echo file_get_contents('./Color.doc.txt') . PHP_EOL;
	}

	function __destruct() {
		if (self::$verbose)
			printf ('Color( red: %3d, green: %3d, blue: %3d ) destructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
		return;
	}
}
?>