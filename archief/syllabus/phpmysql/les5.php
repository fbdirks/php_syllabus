<?php
include "kop.php";



?>
<div class="main">

<h1>Les 5: Veilige invoer vanuit een formulier</h1>
<a href="#opdrachten"><h6>opdrachten</h6></a>
	
<p>Het internet is vol met risico's. Dat geldt niet alleen voor 'gewone' gebruikers, maar ook voor bezitters van websites en databases. Voorbeelden van gevaren zijn:</p>
<ul>
	<li>SQL injection</li>
	<li>Cross-site scripting</li>
</ul>
<p>Bij SQL injection voegt een kwaadwillende gebruiker aan de invoer die hij intypt in een formulier een stukje SQL toe in de hoop dat de SQL server die code gewoon uitvoert. Op de site van <a href="http://www.w3schools.com/sql/sql_injection.asp">W3schools</a> staan een paar goede voorbeelden. </p>

<p>Bij Cross site scripting worden scripts van een andere server (de server van de aanvaller) uitgevoerd op de huidige server alsof ze op die huidige server stonden. Ze doen zich dus onterecht voor als 'local' ten opzichte van deze server.</p>
<p>Hoe wapen je je hier tegen?</p>
<p style="color: red">In deze les leer je maar een paar (relatief eenvoudige) technieken om een database applicatie te beveiligen. Heb niet de illusie dat deze technieken voor een commerciele website voldoende zouden zijn. Het is een goed begin, maar ook niet meer dan dat Op <a href="http://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17">deze site</a> vind je een uitgebreide tutorial over beveiligingstechnieken met veel code voorbeelden.</p>
<br />
<h3>Controleer invoer</h3>
<p>Misschien heb je in de database eisen gesteld aan gegevens: een veld mag niet leeg zijn, een ander veld mag alleen maar cijfers bevatten en een volgend veld mag maar hooguit 60 tekens bevatten. Vertaal dat soort eisen ook in controles. Zorg ervoor dat als gebruikersinvoer niet door deze controle heen komt de query die met de gebruikersinvoer uitgevoerd moet gaan worden <em>niet</em> uitgevoerd wordt. Een goede techniek is het werken met een vlag-variabele, bijvoorbeeld $doorgaan. Zet deze aan het begin van de controles op <em>true</em>. Als de invoer niet door een bepaalde controle heen komt wordt de vlag op <em>false</em> gezet en voordat de query wordt uitgevoerd wordt naar die vlagvariabele gekeken. Hier zie je een klein voorbeeld:</p>


<?php
$code = '
$doorgaan = true;
if (!empty($_POST[\'name\'])) {
	$name = $_POST[\'name\'];
} else {
	$doorgaan = false;
}
// een hoop andere controles ....
if ($doorgaan) {
	$resultaat = mysqli_query($mysql,$query);
} else {
	print "De gegevens kloppen niet. Voer ze opnieuw in";
}
';
toon_code($code);
?>

<h3>'Escape' HTML codes </h3>
<p>Een deel van de problemen die kunnen ontstaan door de invoer van HTML of javascript codes in invoervelden kun je voorkomen door invoer van gebruikers te filteren met het commando <em>mysqli_real_escape_string</em>. Dit commando vertaalt tekens als &lt; en &gt; in zulke codes dat je er geen werkende HTML tag door krijgt. Een gebruiker kan dus niet een werkende link naar malware in zijn usernaam op nemen om maar wat te noemen. Het commando heeft een mysql connectie nodig (stap 1). Dit is dus een code voorbeeld van een goede filtering:</p>
<?php
$code = '
$mysql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$usernaam = mysqli_real_escape_string($mysql,$_POST[\'usernaam\']);
$bericht = mysqli_real_escape_string($mysql,$_POST[\'bericht\']);
// enzovoorts
';
toon_code($code);
?>
<br />
<h3>Hou database gegevens buiten beeld</h3>
<p>In de voorbeelden in deze lessen hebben we al steeds de database gegevens in een aparte file gestopt. Je kunt deze file een speciale naam geven en beschermen met een toegangsfiltering. </p>
<br />
<h3>Gebruik 'prepared statements'</h3>
<p>Deze techniek voorkomt veel ellende, maar is te gecompliceerd om hier uit te leggen. Wil je een commerciele site gaan opzetten met een database, dan raad ik je aan je deze techniek goed eigen te maken en vanaf de simpelste query toe te passen. Een goede tutorial vind je <a href="http://phphulp.jorendewit.nl/view/26/5/">hier.</a></p>
<br />
<br><br>
<div class="opdrachten">
<h3>Opdrachten 5</h3>
<p>Een aandachtspunt voor de volgende paragrafen: Controleer in de opdrachten van de volgende lessen vanaf nu altijd op het wel of niet ingevuld zijn van invoervelden.</p>
</div>
</div>
<?php
include "voet.php";
?>	