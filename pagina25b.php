Interface Contacten	{
	// Alleen functienamen, GEEN CODE
	function zetNaam($naam); 
	function getNaam(); 
	function zetEmail($adres); 
	function getEmail();
}

Interface Users	{
	// Alleen functienamen, GEEN CODE
	function checkWachtwoord($ww); 
	function checkType($type);
}

class Gebruikers implements Contacten, Users {

	// moet dus WEL code bevatten die de volgende functies defini&euml;ren: 
	
	function zetNaam($naam) {
			$this->zetNaam = $naam;
	}
	
	function getNaam() {
			return $this->naam;
	}

	// enzovoorts, in ieder geval ook code voor zetEmail en getEmail!!
	// en checkWachtwoord en checkType!!

}
