<?php
/*

	Dit is de basale inlogpagina van Het Suikerkopje.
	Op deze pagina wordt niet heel veel maar wel enig werk gemaakt van security.
	Je kunt de code naar believen uitbreiden, aanpassen of vervangen
	zolang de functies maar behouden blijven.

*/


// we hebben $_SESSION straks nodig
session_start();

// Alleen aan het werk gaan als er formulierinvoer is.
if (isset($_POST['inloggen'])) {
		
	if (($_POST['username']=="") || ($_POST['ww']=="")) {
		$doorgaan = false; # username en wachtwoord mogen niet leeg zijn.
	} else {
		// formulier gegevens ophalen:
		$user = $_POST['username'];
		$ww = $_POST['ww'];
		
		/*
			DIT DEEL VAN DE CODE GAAT UIT VAN EEN CSV BESTAND.
			Voor de MySQL opdracht moet dit HERSCHREVEN worden naar een MySQL oplossing.
		*/
		
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
	} 
}
?>

<!DOCTYPE html>
<html>
<head>
<title>FileFuncties PHP</title>
<link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
<link rel="stylesheet" href="file_stijl.css">
</head>
<body>
<br><br><br>
	<div class="main">
		<h2>Het Suikerkopje - Inloggen</h2>
		<?php echo $melding;?>
		<img src="kopje_klein.jpg" style="float: left; border: 1px solid grey; margin-left: 20px; ">
			<form action='file_inlog.php' method='post'>
				Loginnaam:<br>
				<input type="text" name="username"><br>
				Wachtwoord:<br>
				<input type="password" name="ww"><br>
				<input type="submit" name="inloggen" value="inloggen">
			</form>
	</div>
	<div class="toelichting">
		<p>Demonstratie uitwerking - niet geschikt voor productie omgevingen</p>
	</div>
</body>
</html>