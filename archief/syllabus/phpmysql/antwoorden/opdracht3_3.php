<?php 
include "db_inc.php";
if (!isset($_POST['start'])) {
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
?>
<form action="opdracht3_3.php" method="post">
	<table>
		<tr>
			<td>Welk land?</td><td><input type="text" name="land"></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" name="start" value="start"></td>
		</tr>
	</table>
</form>
<?php
} else {
	$land = $_POST['land']; # opvragen van het ingevulde land
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	$query = "SELECT * FROM bbc WHERE name LIKE '%$land%'";
	// uitprinten van de query is niet verplicht maar wel handig tijdens het programmeren
	print "De query is: $query <br /><br />";
	$resultaat = mysqli_query($mysql,$query);
	while ($rij = mysqli_fetch_assoc($resultaat)) {
		print "Land = $rij[name]<br>";
		print "Regio = $rij[region]<br>";
		print "Bevolking = $rij[population]<br>";
		print "Oppervlakte = $rij[area]<br>";
		print "Bruto Nationaal Product = $rij[gdp]";
	}
}
?>
<p><a href="opdracht3_3.php">Opnieuw</a></p>