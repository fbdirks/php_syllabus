<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>28: Filefuncties I : lezen van een csv bestand</h2>
<p>PHP heeft een uitgebreid arsenaal aan functies die met bestanden werken. Een voorbeeld van een situatie waarin je dat nodig hebt is bijvoorbeeld het inlezen van gebruikersgegevens uit een excel sheet of het opslaan van een configuratie bestand </p>
<p>Stel je voor dat je deze gegevens wilt inlezen in een php webapplicatie:<br />
<br>
<table class="enkelelijn">
	<tr>
		<td>Naam</td><td>Rugnummer</td><td>Positie</td></tr>
	</tr>
	<tr><td>Jan</td><td>3</td><td>Keeper</td></tr>
	<tr><td>Piet</td><td>6</td><td>Linksachter</td></tr>
	<tr><td>Herman</td><td>5</td><td>Rechtsachter</td></tr>
	<tr><td>Fred</td><td>8</td><td>Middenveld</td></tr>
	<tr><td>Anton</td><td>2</td><td>Linksvoor</td></tr>
	<tr><td>Cees</td><td>11</td><td>Rechtsvoor</td></tr>
	
</table>
<br>
Hoewel het mogelijk is om een applicatie te schrijven die de bestandsformaten van Excel of Word kan lezen, is het beter te doen om bijvoorbeeld een Excel file als <i>csv bestand</i> op te slaan en die in te lezen. 'CSV' betekent: 'comma seperated value'. Het is een normaal tekst bestand waarbij op iedere regel de regels uit een tabel staan, gescheiden door een af te spreken teken. Vaak is dat de ; of de ,  maar het zou bij wijde van spreken ook de ! kunnen zijn. Een csv bestand van het bovenstaande voorbeeld ziet er zo uit:
<br><br>
<?php
toon_fragment("voorbeeld.csv","dos");
?>
<br>
Het 'scheidingsteken' is in dit geval de ;. Je kunt in Excel het scheidingsteken zelf kiezen. 
</p>
<p>PHP is goed in het regel voor regel inlezen van een dergelijk bestand (commando: <i>fgets()</i>. Er is zelfs een speciaal commando dat er van uit gaat dat een csv bestand regel voor regel ingeladen wordt: <i>filegetcsv</i>. Maar voordat van deze commando's gebruik gemaakt kan worden moet een bestand eerst geopend worden, als het ware 'aangemeld' worden bij PHP:
<?php
$code = "\$bestand = fopen('voorbeeld.csv','r');";
toon_code($code);
?>
<br>
Het commando fopen geeft een zg. 'handle', een variabele die voor PHP de link naar een bestand vormt. Bij alle bestandsfuncties moet opgegeven worden op welk bestand die functie toegepast gaat worden. Daarvoor gebruik je die 'handle'. Achter het open commando staat nog een enkele letter, in dit geval de 'r'. Dit geeft aan dat het bestand geopend moet worden om er uit te lezen (<b>r</b>ead). Een paar mogelijkheden zijn:
<ul>
	<li>r = read / lezen</li>
	<li>w = write / schrijven (overschrijft oud bestand met zelfde naam)</li>
	<li>a = append / toevoegen (om regels toe te voegen aan bestaand bestand)</li>
	</ul>
De andere mogelijkheden vind je opgesomd op <a href="http://php.net/manual/en/function.fopen.php" target="_blank">php.net</a>.
Een bestand dat je met fopen hebt geopend moet je, als je er niets meer mee hoeft te doen, sluiten met fclose(&lt;handle&gt;).</p>
<p>Het commando fgetcsv leest steeds &eacute;&eacute;n regel van het csv bestand in. Als er geen regel meer is levert fgetcsv een false status op. Daardoor kun je het gebruiken in een while loop. Hier zie je nog een keer de tabel van hierboven, maar dan door PHP ingelezen. De code die daarvoor zorgt staat er onder.</p>
<br>
<?php
$bestand = fopen('voorbeeld.csv','r');
$regel = 1;
$alles = array();
while ($rij = fgetcsv($bestand, 1000,';')) {
	$aantal = count($rij);
	print "$aantal elementen op regel $i: ";
	for ($i=0;$i<$aantal;$i++) {
		print $rij[$i];
		print " - ";
	}
	print "<br>";
	$alles[$regel]=$rij;
	$regel++;
	
}

fclose($bestand);
print"<br>En de code:<br><br>";
toon_file("28a.php","ja");

?>
<p>Op regel 1 wordt het bestand geopend voor 'lezen'. (NB: in dit programma wordt niet gecontroleerd of een bestand wel bestaat. Een niet bestaand bestand kun je niet openen om te lezen. Er volgt dan een foutmelding! Eventueel zul je die moeten afvangen!!). Op regel 4 wordt het commando fgetcsv aan het werk gezet. De 1000 geeft aan hoeveel tekens de regel maximaal mag hebben. 1000 is een veilige optie. De ";" geeft aan dat het scheidingsteken de ; is. fgetcsv splitst dan zelf de regel al in een aantal elementen die aan een array worden gekoppeld, in dit geval de array $rij.<br>
De functie count($rij), een ingebouwde functie in PHP, telt het aantal elementen in $rij. Dat aantal wordt gebruikt om in een kleine lus al die gegevens te printen in regels 7 - 10.<br>
Maar ook wordt de inhoud van een $rij toegevoegd aan de array $alles. De laatste drie regels laten, alleen maar om te overtuigen, zien dat in die array $alles inderdaad de hele array terecht is gekomen. Hun output staat hieronder:<br>
<?php
print "<pre>";
print_r($alles);
print "</pre>";

?>

</p>
<p>Je ziet dat de kolomkoppen hier nog gewoon in de array zijn opgenomen. PHP kan natuurlijk niet uit zichzelf weten dat de eerste regel de kolomnamen bevat. Je moet dus of die regels uit een csv bestand halen of PHP de eerste regel laten negeren als je die kolomkoppen niet nodig hebt.</p>
<p>Een ander opmerkelijk detail is dat deze array begint bij 1. Dat is puur het gevolg van ons eigen codeer werk, kijk maar op regel 2.</p>

<div class="opdrachten">
	<h2>Opdracht 1: maak het inlogsysteem compleet</h2>
	<p>Hier onder zie je 4 bestanden die bij elkaar een inlogsysteempje vormen. <b>File1.php</b> bevat niets dan het formulier. <b>File1_verwerking.php</b> bevat de (incomplete) code die usernaam en wachtwoord controleert door de userfile uit te lezen. <b>users.csv</b> is de userfile met twee users er in, <i>gast</i> met als gehasht wachtwoord (sha1!!) 'welkom', en <i>admin</i> met 'letmein' als wachtwoord. <b>File2.php</b> is de vervolgpagina voor als je correct inlogde.</p>
	<p>De opdracht is: maak File1_verwerking.php af zodat deze users.csv inleest en correct controleert of wachtwoorden kloppen.</p>
<?php
toon_file ('file1.php');
print"<br>";
toon_file('file1_verwerking.php');
print"<br>";
toon_file('users.csv');
print"<br>";
toon_file('file2.php');
	?>

<h2>Opdracht 2</h2>
<p>Schrijf een php pagina waarmee je users kunt toevoegen aan de userfile. Nu moet je dus schrijven naar <i>users.csv</i> en moet je een formulier maken dat je hierbij helpt.</p>
	
</div>

<?php
include "voet.php";

?>