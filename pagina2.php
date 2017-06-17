<?php
include "kop.php";


?>

<h2>2. De commando's <b>print</b> en <b>echo</b></h2>
<p>De commando's <b>print</b> en <b>echo</b> laten de webserver informatie naar het browserscherm printen. Je kunt de twee commando's door elkaar heen gebruiken, maar het is netter om te kiezen voor een bepaalde stijl.</p>
<p>In een print of echo regel moet je datgene wat geprint wordt tussen enkele ' '  of dubbele " " aanhalingstekens zetten. Het effectieve verschil tussen enkele of dubbele aanhalingstekens merk je als je met variabelen werkt. </p>
<p>Als de variabele $groet de inhoud heeft "Hallo!" dan zal het commando echo '$groet' de <b>naam</b> van de variabele ($groet) printen en zal echo "$groet" de <b>inhoud</b> van de variabele printen (Hallo!).</p>
<p>Je kunt in beide gevallen html commando's mee printen (binnen de ' ' of " ") en deze zullen door de browser gewoon worden uitgevoerd.</p>
<p>Uitkijken moet je met het gebruik van 'letterlijke' aanhalingstekens in datgene wat je printen wilt. Als je bijvoorbeeld wilt printen: Hij zei "mevrouw" tegen mij!! dan <b>moet</b> je de aanhalingstekens die je 'letterlijk' wilt printen vooraf doen gaan van het teken \ . Dit teken zorgt ervoor dat PHP het teken daar onmiddelijk na niet als een PHP opdracht ziet ("einde van wat geprint moet worden"), maar als letterlijk teken. De \ wordt in dit geval een 'escape' opdracht genoemd. Helaas maken escapes de PHP code soms wat lastig te lezen. </p>
<pre data-src="pagina2_vb.hph","php"><code class="language-php">
</code></pre>
<div class="voorbeeldOutput">
	<?php include "v2_print.php"; ?>
</div>
<?php
include "voet.php";

?>