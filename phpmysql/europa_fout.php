<?php
include "db_inc.php"; # inlezen van de database gegevens
//$db_server="http://www.grinfo.nl"; # bewuste FOUT 
// Stap 1 en 2:  connectie maken met mysql server en de juiste database
// .. de gegevens (bijvoorbeeld $db_server) zijn gedefinieerd in de file db_inc.php.
// .. op die manier hoef je die gegevens maar in 1 bestand te noteren.
$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) or die ("Mysql kon niet bereikt worden.");

// Stap 3: query opbouwen
$query = "SELECT name,region,area,population,gdp FROM bbc WHERE region = 'Europe'";

print "De query is: $query";
print "<br><br>";

// Stap 4: query uitvoeren
$resultaat = mysqli_query($mysql,$query) or die ("Query kon niet uitgevoerd worden: ".mysqli_error($mysql));

// Stap 5: resultaat verwerken
echo "<table border=\"1\">";
echo "<tr><td>Name</td><td>Region</td><td>Area</td><td>Population</td><td>GDP</td></tr>"; #moet wel sporen met de query!

// mysql_fetch_row haalt rij voor rij uit $resultaat
while ($rij = mysqli_fetch_row($resultaat)) {
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