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
		<form action="strokendiagram2.php" method="post">
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
	print "<h6><a href=\"strokendiagram.php\">reset</a></h6>";

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

	}
	// Alternatieve vorm van display:
	// Per tabel een html tabel met horizontaal de gegevens, niet verticaal
	
	
	// Display tabellen.
	foreach ($tabelnamen as $tabelnaam) {
		print "<br /><br />";
		print "<b>Tabelnaam: $tabelnaam</b><br /><br />";
		print "<table border=\"0\">";
		print "<tr><th>Veldnaam</th><th>Type</th><th>Null?</th><th>Sleutel</th><th>Default</th><th>extra</th></tr>";
		foreach ($tabellen[$tabelnaam] as $kolom) {
				print "<tr><td class=\"veldnaam\">$kolom[field]</td>";
				print "<td class=\"type\">$kolom[type]</td>";
				if ($kolom['null']=="YES") {
					print "<td class=\"yesnull\">$kolom[null]</td>";
				} else {
					print "<td class=\"nonull\">$kolom[null]</td>";
				}
				print "<td class=\"sleutel\">$kolom[key]</td>";
				print "<td class=\"default\">$kolom[default]</td>";
				print "<td class=\"extra\">$kolom[extra]</td></tr>";
		}
		print "</table>";
	}
		
		//print "</table>";
	}
?>
