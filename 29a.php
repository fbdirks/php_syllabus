<?php

print "We voegen 'Ferry', rugnummer 22, als reserve toe.<br>";
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


fclose($bestand);

?>