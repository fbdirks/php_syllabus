<?php
// we hebben $_SESSION straks nodig
session_start();

// Alleen aan het werk gaan als er formulierinvoer is.
if (isset($_POST['inloggen'])) {
		
	if (($_POST['username']=="") || ($_POST['ww']=="")) {
		$doorgaan = false; # Basale controle: username en wachtwoord mogen niet leeg zijn.
	} else {
		// formulier gegevens ophalen:
		$user = $_POST['username'];
		$ww = $_POST['ww'];
		
		// usergegevens inlezen vanaf schijf
		$lijst = fopen('file_users.csv','r') or die("Geen usergegevens"); # lijst openen voor lezen alleen.
		
		// regel voor regel doorlopen met de fgetcsv syntax. Stoppen als user gevonden is.
		while($rij = fgetcsv($lijst,100,",")) {
			// User gevonden?
			if ($user==$rij[0]) {
				// Wachtwoord goed?	
				if ($ww==$rij[5] ) {
					// Session vullen met usergegevens
					$_SESSION['ingelogd']=true; 
					$_SESSION['usernaam'] = $rij[0];
					$_SESSION['voornaam'] = $rij[1];
					$_SESSION['tv'] = $rij[2];
					$_SESSION['achternaam']=$rij[3];
					$_SESSION['email']=$rij[4];
					$_SESSION['rol']=$rij[6];
					$doorgaan = true;
					$melding = "user gevonden";
					break; # breekt uit while als het klopt.
				} else {
				$doorgaan = false;
				$melding = "fout wachtwoord!";
				break; # breekt uit while als het niet klopt. Verder gaan heeft geen zin.			
				} 
			}
		}
		// als $melding nog leeg is is de user helemaal niet gevonden!
		if ($melding =="") {
			$doorgaan = false;
			$melding = "Usernaam niet gevonden.";
		}
	}
	// doorsturen naar volgende pagina of fout aan user melden.
	if ($doorgaan) {
		header('Location: file_pagina1.php');
	} else {
		print "$melding<br>Probeer het <a href=\"file_inlog.php\">opnieuw</a>";
	}
}
