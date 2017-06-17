<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>12. Functies</h2>
<p>Functies zijn taken die willekeurig vaak door de hoofdcode kunnen worden uitgevoerd maar die op &eacute;&eacute;n plek buiten de hoofdcode geprogrammeerd en onderhouden worden.</p>
<p>Voor de programmeur kunnen functies lijken op een soort zwarte doos waar je wat gegevens in stopt en die het passende antwoord daarop geeft. Een voorbeeld is het <b>sqrt</b> commando dat de wortel van een getal oplevert. Als je deze programmaregel schrijft: $wortel = sqrt(144); zal in de variabele $wortel 12 worden gestopt.</p>
<p>PHP heeft duizenden eigen, ingebouwde functies. Op <a href="http://nl1.php.net/manual/en/funcref.php" target="_new">PHP.net</a> kun je naar die functies zoeken en de documentatie ervan raadplegen.</p>
<p>Als voorbeeld kijken we even naar wiskundige functies zoals sqrt. Als je in de zoekbalk van PHP.net het woord <b>Math</b> intikt vind je al gauw de verwijzing naar de <i>Mathematical Exensions</i> van PHP. [<a href="http://nl1.php.net/manual/en/book.math.php" target="_blank">link</a>]. Op de startpagina van die extensies vind je allerlei wiskundige functies, zoals sqrt.  Klik je door op zo'n functie dan kom je bij de documentatie van die functies. </p>
<p>Bij die documentatie moet je letten op de volgende zaken:
	<ul>
		<li>Welke gegevens moet je aan de functie meegeven zodat deze zijn werk kan doen?</li>
		<li>Wat voor gegevens geeft de functie terug?</li>
		<li>Hoe gebruik je de functie? (Voorbeelden)</li>
	</ul>
Al deze dingen (en meer) vind je in de de documentatie. In de paragraaf <b>Description</b> kun je dit lezen:</p>
<p><img src="sqrt2.PNG" > </p>
<p>Bij de <span style="color: red">1</span> staat wat de functie teruggeeft, dat is in dit geval een <i>float</i>. Een float betekent een kommagetal. Andere mogelijkheden zijn o.a. <i>int</i> (een getal zonder een komma) en <i>string</i> (een reeks tekens).</p>
<p>Bij de <span style="color: red">2</span> staat wat de functie nodig heeft, de <i>parameters</i>. In dit geval is dat er &eacute;&eacute;n van het type float, een getal dus.</p>
<p>Als je naar onderen scrollt vind je de <b>Examples</b>:</p>
<p><img src="examples.PNG"></p>

<p>In het onderstaande voorbeeld zie je een paar (en zeker niet alle) mogelijkheden van een ander PHP commando, het Date commando.</p>
<?php
toon_file("v12_date.php");
?>

<?php
include "voet.php";

?>