<?php
/*
print "<pre>";
print_r($_REQUEST);
print "</pre>";
*/
include "kop.php";
include "db_inc2.php"; # inlezen van de database gegevens de db_connect functies.

include_once('../geshi.php');

include "landvragen.php";

// Contact maken met de database via de db_connect functie van db_inc.php
$mysql = db_contact();

echo "<h1 align=\"center\">Opdrachten BBC database:</h1>";
echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">";
if(isset($_REQUEST['vragen'])) {
	$g = $_REQUEST['vragen'];
} else {
	$g = 1;
}
echo "<div align=\"center\">";
echo "<select name=\"vragen\">";
echo "<option value=\"1\"".geselecteerd(1,$g).">1 Welke informatie staat in de tabel?</option>";
echo "<option value=\"2\"".geselecteerd(2,$g).">2 Sorteer de tabel op land</option>";
echo "<option value=\"3\"".geselecteerd(3,$g).">3 Sorteer de tabel op regio</option>";
echo "<option value=\"4\"".geselecteerd(4,$g).">4 Sorteer de tabel op regio daarna (aflopend) op bevolking</option>";
echo "<option value=\"5\"".geselecteerd(5,$g).">5 Welke verschillende regio's zijn er?</option>";
echo "<option value=\"6\"".geselecteerd(6,$g).">6 Maak een lijst van landen en hun oppervlakte, de grootste landen het eerst</option>";
echo "<option value=\"7\"".geselecteerd(7,$g).">7 Maak een lijst van landen met meer dan 1.000.000 inwoners</option>";
echo "<option value=\"8\"".geselecteerd(8,$g).">8 Maak een lijst van landen waar het GDP niet is ingevuld</option>";
echo "<option value=\"9\"".geselecteerd(9,$g).">9 Maak een lijst van landen waarvan de naam op land eindigt</option>";
echo "<option value=\"10\"".geselecteerd(10,$g).">10 Maak een lijst van landen waarin de naam 'land' voorkomt</option>";
echo "<option value=\"11\"".geselecteerd(11,$g).">11 Zijn er landen waarvan de naam op q eindigt?</option>";
echo "<option value=\"12\"".geselecteerd(12,$g).">12 Zijn er landen waarvan de naam precies 4 letters bevat?</option>";
echo "<option value=\"13\"".geselecteerd(13,$g).">13 Maak een lijst van landen uit Azie (South Asia of Asia-Pacific)</option>";
echo "<option value=\"14\"".geselecteerd(14,$g).">14 Maak een lijst van landen uit het amerikaanse deel van de wereld</option>";
echo "<option value=\"15\"".geselecteerd(15,$g).">15 Maak een lijst van landen in Europa of ergens in Azie die minder dan 10.000.000.000 verdienen</option>";
echo "<option value=\"16\"".geselecteerd(16,$g).">16 Maak een lijst van de bevolkingsdichtheid (pop/area) van de europese landen</option>";
echo "<option value=\"17\"".geselecteerd(17,$g).">17 Maak een lijst van landen en het GDP per inwoner van dat land (omgekeerd gesorteerd op GDP/pc)</option>";
echo "<option value=\"18\"".geselecteerd(18,$g).">18 Wat is het gemiddelde GDP in de hele wereld?</option>";
echo "<option value=\"19\"".geselecteerd(19,$g).">19 Wat is het gemiddelde GDP in Europa?</option>";
echo "<option value=\"20\"".geselecteerd(20,$g).">20 Hoeveel landen tellen de Aziatische regio's?</option>";
echo "<option value=\"21\"".geselecteerd(21,$g).">21 Van hoeveel landen is het GDP niet ingevuld?</option>";
echo "<option value=\"22\"".geselecteerd(22,$g).">22 Wat is het grootste GDP in de database?</option>";
echo "<option value=\"23\"".geselecteerd(23,$g).">23 Wat is het grootste bevolkingsaantal in een Europees land?</option>";
echo "<option value=\"24\"".geselecteerd(24,$g).">24 Wat is het land in de wereld met de meeste mensen?</option>";
echo "<option value=\"25\"".geselecteerd(25,$g).">25 Uit welke regio komt het land met het grootste GDP?</option>";
echo "<option value=\"26\"".geselecteerd(26,$g).">26 Wat is de gemiddelde oppervlakte van de Europese landen?</option>";
echo "<option value=\"27\"".geselecteerd(27,$g).">27 Hoeveel landen zitten er in iedere regio?</option>";
echo "<option value=\"28\"".geselecteerd(28,$g).">28 Wat is van iedere regio het gemiddelde GDP en de bevolkingsdichtheid?</option>";
echo "<option value=\"29\"".geselecteerd(29,$g).">29 Wat is volgens de database de totale oppervlakte van alle landen in de wereld?</option>";
echo "<option value=\"30\"".geselecteerd(30,$g).">30 Hoeveel mensen wonen er volgens de database in de hele wereld?</option>";


