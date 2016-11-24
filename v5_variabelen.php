<?php

// Variabelen

$opbrengst = 20000;
$kosten = 12000;
$bedrijf = "Ogol Industries ltd";

// rekenen
$_winst = $opbrengst - $kosten;


// rapporteren
print "De winst van $bedrijf is $_winst (= $opbrengst - $kosten)<br>";

$bedrijf = ""; # we maken de naam van het bedrijf leeg...
$opbrengst = 0; # we zetten de opbrengst op 0..

$_winst = $opbrengst - $kosten; # de formule verandert niet, de winst wel!!
print "De winst van $bedrijf is $_winst (= $opbrengst - $kosten)<br>"; # dezelfde regel als hierboven!!
// Hoewel we niets aan de variabelen veranderen print de volgende regel toch niet goed uit. Waarom niet?
print "De winst van $bedrijf is $_winst (= $Opbrengst - $Kosten)<br>"; # Let op de Hoofdletters bij Opbrengst en Kosten!!
print 'In $bedrijf zit nu niets meer:';
print " Kijk maar: $bedrijf =  <- daar had een bedrijfsnaam moeten staan...";
?>
