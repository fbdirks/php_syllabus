<?php
include "kop.php";
?>
<div class="main">

<h1>Les 2: de 6 stappen</h1>
<p>Als je een mysql database wilt benaderen met een php script moet je 6 stappen zetten:

<ol>
<li><a href="#1">Stap 1: Contact leggen met de mysql server</a></li>
<li><a href="#2">Stap 2: De juiste database selecteren</a></li>
<li><a href="#3">Stap 3: De query opbouwen</a></li>
<li><a href="#4">Stap 4: De query uitvoeren</a></li>
<li><a href="#5">Stap 5: Het resultaat verwerken</a></li>
<li><a href="#6">Stap 6: De verbinding met mysql verbreken</a></li>
<li><a href="#voorbeeld">Het complete voorbeeld</a></li>
<li><a href="#opdrachten">Opdrachten</a></li>
</ol>

<div class="main">
<h3><a name="1">1. Contact leggen met de mysql server</a>  & <a name="2">2. Database selecteren</a></h3>
<p>In de <em>mysqli-extensie</em> worden stap 1 en stap 2 in &eacute;&eacute;n php regel gecombineerd:</p>
<?php
$code = '$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);';
toon_code($code);
?>
<p>De variabelen $db_server, $db_user, $db_password en $db_name moeten dan gevuld zijn met de juiste waarden voor jouw database. Dat zal per provider verschillen. Het is een goed idee om deze variabelen te vullen in een apart bestand, bijvoorbeeld db_gegevens.php  en dat via een include regel in te laden (dit moet voor de mysqli_connect regel gebeuren!):</p>
<?php
$code = 'include "db_gegevens.php";';
toon_code($code);
?>
<p>In dat bestand staat dan bijvoorbeeld:</p>
<?php

$code = '<?php  
$db_server = "localhost";
$db_user = "dbadmin01";
$db_password = "ultrageheim";
$db_name="mijnDb";
?> ';
toon_code($code);
?>
<p>Alle pagina's die met de mysql database willen communiceren kunnen dit bestand gebruiken. Als de gegevens wijzigen hoef je alleen <em>dit</em> bestand te veranderen. Als je bij $db_server niet weet wat je moet invullen is 'localhost' meestal de beste keuze! Dit betekent dat het phpscript op dezelfde server draait als de mysql server en meestal is dat zo.</p>
</p>
<a name="3"><h3>3. Query opbouwen</h3></a>
<p>Voor deze stap is niet veel PHP kennis nodig. Wel moet je weten (a) hoe de database waarmee je werkt in elkaar zit (strokendiagram!) en (b) wat je daar precies voor informatie uit wilt ophalen. De SQL query die hierbij hoort stop je in de variabele $query (de naam is maar een voorbeeld) waarbij je goed moet letten op de eventueel nodige aanhalingstekens of escapes.</p>
<?php
$code = '$query = "SELECT * FROM bbc WHERE region = \'Europe\'";';
toon_code($code);
?>
<p></p>
<a name="4"><h3>4. Query uitvoeren</h3></a>
<p>Ook deze stap is wat PHP betreft erg eenvoudig. Je hoeft eigenlijk alleen maar te beslissen of je een foutmelding wilt laten geven als de query niet lukt (daar komen we later op terug). De twee variabelen die je in het commando moet noemen zijn de mysql connectie (uit stap 1/2) en de query uit stap 3. De variabele waar het de query zijn resultaat in stopt (in het voorbeeld $resultaat) is in principe een mysql tabel. PHP kan daar op zich nog niets mee. Daarvoor heb je stap 5 nodig.</p>
<?php
$code = '$resultaat = mysqli_query($mysql,$query);';
toon_code($code);
?>
<a name="5"><h3>5. Resultaat verwerken</h3></a>
<p>In deze stap zul je wel PHP kennis nodig hebben. Verderop zullen we nog een aantal speciale voorbeelden laten zien van dingen die je hier kunt doen. In het voorbeeld maken we gebruik van twee veel voorkomende technieken:  via <em>mysqli_fetch_row</em> ga je de mysql tabel $resultaat rij voor rij leeghalen. Iedere keer vult de variabele $rij zich met een nieuwe rij uit $resultaat. Dat gebeurt in de <em>while loop</em> in het voorbeeld. Binnen de while-loop haal je vervolgens met het <em>for each</em> commando veld voor veld uit de $rij op en zet je in de pagina.</p>
<?php
$code = 'while ($rij = mysqli_fetch_row($resultaat)) {
 echo "<tr>";
 foreach ($rij as $veld) {
	echo "<td>$veld</td>";
 }
 echo "</tr>"; 
}
' ;
toon_code($code);
?>


<a name="6"><h3>6. Verbinding verbreken</h3></a>
<p>Dit is weer een makkie. Het is eigenlijk niet eens nodig: de mysql server verbreekt na een aantal seconden inactiviteit vanzelf de verbinding. Maar het is netter om zelf aan te geven dat dit ook werkelijk de bedoeling is.</p>
<?php
$code = 'mysqli_close($mysql);';
toon_code($code);
?>
<a name="voorbeeld"><h3>7. Het complete voorbeeld</h3></a>
<p>Dit is dan het complete voorbeeld (inclusief commentaar regels) in code en <a href="europa.php">in actie</a>:</p>

<?php
	$code = '';
	$geshi = new GeSHi($code, 'php');
	$geshi->load_from_file("europa.php");
	
	$code = $geshi->parse_code($geshi);
	echo "<table class=\"query\" width=40% bgcolor=\"#ffff80\">";
	echo "<tr><td>$code</td></tr>";
	echo "</table>";


?>
<br><br>
<div class="opdrachten">
<a name="opdrachten"><h3>Opdrachten 2</h3></a>
<p>Maak de volgende opdrachten:</p>
<ol>
<li>Installeer <a href="bbc.sql">bbc.sql</a> op jouw mysql server</li>
<li>Pas het voorbeeldscript (hierboven) zo aan dat het ook op jouw server looopt.</li>
<li>Maak op basis van het voorbeeldscript een php pagina die een lijst geeft van alle landen uit Africa</li>
<li><span class="liefhebbers">(liefhebbers) Maak op basis van het voorbeeldscript een php pagina die per regio telt hoeveel landen er in de regio zitten</span></li>
<li><span class="liefhebbers">(liefhebbers) Maak werk van de opmaak van deze laatste pagina. Zet er een titel boven, verander het lettertype en meer van dat soort dingen.</span></li>
</ol>
</div>
</div>
<?php
include "voet.php";
?>	