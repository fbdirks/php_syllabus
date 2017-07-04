<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>7. Control loops 1: If Then/Else</h2>

<p>Vaak moeten er in een computerprogramma beslissingen genomen worden op basis van de waarde van een bepaalde variabele. Zo goed als alle programmeertalen die er bestaan hebben daarvoor  een IfThen/Elseif/Else opdracht aan boord. Logisch, dit soort vergelijkingsmogelijkheden zitten ingebakken in processoren.  </p>
<p>De basisgedachte is simpel: Als voorwaarde (v) waar is, doe dan opdrachten x, en doe anders opdrachten y.</p>
<p>Voorbeeldje:
<ul>
<li>Als de snelheid hoger is dan 80 km per uur:</li>
<ul>
	<li>Houd de auto aan</li>
	<li>Schrijf een bon</li>
</ul>
<li>Anders:</li>
<ul>
	<li>Doe niets</li>
</ul>
</ul>
</p>
<p>In het geval van PHP is de taalconstructie van een ifthen/elseif/else als volgt:
<table border="0" style="margin_left: 10px">
	<tr>
		<td>If (voorwaarde) {</td>
		
	</tr>
	<tr><td>  opdrachten te doen als voorwaarde waar is</td></tr>
	<tr><td>} elseif (andere_voorwaarde) {</td></tr>
	<tr><td>  opdrachten te doen als andere_voorwaarde waar is</td></tr>
	<tr><td>} else {</td></tr>
	<tr><td>  opdrachten te doen in alle andere gevallen</td></tr>
	<tr><td>}</td></tr>
</table>	
	</p>
<p>De <b>voorwaarde</b> mag iedere vergelijking of variabele zijn die of een true (1) of een false(al het andere) oplevert. Dus bijvoorbeeld:
<ul>
	<li>($getal1 < $getal2)</li>
	<li>($inlognaam=="Jan")</li>
	<li>(($snelheid>=80) AND ($snelheid<100))</li>
	<li>($ingelogd)   # als $ingelogd de waarde 1 heeft bijvoorbeeld</li>
</ul>
Je ziet dat je met AND (en OR en NOT) ook samengestelde voorwaarden kunt gebruiken. Denk altijd goed om de haakjes in zo'n geval!
</p>
<p>Een <b>Codeblok</b> wordt door PHP altijd afgegrensd door {  en } . Daarbinnen kan 1 commando staan, maar ook 2000 commando's!</p>
<!-- Geef de php file geen php extensie als dit in een php pagina geintegreerd wordt -->
<pre data-src="hph\v7_ifthen.hph","php"><code class="language-php"></code></pre>
Dit is de output van deze code:<br><br>
<div class="voorbeeldOutput" >
<?php include "v7_ifthen.php"; ?>
</div>

<?php
include "voet.php";

?>