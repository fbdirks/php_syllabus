<?php

// Een klassieke while loop:

$aantal = 10;

while ($aantal>0) {
	echo "$aantal .. ";
	$aantal--; # wat gebeurt er als je deze regel 'vergeet'?
}
echo "<br>";

// Een do while loop:

$strafmaat = 10;
$aantal = 0;
do {
	echo "$aantal Ik moet op tijd in de les komen <br>";
	$aantal++;
} while ($aantal < $strafmaat);  


// een while loop die alleen maar stopt als het aantal seconden 33 is.
// De meeste servers vinden deze code helemaal niet leuk en stoppen er dus ook soms voortijdig mee..

$doorgaan = True;

while($doorgaan) {
	$s = Date("s");
	if ($s==33) $doorgaan=False;
}

print "<br>Gestopt op de 33e seconde van deze minuut...";



?>