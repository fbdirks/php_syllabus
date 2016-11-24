<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>22. De Klasse: De blauwdruk van een object</h2>
<p>Een objectdefinitie moet vervolgens in de te gebruiken programmeertaal vertaald worden naar een zg. Klasse (Class).  In PHP ziet dat er ongeveer zo uit:</p>
<?php
toon_fragment("22a.php","php");
?>
<p>
	Het is goed gebruik (maar niet verplicht!) om per klasse een php file te schrijven en die ook de naam te geven van de klasse die hier aangemaakt wordt. Dit bestand zou dus Poll.php heten. Gebruikelijk is het om de namen van klassen met een hoofdletter te beginnen (dit is een afspraak, geen verplichting).
</p><p>
De hele klasse definitie staat tussen de { } die volgen op de regel waar class Poll genoteerd staat. Ook hier is weer gebruikelijk (en ordelijk) om eerst de noodzakelijke eigenschappen te defini&euml;ren (zoals in het voorbeeld $vraag) en daarna de methoden die bij deze klasse horen.
</p><p>
Op zichzelf genomen doet een klasse definitie niets. Je kunt deze klasse pas gebruiken als je in je php applicatie (bijvoorbeeld in dagpoll.php) op basis van deze klasse definitie een object aanmaakt (een poll) en die gaat gebruiken. In dagpoll.php moeten dan deze regels voorkomen:
</p>
<?php
toon_fragment("22b.php","php");
?>
<p><i>require_once</i> is strakker dan <i>include</i> en zal de uitvoering van de rest van de pagina stoppen als Poll.php niet gevonden wordt. Dat is ook juister, de code is zinloos zonder deze klasse-definitie!</p>
<p>Je kunt de blauwdruk van Poll pas gebruiken na de include via require_once (logisch). Let op het gebruik van het woord new op het moment dat je een nieuw object aanmaakt op basis van de klasse Poll. Een dergelijke handeling wordt instanti&euml;ren genoemd.</p>
<p>
$MijnPoll is dus een instantie van de klasse Poll.
Methoden en (soms) eigenschappen van deze instantie kun je gebruiken door na de naam van het object ($MijnPoll) een soort pijl te tekenen: -> gevolgd door de naam
van de eigenschap of de methode die je wilt gebruiken, natuurlijk wel aangevuld met de juiste parameters. Het is niet altijd mogelijk om alle eigenschappen en methoden van een object op deze manier aan te roepen. Hierover later meer.
</p>





<?php
include "voet.php";

?>