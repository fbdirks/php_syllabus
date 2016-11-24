<?php

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

?>