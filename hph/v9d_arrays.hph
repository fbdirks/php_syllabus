<?php

$dagen_van_de_week = array("zondag","maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag");

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