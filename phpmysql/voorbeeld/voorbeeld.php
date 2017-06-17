<?php
include "../db_inc.php"; # inlezen van de database gegevens
//$username = $_POST['usernaam'];
//$wachtwoord = $_POST['wachtwoord'];
$username = "fbdirks";
$wachtwoord = "test";
/* De hash vinden die in de database staat */
//Stap 1 en 2:
$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) or die ("Database niet bereikt") ;
// Stap 3:
$query = "SELECT * FROM A_Users where usernaam='$username'";
print "de query is: $query <br>";
// Stap 4:
$resultaat = mysqli_query($mysql,$query) or die("Query niet uitgevoerd: ".mysqli_error($mysql));
// Stap 5:
$rij = mysqli_fetch_assoc($resultaat);
$hash = $rij['wachtwoord'];  // Dit is de hash die in de database opgeslagen zit voor de user.

/* De hash berekenen van het door de user ingetikte wachtwoord */

// Stap 3 (stappen 1 en 2 zijn nog geldig en hoeven niet weer gezet te worden)
$query2 = "SELECT PASSWORD('$wachtwoord')";
// Stap 4:
$resultaat2 = mysqli_query($mysql,$query2) or die("Query niet uitgevoerd") ;
// Stap 5:
$rij2 = mysqli_fetch_assoc($resultaat2);
$hash2 = $rij2[0]; // Dit is de hash van het INGETIKTE wachtwoord.

if ($hash1==$hash2) {
	print "Wachtwoorden komen overeen!";
} else {
	print "Wachtwoorden verschillen!!";
}
 
?>
