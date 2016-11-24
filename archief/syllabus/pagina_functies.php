<?php

function toon_lijst($lijst) {
	print "<pre>";
	print_r($lijst);
	print "</pre>";
}

// neer zetten van alle kopregels, kop hanteert de gemengde stijl (html apart van php)
function kop() {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Een pagina titel..</title>
		 <link rel="stylesheet" type="text/css" href="stijl.css">
	</head>		
		
	<body>
		<h3 style="text-align: right;font-variant:small-caps">PHP4ALL - een cursus php zonder discriminatie</h3>
		<hr>

<?php
}


// neerzetten van de voet regels, voet hanteert de geintegreerde stijl. Let op het gebruik van date op de eerste <h6> regel.
function voet() {
	print "<hr>";
	print "<h6 style=text-align:center>&copy;dsf ".date('Y')."</h6>";
	print "<h6 style=text-align:center><a href=\"index.php\">home</a></h6>";
	print "</body>";
	print "</html>"; 
}
	




?>
	