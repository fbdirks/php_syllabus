<?php

include "Poll_db.php";

print "<h1>Voorbeeld van Poll object</h1>";

print "<p>Links loopt de Poll op een mysql database, rechts op een flatfile.";




print "<table><tr><td>";

	$MijnPoll = new Poll_db();
	$nr = 1;
	$MijnPoll->haalOp($nr);
	$MijnPoll->toon();
	$MijnPoll->verwerkStem();
	$MijnPoll->updatePoll();
	$MijnPoll->resultaten();

print "</td><td width=\"50\"><td>";

include "Poll_file.php";
	$naam = "test";
	$MijnPoll2 = new Poll_file();
	$MijnPoll2->haalOp($naam);
	$MijnPoll2->toon();
	$MijnPoll2->verwerkStem();
	$MijnPoll2->updatePoll();
	$MijnPoll2->resultaten();

print "</td></tr></table>";



?>

