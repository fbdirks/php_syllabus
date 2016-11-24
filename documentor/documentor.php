<?php

/* 
	Documentor
	----------
	Script om de opbouw van een database te laten zien.
	: tabellen
	: velden, veldtypen
	: sleutels
	: links
	

	Opm: moet zo flexibel mogelijk zijn.
	
*/


$db_naam = "";
$db_user = "";
$db_pass = "";
$db_server = "localhost";
$tabellen = array();
$tabelnamen = array();

function toon($lijst, $mededeling="Geen bijzonderheden<br />") {
	print "<b>$mededeling</b><br />";
	print "<pre>";
	print_r($lijst);
	print "</pre>";
}


function db_contact() {

	global $db_server, $db_user, $db_naam, $db_pass;
	// contact zoeken met mysql en database
	$mysql = mysqli_connect($db_server, $db_user, $db_pass, $db_naam);

	if (!$mysql) {
		die('Verbindingsfout ('. mysqli_connect_errno() .')' . mysqli_connect_error());
	}

	return  $mysql;
}


// Opvragen van de dbgegevens

if (!isset($_POST['verwerk'])) {
	// formulier plaatsen
	?>
		<h2>Documentor</h2>
		<form action="documentor.php" method="post">
			<table border="1">
				<tr>
					<td>Database naam: </td><td><input type="text" name="dbnaam"></td>
				</tr>
				<tr>
					<td>Database user: </td><td><input type="text" name="dbuser"></td>
				</tr>
				<tr>
					<td>Database wachtwoord: </td><td><input type="password" name="dbpass"></td>
				</tr>
				<tr>
					<td>Actie: </td><td><input type="submit" name="verwerk" Value="verwerk!"></td>
				</tr>
			</table>
		</form>
	
	<?php
	
} else {
	// formulier verwerken

	
	
	$db_naam = $_POST['dbnaam'];
	$db_user = $_POST['dbuser'];
	$db_pass = $_POST['dbpass'];
	
	
	$mysql = db_contact();
	
	$sql = "SHOW TABLES";
	$res = mysqli_query($mysql,$sql) or die ("Fout : ".mysqli_error($mysql)." : tuof.");
	$aantal_tabellen=mysqli_num_rows($res);
	
	// De array tabelnamen wordt gevuld met alle tabellen die in deze database staan.
	while ($rij = mysqli_fetch_array($res)) {
		$tabelnamen[]=$rij[0];
	}
	
	// Nu per tabel de gegevens
	
	foreach ($tabelnamen as $tabel) {
		
		$sql = "SHOW COLUMNS FROM $tabel";
		$res = mysqli_query($mysql,$sql) or die ("Fout: ".mysqli_error($mysql)." : tuof.");
		while ($velden = mysqli_fetch_array($res)) {
			$kolom['field']=$velden['Field'];
			$kolom['type']=$velden['Type'];
			$kolom['null']=$velden['Null'];
			$kolom['key']=$velden['Key'];
			$kolom['default']=$velden['Default'];
			$kolom['extra']=$velden['Extra'];
			// Kolom bevat nu alle informatie over de kolom.
			// Deze informatie moet nu toegewezen worden aan het veld in de tabelrij.
			$tabellen[$tabel][]=$kolom;
		}
			
		/*
			print "<U>Tabellen</U><pre>";
			print_r($tabellen);
			print "</pre>";
		
		
		// oude code
			$rij_1="";
			$rij_2="";
			$rij_3="";
			$rij_4="";
			$rij_5="";
			$rij_6="";
			print "<b>Tabel: $tabel</b><br />";
			print "<table border=\"1\">";
			$sql = "SHOW COLUMNS FROM $tabel";
			$res = mysqli_query($mysql,$sql) or die ("Fout: ".mysqli_error($mysql)." : tuof.");
			while ($veld = mysqli_fetch_array($res)) {
				
				$rij_1 = $rij_1."<td>".$veld['Field']."</td>";
				$rij_2 = $rij_2."<td>".$veld['Type']."</td>";
				$rij_3 = $rij_3."<td>".$veld['Null']."</td>";
				$rij_4 = $rij_4."<td>".$veld['Key']."</td>";
				$rij_5 = $rij_5."<td>".$veld['Default']."</td>";
				$rij_6 = $rij_6."<td>".$veld['Extra']."</td>";
			}
			print "<tr>".$rij_1."</tr>";
			print "<tr>".$rij_2."</tr>";
			print "<tr>".$rij_3."</tr>";
			print "<tr>".$rij_4."</tr>";
			print "<tr>".$rij_5."</tr>";
			print "<tr>".$rij_5."</tr>";
			print "<tr>".$rij_6."</tr>";
		print "</table>";
		print "<br />";
			*/
	}
	
	// Display tabellen.
	
	foreach ($tabelnamen as $tabelnaam) {
		print "<b>Tabelnaam: $tabelnaam</b>";
		print "<table border=\"1\">";
		for ($r=0; $r<6; $r++) {
			$rij[$r]="";
			$vlag[$r]=false;
			//toon($vlag,"Vlag");
		}
		
		
		
		foreach ($tabellen[$tabelnaam] as $kolom) {
			$t=0;
			foreach ($kolom as $informatie) {
				if(isset($kolom)){
					$rij[$t] = $rij[$t]."<td>$informatie</td>";
					$vlag[$t]=true;
				} else {
					$rij[$t] = $rij[$t]."<td>-</td>";
				}
				$t++;
			}
		}
		for ($tt=0; $tt<6; $tt++) {
			print "<tr>";
			if ($vlag[$tt]) {	
				print $rij[$tt]; 
			}
			$rij[$tt]="";
			print "</tr>";
		}
		print "</table>";
		
	
		
	}
	
	
}	
	

toon($tabellen,"Tabellen:");






?>
