<?php
include "db_gegevens.php"; # inlezen van de database gegevens
// Stap 1 & 2
$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) ;

// --------------------------------------------------------------
$tabel = '1_BESTELLINGEN'; # hier kun je zelf de naam van een tabel invullen
// --------------------------------------------------------------
 
// (1) Welke velden zitten in de tabel?
$query = "SHOW COLUMNS FROM $tabel"; # Speciaal MySQL commando!
$res = mysqli_query($mysql,$query) or die ("Fout: ".mysqli_error($mysql)." : tuof.");
while ($velden = mysqli_fetch_array($res)) {
		$tabelInfo[]=$velden['Field']; #de lijst tabelInfo wordt gevuld met de kolommen.
}

// (2) Nu kijken we naar de INHOUD van de tabel:
$query = "SELECT * FROM $tabel "; #stap 3
$resultaat = mysqli_query($mysql,$query) or die ("Fout: ".mysqli_error($mysql)." : tuof."); ; #stap 4

// Stap 5. Eerst de regel met de veldnamen 
echo "<table border=\"1\">";
print "<tr>";
foreach ($tabelInfo as $kolom) {
	print "<td>$kolom</td>";
}
print "</tr>";

// en nu de regels met de gegevens
while ($rij = mysqli_fetch_row($resultaat)) {
	echo "<tr>";
	foreach ($rij as $veld) {
		echo "<td>$veld</td>";
	}
	echo "</tr>"; 
}

echo "</table>";
 
#stap 6: Klaar
mysqli_close($mysql);
 
?>