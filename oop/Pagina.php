<?php

/**
 * Pagina: 
 * Data & Functies die met een webpagina te maken hebben.
 *
 		Deze zeer simpele uitwerking heeft slechts de volgende methoden:
 		a. de constructor  ($voorbeeld = new Pagina("Mijn titel","mijncss.css")
 			 waarmee een nieuwe pagina 'gemaakt wordt'. De twee parameters zijn:
 			 - titel van de pagina
 			 - (volledige) naam van het stylesheet
 		b. head() -> zet de kopinformatie op de pagina.
 		c. bodystart() -> start het body gedeelte van de pagina
 		d. voet() -> zet de voet informatie op de pagina.
 
 
 */

class Pagina {
    
    private $titel;
    private $stylesheet;
    
    function __construct($title="Webpagina",$stylesheet="geen") {
    	$this->titel=$title;
    	$this->stylesheet=$stylesheet;
    }
    
    
    function head() {
    	// plaatst de kop met een verwijzing naar een stylesheet en een titel.
    	$p = "<html>";
    	$p .= "<head>";
    	$p .= "<title>".$this->titel."</title>";
    	if ($this->stylesheet != "geen") {
    		$p .= "<link rel=\"stylesheet\" href=\"".$this->stylesheet."\" type=\"text/css\" media=\"all\">";
    	}
    	$p .= "</head>";
    	print "$p";
    }
    
    function bodystart() {
    	print "<body>";
    }
    
    function voet() {
    	print "<hr>";
    	print "<h6 align=\"center\">&copy;".date("Y")." Ogol industries</h6>";
    	print "</body>";
    	print "</html>";
    }
}

?>