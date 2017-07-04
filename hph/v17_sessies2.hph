<?php
// we maken gebruik van $_SESSION en dus moet het volgende commando gegeven worden:
session_start();

$usernaam = $_SESSION['usernaam'];
$ingelogd = $_SESSION['ingelogd'];

if ($ingelogd){
	print "U was ingelogd als $usernaam.<br>";
	// Op de twee regels hieronder wordt het session bakje leeggemaakt en weggegooid. 
	session_unset(); # leegmaken
	session_destroy(); # uitzetten
	print "U bent nu uitgelogd, ververs de pagina om dat te controleren.";
} else {
	print "U bent niet ingelogd!! Ga terug naar <a href=\"v17_sessies.php\">v17_sessies.php</a> om opnieuw in te loggen.";
}


?>

	