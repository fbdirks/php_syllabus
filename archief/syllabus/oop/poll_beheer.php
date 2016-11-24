<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="pollstijl.css">
	</head>

	<body>
<?php
/*
Cases:

$_POST is niet gezet			: selectie scherm van de bestaande polls moet getoond worden. Is ook de default.
$_POST['muteer'] = getal  : de poll met id getal moet met kenmerken op het scherm gezet worden.
$_POST['wijzig'] = getal  : de poll met id getal moet gewijzigd gaan worden
$_POST['nieuw'] 					: er moet een nieuwe poll aangemaakt worden. 

*/
// ---------------------------------DEBUG---
$debug = true;
if ($debug) {
	print "<pre>";
	print_r($_POST);
	print "</pre>";
}
// -----------------------------------------
include "Poll_db.php";

print "<div class=\"main\">";
print "<h1>Poll beheer</h1>";

$Pol = new Poll_db();

if (isset($_POST['muteer'])) {
	$Pol->wijzigen();
} elseif (isset($_POST['wijzig'])) {
	$Pol->muteren();
} elseif (isset($_POST['nieuw'])) {
	$Pol->NieuwePoll();
} elseif (isset($_POST['deactiveer'])) {
	$Pol->DeactiveerPoll();
} elseif (isset($_POST['activeer'])) {
	$Pol->ActiveerPoll();
} elseif (isset($_POST['bekijk'])) {
	$Pol->Bekijken($_POST['bekijk']);
}

print "<br>";

print "Bewerk bestaande polls:<br>";
$Pol->Poll_select();	
print "<br>";
print "Activeer inactieve polls:<br>";
$Pol->PollInactiefSelect();


print "<a href=\"poll_beheer.php\">klik voor herstart</a>";
//Dit levert een id cijfer op van de poll die gewijzigd moet worden. 

print "</div>";

?>
</body>
</html>