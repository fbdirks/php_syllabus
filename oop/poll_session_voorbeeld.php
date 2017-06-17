<?php
session_start();
include "Poll_session.php"; #  binnenladen van de klassedefinitie
$pl="pollA"; # nodig ter identificatie # aanmaken van nieuw klasseobject.

$MijnPoll = new Poll_session();

if (!isset($_SESSION['poll'])) {
	print "geconstateerd is: nieuwe poll! <br />";
	$MijnPoll->zetVraag("Je moet kiezen:");
	$MijnPoll->zetAntwoord(1,"Amsterdam");
	$MijnPoll->zetAntwoord(2,"Zwolle");
	$MijnPoll->zetAntwoord(3,"Hasselt");
	$MijnPoll->zetAntwoord(4,"Heerde");
	$MijnPoll->maakPoll($pl);
} else {
	$MijnPoll->haalOp($pl);
}

$MijnPoll->toon();
$MijnPoll->verwerkStem();
$MijnPoll->updatePoll();

print "<a href=\"reset.php\">reset</a>";

?>
