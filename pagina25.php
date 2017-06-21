<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>25. Abstracte Klassen en Interfaces</h2>
<p>Stel je voor dat je een besturingssysteem schrijft en dat je wilt afdwingen dat printerfabrikanten bij het schrijven van hun printerdrivers een bepaald klasse model hanteren met precies die eigenschappen en methoden die jij wilt zien. Je kunt dit bereiken door een Abstracte Klasse te schrijven. Hierin noteer je alle eigenschappen en methoden die je (minimaal) toe wilt staan:
</p>

<pre><code class="language-php">abstract class Printer { 
	Abstract Protected $type; 
	Abstract Protected $fabrikant; 
	Abstract Protected $keer;

	Abstract Public PrintDocument($file); 
	Abstract Public FoutMelding($melding);

	// moet wel overgenomen worden
	Abstract Public AantalKerenGebruikt() { 
		Print "$this->keer gebruikt.";
	}
	
	// hoeft niet overgenomen te worden
	Public PrintType() {
		Print "Dit is $this->type";
	}
}</code></pre>


<p>Het verschil met andere klassen is, behalve de aanduiding Abstract voor Class dat in sommige methoden geen code staat. Op het moment dat een fabrikant op basis van deze klasse een printerdriver schrijft moet hij de code voor die functies aanvullen. Een klasse die gebaseerd is op een abstracte klasse moet alle abstracte methoden ingevuld hebben.</p>
<p>Bij een Interface ga je nog een klein stapje verder. Een interface bevat helemaal geen code meer, maar echt alleen de namen (en parameters) van methoden die een klasse die gebaseerd is op deze interface (minimaal) moet gaan invullen.</p>
<p>Abstracte Klassen en Interfaces zijn dus bij uitstek hulpmiddelen om bij andere programmeurs af te dwingen dat klassendefinities aan bepaalde eisen voldoen.</p>
<p>
<i>Voorbeeldje:</i><br>
Stel je wilt een klasse Gebruikers gaan bouwen op basis van de abstracte interfaces contacten en users. De interface Contacten beschrijft de algemene architectuur van alle 'contacten' die een bedrijf heeft met anderen, de interface Users beschrijft de algemene architectuur van alles wat netwerkusers van het bedrijf moeten kunnen. De klasse gebruikers is een soort samenstelling van die twee. Je wilt van gebruikers de naam kunnen noteren en het email adres, maar je wilt ook dat ze kunnen inloggen en dat hun inloggegevens kunnen worden gecheckt. Door de klasse Gebruikers te baseren op de interfaces Contacten en Users wordt je gedwongen om in de klasse definitie van gebruikers alle dingen in te vullen die volgens de interfaces horen bij de rollen Contacten en Users.
</p>
<p>Zoiets werkt natuurlijk alleen goed als de interfaces zelf zorgvuldig overdacht zijn!</p>
<pre><code class="language-php">
interface Contacten	{
	// Alleen functienamen, GEEN CODE
	function zetNaam($naam); 
	function getNaam(); 
	function zetEmail($adres); 
	function getEmail();
}

interface Users	{
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

}</code></pre>



<?php
include "voet.php";

?>