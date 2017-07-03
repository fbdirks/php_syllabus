<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>11. Control loops: While en Do While</h2>
<p>While hoort bij de herhalingscommando's, net als For. Maar er is een belangrijk verschil. For weet wanneer de loop begint hoeveel keer de loop herhaald zal moeten worden. While weet dat niet. While geeft wel de voorwaarde aan maar je bent zelf verantwoordelijk voor code die zorgt dat ooit aan die voorwaarde voldaan zal worden.</p>
<p>De syntax van while is simpel:
<pre><code class="language-php">
	while(voorwaarde) {
		#code die uitgevoerd moet worden zolang de voorwaarde waar is.
	}</code></pre>
Dus, weer de 10 strafregels:
<pre><code class="language-php">
	$aantal = 1;
	while ($aantal <= 100) {
		print "Ik moet op tijd in de les zijn..";
		$aantal++;
	}</code></pre>
Let op dat eigenlijk dezelfde drie dingen die je in een For commando regelt ook hier voor elkaar moeten zijn:
<ul>
<li>Een variabele om op te letten met een juiste startwaarde ($aantal=1)</li>
<li>De eindtest ($aantal <=100) </li>
<li>De verandering van de variabele ($aantal++)</li>
</ul>
Het geniepige is dat je die drie dingen wel moet regelen maar dat het While commando ze zelf niet afdwingt. Een klassieke fout is dus een mooie while loop schrijven maar vergeten de variabele waar while naar kijkt binnen de loop te laten veranderen.
</p>
<p>Van dit 'nadeel' kun je soms een 'voordeel' maken. Als je in je code een oneindige loop nodig hebt (bijvoorbeeld: niets doen zolang de temperatuur beneden de 30 graden blijft) dan zou je dat zo kunnen doen:
<pre><code class="language-php">
	$temp = true;
	while ($temp) {
		$t = meet_temperatuur();
		if ($t >30) $temp = false;
	}
zet_airco_aan();</code></pre>	
	
</p>


<p>Bij het while commando wordt de code tussen {  }  alleen maar een keer uitgevoerd als de voorwaarde bij het begin van de while minstens 1 keer waar is. Een enkele keer heb je een algoritme nodig waarbij de code in een loop in ieder geval 1 keer wordt uitgevoerd, maar daarna alleen maar als dat nodig is. Bij het Do-While commando zet je de voorwaarde aan het einde op deze manier:
<pre><code class="language-php">
	$aantal = 0;
	do {
		echo "Ik moet op tijd in de les komen..";
		$aantal++;
	} while ($aantal < $strafmaat);
</code></pre>
Nu zal in ieder geval de regel 1 keer geprint worden ook al is de strafmaat 0. 

</p>

<pre data-src="v11_while.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v11_while.php';?></div>

<?php
include "voet.php";

?>