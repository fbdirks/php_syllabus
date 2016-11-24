<?php
include "kop.php";



?>
<div class="main">
<h1>Les 4:verwerken van eenvoudige invoer in een query</h1>
	<a href="#opdrachten"><h6>opdrachten</h6></a>
<p>In verschillende situaties is het denkbaar dat invoer van een gebruiker nodig is voor het opbouwen van een query. Denk maar aan het inloggen op een website: aan de hand van de inloggegevens (usernaam en wachtwoord)  zal bij de gebruikersgegevens opgevraagd moeten worden of deze kloppen. Hoe verwerk je invoer van een gebruiker in een query? Daarover gaat deze les.
</p>
<p>
	Er zitten verschillende aspecten aan dit probleem:
	<ul>
		<li>Hoe verwerk je tekst invoer? Hoe verwerk je getalsinvoer?</li>
		<li>Hoe zorg je ervoor dat de gebruiker geen verkeerde invoer kan aanleveren die het systeem zou kunnen beschadigen?</li>
		<li>Hoe zorg je ervoor dat invoer en verwerking binnen dezelfde pagina uit elkaar gehouden kan worden?</li>
	</ul>
Niet al deze problemen hebben exclusief te maken met de combinatie php & mysql. 
</p>
<p>
	We bouwen in deze les voort op het voorbeeld met de bbc database. Stel je voor dat je de gegevens wilt opvragen van een land. De gebruiker zal via een formulier de naam van het land invoeren en op basis van die invoer zal de query opgebouwd en uitgevoerd worden.
</p>

<h3>Formulier maken</h3>
<p>We beginnen met het maken van het formulier. Dat is standaard html. Vergeet niet om de naam van het script achter action=  gelijk te stellen aan de naam van het php script zelf. Dit zou een een uitwerking kunnen zijn (de table tags zijn alleen maar nodig voor de iets nettere vormgeving):</p>
<?php
$code = '
<form action="formulier.php" method="post">
	<table>
		<tr>
			<td>Welk land?</td><td><input type="text" name="land"></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" name="start" value="start"></td>
		</tr>
	</table>
</form>
';
toon_code($code);
?>

<h3>
	Scheiden van invoer en verwerking
</h3>
<p>
	De scheiding van de invoer door de gebruiker en de verwerking daarvan door in de query kan plaats vinden op een manier die standaard is voor alle PHP formulierverwerking. De kern zit in het afvragen van de invoer van de toets waarmee het formulier wordt gestart. 
