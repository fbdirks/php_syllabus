<?php
include "kop.php";
include "disp_functies.php";
?>

<h2>17. Sessies</h2>

<p>Sessies zijn het <i>geheugen</i> van php. Ze vormen de ideale aanvulling op het werken met formulieren. Formulieren zorgen ervoor dat gegevens van de ene php pagina (met het formulier) naar de andere php pagina verstuurd kunnen worden. Sessies zorgen ervoor dat gegevens voor de duur van de sessie opgeslagen kunnen worden op de server waar php er bij kan, of er nu een formulier gebruikt wordt of niet. Onder een 'sessie' kun je de tijd verstaan waarin een gebruiker contact heeft met een webserver en de webbrowser niet afsluit.  </p>

<h4>$_SESSION</h4>
<p>Net als $_POST is $_SESSION een <i>associatieve</i> array waarin variabelen geplaatst kunnen worden. Alleen php kan bij deze array. $_SESSION is het 'geheugenbakje' van een sessie. Alles wat php denkt nodig te hebben gedurende de sessie (bijvoorbeeld inloggegevens) kunnen daarin gestopt en daar uit gehaald worden. Een sessie verloopt en het geheugenbakje wordt geleegd als de gebruiker de browser afsluit of bewust uitlogt.</p>

<h4>Aanzetten van sessies</h4>
<p><b>Iedere</b> php pagina die gebruik wil maken van het $_SESSION bakje moet dat op een van de allereerste regels van de code aangeven via het commando:

<pre><code class="language-php">
	session_start();
</code></pre>

Het is dus niet alleen voldoende dat de eerste pagina die een gebruiker bezoekt (bijvoorbeeld de inlogpagina) dit doet, <b>iedere</b> volgende pagina die het geheugen nodig heeft moet dit  ook doen.</p>
	
<h4>Waarden in $_SESSION zetten</h4>
<p>$_SESSION is een <i>associatieve</i> array waarin de gegevens geplaatst kunnen worden met zelfgekozen indexnamen. Kies indexnamen die duidelijk zijn. Bijvoorbeeld:
<p>En dit is de file met de pagina functies:</p>
<pre><code class="language-php">
	$_SESSION[\'usernaam\']=$usernaam;
	$_SESSION[\'ingelogd\']=True;
	$_SESSION[\'leeftijd\']=27;
</code></pre>



Het zal duidelijk zijn dat je pas waarden in $_SESSION kunt plaatsen als $_SESSION aangezet is. session_start(); moet dus voorafgaan aan dit soort commando's.
</p>

<h4>Waarden uit $_SESSION halen</h4>
<p>Het ophalen van gegevens uit $_SESSION gaat eenvoudig:
<pre><code class="language-php">
	$usernaam = $_SESSION[\'usernaam\'];
	$ingelogd = $_SESSION[\'ingelogd\'];
	$leeftijd = $_SESSION[\'leeftijd\'];
</code></pre>

Net als bij het plaatsen van gegevens <i>in</i> $_SESSION is het ophalen van gegevens <i>uit</i> $_SESSION pas mogelijk als $_SESSION aan staat. Weer geldt dus dat op deze pagina session_start(); aan de coderegels vooraf moet gaan.	
</p>
<p>Net als bij $_POST is er soms behoefte aan het bekijken van de inhoud van $_SESSION. Gebruik daarvoor weer het commando print_r(), bijvoorbeeld op deze manier:
<pre><code class="language-php">	
print "<pre>";
print_r($_SESSION);
print "</pre>";
</code></pre>
	
</p>
<h4>Session uit zetten</h4>
<p>Als het geheugen niet meer nodig moet het worden uitgezet. Zeker bij inlogsystemen is het verstandig om daarbij twee dingen tegelijk te doen: (a) het geheugen bakje legen (met session_unset()) en (b) het bakje uitzetten (met session_destroy()). 
<pre><code class="language-php">
session_unset();
session_destroy();';
</code></pre>

?>

</p>


<p>In het voorbeeld hieronder zet het eerste script de usernaam en de boolean 'ingelogd'.</p>
<pre data-src="v17_sessies.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v17_sessies.php';?></div>

<p>De tweede file controleert of er is ingelogd, zo ja, dan wordt er meteen uitgelogd. Dit is dus een soort php variant van de <a href="https://en.wikipedia.org/wiki/Useless_machine">'useless machine'</a>.</p>
<pre data-src="v17_sessies2.hph","php"><code class="language-php"></code></pre>
En de output:
<div class="voorbeeldOutput"><?php include 'v17_sessies2.php';?></div>

<p>De conclusie mag zijn dat met het session systeem PHP op een eenvoudige manier voorzien kan worden van een sessie-geheugen. Bij serieuze toepassingen is het verstandig om alle security details rondom sessies te kennen en ervoor te zorgen dat sessie niet door anderen misbruikt kunnen worden. </p>
<?php
include "voet.php";

?>