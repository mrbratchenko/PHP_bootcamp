<?php
class Tyrion extends Lannister {

	public function __construct() {
		return;
	}
	
	public function sleepWith($arg) {
		
		if ($arg instanceof Lannister)
		{
			print "Not even if I'm drunk !" . PHP_EOL;
		}
		else
		{
			print "Let's do this." . PHP_EOL;
		}
	}

	public function __destruct() {
		return;
	}
}
?>