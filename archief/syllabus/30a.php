<?php

print "Controle op bestaan...<br><hr><br>";

if (file_exists('ik_besta_niet.csv')) {
	echo "ik_besta_niet.csv bestaat wel.<br>";
} else {
	echo "ik_besta_niet.csv bestaat niet.<br>";
}


if (file_exists('voorbeeld.csv')) {
	
	echo "voorbeeld.csv bestaat wel.<br>";
	
	if (is_readable('voorbeeld.csv')) {
		echo ".. en is leesbaar<br>";
	} else {
		echo ".. maar is niet leesbaar<br>";
	}
	
	if (is_writable('voorbeeld.csv')) {
		echo ".. en is beschrijfbaar<br>";
	} else {
		echo ".. maar is niet beschrijfbaar<br>";
	}
	
	print "<br>";
	
	/* diverse informatie over het bestand */
	$perms = fileperms('voorbeeld.csv');
	$grootte = filesize('voorbeeld.csv');
	$info = posix_getpwuid(fileowner('voorbeeld.csv'));
	$eigenaar = $info['name'];
	
	// Vanwege de bijzondere betekenis van het getal in $perms is speciale opmaak noodzakelijk
	$pperms = substr(sprintf('%o', $perms), -4); # zie de documentatie op php.net!!!
	
	
	print "Filepermissie voorbeeld.csv: $pperms <br>";
	print "1 = alleen uitvoeren, 2 = alleen schrijven, 4 = alleen lezen<br>";
	print "3 = uitvoeren + schrijven, 5 = alleen uitvoeren + lezen, 6 = alleen schrijven en lezen<br>";
	print "7 = uitvoeren, schrijven en lezen";
	print "<br><br>";
	print "Voorbeeld.csv is <b>$grootte bytes</b> groot.<br>";
	print "De eigenaar is <b>$eigenaar</b><br>";
	
} else {
	echo "voorbeeld.csv bestaat niet.<br>";
}




?>
