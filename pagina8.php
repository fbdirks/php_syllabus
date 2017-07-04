<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>8. Control loops 2: Switch</h2>
<p>Als je een keuzeloop nodig hebt waarbij je op meer dan twee verschillende waarden van een variabele wilt kunnen testen is het hanteren van if/elseif/then soms lastig. Het kan onoverzichtelijk worden. Daarom is voor die situaties een speciaal commando beschikbaar: switch.  Bij switch redeneert php als volgt:  kijk naar variabele x, doe opdrachten a als x=1, doe opdrachten b als x=2, doe opdrachten c als x=3 en als x geen van deze waarden heeft doe dan opdrachten z.</p>
<p>Alles wat je met een switch commando doet kun je ook met een if/elseif/else commando doen, alleen blijft het met een switch commando vaak overzichtelijker. Een handige toepassing vind je bijvoorbeeld bij menukeuzes. Zie het voorbeeld.</p>
<p>Vergeet niet bij een switch iedere 'case' af te sluiten met een 'break' en vergeet niet een 'default' actie te definieren. </p>


<!-- Geef de php file geen php extensie als dit in een php pagina geintegreerd wordt -->
<pre data-src="hph\v8_switch.hph","php"><code class="language-php"></code></pre>
Dit is de output van deze code:<br><br>
<div class="voorbeeldOutput" >

<?php include "v8_switch.php"; ?>
</div>
<?php
include "voet.php";

?>