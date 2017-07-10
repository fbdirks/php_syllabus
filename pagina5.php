<?php
include "kop.php";
//include "disp_functies.php";

?>

<h2>5. Variabelen in PHP</h2>

<p>Een variabele is een stuk geheugen met een naam. Door variabelen in een programma te gebruiken laat je open met welke waarden of teksten het programma moet werken. Dat wordt later bepaald door een bepaalde waarde te stoppen in het geheugen.</p>
<p>
	Vergelijk het met een rekenmachine: die is alleen maar bruikbaar als je er zelf een som in kunt tikken. Voor een rekenmachine is die invoer dus ook een 'variabele'.
</p>
<p>Variabelen herken je in php door de naam: variabelen beginnen met het teken $. Na de $ mag een letter (hoofdletter of kleine letter) of een _ (een 'underscore') komen te staan en daarna pas mogen naast letters of een _ ook cijfers gebruikt worden. Niet alle variabele-namen zijn dus geldig:
	<ul>
		<li><span style="color: green">Geldig:</span>  $test, $aaa, $_test, $_1e, $WINST</li>
		<li><span style="color: red">Ongeldig:</span> $1e, $-WINST,$0</li>
	</ul>
	PHP is hoofdletter gevoelig. $_winst is dus niet hetzelfde als $_Winst !!
</p>
<p>Variabelen hebben een bepaald type, bijvoorbeeld 'tekst' of 'numeriek'. Bij PHP hoef je dat type niet van te voren duidelijk aan te geven. PHP bepaalt het type aan de hand van de waarde die je toekent aan een variabele.</p>
<p>Waarde toekenning gaat op deze manier:
	<pre><code class="language-php">
	// een tekst variabele (een 'string'):
	$naam = "Hans"; 
	
	// een numerieke variabele, zonder komma ('integer')
	$leefijd = 32; 
	
	// een numerieke variabele, in dit geval met een komma (een 'float´)
	// gevuld vanuit een berekening:
	$cijfer = 53/17; 
	</code></pre>
	
Leegmaken kan gedaan worden door toekenning van de 'lege' string of een 0 of door de functie <b>unset</b>:
<pre><code class="language-php">
$naam = "";
$leeftijd = 0;

// unset maakt de variabele niet alleen leeg, maar verwijdert hem ook.
unset($leeftijd); 
</code></pre>

Leegmaken is niet hetzelfde als weggooien. De variabele bestaat nog steeds maar heeft geen nuttige waarde meer.

</p>
<p>De levensduur van een variabele is normaal gesproken de php pagina (levensduur wordt wel 'scope' genoemd). Als je naar een volgende php pagina springt gaat de waarde van de variabelen op de pagina waarvandaan je springt verloren.
	Dit is speciaal onhandig in inlogsystemen en complexe webapplicaties. Binnen php zijn er dus een aantal voorzieningen waardoor de waarde van dit soort variabelen wel bewaard kan worden, bijvoorbeeld via sessies. Daarover later.
	</p>
<p>Met het print commando kun je de waarde van een variabele op het scherm laten zetten als je maar wel de dubbele "" gebruikt.</p>
<p>Een speciale vorm van variabelen zijn de <i>arrays</i>, dat zijn lijsten van variabelen die onder ��n naam in combinatie met een volgnummer opvraagbaar zijn. Deze buitengewoon nuttige array's worden op een andere plek uitgelegd.</p>


<!-- Geef de php file geen php extensie als dit in een php pagina geintegreerd wordt -->
<pre data-src="hph\v5_variabelen.hph","php"><code class="language-php"></code></pre>
Dit is de output van deze code:<br><br>
<div class="voorbeeldOutput" >


<?php
include "v5_variabelen.php";
?>
<?php
include "voet.php";

?>