<?php
include "db_inc.php"; # inlezen van de database gegevens

// Stap 1 en 2:  connectie maken met mysql server en de juiste database
// .. de gegevens (bijvoorbeeld $db_server) zijn gedefinieerd in de file db_inc.php.
// .. op die manier hoef je die gegevens maar in 1 bestand te noteren.

$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) or die ("Contact met database niet mogelijk.") ;

// Stap 3: query opbouwen
$query = "SELECT * FROM bbc WHERE region = 'Europe'";

print "$query<br>";

// Stap 4: query uitvoeren
$resultaat = mysqli_query($mysql,$query) ;



// Stap 3 en 4 in één.
//$resultaat = mysqli_query($mysql,"SELECT * FROM bbd WHERE region = 'Europe'");



// Stap 5: resultaat verwerken
echo "<table border=\"1\">";
/* Onderstaande regel moet wel sporen met de query! (uitdaging: automatiseer dat!)*/
echo "<tr><td>Name</td><td>Region</td><td>Area</td><td>Population</td><td>GDP</td></tr>"; 


// mysql_fetch_row haalt rij voor rij uit $resultaat
while ($rij = mysqli_fetch_assoc($resultaat)) {

	
	
echo "<tr>";
	
	// haalt veld voor veld uit $rij
	foreach ($rij as $veld) {
		echo "<td>$veld</td>";
	}
	echo "</tr>"; 
}

echo "</table>";

// Stap 6: verbinding verbreken
mysqli_close($mysql);

?>