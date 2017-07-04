<?php

if (isset($_POST['actie'])) {
	$ingegeven_password = $_POST['wachtwoord'];
		
	// SHA1 gedeelte
	// Dit is de sha1 hash van 'Boerenkool':	
	$shash='b5c068340479381f2276319ad1b574b35a3a8b28';
	// In echte systemen staat natuurlijk nooit open en bloot in de code!! maar in een database.
	
	
	// ----controle-----
	// === betekent: 'is gelijk en is het zelfde type', dat is de strengste vergelijking
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
<form action="v18_hashesa.php" method="post">
Geef een wachtwoord in: <input type="text" name="wachtwoord"> (Goede wachtwoord = "Boerenkool")<br>
<input type="submit" name="actie" value="controleer">
</form>



	