<?php

// Voorbeeldje van OOP denken: een OOP rekenmachine

require_once("Pagina.php"); # blauwdruk voor een gewone pagina.
require_once("Som.php"); #hierin staan de blauwdrukken van de objecten SOM en rekenmachine    
require_once("Rekenmachine.php");

// Pagina start
$pagina = new Pagina("OOP Rekenmachine","rmstijl.css");

$pagina->head();
$pagina->bodystart();

// ------------------zou eventueel ook via oop kunnen! --------
print "<div id=\"container\">";
print "<h1 align=\"center\">OOP rekenmachine</h1>";

$rm = new Rekenmachine(); # maak een instantie van de blauwdruk Rekenmachine

// Roep de methode toon_machine daarvan op om de rekenmachine te tonen.
$rm->toon_machine();

// Zet de verschillende methoden aan het werk:
if (isset($_POST['bewerking'])) {
    $rm->invoer_ophalen();
    $rm->invoer_controle();
    if ($rm->ok) {
        $rm->berekening_uitvoeren();
        $rm->toon_resultaat();
    } else {
        $rm->toon_melding();
    }
}

print "</div>";

// pagina einde
$pagina->voet();
?>