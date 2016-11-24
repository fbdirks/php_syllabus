<?php

// simpel aanmaken van een array
$dagen_van_de_week = array("zondag","maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag");

// Opvragen van de maandag:
$eerste_werkdag = $dagen_van_de_week[1]; # Let er op dat arrays bij 0 beginnen te tellen!!
$eerste_weekenddag = $dagen_van_de_week[6];

print "De eerste werkdag is een $eerste_werkdag, en het weekend begint op $eerste_weekenddag.<br>";

// een voorbeeld van een toewijzing van een associatieve array.
$tennisteam=array( "captain"=>"jan", "speler1"=>"jan","speler2"=>"piet","speler3"=>"klaas");

// een super handig debug commando dat precies kan laten zien hoe een array er uit ziet is: print_r().
// Je kunt dit bijvoorbeeld goed toepassen om te kijken wat nu precies met $_POST of $_REQUEST meekomt. 
// Gebruik dan deze code:

print "<pre>";# de <pre> tag is puur kosmetisch. Als je hem weglaat werkt het ook, maar MET de pre tag is het overzichtelijker.
print_r($tennisteam);
print "</pre>";

// Een paar handige array commando's:
$lengte = count($tennisteam);
print "Ons team bestaat uit $lengte spelers.<br>";

// Een prachtige manier om door een array heen te lopen:
foreach($tennisteam as $speler => $naam) {
	print "$speler : $naam <br>";
}

print "<br>De dagen van de week zijn:<br>";
foreach($dagen_van_de_week as $dag) {
	print "$dag <br>";
}

asort($dagen_van_de_week);
print "<br>en als we de dagen alfabetisch sorteren met <i>asort</i>:<br>";
foreach($dagen_van_de_week as $nummer => $dag) {
	print "$nummer $dag <br>";
}
print "Merk op dat dit sorteer commando de indexen in stand laat. Er zijn ook sorteercommando's die de indexen opnieuw toewijzen:<br>";
sort($dagen_van_de_week);
print "<i>sort</i> bijvoorbeeld<br>";
foreach($dagen_van_de_week as $nummer => $dag) {
	print "$nummer $dag <br>";
}

print "<br>Laten we drastisch doen: we schaffen 'woensdag' af en sorteren opnieuw.<br>";
unset($dagen_van_de_week[4]);
sort($dagen_van_de_week); # kijk maar eens wat er gebeurt als je deze regel weglaat.
foreach($dagen_van_de_week as $nummer => $dag) {
	print "$nummer $dag <br>";
}