<?php 
include "db_inc.php";
if (!isset($_POST['start'])) {
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
	$query = "SELECT name FROM bbc";
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	$query = "SELECT name FROM bbc";
	$resultaat = mysqli_query($mysql,$query);
	?>
<form action="selectie_land.php" method="post">
	<?php
	print "<table>";
	print "<tr><td>Selecteer een land:</td>";
	print "<select name=\"land\">";
	while ($rij = mysqli_fetch_row($resultaat)) {
		print "<option name=$rij[0]>$rij[0]</option>";
	}
	print "</option><input type=\"submit\" name=\"start\" value=\"start\"></td>";
	print "</tr></table>";
?>
</form>
<?php
} else {
	$land = $_POST['land']; # opvragen van het ingevulde land
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	$query = "SELECT * FROM bbc WHERE name='$land'";
	$resultaat = mysqli_query($mysql,$query);
	while ($rij=mysqli_fetch_assoc($resultaat)) {
		print "Land: $rij[name]<br />";
		print "Regio: $rij[region]<br />";
		print "Bevolking: $rij[population]<br />";
		print "Oppervlakte: $rij[area]<br />";
		print "Bruto nationaal product: $rij[gdp]<br />";
	}
	// Todo: gegevens klaar maken voor het plaatsen in het wijzigingsformulier
}
?>
<p><a href="selectie_land.php">Opnieuw</a></p>