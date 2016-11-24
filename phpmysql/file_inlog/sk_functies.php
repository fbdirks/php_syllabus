<?php
/*
	Dit zijn nuttige functies voor de Suikerkopje webapplicatie.
	
	Voordeel van het plaatsen van deze functies in een aparte file
	is vooral dat de code op de 'normale' pagina's rustiger en overzichtelijker
	blijft.
	
*/

/*
	 Hier worden de database gegevens ingelezen. 	
	 TODO: maak db_gegevens.php aan en vul hem met de juiste gegevens.
*/
include "db_gegevens.php";

/*
	Deze functie maakt contact met de database.
	TODO: programmeer deze functie. 
*/
function db_contact() {
	
	
	return $mysql; # dit is de $mysql connectie die de functie teruggeeft.
}

/*
	Deze functie zet de kop van een pagina neer.
*/
function kop() {
	session_start(); # zodat we SESSION kunnen gebruiken!
	
	// de volgende variabelen gaan we vaker gebruiken dan alleen in deze functie
	// en daarom zetten we er GLOBAL voor.
	GLOBAL $user, $voornaam, $tv,$achternaam,$email,$rol;
	// De volgende regels controleren of iemand wel ingelogd is..
	if (!((isset($_SESSION['ingelogd']))&& ($_SESSION['ingelogd']==true))) { 
		header("Location: sk_inlog.php");
		exit();
	} else {
		$user = $_SESSION['usernaam'];
		$voornaam = $_SESSION['voornaam'];
		$tv = $_SESSION['tv'];
		$achternaam = $_SESSION['achternaam'];
		$email = $_SESSION['email'];
		$rol = $_SESSION['rol'];
	}

	
?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>FileFuncties PHP</title>
	<link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
	<link rel="stylesheet" href="sk_stijl.css">
	</head>
	<body>


	<header>
	<h6><img src="kopje_klein.jpg" ><br> Welkom <?php echo "$user ($voornaam $tv $achternaam)" ?></h6>
	<hr>
	</header>
<?php
}

// EINDE kop()

/*

	Deze functie zet de voet van een pagina neer.

*/


function voet() {
?>
	<hr>
	<footer>
	<h6>&copy;2016 Havo 5 Greijdanus</h6>
	</footer>
<?php
}

//  EINDE voet()

/*
	Debug functie: op scherm tonen van een array variabele.
	Bijvoorbeeld: toon_lijst($POST);
*/
function toon_lijst($lijst) {
	print "<pre>";
	print_r($lijst);
	print "</pre>";
}


?>