<?php 
include "db_inc.php";
if (!isset($_POST['start'])) {
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
?>
<h2>
	 Zoek naar bevolkingsaantallen tussen x en y.
</h2>
<form action="opdracht3_2.php" method="post">
	<table>
		<tr>
			<td>Startpunt bevolking</td><td><input type="text" name="startpunt"></td>
		</tr>
		<tr>
			<td>Eindpunt bevolking</td><td><input type="text" name="eindpunt"></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" name="start" value="Zoek op"></td>
		</tr>
	</table>
</form>
<?php
} else {
	$start = $_POST['startpunt']; # opvragen van het ingevulde land
	$eind = $_POST['eindpunt']; # opvragen eindpunt
	// Switch wanneer omgekeerd.
	if ($start > $eind) {
		$temp = $start;
		$start = $eind;
		$eind = $temp;
	}
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	#$query = "SELECT * FROM bbc WHERE population > $start AND population < $eind";
	$query = "SELECT * FROM bbc WHERE population BETWEEN $start AND $eind";
	print "De query is: $query <br />";
	$resultaat = mysqli_query($mysql,$query);
	print "<table>";
	while ($rij = mysqli_fetch_assoc($resultaat)) {
		print "<tr><td>$rij[name]</td><td>$rij[region]</td><td>$rij[population]</td><td>$rij[area]</td><td>$rij[gdp]</td></tr>";
	}
	print "</table>";
}
?>
<p><a href="opdracht3_3.php">Opnieuw</a></p>