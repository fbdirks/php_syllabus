<?php
include "kop.php";

?>
<div class="main">
<h1>Les 3: Verstandig gebruik van foutmeldingen</h1>
	<a href="#opdrachten"><h6>
		opdrachten
		</h6></a>
<p>Als dingen niet werken in een programma moet je er altijd voor zorgen dat je programma met je praat. Foutmeldingen zijn daarvoor heel belangrijk. Daarom moet je er in de eerste plaats voor zorgen dat foutmeldingen op jouw server aan staan. Als je zelf niet bij de configuratie van PHP kan zul je een heel klein bestandje aan je serverruimte moeten toevoegen waarin je aangeeft dat de foutmeldingen aangezet moeten worden. </p>
<p>Maak op je server een bestand aan dat je <em>php.ini</em> noemt en dat de volgende inhoud heeft:</p>
<pre><code class="language-php">display_errors = On
date.timezone = Europe/Amsterdam  </code></pre>

<p>En controleer of het werkt door in een php pagina bewust een fout php commando te geruiken, eggo in plaats van echo of iets dergelijks. Je moet dan een foutmelding te zien krijgen.</p>

<h3>Or Die...</h3>
<p>Er bestaat in PHP een commando waarmee kun je aan kunt geven wat voor foutmelding je wilt zien als een php commando er niet uitkomt. Als je op deze manier:</p>
<pre><code class="language-php">$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name) or die ("Mysql server kan niet bereikt worden";  </code></pre>

<p>het commando 'or die' gebruikt zul je die foutmelding ("MySQL server kan niet bereikt worden") te zien krijgen als je bijvoorbeeld het password fout hebt.</p>
<p>Als je verderop in het script bij de mysqli_execute regel een andere foutmelding op deze manier neerzet:</p>
<pre><code class="language-php">$resultaat = mysqli_query($mysql,$query) or die ("Query kon niet uitgevoerd worden";  </code></pre>

<p>zal je dus een andere foutmelding zien als de <em>connectie</em> niet lukt dan als de <em>query</em> niet lukt. Je weet dan dus beter <em>waar</em> de fout zit! Je kunt dit principe vervolgens ook gaan toepassen op mysqli_fetch_row of mysqli_close. Dat is maar net wat je wilt. Door de foutmelding steeds aan te passen op de situatie zorg je er voor dat je precies te horen krijgt waar het fout ging. Dat scheelt uitzoektijd.</p>
<h3>Mysql's eigen foutmeldingen</h3>
<p>In de ontwikkelfase van een webapplicatie is het vaak prettig om de echte foutmeldingen van Mysql zelf er bij te halen. Je kunt dit in de <em>or die</em> regel op deze manier verwerken:</p>
<pre><code class="language-php">$resultaat = mysqli_query($mysql,$query) or die ("Query kon niet uitgevoerd worden: ".mysqli_error($mysql); </code></pre>

<p>Let op die laatste toevoeging met mysqli_error, daar gaat het om. De variabele $mysql die tussen haken staat verwijst weer naar de connectie die in stap 1/2 is opgebouwd. Als jij die anders genoemd hebt (bijvoorbeeld $con) dan moet je hier ook die naam gebruiken. Test hem maar eens uit in het voorbeeldscript van Les 1 door de volgende query te proberen:  SELECT naam FROM bbc. Het veld 'naam' bestaat immers niet, dat moet 'name' zijn. Probeer het toch met <a href="europa_fout.php">europa_fout.php</a> en kijk welke foutmelding je krijgt.</p>
<h3>Laat de query zien voor de execute</h3>
<p>Een volgende prima techniek is om de query die je opbouwt in stap 3 en uitvoert in stap 4 tussen stap 3 en 4 in op het scherm te laten tonen:</p>
<pre><code class="language-php">print $query;  </code></pre>

<p>Als je script er in de query mee ophoudt staat de query nog net wel op het scherm en kun je hem selecteren en kopieren en dan in PHPMyAdmin plakken om te laten uitvoeren. PHPMyAdmin geeft dan meestal heel goede informatie die duidelijk maakt waarom de query niet werkt.</p>
<h3>
	Een laatste opmerking
</h3>
<p>
	Een laatste opmerking over foutmeldingen is dat je ze ook moet durven uitzetten. Foutmeldingen zijn goed als je aan het testen bent, maar als mensen jouw code aan het gebruiken zijn zullen ze foutmeldingen als irritant ervaren. Hackers kunnen uit foutmeldingen misschien iets afleiden over de structuur van je programma of database en daar hun voordeel mee doen. Dus: na het testen moet je foutmeldingen zo veel mogelijk weer uitzetten. 
</p>
<br><br>
<div class="opdrachten">
<a name="opdrachten"><h3>
	Opdrachten 3
</h3></a>
<ol>
	<li>Gebruik vanaf nu altijd 'or die' regels in de code die je schrijft om er achter te komen waar je fouten maakt.</li>
	<li>Gebruik in het script van les 1 op de plek van de query deze query: "SELECT SOM(gdp) FROM bbc", laat de query naar scherm printen en kijk met PHPMyAdmin wat er fout is (ook al zie je dat zelf ook wel).</li>
</ol>
</div>
</div> <!-- main -->
<?php
include "voet.php";
?>	