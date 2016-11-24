<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>Hashes</h2>

<p>Een <i>hash</i> is een controlegetal dat hoort bij een verzameling gegevens, bijvoorbeeld een tekst of een wachtwoord. Een hashfunctie is een geprogrammeerde mathematische functie die de hash berekent. Het is daarbij idealiter de bedoeling dat verschillende gegevens altijd verschillende controlegetallen opleveren. De controlefunctie van een hash is &eacute;&eacute;nzijdig: je kunt wel van gegevens de hash berekenen, maar niet omgekeerd. Je kunt dus bij wachtwoorden wel zeggen of iemand het goede wachtwoord opgegeven heeft, maar je kunt uit de wachtwoord hash niet het wachtwoord reconstrueren.</p>
<p>
<?php 
$h1 = md5("Test");
$h2 = sha1("Test");
$h3 = md5("a");
$h4 = md5("It was the best of times, it was the worst of times.");
print "<table border=1>";
print "<tr><td>Bronstring</td><td>methode</td><td>Hash</td></tr>";
print "<tr><td>\"Test\" </td><td>md5</td><td>$h1</td></tr>";
print "<tr><td>\"Test\" </td><td>sha1</td><td>$h2</td></tr>";
print "<tr><td>\"a\" </td><td>md5</td><td>$h3</td></tr>";
print "<tr><td>\"It was the best of times,<br>it was the worst of times.\" </td><td>md5</td><td>$h4</td></tr>";
print "</table>";
?>
In het voorbeeld zie je dat iedere hash bestaat uit een vast aantal tekens, hoe groot de bron string ook is.
</p>



<p>Omdat je ook hashes kunt berekenen van bestanden kun je hashfuncties ook gebruiken om periodiek te controleren of een webpagina veranderd is buiten je medeweten. 
<?php
$toen = "70e39bc7d606a9bf9608afbf56b359e0";
$nu = hash_file('md5', '18_hashes.php');
print "Op 28 september 2016 om 11:16 had dit bestand ('18_hashes.php') een hash van <b><i>$toen</i></b>. Op dit moment is deze <b><i>$nu</i></b>. Als deze twee niet aan elkaar gelijk zijn is er iets in het bestand veranderd sinds 28/9/16|11:16.</p>";
?>

<p>Een <i>onkraakbaar</i> hash systeem bestaat naar mijn idee niet. Via brute force (= steeds opnieuw proberen van wachtwoorden) is ieder hash systeem te kraken, het kost alleen soms enorm veel tijd en rekenkracht. Het is de taak van een goede hash functie om die kraaktijd zo lang mogelijk te maken. Hoe langer deze is, hoe groter de kans dat de krakers afdruipen.</p>
<p>PHP heeft verschillende ingebouwde hashfuncties. Vanouds zijn <b>md5()</b> en <b>sha1()</b> bekend. Maar er zijn inmiddels ook al krachtiger systemen ingebouwd, zoals <b>crypt()</b> en <b>password_hash()</b></p>
<p>Het voorbeeld hieronder laat de moderne systemen in actie zien. In &eacute;&eacute;n van de voorbeeldjes (zie het commentaar) wordt gebruik gemaakt van 'salten'. Daaronder verstaan we het toevoegen van een extra codewoord aan het berekenen van een hash waardoor bijvoorbeeld het wachtwoord 'test' op de ene site niet dezelfde hash zal opleveren als op de andere. Ook dit is iets dat de kraaktijd van hashes kan verlengen. Het 'salten' zit helemaal ingebouwd in het password_hash commando en is dus volledig random. In de hash die password_hash oplevert zit de hash ingebouwd en password_verify kan dus uit een password hash de 'salt' destilleren en die toevoegen aan de ingegeven vergelijking. Daarom vergelijkt password_verify een hash echt met de salt die op het moment van eerste berekening gebruikt is en niet de salt die op het moment van invoeren van het te controleren wachtwoord gegenereerd wordt. Je kunt dus echt alleen maar password_verify gebruiken om wachtwoorden te vergelijken. Simpel de hash van iets uitrekenen is onvoldoende.</p>

<p>Een voorbeeld met sha1:</p>
<?php
toon_file("v18_hashesa.php");
?>
<p>Een voorbeeld met het modernere en beter password_hash():</p>
<?php
toon_file("v18_hashesb.php");
?>
<p>SHA1 en MD5 zijn bekende en veel gebruikte systemen. Dit kan een veiligheidsrisico opleveren. Omdat mensen meestal niet zo'n zin hebben in het bedenken van veel en moeilijke wachtwoorden zijn bepaalde wachtwoorden altijd heel populair. Schoolvoorbeelden: "Test" en "letmein". Stel je voor dat een hacker de hand heeft weten te leggen op de database met usernamen. Deze bevat voor alle users ook de <i>hashes</i> van de wachtwoorden. Omdat je niet van de hash terug kunt werken naar het wachtwoord lijk je daar niets aan te hebben. Maar je kunt als hacker natuurlijk wel wachtwoorden gaan proberen. Begin dan met "geheim" "letmein" "1234" en "test". Bereken daar de hash van. </p>
<p>Vervolgens ga je in de database zoeken naar wachtwoordhashes die hier gelijk aan zijn, en zo weet je in een mum van tijd welke users deze 4 wachtwoorden gebruiken. Zo'n tabel van verwachte of veel voorkomende hashes heet een "rainbowtable". Dit voorbeeld is supersimpel. Maar er zijn ook heel geavanceerde en grote rainbowtabellen.  Als op een site 'salten' gebruikt wordt hebben deze tabellen meteen veel minder zin. Tenzij het 'salt' bekend raakt natuurlijk... </p>
<?php
$geheim = sha1("geheim");
$letmein = sha1("letmein");
$een234 = sha1("1234");
$test = sha1("test");
$geheim2 = md5("geheim");
$letmein2 = md5("letmein");
$een2342 = md5("1234");
$test2 = md5("test");
print "<br><h4>Een fragment van een eenvoudige rainbowtable:</h4>";
print "<table border=1>";
print "<tr><td>ww</td><td>sha1 hash</td><td>md5 hash</td></tr>";
print "<tr><td>geheim</td><td>$geheim</td><td>$geheim2</td></tr>";
print "<tr><td>letmein</td><td>$letmein</td><td>$letmein2</td></tr>";
print "<tr><td>1234</td><td>$een234</td><td>$een2342</td></tr>";
print "<tr><td>test</td><td>$test</td><td>$test2</td></tr>";
print "</table>";

print "<br><h4>Een fragment van een buitgemaakte gehashte wachtwoordtabel (sha1):</h4>";
$gebruikers = array("Jan" => "a", "Piet"=>"b", "Klaas"=>"test","Epi"=>"c","Johan"=>"letmein");
print "<table border=1>";
print "<tr><td>user</td><td>wachtwoord</td></tr>";
foreach ($gebruikers as $key => $value) {
	$pwd = sha1($value);
	print "<tr><td>$key</td><td>$pwd</td></tr>";
}
print "</table>";
?>

<p>In het bovenstaande voorbeeld zijn Klaas en Johan de pineut, maar dat had je vast al wel gezien...</p>
<?php
include "voet.php";

?>