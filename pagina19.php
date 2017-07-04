<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>19. Objectgeorienteerd Programmeren</h2>
<p>Object Geori&euml;nteerd Programmeren (vanaf nu: OOP) wordt vooral vaak afgezet tegen het traditionelere <i>Procedureel </i> of <i>Functioneel</i> Programmeren. Om OOP beter te begrijpen is
het daarom goed even de belangrijkste kenmerken van Procedureel Programmeren langs te lopen.</p>
<p>
In de tijd van 'regelnummer' basic was er sprake van imperatief programmeren.
Dat wil zeggen: de flow van het programma werd volledig bepaald door de
programmeur. De rol van de gebruiker beperkt zich dan tot het op de juiste
momenten invullen van door het programma benodigde gegevens. Je vult
bijvoorbeeld op verzoek van het programma je leeftijd, je inkomen, de gewenste
hypotheek en meer van die dingen in en het programma rekent uit hoe hoog je
maandlasten zullen zijn.
</p>
<p>
Procedureel Programmeren kent al veel meer vrijheidsgraden voor de gebruiker.
Het te automatiseren probleem, bijvoorbeeld tekstverwerken, wordt
onderverdeeld in een aantal 'functies' (denk aan "printen", "tekst bewerken",
"zoeken" enzovoorts). De interface van het programma stelt de gebruiker in staat
om die functies in de applicatie te gebruiken, soms zelfs op meer dan &eacute;&eacute;n manier
(muis of toetsenbord bijvoorbeeld). Programmeren komt in dit geval neer op het
onderkennen van de juiste functies die het programma aan moet kunnen en het
schrijven van de juiste procedures om die functies te kunnen realiseren.
Algoritmiseren, dat wil zeggen het bepalen van de juiste stapsgewijze uitvoering
van basale bewerkingen in complexe procedures, is daarbij een belangrijke
bezigheid.</p>
<p>In bijna alle traditionele programmeertalen kun je met Procedureel Programmeren
terecht (C, Visual Basic (en de rest), PHP om er maar een paar te noemen).</p>


<p>Dit is een GWBASIC programma, nog met regelnummers, dat priemgetallen tussen [start] en [eind] uitrekent. De enige interactie wordt volledig door het programma gestuurd (regel 110 en 120). Het is dus een schoolvoorbeeld van <i>imperatief</i> programmeren:</p>

<!-- Geef de php file geen php extensie als dit in een php pagina geintegreerd wordt -->
<pre data-src="hph\v19a_basic.hph"><code class="language-batch"></code></pre>

<p>Hetzelfde programma, maar dan in php. Opvallend is dat er geen sprake meer is van regelnummers, dat de opbouw van de interactie (het 'formulier') redelijk wat code regels vraagt maar ook dat de gebruiker in feite degene is die de verwerking starten moet door het klikken op de submit knop. Een mooi voorbeeld van <i>procedureel/functioneel</i> programmeren:</p>
<pre data-src="hph\v19b_php.hph"><code class="language-php"></code></pre>

<p>Op het moment dat applicaties groter worden en het behouden van overzicht niet
meer vanzelf gaat maar afgedwongen moet worden, wordt het toepassen van
functiebibliotheken die via <i>include's</i> in programma code ingebonden kunnen worden
heel belangrijk. Veel-gebruikte functies worden dan in zo'n bibliotheek
ondergebracht. Hun code komt op maar &eacute;&eacute;n plaats voor en als er aanpassingen in
nodig zijn hoeft (meestal) alleen die bibliotheek aangepast te worden. Dit levert in
rust en overzicht op in de programmacode. Daarnaast kunnen dit soort
functiebibliotheken ook 'meegenomen' worden naar andere applicaties (hergebruik
  van code).</p>
<p>
  Functiebibliotheken zijn een voorbeeld van professionalisering van de programmacode. In dat kader zijn er verschillende richtlijnen te noemen. Bijvoorbeeld deze drie:
  <ul>
    <li>Belangrijke functies ontwikkel en onderhoud je op &eacute;&eacute;n plek, hoe vaak ze ook gebruikt worden.</li>
    <li>Complexiteit in functies verberg je zoveel mogelijk (hoofdcode 'schoon' houden)</li>
    <li>Functies bouw je zoveel mogelijk op zo'n manier dat je ze kunt hergebruiken wanneer je wilt</li>
    
</ul>
Of in kernwoorden samengevat:
<ul>
  
  <li>Complexe code op maar &eacute;&eacute;n plek</li>
  <li>Verberg complexiteit</li>
  <li>Bevorder hergebruik</li>
</ul>
  </p>
<p>Met behulp van Procedureel Programmeren kun je op deze manier heel goed
professionele applicaties maken.
</p>
<p>
  De vraag is dan natuurlijk wel: Wat heeft het Object Georienteerde progammeren hier aan toe te voegen?
</p>
<?php
include "voet.php";

?>