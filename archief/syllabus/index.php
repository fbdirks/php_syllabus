<?php

include "kop.php";
print "<table align=\"center\" width=\"75%\">";
print "<tr><td>";
print "<div align=\"left\">";
print "<h3 align=\"center\">PHP Syllabus.</h3><br/>";
print "Op deze pagina's worden de belangrijkste basiselementen van PHP programmeren besproken.";
print "De links verwijzen naar uitleg pagina's. Het getal met het paragraafnummer verwijst naar het nummer van de unit";
print " in CodeAcademy waar het interactieve lesmateriaal staat. &sect;X betekent dat CodeAcademy de stof niet behandelt.";
print "</div>";
print "</td></tr></table>";
print "<hr>";
//print "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";
print "<table align=\"center\">";
// inlezen bestand
$file="scripts_voorbeelden.txt";
$fopen = @fopen($file,"r");
$ln=0;
while (! feof($fopen)) {
	$regel = fgets($fopen);
	$regel_inhoud = explode(",",$regel);
	++$ln;
	$lijst[$ln]['bestandsnaam'] = $regel_inhoud[0];
	$lijst[$ln]['paragraaf'] = $regel_inhoud[1];
	$lijst[$ln]['omschrijving'] = $regel_inhoud[2];
	if ($lijst[$ln]['bestandsnaam']=="spacer") $ln--;
}
fclose($fopen);


// hoeveel regels?  $ln;

// Dit onderdeel maakt de klik-links aan bovenin beeld.
for ($i=1; $i<=$ln; $i++) {
	$bestandsnaam = $lijst[$i]['bestandsnaam'];
	$paragraaf = $lijst[$i]['paragraaf'];
	$omschrijving = $lijst[$i]['omschrijving'];

	if ($bestandsnaam=="spacer") {
		print "<tr><td colspan=\"4\"><hr></td></tr>";
	} elseif ($bestandsnaam[0]=="#") {
		$niks = 0;
	} else {
		//print "<tr><td>";
		print "<tr><td style=\"text-align: right\">$i. </td>";
		print "<td><a href=\"$bestandsnaam\" >$omschrijving</a>";
		print "</td><td>(<i>&sect;$paragraaf</i>)";
		//print "</td><td>$omschrijving";
		print "</td></tr>";
	}
}
print "<input type=\"hidden\" name=\"start\" value=\"ok\">";
print "</table>";
//print "</form>";


//print "<div align=\"center\">";
include "voet.php";
?>



