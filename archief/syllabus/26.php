<?php
include "kop.php";
include "disp_functies.php";

?>

<h2>Voor- en nadelen van OOP</h2>
<p>Hoe nuttig is OOP? Iemand die 'even gauw' een applicatie moet schrijven voor een klein probleem heeft niets aan OOP. OOP heeft alleen zin als je een informatie probleem drastisch en grondig op wilt lossen. Je zult bij OOP in de aanlooptijd naar een werkende applicatie altijd veel tijd moeten stoppen in het nadenken over de architectuur van je objecten.
De zaak ligt echter anders als je bij een applicatie gebruik wilt maken van werk dat anderen al gedaan hebben. Gebruik maken van klasse definities van anderen is in OOP een fluitje van een cent. En als die klasse definities een beetje volledig en goed gerijpt zijn neemt dat je een hoop werk uit handen. Het is altijd weer opvallend hoe de programma code die via events objecten met elkaar verknoopt in OOP-programma's soms verrassend simpel en overzichtelijk oogt. Dat soort programma's schrijf je snel en je kunt er ook snel de fouten uit halen.</p>

<?php
toon_fragment("26a.php","php");
?>
<p>Het bovenstaande code voorbeeld is een voorbeeld van de overzichtelijkheid van OOP-programma's. Alle complexiteit zit eigenlijk verborgen in de klasse definitie "Poll_db.php". Bovenstaande code doet niet anders dan een nieuw Poll object defini&euml;ren, kijken of de vraag die men stellen wil al voorkomt, zo ja onder welk nummer en dan worden alle gegevens opgehaald, zo nee: dan wordt de poll aangemaakt en opgeslagen in de database. En de laatste drie regels doen niets anders dan de poll op scherm zetten, een eventueel uitgebrachte stem te verwerken en die verwerking ook in de database te noteren.</p>
<p>
In een taal als Java is alles een object, inclusief het aanroepende programma. Dat brengt onder andere met zich mee dat bijna alles in Java, en dus ook het aanroepende programma, methoden en eigenschappen heeft die horen bij objecten in Java. De makers van Java hebben dat onder meer gebruikt voor het toevoegen van allerlei handige debug en rapportage handigheidjes. Denk aan een methode als .toString() die een object "printbaar" maakt. Zo goed als ieder object in Java kent die methode. Getalsobjecten (als integer en double) hebben op die manier allerlei ingebouwde functies die de getallen converteren naar andere typen of afronden. En zo kunnen we nog wel even doorgaan.
</p><p>
In een OOP-wereld is documentatie van groot belang. Objecten kun je alleen maar gebruiken als je weet welke eigenschappen en methoden die objecten allemaal hebben. Daarom zie je in talen als Java, Ruby en dergelijke ingebouwde mechanismen die uit een stukje broncode met een paar drukken op de knop heel bruikbare documentatie destilleren (google maar eens op Javadoc).
</p><p>
Onder de streep zou je dus kunnen betogen dat OOP vooral nuttig is omdat het je dwingt de architectuur van je programma en de objecten die het gebruikt goed te overdenken, maar dat de prijs die je daarvoor betaalt is dat deze aanpak veel tijd kost als je je eigen objecten allemaal zelf wilt ontwikkelen. Maak je graag gebruik van de objecten van anderen dan heb je alleen maar voordeel van OOP.
</p>
<p>
Binnen PHP zijn er complete functiebibliotheken, PEAR bijvoorbeeld, die intern geheel volgens de OOP-methode zijn opgezet. Dit soort functiebibliotheken worden bijvoorbeeld gebruikt om:
<ul>
<li>Inlogsystemen te maken</li>
<li>Databasetoegang te versimpelen</li>
<li>Formuliercontrole makkelijk mogelijk te maken</li>
<li>Webpaginaopmaak te standaardiseren</li>
</ul>
Als je gebruik maakt van dit soort bibliotheken merk je al gauw dat je eigen code overzichtelijker en eenvoudiger blijft terwijl de kwaliteit van de informatieverwerking toch fors toeneemt.
</p>

<?php
include "voet.php";

?>