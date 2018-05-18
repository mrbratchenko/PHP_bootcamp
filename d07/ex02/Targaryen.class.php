<?php
class Targaryen {

	public function __construct() {
		return;
	}

	public function resistsFire(){
		return False;
	}

	public function getBurned() {
		if (!$this->resistsFire())
			return "burns alive";
		else
			return "emerges naked but unharmed";
	}

	public function __destruct() {
		return;
	}
}
?>