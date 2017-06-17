<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>30: filefuncties slotopmerkingen</h2>
<p>Werken met files heeft allerlei risico's in zich. Als gebruikers kunnen schrijven naar files kunnen ze er bewust of onbewust allerlei foute informatie inzetten die de leesbaarheid van een bestand te niet zouden kunnen doen of andere schadelijke acties mogelijk maken. Daarom zul je in de praktijk het werken met files altijd willen omgeven met goede controles rondom het lezen en schrijven naar bestanden. Stel je bijvoorbeeld voor dat je gebruikers de mogelijkheid zou willen geven in een eigen ini file instellingen van je applicatie op te slaan (bijvoorbeeld de 'skin'). Wees er dan zeker van dat je op je server de schuifruimte hebt die daarvoor nodig is. Zorg er dan ook voor dat het systeem op een slimme manier backups kan maken en terugzetten van dat soort files. </p>
<p>De volgende commando's wil ik nog even onder de aandacht brengen omdat je ze weleens nodig hebt:
<ul>
	<li>file_exists('test.csv') : test of <i>test.csv</i> daadwerkelijk bestaat (return: true of false)</li>
	<li>unlink('test.csv') : verwijderd een file (delete('test.csv') kan ook, maar verwijst door naar dit commando)</li>
	<li>is_writable('test.csv') : geeft aan (true/false) of een file beschreven kan worden</li>
	<li>is_readable('test.csv') : idem, is de file leesbaar?</li>
	<li>chmod('test.csv', 755) : verandert de toegangsrechten tot een bestand</li>
</ul>
Toegangsrechten zijn belangrijk in de wereld van Webservers. Omdat de meeste webservers draaien op Linux of Unix is het verstandig enig idee te hebben van de betekenis van de chmod opdracht. Op windows webservers hebben de PHP commando's vaak niet dezelfde gevolgen als op de Linux servers. Zoek dat altijd in de documentatie na. </p>
<p>Filepermissies in Linux bestaan uit een berekenbare code die uit 3 cijfers bestaat. Cijfer 1 geeft de rechten aan van de 'eigenaar' van de file, cijfer 2 geeft de rechten aan van de 'groep' waartoe de eigenaar behoort en cijfer 3 geeft de rechten aan van 'iedereen'. De cijfers zijn een optelsom van drie rechten die al dan niet gelden voor x (waarbij x is 'eigenaar', 'groep' of 'iedereen'):
<ul>
	<li>Mag x het bestand uitvoeren?   Ja: 1     Nee: 0</li>
	<li>Mag x het bestand beschrijven? Ja: 2     Nee: 0</li>
	<li>Mag x het bestand lezen?       Ja: 4	 Nee: 0</li>
</ul>
Iemand die een bestand alleen mag lezen krijgt dus het cijfer: 0 + 0 + 4 = 4. Iemand die het bestand mag uitvoeren, beschrijven en lezen:  1 + 2 + 4 = 7. Een bestand waarop de eigenaar, de groep en de wereld lees, schrijf en uitvoeringsrechten hebben heeft dus een getal van 777. FTP programma's waarmee je een server benadert kunnen je vaak goed helpen om de permissies op bestanden goed te zetten.
</p>

</p>
Tot alle overige file commando's horen o.a. speciale lees- en schrijfcommando's, commando's om directorys en bestanden te hernoemen of in allerlei manier te controleren. Enz. Je weet op een gegeven moment zelf wel of en hoe je een bestand nodig hebt. Zoek dan altijd even bij deze functies rond.
</p>

<?php

toon_file('30a.php');

?>

<?php
include "voet.php";

?>