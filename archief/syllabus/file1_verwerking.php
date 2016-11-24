<?php

/* 
	Deze verwerkingpagina moet deze dingen doen:
	a) verzamelen van de relevante gegevens:
		- wat heeft de user ingevoerd?
		- is het compleet?
	b) op basis van ingevoerde usernaam de user file doorzoeken
		- klopt het ingevulde wachtwoord met het wachtwoord in de user file?
	c) als alles klopt: doorsturen naar volgende pagina
	d) als iets niet klopt: terugsturen naar de inlogpagina
*/

session_start();

if (isset($_POST['inloggen'])) {
	$usernaam = $_POST['username'];
	$ww_ingevuld = $_POST['password'];
	
	$doorgaan = true; # de komende controles kunnen deze op false gaan zetten als iets niet klopt
	
	// ruwe controle: alleen als niets is ingevuld wordt $doorgaan op false gezet.
	if (($usernaam == "") or ($wachtwoord=="")) {
		$doorgaan = false; # het heeft geen zin met onvolledige gegevens de userfile te lezen.
	} else {
		/*	TODO: inlezen userfile en controleren ingevoerde wachtwoord */
		
		
		
	
	}
	
	
	
} else {
	$doorgaan=false;
}

// Doorstuur routine, de inhoud van $doorgaan bepaalt waar we de user heen sturen.
if ($doorgaan) {
	header('Location: file2.php'); # vervolgpagina
} else {
	 # ToDo terugsturen naar inlogpagina
}