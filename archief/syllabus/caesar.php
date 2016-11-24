<?php

function caesar($str,$schuif) {
	$str=strtolower($str);
	$codebericht="";
	$lengte = strlen($str);
	for ($l = 0; $l < $lengte; $l++) {
		#a = 97, z = 122
		$nieuw = ord($str[$l]) + $schuif;
		if ($nieuw > 122) $nieuw = 97 + ($nieuw - 123);
		$codebericht = $codebericht.chr($nieuw);
	}
	return $codebericht;
}

print "Vraag 4: <br>";
$test = 346;
print "De <u>waarde</u> van '$test' is $test<br>";
print "De <u>waarde</u> van \$test is $test<br>";

print "Vraag 6:<br>";
$i=100; # startwaarde
while ($i>0) {  #voorwaarde
	print "$i ";
	$i--;  #verandering
}

print "Vraag 8:<br>";
$beurten = 5;
if ($beurten = 10) {
	print "Je bent klaar.";
} else {
	print "Je bent nog niet klaar.";
}


print "Vraag 9:<br>";
$nogeenkeer = 0;
if ($nogeenkeer) {
	print "je speelt nog een keer";
}

print "Vraag 18:<br>";
$draaiom = "Hallo allemaal!";
$draaiom2 = "23456";
$draaiom3 = 23456;
print strrev($draaiom);
print "|";
print strrev($draaiom2);
print "|";
print strrev($draaiom3);
print "<br>";



print "Vraag 19:<br>";


$bericht = "AttackAtDawn";
$geheimBericht = caesar($bericht,3);
print "$bericht - $geheimBericht<br>";



print "<br>Vraag 13: <br>";

if (isset($_POST['een'])) {
	print "Knop één is gedrukt!";
} else if(isset($_POST['twee'])) {
	print "Knop twee is gedrukt!";
} else if (isset($_POST['drie'])) {
	$waarde = $_POST['drie'];
	print "Knop $waarde is geklikt.";
}

?>

<form action="caesar.php" method="post">
<table>
	<tr><td><input type="submit" name="een" value="klik"></td><td><input type="submit" name="twee" value="klik"></td><td><i>Twee knoppen met dezelfde value, maar verschillende name</i></td></tr>
	<tr><td><input type="submit" name="drie" value="drie"></td><td><input type="submit" name="drie" value="vier"></td><td><i>Twee knoppen met dezelfde name, maar verschillende value</i></td></tr>
</table>
</form>

