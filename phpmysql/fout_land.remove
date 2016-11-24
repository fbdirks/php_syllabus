<?php
include "db_inc.php";

if (!isset($_POST['actie'])) {
	?>
	<form action="fout_land.php" method="post">
		<table>
		<tr><td>Naam van het land:</td><td><input type="text" name="name"></td></tr>
		<tr><td>De regio van het land:</td><td><input type="text" name="region"></td></tr>
		<tr><td>De oppervlakte van het land:</td><td><input type="text" name="area"></td></tr>
		<tr><td>Het aantal inwoners van het land:</td><td><input type="text" name="bevolking"></td></tr>
		<tr><td>Het bruto nationaal product van het land:</td><td><input type="text" name="gdp"></td></tr>
		</table>
	</form>
	<?php 
} else {
	$fout = true;
	if (empty($_POST['name'])) {
		$fout = false;
	} else {
		$name = $_POST['name'];
	}
	if (empty($_POST['region'])) {
		$fout = false;
	} else {
		$region = $_POST['region'];
	}
	if (empty($_POST['area'])) {
		$area = $_POST['area'];  # we vullen 0 in als dit niet is ingevuld!
	} else {
		$area = 0;
	}
	if (empty($_POST['population'])) {
		$population = 0;
	} else {
		$population = $_POST['population'];
	}
	if (empty($_POST['gdp'])) {
		$gdp = 0;
	} else {
		$gdp = $_POST['gdp'];
	}
	
	if ($fout) {
		$query = "INSERT INTO bbc VALUES ('$name',$region,$area,$population,$gdp)"; # is meteen stap 3!!
		
		// TODO: database handelingen (de 6 stappen)
		#stap 1 en 2
		$mysql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		# stap 3 staat hierboven al
		# stap 4
		$resultaat = mysqli_query($mysql,$query) or die ("Insert niet gelukt!") ;
		# stap 5
		
		#stap 6
		mysqli_close($mysql);
		
	} else {
		print "Onvoldoende invoer! Het moet overnieuw! <a href=\"nieuw_land.php\">Klik hier</a>";
	}
	
	
}
?>