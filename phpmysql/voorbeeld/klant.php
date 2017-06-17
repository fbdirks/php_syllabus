<?php
include "../db_inc.php"; # inlezen van de database gegevens
print "$db_user";
// Stap 1 en 2:  connectie maken met mysql server en de juiste database
// .. de gegevens (bijvoorbeeld $db_server) zijn gedefinieerd in de file db_inc.php.
// .. op die manier hoef je die gegevens maar in 1 bestand te noteren.
$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) or die ("Database niet bereikt") ;

// Stap 3: query opbouwen
$query = "SELECT * FROM A_Users where usernaam='fbdirks'";


// Stap 4: query uitvoeren
$resultaat = mysqli_query($mysql,$query) or die("Query niet uitgevoerd") ;

// Stap 5: resultaat verwerken
/* Onderstaande regel moet wel sporen met de query! (uitdaging: automatiseer dat!)*/

// mysql_fetch_row haalt rij voor rij uit $resultaat
$rij = mysqli_fetch_assoc($resultaat);
$hash = $rij['wachtwoord'];
print "$hash<br>";

$pw = "test";
$query2 = "SELECT PASSWORD('$pw')";
$res2 = mysqli_query($mysql,$query2);
$resultaat2 = mysqli_fetch_row($res2);
print_r($resultaat2);
$hash2 = $resultaat2[0];
print "$hash2<br>";



// Stap 6: verbinding verbreken
mysqli_close($mysql);

/* 
Print"ter referentie wat hash methoden:<br>";
$hash1 = md5("test");
$hash2 = sha1("test");
$hash3 = crypt("test");
print " $hash1<br> $hash2<br> $hash3";
*/

$waar = password_verify("test",$hash);
if ($waar) {
	print "Passworden matchen";
} else {
	print "Passworden matchen niet";
}


$hash = password_hash("test",PASSWORD_BCRYPT);
print "gegenereerd:  $hash";
?>