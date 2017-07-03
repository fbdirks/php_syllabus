<?php 
// Dit script selecteert het land dat gewijzigd moet worden en maakt het wijzigingsformulier klaar
include "db_inc.php";
if (!isset($_POST['start'])) {
	
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt

?>
	<form action="wijzig_land.php" method="post">
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
	// dingen die gedaan moeten worden als WEL op de knop is gedrukt.
	
	$land = $_POST['land']; # opvragen van het in het formulier ingevulde land
	
	// en nu de 6 stappen (zonder al te veel commentaar):
	$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name); #1 en 2
	$query = "SELECT * FROM bbc WHERE name='$land'";#3
	$resultaat = mysqli_query($mysql,$query);#4
	
	// gegevens opvraagbaar maken (= stap 5)
	$rij = mysqli_fetch_assoc($resultaat);
	
	$name = $rij['name'];
	$region = $rij['region'];
	$area = $rij['area'];
	$population = $rij['population'];
	$gdp = $rij['gdp'];
	
	// Voor controle op scherm zetten
	print "Je wilt dit gaan wijzigen:<br />";
	print "Land: $land (regio: $region, oppervlakte: $area, bevolking: $population, bbp: $gdp)";

	// met deze gegevens het wijzigingsformulier opbouwen:
	?>
	<form action="verwerk_wijziging.php" method="post">
	<!-- we noteren de oorspronkelijk ingetikte naam van het land extra op de volgende regel -->
	<input type="hidden" name="name_oud" value="<?php echo $name?>">
		<table>
			<tr><td>Land:</td><td><input type="text" name="name" value="<?php echo $name ?>" /></td></tr>
			<tr><td>Region:</td><td><input type="text" name="region" value="<?php echo $region ?>" /></td></tr>
			<tr><td>Area:</td><td><input type="text" name="area" value="<?php echo $area ?>" /></td></tr>
			<tr><td>Population:</td><td><input type="text" name="population" value="<?php echo $population ?>" /></td></tr>
			<tr><td>GDP:</td><td><input type="text" name="gdp" value="<?php echo $gdp ?>" /></td></tr>
			<tr><td><input type="submit" value="wijzigen" name="wijzigen"></td><td></td></tr>
		</table>
	</form>
	
	<?php
	
	mysqli_close($mysql); #6
}
?>
<p><a href="wijzig_land.php">Opnieuw</a></p>