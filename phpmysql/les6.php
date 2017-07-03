<?php
include "kop.php";



?>
<div class="main">

<h1>Les 6: Een record toevoegen</h1>
<a href="#opdrachten"><h6>opdrachten</h6></a>
<p>We willen nu aan de bestaande database (we gebruiken nog steeds bbc.sql) een record (=rij) toevoegen. Hiervoor hebben we het volgende nodig:</p>
<ul>
<li>Kennis van de database structuur zodat we weten wat nodig is voor het invullen van een record (hoe heten de velden, wat moet er in staan, welke zijn verplicht?)</li>
<li>Een formulier waarin we de velden kunnen invoeren</li>
<li>Een query die de velden invoert</li>
<li>Een php pagina die deze dingen combineert en de query uitvoert</li>
</ul>
<h3>Databasestructuur</h3>
<p>De database structuur van bbc.sql is eenvoudig:</p>
<ul>
<li>name : de naam van een land (bv. Belgium) - tekst & <u>verplicht (de sleutel!!)</u></li>
<li>region : de regio waar het land toe behoort (bv. Europa) - tekst & verplicht </li>
<li>area : de oppervlakte van het land (in vierkante kilometers) - getal & niet verplicht</li>
<li>population : het aantal mensen dat in het land woont - getal & niet verplicht</li>
<li>gdp : het bruto nationaal product - getal & niet verplicht</li>
</ul>
<p>Dit betekent dat we een formulier nodig hebben met 5 invul velden en dat we alleen hoeven controleren of <u>name</u> en <u>region</u> ingevuld zijn. Wel moeten we uitkijken met verkeerde invoer (zie hoofdstuk 4).</p>
<h3>Een formulier</h3>
<p>Een formulier is niet moeilijk. Dit is het ontwerp (de knop doet het op <i>deze</i> pagina niet!) en daaronder staat de html code.</p>

<table style="border: 1px solid black">
<tr><td>Naam van het land:</td><td><input type="text" name="name"></td></tr>
<tr><td>De regio van het land:</td><td><input type="text" name="region"></td></tr>
<tr><td>De oppervlakte van het land:</td><td><input type="text" name="area"></td></tr>
<tr><td>Het aantal inwoners van het land:</td><td><input type="text" name="population"></td></tr>
<tr><td>Het bruto nationaal product van het land:</td><td><input type="text" name="gdp"></td></tr>
<tr><td>Actie:</td><td><input type="button" name="actie" value="Toevoegen"></td></tr>
</table>
<pre data-src="nieuw_formulier.hph"><code class="language-html"></code></pre>
<p>De input elementen heb ik de namen van de velden gegeven. Dat levert minder verwarring bij de verwerking op, maar het is een keuze. Je bent hiertoe niet verplicht. De tabel om het formulier heen is puur alleen voor de opmaak. Ook dat kan eventueel anders.</p>
<h3>De noodzakelijke query</h3>
<p>Hier moeten we natuurlijk een INSERT INTO query gaan gebruiken. We kunnen het ons hier heel moeilijk maken door een aparte query te maken voor iedere denkbare combinatie van verplichte en niet verplichte velden. Maar laten we een knoop doorhakken en zeggen dat we 0 gaan invullen overal daar waar niet verplichte velden niet ingevuld zijn. De query die we dan nodig hebben is:</p>
<pre><code class="language-php">$query = "INSERT INTO bbc VALUES (\'$name\',\'$region\',$area,$population,$gdp)";  </code></pre>



<p>We moeten dan wel zorgen voor de goede invulling van de waarden voor de variabelen achter VALUES. </p>
<h3>De verwerkingspagina</h3>
<p>Net als bij hoofdstuk 3 moeten we ook hier eerst het formulier neerzetten en dat later gaan verwerken. De code hier lijkt dus heel veel op de code daar. Alleen moeten we nu wel de variabelen name, region enzovoorts gaan vullen. De variabele $fout gebruiken we als 'vlag' om te bekijken of er wel voldoende is ingevuld. We zetten deze variabele eerst op true, maar als er echt iets niet goed is ingevuld en het invullen over moet zetten we de variabele op false:</p>
<pre data-src="toevoegen.hph"><code class="language-php"></code></pre>