echo "</select>";
echo "<input type=\"submit\" value=\"Laat zien\" name=\"selecteer\">";
echo "</div>";
echo "<div align=\"center\">";
$qe="";

if (isset($_REQUEST['zoekopdracht'])) {
	$qe = stripslashes ($_REQUEST['zoekopdracht']);
	$qe_ingevuld = $qe;

}


if (isset($_REQUEST['query_overnemen'])) {
	$qe_ingevuld = stripslashes($_REQUEST['qe']);
} 



if (isset($_REQUEST['vragen'])) {
	if (isset($_REQUEST['zoekopdracht'])) {
		if ($_REQUEST['zoekopdracht'] = "" ) {
			$nr = $_REQUEST['vragen'];
			$qe_ingevuld = selecteer_vraag($nr);
		} 
	}
	$nr = $_REQUEST['vragen'];
	$qe_ingevuld = selecteer_vraag($nr);
}


// Tabel neerzetten
echo "<table align=\"center\"><tr>";
echo "<td valign=\"top\" width=\"40%\">Documentatie:<br />";
echo "<ol>";
echo "<li><a href=\"bbc.html\" target=\"_new\">Landendatabase</a></li>";
echo "</ol>";
echo "</td>";
echo "<td>Bewerk de query:<br />";
echo "<textarea name=\"zoekopdracht\" cols=\"40\" rows=\"8\" >$qe_ingevuld</textarea>";
echo "<input type=\"hidden\" name=\"qe\" value=\"$qe\"></td>";
echo "</tr>";
echo "</table>";
echo "<input type=\"hidden\" name=\"resultaat\" value=\"ok\" />";
echo "<input type=\"submit\" value=\"Verzend\" name=\"Verzend\"/> <input type=\"reset\" value=\"Wis\" />";

// Verwerking van de query.
$a = isset($_REQUEST['vragen']) ;
$b = isset($_REQUEST['Verzend']);

if ( (isset($_REQUEST['vragen'])) || (isset($_REQUEST['Verzend'])) ) {
   if ($b) {
   	$query =$_REQUEST['zoekopdracht'];
   } else {
		$query = $qe_ingevuld;   
   };
	$query=stripslashes($query);
	$geshi = new GeSHi($query, 'sql');
	$code = $geshi->parse_code($geshi);
	echo "<table width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>";
   echo "De query is <br /><h3>$code</h3>";
   echo " <center><input type=\"submit\" name=\"query_overnemen\" value=\"Query Overnemen\"></center> ";
   echo "</td></tr>";
   echo "</table>";
   echo "</form>";

   $start = substr($query, 0, 6);
	$lengte = strlen($query);
	$slot = substr($query,  -1);
   //$query = substr($query, $lengte-1);
	$start = strtoupper($start);
	if ($start == "SELECT") {

			print "<br>Query verwerken ... momentje ...<br>";

			$resultaat = mysqli_query($mysql,$query) or die ("<br /><b>Query is niet gelukt.</b> Vergeet bij de Bibliotheek database niet de tabelnamen in hoofdletters te schrijven!");
			$aantal_kolommen = 0;
			while ($kolom = mysqli_fetch_field($resultaat)) {
				//echo "Kolom naam : ".$kolom->name; # alleen debug
				$kolom_naam[$aantal_kolommen] = $kolom->name;
				$aantal_kolommen++;
			}

			// resultaat verwerken
			echo "<table border=\"1\">";
			echo "<tr><td bgcolor=\"#80FF80\"></td>";
			for ($i=0; $i<$aantal_kolommen; $i++) {
				echo "<td bgcolor=\"#80FF80\">$kolom_naam[$i]</td>";
			}
			echo "</tr>";

			$t = 0;
			$kolom = 1;
			while ($rij = mysqli_fetch_array($resultaat)) {
			   	echo "<tr>";
				$kleur = kleurwissel($t);
				echo "<td bgcolor=\"$kleur\">$kolom</td>";
				for ($i=0; $i<$aantal_kolommen; $i++) {
					echo "<td bgcolor=\"$kleur\">$rij[$i]</td>";
				}
				echo "</tr>";
				$kolom++;
				$t++;
			}

	} elseif (!(isset($_REQUEST['query_overnemen']))) {
		echo "<font color=\"#FF0000\">De query begint niet met SELECT.</font> ";
	}




    echo "</table>";
 }
echo "</div>";

include "voet.php";
?>