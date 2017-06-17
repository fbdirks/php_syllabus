<?php

Class Auto {
	private $gas;

	function __construct() {
		$this->gas = 0;
	}

	function gasgeven() {
		$this->gas++;
	}
	
	function gasis() {
		return $this->gas;
	}

	function noodstop() {
		$this->gas=0;
	}
}


?>