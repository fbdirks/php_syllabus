<?php
/*

	Dit is de basale inlogpagina van Het Suikerkopje.
	Op deze pagina wordt niet heel veel maar wel enig werk gemaakt van security.
	Je kunt de code naar believen uitbreiden, aanpassen of vervangen
	zolang de functies maar behouden blijven.

*/


// we hebben $_SESSION straks nodig
session_start();
include "sk_functies.php"

// Alleen aan het werk gaan als er formulierinvoer is.
if (isset($_POST['inloggen'])) {
		
	if (($_POST['username']=="") || ($_POST['ww']=="")) {
		$doorgaan = false; # username en wachtwoord mogen niet leeg zijn.
	} else {
		// formulier gegevens ophalen:
		$user = $_POST['username'];
		$ww = $_POST['ww'];
		
		// Hier moeten de usergegevens van de database uitgelezen worden
		// 1. Contactleggen & 2. Database selecteren
		// 3. Query opbouwen
		// 4. Query uitvoeren
		// 5. Resultaat verwerken
		// 6. Connectie verbreken
		// usergegevens inlezen vanaf schijf
		
		// Eindresultaat moet in ieder geval zijn dat $doorgaan de waarde True of False heeft:
		// $doorgaan is True als usernaam en wachtwoord goed waren
		// $doorgaan is False in alle andere gevallen.
		
		// Overweging: de controle_wachtwoord kan ook tot functie gepromoveerd worden en 
		// in sk_functies.php geplaatst!
		
	}
	
	// doorsturen naar volgende pagina of fout aan user melden.
	if ($doorgaan) {
		header('Location: sk_pagina1.php');
	} 
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
<br><br><br>
	<div class="main">
		<h2>Het Suikerkopje - Inloggen</h2>
		<?php echo $melding;?>
		<img src="kopje_klein.jpg" style="float: left; border: 1px solid grey; margin-left: 20px; ">
			<form action='sk_inlog.php' method='post'>
				Loginnaam:<br>
				<input type="text" name="username"><br>
				Wachtwoord:<br>
				<input type="password" name="ww"><br>
				<input type="submit" name="inloggen" value="inloggen">
			</form>
	</div>
	<div class="toelichting">
		<p>Demonstratie uitwerking - niet geschikt voor productie omgevingen</p>
	</div>
</body>
</html>