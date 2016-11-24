<?php

function delen(){	
	$product = 200;
	// dit rekent twee getallen uit die een product onder de 100 hebben.
	while ($product > 100) {
		$getal1 = rand(2,30);
		$getal2 = rand(2,30);
		$product = $getal1 * $getal2;
	} 
	
	// We sorteren de twee getallen zo dat het grootste getal getal1 is.
	if ($getal2 > $getal1) {
		$temp=$getal1;
		$getal1=$getal2;
		$getal2=$temp;
	}
	
	// We kennen het product toe als een van de twee getallen
	// en de kleinste als het andere getal. Zo is er geen komma deling!!
	$tweetal[]=$product; #product
	$munt = rand(1,2);
	if ($munt==1) {
		echo "Kop! ";
		$tweetal[]=$getal1;
	} else {
		echo "Munt!";
		$tweetal[]=$getal2;
	}
	
	return $tweetal; # dit resultaat geven we terug..
}


print "Een kleine test..<br>";
for ($i=1;$i<=10;$i++) {
	$getallen = delen();
	print "$getallen[0] / $getallen[1] = ? <br>";
}

?>





	