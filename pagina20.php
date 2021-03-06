<?php
include "kop.php";
?>

<h2>
  20. Object Georiënteerd Programmeren: basisconcepten
</h2>

<p>
  
OOP wordt vaak gezien als het 'professionelere' alternatief voor Procedureel
Programmeren. Wat heeft OOP dan wat Procedureel Programmeren niet heeft?
Waarin wijkt de aanpak van OOP af van het zojuist geschetste beeld?
</p><p>
  

Bij OOP staan niet procedures, maar objecten centraal. Een object is 'iets' dat je
nodig hebt bij het oplossen van een (automatiserings)probleem. Als je ergens naar
toe wilt heb je een auto nodig. Als je iets op wilt schrijven heb je een pen en
papier nodig (twee objecten). Als je bijvoorbeeld een inlogsysteem moet maken
krijg je met het object User te maken, als je een website management systeem
moet maken krijg je met de objecten Pagina, Nieuwsitem, Forum en Database te
maken.
</p><p>
  
<p>Van objecten kun je in het kader van OOP twee dingen bespreken: 
  <ul>
    <li>hun <i>eigenschappen</i> (hoe ze er uit zien bijvoorbeeld, wat ze waard zijn of betekenen)</li>
    <li>hun <i>methoden</i> (wat ze kunnen of wat er mee gedaan kan worden)</li>
</ul>
</p><p>
Een eigenschap van een auto is zijn kleur, de fabrikant, het type. Een methode van de auto is starten, rijden en (tegenwoordig) navigeren.<br>
Een eigenschap van een User is bijvoorbeeld zijn inlognaam en zijn
wachtwoord. Een methode die bij User hoort is het checken of opgegeven
inlognaam en wachtwoord kloppen, het veranderen van persoonlijke gegevens,
of het versturen van een emailtje naar een user. Een eigenschap van een Forum is
de titel van het forum of de tekst van een mailtje. Methoden van een forum zijn
het 'posten' van een forumbericht, het aanmaken van een reactie op een ander
forumbericht, het doorzoeken van een reeks forumberichten op een bepaalde
zoektekst en het op het scherm laten zien van het forum.
</p>
<p>
 Veel methoden van objecten zijn er op uit om iets te doen met de eigenschappen
van de objecten (denk aan het controleren van inloggegevens of het veranderen
van een userprofiel).
</p><p>
  Methoden worden aan het werk gezet via events, dat wil zeggen acties van de
gebruiker of het systeem. Als iemand klikt op de knop Forum gaan de methodes
aan de slag die het forum op het scherm zetten. Als iemand klikt op Inloggen gaat
de inlogcheck van een gebruikersaccount aan de slag, enzovoorts.
Op deze manier kun je bijna iedere applicatie beschrijven als een geheel van
Objecten, ieder met zijn eigenschappen en methoden, die via events aan elkaar
verknoopt zijn en het informatieprobleem oplossen.
</p>
<p>
  <ul>
    <li>Event: User logt in op de inlogpagina</li>
    <li>Methode van Inlogpagina:  toon formulier</li>
    <li>Event: User vult formulier in en klikt op 'inloggen' knop</li>
    <li>Methode van User: check opgegeven user- en wachtwoord gegevens (maakt gebruik van Eigenschappen van user)</li>
    <li>Methode van Pagina: verwerk uitkomst van wachtwoordcheck</li>
    <li>enzovoorts</li>
</ul>
</p>
<p>
  De kunst van OOP is dan om, uitgaande van het informatieprobleem, eerst goed na
te denken over de noodzakelijke objecten en de interne opbouw van die objecten
(eigenschappen en methoden) en daarna over de manier waarop die via events aan
elkaar verknoopt worden.
</p><p>
  In de wereld van de OOP concepten kom je veel tegen dat gericht is op het zo
makkelijk mogelijk realiseren van goede objectdefinities. Zo zullen we verderop
begrippen tegenkomen als 'klasse', 'overerving' en 'interfaces'. Ook zijn er voor OOP
complete formele talen verzonnen (UML met name) waarmee de structuur van
objecten, los van de programmeertaal, beschreven kan worden. Soms is het dan
zelfs mogelijk om na het goed definiëren van een objectstructuur met een druk op
de knop alle formele programmeerdefinities aan te maken, denk aan declaraties
van eigenschappen en methoden van objecten, zodat je onmiddellijk aan de slag
kunt met de 'echte' code.
</p><p>
  Wat dan meestal wel weer opvalt is dat binnen de 'echte' code voor het overgrote
deel gebruik gemaakt zal gaan worden van dezelfde opdrachten, algoritmen en
technieken die je ook bij Procedureel Programmeren hard nodig had. De
tegenstelling tussen OOP en PP is zeer beslist niet totaal! Je hebt PP nodig bij OOP.
</p><p>
  Maar je zult wel merken dat OOP helemaal past bij het streven naar het verbergen van complexiteit, het op &eacute;&eacute;n plek schrijven van complexe code en het hergebruiken van code. Als je een goed OOP programma schrijft gaan die dingen bijna vanzelf.
</p>
<?php
include "voet.php";
?>
