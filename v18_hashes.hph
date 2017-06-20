<?php

if (isset($_POST['actie'])) {
	$ingegeven_password = $_POST['wachtwoord'];
		
	// Het vergelijkingsmateriaal: de hash van het wachtwoord Boerenkool
	// Extreem belangrijk: gebruik om een hash string enkele quotes in plaats van dubbele.
	$hash_opgeslagen = '$2y$10$l3Wnrh4Qm7WX093h7TQ8Ie3u3Irws1b13/AJ0e.kfNsWoz6u.qE42'; 
	
	print"Strenge password_hash() methode: <br>";	
	// ----controle----
	if (password_verify("$ingegeven_password",$hash_opgeslagen)) {
		print "password_hash() : Wachtwoorden zijn gelijk:<br>";
	} else {
		print "password_hash() : Wachtwoorden zijn <b>niet</b> gelijk:<br>";
	}
	// voor de beeldvorming:
	print "<hr>Opgeslagen hash: $hash_opgeslagen<br>";
	$hash_in = password_hash("ingegeven_password",PASSWORD_DEFAULT);
	print "Berekende  hash: $hash_in  <i><br>(met nieuwe salt!! Gebruik dus altijd password_verify!!)</i><br>";
	print "<hr>";

// SHA1 gedeelte
	
	print "<br>Meer traditionelere SHA1 methode: <br>";
	$shash='b5c068340479381f2276319ad1b574b35a3a8b28';
	// ----controle-----
	if (sha1($ingegeven_password)===$shash) {
		print "(SHA1) Wachtwoorden zijn gelijk.";
	} else {
		print "(SHA1) Wachtwoorden zijn <b>niet</b> gelijk.";
	}
	// voor de beeldvorming:
	print "<hr>SHA1(Boerenkool) = $shash<br>";
	print "SHA1($ingegeven_password) = ".sha1($ingegeven_password);
	print "<hr>";
}


?>
<br><br>
<form action="v18_hashes.php" method="post">
Geef een wachtwoord in: <input type="text" name="wachtwoord"> (Goede wachtwoord = "Boerenkool")<br>
<input type="submit" name="actie" value="controleer">
</form>



	