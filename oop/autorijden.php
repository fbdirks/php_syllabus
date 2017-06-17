<?php

Include "auto.php";

$ves = new Auto(); # instantie van het object auto. 
$rai = new Auto();

for ($i=0; $i<50; $i++) {
	$rai->gasgeven();
}


for ($i=0;$i<100;$i++) {
	$ves->gasgeven();
}

print "Max:";
print $ves->gasis();
print "<br>";
print "Rai: ";
print $rai->gasis();



?>

