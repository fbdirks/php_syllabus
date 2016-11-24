<?php
/**
 * @author Feike Dirks
 * @copyright 2009
 */
$db_server = "localhost";
$db_user = "havo5";
$db_name = "H5";
$db_password = "oefenen";

function db_contact() {
	global $db_server, $db_user, $db_name, $db_password;
	// contact zoeken met mysql en database
	$mysql = mysqli_connect($db_server,$db_user, $db_password, $db_name) or die ("Geen connectie: ".mysqli_error());
	if (!$mysql) {
		echo "Error: unable to connect to server.";
	
	}
	return  $mysql;
}

function db_verbreek($handel) {
	mysql_close($handel);
}

function kleurwissel($teller) {
	$kc = $teller % 2;
	if ($kc == 0) {
		$kleur = "#CCCCCC";
	} else {
		$kleur = "#FFFF55";
	}
	return $kleur;
}

?>