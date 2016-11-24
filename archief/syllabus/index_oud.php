<?php

include "kop.php";
print "<table align=\"center\" width=\"75%\">";
print "<tr><td>";
print "<div align=\"left\">";
print "<h3>PHP Syllabus.</h3><br/>";
print "Op deze pagina's worden de belangrijkste basiselementen van PHP programmeren besproken.";
print "De links verwijzen naar uitleg pagina's. Het getal met het paragraafnummer verwijst naar het nummer van de unit";
print " in CodeAcademy waar het interactieve lesmateriaal staat.";
print "</div>";
print "</td></tr></table>";
print "<hr>";
print "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";
print "<table>";
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
		print "<tr><td>";
		print "<a href=\"$bestandsnaam\" >$bestandsnaam</a>";
		print "</td><td>(<i>&sect;$paragraaf</i>)";
		print "</td><td>$omschrijving";
		print "</td></tr>";
	}
}
print "<input type=\"hidden\" name=\"start\" value=\"ok\">";
print "</table>";
print "</form>";

/*
// Dit onderdeel moet de source code op het scherm zetten na een klik.
print "<table border=\"1\" width=\"90%\" cellpadding=\"25\">";
print "<tr><td bgcolor=\"#ffdc87\">";

//include_once('../geshi/geshi.php');
$source="";
$language="php";
$geshi = new GeSHi($source, $language);
//print_r($_POST);
if (isset($_POST['start'])) {
	$codelijst = array_keys($_POST);
	
	$patroon='/_([[:alnum:]]+?)$/'; #\w staat voor alphanum karakters (perl)
	$vervanging='.\1';
	$code = preg_replace($patroon,$vervanging,$codelijst[0]);
	$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
	$geshi->load_from_file("$code");
	print "<h2>Sourcecode $code</h2>";
	print $geshi->parse_code();
}

print "</td></tr></table>";
*/
print "<div align=\"center\">";
include "voet.php";
?>



