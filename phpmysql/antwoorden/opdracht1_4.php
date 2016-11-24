<?php
include "db_inc.php"; # inlezen van de database gegevens
?>
<div style="font-family: Impact; margin: auto;">

<h2>Het aantal landen per regio</h2>

<?php
// Stap 1 en 2:  connectie maken met mysql server en de juiste database
// .. de gegevens (bijvoorbeeld $db_server) zijn gedefinieerd in de file db_inc.php.
// .. op die manier hoef je die gegevens maar in 1 bestand te noteren.
$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) ;
 
// Stap 3: query opbouwen
$query = "SELECT region, count(name) FROM bbc GROUP BY region";
 
 
// Stap 4: query uitvoeren
$resultaat = mysqli_query($mysql,$query) ;
 
// Stap 5: resultaat verwerken
echo "<table border=\"1\">";
echo "<tr><td>Regio</td><td>Aantal</td></tr>"; #moet wel sporen met de query!

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
</div>
</html>