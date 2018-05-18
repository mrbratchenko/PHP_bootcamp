<?php

Class Vertex {
	
	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 1.00;

	private $_col = 0;

	static $verbose = False;

	public function __construct( array $kwargs ) {

		if (array_key_exists('w', $kwargs ))
		{
			$this->_w = $kwargs['w'];
		}
		if (array_key_exists('color', $kwargs ))
		{
			$this->_col = $kwargs['color'];
		}
		else
		{
			$arr = array ('red' => 255, 'green' => 255, 'blue' => 255);
			$this->_col = new Color($arr);
		}
		if (array_key_exists('x', $kwargs ))
		{
			$this->_x = $kwargs['x'];
		}
		if (array_key_exists('y', $kwargs ))
		{
			$this->_y = $kwargs['y'];
		}
		if (array_key_exists('z', $kwargs ))
		{
			$this->_z = $kwargs['z'];
		}
		if (self::$verbose)
			printf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed'. PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_col);
			
	
		return;
	}

	public function __toString() {
		if (self::$verbose)
			return sprintf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', $this->_x, $this->_y, $this->_z, $this->_w, $this->_col);
		else
			return sprintf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public static function doc() {
		echo file_get_contents('./Vertex.doc.txt') . PHP_EOL;
	}

	public function __get($att) {
		if ($att == 'x'){
			return $this->_x;
		}
		else if ($att == 'y') {
			return $this->_y;
		}
		else if ($att == 'z') {
			return $this->_z;
		}
		else if ($att == 'w') {
			return $this->_w;
		}
		else {
			return $this->_col;
		}


	}

	public function __set($att, $value) {
		if ($att == 'x'){
			$this->_x = $value;
		}
		else if ($att == 'y') {
			$this->_y = $value;
		}
		else if ($att == 'z') {
			$this->_z = $value;
		}
		else if ($att == 'w') {
			$this->_w = $value;
		}
		else {
			$this->_col = $value;
		}
	}
	function __destruct() {
		if (self::$verbose)
			printf ('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed'. PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_col);
		return;
	}
}
?>