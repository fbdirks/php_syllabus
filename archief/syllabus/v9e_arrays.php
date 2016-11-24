<?php

// we pakken weer een associatieve array:
$tennisteam=array( "captain"=>"jan", "speler1"=>"jan","speler2"=>"piet","speler3"=>"klaas");


$de_oude_rot = $tennisteam['speler2']; # hier WEL aanhalingstekens om een array index die geen getal is.
print "1 Onze captain is dit jaar: $tennisteam[captain] en niet $de_oude_rot."; # hier GEEN aanhalingstekens om een array index.
// Haal de commentaar slashes voor de onderstaande regels een voor een weg en kijk wat wel of niet werkt.
//print "2 Onze captain is dit jaar: $tennisteam['captain'] en niet $de_oude_rot."; # Zou dit goed gaan??
//print "3 Onze captain is dit jaar: $tennisteam["captain"] en niet $de_oude_rot."; # Dit gaat ZEKER niet goed. (BTW: waarom niet?)
//print "4 Onze captain is dit jaar: $tennisteam[\"captain\"] en niet $de_oude_rot."; # Dan maar escapen...

?>