<p>In deze code wordt echt alleen getest of er wel iets is ingevuld in het formulier. De controle op gevaarlijke invoer, of een controle op de regionaam, op negatieve inwoneraantallen en meer van dat soort rare invoer zit hier nog niet in. Afhankelijk van de behoefte moet je dat soort controles soms wel inbouwen. Daar gaat best een hoop tijd inzitten!</p> 
<h3>De 6 stappen toevoegen</h3>
<p>Tot slot voegen we nog de inmiddels bekende 6 stappen toe aan het formulier (op de plek waar hierboven //TODO:  staat). Dit is voor deze pagina een simpele operatie omdat het meeste werk is gaan zitten in het formulier en het maken van de query. Het enige bijzondere is dat we even moeten controleren of de toevoeging wel gelukt is en waarom deze eventueel niet gelukt is:</p>
<pre><code class="language-php">
		// TODO: database handelingen (de 6 stappen)
		#stap 1 en 2
		$mysql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		# stap 3 staat hierboven al
		# stap 4 
		$resultaat = mysqli_query($mysql,$query) ; # or die ("Insert niet gelukt: ".mysqli_error($mysql));
		# stap 5
		if (!($resultaat)) {
			print "Er is iets niet goed gegaan!: ".mysqli_error($mysql);
			print "Opnieuw proberen? <a href=\"nieuw_land.php\">Overnieuw</a>";
		} else {
			print "Toevoegen gelukt. <a href=\"nieuw_land.php\">Opnieuw?</a>";
		}

		#stap 6
		mysqli_close($mysql);
	
</code></pre>
<p>Foutmeldingen als de INSERT niet gelukt is zijn hierboven verplaatst naar stap 5 om te voorkomen dat met de <em>or die</em> opdracht het script er helemaal mee stopt. Op deze manier geven we gebruikers de kans om iets opnieuw in te vullen.</p>
<h3>De complete code</h3>
<p>Alles bij elkaar is dit het complete script:</p>
<pre data-src="nieuw_land.hph"><code class="language-php"></code></pre>
<p>Zoals eerder al opgemerkt kan het geen kwaad dit script nog meer controles en bescherming mee te geven. Daarover meer in een andere les.</p>
<div class="opdrachten">
<a name="opdrachten"><h3>Opdrachten 6</h3></a>
<p>
<ol>
<li>download <a href="fout_land.remove">dit script</a>, haal het .remove uit de naam en vervang het door .php . Dit script is een script waarmee een land kan worden toegevoegd. Geef met commentaarregels alle plekken aan waar volgens jullie een fout zit en doe een voorstel tot verbetering.</li>
<li>je hebt in een practicum een adressen database gemaakt voor vrienden. Maak een formulier waarmee je een vriend kan toevoegen. Als je die database niet meer hebt kun je ook <a href="friends.sql">dit script</a> gebruiken om een vriendentabel aan te maken. Je moet het bestand friends.sql downloaden en in PhpMyAdmin als SQL uitvoeren. Maak bij het maken van een invoerpagina een keuze over de velden die jij wilt invoeren. Je hoeft ze niet allemaal over te nemen. Maar let wel op de velden die niet leeg mogen blijven! Dit is het strokendiagram:</li>
</ol>
<table class="strokendiagram"><tr>
<td><b><u>id (auto increment)</u></b></td><td><b>voornaam</b></td><td>tussenvoegsel</td><td><b>achternaam</b></td><td>bijnaam</td><td>email</td><td><b>telefoon</b></td><td>straat</td><td>postcode</td><td>plaats</td><td>opmerking</td></tr>
</table>
<h6>De vetgedrukte velden zijn verplicht, de onderstreepte velden zijn de sleutel. Alleen het eerste veld is een numeriek veld, alle andere velden zijn tekstvelden. "Auto Increment" (vaak afgekort tot AI) betekent dat de database dat veld zelf moet gaan bijhouden. Auto = 'zelf' en Increment = 'toenemen'.</h6>
</div>

</div>
<?php
include "voet.php";
?>	