</p>
<p>We kijken naar het formulier hierboven. Als de gebruiker iets ingevuld heeft en op de knop heeft gedrukt is wordt de variabele $_POST['start'] (dat is de knop!) 'gezet'. Dat kunnen we gebruiken om na te gaan of iemand wel of niet op de knop gedrukt heeft.</p>
<p>Deze controlecode zetten we boven het formulier op deze manier:</p>
<?php
/*
$code = '
<?php
include "db_inc.php";
if (!isset($_POST[\'actie\'])) {
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
?>
		<form action="formulier.php" method="post">
			<table>
				<tr>
					<td>Welk land?</td><td><input type="text" name="land"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" name="start" value="start"></td>
				</tr>
			</table>
		</form>
<?php
	} else {
		// dingen die gedaan moeten worden als WEL op de knop gedrukt is
	}
?>
';
toon_code($code);
*/
?>
<?php
$code = '
<?php
include "db_inc.php";
if (!isset($_POST[\'actie\'])) {
	// dingen die gedaan moeten worden als NIET op de knop is gedrukt
	// => Formulier tonen!!
} else {
	// dingen die gedaan moeten worden als WEL op de knop gedrukt is
	// => Verwerking uitvoeren
}
?>
';
toon_code($code);
?>


<h3>
	Verwerken van tekstinvoer in variabelen.
</h3>
<p>Het opvragen van de ingevoerde waarde is niet zo moeilijk:</p>
<?php
$code = '$land = $_POST[\'land\'];';
toon_code($code);
?>
<p>Dit moeten we op de een of andere manier verwerken in de query en wel op de plek van de puntjes:</p>
<?php
$code = 'SELECT * FROM bbc WHERE name=\'.......\';';
toon_code($code);
?>
<p>Omdat de ingevulde waarde in de variabele $land terecht is gekomen moet PHP die hier kunnen invullen. We moeten daarom om de SELECT heen <em>dubbele aanhalingstekens</em> gebruiken omdat die PHP activeren om een variabele naam ($land) te vullen met <em>inhoud</em> van die variabele. Dit werkt prima:</p>
<?php
$code = '$query = "SELECT * FROM bbc WHERE name=\'$land\'";';
toon_code($code);
?>
<p>In de praktijk is het altijd wel even goed puzzelen op de aanhalingstekens om dit goed te krijgen. Het kan ook best op meer manieren. Deze manier werkt ook:</p>
<?php
$code = '$query = "SELECT * FROM bbc WHERE name=\'".$land."\'";';
toon_code($code);
?>
<p>
	Bij invoer die een getal voorstelt hoef je in de query de aanhalingstekens na het = teken niet te gebruiken. </p>
<p>Als de query klopt moet deze verwerkt gaan worden. Je kunt nu van het script van de vorige pagina bijna letterlijk de stappen 1/2, 3 en 4 overnemen. Alleen de query in stap 3 ziet er nu anders uit:
</p>
<?php
$code = '$land = $_POST[\'land\']; # opvragen van het ingevulde land
// en nu stap 1 - 4 (zonder al te veel commentaar):
$mysql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$query = "SELECT * FROM bbc WHERE name=\'$land\'";
$resultaat = mysqli_query($mysql,$query);
';
toon_code($code);
?>
<p>
	Stap 5 vergt wat meer denkwerk. Normaal gesproken zul je als je naar een land zoekt maar 1 resultaat krijgen. Voor de WHILE loop maakt dat eigenlijk niet uit. Je kunt die gewoon weer gebruiken. Alleen zal de loop nu na 1 rij stoppen, maar dat is nu juist goed. Wel veranderen we in die regel de <em>mysqli_fetch_row</em> in <em>mysqli_fetch_assoc</em>. Het hoeft niet per s&eacute;, maar ik vind het hier wel mooier. Wat is het verschil? Mysql_fetch_row haalt een rij op en stopt iedere kolom in de rij in een genummerd vakje. Dus, in dit geval komt in $rij[0] de naam van een land te staan en in $rij[1] de regio. Door mysqli_fetch_assoc te gebruiken worden de kolommen gestopt in vakjes die heten naar de veldnaam. Dus, dan staat de naam van het land ineens in $rij['name'] en de regio in $rij['region']. Het voordeel daarvan is dat je beter weet met welke velden je bezig bent als je er een mooie vormgeving aan wilt geven. Het is iets duidelijker. Kijk maar hoe in de volgende regels de informatie over het land dat opgevraagd is neergezet wordt:
 </p>
<?php
$code = '
while ($rij = mysqli_fetch_assoc($resultaat)) {
	print "Land = $rij[name]<br>";
	print "Regio = $rij[region]<br>";
	print "Bevolking = $rij[population]<br>";
	print "Oppervlakte = $rij[area]<br>";
	print "Bruto Nationaal Product = $rij[gdp]";
}
';
toon_code($code);
?>
<p>
	Dit ziet er redelijk strak en begrijpelijk uit. We voegen aan deze regels nog een eenvoudige verwijzing naar het formulier toe (zodat iemand nog een keer een land kan invullen) en het script is klaar <a href="formulier.php">en werkt</a>:
</p>
<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("formulier.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";


?>
<br><br>
<div class="opdrachten">
<a name="opdrachten"><h3>Opdrachten 4</h3></a>
<ol>
	<li>Verander het script zo dat je de informatie kunt opvragen van regio's. (Misschien moet je dan even nadenken over de vormgeving van het resultaat).</li>
	<li>Maak een formulier waarmee iemand kan zoeken naar landen die een bevolkingsaantal hebben tussen x inwoners en y inwoners. (Je moet dus twee invoervelden hebben)</li>
	<li><span class="liefhebbers">(Liefhebbers) Het is best wel lastig om steeds te moeten nadenken over de Engelse naam van landen. Maak een formulier waarmee het mogelijk is om te zoeken naar landen op een manier waarbij je niet de hele naam van het land letterlijk goed hoeft te hebben. (Tip: like)</span></li>
</ol>
</div>
</div> <!-- main -->
<?php
include "voet.php";
?>	