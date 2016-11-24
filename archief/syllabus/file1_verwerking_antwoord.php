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
		
		$bestand = fopen('users.csv','r'); # openen bestand om te lezen
		
		while ($regel = fgetcsv($bestand, 1000,';')) {
			//print "$regel[0] ; $regel[1]".sha1($ww_ingevuld)."<br>";
			if ($regel[0]==$usernaam) {
				// als het klopt noteren in $_SESSION			
				if ($regel[1]==sha1($ww_ingevuld)) {
					$_SESSION['ingelogd']=true;
					$_SESSION['usernaam']=$usernaam;
				} else {
					$doorgaan = false;
				}
			}
		} 
	}
	
	
	
} else {
	$doorgaan=false;
}

// Doorstuur routine
if ($doorgaan) {
	header('Location: file2.php');
} else {
	header('Location: file1.php');
}