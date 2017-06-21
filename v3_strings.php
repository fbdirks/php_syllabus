<?php

$regel1a = "Denkend";
$regel1b = " aan Holland";
$regel2 = "Zie ik brede rivieren";
$regel3 = "Traag door oneindig laagland gaan.";
$nr ="<br>"; # nieuwe regel

$regel1 = $regel1a.$regel1b; # regel 1 wordt opgebouwd uit twee onderdelen

$gedicht = $regel1.$nr.$regel2.$nr.$regel3;  # het gedicht wordt opgebouwd uit 3 regels (inclusief afbreken)

print "$gedicht";

?>