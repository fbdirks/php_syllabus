$bestand = fopen('voorbeeld.csv','r');
$regel = 1;
$alles = array();
while ($rij = fgetcsv($bestand, 1000,';')) {
	$aantal = count($rij);
	print "$aantal elementen op regel $i: ";
	for ($i=0;$i<$aantal;$i++) {
		print $rij[$i];
		print " - ";
	}
	print "<br>";
	$alles[$regel]=$rij;
}
print "<pre>";
print_r($alles);
print "</pre>";

fclose($bestand);