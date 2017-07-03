<?php
include "file_functies.php";

kop();
?>
	<div class="useradd">
		<h2>User toevoegen:</h2>
		<div class="useradd_formulier">
			<form action="file_useradd.php" method="post">
			Usernaam:<br>
			<input type="text" name="usernaam"><br>
			Voornaam<br> 
			<input type="text" name="voornaam"><br>
			Tussenvoegsel<br>
			<input type="text" name="tv"><br>
			Achternaam<br>
			<input type="text" name="achternaam"> <br>
			Email:<br>
			<input type="email" name="email"><br>
			Wachtwoord (2x):<br>
			<input type="password" name="ww1"><br>
			<input type="password" name="ww2"><br>
			Rol<br>
			<input type="radio" name="rol" value="5">user<br>
			<input type="radio" name="rol" value="1">admin<br>
			<input type="submit" name="toevoegen" value="toevoegen"><br>
			<input type="reset" name="wissen" value="wissen">
			</form>
		<a href="file_pagina1.php">terug naar pagina1</a>
		</div>
		<h2>De Userlijst:</h2>
		
<?php
// is er op de knop gedrukt? Dan user toevoegen.
if (isset($_POST['toevoegen'])) {
	$doorgaan = true;
	$melding = "";
	// basale controle of onderstaande velden zijn ingevoerd.
	if ($_POST['usernaam']=="" ) $doorgaan = false;
	if ($_POST['voornaam']=="" ) $doorgaan = false;
	if ($_POST['achternaam']=="" ) $doorgaan = false;
	if ($_POST['email']=="" ) $doorgaan = false;
	if ($_POST['ww1']=="" ) $doorgaan = false;
	if (isset($_POST['ww1'])) {
		if ($_POST['ww1']!=$_POST['ww2']) {
			$melding = "Wachtwoorden zijn niet gelijk!<br>";
			$doorgaan = false;
		}
	}
	if ($doorgaan) {
		// alles is goed, we gaan het bestand aanvullen.
		// bestand openen voor append ('a')
		$nieuwe_lijst = fopen('file_users.csv','a') or die ("userlijst niet aanwezig");
		// array opbouwen met de gegevens van de nieuwe user.
		$nieuwe_user = array($_POST['usernaam'],$_POST['voornaam'],$_POST['tv'],$_POST['achternaam'],$_POST['email'],$_POST['ww1'],$_POST['rol']);
		// array meegeven aan de lijst
		fputcsv($nieuwe_lijst,$nieuwe_user);
		// lijst sluiten.
		fclose($nieuwe_lijst);
		
	} else {
		$melding = "Onvolledige gegevens<br>".$melding;
	}
}
 
// Userlijst laten zien:

		// usergegevens inlezen vanaf schijf
		$lijst = fopen('file_users.csv','r') or die("Geen usergegevens"); # lijst openen voor lezen alleen.
		
		// regel voor regel doorlopen met de fgetcsv syntax. Stoppen als user gevonden is.
		$teller = 1;
		print "<table>";
		while($rij = fgetcsv($lijst,100,",")) {
				$user = $rij[0];
				$vn = $rij[1];
				$tv = $rij[2];
				$an = $rij[3];
				$em = $rij[4];
				if ($rij[6]==1) {
					$functie = "admin";
				} else {
					$functie = "user";
				}
				print "<tr><td>$teller</td><td>$user</td><td>$vn $tv $an</td><td>$em</td><td>$functie</td></tr>";
				$teller++;
			
		}
		print "</table>";
		print "</div>";
		fclose($lijst);
?>
<?php

voet();

?>


