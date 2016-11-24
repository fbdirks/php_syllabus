<?php 
include "db_inc.php";
if (!isset($_POST['start'])) {
 
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
 
?>
	<form action="wijzigen_land.php" method="post">
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
 
	// dingen die gedaan moeten worden als WEL op de knop is gedrukt!
 
	$land = $_POST['land']; # opvragen van het ingevulde land
	
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name); #1 en 2
	$query = "SELECT * FROM bbc WHERE name='$land'"; #3
	$resultaat = mysqli_query($mysql,$query); #4
	
	// gegevens opvraagbaar maken (stap 5)
	$rij = mysqli_fetch_assoc($resultaat);
 
	$name = $rij['name'];
	$region = $rij['region'];
	$area = $rij['area'];
	$population = $rij['population'];
	$gdp = $rij['gdp'];
 
	// Voor controle op scherm zetten
	print "Je wilt dit gaan wijzigen:<br />";
	print "Land: $land (regio: $region, oppervlakte: $area, bevolking: $population, bbp: $gdp)";
 
	// TODO: gegevens in een formulier plaatsen
}
?>
<p><a href="wijzigen_land.php">Opnieuw</a></p>