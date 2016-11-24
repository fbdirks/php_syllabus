<?php

$snelheid = 85;

if ($snelheid <=50) {
	print "U houdt zich aan de maximum snelheid";
} elseif (($snelheid >50) AND ($snelheid <80)) {
	print "U rijdt te hard en krijgt de bon thuis gestuurd.";
} else {
	print "U rijdt te hard, wordt onmiddelijk staande gehouden en bent uw rijbewijs kwijt.";
}

/*
	Goede gewoonte:  zet ( ) om ieder onderdeel van een vergelijking die zelfstandig true of false kan opleveren.
	
	AND mag je in PHP ook schrijven als &&
	OR mag je in PHP ook schrijven als ||
	NOT schrijf je in PHP altijd als !
*/

// Twee manieren om een 'niet gelijk zijn' te testen. 
$naam = "Jannes";
if (!($naam=="Jan")) {
	print "<br>U heet geen Jan!<br>";
}

if ($naam!="Jan") {
	print "Ook u heet geen Jan!<br>";
}

	