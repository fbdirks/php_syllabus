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
<?php
$code='  session_start();';
toon_code($code);
?>
Het is dus niet alleen voldoende dat de eerste pagina die een gebruiker bezoekt (bijvoorbeeld de inlogpagina) dit doet, <b>iedere</b> volgende pagina die het geheugen nodig heeft moet dit  ook doen.</p>
	
<h4>Waarden in $_SESSION zetten</h4>
<p>$_SESSION is een <i>associatieve</i> array waarin de gegevens geplaatst kunnen worden met zelfgekozen indexnamen. Kies indexnamen die duidelijk zijn. Bijvoorbeeld:
<?php
$code='
	$_SESSION[\'usernaam\']=$usernaam;
	$_SESSION[\'ingelogd\']=True;
	$_SESSION[\'leeftijd\']=27;
	';
	toon_code($code);
?>

Het zal duidelijk zijn dat je pas waarden in $_SESSION kunt plaatsen als $_SESSION aangezet is. session_start(); moet dus voorafgaan aan dit soort commando's.
</p>

<h4>Waarden uit $_SESSION halen</h4>
<p>Het ophalen van gegevens uit $_SESSION gaat eenvoudig:
<?php
$code='  
	$usernaam = $_SESSION[\'usernaam\'];
	$ingelogd = $_SESSION[\'ingelogd\'];
	$leeftijd = $_SESSION[\'leeftijd\'];
	';
	toon_code($code);
?>

Net als bij het plaatsen van gegevens <i>in</i> $_SESSION is het ophalen van gegevens <i>uit</i> $_SESSION pas mogelijk als $_SESSION aan staat. Weer geldt dus dat op deze pagina session_start(); aan de coderegels vooraf moet gaan.	
</p>
<p>Net als bij $_POST is er soms behoefte aan het bekijken van de inhoud van $_SESSION. Gebruik daarvoor weer het commando print_r(), bijvoorbeeld op deze manier:
<?php
$code='  print "<pre>";
  print_r($_SESSION);
  print "</pre>";';
toon_code($code)	;
?>
	
</p>
<h4>Session uit zetten</h4>
<p>Als het geheugen niet meer nodig moet het worden uitgezet. Zeker bij inlogsystemen is het verstandig om daarbij twee dingen tegelijk te doen: (a) het geheugen bakje legen (met session_unset()) en (b) het bakje uitzetten (met session_destroy()). 
<?php
$code = '  session_unset();
  session_destroy();';
toon_code($code);

?>

</p>


<p>In het voorbeeld hieronder zet het eerste script de usernaam en de boolean 'ingelogd'.</p>
<?php
toon_file("v17_sessies.php");
?>
<p>De tweede file controleert of er is ingelogd, zo ja, dan wordt er meteen uitgelogd. Dit is dus een soort php variant van de <a href="https://en.wikipedia.org/wiki/Useless_machine">'useless machine'</a>.</p>
<?php
toon_file("v17_sessies2.php");
?>
<p>De conclusie mag zijn dat met het session systeem PHP op een eenvoudige manier voorzien kan worden van een sessie-geheugen. Bij serieuze toepassingen is het verstandig om alle security details rondom sessies te kennen en ervoor te zorgen dat sessie niet door anderen misbruikt kunnen worden. </p>
<?php
include "voet.php";

?>