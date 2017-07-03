<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>29: Schrijven naar een csv bestand</h2>
<p>Het schrijven naar een bestand heeft veel weg van het lezen van een bestand, maar verschilt daar natuurlijk op een paar essentiele punten wel van:</p>
<p>Hieronder wordt het bestand voorbeeld2.csv geopend, maar dan voor schrijven ('toevoegen' eigenlijk). Ferry (rugnummer 22) wordt als reserve toegevoegd.</p>
<br>

<pre><code class="language-php">print "We voegen 'Ferry', rugnummer 22, als reserve toe.<br>";
print "We controleren niet of Ferry er al in staat, in het echt moet dat wel natuurlijk..<br><br>";

// het bestand wordt geopend, en de filepointer wordt aan het eind gezet. 
// we voegen dus iets toe aan het EIND van het bestand.
$bestand = fopen('voorbeeld2.csv','a');

// we maken een array aan met de gegevens van de nieuwe speler/
// Normaal gesproken gebruik je hier een webformulier voor.

$speler = array();

// de gegevens van de speler:
$speler['naam']="Ferry";
$speler['rugnummer']="22";
$speler['positie']="reserve";

// we schrijven naar het bestand toe:
// Het eerste argument is de handle naar de file.
// Het tweede argument is de array met de spelersgegevens.
// Het derde argument geeft het scheidingsteken aan.
$succes = fputcsv($bestand,$speler,";");

if ($succes) {
	print "Gelukt!";
} else {
	print "Niet gelukt...";
}

fclose($bestand);

// Op de volgende regels gaan we het bestand weer openen om te kijken
// of er ook werkelijk iets is toegevoegd...

$bestand=fopen('voorbeeld2.csv','r');

$rijteller = 1;

while ($rij=fgetcsv($bestand,1000,';')) {
	$speler = $rij[0];
	$rugnummer = $rij[1];
		
	print "$rijteller : $speler - $rugnummer<br>";
	$rijteller++;

}


fclose($bestand);</code></pre>

<br>
<p>Zie het commentaar bij de code.</p>
<p>Het grote voordeel van csv files is dat ze door Excel en een hele boel andere applicaties zo in te lezen zijn!</p>
<p>De commando's fgets en fputs werken net zo als fgetcsv en fputcsv, maar deze zijn op de <b>hele</b> regel georienteerd. fgets leest in een keer een regel uit het bestand in, maar verdeelt het niet in een array. Dat zou je dan zelf moeten doen met een commando als <i>explode</i>.</p>

<p>Opdracht: schrijf een inlogsysteem waarvoor gebruikers zich kunnen registreren die usernaam en wachtwoord bijhoudt in een users.csv bestand. Zorg ervoor dat dit bestand ook gebruikt wordt voor de controle van een inlog.</p>

<?php
include "voet.php";

?>