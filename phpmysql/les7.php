<?php
include "kop.php";

?>
<div class="main">
<h1>Les 7: Een record wijzigen</h1>
<a href="#opdrachten"><h6>opdrachten</h6></a>
<p>Het wijzigen van een record is iets dat in iedere database moet kunnen, een nuttige uitbreiding dus. Maar omdat het eigenlijk een combinatie is van het opzoeken van een record en het wegschrijven van een record is er in feite sprake van een drietraps raket:</p>
	<ol>
		<li>Welk record wil je wijzigen?</li>
		<li>Welke gegevens zijn van dat record bekend?</li>
		<li>Hoe moeten ze veranderd worden?</li>
	</ol>
<h3>
	Opzoeken van een record en opzoeken van de gegevens van een record
</h3>
<p>
De code hiervoor lijkt sprekend op de code uit de derde les, waarbij we de gebruiker de gelegenheid gaven een land op te geven waarvan de gegevens moesten worden opgevraagd. We kunnen die code gewoon gebruiken.
</p>
<p>
Ook het opzoeken van de gegevens van het land dat we willen wijzigen lijkt heel veel op het werk dat we in les 3 gedaan hebben. Er is eigenlijk maar &eacute;&eacute;n verandering: de opgevraagde gegevens willen we niet 'gewoon' op de pagina afdrukken, maar <em>in een formulier</em>. We vullen ze als het ware van te voren in, en de gebruiker kan ze dan wijzigen als dat nodig is. Na het wijzigen zullen via een UPDATE query (en niet een INSERT query!!) 	de gegevens weggeschreven kunnen worden. 
</p>
<p>
	Dit is de code tot aan het opbouwen van het tweede formulier waarin alle gegevens van het land zullen worden ingevuld:
</p>
<pre data-src="wijzig1.hph"><code class="language-php"></code></pre>

<h3>Een formulier vooraf invullen met gegevens</h3>
<p>We weten nu alle gegevens van het land dat we willen gaan wijzigen. Hoe krijgen we deze gegevens voor ingevuld in een formulier? Dat kan met een simpele truc. Dit is de html code voor het invulvak van de regio:</p>
<pre><code class="language-markup"><script type="prism-html-markup"><input type="text" name="region">    </script>  </code></pre>

<p>We voegen aan deze tag een 'value' onderdeel toe:</p>

<pre><code class="language-markup"><script type="prism-html-markup"><input type="text" name="region" value=" "></script>  </code></pre>

<p>en tussen de " " van de value zetten we dit piepkleine stukje php code dat tot taak heeft tussen de " " de inhoud van de variabele $region neer te zetten:</p>
<pre data-src="php_in_html.hph"><code class="language-php"></code></pre>

<p>Tijdens het afwerken van de pagina doet php dan het volgende: (1) op basis van het ingevoerde land haalt php alle gegevens over dat land op, en stopt op die manier in $regio de naam van de regio van het land. Dus als we "Belgium" hadden ingegeven als land zal in $regio uiteindelijk "Europe" worden neergezet. (2) Als php het commando &lt;?php echo $region ?&gt; tegenkomt print php dus <em>Europe</em>. Daardoor wordt de bovenstaande regel:</p>
<pre><code class="language-markup"><script type="prism-html-markup"><input type="text" name="region" value="Europe"></script>  </code></pre>


<p>Dit doen we natuurlijk ook voor de andere velden. We krijgen dan dit formulier (dat op de plaats van de TODO komt te staan):</p>
<pre data-src="verwerk_wijziging1.hph"><code class="language-html"></code></pre>

<p>Opvallend is de derde regel in het fragment hierboven. De naam van het land vullen we niet alleen in het zichtbare formulier in, maar ook in een onzichtbaar input element onder de naam 'name_oud'. Onder die naam wordt deze dan ook doorgegeven aan het verwerkende script. Waarom doen we dat? We willen ook de naam van een land kunnen wijzigen, bijvoorbeeld omdat we er een tikfout in gemaakt hebben. Als we het land gaan wijzigen en daarbij de nieuwe naam gebruiken zal de query het land niet vinden. We moeten dus in de wijzig query de <em>oude</em> naam gebruiken. Daarom moeten we die oude naam ook meegeven.</p>
<p>NB: dit hoeft niet bij iedere database! Bij veel databases is de keuze gemaakt om het sleutelveld NOOIT te kunnen veranderen. In dat geval is het niet nodig om met zo'n hidden veld te werken. Aan de andere kant mag je dan ook niet de gelegenheid geven om het sleutelveld te veranderen!</p>
<h3>Verwerking van de wijziging door het volgende script</h3>
<p>Als we in dit formulier klikken op de submit knop wordt een tweede php script gestart dat de wijziging verwerkt. Op zich zou deze wijziging wel in &eacute;&eacute;n en dezelfde pagina kunnen, maar daar wordt het wel wat onoverzichtelijk van. Vandaar de tweede pagina. Wat op die pagina gebeurt lijkt veel op het verwerken van een nieuw ingevoerd land (zie les 5). Alleen maken we hier gebruik van een UPDATE query in plaats van een INSERT query. Dit is de code:</p>

<pre data-src="verwerk_wijziging.hph"><code class="language-html"></code></pre>

<h3>En de complete 'wijzig_land.php'</h3>


<p>Dit is - voor de volledigheid - de volledige code van het hoofdscript (wijzig_land.php):</p>
<pre data-src="wijzig_land.hph"><code class="language-php"></code></pre>
<br><br>
<div class="opdrachten">
<a name="opdrachten"><h3>Opdrachten 7</h3></a>
<ol>
<li>Zorg ervoor dat de scripts wijzig_land.php en verwerk_wijziging.php op jouw server lopen.</li>
<li>Bouw de pagina's waarmee je een record in je vriendendatabase kunt wijzigen.</li>
</ol>
</div>
</div>
<?php
include "voet.php";
?>	