<?php

include "Poll_db.php";

$MijnPoll = new Poll_db();

$MijnPoll->zetVraag("Je moet kiezen:");
$nr = $MijnPoll->checkId(); 

if (empty($nr)) {
	// de poll bestaat nog niet: aanmaken dus!
	$MijnPoll->zetAntwoord(1,"Amsterdam");
	$MijnPoll->zetAntwoord(2,"Zwolle");
	$MijnPoll->zetAntwoord(3,"Hasselt");
	$MijnPoll->zetAntwoord(4,"Heerde");
	$MijnPoll->maakPoll();
} else {
	// de poll bestaat: ophalen dus!
	$MijnPoll->haalOp($nr);
}

$MijnPoll->toon();  # op scherm zetten
$MijnPoll->verwerkStem();  # stem verwerken (incl. resultatenknop!)
$MijnPoll->updatePoll();  # gegevens in database aanpassen
