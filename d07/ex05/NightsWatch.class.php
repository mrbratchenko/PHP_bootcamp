<?php
class NightsWatch implements IFighter {

	private $_arr = array();

	public function __construct() {
		return;
	}

	public function recruit($name) {
		$this->_arr[] = $name;
	}

	public function fight() {

		foreach ($this->_arr as $recruit) 
		{
			if (in_array('IFighter', class_implements($recruit)))
			{
				$recruit->fight();
			}	
		}
	}

	public function __destruct() {
		return;
	}
}
?>