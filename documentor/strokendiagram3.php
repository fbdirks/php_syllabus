<?php
/*	strokendiagram van één tabel tonen. */
?>
<head>
    <link rel="stylesheet" type="text/css" href="strokendiagram.css">
    <title>Strokendiagram</title>
</head>
<body>
<?php

include "db_inc.php"; # bevat de database gegevens.
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

	// Tabelnaam bovenin tonen.
	print "<h2>Strokendiagram Generator</h2>";
	print "<p>De database <i>$db_naam</i> bevat de volgende tabellen:</p>";
	
	$mysql = db_contact();
	$sql = "SHOW TABLES";
	$res = mysqli_query($mysql,$sql) or die ("Fout : ".mysqli_error($mysql)." : tuof.");
	print"<form action=\"strokendiagram3.php\" method=\"post\">";
	print "<select name=\"tabelnaam\">";
	
	// De array tabelnamen wordt gevuld met alle tabellen die in deze database staan.
	// En deze namen komen in de <select>
	while ($rij = mysqli_fetch_array($res)) {
		$tabelnamen[]=$rij[0];
		print "<option value=$rij[0]>$rij[0]</option>";
	}
	print "</select>";
	print "<input type=\"submit\" name=\"verwerk\" value=\"tabelkeuze\">";
	print "</form>";
	
	// Verwerken van gekozen tabel.
	if ((isset($_POST['verwerk']))&&($_POST['tabelnaam']!="")) {
		$tabel = $_POST['tabelnaam'];
		$sql = "SHOW COLUMNS FROM $tabel";
		$res = mysqli_query($mysql,$sql) or die ("Fout: ".mysqli_error($mysql)." : tuof.");
		while ($velden = mysqli_fetch_array($res)) {
			$kolom['field']=$velden['Field'];
			$kolom['type']=$velden['Type'];
			$kolom['null']=$velden['Null'];
			$kolom['key']=$velden['Key'];
			$kolom['default']=$velden['Default'];
			$kolom['extra']=$velden['Extra'];
			// $Kolom bevat nu alle informatie over de kolom.
			// Deze informatie moet nu toegewezen worden aan het veld in de tabelrij.
			$tabel_info[]=$kolom;
		}
		
	}
	$kolom = array();
	print "<h3>Structuur van de tabel $tabel:</h3>";
	print "<table>";
	print "<tr><th>Veldnaam</th><th>Type</th><th>Null</th><th>Sleutel</th><th>Default</th><th>Extra</th></tr>";
	foreach ($tabel_info as $veld) {
			print "<tr>";
			if ($veld['key']=="PRI") {
					print "<td class=\"veldk\">$veld[field]</td>";
					$kolom[]=$veld['field'];
			} else {
					print "<td class=\"veld\">$veld[field]</td>";	
					$kolom[]=$veld['field'];
			}
			print "<td class=\"type\">$veld[type]</td>";
			print "<td class=\"key\">$veld[key]</td>";
			print "<td class=\"null\">$veld[null]</td>";
			print "<td class=\"default\">$veld[default]</td>";
			print "<td class=\"extra\">$veld[extra]</td>";
			print "</tr>";
	}
	print "</table>";
	/*  Tonen van de gegevens uit deze tabel */
	print "<br><br><h3>Gegevens uit deze tabel:</h3><br>";
	$query2 = "Select * from $tabel";
	$res2 = mysqli_query($mysql,$query2) or die ("Fout: ".mysqli_error($mysql)." : tuof.");
	print "<table class=\"data\">";
	print "<tr>";
	foreach ($kolom as $kopje) {
		print "<th>$kopje</th>";
	}
	print "</tr>";
	while ($rij = mysqli_fetch_row($res2)) {
		print "<tr>";
		foreach($rij as $v) {
			print "<td>$v</td>";
		}
		print "</tr>";
	}
	

?>
