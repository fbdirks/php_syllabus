<?php
	require_once("Pagina.php");
	$pagina = new Pagina("Uitleg OOP Rekenmachine","indexstijl.css");
	$pagina->head();
?>
<div class="index">
<form action=index.php method="post">
   <h1>ROPE: een rekenmachine in PHP-OOP</h1>

<p>Dit is een voorbeeld van OOP binnen PHP. Het voorbeeld beschrijft de opbouw van een rekenmachine op een webpagina.</p>
<p>Klik op een script (of webpagina) om deze te laten uitvoeren. Klik op <input class="source" type="button" value="Source"> om de broncode te bekijken.Onderstreepte commando's in de broncode zijn aanklikbaar. Na een klik wordt gesprongen naar de documentatie van dit commando op php.net. Je kunt via het zip bestand alle bestanden downloaden. NB: je moet PHP 5 draaien wil het allemaal werken.</p>
<table class="uitleg">
 <tr><td>Pagina.php (klasse: pagina) <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="Pagina"></td></tr>    
 <tr><td>Rekenmachine.php (superklasse) <span class="opletten">source-only</span></td><td><input type="submit" value="Source" name="Rekenmachine"></td></tr>
 <tr><td><a href="Som.php">Som.php (de klasse die sommen alleen maar uitrekent)</a></td><td><input type="submit" value="Source" name="Som"></td></tr>   
 <tr><td><a href="Rekenmachine_knopjes.php">Rekenmachine met numerieke knopjes</a></td><td><input type="submit" value="Source" name="Rekenmachine_knopjes"></td></tr>     
 <tr><td><a href="ROPE.php">ROPE.php (de hoofdpagina)</a></td><td><input type="submit" value="Source" name="ROPE"></td></tr>
 </table>
<input type='hidden' name='start' value='ok'>
</form>
<h2>Uitleg</h2>
<p>Bij het ontwikkelen van deze rekenmachine is gekozen voor de volgende  aanpak. Er worden drie objecten gebruikt:
<ul>
	<li>Pagina - voor het neerzetten van een webpagina waar Rekenmachine gebruik van kan maken</li>
	<li>Som - voor het uitrekenen van een som als getal1, getal2 en de gevraagde bewerking bekend zijn</li>
	<li>Rekenmachine - voor het neerzetten van de interface en aansturen van de werking van de rekenmachine</li>
</ul>	
Bij <b>Rekenmachine</b> zijn dan in principe varianten mogelijk van rekenmachines die er anders uitzien. Denk aan 'simpele' rekenmachines (met alleen maar bewerkingen + - / en *), 'wetenschappelijke' rekenmachines (ook met ingewikkelde bewerkingen) en rekenmachines met alternatieve interfaces (bv met numerieke knopjes e.d.). De standaard Rekenmachine.php bevat de normale rekenmachine, de andere vormen zijn daarvan afgeleid en bevatten alleen de methoden en attributen die anders of extra zijn ten opzichte van de normale klasse.</p>
<p><b>Som</b> is de klasse die alleen maar het rekenwerk doet. Hier moeten dus uiteindelijk alle bewerkingen die in welke rekenmachine dan ook mogelijk zijn een plekje vinden. Som moet de berekeningen foutloos uitvoeren, maar hoeft zich geen zorgen te maken over de presentatie op het scherm (afronden bijvoorbeeld). Daarvoor is Rekenmachine verantwoordelijk.</p>
<p>De klasse <b>Pagina</b> doet niet anders dan een standaard webpagina voorbereiden (titel, css bestand, kop en voet). Aan deze klasse zouden ook nog methodes kunnen worden toegevoegd om te controleren of iemand wel is ingelogd, om commentaren toe te staan enzovoorts.
</p>
<p>Zowel de klasse <b>Som</b> als de klasse <b>Rekenmachine_knopjes</b> bevatten in code ook testcode, vandaar dat ze rechstreeks aan te roepen zijn. De output die je dan ziet is test output. Zie de source code voor de gebruikte techniek. Het opnemen van testcode in klassedefinities is een goede manier om geautomatiseerd! en makkelijk te kunnen testen tijdens het ontwikkelen. </p>
<?php
print "</div>";
print "<hr>";
print "<table border=\"1\" width=\"100%\" cellpadding=\"25\"><tr><td bgcolor=\"#FFDC87\" >";

//include_once('../../geshi/geshi.php');
include_once('../../../geshi.php');
$language="php";
$geshi = new GeSHi($source, $language);

if (isset($_POST['start'])) {
   
   // hier wordt opgevraagd welke key in index 0 staat van Post, dat is het nummer van de knop
    $lijst = array_keys($_POST);
    $sleutel = $lijst[0];
    switch ($sleutel) {
        case "Pagina":
        		$bestand = "Pagina.php";
        		break;
        case "Som":
            $bestand = "Som.php";
            break;
        case "Rekenmachine":
        	$bestand = "Rekenmachine.php";
        	break;
        case "Rekenmachine_knopjes":
            $bestand = "Rekenmachine_knopjes.php";
            break;
        case "ROPE":
            $bestand = "ROPE.php";
            break;
            
    }
    unset($_POST);
    $geshi->enable_line_numbers(GESHI_NO_LINE_NUMBERS);
    $geshi->load_from_file("$bestand");
    print "<h2>Sourcecode $bestand</h2>";
    print $geshi->parse_code();

}
print "</td></tr></table>";
print "</div><div align=\"center\">";
$pagina->voet();

?>



?>