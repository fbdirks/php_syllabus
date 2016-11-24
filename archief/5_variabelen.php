<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>Variabelen in PHP</h2>

<p>Een variabele is een stuk geheugen met een naam. Door variabelen in een programma te gebruiken laat je open met welke waarden of teksten het programma moet werken. Dat wordt later bepaald door een bepaalde waarde te stoppen in het geheugen.</p>
<p>Variabelen herken je in php door de naam: variabelen beginnen met het teken $. Na de $ mag een letter (hoofdletter of kleine letter) of een _ komen te staan en daarna pas mogen naast letters of een _ ook cijfers gebruikt worden. Niet alle variabele-namen zijn dus geldig:
	<ul>
		<li>Geldig:  $test, $aaa, $_test, $_1e, $WINST</li>
		<li>Ongeldig: $1e, $-WINST,$0</li>
	</ul>
	PHP is hoofdletter gevoelig. $_winst is dus niet hetzelfde als $_Winst !!
</p>
<p>Variabelen hebben een bepaald type, bijvoorbeeld 'tekst' of 'numeriek'. Bij PHP hoef je dat type niet van te voren duidelijk aan te geven. PHP bepaalt het type aan de hand van de waarde die je toekent aan een variabele.</p>
<p>Waarde toekenning gaat op deze manier:
	<ul>
		<li>$naam = "Hans"; //Tekst variabele, ook wel 'string' genoemd</li>
		<li>$leefijd = 32; //Numerieke variabele, geheel getal (een 'integer')</li>
		<li>$cijfer = 53/17; //Numerieke variabele, getal met komma (een 'float'), gevuld vanuit een berekening</li>
	</ul>
Leegmaken kan gedaan worden door toekenning van de 'lege' string of een 0:
<ul>
<li>$naam = "";</li>
<li>$leeftijd = 0;</li>
</ul>
Maar leegmaken is niet hetzelfde als weggooien. De variabele bestaat nog steeds maar heeft geen nuttige waarde meer.

</p>
<p>De levensduur van een variabele is normaal gesproken de php pagina (levensduur wordt wel 'scope' genoemd). Als je naar een volgende php pagina springt gaat de waarde van de variabelen op de pagina waarvandaan je springt verloren.
	Dit is speciaal onhandig in inlogsystemen en complexe webapplicaties. Binnen php zijn er dus een aantal voorzieningen waardoor de waarde van dit soort variabelen wel bewaard kan worden, bijvoorbeeld via sessies. Daarover later.
	</p>
<p>Met het print commando kun je de waarde van een variabele op het scherm laten zetten als je maar wel de dubbele "" gebruikt.</p>
<p>Een speciale vorm van variabelen zijn de <i>arrays</i>, dat zijn lijsten van variabelen die onder één naam in combinatie met een volgnummer opvraagbaar zijn. Deze buitengewoon nuttige array's worden op een andere plek uitgelegd.</p>





<?php
toon_file("v5_variabelen.php");
?>

<?php
include "voet.php";

?>