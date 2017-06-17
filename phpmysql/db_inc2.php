<?php
/**
 * @author Feike Dirks
 * @copyright 2009
 */
$db_server = "localhost";
$db_user = "havo5";
$db_name = "H5";
$db_pass = "oefenen";

function db_contact() {
	global $db_server, $db_user, $db_name, $db_pass;
	// contact zoeken met mysql en database
	$mysql = mysqli_connect($db_server,$db_user, $db_pass, $db_name);
	if (!$mysql) {
		echo "Error: unable to connect to server.";
	
	}
	/* 
	$msql = mysql_connect($db_server, $db_user, $db_pass) or die ("Fout: geen verbinding met de server");
	mysql_select_db($db_name, $msql) or die ("Fout: geen contact met database");
	// handle naar een mysql database teruggeven (essentieel!).
	*/
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