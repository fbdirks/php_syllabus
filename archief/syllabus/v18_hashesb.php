<?php

if (isset($_POST['actie'])) {
	$ingegeven_password = $_POST['wachtwoord'];
	// Het vergelijkingsmateriaal: de hash van het wachtwoord Boerenkool
	
	// Extreem belangrijk: gebruik om een hash string enkele quotes in plaats van dubbele. 
	$hash_opgeslagen = '$2y$10$l3Wnrh4Qm7WX093h7TQ8Ie3u3Irws1b13/AJ0e.kfNsWoz6u.qE42'; 
	// In echte systemen staat natuurlijk nooit open en bloot in de code!! maar in een database.
		
	// ----controle----
	if (password_verify("$ingegeven_password",$hash_opgeslagen)) {
		print "password_hash() : Wachtwoorden zijn gelijk:<br>";
	} else {
		print "password_hash() : Wachtwoorden zijn <b>niet</b> gelijk:<br>";
	}
	// voor de beeldvorming:
	print "<hr>Opgeslagen hash: $hash_opgeslagen<br>";
	$hash_in = password_hash("ingegeven_password",PASSWORD_DEFAULT); 
	// Verrassing, dit zal nooit gelijk zijn aan de opgeslagen hash, ook al is het ingegeven wachtwoord goed!
	// Dat komt door het 'salten' dat password_hash automatisch doet.
	print "Berekende  hash: $hash_in  <i><br>(met nieuwe salt!! Gebruik dus altijd password_verify!!)</i><br>";
	print "<hr>";
}


?>
<br><br>
<form action="v18_hashesb.php" method="post">
Geef een wachtwoord in: <input type="text" name="wachtwoord"> (Goede wachtwoord = "Boerenkool")<br>
<input type="submit" name="actie" value="controleer">
</form>



	