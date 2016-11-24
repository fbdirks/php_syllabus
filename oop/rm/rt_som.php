<?php

class rt_som {
	
	private $getal1;
	private $getal2;
	private $uitkomst;
	private $niveau;
	private $ondergrens;
	private $bovengrens;
	private $bewerkingen;
	private $bewerking; // Lokaal houden??
	
	function __construct($n="A")  {
		$this->niveau = $n;
		
		if ($this->niveau=="A") {
			$this->bewerkingen="+-+-";
			$this->ondergrens = 1;
			$this->bovengrens = 100;
		} elseif ($this->niveau=="B") {
			$this->bewerkingen="+-*/";
			$this->ondergrens = 1;
			$this->bovengrens = 100;
		} else {
			$this->bewerkingen = "+-*/";
			$this->ondergrens = 1;
			$this->bovengrens = 500;
		}
	}
	
	function muntje() {
		// belangrijk genoeg voor eigen functie??
		return rand(0,1);
	}
	
	function genereerSom() {
		// selecteer bewerking
		$n = rand(0,3);
		$this->bewerking = $this->bewerkingen[$n];
		// genereer getallen
		switch($this->bewerking) {
			case "+":
				$this->genereer_plus();
				break;
			case "-":
				$this->genereer_min();
				break;
			case "*":
				$this->genereer_keer();
				break;
			case "/":
				$this->genereer_deel();
				break;			
		}
		$resultaat = array();
		$resultaat['getal1']= $this->getal1;
		$resultaat['getal2']= $this->getal2;
		$resultaat['bewerking']=$this->bewerking;
		$resultaat['uitkomst']=$this->uitkomst;
		return $resultaat;
	}
	
	function genereer_plus() {
		// $uitkomst tijdelijke variabele ipv de this versie?
		$this->uitkomst = 2 * $this->bovengrens;
		while ($this->uitkomst > $this->bovengrens) {
			$this->getal1 = rand($this->ondergrens,$this->bovengrens);
			$this->getal2 = rand($this->ondergrens,$this->bovengrens);
			$this->uitkomst = $this->getal1 + $this->getal2;
			if ($this->uitkomst < 0) $this->uitkomst = 2 * $this->bovengrens;
		}
	}
	
	// min reserved woord, kijk uit.
	function genereer_min() {
		// $uitkomst tijdelijke variabele ipv de this versie?
		$this->uitkomst = 2 * $this->bovengrens;
		while ($this->uitkomst > $this->bovengrens) {
			$this->getal1 = rand($this->ondergrens,$this->bovengrens);
			$this->getal2 = rand($this->ondergrens,$this->bovengrens);
			$this->verwissel();
			$this->uitkomst = $this->getal1 - $this->getal2;
			if ($this->uitkomst < 0) $this->uitkomst = 2 * $this->bovengrens; // overbodig ivm verwissel??
		}
	}
	
	function genereer_keer() {
		// $uitkomst tijdelijke variabele ipv de this versie?
		$this->uitkomst = 2 * $this->bovengrens;
		while ($this->uitkomst > $this->bovengrens) {
			$this->getal1 = rand($this->ondergrens,$this->bovengrens);
			$this->getal2 = rand($this->ondergrens,$this->bovengrens);
			$this->uitkomst = $this->getal1 * $this->getal2;
			if ($this->uitkomst < 0) $this->uitkomst = 2 * $this->bovengrens; // overbodig?
		}
	}
		
	
	// DEZE IS NOG FOUT, $GETAL1 en $RESULTAAT mixen!!! ONGEWILD
	function genereer_deel() {
		// hier andersom denken: eerst vermenigvuldigen en dan uitkomst tot getal1 bombarderen
		$this->uitkomst = 2 * $this->bovengrens;
		while ($this->uitkomst > $this->bovengrens) {
			$this->getal1 = rand($this->ondergrens,$this->bovengrens);
			$this->getal2 = rand($this->ondergrens,$this->bovengrens);
			$this->verwissel();
			$this->uitkomst = $this->getal1 * $this->getal2; # getal 1 is de grotere van de twee
			if ($this->uitkomst < 0) $this->uitkomst = 2 * $this->bovengrens; // overbodig?
		}
		$temp = $this->getal1;
		$this->getal1 = $this->uitkomst;
		$this->uitkomst = $temp;
		// 
	}
	
	function verwissel() {
		// alleen verwisselen als getal2 > getal1
		if ($this->getal2 > $this->getal1) {
			$temp = $this->getal1;
			$this->getal1 = $this->getal2;
			$this->getal2 = $temp;
		}
	}
	
	
	
	}


/* test */
$niveau="C";
$s = new rt_som("C");
$som = $s->genereerSom();
print "$som[getal1] $som[bewerking] $som[getal2] = $som[uitkomst]";



?>