<?php
include "kop.php";
include "disp_functies.php";

?>
<h2>23. De Constructor</h2>
<p>De constructor is binnen een klasse een speciale methode die altijd wordt uitgevoerd op het moment dat er een nieuwe instantie van een klasse gemaakt wordt. Deze methode herken je aan de naam: 	<i>__construct()</i>  . De naam begint met twee keer een underscore. Het invullen van deze methode is niet verplicht. Meestal wordt deze methode gebruikt om eigenschappen de juiste startwaarde (de default waarde) mee te geven. Het hangt helemaal van het object en het probleem dat het object op moet lossen af wat er nog verder nodig is in deze methode. Een omgekeerde methode bestaat ook: 	<i>__destruct()</i>  . Ook deze is niet verplicht. Deze methode wordt uitgevoerd bij het vernietigen van een object.</p>
<h2>Toegankelijkheid</h2>
<p>
Gegeven de wereld waar OOP uit voortgekomen is (het ontwikkelen van grote applicaties) is het begrijpelijk te noemen dat in het denken rond OOP ingebakken zit dat eigenschappen en methoden van een object niet altijd vrij toegankelijk zijn voor andere programmacode. Stel je bijvoorbeeld voor dat je een User object maakt en dat de methode die je gebruikt bij het aanmaken van een concreet User object altijd controleert of het wachtwoord wel uit minimaal 8 tekens bestaat, een mix is van hoofd- en kleine letters en minstens &eacute;&eacute;n speciaal leesteken bevat. Pas als aan al die voorwaarden voldaan is kan $wachtwoord van een nieuw useraccount gevuld worden.</p>
<p>Vervolgens schrijf een collega van je code die rechtstreeks op het wachtwoord veld aangrijpt (zoiets: $MijnUser->wachtwoord = "12345";). Daarmee passeert hij de vormcheck. Zoiets wil je per design voorkomen. Dat doe je door het $wachtwoord veld de extra optie private mee te geven bij de definitie:</p>
<pre><code class="language-php">class User {
	Private $wachtwoord; 
	Private  $email; 
	Public $usernaam;

	// enzovoorts

}</code></pre>
<p>Het gebruik van het toverwoord private zorgt ervoor dat uitsluitend de interne methodes van het object dit veld kunnen vullen. In die interne methodes zitten dan allerlei controles op de vorm van het wachtwoord. Als een eigenschap niet private maar public is, kan je er ook van buiten de klasse definitie op aangrijpen.</p>

<p>Een interne methode kan een eigenschap benaderen of vullen door gebruik te maken van de aanduiding $this. $this verwijst altijd naar het huidige object. Dus als $MijnUser een object is van het type User en de klasse User een methode heeft met deze code:</p>
<pre><code class="language-php">function zetVoornaam($vn) {
	$this->voornaam = $vn;
}</code></pre>

<p>zal je met deze opdracht: <b>$MijnUser->zetVoornaam("Jan");</b> de voornaam van $MijnUser vullen met "Jan".</p>
<p>Een van de eerste dingen die programmeurs van objecten vaak doen als het gewenst is dat veel eigenschappen private blijven is het schrijven van methoden die deze variabelen kunnen zetten ('setters') of ophalen ('getters'). Het is dan natuurlijk wel zaak om in die methoden controlemechanismen zoals hierboven genoemd in te bouwen. Realiseer je goed dat als je een private eigenschap $wachtwoord beschermt met deze 'setter':</p>
<pre><code class="language-php">function setWachtwoord($ww) {
	$this->wachtwoord = $ww;
}</code></pre>


<p>je natuurlijk het kind met het badwater weggooit.</p>





<?php
include "voet.php";

?>