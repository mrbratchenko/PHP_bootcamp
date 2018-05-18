<?php
class UnholyFactory {

	private $_arr = array();

	public function __construct() {
		return;
	}

	public function absorb($name) {

		if (!$name instanceof Fighter)
		{
			print ("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			return;
		}
		if (!in_array($name, $this->_arr))
		{
			print ("(Factory absorbed a fighter of type " . $name->peremennaja . ")" . PHP_EOL);
			array_push($this->_arr, $name);
		}
		if (in_array($name, $this->_arr))
		{
			print ("(Factory already absorbed a fighter of type " . $name->peremennaja . ")" . PHP_EOL);
		}
	}


	public function fabricate($name) {

		foreach ($this->_arr as $fighter) 
		{
			print ("(Factory fabricates a fighter of type " . $name . ")" . PHP_EOL);
			$curClass = get_class($fighter);
			$newFighter = new $curClass();
			
		}
		return $newFighter;
		
	}

	public function __destruct() {
		return;
	}
}
?>