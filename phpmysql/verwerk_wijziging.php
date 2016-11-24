<?php
// dit script verwerkt de wijzigingen.
include "db_inc.php";
	$doorgaan = true;
	// We moeten dezelfde controles uitvoeren als bij het invoeren van een nieuw land.
	if (empty($_POST['name_oud'])) {
		$doorgaan = false;
	} else {
		$name_oud = $_POST['name_oud'];
	}
	if (empty($_POST['name'])) {
		$doorgaan = false;
	} else {
		$name = $_POST['name'];
	}
	if (empty($_POST['region'])) {
		$doorgaan = false;
	} else {
		$region = $_POST['region'];
	}
	if (empty($_POST['area'])) {
		$area = 0;  # we vullen 0 in als dit niet is ingevuld!
	} else {
		$area = $_POST['area'];
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
	
	// als alle controles goed gingen is $doorgaan TRUE.
	if ($doorgaan) {
		
		// met de gegevens de query uit voeren (de 6 stappen)
		$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) ; #stap 1 en 2
		
		// Stap 3: query opbouwen.
		$query = "UPDATE bbc 
			SET name = '$name', 
			region = '$region',
			area = $area,
			population = $population,
			gdp = $gdp
			WHERE name = '$name_oud';
		";
			
		$resultaat = mysqli_query($mysql,$query) ; #stap 4
		
		// Stap 5: resultaat verwerken
		if ($resultaat) {
			print "Wijzigingen doorgevoerd.";
		} else {
			print "Wijzigen niet gelukt: ".mysqli_error($mysql);
		}
		
		mysqli_close($mysql); #stap 6
		
		print "Nog een wijziging? <a href=\"wijzig_land.php\">klik hier</a>";
	} else {
		print "Onvoldoende gegevens voor een wijziging. <a href=\"wijzig_land.php\">Opnieuw</a>?";
	}
?>
