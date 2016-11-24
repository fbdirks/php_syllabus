<?php


session_start();
//print_r($_POST);
print_r($_SESSION);

include "Poll_session.php";

// als er nog geen vraag in Session is genoteerd wordt een nieuwe poll vraag klaargezet
if (!isset($_SESSION)) {
		$MijnPoll = new Poll_session();
		$MijnPoll->zetId("test");
		$MijnPoll->zetVraag("Je moet kiezen:");
		$MijnPoll->zetAntwoord(1,"Bach");
		$MijnPoll->zetAntwoord(2,"Bauer");
		$MijnPoll->zetAntwoord(3,"Bono");
		$MijnPoll->zetAntwoord(4,"Britney");
} else {
	// in het andere geval worden de poll gegevens opgehaald.
	$MijnPoll = new Poll();
	$id = $_SESSION[0];
	$MijnPoll->haalOp($id);
	$mijnPoll->maakPoll();

	print "Bestaande Poll";
}

// hier wordt het Poll object aan het werk gezet.
$MijnPoll->verwerkStem();  # deze kijkt of er gestemd is en verhoogt dan de aantallen
$MijnPoll->updatePoll();
$MijnPoll->toon(); # deze toont de poll op het scherm

print "<table border=\"2\"><tr>";
print "<td>";
$MijnPoll->resultaten(); # deze toont de resultaten op het scherm
print "</td><td>";
$MijnPoll->relatieve_resultaten($MijnPoll->getId());
print "</td>";
print "</tr></table>";
//$MijnPoll->gestemd4++;  #wordt het aantal stemmen op britney steeds opgehoogd?
/*
print "<pre>";
print_r($_POST);
print "</pre>";
*/

?>
