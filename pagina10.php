<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>10. Control loops: For</h2>
<p><i>Herhaling</i> is &eacute;&eacute;n van de basiselementen van algoritmes. Veel programmeertalen kennen, net als PHP, het herhaal commando in twee smaken:
<ul>
	<li>Onvoorwaardelijk (min of meer): For</li>
	<li>Voorwaardelijk: While & Do</li>
</ul>
</p>
<p>Het For commando herhaalt een reeks commando's in een blok dat door { en } wordt omsloten zovaak als in de argumenten van het For commando wordt aangegeven. Die argumenten bestaan uit drie onderdelen:
	<ul>
		<li>De variabele waarin wordt bijgehouden hoevaak de commando's herhaald worden, inclusief de startwaarde van die variabele (bijvoorbeeld: $i=0)</li>
		<li>De 'eindtest' voor die variabele: wanneer moet de For loop stoppen? (bijv. $i<100 betekent: doorgaan zolang $i kleiner dan 100 is) </li>
		<li>De mate waarin de variabele iedere loop verandert (bijvoorbeeld $i=$i+1)</li>
	</ul></p>
Dus:
<pre><code class="language-php">
	for ($i=1;$i<=100;$i=$i+1) {
		print "$i Ik moet op tijd in de les komen. ";
	}</code></pre>
print 100 strafregels met de aangegeven tekst uit.</p>
<p>Het verhogen of verlagen van een variabele met 1 komt zo vaak voor dat er een soort <i>steno</i> voor ontwikkeld is: $i++  betekent hetzelfde als $i=$i+1  en $i-- betekent hetzelfde als het verlagen van $i met 1. Deze 'steno' mag je overal in PHP gebruiken, niet alleen in het FOR commando.</p>
<p>Bij debuggen van for loops moet je altijd kijken of de kloof tussen de startwaarde van $i en de eindwaarde van $i niet steeds groter wordt. Als dat zo is zal de loop niet stoppen.</p>
<pre data-src="v10_for.hph"><code class="language-php"></code></pre>
<div class="voorbeeldOutput"><?php include 'v10_for.php';?></div>


<?php
include "voet.php";

?>