<?php

function is_priem($getal) {
	$deler = 2;
	while ($deler <= sqrt($getal)) {
		if ($getal%$deler==0) {
				return false;
		}
		$deler++;
	}
	return true;
}
// hoofdlus
if (isset($_POST['check'])) {
	$start = $_POST['start'];
	$einde = $_POST['einde'];

	for ($i=$start; $i<$einde; $i++) {
		if (is_priem($i)) {
			print("$i is een priemgetal <br>");
		}
	}
	print "Klaar..";
}
?>
<!-- formulier -->
<form action="30b.php" method="post">
	Startwaarde (&gt;1): <input type="text" name="start"><br>
	Eindwaarde: <input type="text" name="einde"><br>
	<input type="submit" name="check" value="Zoek priemgetallen tussen start en eind.">
</form>
