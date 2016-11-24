<?php

session_start();

$doorgaan = false; # default is de deur op slot te houden, alleen als iemand ingelogd is gaat hij open:

if (isset($_SESSION['ingelogd'])) {
	if ($_SESSION['ingelogd']==true) {
		$doorgaan = true;
	} 
} 

if (!$doorgaan) {
	header('Location: file1.php');
} else {
	$user = $_SESSION['usernaam'];
	print "Welkom op pagina 2, $user!<br><br>";
	session_unset();
	session_destroy();
	print "Vanwege het uittesten bent u meteen uitgelogd! Klik <a href=\"file1.php\">hier</a> om meteen weer in te loggen.";
}