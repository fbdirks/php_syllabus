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

?>

<head>
    <link rel="stylesheet" type="text/css" href="strokendiagram.css">
    <title>Strokendiagram</title>
</head>
<body>

<?php


$db_naam = "";
$db_user = "";
$db_pass = "";
$db_server = "localhost";
$tabellen = array();
$tabelnamen = array();

// Handige functie tijdens debuggen. Niet nodig bij normaal gebruik
function toon($lijst, $mededeling="Geen bijzonderheden<br />") {
	print "<b>$mededeling</b><br />";
	print "<pre>";
	print_r($lijst);
	print "</pre>";
}


// Hiermee wordt contact gelegd met de database
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
	// Er is nog niets ingevuld dus: formulier plaatsen
	?>
		<h2>Documentor</h2>
		<form action="strokendiagram.php" method="post">
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

	// Tabelnaam bovenin tonen.
	print "<h2>Strokendiagram $db_naam</h2>";
	print "<p>$db_naam bevat de volgende tabellen:</p>";
	print "<h6><a href=\"strokendiagram.php\">reset</h6>";



	$mysql = db_contact();

	$sql = "SHOW TABLES";
	$res = mysqli_query($mysql,$sql) or die ("Fout : ".mysqli_error($mysql)." : tuof.");
	$aantal_tabellen=mysqli_num_rows($res);

	// De array tabelnamen wordt gevuld met alle tabellen die in deze database staan.
	while ($rij = mysqli_fetch_array($res)) {
		$tabelnamen[]=$rij[0];
	}
	
	/* onderstaande code custom, weghalen na gebruik
		---------------------------
		*/
		//$tabelnamen = array();
		//$tabelnamen[0] = "activiteit";
		//$tabelnamen[1] = "prullenbak";
		
		/*
		---------------------------
		*/

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

	}

	// Display tabellen.
	foreach ($tabelnamen as $tabelnaam) {
		
		
		print "<br /><br />";
		print "<b>Tabelnaam: $tabelnaam</b><br /><br />";
		print "<table border=\"0\">";
		for ($r=0; $r<6; $r++) {
			$rij[$r]="";
			$vlag[$r]=false;
		}
		 //toon($vlag, "Vlag voor de lus");


		foreach ($tabellen[$tabelnaam] as $kolom) {
			$t=0;
			foreach ($kolom as $informatie) {
				if(isset($informatie)){
					if ($t==0) {
						$rij[$t] = $rij[$t]."<td class=\"veldnaam\">$informatie</td>";
					} elseif ($t==1) {
						$rij[$t] = $rij[$t]."<td class=\"type\">$informatie</td>";
					} elseif ($informatie=="PRI") {
						$rij[$t] = $rij[$t]."<td class=\"sleutel\">$informatie</td>";
					} elseif ($informatie=="NO") {
						$rij[$t] = $rij[$t]."<td class=\"nonull\">$informatie</td>";
					} elseif ($informatie=="YES") {
						$rij[$t] = $rij[$t]."<td class=\"yesnull\">$informatie</td>";
					} else {
					$rij[$t] = $rij[$t]."<td>$informatie</td>";
					}
					$ai = !strcmp($informatie, "auto_increment");
					if (($t==5) AND ($ai)) {
						$vlag[$t] = false;
					} else {
						$vlag[$t] = true;
					}

				} else {
					$rij[$t] = $rij[$t]."<td></td>";
				}
				$t++;
			}
		}
		//toon ($vlag, "Vlag na de lus");
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

	//toon($tabellen,"Tabellen:");

}








?>
