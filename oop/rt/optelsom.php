<?php

include "debug.php";

// insluiten objectdefinitie
include_once("optelling.php");

toon_basenaam();
toon_lijst($_POST);


// objecten maken en aan het werk zetten.
$opgaveA = new optelling("A");
$opgaveB = new optelling("B");
$opgaveC = new optelling("C");

$somA = $opgaveA->rapporteer();
$somB = $opgaveB->rapporteer();
$somC = $opgaveC->rapporteer();

print "Maak de volgende optellingen:<br>";
print "A: $somA[g1] + $somA[g2] =  ?   ($somA[is])<br>";
print "B: $somB[g1] + $somB[g2] =  ?   ($somB[is])<br>";
print "C: $somC[g1] + $somC[g2] =  ?   ($somC[is])<br>";


print "Ter controle: de basenaam van somA is: ".$opgaveA->rapporteer_basenaam()."<br>";
print "En <i>deze</i> file is: ".basename($_SERVER["SCRIPT_FILENAME"]);

?>
