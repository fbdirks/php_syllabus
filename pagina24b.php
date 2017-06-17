Class Poll {
	Private $vraag ; 
	Protected $antwoord;
	
	// en de rest van de code..

}

Class PollDatabase extends Poll {
 
	// .... 
 
	// dit gaat niet werken!
	Function zetVraag($v) {
		$this->vraag = $v;
	}
	
	// dit gaat wel werken!
	Function zetAntwoord($a) {
		$this->antwoord = $a;
	}
	
	// ...
}
