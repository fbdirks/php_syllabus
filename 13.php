<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>13. Functies</h2>

<p>Je kunt ook eigen functies bouwen. Dit is handig voor alle taken waarvan je verwacht dat je ze, verspreid over vele pagina's misschien wel, vaker nodig zult hebben. Een mooi voorbeeld is het plaatsen van kop en voetregels in bestanden en het uitprinten van debug informatie.</p>
<p>Te beginnen met die laatste:  de volgende code maakt altijd een mooie afdruk van de inhoud van een willekeurige array (bijvoorbeeld $_POST, maar het is juist mooi om de functie zo te schrijven dat hij voor iedere willekeurige array bruikbaar is. Aan de code zie je een paar kenmerken:
<ul>
	<li>de functie begint met het codewoord <b>function</b>.</li>
	<li>dan de zelfgekozen naam van de functie en tussen ronde haken de parameters die je aan de functie wilt meegeven. </li>
	<li>Tussen {  } staan vervolgens de coderegels die de taak uitvoeren.</li>
	<li>Binnen die { } wordt de functie (meestal) besloten met een <b>return</b> waarde die je teruggeeft aan de hoofdcode.</li>
</ul>
Het eerste voorbeeld bevat de functie toon_lijst. Je ziet dat je die met allerlei arrays kunt gebruiken. Vooral de toepassing met $_POST is enorm handig bij het debuggen.
</p>
<?php
toon_file("v13_functies.php");
?>

<p>De tweede voorbeeldfunctie hieronder verdubbelt de waarde van een parameter. Let vooral op de namen van de variabelen. In tegenstelling tot de eerste functie hierboven geeft deze functie wel een return waarde. </p>
<?php
toon_file("v13b_functies.php");
?>


<?php
include "voet.php";

?>