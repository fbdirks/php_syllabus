<?php

session_start();

$_SESSION['usernaam']="Jan";
$_SESSION['ingelogd']=True;

print "Jan is ingelogd. maar weet de volgende pagina dat ook? Er staat hier geen formulier op de pagina!<br>";

print "<a href=\"v17_sessies2.php\">Klik hier om naar de volgende pagina te springen</a>";

?>

	