<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>24. Overerving</h2>
<p>Het is in OOP makkelijk mogelijk om een nieuwe objectdefinitie te maken (een nieuwe klasse dus) op basis van een bestaande klasse. Dit doe je door in de regel waarin je de klasse definitie start gebruik te maken van het toverwoord extends:</p>
<p>
<?php
toon_fragment("24a.php","php");
?>
</p>
<p>
Je moet er dan wel voor zorgen dat de klasse Poll bekend is (eerst includen voor je de klasse Poll_database gaat defini&euml;ren!). De genoemde regel geeft aan dat je een nieuwe klasse wilt gaan defini&euml;ren op basis van de klasse Poll. Dit heeft als praktisch gevolg dat alle eigenschappen en methoden van de klasse Poll ook precies zo bestaan in de klasse Poll_database zonder dat je &eacute;&eacute;n regel code hoeft te schrijven.</p>
<p>In de praktijk zal je echter vaak een nieuwe klasse definitie willen schrijven omdat de oude net niet precies voldoet aan je wensen. Stel je bijvoorbeeld voor dat de klasse Poll een methode MaakPoll heeft die de gegevens van een nieuwe poll naar een bestandje poll.txt schrijft. Jij wil echter dat de poll niet in een tekstbestandje maar in een mysql database wordt opgeslagen. Je maakt een nieuwe objectdefinitie voor Poll_database op basis van Poll en zet in die definitie een nieuwe inhoud neer voor MaakPoll die gebruik maakt van MySQL. Alle andere methoden en eigenschappen van Poll zijn dan gewoon bruikbaar in Poll_database zonder dat je ze in code hoeft te kopi&euml;ren.</p>
<p>En stel je voor dat je nog een derde methode bedenkt: de stand van zaken in een poll wordt opgeslagen in $_SESSION, om welke reden dan ook. Ook nu weer hoef je dan alleen maar de methoden waarvoor deze aanpak uitmaakt te herschrijven in een nieuwe klasse PollSession die een 'kind' van Poll is.</p>
<p align="center"><img src="erven.jpg"></p>
<p>In iedere 'kind' klasse noteer je dus alleen maar de code die echt verschillen moet van die in de 'ouder' klasse. Kijk bijvoorbeeld naar de extra eigenschappen (db user, db password) in PollDatabase.</p>

<h2>Overerving, Protected en Private Eigenschappen</h2>
<p>Eerder hadden we het over private eigenschappen. Dat waren eigenschappen van een object die alleen door methoden van het object zelf benaderd (of gezet) konden worden. Als je een klasse definitie schrijft op basis van een bestaande klasse definitie die &oacute;&oacute;k dat soort private eigenschappen kent, moet je heel erg uitkijken. Private eigenschappen zijn voor andere klassen die gebaseerd zijn op de klasse waarin die eigenschappen gedefinieerd worden namelijk &oacute;&oacute;k niet benaderbaar! Soms is dat gewenst, soms is dat ongewenst. Met het veranderen van private in public kun je dat probleem omzeilen, maar dan heb je ook de voordelen van die systematiek niet tot je beschikking. Wat ook kan is eigenschappen niet private of public, maar protected declareren. Een protected eigenschap is benaderbaar door methoden uit de eigen klasse of uit klassen die gebaseerd zijn op de eigen klasse.</p>
<?php
toon_fragment("24b.php","php");
?>
<p>Dit eenvoudige voorbeeldje heeft in de klasse PollDatabase twee functies die aangrijpen op eigenschappen die al horen bij de 'moederklasse', Poll. De eigenschap $vraag is in Poll private, de eigenschap $antwoord is in Poll protected. Dat heeft tot gevolg dat de methode zetVraag van PollDatabase geen kans heeft en zijn werk niet kan doen, maar de methode zetAntwoord van PollDatabase wel erin zal slagen om $antwoord te veranderen. Code buiten de klasse definities van Poll of PollDatabase zal hoe dan ook geen van beide variabelen $vraag en $antwoord kunnen benaderen.</p>

<?php
include "voet.php";

?>