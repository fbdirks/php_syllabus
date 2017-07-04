<?php

// let op de naam van de variabele BINNEN de functie
function toon_lijst($lijst) {
	print "<pre>";
	print_r($lijst);
	print "</pre>";
}

if (isset($_POST['actie'])) {
	toon_lijst($_POST);
}

$dagen = array("zo","ma","di","wo","do","vr","za");
$weken = array(10,11,12,13,14);

print "Dagen:<br>";
toon_lijst($dagen); # aanroep met array $dagen

print "Weken: <br>";
toon_lijst($weken); # aanroep met array $weken

?>
<br>
<hr>
<form action="v13_functies.php" method="post">
	Vul iets in:<input type="text" name="iets"><br>
	<input type="radio" name="zinvol" value="ja">Zeer zinvol
	<input type="radio" name="zinvol" value="matig">Maar weinig zinvol
	<input type="radio" name="zinloos" value="zinloos">Volkomen zinloos<br>
	<input type="submit" name="actie" value="Verzend">
</form>
	