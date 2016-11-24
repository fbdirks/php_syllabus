<?php

class Poll {
	// als je hier private ipv protected gebruikt zal de subklasse deze attributen niet kunnen zetten!!!
	protected $vraag = "";
	protected $antwoord1 = "" ;
  	protected $antwoord2 = "" ;
	protected $antwoord3 = "" ;
	protected $antwoord4 = "" ;
	protected $gestemd1 = 0;
	protected $gestemd2 = 0;
	protected $gestemd3 = 0;
	protected $gestemd4 = 0;
	protected $aantalStemmen = 0;
	protected $id = "" ;
	

    function __construct() {
        	// eventuele initialisatie opdrachten
	 }
	 
	 function zetVraag ($vraag) {
			$this->vraag = $vraag;
		}

	 function zetAntwoord($nr, $antwoord) {
			if ($nr == 1) { $this->antwoord1 = $antwoord; }
			if ($nr == 2) { $this->antwoord2 = $antwoord; }
			if ($nr == 3) { $this->antwoord3 = $antwoord; }
			if ($nr == 4) { $this->antwoord4 = $antwoord; }
	}
	
	function zetId($id) {
		$this->id = $id;
	}
    
    function getId() {
    	return $this->id;
    }
	 
	function toon() {
			// regel vormgeving via css (let op de id: poll
			$id = $this->id;
			print "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
			print "<table id=\"poll\"><tr><td>$this->vraag</td></tr>";
			print "<tr><td><input type=\"radio\" name=\"antwoord\" value=\"1\" class=\"$id-1\">$this->antwoord1</td></tr>";
			print "<tr><td><input type=\"radio\" name=\"antwoord\" value=\"2\" class=\"$id-2\">$this->antwoord2</td></tr>";
			print "<tr><td><input type=\"radio\" name=\"antwoord\" value=\"3\" class=\"$id-3\">$this->antwoord3</td></tr>";
			print "<tr><td><input type=\"radio\" name=\"antwoord\" value=\"4\" class=\"$id-4\">$this->antwoord4</td></tr>";
			print "<tr><td><input type=\"submit\" name=\"Stemmen\" value=\"Stem\"><input type=\"submit\" name=\"Resultaten\" value=\"Resultaten\">";
			print "<input type=\"hidden\" name=\"id\" value=\"$this->id\"></td></tr>";
			print "</table>";
			print "</form>";
	}
	
	function verwerkStem() {
		if ((isset($_POST[Stemmen]))&&($_POST[id]==$this->id)) {
			$gestemd = false; # als $gestemd false blijft is er blanco gestemd en wordt het aantal stemmen niet verhoogd. [Keuze]
			if ($_POST[antwoord] == 1) { 
				$this->gestemd1++; 
				$gestemd = true;
				} 
			if ($_POST[antwoord] == 2) { 
				$this->gestemd2++; 
				$gestemd = true;
				}
			if ($_POST[antwoord] == 3) { 
				$this->gestemd3++; 
				$gestemd = true;
				}
			if ($_POST[antwoord] == 4) { 
				$this->gestemd4++;
				$gestemd = true; 
				}
			if ($gestemd) { $this->aantalStemmen++; }
	
		} elseif (isset($_POST[Resultaten])) {
				 $this->resultaten();
		}
	} 
	
	function resultaten() {
			// toont per vraag het aantal op de vraag uitgebrachte stemmen + het totaal aantal stemmen	
			print "<div class=\"resultaat\">";
			print "<span class=\"vraag\">$this->vraag</span><br />";
			print "$this->antwoord1 : $this->gestemd1 <br />";
			print "$this->antwoord2 : $this->gestemd2 <br />";
			print "$this->antwoord3 : $this->gestemd3 <br />";
			print "$this->antwoord4 : $this->gestemd4 <br />";
			print "Totaal aantal stemmen: $this->aantalStemmen<br />";
			print "</div>";
		
	}
	
	
	function relatieve_resultaten($id) {
			// toont de percentages van de op een vraag uitgebrachte stemmen
			print "<div class=\"resultaat\">";
			print "<span class=\"vraag\">$this->vraag</span><br />";
			if ($this->aantalStemmen > 0) { 
					$procent1 = (int) ($this->gestemd1/$this->aantalStemmen * 100);
					$procent2 = (int) ($this->gestemd2/$this->aantalStemmen * 100);
					$procent3 = (int) ($this->gestemd3/$this->aantalStemmen * 100);
					$procent4 = (int) ($this->gestemd4/$this->aantalStemmen * 100);
			} else {
					$procent1 = "0";
					$procent2 = "0";
					$procent3 = "0";
					$procent4 = "0";
			}
			print "<table>";
			print "<tr><td>$this->antwoord1 : $procent1 % ($this->gestemd1 stemmen)</td><td><progress max=\"100\" value=\"$procent1\" ></progress></td></tr>";
			print "<tr><td>$this->antwoord2 : $procent2 % ($this->gestemd2 stemmen)</td><td><progress max=\"100\" value=\"$procent2\"></progress></td></tr>";
			print "<tr><td>$this->antwoord3 : $procent3 % ($this->gestemd3 stemmen)</td><td><progress max=\"100\" value=\"$procent3\"></progress></td></tr>";
			print "<tr><td>$this->antwoord4 : $procent4 % ($this->gestemd4 stemmen)</td><td><progress max=\"100\" value=\"$procent4\"></progress></td></tr>";
			print "</table>";
			print "Totaal aantal stemmen: $this->aantalStemmen<br />";
			print "</div>";
		
	} 
		
		
		function test() {
			print "<pre>";
			print_r($this);
			print "</pre>";
		}
		
		
	
		
		
}


?>
