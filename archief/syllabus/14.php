<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>14. Ingesloten Functies</h2>

<p>Als je functies definieert in een aparte file en die file met het commando 'include' in andere php pagina's binnenleest maak je echt werk van arbeidsverdeling met functies. Dit is bijzonder geschikt voor het geven van kop en voet aan je webpagina's. Het mooie is dat je zo'n kop en voetregel echt maar op 1 plek hoeft te programmeren, ook al heb je 6000 pagina's!</p>
<p>In het bovenste voorbeeld zie je een php pagina die een andere php pagina (met de functies) binnenleest. Je ziet in de hoofdcode dat via de commando's <b>kop();</b> en <b>voet();</b> deze functies gestart worden. De inhoud van pagina_functies.php staat er onder.</p>

<?php
toon_file("v14_include.php");
?>
<p>En dit is de file met de pagina functies:</p>
<?php
toon_file("pagina_functies.php");
?>

</p>

<?php
include "voet.php";

?>