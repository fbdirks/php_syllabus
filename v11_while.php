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



?>