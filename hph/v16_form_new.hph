<?php

// let op de naam van de variabele BINNEN de functie
function toon_lijst($lijst) {
	print "<pre>";
	print_r($lijst);
	print "</pre>";
}

if (isset($_POST['actie'])) {
	print "Dit is de inhoud van $_POST:<br>";
	toon_lijst($_POST);
}
?>
<form action="v16_form_new.php" method="post">
	<table>
	<tr><td>Leeftijd:</td><td><input type="number" name="leeftijd"  min=0 max=120></td></tr>
	<tr><td>Geboortedag: </td><td><input type="date" name="geboortedag"></td></tr>
	<tr><td>Favoriete kleur: </td><td><input type="color" name="favokleur"></td></tr>
	<tr><td>Cijfer voor deze site: </td><td>0<input type="range" name="cijfer" min=0 max=10 step=1>10</td></tr>
	<tr><td>Je moet een groente kiezen:</td><td><input  name="groente" list="groentes"></td></tr>
			<datalist id="groentes">
				<option value="rode kool">
				<option value="witte kool">
				<option value="spruitjes">
			</datalist>

<tr><td><input type="submit" name="actie" value="Verzend"></td><td></td></tr>
</table>
</form>
	